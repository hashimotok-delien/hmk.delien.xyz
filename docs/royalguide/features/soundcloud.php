<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'SoundCloud 再生 - RoyalGuide ドキュメント'; ?>
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
        <div class="feature-icon">🎧</div>
        <h1>SoundCloud 再生</h1>
        <p>URL を貼るだけで、ボイスチャンネルに SoundCloud の音声を。</p>
      </div>

      <h2>概要</h2>
      <p>
        SoundCloud の曲またはプレイリストの URL を <code>/play</code> に渡すと、
        Bot がボイスチャンネルに参加して再生します。再生中は絵文字ボタン付きの
        再生コントロールパネルが投稿され、そこから操作できます。
      </p>

      <h2>コマンド</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>コマンド</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/join</code></td>
            <td>実行者がいるボイスチャンネルへ参加します。</td>
          </tr>
          <tr>
            <td><code>/leave</code></td>
            <td>ボイスチャンネルから退出します。</td>
          </tr>
          <tr>
            <td><code>/play url</code></td>
            <td>SoundCloud の曲・プレイリストの URL を再生、またはキューに追加します。</td>
          </tr>
          <tr>
            <td><code>/queue</code></td>
            <td>再生中の曲とキューを表示します。</td>
          </tr>
          <tr>
            <td><code>/volume [value]</code></td>
            <td>再生音量（0.0〜200.0 %）を設定・表示します。</td>
          </tr>
          <tr>
            <td><code>/defaultvolume [value]</code></td>
            <td>サーバーの既定音量を設定・表示します（管理権限が必要）。</td>
          </tr>
          <tr>
            <td><code>/skip</code></td>
            <td>再生中の音声をスキップします。</td>
          </tr>
          <tr>
            <td><code>/stop</code></td>
            <td>再生を停止し、キューを消去します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>再生コントロールパネル</h2>
      <p>
        再生を開始すると、再生中の曲の情報とボタンが並んだパネルが投稿されます。
        ボタンはすべて絵文字で、再生中のボイスチャンネルに参加しているユーザーなら誰でも操作できます。
      </p>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>⏸️ / ▶️</td>
            <td>一時停止 / 再開</td>
          </tr>
          <tr>
            <td>⏭️</td>
            <td>次の曲へスキップ</td>
          </tr>
          <tr>
            <td>⏹️</td>
            <td>停止してキューを消去</td>
          </tr>
          <tr>
            <td>🔀</td>
            <td>キューをシャッフル</td>
          </tr>
          <tr>
            <td>🔁 / 🔂</td>
            <td>ループモードの切り替え</td>
          </tr>
        </tbody>
      </table></div>

      <h3>ループモード</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>表示</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>なし</td>
            <td>キューを順番に再生し、最後まで再生したら停止します。</td>
          </tr>
          <tr>
            <td>🔂 現在の曲</td>
            <td>再生中の曲を繰り返します。</td>
          </tr>
          <tr>
            <td>🔁 キュー全体</td>
            <td>キュー全体を繰り返します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>使用例</h2>
      <pre><code>/play url:https://soundcloud.com/artist/track-name</code></pre>
      <p>
        すでに再生中の場合はキューに追加されます。連続で追加すると、
        順番に再生されます。
      </p>

      <div class="alert alert-warning">
        <p><strong>⚠️ 制限:</strong> キューは1サーバーあたり最大100曲、
        音量は 0.0〜200.0 % の範囲です。対応サービスは SoundCloud のみで、
        非公開・削除済み・配信制限のある曲は再生できません。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
