# ドキュメントサイト テンプレート（`templates/docs/`）

`docs/cultivate/` の構成をそのまま流用した、新しい Bot / ツールのドキュメントサイトのひな形です。
**このフォルダ自体は公開されません**（`docs/` の外にあるため FTP 同期の対象外）。

コピーして `docs/<slug>/` に置けば、そのまま動く状態にしてあります。

---

## 1. 構成

```
templates/docs/
├── README.md                  … このファイル
├── index.php                  … トップ（ヒーロー / 概要 / 機能カード / サポート）
├── getting-started.php        … 導入方法（手順・初期設定）
├── commands.php               … コマンド一覧
├── faq.php                    … FAQ
├── known-issues.php           … 既知の不具合
├── updates.php                … 更新履歴（タグ絞り込み付き）
├── features/
│   └── example.php            … 機能ページのひな形（複製して使う）
├── build_docs.py              … include を inlining して dist/ を生成（静的プレビュー用）
└── assets/
    ├── css/style.css          … デザインシステム（ダークテーマ／変更不要）
    ├── js/main.js             … サイドバー・絞り込み・コピーボタン
    ├── img/
    │   ├── favicon.svg        … サイトアイコン（差し替え可）
    │   ├── social-preview.png … OGP 画像（コピー後に 1200x630 を追加する）
    │   └── .gitkeep
    └── include/
        ├── header.php         … <head> 一式（title / meta / OGP / CSS / JS）
        ├── sidebar.php        … サイドバーナビ
        ├── topbar.php         … トップバー
        └── footer.php         … フッター
```

| ページ | URL（コピー後） | `$ROOT` |
|---|---|---|
| `index.php` | `/slug/` | `'.'` |
| `getting-started.php` | `/slug/getting-started` | `'.'` |
| `commands.php` | `/slug/commands` | `'.'` |
| `faq.php` | `/slug/faq` | `'.'` |
| `known-issues.php` | `/slug/known-issues` | `'.'` |
| `updates.php` | `/slug/updates` | `'.'` |
| `features/example.php` | `/slug/features/example` | `'..'` |

---

## 2. ドキュメントサイトを追加する手順

### (1) フォルダをコピー

```powershell
Copy-Item templates\docs docs\<slug> -Recurse
```

`<slug>` は URL に出る英小文字の名前（例: `cultivate`, `magonote-bot`）。

### (2) サイト名まわりを書き換える

`TODO` コメントが入っている箇所を置換します。

| ファイル | 書き換える内容 |
|---|---|
| `assets/include/header.php` | `$siteName`（サイト名）、`$pageDescription` の既定文、フォールバック URL の `/slug/`、OGP 画像パス |
| `assets/include/sidebar.php` | ロゴ（`.logo`）とサブタイトル |
| `assets/include/topbar.php` | 公式サイト / サポートサーバーの URL |
| `assets/include/footer.php` | 著作権表記・利用規約リンク |
| `build_docs.py` | `SITE_NAME` / `PRODUCT_NAME` / `SITE_SLUG` の 3 つ（先頭の設定ブロック） |

`header.php` はサイト名を `$siteName` に一元化しているので、**タイトルの接尾辞は各ページ側**
（`$PAGE_TITLE = '導入方法 - 製品名 ドキュメント'`）で指定します。

### (3) 本文の `（TODO: ...）` を埋める

- `index.php` … キャッチコピー・概要・機能カード
- `getting-started.php` … 導入手順・初期設定
- `commands.php` … コマンド一覧
- `faq.php` / `known-issues.php` / `updates.php`

コメントアウトしてあるサンプルブロック（機能カード・コマンド・不具合・更新履歴）は、
必要な分だけコメントを外して複製してください。

### (4) 機能ページを追加する

1. `features/example.php` を `features/<feature-slug>.php` に複製
2. `$ROOT = '..'` と `__DIR__ . '/../assets/include/...'` のままにする（変更不要）
3. `$PAGE_TITLE` を `機能名 - 製品名 ドキュメント` に変更
4. `assets/include/sidebar.php` の「機能」セクションにリンクを追加
5. `index.php` の機能カードにも追加

### (5) 画像を用意する

