<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>設定パネル - master Bot ドキュメント</title>
  <meta name="description" content="設定パネル - master Bot ドキュメント。サーバー単位の各種設定をボタンから一括管理">
  <link rel="stylesheet" href="../assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../assets/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '..'; $PAGE_TITLE = '設定パネル'; ?>
  <?php include __DIR__ . '/../assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../assets/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">⚙️</div>
        <h1>設定パネル</h1>
        <p>サーバー単位の各種設定をボタンから一括管理</p>
      </div>

      <h2>概要</h2>
      <p>
        設定パネルは、サーバー単位の機能設定を1つのメッセージにまとめた管理用パネルです。
        寝落ち送り、部屋作成先カテゴリ、申請制限ロール、投稿時ロールなどをボタン操作で設定できます。
      </p>

      <h2>パネルの表示</h2>
      <pre><code>/panel</code></pre>
      <p>
        管理者権限を持つアカウントで実行すると、実行したチャンネルにパネルが送信されます。
        一般ユーザーから見えない管理用チャンネルへの設置を推奨します。
      </p>

      <h2>パネルの項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🛏️</td>
            <td>寝落ち送り切り替え</td>
            <td>寝落ち送り機能の有効 / 無効を切り替えます</td>
          </tr>
          <tr>
            <td>🏠</td>
            <td>VC作成先カテゴリ登録</td>
            <td>表2shot / 裏2shot / 表個室 / 裏個室 の作成先カテゴリを登録します</td>
          </tr>
          <tr>
            <td>🏚️</td>
            <td>VC作成先カテゴリ解除</td>
            <td>登録した作成先カテゴリを解除します</td>
          </tr>
          <tr>
            <td>🔐</td>
            <td>申請制限登録</td>
            <td>個室・DM/フレンド申請を制限するロールを登録します</td>
          </tr>
          <tr>
            <td>🔓</td>
            <td>申請制限解除</td>
            <td>登録した申請制限ロールを解除します</td>
          </tr>
          <tr>
            <td>⭕</td>
            <td>投稿時ロール付与設定</td>
            <td>対象チャンネルで「ルールを順守します」と投稿した際に付与するロールを設定します</td>
          </tr>
          <tr>
            <td>❌</td>
            <td>投稿時ロール剥奪設定</td>
            <td>対象チャンネルで「ルールを順守します」と投稿した際に剥奪するロールを設定します</td>
          </tr>
          <tr>
            <td>💬</td>
            <td>投稿時ロール設定</td>
            <td>チャンネルごとの投稿時ロール設定パネルを開きます</td>
          </tr>
          <tr>
            <td>🔄</td>
            <td>パネル更新</td>
            <td>パネルの表示を最新の状態に更新します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>🛏️ 寝落ち送り</h2>
      <p>
        有効にすると、「寝落ち送り」という名前のテキストチャンネルでメンバーをメンションした際に、
        同じカテゴリ内の「寝落ち部屋」という名前の VC へそのメンバーを移動させます。
      </p>
      <ul>
        <li>「寝落ち部屋に送らないでね」ロールを持つメンバーは移動対象外です。</li>
        <li>「寝落ち送り」と「寝落ち部屋」は同じカテゴリに配置してください。</li>
        <li>寝落ち枕 Bot がサーバーに参加している場合は、寝落ち送りは寝落ち枕 Bot に任されます。</li>
      </ul>

      <h2>🏠 部屋作成先カテゴリ</h2>
      <p>
        表2shot・裏2shot・表個室・裏個室で作成される VC のカテゴリを指定できます。
        未設定の場合は、パネルを操作したチャンネルのカテゴリに作成されます。
      </p>

      <h2>🔐 申請制限ロール</h2>
      <p>
        個室の招待やDM/フレンド申請で、やり取りできる相手を制限するためのロールです。
        このロールを「持っている人同士」または「持っていない人同士」でのみ申請できます。
        ロールを登録すると、条件に合わない相手への申請は拒否されます。
      </p>

      <h2>⭕ / ❌ 投稿時ロール</h2>
      <p>
        チャンネルごとに、投稿時に付与・剥奪するロールを設定できます。
        詳細は <a href="ch-role">投稿時ロール設定</a> を参照してください。
      </p>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
  <script src="../assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../assets/js/main.js') ?: time() ?>"></script>
</body>
</html>
