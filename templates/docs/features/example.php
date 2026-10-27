<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'サンプル機能 - 製品名 ドキュメント'; ?>
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
        <div class="feature-icon">✨</div>
        <h1>サンプル機能</h1>
        <p>（TODO: 機能のキャッチコピー）</p>
      </div>

      <h2>概要</h2>
      <p>
        （TODO: 機能の概要。何ができるのか、どんな場面で使うのか）
      </p>

      <h2>コマンド</h2>

      <h3>パネル設置</h3>
      <pre><code>/サンプルパネル設置</code></pre>
      <p>
        （TODO: コマンドの説明）
      </p>

      <h3>設定</h3>
      <pre><code>/サンプル設定</code></pre>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>option</td>
            <td>（TODO: 引数の説明）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
            <th>初期値</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>項目名</td>
            <td>（TODO: 項目の説明）</td>
            <td>—</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> （TODO: 補足事項）</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