- `assets/img/social-preview.png` … OGP 用（1200x630）。無いと OGP 画像が 404 になります
- `assets/img/favicon.svg` … サイトアイコン（既定は汎用のドキュメントアイコン）

### (6) ポータルと公式サイトからリンクする

- `docs/index.php`（ドキュメントポータル）にカードを追加
- 公式サイトがある場合は `public/<slug>/` のヘッダー・フッターから
  `https://docs.delien.xyz/<slug>/` へリンク
- 内部リンクは**拡張子なし**で書く（`.php` は付けない。フォルダのトップは `./` か `<slug>/`）

---

## 3. 気をつけること（重要）

### URL・パス

- **拡張子なしURLが正規形。** `docs/.htaccess` が `/foo.php` → `/foo` に 301 し、
  拡張子なしアクセスは内部で `foo.php` を実行します。`/foo/index.php` は `/foo/` に集約。
  - 内部リンクは `getting-started`、`features/example`、`./` のように書く。
- **`$ROOT` はページの階層で変わる。**
  - サイト直下（`index.php` など）… `$ROOT = '.'`
  - `features/*.php`（1階層下）… `$ROOT = '..'`
  - include パーツは `<?= $ROOT ?? '.' ?>` を使うので、**include 前に必ず各ページで代入する**
- CSS 内のフォントは `../../../assets/fonts/` を参照している（`docs/<slug>/assets/css/` から
  `docs/assets/fonts/` へ）。**階層を変える場合はこの相対パスも見直す**こと。

### include の扱い

- `assets/include/` はサーバーサイド専用。`docs/.htaccess` が `include(` への直接アクセスを 403 にしています
- `<head>` には `<title>` / `<meta name="description">` / CSS / JS を**書かない**
  （すべて `header.php` が出力する）
- ページ先頭の変数ブロックは**1行で**書く（`build_docs.py` の正規表現が前提にしています）
  ```php
  <?php $ROOT = '.'; $PAGE_TITLE = 'ページ名 - 製品名 ドキュメント'; ?>
  <?php $ROOT = '.'; $PAGE_TITLE = 'ページ名 - 製品名 ドキュメント'; $PAGE_DESCRIPTION = '説明文'; ?>
  ```
  `$PAGE_DESCRIPTION` は任意。省略時は `$PAGE_TITLE + '。<製品名> の機能・設定方法を紹介するドキュメントです。'`

### デザイン

- 背景 `#0a0a0f` / アクセント `#00e5ff` のダークテーマ。**アクセント色は変更しない**
- 色は CSS カスタムプロパティ（`--bg-card`, `--accent`, `--border` など）を使う
- 使えるパーツ: `.feature-hero` / `.card-grid` / `.card` / `.steps` / `.alert alert-info|warning|danger`
  / `.table-wrapper` / `.command-block` / `.filter-bar` / `.update-card` / `.btn` / `.btn-outline`
  / `.tag tag-admin|tag-user|tag-feature|tag-bug|tag-info`

---

## 4. ビルド（静的プレビュー）

`include` を inlining して `dist/` に書き出します（ソースは変更しません）。

```powershell
cd docs\<slug>
python build_docs.py
```

- 出力先は `docs/<slug>/dist/`。`dist/` をブラウザで直接開けます
- `docs/<slug>/dist/` は **FTP にアップロードしない**（同梱の `.gitignore` が `dist/` を除外します）
- 静的プレビューが不要なら `build_docs.py` は削除して構いません
  （`cultivate` / `nexus` のみ `dist/` を運用）

---

## 5. 反映前チェックリスト

```powershell
# 構文チェック
php -l docs\<slug>\index.php
php -l docs\<slug>\assets\include\header.php

# ローカル確認
php -S localhost:8000 -t docs\<slug>
# → http://localhost:8000/ と http://localhost:8000/features/example を確認
```

- [ ] `TODO` / `製品名` / `slug` が残っていないか（`grep` で確認）
- [ ] サイドバーのリンク先ページがすべて存在する
- [ ] `.html` 付きリンクが残っていない
- [ ] モバイル幅（〜768px）でサイドバーが開閉できる
- [ ] `docs/index.php` のポータルからリンクされている
- [ ] 文字を追加したら `python tools/build_fonts.py --target docs` でフォントを再生成
