<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'プロフリアクション - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">❤️</div>
        <h1>プロフリアクション</h1>
        <p>プロフィールに付いたリアクションを確認</p>
      </div>

      <h2>概要</h2>
      <p>
        プロフリアクション機能は、自分のプロフィールメッセージに付いたリアクションを確認できる機能です。
        誰がどのリアクションを押したかをチェックできます。
      </p>

      <h2>ユーザー用コマンド</h2>

      <h3>リアクション確認</h3>
      <pre><code>/プロフリアクション確認</code></pre>
      <p>
        自分のプロフィールに付いたリアクション情報を調べます。
        結果は DM で送信されます。誰がリアクションしたか、どの絵文字が押されたかを確認できます。
      </p>

      <h2>管理者用コマンド</h2>

      <h3>プロフリアクション設定</h3>
      <pre><code>/プロフリアクション設定 &lt;モード&gt;</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>モード</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>登録</td>
            <td>プロフィールに使用するリアクションの絵文字を登録</td>
          </tr>
          <tr>
            <td>確認</td>
            <td>登録されているリアクション設定を確認</td>
          </tr>
          <tr>
            <td>削除</td>
            <td>登録されているリアクション設定を削除</td>
          </tr>
          <tr>
            <td>計測</td>
            <td>リアクションの統計情報を計測・表示</td>
          </tr>
        </tbody>
      </table></div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
