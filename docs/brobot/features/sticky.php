<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'スティッキーメッセージ - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = 'スティッキーメッセージ（吊り下げ）の使い方と設定項目を説明します。'; ?>
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
        <div class="feature-icon">📌</div>
        <h1>スティッキーメッセージ</h1>
        <p>チャンネルの案内メッセージを、常に最新の位置へ吊り下げ続けます。</p>
      </div>

      <h2>概要</h2>
      <p>
        指定したチャンネルで案内メッセージ（「吊り下げ」）を常に最新の位置に保つ機能です。
        チャンネルに新しいメッセージが投稿されると、古い吊り下げを削除して
        最下部へ投稿し直します。ルールや連絡事項の掲示に向いています。
      </p>

      <h2>コマンド</h2>
      <pre><code>!sticky &lt;設定名&gt;
!unsticky &lt;設定名&gt;</code></pre>
      <p>
        接頭辞コマンドのため、スラッシュコマンド一覧には表示されません。
        どちらも管理者専用です。
      </p>

      <h2>設定できる内容</h2>

      <h3>📝 本文・埋め込み</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 220px;">項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>本文</td><td>メッセージ本文（通常のテキスト）</td></tr>
          <tr><td>埋め込みタイトル / 説明</td><td>Embed のタイトルと本文</td></tr>
          <tr><td>埋め込み色</td><td><code>#ff0000</code> 形式のカラーコード</td></tr>
          <tr><td>埋め込みフッター / 投稿者</td><td>Embed のフッターと投稿者表記</td></tr>
          <tr><td>サムネイル / 画像 / URL</td><td>Embed に表示する画像とリンク先</td></tr>
          <tr><td>タイムスタンプ</td><td><code>2025/01/01 00:00:00</code> 形式</td></tr>
        </tbody>
      </table></div>

      <h3>🔄 更新条件</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 220px;">項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr><td>更新メッセージ回数</td><td>指定した回数のメッセージごとに吊り下げを更新します</td></tr>
          <tr><td>更新秒数</td><td>指定した秒数ごとに吊り下げを更新します</td></tr>
        </tbody>
      </table></div>

      <h3>📢 投稿設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 220px;">項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>メンション通知 OFF</td>
            <td>ON にすると、本文にロールメンションを入れても通知が飛びません。</td>
          </tr>
          <tr>
            <td>Bot 反応 OFF</td>
            <td>ON にすると、Bot がメッセージを投稿したときは吊り下げを更新しません。</td>
          </tr>
        </tbody>
      </table></div>

      <h3>👤 投稿者設定</h3>
      <p>
        投稿者名とアイコンを変更できます。手動入力のほか、<code>/投稿者設定</code> で
        作成したプリセットから選択することもできます。
      </p>

      <h3>🧭 プロフ連携（任意）</h3>
      <p>
        プロフ機能が導入されている環境では、次のボタンを吊り下げに追加できます。
      </p>
      <ul>
        <li>プロフ目次</li>
        <li>自分のプロフ取得ボタン</li>
        <li>プロフ検索ボタン</li>
      </ul>
      <div class="alert alert-info">
        <p>
          <strong>💡 情報:</strong>
          プロフ機能が未導入の環境でも読み込みは成功し、プロフ関連の項目だけが無効になります。
        </p>
      </div>

      <h2>設定の流れ</h2>
      <ol class="steps">
        <li>
          <strong>吊り下げを作成</strong>
          <code>!sticky</code> を実行し、対象チャンネルと投稿内容を設定します。
        </li>
        <li>
          <strong>表示を確認する</strong>
          「📝 投稿文設定」のプレビューで見た目を確認できます。
        </li>
        <li>
          <strong>保存して再送</strong>
          「💾 保存して再送」で設定を保存し、吊り下げを投稿します。
        </li>
      </ol>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          吊り下げを削除したい場合は <code>!unsticky</code> を実行してください。
          手動でメッセージを削除した場合、設定は残ります。
        </p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
