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
