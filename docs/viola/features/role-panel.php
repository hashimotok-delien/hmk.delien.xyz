<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '役職パネル - master Bot ドキュメント'; $PAGE_DESCRIPTION = '役職パネル - master Bot ドキュメント。ユーザー自身がロールを選択・取得できるパネルを設置'; ?>
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
        <h1>役職パネル</h1>
        <p>ユーザー自身がロールを選択・取得できるパネルを設置</p>
      </div>

      <h2>概要</h2>
      <p>
        役職パネル機能は、ユーザー自身がつけたいロールを選択して取得できる機能です。
        管理者は設定次第で、ユーザーが複数のロールを取得できるようにしたり、1つのロールしか取得できないようにしたりできます。
        また、剥奪専用や付与専用のパネルも作成可能です。
      </p>

      <h2>パネルの種類</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>種類</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>付与専用</td>
            <td>ユーザーがロールを取得できるパネル（剥奪不可）</td>
          </tr>
          <tr>
            <td>取外専用</td>
            <td>ユーザーがロールを剥奪できるパネル（付与不可）</td>
          </tr>
          <tr>
            <td>許可</td>
            <td>ユーザーが複数のロールを取得・剥奪できるパネル</td>
          </tr>
          <tr>
            <td>禁止</td>
            <td>ユーザーが1つのロールしか取得できないパネル（排他選択）</td>
          </tr>
          <tr>
            <td>特殊</td>
            <td>重複禁止で、ロールの取り外しが可能</td>
          </tr>
        </tbody>
      </table></div>

      <h2>コマンド</h2>

      <h3>新規作成</h3>
      <pre><code>/役職パネル &lt;タイトル&gt; &lt;種類&gt; &lt;ロールA&gt; [説明] [ロールB]...</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>タイトル</td>
            <td>パネルのタイトル（必須）</td>
          </tr>
          <tr>
            <td>種類</td>
            <td>許可 / 禁止 / 特殊 / 付与専用 / 取外専用（必須・オートコンプリート対応）</td>
          </tr>
          <tr>
            <td>ロールA, ロールB...</td>
            <td>パネルに表示するロール（最大22個）</td>
          </tr>
          <tr>
            <td>説明</td>
            <td>パネルの説明（省略可能）</td>
          </tr>
        </tbody>
      </table></div>

      <h3>ロールの追加・削除</h3>
      <pre><code>/役職パネルロール追加 &lt;ロール&gt; [絵文字]
/役職パネルロール削除 &lt;ロール&gt;</code></pre>
      <p>
        編集対象のパネルをあらかじめ選択しておく必要があります。
        パネルメッセージを右クリック（長押し）→「アプリ」→「役職パネル選択」で対象を選択してください。
      </p>

      <h3>編集</h3>
      <pre><code>/役職パネル編集 &lt;項目&gt; [値]</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>タイトル</td>
            <td>パネルのタイトルを変更します</td>
          </tr>
          <tr>
            <td>説明</td>
            <td>パネルの説明を変更します</td>
          </tr>
          <tr>
            <td>重複許可</td>
            <td>ロールの重複可否をセレクトボックスから選択します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>パネルの操作手順</h2>
      <ol class="steps">
        <li>
          <strong>パネルを選択</strong>
          Bot が送信したパネルメッセージを右クリック（長押し）→「アプリ」→「役職パネル選択」を押下
        </li>
        <li>
          <strong>コマンドを実行</strong>
          ロールの追加・削除・編集コマンドを実行します
        </li>
        <li>
          <strong>値を変更</strong>
          タイトルと説明は入力欄から変更。重複許可はセレクトボックスから選択
        </li>
      </ol>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> 役職パネルは Bot からのメッセージとして送信されます。パネルを削除したい場合は、該当メッセージを削除してください。
        表示が壊れた場合は「役職パネル修復」を実行すると復旧できます。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
