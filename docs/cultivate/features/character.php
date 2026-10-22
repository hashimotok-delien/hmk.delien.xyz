<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'キャラクター設定 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🎭</div>
        <h1>キャラクター設定</h1>
        <p>吊り下げメッセージなどで使用するキャラクターを作成・管理</p>
      </div>

      <h2>概要</h2>
      <p>
        キャラクター設定機能は、吊り下げメッセージ（スティッキー）などで使用する
        キャラクター（名前・アイコン）を作成・管理できる機能です。
        キャラクターを設定することで、用途に応じた表示名やアイコンでメッセージを送信できます。
      </p>

      <h2>コマンド</h2>
      <pre><code>/キャラクター設定</code></pre>

      <p>
        コマンドを実行すると、現在登録されているキャラクターの一覧が表示されます。
        以下の操作が可能です。
      </p>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>操作</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>➕ 新規作成</td>
            <td>新しいキャラクターを作成します</td>
          </tr>
          <tr>
            <td>名前</td>
            <td>キャラクターの名前を設定（未設定時は Bot の名前）</td>
          </tr>
          <tr>
            <td>アイコン</td>
            <td>キャラクターのアイコンを設定（未設定時は Bot のアイコン）</td>
          </tr>
        </tbody>
      </table></div>

      <p>
        作成したキャラクターは、吊り下げメッセージの Webhook 送信時に
        名前やアイコンとして使用できます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> キャラクターを活用することで、運営からのお知らせやイベント案内など、用途に応じた見た目でメッセージを送信できます。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
