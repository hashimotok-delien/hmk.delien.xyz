<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '個室・2shot - master Bot ドキュメント'; $PAGE_DESCRIPTION = '個室・2shot - master Bot ドキュメント。ボタン操作で二人専用の VC を自動生成'; ?>
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
        <div class="feature-icon">🔒</div>
        <h1>個室・2shot</h1>
        <p>ボタン操作で二人専用の VC を自動生成</p>
      </div>

      <h2>概要</h2>
      <p>
        個室・2shot 機能は、パネルのボタンから二人専用のボイスチャンネルを自動生成する機能です。
        表 / 裏 と 個室 / 2shot の組み合わせで4種類の部屋を作成できます。
      </p>

      <h2>部屋の種類</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>種類</th>
            <th>作成方法</th>
            <th>特徴</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>表2shot</td>
            <td>「表2shot作成」ボタン</td>
            <td>定員2名の VC を作成します。誰でも参加できます。</td>
          </tr>
          <tr>
            <td>裏2shot</td>
            <td>「裏2shot作成」ボタン</td>
            <td>作成後に別のメンバーが参加すると、二人専用の裏2shotになります。</td>
          </tr>
          <tr>
            <td>表個室</td>
            <td>「表個室作成」ボタン → 相手を選択</td>
            <td>二人専用の VC を作成します。二人以外からは見えますが接続できません。</td>
          </tr>
          <tr>
            <td>裏個室</td>
            <td>「裏個室作成」ボタン → 相手を選択</td>
            <td>二人専用の VC を作成します。二人以外からは見えません。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>パネルの設置</h2>
      <p>管理者権限で以下のコマンドを実行すると、実行したチャンネルにパネルが送信されます。</p>
      <pre><code>/表2shot作成用パネル
/裏2shot作成用パネル
/表個室作成用パネル
/裏個室作成用パネル</code></pre>

      <h2>部屋の操作</h2>
      <p>個室の VC 内には以下のボタンが送信されます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>個室名を変更</td>
            <td>VC の名前を変更します（100文字以内）</td>
          </tr>
          <tr>
            <td>個室を削除</td>
            <td>VC を削除します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>作成先カテゴリ</h2>
      <p>
        作成先のカテゴリは、設定パネル（<code>/panel</code>）の 🏠 / 🏚️ ボタンで種類ごとに登録・解除できます。
        未設定の場合は、パネルを操作したチャンネルのカテゴリに作成されます。
      </p>

      <h2>自動削除・人数調整</h2>
      <ul>
        <li>裏個室の VC は毎朝5時に自動削除されます。</li>
        <li>Bot が VC に参加・退出・移動すると、その VC の人数制限が自動で ±1 されます。</li>
        <li>部屋の種類ごとに「表個室用自動生成VC」などの管理用ロールが自動作成されます。</li>
      </ul>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> 申請制限ロールを設定すると、個室に招待できる相手を制限できます。
        詳細は <a href="settings">設定パネル</a> を参照してください。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
