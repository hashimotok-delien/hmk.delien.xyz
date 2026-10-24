<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '取得ロール確認 - まごの手 ドキュメント'; $PAGE_DESCRIPTION = '取得ロール確認 - まごの手 ドキュメント。取得ロール確認機能は、自分に付与されているロールの一覧を エフェメラル（自分だけに見える）メッセージで表示するパネルを提供します。'; ?>
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
        <div class="feature-icon">✅</div>
        <h1>取得ロール確認</h1>
        <p>自分に付与されているロールを確認</p>
      </div>

      <h2>概要</h2>
      <p>
        取得ロール確認機能は、自分に付与されているロールの一覧を
        エフェメラル（自分だけに見える）メッセージで表示するパネルを提供します。
      </p>

      <h2>使い方</h2>

      <h3>パネルの設置</h3>
      <p>
        管理者が <code>/取得ロール確認パネル</code> コマンドを実行すると確認パネルが設置されます。
      </p>

      <h3>ロールを確認</h3>
      <p>
        パネルの「ロール確認」ボタンを押すと、自分に付与されているロール一覧が
        エフェメラルメッセージで表示されます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> 結果は自分にしか見えないエフェメラルメッセージで表示されるため、他のメンバーに見られる心配はありません。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
