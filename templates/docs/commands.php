<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'コマンド一覧 - 製品名 ドキュメント'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/assets/include/topbar.php'; ?>

    <div class="content">
      <h1>📜 コマンド一覧</h1>
      <p>
        使用できる全コマンドの一覧です。
        <span class="tag tag-admin">管理者専用</span>
        <span class="tag tag-user">ユーザー用</span>
      </p>

      <h2>コマンド</h2>

      <h3>🔧 設定・管理</h3>

      <div class="command-block">
        <div class="cmd-name">/設定パネル</div>
        <div class="cmd-desc">（TODO: コマンドの説明）</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <!-- コマンドを追加するときはこのブロックを複製する
      <div class="command-block">
        <div class="cmd-name">/コマンド名</div>
        <div class="cmd-desc">コマンドの説明。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>
      -->

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
