<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'サーバー連携 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🔗</div>
        <h1>サーバー連携</h1>
        <p>複数サーバー間の連携を成立させ、横断機能の土台を作る</p>
      </div>

      <h2>概要</h2>
      <p>
        サーバー連携機能は、複数のサーバー間で「連携が成立している」状態を作る
        ための基盤機能です。<code>/サーバー連携設定</code> でプリセットを作成し、
        互いのサーバーIDを登録して<strong>両方のサーバーで有効</strong>にすると
        連携が成立します。
      </p>
      <p>
        ロール同期・自動KICK・メンバーログ・プロフィール v2 の VCインチャなど、
        サーバーをまたぐ機能は、この連携が成立していることを前提に動作します。
      </p>

      <div class="alert alert-warning">
        <p><strong>⚠️ 連携は「相互」で成立します:</strong>
        片方のサーバーだけで設定しても連携は成立しません。
        連携したい両方のサーバーで、それぞれ相手のサーバーIDを登録し、
        プリセットを有効にする必要があります。</p>
      </div>

      <h2>連携が成立する条件</h2>
      <ol class="steps">
        <li>
          <strong>自サーバー側</strong>
          有効なプリセットに相手サーバーIDが含まれている
        </li>
        <li>
          <strong>相手サーバー側</strong>
          有効なプリセットに自サーバーIDが含まれている
        </li>
        <li>
          <strong>両方が揃って成立</strong>
          どちらかが無効・未登録・削除されると、その時点で連携は成立しなくなります
        </li>
      </ol>

      <h2>サーバー連携でできること</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>機能</th>
            <th>サーバー連携の使われ方</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🎭 ロール同期</td>
            <td>連携先サーバーで「連携元サーバー」として指定できるのは、
                相互に連携が成立しているサーバーだけです</td>
          </tr>
          <tr>
            <td>🦵 自動KICK</td>
            <td>連携している「メインサーバー」から退出したメンバーを検知して、
                連携先サーバーで KICK します</td>
          </tr>
          <tr>
            <td>🗂 メンバーログ</td>
            <td>記録元サーバーと連携先サーバーの間で記録を共有し、
                条件を満たしたメンバーへ自動でロールを付与します</td>
          </tr>
          <tr>
            <td>🖼️ プロフィール v2</td>
            <td>VCインチャプロフィールで、連携先サーバーのプロフィールを
                表示できます（連携先の「メイン」かつ有効な設定が対象）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>設定画面プレビュー</h2>
      <div class="preview" data-screen-preview>
        <script type="application/json">
{
  "ariaLabel": "サーバー連携設定画面のプレビュー",
  "screens": [
    {
      "channel": "サーバー連携設定",
      "avatar": "🔗",
      "embed": {
        "title": "🔗 サーバー連携設定",
        "fields": [
          {"name": "#1 メイン鯖連携", "value": "<strong>状態</strong>: 🟢 有効<br><strong>連携先</strong>:<br>・メインサーバー (`123456789012345678`)"}
        ],
        "footer": "サーバー: 987654321098765432 | 1/1"
      },
      "buttons": [
        {"label": "➕ 新規作成", "style": "green"},
        {"label": "✏️ 編集"},
        {"label": "🗑️ 削除", "style": "danger"},
        {"label": "🔘 有効/無効"},
        {"label": "◀ 前へ"},
        {"label": "次へ ▶"}
      ],
      "caption": "▲ <code>/サーバー連携設定</code> で開く管理パネル。プリセットは1件ずつページ表示されます。<br>新規作成・編集はモーダルで、<strong>プリセット名</strong>と<strong>連携先サーバーID（カンマ区切り）</strong>を入力します。"
    }
  ]
}
        </script>
      </div>

      <h2>設定方法</h2>
      <ol class="steps">
        <li>
          <strong>連携先サーバーのIDを控える</strong>
          Discord の「設定 → 詳細設定 → 開発者モード」を有効にし、
          相手サーバーを右クリックして「サーバーIDをコピー」します
        </li>
        <li>
          <strong>コマンドを実行</strong>
          <code>/サーバー連携設定</code> を管理者権限で実行します
          （結果は実行者のみに表示されます）
        </li>
        <li>
          <strong>プリセットを作成</strong>
          「➕ 新規作成」から<strong>プリセット名</strong>と
          <strong>連携先サーバーID</strong> を入力します
          （複数指定する場合は半角カンマ区切り）
        </li>
        <li>
          <strong>有効化する</strong>
          「🔘 有効/無効」でプリセットを <strong>🟢 有効</strong> にします
          （新規作成時は有効で作成されます）
        </li>
        <li>
          <strong>相手サーバーでも同じ設定を行う</strong>
          相手側でも <code>/サーバー連携設定</code> を実行し、
          こちら側のサーバーIDを登録して有効化します
        </li>
        <li>
          <strong>連携を確認</strong>
          双方のパネルに相手サーバーが「連携先」として表示されていれば成立です
        </li>
      </ol>

      <h2>パネルのボタン</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>➕ 新規作成</td>
            <td>プリセット名と連携先サーバーIDを入力して作成します</td>
          </tr>
          <tr>
            <td>✏️ 編集</td>
            <td>表示中のプリセットの名前と連携先サーバーIDを変更します</td>
          </tr>
          <tr>
            <td>🔘 有効/無効</td>
            <td>表示中のプリセットの有効・無効を切り替えます</td>
          </tr>
          <tr>
            <td>🗑️ 削除</td>
            <td>確認のうえ、表示中のプリセットを削除します</td>
          </tr>
          <tr>
            <td>◀ 前へ / 次へ ▶</td>
            <td>プリセットのページを移動します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>注意事項</h2>
      <ul>
        <li>連携は<strong>相互設定</strong>が必須です。片側だけでは機能しません</li>
        <li>パネルを操作できるのはコマンドを実行した本人のみです</li>
        <li>パネルは一定時間（約5分）操作がないとボタンが無効になります。
            その場合はコマンドを再実行してください</li>
        <li>有効/無効の切り替え・削除はすぐに反映され、
            そのサーバーを前提とする機能も動作しなくなります</li>
        <li>サーバー名やプロフィールを参照する機能を使う場合、
            Bot が相手サーバーにも参加している必要があります</li>
        <li>プリセットは複数作成できます。用途ごとに分けて管理できます</li>
      </ul>

      <h2>関連機能</h2>
      <div class="card-grid">
        <div class="card">
          <h3>🎭 ロール同期</h3>
          <p>連携元のロールを連携先へ自動付与します。</p>
          <a href="role-sync">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>🦵 自動KICK</h3>
          <p>メインサーバー退出時に連携先で KICK します。</p>
          <a href="auto-kick">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>🖼️ プロフィール v2</h3>
          <p>VCインチャで連携先のプロフィールを表示します。</p>
          <a href="profile-v2">詳細を見る →</a>
        </div>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
