<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'キーワードロール - まごの手 ドキュメント'; $PAGE_DESCRIPTION = 'キーワードロール - まごの手 ドキュメント。投稿内容に応じて自動でロールを付与・剥奪'; ?>
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
        <div class="feature-icon">⌨️</div>
        <h1>キーワードロール</h1>
        <p>投稿内容に応じて自動でロールを付与・剥奪</p>
      </div>

      <h2>概要</h2>
      <p>
        キーワードロール機能は、特定のチャンネルで特定のキーワードを含むメッセージを
        投稿したメンバーに対して、自動でロールの付与・剥奪を行う機能です。
        例として、自己紹介チャンネルで「名前」と投稿すると自動でロールが付与される、
        といった使い方ができます。
      </p>

      <h2>設定</h2>
      <p>
        <code>config.yml</code> の <code>keyword_role</code> セクションで設定します。
      </p>

      <pre><code>keyword_role:
  0:
    guild_id: サーバーID
    channel_id: チャンネルID
    keywords:
      - "キーワード"
    add_roles:
      - 付与ロールID
    remove_roles:
      - 剥奪ロールID</code></pre>

      <table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>guild_id</code></td>
            <td>サーバーID</td>
          </tr>
          <tr>
            <td><code>channel_id</code></td>
            <td>監視するチャンネルID</td>
          </tr>
          <tr>
            <td><code>keywords</code></td>
            <td>トリガーとなるキーワード一覧（AND条件）。空の場合は全メッセージが対象</td>
          </tr>
          <tr>
            <td><code>add_roles</code></td>
            <td>条件一致時に付与するロールID一覧</td>
          </tr>
          <tr>
            <td><code>remove_roles</code></td>
            <td>条件一致時に剥奪するロールID一覧</td>
          </tr>
        </tbody>
      </table>

      <div class="alert alert-warning">
        <p><strong>⚠ 注意:</strong> キーワードは AND 条件で判定されます。複数のキーワードを設定した場合、全てのキーワードがメッセージに含まれている必要があります。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
