#!/usr/bin/env python3
"""セルフホストフォント（日本語サブセット）を生成する。

使い方:
  python tools/build_fonts.py                      # 保存済みの計測結果から再生成
  python tools/build_fonts.py --measure            # ブラウザで文字集合を測り直してから再生成
  python tools/build_fonts.py --measure --target docs
  python tools/build_fonts.py --target public

必要なもの:
  pip install fonttools brotli
  --measure には php と Chrome も必要（CHROME_PATH で明示指定可）

出力:
  public/assets/fonts/noto-sans-jp-<weight>.woff2  本文・見出し用
  public/assets/fonts/orbitron.woff2               見出し装飾用（可変 400-900）
  docs/assets/fonts/noto-sans-jp-<weight>.woff2    ドキュメントサイト用

文字を追加・変更したら再実行してください。サブセットに無い文字は
システムフォントで描画されるため、見た目が崩れることがあります。
"""

from __future__ import annotations

import argparse
import base64
import html
import json
import re
import shutil
import socket
import subprocess
import sys
import tempfile
import time
import urllib.request
from dataclasses import dataclass
from pathlib import Path

from fontTools import subset
from fontTools.ttLib import TTFont
from fontTools.varLib.instancer import instantiateVariableFont

ROOT = Path(__file__).resolve().parent.parent
PUBLIC = ROOT / "public"
DOCS = ROOT / "docs"
DATA_DIR = Path(__file__).resolve().parent / "fonts"

PUBLIC_PAGES = [
    "index.php",
    "calendar.php",
    "cultivate/index.php",
    "cultivate/plans/index.php",
    "cultivate/plans/success.php",
    "cultivate/plans/cancel.php",
    "cultivate/privacy.php",
    "cultivate/terms.php",
    "pulseweaver/index.php",
    "pulseweaver/privacy.php",
    "pulseweaver/terms.php",
]

SOURCES = {
    "noto": "https://raw.githubusercontent.com/google/fonts/main/ofl/notosansjp/NotoSansJP%5Bwght%5D.ttf",
    "orbitron": "https://raw.githubusercontent.com/google/fonts/main/ofl/orbitron/Orbitron%5Bwght%5D.ttf",
}

EXTRA_CHARS = "".join(chr(c) for c in range(0x20, 0x7F)) + (
    "、。・「」『』（）〔〕［］｛｝【】〜～ー―‐ｰ…‥！？：；，．／＋－＝＊＃＄％＆＠＾｜＿＜＞　"
    "０１２３４５６７８９"
)

PROBE = """<script>
window.addEventListener("load", () => {
  const buckets = {};
  document.querySelectorAll("body *").forEach(el => {
    const w = String(Math.round((parseInt(getComputedStyle(el).fontWeight, 10) || 400) / 100) * 100);
    for (const n of el.childNodes) {
      if (n.nodeType !== 3) continue;
      buckets[w] = (buckets[w] || "") + n.nodeValue;
    }
  });
  document.title = "W=" + btoa(unescape(encodeURIComponent(JSON.stringify(buckets))));
});
</script>
</body>"""


@dataclass(frozen=True)
class Target:
    name: str
    docroot: Path
    pages: list[str]
    out: Path
    orbitron: bool


def docs_pages() -> list[str]:
    return sorted(
        p.relative_to(DOCS).as_posix()
        for p in DOCS.rglob("*.php")
        if "dist" not in p.parts
    )


TARGETS = {
    "public": Target("public", PUBLIC, PUBLIC_PAGES, PUBLIC / "assets" / "fonts", True),
    "docs": Target("docs", DOCS, docs_pages(), DOCS / "assets" / "fonts", False),
}


