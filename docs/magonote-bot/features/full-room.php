<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '満室機能 - まごの手 ドキュメント'; $PAGE_DESCRIPTION = '満室機能 - まごの手 ドキュメント。満室機能は、自分が接続している VC のルーム名の先頭に 🈵 を付けたり外したりできる機能です。 ルームが満室であることを他のメンバーにひと目で伝えられます。'; ?>
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
        <div class="feature-icon">🈵</div>
        <h1>満室機能</h1>
        <p>VC ルーム名で満室をひと目で把握</p>
      </div>

      <h2>概要</h2>
      <p>
        満室機能は、自分が接続している VC のルーム名の先頭に 🈵 を付けたり外したりできる機能です。
        ルームが満室であることを他のメンバーにひと目で伝えられます。
      </p>

      <h2>使い方</h2>

      <h3>満室を設定</h3>
      <p>
        <code>/満室</code> コマンドを実行すると、自分が接続中の VC ルーム名の先頭に 🈵 が追加されます。
      </p>

      <h3>満室を解除</h3>
      <p>
        <code>/満室解除</code> コマンドを実行すると、VC ルーム名から 🈵 が削除されます。
      </p>

      <div class="alert alert-warning">
        <p><strong>⚠ 注意:</strong> VC に接続していない状態ではコマンドは実行できません。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
