<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'ねくさす⋆˚ʚɞ ドキュメント'; ?>
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
        <div class="feature-icon">🌙</div>
        <h1>ねくさす⋆˚ʚɞ ドキュメント</h1>
        <p>界隈サーバーでの交流を、もっと楽しく。</p>
        <a href="getting-started" class="btn" style="margin-top: 20px;">導入する</a>
      </div>

      <!-- About -->
      <h2>ねくさす⋆˚ʚɞ とは</h2>
      <p>
        ねくさす⋆˚ʚɞ は、界隈サーバーの運営に必要な機能を1つにまとめた
        Discord Bot です。
        プロフィールの保存・鯖間プロフ、VC 交流計測、
        VC 滞在時間のランクシステムなどを、サーバーごとに設定して利用できます。
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
          <h3>📸 プロフィール保存</h3>
          <p>メッセージリンクからプロフィールを保存・再表示。保存したプロフはいつでも呼び出せます。</p>
        </div>

        <div class="card">
          <h3>🌐 マイプロフ（鯖間プロフ）</h3>
          <p>他鯖のプロフを引用したり、DM・プライベートスレッドに保存して持ち運べます。パネル設置でボタン操作。</p>
        </div>

        <div class="card">
          <h3>💬 交流計測</h3>
          <p>VC の同席状況を記録し、「たくさんの人と交流した人」をランキング化。性別や同性・異性などで絞り込めます。</p>
          <a href="features/exchange-measure">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🏆 ランクシステム</h3>
          <p>VC 滞在時間に応じて XP を獲得してレベルアップ。ミュート勢も安心の設計で、成長曲線も自由に設定できます。</p>
          <a href="features/rank">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🖥️ Bot 管理</h3>
          <p>Bot 所有者向けの管理コマンド。導入サーバー一覧の確認などができます。</p>
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
