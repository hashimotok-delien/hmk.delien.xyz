#!/usr/bin/env python3
"""PHP ページの include をインライン化し、静的プレビュー用の dist/ を生成するビルドスクリプト。

使い方:
  cd <site>
  python build_docs.py

出力先: dist/ （元のファイルは変更しません）

各ページは PHP の include で共通パーツを読み込み、`$ROOT` / `$PAGE_TITLE` 変数で
プレースホルダー（サイドバーの `ROOT/` とトップバーの `{{PAGE_TITLE}}`）を解決します。
このスクリプトはその include を展開し、変数を実値に置換します。
CSS/JS のキャッシュ破棄用 PHP タグは、dist/ 内の該当ファイルの更新日時（数値）に置換します。
"""

import os
import re
import shutil
from html import escape

# ============================================================
# コピー先のサイトに合わせて書き換える（この 3 つだけ）
# ============================================================
SITE_NAME = "RoyalGuide ドキュメント"
PRODUCT_NAME = "RoyalGuide"
SITE_SLUG = "royalguide"
SITE_URL = f"https://docs.delien.xyz/{SITE_SLUG}/"

SCRIPT_DIR = os.path.dirname(os.path.abspath(__file__))
INCLUDE_DIR = os.path.join(SCRIPT_DIR, "assets", "include")
DIST_DIR = os.path.join(SCRIPT_DIR, "dist")
SRC_DIRS = [SCRIPT_DIR, os.path.join(SCRIPT_DIR, "features")]

DESCRIPTION_SUFFIX = (
    f"{PRODUCT_NAME} の機能・設定方法を紹介するドキュメントです。"
)


MTIME_TAG_RE = re.compile(
    r"<\?= @filemtime\(__DIR__ \. '([^']+)'\) \?: time\(\) \?>"
)

# ページ先頭で定義する変数ブロック（$PAGE_DESCRIPTION は任意）
PAGE_VARS_RE = re.compile(
    r"<\?php\s+\$ROOT = '([^']*)';\s*\$PAGE_TITLE = '([^']*)';"
    r"(?:\s*\$PAGE_DESCRIPTION = '([^']*)';)?\s*\?>"
)
# <?php include __DIR__ . '/assets/include/sidebar.php'; ?>
INCLUDE_RE = re.compile(
    r"<\?php\s+include __DIR__ \. "
    r"'[^']*?assets/include/(\w+)\.php';\s*\?>"
)
# include パーツ内の変数参照
ROOT_TOKEN = "<?= $ROOT ?? '.' ?>"
TITLE_TOKEN = "<?= $PAGE_TITLE ?? '' ?>"


def load_include(name: str) -> str:
    """include/{name}.php を読み込む"""
    path = os.path.join(INCLUDE_DIR, f"{name}.php")
    if not os.path.exists(path):
        print(f"  [WARN] include not found: {path}")
        return f"<!-- include {name}.php not found -->"
    with open(path, "r", encoding="utf-8") as f:
        return f.read()


def resolve_cache_busting(html: str) -> str:
    """dist 出力では PHP タグを静的値に置換し、ブラウザで直接開けるようにする"""
    def repl(match):
        relative_path = match.group(1).replace("../", "").lstrip("/")
        if relative_path.startswith("assets/"):
            relative_path = relative_path[len("assets/"):]
        target = os.path.join(DIST_DIR, "assets", relative_path)
        if os.path.exists(target):
            return str(int(os.path.getmtime(target)))
        return "0"

    return MTIME_TAG_RE.sub(repl, html)


