<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'スポイラー判定 - Cultivate ドキュメント'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/../assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/../assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../assets/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">🔞</div>
        <h1>画像投稿スポイラー判定</h1>
        <p>指定チャンネルでのスポイラーなし画像投稿を禁止</p>
      </div>

      <h2>概要</h2>
      <p>
        画像投稿スポイラー判定機能は、指定したチャンネルでのスポイラーのない画像投稿を禁止する機能です。
        スポイラーなしで画像が投稿された場合、自動的に削除されます。
      </p>

      <h2>設定画面プレビュー</h2>
      <div class="preview" data-screen-preview>
        <script type="application/json">
{
  "ariaLabel": "スポイラー必須チャンネル設定のプレビュー",
  "screens": [
    {
      "channel": "設定パネル",
      "avatar": "🖼️",
      "embed": {
        "title": "スポイラー必須設定（プレビュー）",
        "color": "green",
        "desc": "### スポイラー必須チャンネル設定<br><br>#画像投稿, #スクショ共有",
        "fields": [
          {"name": "設定説明", "value": "以下から設定項目を選んでください。<br><br>• スポイラー必須チャンネル設定 — スポイラーを必須にするチャンネルを複数選択<br><br>※ 変更は一旦一時保存され、<strong>保存</strong> を押すまで DB には反映されません。"}
        ]
      },
      "select": "スポイラー必須設定項目を選んでね",
      "buttons": [
        {"label": "保存", "style": "green"},
        {"label": "キャンセル", "style": "danger"}
      ],
      "caption": "▲ <code>/設定パネル</code> から「🖼️ 画像投稿スポイラー判定」を開いたときの設定パネル。未保存の変更があると埋め込みの色が赤になります。"
    }
  ]
}
        </script>
      </div>

      <h2>設定方法</h2>
      <ol class="steps">
        <li>
          <strong>設定パネルを開く</strong>
          <code>/設定パネル</code> を実行
        </li>
        <li>
          <strong>スポイラー必須チャンネル設定を選択</strong>
          セレクトメニューから「スポイラー必須チャンネル設定」を選択
        </li>
        <li>
          <strong>対象チャンネルを選択</strong>
          スポイラーを必須にしたいチャンネルを選択（複数選択可）
        </li>
        <li>
          <strong>保存</strong>
          「戻る」→「保存」で設定を保存
        </li>
      </ol>

      <div class="alert alert-warning">
        <p><strong>⚠️ 注意:</strong> この機能が有効なチャンネルでは、スポイラー無しで画像を投稿すると自動的に削除されます。ユーザーには事前に周知しておくことを推奨します。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
