# RoyalGuide 公式サイト

Discord Bot「RoyalGuide」の紹介ページです（投稿者プリセット・基本設定・SoundCloud 再生・読み上げ・音声設定）。

- 公開URL: <https://hmk.delien.xyz/royalguide/>
- ドキュメント: <https://docs.delien.xyz/royalguide/>
- サポートサーバー: <https://discord.gg/AmMkFhhD2D>

このフォルダは、`main` / `master` / `dev` へ push すると
`.github/workflows/auto_docs.yml` が `hashimotok-delien/hmk.delien.xyz` の
`public/royalguide/` へ同期します。

## 構成

```
royalguide/
├── index.php              … 紹介ページ（自己完結型・インラインCSS）
├── privacy.php            … プライバシーポリシー
├── terms.php              … 利用規約
└── assets/
    ├── css/legal.css      … 法務ページ共通のスタイル
    ├── img/
    │   ├── icon.webp      … ヒーローアイコン（2x = 240px）
    │   ├── icon-120.webp  … ヒーローアイコン（1x = 120px）
    │   └── og.png         … OGP 画像（1200x630）
    └── include/
        ├── config.php     … 商品名・URL・著作権表記の一元管理
        ├── header.php     … 法務ページの共通ヘッダー
        └── footer.php     … 共通フッター
```

## 編集する場所

| やりたいこと | ファイル |
|---|---|
| Bot 名・ドキュメントURL・サポートURL・著作権の変更 | `assets/include/config.php` |
| キャッチコピー・機能紹介・コマンド例 | `index.php` |
| 法務文面 | `privacy.php` / `terms.php` |

`config.php` は**何も出力しない**状態を保ってください。
各ページが `<!DOCTYPE html>` より前に読み込むため、閉じタグ後の改行でも
レイアウトが崩れます（末尾に `?>` を書かないこと）。

## 気をつけること

- **内部リンクは拡張子なし**で書く（`terms`、`./`）。`terms.php` は書かない。
- アクセント色は `--accent` / `--accent-rgb` / `$ACCENT_RGB` の3か所を揃える。
- 画像を差し替えたら `?v=<?= @filemtime(...) ?>` があるため、キャッシュは自動で切れる。
  アイコンを差し替える場合は `icon.webp`（240px）と `icon-120.webp`（120px）の両方と、
  必要に応じて `og.png`（1200x630）を書き出す。
- `$PRODUCT_SLUG` はフォルダ名（`royalguide`）と一致させる（ページ遷移アニメの判定に使用）。
- `index.php` の `a` 要素はクリックを横取りして遷移する。外部リンクには
  `target="_blank" rel="noopener"` を付けること。

## 動作確認

```powershell
php -l web\public\royalguide\index.php
php -l web\public\royalguide\privacy.php
php -l web\public\royalguide\terms.php

# ローカルプレビュー（web/public をドキュメントルートにする）
php -S localhost:8000 -t web\public
# → http://localhost:8000/royalguide/
```
