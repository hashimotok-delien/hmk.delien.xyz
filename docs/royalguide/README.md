# RoyalGuide ドキュメントサイト

Discord Bot「RoyalGuide」の使い方ドキュメントです。

- 公開URL: <https://docs.delien.xyz/royalguide/>
- 公式サイト: <https://hmk.delien.xyz/royalguide/>
- サポートサーバー: <https://discord.gg/AmMkFhhD2D>

このフォルダは、`main` / `master` / `dev` へ push すると
`.github/workflows/auto_docs.yml` が `hashimotok-delien/hmk.delien.xyz` の
`docs/royalguide/` へ同期します。

## 構成

```
royalguide/
├── index.php              … トップ（概要・機能カード）
├── getting-started.php    … 導入方法
├── commands.php           … コマンド一覧
├── faq.php                … FAQ
├── known-issues.php       … 既知の不具合・仕様上の制限
├── updates.php            … 更新履歴
├── features/
│   ├── authors.php        … 投稿者プリセット
│   ├── base-settings.php  … 基本設定（保存先チャンネル）
│   └── soundcloud.php     … SoundCloud 再生
├── build_docs.py          … include を展開して dist/ を作る静的プレビュー用スクリプト
└── assets/
    ├── css/style.css      … デザインシステム（変更不要）
    ├── js/main.js         … サイドバー・絞り込み・コピーボタン
    ├── img/               … favicon と OGP 画像
    └── include/           … header / sidebar / topbar / footer
```

## ページの追加

1. 既存ページを複製する（`features/` 配下なら `$ROOT = '..'` のまま）
2. 先頭の変数ブロックを**1行で**書き換える

   ```php
   <?php $ROOT = '.'; $PAGE_TITLE = 'ページ名 - RoyalGuide ドキュメント'; ?>
   ```

   `$PAGE_DESCRIPTION` は任意。省略時は `$PAGE_TITLE` から自動生成されます。
3. `assets/include/sidebar.php` にナビゲーションリンクを追加する
4. `index.php` の機能カードにも追加する

## 注意

- **内部リンクは拡張子なし**で書く（`getting-started`、`features/authors`、`./`）。
- `$ROOT` は階層で変わる。サイト直下は `'.'`、`features/*.php` は `'..'`。
- `<head>` に `<title>` / CSS / JS を書かない（すべて `header.php` が出力する）。
- `build_docs.py` の `SITE_NAME` / `PRODUCT_NAME` / `SITE_SLUG` は設定済み。

## ローカル確認

```powershell
php -l web\docs\royalguide\index.php
php -l web\docs\royalguide\features\authors.php

php -S localhost:8001 -t web\docs\royalguide
# → http://localhost:8001/ と http://localhost:8001/features/authors

# 静的な dist/ を作る場合
cd web\docs\royalguide
python build_docs.py
```

`dist/` は `.gitignore` で除外されています（アップロードしません）。
