<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '製品名 ドキュメント'; $PAGE_DESCRIPTION = '製品名 の機能・設定方法を紹介するドキュメントです。'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/assets/include/header.php'; ?>
</head>
<body>

  <?php include __DIR__ . '/assets/include/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <?php include __DIR__ . '/assets/include/topbar.php'; ?>

    <div class="content">
      <!-- Hero -->
      <div class="feature-hero">
        <div class="feature-icon">📦</div>
        <h1>製品名 ドキュメント</h1>
        <p>（TODO: キャッチコピー）</p>
        <a href="getting-started" class="btn" style="margin-top: 20px;">導入する</a>
      </div>

      <!-- About -->
      <h2>製品名 とは</h2>
      <p>
        （TODO: 製品の概要。何ができるのか、誰向けなのかを書く）
      </p>
      <p>
        バージョン <strong>0.0.0</strong> ／ モジュール: <strong>-</strong>
        <span style="display: inline-block; margin-left: 16px;">
          <a href="updates" style="font-size: 0.9rem;">📋 更新履歴を見る</a>
        </span>
      </p>

      <!-- Features Grid -->
      <h2>機能一覧</h2>
      <div class="card-grid">

        <div class="card">
          <h3>✨ サンプル機能</h3>
          <p>（TODO: 機能の説明。1〜2 行で要点を書く）</p>
          <a href="features/example">詳しく見る →</a>
        </div>

        <!-- 機能を追加するときはこのカードを複製する
        <div class="card">
          <h3>🔧 機能名</h3>
          <p>機能の説明。</p>
          <a href="features/feature-slug">詳しく見る →</a>
        </div>
        -->

      </div>

      <!-- Support -->
      <h2>サポート</h2>
      <p>
        ご質問や不具合の報告は、サポートサーバーまでお気軽にお越しください。
      </p>
      <a href="https://discord.gg/xxxxxxxx" class="btn btn-outline" target="_blank">💬 サポートサーバーに参加</a>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