def page_chars(path: Path) -> set[str]:
    text = path.read_text(encoding="utf-8")
    chars: set[str] = set()

    # JS の文字列リテラル（タイピング演出などで DOM に挿入される文字列）
    for m in re.finditer(r"<script\b[^>]*>(.*?)</script>", text, re.S):
        for quoted in re.findall(r'"([^"\n]*)"|\'([^\'\n]*)\'', m.group(1)):
            chars |= set(html.unescape(quoted[0] or quoted[1]))

    # CSS の content: "..."
    for m in re.finditer(r"<style\b[^>]*>(.*?)</style>", text, re.S):
        for value in re.findall(r'content\s*:\s*"([^"]*)"', m.group(1)):
            chars |= set(value)

    body = re.sub(r"<\?(?:php|=).*?\?>", " ", text, flags=re.S)
    body = re.sub(r"<script\b.*?</script>|<style\b.*?</style>", " ", body, flags=re.S)
    body = re.sub(r"<!--.*?-->", " ", body, flags=re.S)
    body = re.sub(r"<[^>]+>", " ", body)
    chars |= set(html.unescape(body))

    return {c for c in chars if c.isprintable()}


def collect_charset(target: Target) -> str:
    chars: set[str] = set(EXTRA_CHARS)
    for page in target.pages:
        path = target.docroot / page
        if path.exists():
            chars |= page_chars(path)
    return "".join(sorted(chars))


def chrome_path() -> str | None:
    import os

    candidates = [
        os.environ.get("CHROME_PATH"),
        r"C:\Program Files\Google\Chrome\Application\chrome.exe",
        r"C:\Program Files (x86)\Google\Chrome\Application\chrome.exe",
        "/Applications/Google Chrome.app/Contents/MacOS/Google Chrome",
        "/usr/bin/google-chrome",
        "/usr/bin/chromium",
    ]
    for candidate in candidates:
        if candidate and Path(candidate).exists():
            return candidate
    return shutil.which("chrome") or shutil.which("google-chrome") or shutil.which("chromium")


def measure(target: Target) -> dict[str, str]:
    chrome = chrome_path()
    php = shutil.which("php")
    if not chrome or not php:
        sys.exit("--measure には php と Chrome が必要です（CHROME_PATH で指定できます）")

    with socket.socket() as s:
        s.bind(("127.0.0.1", 0))
        port = s.getsockname()[1]

    server = subprocess.Popen(
        [php, "-S", f"127.0.0.1:{port}", "-t", str(target.docroot)],
        stdout=subprocess.DEVNULL,
        stderr=subprocess.DEVNULL,
    )
    buckets: dict[str, set[str]] = {}
    temp_files: list[Path] = []
    try:
        time.sleep(1.5)
        with tempfile.TemporaryDirectory() as profile_root:
            for i, page in enumerate(target.pages, start=1):
                path = target.docroot / page
                if not path.exists():
                    continue
                probe_file = path.with_name(f"__fontprobe_{i}.php")
                content = "<?php error_reporting(0); ?>" + path.read_text(encoding="utf-8")
                probe_file.write_text(content.replace("</body>", PROBE), encoding="utf-8")
                temp_files.append(probe_file)

                url = f"http://127.0.0.1:{port}/{probe_file.relative_to(target.docroot).as_posix()}"
                out = subprocess.run(
                    [chrome, "--headless=new", "--disable-gpu",
                     f"--user-data-dir={Path(profile_root) / f'p{i}'}",
                     "--virtual-time-budget=5000", "--dump-dom", url],
                    capture_output=True, text=True, encoding="utf-8", errors="replace",
                ).stdout
                m = re.search(r"<title>W=([^<]+)</title>", out)
                if not m:
                    continue
                for weight, text in json.loads(base64.b64decode(m.group(1)).decode("utf-8")).items():
                    buckets.setdefault(weight, set()).update(c for c in text if c.isprintable())
    finally:
        for f in temp_files:
            f.unlink(missing_ok=True)
        server.terminate()

    if not buckets:
        sys.exit(f"{target.name}: 文字集合を取得できませんでした")
    return {w: "".join(sorted(chars)) for w, chars in sorted(buckets.items())}


