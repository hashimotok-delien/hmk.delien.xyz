<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'DM/フレンド開通 - master Bot ドキュメント'; $PAGE_DESCRIPTION = 'DM/フレンド開通 - master Bot ドキュメント。DM/フレンド開通機能は、DM やフレンドの申請をパネルのボタンから送信し、 相手がボタンで回答できる機能です。申請はサーバー内のチャンネルに投稿されます。'; ?>
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
        <div class="feature-icon">🤝</div>
        <h1>DM/フレンド開通</h1>
        <p>DM・フレンドの申請と回答をパネルから</p>
      </div>

      <h2>概要</h2>
      <p>
        DM/フレンド開通機能は、DM やフレンドの申請をパネルのボタンから送信し、
        相手がボタンで回答できる機能です。申請はサーバー内のチャンネルに投稿されます。
      </p>

      <h2>パネルの設置</h2>
      <pre><code>/dmフレンド開通用パネル</code></pre>
      <p>管理者権限で実行すると、実行したチャンネルにパネルが送信されます。</p>

      <h2>申請の流れ</h2>
      <ol class="steps">
        <li>
          <strong>申請する</strong>
          パネルの「DM・フレンド開通」ボタンを押し、申請内容を入力します。
          <ul>
            <li>タイプ（DM / フレンド）</li>
            <li>一言メッセージ</li>
          </ul>
        </li>
        <li>
          <strong>相手を選ぶ</strong>
          表示されたユーザー選択から相手を選択するか、チャンネルで相手をメンションします。
        </li>
        <li>
          <strong>相手が回答する</strong>
          相手に「いいよ」「仲良くなったら」「ごめんね」のボタンが表示され、押すと返信が投稿されます。
        </li>
      </ol>

      <h2>回答の種類</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>意味</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>いいよ</td>
            <td>申請を承諾します</td>
          </tr>
          <tr>
            <td>仲良くなったら</td>
            <td>今は承諾せず、関係が深まってから承諾する意思を伝えます</td>
          </tr>
          <tr>
            <td>ごめんね</td>
            <td>申請を断ります</td>
          </tr>
        </tbody>
      </table></div>

      <h2>注意事項</h2>
      <ul>
        <li>回答ボタンは申請された本人のみ押せます。</li>
        <li>申請は5分でタイムアウトします。</li>
        <li>申請制限ロールが設定されている場合、条件に合わない相手には申請できません。</li>
      </ul>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
