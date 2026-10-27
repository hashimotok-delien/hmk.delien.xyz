<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '投稿者プリセット - RoyalGuide ドキュメント'; ?>
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
        <div class="feature-icon">👤</div>
        <h1>投稿者プリセット</h1>
        <p>Webhook 投稿の「投稿者名」と「アイコン」を、プリセットで使い回す。</p>
      </div>

      <h2>概要</h2>
      <p>
        投稿者プリセットは、Webhook で投稿するときの投稿者名・アイコンを
        あらかじめ登録しておける機能です。配信告知・イベント告知・運営からのお知らせなど、
        投稿の種類ごとにプリセットを用意しておくと、毎回入力せずに切り替えられます。
      </p>

      <h2>コマンド</h2>

      <h3>パネルを開く</h3>
      <pre><code>/投稿者設定</code></pre>
      <p>
        サーバー管理者のみ実行できます。パネルには登録済みのプリセット一覧と、
        作成・編集・削除のボタンが表示されます。
      </p>

      <h2>操作</h2>
      <ol class="steps">
        <li>
          <strong>新規作成</strong>
          パネルの「新規作成」から、設定名・表示名・アイコンURL・アップロード画像を入力します。
        </li>
        <li>
          <strong>編集</strong>
          一覧からプリセットを選ぶと、登録内容の編集画面が開きます。
        </li>
        <li>
          <strong>削除</strong>
          不要になったプリセットは一覧から削除できます。
        </li>
      </ol>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
            <th>必須</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定名</td>
            <td>プリセットを識別するための名前。</td>
            <td>—</td>
          </tr>
          <tr>
            <td>表示名</td>
            <td>投稿時に表示される投稿者名。</td>
            <td>—</td>
          </tr>
          <tr>
            <td>アイコンURL</td>
            <td>投稿時に表示されるアイコン画像の URL。</td>
            <td>—</td>
          </tr>
          <tr>
            <td>アップロード画像</td>
            <td>画像を直接アップロードする場合に指定します。保存先チャンネルへ投稿されます。</td>
            <td>任意</td>
          </tr>
          <tr>
            <td>ID</td>
            <td>プリセットごとに割り振られる識別子（変更できません）。</td>
            <td>—</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> アップロード画像は <code>/基本設定</code> の
        「📁 投稿者設定チャンネル」に保存されます。未設定の場合はグローバルチャンネルが使われます。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ 上限:</strong> 1サーバーあたり最大 <strong>24件</strong> まで作成できます。
        上限に達した場合は、不要なプリセットを削除してから追加してください。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
