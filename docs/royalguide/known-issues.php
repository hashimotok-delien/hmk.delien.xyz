<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '既知の不具合 - RoyalGuide ドキュメント'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/assets/include/topbar.php'; ?>

    <div class="content">
      <h1>⚠️ 既知の不具合</h1>
      <p>現在確認されている既知の不具合と、仕様による制限をまとめています。</p>

      <div class="alert alert-warning">
        <p><strong>💡 注意:</strong> このページの内容は予告なく変更される場合があります。不具合に遭遇した場合はサポートサーバーまでご報告ください。</p>
      </div>

      <h2>📏 仕様による制限</h2>
      <p>以下は不具合ではなく、現在の仕様です。</p>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>内容</th>
            <th>補足</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>対応サービス</td>
            <td>SoundCloud のみ</td>
            <td>音声取得は SoundCloud に限定しています。</td>
          </tr>
          <tr>
            <td>キュー上限</td>
            <td>1サーバーあたり100曲</td>
            <td>上限を超える追加はできません。</td>
          </tr>
          <tr>
            <td>音量範囲</td>
            <td>0.0〜200.0 %</td>
            <td>150% を超えると音割れする場合があります。</td>
          </tr>
          <tr>
            <td>投稿者プリセット</td>
            <td>1サーバーあたり最大24件</td>
            <td>上限に達した場合は既存のプリセットを削除してください。</td>
          </tr>
          <tr>
            <td>再生の前提</td>
            <td>「ボイスチャンネルに接続」権限が必要</td>
            <td>権限がない場合は接続できません。</td>
          </tr>
          <tr>
            <td>VOICEVOX の話者</td>
            <td>VOICEVOX Engine の起動が必要</td>
            <td>未起動の場合は edge-tts の既定音声で読み上げます。</td>
          </tr>
          <tr>
            <td>読み上げ辞書</td>
            <td>1サーバーあたり最大 2,000 件</td>
            <td>単語 60 文字 / 読み 120 文字まで。</td>
          </tr>
          <tr>
            <td>ロール音声制御</td>
            <td>1サーバーあたり最大 25 件</td>
            <td>1ルールにつきロール・話者は 25 件まで選択できます。</td>
          </tr>
          <tr>
            <td>設定コマンド</td>
            <td>RoyalGuide01 のみ</td>
            <td>
              <code>/音声設定</code> <code>/基本設定</code> <code>/投稿者設定</code>
              <code>/サーバー読み上げ設定</code> <code>/辞書</code> は
              RoyalGuide01 でのみ利用できます。
            </td>
          </tr>
        </tbody>
      </table></div>

      <h2>🐛 報告されている不具合</h2>
      <p>現在、報告されている既知の不具合はありません。</p>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> 不具合と思われる動作があった場合は、
        <a href="https://discord.gg/AmMkFhhD2D" target="_blank" rel="noopener">サポートサーバー</a>
        まで「実行したコマンド」「表示されたメッセージ」「発生日時」を添えてご報告ください。</p>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