def download(name: str, url: str, workdir: Path) -> Path:
    dest = workdir / f"{name}.ttf"
    if not dest.exists():
        urllib.request.urlretrieve(url, dest)
    return dest


def subset_font(src: Path, text: str, out: Path, weight: float | None = None) -> None:
    font = TTFont(src)
    if weight is not None:
        instantiateVariableFont(font, {"wght": weight}, inplace=True, updateFontNames=False)

    options = subset.Options()
    options.flavor = "woff2"
    options.layout_features = ["kern"]
    options.hinting = False
    options.glyph_names = False

    subsetter = subset.Subsetter(options=options)
    subsetter.populate(text=text)
    subsetter.subset(font)
    subset.save_font(font, str(out), options)


def weights_file(target: Target) -> Path:
    return DATA_DIR / f"weights-{target.name}.json"


def build(target: Target) -> None:
    data_path = weights_file(target)
    if data_path.exists():
        measured: dict[str, str] = json.loads(data_path.read_text(encoding="utf-8"))
    else:
        print(f"{data_path.name} が無いため計測します…")
        measured = measure(target)
        data_path.parent.mkdir(parents=True, exist_ok=True)
        data_path.write_text(json.dumps(measured, ensure_ascii=False), encoding="utf-8")

    body_text = collect_charset(target)
    # 実際に描画された文字も必ず含める（インクルード越しの文言や
    # PHP で組み立てた文字列を取りこぼさないため）
    measured_body = measured.get("400", "")
    body_text = "".join(sorted(set(body_text) | set(measured_body)))

    jobs: list[tuple[str, str, Path, float | None]] = [
        ("noto", body_text, target.out / "noto-sans-jp-400.woff2", 400)
    ]
    for weight, text in measured.items():
        if weight == "400" or not text:
            continue
        jobs.append(("noto", text, target.out / f"noto-sans-jp-{weight}.woff2", float(weight)))

    expected = {out.name for _, _, out, _ in jobs}
    if target.orbitron:
        jobs.append(("orbitron", body_text, target.out / "orbitron.woff2", None))
        expected.add("orbitron.woff2")

    target.out.mkdir(parents=True, exist_ok=True)
    for stale in target.out.glob("*.woff2"):
        if stale.name not in expected:
            stale.unlink()

    with tempfile.TemporaryDirectory() as tmp:
        workdir = Path(tmp)
        sources = {"noto": download("noto", SOURCES["noto"], workdir)}
        if target.orbitron:
            sources["orbitron"] = download("orbitron", SOURCES["orbitron"], workdir)

        for source, text, out, weight in jobs:
            subset_font(sources[source], text, out, weight)
            print(f"{out.relative_to(ROOT).as_posix()}: {out.stat().st_size / 1024:.2f} KB")

    weights = [str(int(w)) for src, _, _, w in jobs if src == "noto" and w]
    total = sum(p.stat().st_size for p in target.out.glob("*.woff2"))
    print(f"[{target.name}] 本文用 {len(body_text)} 文字 / ウェイト {', '.join(weights)} / 合計 {total / 1024:.1f} KB")


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument("--measure", action="store_true",
                        help="ブラウザで実際に描画される文字を測り直す")
    parser.add_argument("--target", choices=["all", *TARGETS], default="all")
    args = parser.parse_args()

    names = list(TARGETS) if args.target == "all" else [args.target]
    for name in names:
        target = TARGETS[name]
        if args.measure:
            print(f"[{name}] 計測中… ({len(target.pages)} ページ)")
            measured = measure(target)
            weights_file(target).parent.mkdir(parents=True, exist_ok=True)
            weights_file(target).write_text(json.dumps(measured, ensure_ascii=False), encoding="utf-8")
            print(f"[{name}] 計測完了: " + ", ".join(f"{w}={len(t)}文字" for w, t in measured.items()))
        build(target)


if __name__ == "__main__":
    main()
