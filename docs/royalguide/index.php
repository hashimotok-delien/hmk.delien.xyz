<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'RoyalGuide ドキュメント'; $PAGE_DESCRIPTION = 'RoyalGuide の投稿者プリセット・保存先チャンネル設定・SoundCloud 再生の使い方をまとめたドキュメントです。'; ?>
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
        <div class="feature-icon">👑</div>
        <h1>RoyalGuide ドキュメント</h1>
        <p>サーバー運用の“面倒”を、ボタンひとつに。</p>
        <a href="getting-started" class="btn" style="margin-top: 20px;">導入する</a>
      </div>

      <!-- About -->
      <h2>RoyalGuide とは</h2>
      <p>
        RoyalGuide は、Discord サーバーで使う「投稿者プリセット」「保存先チャンネル」
        「SoundCloud 再生」をひとつにまとめた Bot です。設定はスラッシュコマンドと
        ボタン操作だけで完結し、機能ごとに独立した Cog で構成されています。
      </p>
      <p>
        バージョン <strong>1.0.0</strong> ／ モジュール: <strong>discord.py</strong>
        <span style="display: inline-block; margin-left: 16px;">
          <a href="updates" style="font-size: 0.9rem;">📋 更新履歴を見る</a>
        </span>
      </p>

      <!-- Features Grid -->
      <h2>機能一覧</h2>
      <div class="card-grid">

        <div class="card">
          <h3>👤 投稿者プリセット</h3>
          <p>Webhook 投稿に使う投稿者名・アイコンをプリセットとして登録・切替できます。最大24件。</p>
          <a href="features/authors">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🗂 基本設定（保存先チャンネル）</h3>
          <p>グローバル／投稿者設定／交流スタンプラリーの保存先チャンネルを一元管理します。</p>
          <a href="features/base-settings">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🎧 SoundCloud 再生</h3>
          <p>URL を貼るだけでボイスチャンネルに再生。キュー・ループ・シャッフル・音量調整に対応。</p>
          <a href="features/soundcloud">詳しく見る →</a>
        </div>

      </div>

      <!-- Support -->
      <h2>サポート</h2>
      <p>
        ご質問や不具合の報告は、サポートサーバーまでお気軽にお越しください。
      </p>
      <a href="https://discord.gg/AmMkFhhD2D" class="btn btn-outline" target="_blank">💬 サポートサーバーに参加</a>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
