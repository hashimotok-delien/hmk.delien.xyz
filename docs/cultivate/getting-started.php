<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '導入方法 - Cultivate ドキュメント'; ?>
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
      <h1>🚀 導入方法</h1>
      <p>
        Cultivate をサーバーに導入する手順を説明します。
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
        <p><strong>💡 注意:</strong> Cultivate は界隈サーバー専用の無料配布 Bot です。導入にはサーバー管理者権限が必要です。</p>
      </div>

      <h2>初期設定</h2>
      <p>Bot が参加したら、以下の設定を行ってください。</p>

      <h3>1. 設定パネルを開く</h3>
      <p>
        管理者権限を持つアカウントで、以下のコマンドを実行します。
      </p>
      <pre><code>/設定パネル</code></pre>
      <p>
        設定パネルが表示されます。このパネルは管理用のため、一般ユーザーから見えないチャンネルに設置することを推奨します。
      </p>

      <h3>2. 各機能の設定</h3>
      <p>設定パネルから以下の機能を ON/OFF できます。</p>
      <ul>
        <li><strong>寝落ち送り機能</strong> — VC 寝落ちメンバーの自動移動</li>
        <li><strong>Bot 接続時自動人数調整</strong> — Bot の VC 入退室時の人数制限調整</li>
        <li><strong>画像投稿スポイラー判定</strong> — スポイラーなし画像の自動削除</li>
      </ul>

      <h3>3. 各機能の詳細設定</h3>
      <p>
        各機能の詳細な設定方法は、サイドバーから各機能のドキュメントを参照してください。
      </p>

      <div class="card-grid" style="margin-top: 32px;">
        <!-- <div class="card">
          <h3>👤 役職パネル</h3>
          <p>ユーザー自身がロールを選択できるパネルを設置します。</p>
          <a href="features/role-panel">設定方法 →</a>
        </div> -->
        <div class="card">
          <h3>🔒 裏2shot</h3>
          <p>性別ベースのプライベート VC を作成します。</p>
          <a href="features/back-2shot">設定方法 →</a>
        </div>
        <div class="card">
          <h3>📌 吊下げメッセージ</h3>
          <p>チャンネルに固定メッセージを表示します。</p>
          <a href="features/sticky">設定方法 →</a>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
