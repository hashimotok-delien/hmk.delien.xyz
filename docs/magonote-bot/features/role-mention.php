<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ロールメンション切替 - まごの手 ドキュメント'; $PAGE_DESCRIPTION = 'ロールメンション切替 - まごの手 ドキュメント。昼夜の特定時刻にロールのメンション可否を自動切替'; ?>
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
        <div class="feature-icon">🔔</div>
        <h1>ロールメンション切替</h1>
        <p>昼夜の特定時刻にロールのメンション可否を自動切替</p>
      </div>

      <h2>概要</h2>
      <p>
        ロールメンション切替機能は、特定の時刻になるとロールのメンション可否を
        自動で切り替える機能です。例えば、昼の12時にあるロールのメンションを有効にし、
        夜の24時に無効にする、といった設定が可能です。
      </p>

      <h2>設定</h2>
      <p>
        <code>config.yml</code> の <code>role_mention_setting</code> セクションで設定します。
      </p>

      <pre><code>role_mention_setting:
  サーバーID:
    noon_time: "12:00"
    night_time: "24:00"
    noon_role:
      - 昼にメンション可能にするロールID
    night_role:
      - 夜にメンション可能にするロールID</code></pre>

      <table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>サーバーID</code></td>
            <td>サーバーID</td>
          </tr>
          <tr>
            <td><code>noon_time</code></td>
            <td>昼の切替時刻（例: "12:00"）</td>
          </tr>
          <tr>
            <td><code>night_time</code></td>
            <td>夜の切替時刻（例: "24:00"）</td>
          </tr>
          <tr>
            <td><code>noon_role</code></td>
            <td>昼にメンション可能にするロールIDのリスト</td>
          </tr>
          <tr>
            <td><code>night_role</code></td>
            <td>夜にメンション可能にするロールIDのリスト</td>
          </tr>
        </tbody>
      </table>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> この機能は1分ごとに実行され、時刻が設定値と一致した場合にロールのメンション設定を切り替えます。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
