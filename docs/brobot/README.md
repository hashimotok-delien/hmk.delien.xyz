# 兄弟Bot ドキュメントサイト（`web/docs/brobot/`）

兄弟Bot の機能・コマンド・設定方法をまとめたドキュメントサイトです。
GitHub Actions（`.github/workflows/auto_docs.yml`）で
`hmk.delien.xyz` リポジトリの `docs/brobot/` へ同期されます。

公開URL: <https://docs.delien.xyz/brobot/>

---

## 1. 構成

```
web/docs/brobot/
├── README.md                  … このファイル
├── index.php                  … トップ（ヒーロー / 概要 / 機能カード / サポート）
├── getting-started.php        … 導入方法（手順・初期設定）
├── commands.php               … コマンド一覧
├── faq.php                    … FAQ
├── known-issues.php           … 既知の不具合
├── updates.php                … 更新履歴（タグ絞り込み付き）
├── features/
│   ├── rolling.php            … 個室リレーv2
│   ├── random-meeting.php     … ランダム会議
│   ├── group-date.php         … 合コン進行
│   ├── auto-chair.php         … 全自動椅子取りv2
│   ├── sticky.php             … スティッキーメッセージ
│   └── server-tools.php       … サーバー運営ツール
├── build_docs.py              … include を inlining して dist/ を生成（静的プレビュー用）
└── assets/
    ├── css/style.css          … デザインシステム（ダークテーマ）
    ├── js/main.js             … サイドバー・絞り込み・コピーボタン
    ├── img/
    │   ├── favicon.svg        … サイトアイコン
    │   └── social-preview.png … OGP 画像（1200x630）
    └── include/
        ├── header.php         … <head> 一式（title / meta / OGP / CSS / JS）
        ├── sidebar.php        … サイドバーナビ
        ├── topbar.php         … トップバー
        └── footer.php         … フッター
```

| ページ | URL | `$ROOT` |
|---|---|---|
| `index.php` | `/brobot/` | `'.'` |
| `getting-started.php` | `/brobot/getting-started` | `'.'` |
| `commands.php` | `/brobot/commands` | `'.'` |
| `faq.php` | `/brobot/faq` | `'.'` |
| `known-issues.php` | `/brobot/known-issues` | `'.'` |
| `updates.php` | `/brobot/updates` | `'.'` |
| `features/*.php` | `/brobot/features/<name>` | `'..'` |

---

## 2. 更新するとき

### (1) 本文を書き換える

各ページは PHP の `include` で共通パーツを読み込むだけの素朴な構成です。
HTML を直接編集して構いません。

`$ROOT` はページの階層で変わります。**include より前に必ず代入してください。**

- サイト直下（`index.php` など）… `$ROOT = '.'`
- `features/*.php`（1階層下）… `$ROOT = '..'`

### (2) 機能ページを追加する

1. `features/` に `<feature-slug>.php` を作成（既存ファイルを複製するのが早い）
2 `$ROOT = '..'` と `__DIR__ . '/../assets/include/...'` は変更しない
3. `$PAGE_TITLE` と `$PAGE_DESCRIPTION` を書き換える
4. `assets/include/sidebar.php` の「機能」セクションにリンクを追加
5. `index.php` の機能カードにも追加

### (3) コマンドを追加したとき

- `commands.php` の該当セクションに `.command-block` を追加
- 引数がある場合は `.cmd-args` に `<code>` で列挙
- 権限は `.tag-admin`（管理者専用）/ `.tag-user`（運営・ユーザー用）で表現

### (4) 更新履歴を追加するとき

`updates.php` の先頭に、`div.update-version` と `div.update-card` をセットで追記します。

- `data-tags` は `feature` / `bug` / `info` のいずれか（空白区切りで複数可）
- `data-tags` の値は `.filter-tag` の `data-filter` と揃える

### (5) OGP 画像を差し替えるとき

`assets/img/social-preview.png`（1200x630）を置き換えてください。
存在しない場合、OGP 画像の URL が 404 になります。

---

## 3. ローカルプレビュー

PHP を実行できない環境でも、`build_docs.py` で include を展開した
静的 HTML を `dist/` に生成できます。

```powershell
cd web\docs\brobot
python build_docs.py
```

`dist/` は `.gitignore` で除外されています。

---

## 4. 気をつけること

- **拡張子なしURLが正規形。** 内部リンクは `getting-started`、
  `features/rolling`、`./` のように書く（`.php` は付けない）。
- **`$ROOT` はページの階層で変わる。** include 前に必ず代入する。
- CSS 内のフォントは `../../../assets/fonts/` を参照している
  （`docs/<slug>/assets/css/` から `docs/assets/fonts/` へ）。
  階層を変える場合はこの相対パスも見直すこと。
- `build_docs.py` の先頭にある `SITE_NAME` / `PRODUCT_NAME` / `SITE_SLUG` は
  サイト名を変えたときに一緒に更新する。
