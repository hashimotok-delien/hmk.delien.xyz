<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'リアクション通知 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🔔</div>
        <h1>リアクション通知</h1>
        <p>対象チャンネルのリアクションをプロフカード付きで通知</p>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 リアクション通知とは？</strong>
        指定したチャンネルで<strong>Bot以外のメンバーがリアクションを押したとき</strong>、
        押したメンバーのプロフィールカードと通知本文を送信する機能です。
        リアクションしてくれた人をすぐに確認したいときに便利です。</p>
      </div>

      <h2>概要</h2>
      <p>
        リアクション通知は、監視したいチャンネルと通知先を「設定」として登録し、
        条件に合うリアクションだけを通知する機能です。
        設定はサーバーごとに複数作成でき、チャンネルごとに通知先や本文を変えられます。
      </p>

      <h2>機能一覧</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>機能</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定の管理</td>
            <td>設定の一覧・新規作成・編集・削除（1ページ1設定）</td>
          </tr>
          <tr>
            <td>対象チャンネル</td>
            <td>指定したチャンネルでリアクションされたときだけ通知</td>
          </tr>
          <tr>
            <td>対象絵文字</td>
            <td>指定した絵文字だけ通知（空欄なら全ての絵文字）</td>
          </tr>
          <tr>
            <td>送信先の切り替え</td>
            <td>チャンネルへの通知／設定を作成した人へのDM</td>
          </tr>
          <tr>
            <td>プロフカード</td>
            <td>リアクションしたメンバーのプロフィールカードを添付</td>
          </tr>
        </tbody>
      </table></div>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>必須</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定名</td>
            <td>必須</td>
            <td>設定を管理するための名前（自由入力）</td>
          </tr>
          <tr>
            <td>対象チャンネル</td>
            <td>必須</td>
            <td>リアクションを監視するチャンネル</td>
          </tr>
          <tr>
            <td>対象絵文字</td>
            <td>任意</td>
            <td>
              通知する絵文字（複数行入力）。
              <strong>空欄なら全ての絵文字</strong>が対象
            </td>
          </tr>
          <tr>
            <td>送信先チャンネル</td>
            <td>任意</td>
            <td>
              通知の送信先。
              <strong>未設定なら設定を作成した人のDM</strong>へ送信
            </td>
          </tr>
          <tr>
            <td>送信時本文</td>
            <td>任意</td>
            <td>通知本文に追加するテキスト</td>
          </tr>
        </tbody>
      </table></div>

      <h3>対象絵文字の入力例</h3>
      <p>
        1行に1つずつ入力します。Unicode絵文字とカスタム絵文字の
        どちらにも対応しています。
      </p>
      <pre><code>👍
❤️
&lt;:custom_emoji:123456789012345678&gt;</code></pre>

      <h2>通知のしくみ</h2>
      <ol>
        <li>対象チャンネルのメッセージにリアクションが押される</li>
        <li>
          押したメンバーがBotでないこと・対象絵文字に一致することを確認
        </li>
        <li>
          <strong>メッセージの投稿者</strong>へメンションし、
          リアクションしたメンバーのプロフィールカードと
          通知本文を送信
        </li>
      </ol>

      <h3>通知本文</h3>
      <p>本文は次の3行で構成されます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>行</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1行目</td>
            <td>
              <strong>押された絵文字</strong>と
              <strong>メッセージ投稿者へのメンション</strong>
            </td>
          </tr>
          <tr>
            <td>2行目</td>
            <td><strong>元メッセージへのリンク</strong></td>
          </tr>
          <tr>
            <td>3行目</td>
            <td>
              <strong>送信時本文</strong>
              （設定している場合のみ）
            </td>
          </tr>
        </tbody>
      </table></div>
      <pre><code>👍　@投稿者
