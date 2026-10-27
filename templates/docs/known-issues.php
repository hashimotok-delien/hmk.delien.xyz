<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '既知の不具合 - 製品名 ドキュメント'; ?>
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
      <h1>⚠️ 既知の不具合</h1>
      <p>現在確認されている既知の不具合と、その回避策・対応状況をまとめています。</p>

      <div class="alert alert-warning">
        <p><strong>💡 注意:</strong> このページの内容は予告なく変更される場合があります。不具合に遭遇した場合はサポートサーバーまでご報告ください。</p>
      </div>

      <!-- 不具合を追加するときはこのまとまりを複製する
      <h2>🎯 機能名</h2>

      <h3>不具合のタイトル</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>機能名</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>低 / 中 / 高</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>調査中 / 修正予定 / 修正済み</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-danger">
        <p><strong>🔧 不具合内容:</strong></p>
        <ul>
          <li>不具合の内容。</li>
        </ul>
      </div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>回避策。</li>
        </ul>
      </div>
      -->

      <p>現在、報告されている既知の不具合はありません。</p>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