def build_file(src_path: str):
    """1つの PHP ページをビルドする"""
    with open(src_path, "r", encoding="utf-8") as f:
        html = f.read()

    # ページ先頭の変数（$ROOT / $PAGE_TITLE / $PAGE_DESCRIPTION）を取り出す
    vars_match = PAGE_VARS_RE.search(html)
    root = vars_match.group(1) if vars_match else "."
    title = vars_match.group(2) if vars_match else ""
    page_description = vars_match.group(3) if vars_match else None
    html = PAGE_VARS_RE.sub("", html, count=1)

    # PHP include をインライン展開し、変数を実値に置換
    def replace_include(match):
        content = load_include(match.group(1))
        content = content.replace(ROOT_TOKEN, root)
        content = content.replace(TITLE_TOKEN, title)
        if match.group(1) == "header":
            description = (
                page_description or (title + "。" + DESCRIPTION_SUFFIX)
            )
            relative_path = os.path.relpath(src_path, SCRIPT_DIR)
            page_url = (
                SITE_URL
                + os.path.splitext(relative_path)[0].replace(os.sep, "/")
            )
            page_image = SITE_URL + "assets/img/social-preview.png"
            values = {
                "<?= $escapeMeta($pageTitle) ?>": escape(title, quote=True),
                "<?= $escapeMeta($pageDescription) ?>": escape(
                    description, quote=True
                ),
                "<?= $escapeMeta($pageUrl) ?>": escape(page_url, quote=True),
                "<?= $escapeMeta($pageImage) ?>": escape(
                    page_image, quote=True
                ),
                "<?= $escapeMeta($siteName) ?>": escape(
                    SITE_NAME, quote=True
                ),
            }
            for token, value in values.items():
                content = content.replace(token, value)
            content = re.sub(r"<\?php.*?\?>", "", content, flags=re.S)
        return content

    html = INCLUDE_RE.sub(replace_include, html)

    # 出力先パス
    rel_path = os.path.relpath(src_path, SCRIPT_DIR)
    dst_path = os.path.join(DIST_DIR, rel_path)

    # PHP タグを静的値へ置換（dist をブラウザで直接開けるようにする）
    html = resolve_cache_busting(html)

    # 未展開の PHP が残っていないか確認
    if "<?php" in html or "<?=" in html:
        print(f"  [WARN] 未展開の PHP タグが残っています: {rel_path}")

    os.makedirs(os.path.dirname(dst_path), exist_ok=True)

    with open(dst_path, "w", encoding="utf-8", newline="") as f:
        f.write(html)

    print(f"  ✓ {rel_path}")


def main():
    # dist をクリーン
    if os.path.exists(DIST_DIR):
        shutil.rmtree(DIST_DIR)

    assets_dir = os.path.join(SCRIPT_DIR, "assets")
    for item in ("css", "img", "js"):
        source = os.path.join(assets_dir, item)
        if os.path.exists(source):
            shutil.copytree(
                source, os.path.join(DIST_DIR, "assets", item)
            )
    print("  ✓ copied assets/css, assets/img, assets/js")

    # 共有フォント（docs/assets/fonts）をコピーし、CSS 内のパスを dist 用に補正
    fonts_src = os.path.join(os.path.dirname(SCRIPT_DIR), "assets", "fonts")
    if os.path.exists(fonts_src):
        shutil.copytree(fonts_src, os.path.join(DIST_DIR, "assets", "fonts"))
        css_dir = os.path.join(DIST_DIR, "assets", "css")
        for name in sorted(os.listdir(css_dir)):
            if not name.endswith(".css"):
                continue
            css_path = os.path.join(css_dir, name)
            with open(css_path, encoding="utf-8") as f:
                css = f.read()
            fixed = css.replace("../../../assets/fonts/", "../fonts/")
            if fixed != css:
                with open(css_path, "w", encoding="utf-8", newline="") as f:
                    f.write(fixed)
        print("  ✓ copied assets/fonts")

    # PHP ページをビルド
    html_files = []
    for src_dir in SRC_DIRS:
        for f in sorted(os.listdir(src_dir)):
            if f.endswith(".php"):
                html_files.append(os.path.join(src_dir, f))

    print(f"\nBuilding {len(html_files)} PHP pages...\n")
    for fp in html_files:
        build_file(fp)

    print(f"\n✅ 完了! 出力先: {DIST_DIR}")
    print("   dist/ フォルダをブラウザで開いてください。")


if __name__ == "__main__":
    main()
