<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>投稿時ロール設定 - master Bot ドキュメント</title>
  <meta name="description" content="投稿時ロール設定 - master Bot ドキュメント。チャンネルへの投稿時に自動でロールを付与・剥奪">
  <link rel="stylesheet" href="../css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '..'; $PAGE_TITLE = '投稿時ロール設定'; ?>
  <?php include __DIR__ . '/../include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">📝</div>
        <h1>投稿時ロール設定</h1>
        <p>チャンネルへの投稿時に自動でロールを付与・剥奪</p>
      </div>

      <h2>概要</h2>
      <p>
        投稿時ロール設定は、特定のチャンネルにメッセージを投稿した際に、
        自動でロールを付与または剥奪する機能です。自己紹介チャンネルや規約同意チャンネルなどで利用できます。
      </p>

      <h2>設定方法</h2>
      <pre><code>/チャンネル投稿時ロール設定 [チャンネル]</code></pre>
      <p>
        チャンネルを省略すると、コマンドを実行したチャンネルが対象になります。
        実行すると設定画面が表示されます。
      </p>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>⭕ 投稿時付与ロール設定</td>
            <td>投稿時に付与するロールを選択します（1つ）</td>
          </tr>
          <tr>
            <td>❌ 投稿時削除ロール設定</td>
            <td>投稿時に剥奪するロールを選択します（1つ）</td>
          </tr>
          <tr>
            <td>🗑️ 投稿時ロール設定削除</td>
            <td>そのチャンネルの投稿時ロール設定をすべて削除します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>動作</h2>
      <ul>
        <li>設定したチャンネルにメッセージを投稿すると、付与・剥奪ロールが自動で反映されます。</li>
        <li>ロールの反映に成功すると、投稿に 👍 リアクションが付きます。</li>
        <li>付与・剥奪の対象は投稿者本人です。</li>
      </ul>

      <h2>手動でのロール付与</h2>
      <p>
        メッセージを右クリック（長押し）→「アプリ」→「メッセージ手動ロール付与」を実行すると、
        対象メッセージの投稿者に対して設定済みのロールを手動で反映できます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> 設定パネル（<code>/panel</code>）の ⭕ / ❌ ボタンからは、
        「ルールを順守します」と投稿したときにロールを反映する方式も設定できます。
        チャンネル単位の設定は <code>/チャンネル投稿時ロール設定</code> を使用してください。</p>
      </div>

      <?php include __DIR__ . '/../include/footer.php'; ?>
    </div>
  </main>
  <script src="../js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"></script>
</body>
</html>
