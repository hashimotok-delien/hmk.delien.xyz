#!/usr/bin/env python3
"""hmk.delien.xyz 用のセルフホストフォント（日本語サブセット）を生成する。

使い方:
  python tools/build_fonts.py                  # 現在のコンテンツから再生成
  python tools/build_fonts.py --measure-bold   # 太字用の文字集合をブラウザで測り直して再生成

必要なもの:
  pip install fonttools brotli
  --measure-bold には php と Chrome も必要（CHROME_PATH で明示指定可）

出力:
  public/assets/fonts/noto-sans-jp-400.woff2  本文用
  public/assets/fonts/noto-sans-jp-700.woff2  太字用（実際に太字で描画される文字のみ）
  public/assets/fonts/orbitron.woff2          見出し装飾用（可変 400-900）

文字を追加・変更したら再実行してください。サブセットに無い文字は
システムフォントで描画されるため、見た目が崩れることがあります。
"""

from __future__ import annotations

import argparse
import base64
import html
import re
import shutil
import socket
import subprocess
import sys
import tempfile
import time
import urllib.request
from pathlib import Path

from fontTools import subset
from fontTools.ttLib import TTFont
from fontTools.varLib.instancer import instantiateVariableFont

ROOT = Path(__file__).resolve().parent.parent
PUBLIC = ROOT / "public"
FONT_DIR = PUBLIC / "assets" / "fonts"
BOLD_CHARS_FILE = Path(__file__).resolve().parent / "fonts" / "bold-chars.txt"

PAGES = [
    "index.php",
    "calendar.php",
    "cultivate.php",
    "cultivate/index.php",
    "cultivate/plans/index.php",
    "cultivate/plans/success.php",
    "cultivate/plans/cancel.php",
    "cultivate/privacy.php",
    "cultivate/terms.php",
]

SOURCES = {
    "noto": "https://raw.githubusercontent.com/google/fonts/main/ofl/notosansjp/NotoSansJP%5Bwght%5D.ttf",
    "orbitron": "https://raw.githubusercontent.com/google/fonts/main/ofl/orbitron/Orbitron%5Bwght%5D.ttf",
}

EXTRA_CHARS = "".join(chr(c) for c in range(0x20, 0x7F)) + (
    "、。・「」『』（）〔〕［］｛｝【】〜～ー―‐ｰ…‥！？：；，．／＋－＝＊＃＄％＆＠＾｜＿＜＞　"
    "０１２３４５６７８９"
)


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


def collect_charset() -> str:
    chars: set[str] = set(EXTRA_CHARS)
    for page in PAGES:
        path = PUBLIC / page
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


PROBE = """<script>
window.addEventListener("load", () => {
  let s = "";
  document.querySelectorAll("body *").forEach(el => {
    if ((parseInt(getComputedStyle(el).fontWeight, 10) || 400) < 600) return;
    for (const n of el.childNodes) if (n.nodeType === 3) s += n.nodeValue;
  });
  document.title = "BOLD=" + btoa(unescape(encodeURIComponent(s)));
});
</script>
</body>"""


def measure_bold() -> str:
    chrome = chrome_path()
    php = shutil.which("php")
    if not chrome or not php:
        sys.exit("--measure-bold には php と Chrome が必要です（CHROME_PATH で指定できます）")

    with socket.socket() as s:
        s.bind(("127.0.0.1", 0))
        port = s.getsockname()[1]

    server = subprocess.Popen(
        [php, "-S", f"127.0.0.1:{port}", "-t", str(PUBLIC)],
        stdout=subprocess.DEVNULL,
        stderr=subprocess.DEVNULL,
    )
    temp_files: list[Path] = []
    chars: set[str] = set()
    try:
        time.sleep(1.5)
        with tempfile.TemporaryDirectory() as profile_root:
            for i, page in enumerate(PAGES, start=1):
                path = PUBLIC / page
                if not path.exists():
                    continue
                probe_file = PUBLIC / f"__fontprobe_{i}.php"
                content = "<?php error_reporting(0); ?>" + path.read_text(encoding="utf-8")
                probe_file.write_text(content.replace("</body>", PROBE), encoding="utf-8")
                temp_files.append(probe_file)

                out = subprocess.run(
                    [chrome, "--headless=new", "--disable-gpu",
                     f"--user-data-dir={Path(profile_root) / f'p{i}'}",
                     "--virtual-time-budget=5000", "--dump-dom",
                     f"http://127.0.0.1:{port}/__fontprobe_{i}.php"],
                    capture_output=True, text=True, encoding="utf-8", errors="replace",
                ).stdout
                m = re.search(r"<title>BOLD=([^<]+)</title>", out)
                if m:
                    chars |= set(base64.b64decode(m.group(1)).decode("utf-8"))
    finally:
        for f in temp_files:
            f.unlink(missing_ok=True)
        server.terminate()

    if not chars:
        sys.exit("太字の文字集合を取得できませんでした")
    return "".join(sorted(c for c in chars if c.isprintable()))


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


def main() -> None:
    parser = argparse.ArgumentParser()
    parser.add_argument("--measure-bold", action="store_true",
                        help="太字で描画される文字をブラウザで測り直す")
    args = parser.parse_args()

    if args.measure_bold:
        bold = measure_bold()
        BOLD_CHARS_FILE.write_text(bold, encoding="utf-8")
        print(f"太字用の文字集合を更新しました: {len(bold)} 文字")

    body_text = collect_charset()
    bold_text = BOLD_CHARS_FILE.read_text(encoding="utf-8") if BOLD_CHARS_FILE.exists() else body_text
    if not bold_text:
        bold_text = body_text

    FONT_DIR.mkdir(parents=True, exist_ok=True)
    with tempfile.TemporaryDirectory() as tmp:
        workdir = Path(tmp)
        noto = download("noto", SOURCES["noto"], workdir)
        orbitron = download("orbitron", SOURCES["orbitron"], workdir)

        jobs = [
            (noto, body_text, FONT_DIR / "noto-sans-jp-400.woff2", 400),
            (noto, bold_text, FONT_DIR / "noto-sans-jp-700.woff2", 700),
            (orbitron, body_text, FONT_DIR / "orbitron.woff2", None),
        ]
        for src, text, out, weight in jobs:
            subset_font(src, text, out, weight)
            print(f"{out.relative_to(ROOT)}: {out.stat().st_size / 1024:.2f} KB")

    print(f"本文用の文字数: {len(body_text)} / 太字用: {len(bold_text)}")


if __name__ == "__main__":
    main()
