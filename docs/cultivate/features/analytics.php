<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'アナリティクス - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">📊</div>
        <h1>アナリティクス</h1>
        <p>サーバーのデータをグラフで可視化</p>
      </div>

      <h2>概要</h2>
      <p>
        アナリティクス機能は、サーバーの各種データをグラフで表示する機能です。
        現在は性別比率の表示に対応しています。
      </p>

      <h2>コマンド</h2>
      <pre><code>/analytics &lt;type&gt;</code></pre>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>type</td>
            <td>表示する項目（現在は「性別」のみ対応）</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> この機能は拡張予定です。今後のアップデートでより多くのデータ指標に対応する予定です。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
