<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>導入方法 - master Bot ドキュメント</title>
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '.'; $PAGE_TITLE = '導入方法'; ?>
  <?php include __DIR__ . '/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/include/topbar.php'; ?>

    <div class="content">
      <h1>🚀 導入方法</h1>
      <p>
        master Bot をサーバーに導入する手順を説明します。
      </p>

      <h2>導入の流れ</h2>
      <ol class="steps">
        <li>
          <strong>サポートサーバーに参加</strong>
          下記のリンクからサポートサーバーに参加してください。
          <br>
          <a href="https://discord.gg/AmMkFhhD2D" class="btn btn-outline" style="margin-top: 8px;" target="_blank">サポートサーバーへ</a>
        </li>
        <li>
          <strong>ルールを確認・同意</strong>
          サポートサーバー内のルールを確認し、同意してください。
        </li>
        <li>
          <strong>導入チケットを送信</strong>
          サポートサーバー内のチケットシステムから導入リクエストを送信してください。
          導入にはサーバーの管理者権限が必要です。
        </li>
        <li>
          <strong>Bot が参加</strong>
          チケット処理後、Bot があなたのサーバーに参加します。
        </li>
      </ol>

      <div class="alert alert-info">
        <p><strong>💡 注意:</strong> master Bot は界隈サーバー専用の無料配布 Bot です。導入にはサーバー管理者権限が必要です。</p>
      </div>

      <h2>初期設定</h2>
      <p>Bot が参加したら、以下の設定を行ってください。</p>

      <h3>1. 設定パネルを開く</h3>
      <p>
        管理者権限を持つアカウントで、以下のコマンドを実行します。
      </p>
      <pre><code>/panel</code></pre>
      <p>
        設定パネルが表示されます。このパネルは管理用のため、一般ユーザーから見えないチャンネルに設置することを推奨します。
      </p>

      <h3>2. 各機能の設定</h3>
      <p>設定パネルから以下の設定を行えます。</p>
      <ul>
        <li><strong>寝落ち送り</strong> — VC 寝落ちメンバーの自動移動の ON/OFF</li>
        <li><strong>部屋作成先カテゴリ</strong> — 表/裏 2shot・個室 の作成先カテゴリの登録・解除</li>
        <li><strong>申請制限ロール</strong> — 個室・DM/フレンド申請を制限するロールの登録・解除</li>
        <li><strong>投稿時ロール</strong> — 投稿時に付与・剥奪するロールの設定</li>
      </ul>

      <h3>3. 各パネルの設置</h3>
      <p>
        利用する機能のパネルを、任意のチャンネルに設置します。
      </p>
      <pre><code>/役職パネル &lt;タイトル&gt; &lt;種類&gt; &lt;ロールA&gt;
/表2shot作成用パネル
/裏2shot作成用パネル
/表個室作成用パネル
/裏個室作成用パネル
/dmフレンド開通用パネル
/表募集作成用パネル</code></pre>

      <h3>4. 各機能の詳細設定</h3>
      <p>
        各機能の詳細な設定方法は、サイドバーから各機能のドキュメントを参照してください。
      </p>

      <div class="card-grid" style="margin-top: 32px;">
        <div class="card">
          <h3>⚙️ 設定パネル</h3>
          <p>サーバー単位の各種設定をボタンから一括管理します。</p>
          <a href="features/settings">設定方法 →</a>
        </div>
        <div class="card">
          <h3>👤 役職パネル</h3>
          <p>ユーザー自身がロールを選択できるパネルを設置します。</p>
          <a href="features/role-panel">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🔒 個室・2shot</h3>
          <p>二人専用のプライベート VC を作成します。</p>
          <a href="features/vc-room">設定方法 →</a>
        </div>
      </div>

      <?php include __DIR__ . '/include/footer.php'; ?>
    </div>
  </main>

  <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/js/main.js') ?: time() ?>"></script>
</body>
</html>
