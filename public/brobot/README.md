# 兄弟Bot 公式サイト（`web/public/brobot/`）

兄弟Bot の紹介ページです。
GitHub Actions（`.github/workflows/auto_docs.yml`）で
`hmk.delien.xyz` リポジトリの `public/brobot/` へ同期されます。

公開URL: <https://hmk.delien.xyz/brobot/>

---

## 1. 構成

```
web/public/brobot/
├── README.md                  … このファイル
├── index.php                  … ランディングページ（自己完結型・インラインCSS）
├── privacy.php                … プライバシーポリシー
├── terms.php                  … 利用規約
├── plans/
│   ├── index.php              … ご利用について（無料配布・利用形態・FAQ）
│   └── css/
│       └── style.css          … プラン・法務ページ共通のデザインシステム
└── assets/
    ├── include/
    │   ├── config.php         … 商品名・URL・著作権表記などの一元管理
    │   ├── header.php         … 共通ヘッダー
    │   └── footer.php         … 共通フッター
    └── img/
        ├── icon.svg           … ヒーロー / ヘッダーのアイコン
        └── og.png             … OGP 用（1200x630）
```

| ページ | URL | スタイル |
|---|---|---|
| `index.php` | `/brobot/` | ページ内にインライン `<style>` |
| `plans/index.php` | `/brobot/plans/` | `plans/css/style.css` |
| `privacy.php` | `/brobot/privacy` | `plans/css/style.css` + 最小限の追記 |
| `terms.php` | `/brobot/terms` | 〃 |

---

## 2. 更新するとき

### (1) 商品情報を変える

`assets/include/config.php` だけで全ページに反映されます。

| 変数 | 内容 |
|---|---|
| `$PRODUCT_NAME` | 表示名（`兄弟Bot`） |
| `$PRODUCT_EMOJI` | ロゴ横の絵文字 |
| `$PRODUCT_SLUG` | フォルダ名。ランディングのページ遷移アニメの判定に使用 |
| `$LOGO_LABEL` | ヘッダーロゴのラベル（各ページで上書き可） |
| `$DOCS_URL` | ドキュメントサイトの URL |
| `$SUPPORT_URL` | サポート窓口 |
| `$ICON_PATH` | アイコン画像への相対パス |
| `$ACCENT_RGB` | アクセント色の `R,G,B`（JS の遷移アニメ用） |
| `$SITE_OWNER` | `<title>` の `\|` 以降 |
| `$COPYRIGHT_HOLDER` / `$COPYRIGHT_URL` | フッターの著作権表記 |

> **注意:** `config.php` は必ず「何も出力しない」状態に保つこと。
> 各ページが `<!DOCTYPE html>` より前に `require` しているため、閉じタグ後の空白や改行でも
> 出力が始まるとレイアウトが崩れます（末尾に `?>` を書かないのが安全）。

### (2) 本文を書き換える

- `index.php` … キャッチコピー、できること、導入メリット、導入手順、使用イメージ
- `plans/index.php` … 利用形態・できること・導入の流れ・FAQ
- `privacy.php` / `terms.php` … **法務文面は必ず自サービスに合わせて見直す**

### (3) 画像

`assets/img/` に置き、`index.php` からは `./assets/img/...` で参照します。

```
assets/img/icon.svg   … ヒーロー / ヘッダーのアイコン（SVG）
assets/img/og.png     … OGP 用（1200x630）
```

- ヒーロー以外の画像は `loading="lazy" decoding="async"` を付け、
  `width` / `height` を明記する（CLS 対策）。
- Gyazo などの外部URLを直接貼るのは避ける（リンク切れ・外部依存・表示遅延の原因）。

### (4) 使用イメージについて

ランディングの「使用イメージ」は、スクリーンショット画像ではなく
HTML/CSS でパネルUIを再現しています（`.panel-preview`）。
実際のスクリーンショットに差し替える場合は、`.panel-preview` のブロックを
`<picture>` に置き換えてください。

---

## 3. 気をつけること

- 内部リンクは**拡張子なし**で書く（`.php` は付けない。フォルダのトップは `./`）。
- `assets/include/` は doc-hub 側の `.htaccess` で直接アクセス禁止になっている。
- favicon とフォントは `../`（doc-hub の `public/` 直下）を参照している。
