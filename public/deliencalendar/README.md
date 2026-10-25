# DeLien Calendar 紹介ページ（`web/public/deliencalendar/`）

[hmk.delien.xyz](https://hmk.delien.xyz/) の商品紹介ページテンプレートから作成した、
DeLien Calendar のランディングページです。

Web アプリ本体は `src/`（calendar.delien.xyz）で、このフォルダは **紹介ページのみ** を担当します。
有料プラン向けの `plans/` はこのプロジェクトでは不要なため削除済みです。

---

## 1. 構成

```
web/public/deliencalendar/
├── .htaccess               … 拡張子なしURLの内部マッピング・include ディレクトリの保護
├── index.php               … ランディングページ（自己完結型・インラインCSS）
├── privacy.php             … プライバシーポリシー（文面は要作成）
├── terms.php               … 利用規約（文面は要作成）
└── assets/
    ├── css/style.css       … 法務ページ共通のデザインシステム
    ├── img/                … アイコン・OGP画像（`src/assets/img/` から複製）
    └── include/
        ├── config.php      … 商品名・URL・著作権表記などの一元管理
        ├── header.php      … 共通ヘッダー（法務ページ用）
        └── footer.php      … 共通フッター（法務ページ用）
```

| ページ | URL |
|---|---|
| `index.php` | `/deliencalendar` (`/deliencalendar/`) |
| `privacy.php` | `/deliencalendar/privacy` |
| `terms.php` | `/deliencalendar/terms` |

`index.php` はスタイルをページ内に持ち、それ以外のページは `assets/css/style.css` を読み込みます。

---

## 2. 文言・リンクの変更

[assets/include/config.php](assets/include/config.php) の変数だけで全ページに反映されます。

| 変数 | 内容 |
|---|---|
| `$PRODUCT_NAME` / `$PRODUCT_EMOJI` | 表示名とロゴ横の絵文字 |
| `$PRODUCT_SLUG` | フォルダ名（ページ遷移アニメの判定に使用） |
| `$APP_URL` | Web アプリ本体の URL |
| `$APP_DOWNLOAD_URL` | Windows デスクトップアプリの配布元 |
| `$DOCS_URL` | 開発者ドキュメント |
| `$SUPPORT_URL` / `$SUPPORT_LABEL` | サポート窓口 |
| `$ICON_PATH` | ヘッダーのアイコン画像 |
| `$SITE_OWNER` | `<title>` の `\|` 以降 |
| `$COPYRIGHT_HOLDER` / `$COPYRIGHT_URL` | フッターの著作権表記 |

> **注意:** `config.php` は必ず「何も出力しない」状態に保つこと。
> 各ページが `<!DOCTYPE html>` より前に `require` しているため、閉じタグ後の空白や改行でも
> 出力が始まるとレイアウトが崩れます（末尾に `?>` を書かないのが安全）。

---

## 3. 画像

`assets/img/` に置き、ページからは `assets/img/...` で参照します。

| ファイル | 用途 |
|---|---|
| `icon-192.png` | ヒーローのアイコン（120px 表示） |
| `favicon.ico` / `favicon-32x32.png` / `favicon-16x16.png` | favicon |
| `apple-touch-icon.png` | iOS ホーム画面 |
| `ogp.png` | OGP 画像（`og:image` は実行時に絶対URLへ変換） |

いずれも `src/assets/img/` から複製したものです。差し替える場合は両方を更新してください。

---

## 4. 前提

- **拡張子なしURLが正規形。** 内部リンクは `privacy`、`terms` のように書きます（`.php` は付けない）。
  `.htaccess` が拡張子なしアクセスを `*.php` に内部マッピングします。
- `.htaccess` は `RewriteEngine` が使えるサーバー（Apache）前提です。
- サイト内リンクには JavaScript のページ遷移アニメが入ります。`target` 付き・外部URLは対象外です。

---

## 5. 公開前の TODO

- [ ] `privacy.php` / `terms.php` の `<TODO>` を自サービスに合わせて書き直す（テンプレート文のまま公開しない）
- [ ] `$SUPPORT_URL` を実際の窓口（Discord 招待など）に合わせる
- [ ] `ogp.png` を紹介ページ用の画像に差し替えるか検討する
