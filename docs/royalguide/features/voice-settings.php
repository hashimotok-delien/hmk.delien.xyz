<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '音声設定 - RoyalGuide ドキュメント'; ?>
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
        <div class="feature-icon">🔊</div>
        <h1>音声設定</h1>
        <p>ユーザーごとの声と、サーバー全体のルールを決める。</p>
      </div>

      <h2>概要</h2>
      <p>
        音声設定では、音量・話者・話速を設定します。
        ユーザーが自分で設定する「ユーザー音声設定」と、サーバー全体に適用される
        「サーバーデフォルト音声設定」の2種類があります。
      </p>

      <h2>ユーザー音声設定</h2>
      <pre><code>/音声設定</code></pre>
      <p>
        パネルの「👤 ユーザー音声設定」から、自分の音量・話者・話速を変更できます。
        現在設定している値は選択済みで表示されます。
      </p>
      <ul>
        <li>「🔁 サーバーデフォルトを使用」を選ぶ、または空欄にすると未設定に戻ります。</li>
        <li>未設定の項目はサーバーデフォルト → 全体既定 の順でフォールバックします。</li>
        <li>サーバーで許可されていない話者は保存できません。</li>
        <li>話速・音量はサーバー設定の範囲内へ自動補正されます。</li>
        <li>ロール音声ルールに一致する場合、話者の選択欄は表示されません（固定）。</li>
      </ul>

      <h2>サーバーデフォルト音声設定</h2>
      <p>
        パネルの「🏠 サーバーデフォルト」から、サーバー既定の音量・話者・話速を
        設定できます（サーバー管理権限が必要です）。
      </p>

      <h2>サーバー読み上げ設定（管理者）</h2>
      <pre><code>/サーバー読み上げ設定</code></pre>
      <p>
        管理者向けの設定パネルです。RoyalGuide01 でのみ利用できます。
      </p>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🗣️ 開始/終了テキスト</td>
            <td>
              読み上げを開始・終了するトリガー文言。既定は
              <code>読み上げ起動</code> / <code>読み上げ停止</code>。
            </td>
          </tr>
          <tr>
            <td>🎙️ デフォルト音声</td>
            <td>サーバー既定の音量・話者・話速。</td>
          </tr>
          <tr>
            <td>🎚️ 音声制御</td>
            <td>
              使用を許可する話者（複数）と、話速・音量の上下限。
              未設定なら制限なし（全話者を許可）です。
            </td>
          </tr>
          <tr>
            <td>📚 辞書設定</td>
            <td>読み上げ辞書の追加・編集・削除・一覧。</td>
          </tr>
          <tr>
            <td>🎭 ロール音声制御</td>
            <td>
              所持ロールごとの話者ルール。ページネーションで
              デフォルト／新規追加／編集／削除を操作します。
            </td>
          </tr>
        </tbody>
      </table></div>

      <h3>トリガー文言</h3>
      <p>
        設定した文字だけを送信すると、<code>/読み上げ開始</code> /
        <code>/読み上げ終了</code> と同じ動作をします。
        全インスタンスで共有され、最初に応答した 1 台だけが処理します。
      </p>

      <h3>ロール音声制御</h3>
      <ul>
        <li>設定名・対象ロール（複数）・話者（複数からランダム）を登録します。</li>
        <li>「全てのロール所持が対象」をONにすると、対象ロールをすべて持つ場合のみ適用します（既定OFF）。</li>
        <li>一致したユーザーは話者を変更できません（ユーザー設定より優先）。</li>
        <li>1サーバー最大25件、1ルールにつきロール・話者は25件までです。</li>
      </ul>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> 設定は MongoDB に保存され、全インスタンスへ
        自動で同期されます。読み上げ中に変更した場合は、次のメッセージから反映されます。</p>
      </div>

      <p>
        読み上げ自体の使い方は <a href="read">読み上げ</a> を参照してください。
      </p>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
