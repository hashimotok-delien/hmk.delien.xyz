<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '自動リアクション - master Bot ドキュメント'; $PAGE_DESCRIPTION = '自動リアクション - master Bot ドキュメント。メッセージ投稿時に自動でリアクションを付与'; ?>
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
        <div class="feature-icon">😊</div>
        <h1>自動リアクション</h1>
        <p>メッセージ投稿時に自動でリアクションを付与</p>
      </div>

      <h2>概要</h2>
      <p>
        自動リアクション機能は、指定したチャンネルにメッセージが投稿された際に、
        あらかじめ登録した絵文字を自動で付与する機能です。
      </p>

      <h2>設定方法</h2>
      <pre><code>/自動リアクション設定</code></pre>
      <p>
        コマンドを実行すると、設定用のパネルが表示されます。
        チャンネルを選択し、付与する絵文字を指定してください。
      </p>

      <h2>オプション</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>オプション</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>既存メッセージにも付与</td>
            <td>設定時点でチャンネルに存在するメッセージにもリアクションを付与します</td>
          </tr>
          <tr>
            <td>本文に絵文字がある場合のみ</td>
            <td>投稿本文に絵文字が含まれている場合のみリアクションを付与します</td>
          </tr>
          <tr>
            <td>絵文字1〜20</td>
            <td>付与する絵文字を最大20個まで指定できます</td>
          </tr>
        </tbody>
      </table></div>

      <h2>パネルの操作</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定解除</td>
            <td>そのチャンネルの自動リアクション設定を解除します</td>
          </tr>
          <tr>
            <td>再付与</td>
            <td>既存メッセージに対してリアクションを再付与します</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> リアクションを付与するには、Bot に「リアクションを追加」権限が必要です。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
