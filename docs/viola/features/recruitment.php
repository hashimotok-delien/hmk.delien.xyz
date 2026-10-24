<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>募集 - master Bot ドキュメント</title>
  <meta name="description" content="募集 - master Bot ドキュメント。募集機能は、通話メンバーの募集をパネルから投稿・管理する機能です。 誰でも閲覧できる「表募集」と、条件を満たしたメンバー向けの「裏募集」の2種類があります。">
  <link rel="stylesheet" href="../assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../assets/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '..'; $PAGE_TITLE = '募集'; ?>
  <?php include __DIR__ . '/../assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../assets/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">📢</div>
        <h1>募集</h1>
        <p>表募集と裏募集をパネルから投稿・管理</p>
      </div>

      <h2>概要</h2>
      <p>
        募集機能は、通話メンバーの募集をパネルから投稿・管理する機能です。
        誰でも閲覧できる「表募集」と、条件を満たしたメンバー向けの「裏募集」の2種類があります。
      </p>

      <h2>📢 表募集</h2>
      <h3>パネルの設置</h3>
      <pre><code>/表募集作成用パネル</code></pre>
      <p>
        募集を投稿するチャンネルを選択すると、そのチャンネルに「表募集作成用パネル」が送信されます。
      </p>

      <h3>募集の投稿</h3>
      <ol class="steps">
        <li>
          <strong>「表募集作成」ボタンを押す</strong>
          入力フォームが表示されます。
        </li>
        <li>
          <strong>項目を入力する</strong>
          <ul>
            <li>場所（部屋のリンクなど）</li>
            <li>いつ（通話を始める時間）</li>
            <li>募集期限</li>
            <li>ジャンル</li>
            <li>コメント</li>
          </ul>
        </li>
        <li>
          <strong>投稿される</strong>
          Webhook で投稿者の表示名・アイコンを使って募集が投稿されます。
        </li>
      </ol>

      <h2>🔞 裏募集</h2>
      <p>
        裏募集は、募集設定とパネル設定をプリセットとして管理し、
        条件付きの募集投稿・立候補・通知を行える機能です。
      </p>

      <h3>募集設定</h3>
      <pre><code>/裏募集設定</code></pre>
      <p>裏募集のプリセットを一覧表示し、新規作成・編集・削除ができます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定名</td>
            <td>プリセットの名前</td>
          </tr>
          <tr>
            <td>性別ロール</td>
            <td>募集の対象となる性別ロール</td>
          </tr>
          <tr>
            <td>投稿者必須ロール</td>
            <td>募集を投稿できるメンバーの条件</td>
          </tr>
          <tr>
            <td>立候補必須ロール</td>
            <td>立候補できるメンバーの条件（すべて所持 / いずれか所持を選択可）</td>
          </tr>
          <tr>
            <td>通知対象設定</td>
            <td>募集時の通知先と対象ラベル</td>
          </tr>
          <tr>
            <td>通知メンション設定</td>
            <td>日中 / 深夜それぞれのメンションロールと時間帯</td>
          </tr>
          <tr>
            <td>通知方式</td>
            <td>DM / スレッド / DM → スレッド</td>
          </tr>
        </tbody>
      </table></div>

      <h3>パネル設定</h3>
      <pre><code>/裏募集パネル設定</code></pre>
      <p>
        裏募集パネルのプリセットを管理します。Embed の本文や色、設置先チャンネルを設定し、
        任意のチャンネルへパネルを設置できます。
      </p>

      <h3>パネルの操作</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>📝 投稿</td>
            <td>募集を投稿します</td>
          </tr>
          <tr>
            <td>✏️ 編集</td>
            <td>投稿中の募集文を編集します</td>
          </tr>
          <tr>
            <td>🗑️ 削除</td>
            <td>投稿中の募集を削除します</td>
          </tr>
          <tr>
            <td>立候補 / 選択解除</td>
            <td>募集への立候補・取り下げを行います</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> プリセットの上限は無料で募集設定5件・パネル設定3件です。
        プレミアム環境では募集設定20件・パネル設定10件まで作成できます。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
  <script src="../assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../assets/js/main.js') ?: time() ?>"></script>
</body>
</html>
