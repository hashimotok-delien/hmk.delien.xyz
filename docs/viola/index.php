<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>master Bot ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '.'; $PAGE_TITLE = 'トップ'; ?>

  <?php include __DIR__ . '/include/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <?php include __DIR__ . '/include/topbar.php'; ?>

    <div class="content">
      <!-- Hero -->
      <div class="feature-hero">
        <div class="feature-icon">🤖</div>
        <h1>master Bot ドキュメント</h1>
        <p>サーバー運営に必要な機能を1つにまとめた多機能 Bot</p>
        <a href="getting-started" class="btn" style="margin-top: 20px;">導入する</a>
      </div>

      <!-- About -->
      <h2>master Bot とは</h2>
      <p>
        master Bot は、Discord サーバーの運営を自動化・効率化するために開発された多機能 Bot です。
        役職パネル、個室・2shot、募集、寝落ち送り、プロフィール v2、自動リアクションなど、
        サーバー運営に必要な機能を1つにまとめて提供します。
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
          <h3>⚙️ 設定パネル</h3>
          <p>Bot の各種設定を一元管理するパネル。寝落ち送り・部屋作成先カテゴリ・申請制限ロール・投稿時ロールを設定できます。</p>
          <a href="features/settings">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>👤 役職パネル</h3>
          <p>ユーザー自身がロールを選択・取得できるパネルを設置。付与専用・取外専用・許可・禁止・特殊の種類に対応します。</p>
          <a href="features/role-panel">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>📝 投稿時ロール設定</h3>
          <p>チャンネルごとに、メッセージ投稿時に自動で付与・剥奪するロールを設定。運営の手間を削減します。</p>
          <a href="features/ch-role">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>😊 自動リアクション</h3>
          <p>メッセージ投稿時に自動でリアクションを追加。既存メッセージへの一括付与や設定の解除も可能です。</p>
          <a href="features/auto-reaction">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🔒 個室・2shot</h3>
          <p>ボタン操作で表/裏の個室・2shot VCを自動生成。二人専用のVCを安全に作成できます。</p>
          <a href="features/vc-room">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🤝 DM/フレンド開通</h3>
          <p>DM・フレンド開通の申請をパネルのボタンから送信。相手は「いいよ / 仲良くなったら / ごめんね」で回答できます。</p>
          <a href="features/dm-friend">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>📢 募集</h3>
          <p>表募集パネルと裏募集パネルを設置。プリセット管理・立候補・通知までをまとめて行えます。</p>
          <a href="features/recruitment">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🖼️ プロフィール v2</h3>
          <p>メッセージリンクからプロフィールを保存・再表示。カードデザインやVCインチャプロフをカスタマイズできます。</p>
          <a href="features/profile-v2">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>📝 プロフテンプレートチェック</h3>
          <p>プロフィールが指定テンプレートに沿っているかを自動検証。項目・順番・記入内容などをチェックします。</p>
          <a href="features/profile-template-check">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>💤 寝落ち送り</h3>
          <p>「寝落ち送り」チャンネルでメンションされたメンバーを「寝落ち部屋」VCへ自動移動します。</p>
          <a href="features/settings">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🖥️ サーバースペック</h3>
          <p>master Bot の運営に使用している PC・回線環境の構成をまとめたページです。</p>
          <a href="server-spec">詳しく見る →</a>
        </div>

      </div>

      <!-- Support -->
      <h2>サポート</h2>
      <p>
        ご質問や不具合の報告は、サポートサーバーまでお気軽にお越しください。
      </p>
      <a href="https://discord.gg/AmMkFhhD2D" class="btn btn-outline" target="_blank">💬 サポートサーバーに参加</a>

      <?php include __DIR__ . '/include/footer.php'; ?>
    </div>
  </main>

  <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/js/main.js') ?: time() ?>"></script>
</body>
</html>
