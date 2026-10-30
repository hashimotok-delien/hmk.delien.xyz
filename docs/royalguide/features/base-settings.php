<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '基本設定 - RoyalGuide ドキュメント'; ?>
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
        <div class="feature-icon">🗂</div>
        <h1>基本設定（保存先チャンネル）</h1>
        <p>各機能がファイルや画像を保存するチャンネルを、1か所でまとめて決める。</p>
      </div>

      <h2>概要</h2>
      <p>
        基本設定では、機能が画像などを投稿・保存する「保存先チャンネル」を管理します。
        機能ごとに個別の保存先を指定することも、共通の保存先にまとめることもできます。
      </p>

      <h2>コマンド</h2>

      <h3>設定パネルを開く</h3>
      <pre><code>/基本設定</code></pre>
      <p>
        サーバー管理者のみ実行できます。パネルのボタンから設定したい項目を選び、
        保存先のチャンネルを指定します。
      </p>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🌐 グローバルチャンネル</td>
            <td>全機能のデフォルト保存先。個別設定がない機能はここを使います。</td>
          </tr>
          <tr>
            <td>📁 投稿者設定チャンネル</td>
            <td>投稿者設定でアップロードした画像の保存先。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>保存先の決まり方</h2>
      <p>保存先チャンネルは、次の優先順位で自動的に決まります。</p>
      <ol class="steps">
        <li>
          <strong>機能ごとの個別設定</strong>
          その機能専用の保存先が設定されていれば、それを使います。
        </li>
        <li>
          <strong>グローバルチャンネル</strong>
          個別設定がない場合は、グローバルチャンネルを使います。
        </li>
        <li>
          <strong>機能の既定値</strong>
          グローバルも未設定の場合は、機能ごとの既定値が使われます。
        </li>
      </ol>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> まず「🌐 グローバルチャンネル」だけ設定しておけば、
        各機能はそのまま動作します。特定の機能だけ別のチャンネルに分けたい場合に、
        個別の設定を追加してください。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