[元メッセージ](https://discord.com/channels/...)
送信時本文（設定している場合のみ）</code></pre>

      <h3>送信先</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>送信先チャンネル</th>
            <th>通知先</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定あり</td>
            <td>指定したチャンネルへ送信</td>
          </tr>
          <tr>
            <td>未設定</td>
            <td>設定を作成した人のDMへ送信</td>
          </tr>
        </tbody>
      </table></div>

      <h2>プロフカード</h2>
      <ul>
        <li>
          <strong>プロフィールv2を導入済み</strong>の場合：
          メイン設定のカードデザインでプロフィールカードを送信します
        </li>
        <li>
          <strong>未導入・プロフィール未登録</strong>の場合：
          表示名・アイコン・メンションだけの
          プロフィールカード風のEmbedを送信します
        </li>
      </ul>

      <h2>設定画面プレビュー</h2>
      <div class="preview" data-screen-preview>
        <script type="application/json">
{
  "ariaLabel": "リアクション通知の設定画面と通知メッセージのプレビュー",
  "screens": [
    {
      "tab": "設定一覧",
      "channel": "リアクション通知設定",
      "avatar": "🔔",
      "embed": {
        "title": "🔔 凸募集のリアクション通知",
        "fields": [
          {"name": "📥 対象チャンネル", "value": "#凸募集"},
          {"name": "😊 対象絵文字", "value": "👍 ❤️"},
          {"name": "📤 送信先", "value": "#運営ログ"},
          {"name": "📝 送信時本文", "value": "`よろしくお願いします！`"}
        ],
        "footer": "設定ID: 1 | 1/2"
      },
      "buttons": [
        {"label": "✏️ 編集", "style": "primary"},
        {"label": "➕ 新規作成", "style": "green"},
        {"label": "🗑️ 削除", "style": "danger"}
      ],
      "caption": "▲ <code>/リアクション通知設定</code> で表示される設定一覧（1ページ1設定）。"
    },
    {
      "tab": "削除確認",
      "channel": "リアクション通知設定",
      "avatar": "🔔",
      "embed": {
        "title": "🗑️ 削除の確認",
        "desc": "**凸募集のリアクション通知** を削除しますか？<br>この操作は取り消せません。",
        "color": "red"
      },
      "buttons": [
        {"label": "✅ YES", "style": "danger"},
        {"label": "❌ NO"}
      ],
      "caption": "▲ 「🗑️ 削除」を押すと確認が表示されます。YESで削除、NOで一覧に戻ります。"
    },
    {
      "tab": "通知メッセージ",
      "channel": "運営ログ",
      "avatar": "👤",
      "embed": {
        "title": "たろう のプロフィール",
        "desc": "<@123456789012345678><br>**[プロフィールはコチラ](https://discord.com/channels/123456789012345678/234567890123456789/345678901234567890)**",
        "color": "green"
      },
      "caption": "▲ 実際の通知。本文は「絵文字　投稿者へのメンション」「メッセージリンク」「送信時本文」の3行で、リアクションしたメンバーのプロフィールカードが添付されます。"
    }
  ]
}
        </script>
      </div>

      <h2>設定の流れ</h2>

      <h3>1. 設定一覧</h3>
      <p>
        <code>/リアクション通知設定</code> を実行すると設定の一覧が表示されます。
        1ページに1設定ずつ表示され、以下のボタンで管理します。
      </p>
      <ul>
        <li><strong>➕ 新規作成</strong>: 新しい設定を作成</li>
        <li><strong>✏️ 編集</strong>: 表示中の設定を編集</li>
        <li>
          <strong>🗑️ 削除</strong>: 表示中の設定を削除
          （YES/NOの確認あり）
        </li>
      </ul>

      <h3>2. 新規作成・編集</h3>
      <p>
        「➕ 新規作成」または「✏️ 編集」を押すと、入力画面が開きます。
        1つの画面で以下の項目をまとめて設定できます。
      </p>
      <ul>
        <li><strong>設定名</strong>: 自由入力（必須）</li>
        <li>
          <strong>対象チャンネル</strong>:
          テキスト／アナウンスチャンネルから選択（必須）
        </li>
        <li>
          <strong>対象絵文字</strong>: 複数行の自由入力（任意）
        </li>
        <li>
          <strong>送信先チャンネル</strong>: 未選択ならDMへ送信（任意）
        </li>
        <li>
          <strong>送信時本文</strong>: 通知に添えるテキスト（任意）
        </li>
      </ul>

      <h3>3. 削除</h3>
      <p>
        「🗑️ 削除」を押すと確認が表示されます。
        「✅ YES」で削除、「❌ NO」で一覧に戻ります。
        削除した設定は元に戻せません。
      </p>

      <h2>コマンド一覧</h2>

      <div class="command-block">
        <div class="cmd-name">/リアクション通知設定</div>
        <div class="cmd-desc">
          リアクション通知の設定一覧を表示します。
          設定の新規作成・編集・削除が行えます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>注意事項</h2>
      <ul>
        <li>
          通知されるのは<strong>Bot以外のメンバー</strong>が押した
          リアクションだけです
        </li>
        <li>
          送信先チャンネルを設定していない場合は、
          設定を作成した人のDMへ届きます。
          DMを受け取れる状態にしておいてください
        </li>
        <li>
          通知本文の1行目で<strong>元メッセージの投稿者へメンション</strong>
          します。メンションを受け取りたくない場合は通知先の運用で調整してください
        </li>
        <li>
          対象絵文字が空欄の場合は、すべての絵文字が通知対象になります
        </li>
        <li>
          対象チャンネルはテキスト／アナウンスチャンネルから選択します。
          スレッド内のリアクションは通知されません
        </li>
        <li>
          プロフィールv2が未導入の場合は、プロフィールカードの代わりに
          簡易的なEmbedが送信されます
        </li>
      </ul>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
