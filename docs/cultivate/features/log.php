<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ログ - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🗂️</div>
        <h1>ログ</h1>
        <p>サーバー内の各種操作を記録し、指定チャンネルへ自動送信</p>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 ログ機能とは？</strong>
        VCの入退室からモデレーション、メッセージ削除、ロール変更まで、
        サーバー内で起きた操作を<strong>Webhookで自動的に記録</strong>する機能です。
        送信先は「全体」「グループ単位」「イベント単位」の3段階で
        細かく設定でき、除外チャンネル・除外ロールにも対応しています。</p>
      </div>

      <h2>概要</h2>
      <p>
        <code>/ログ設定</code> を実行すると設定パネルが開きます。
        ログ機能を有効にし、送信先チャンネルを設定すると、
        該当する操作が発生するたびにEmbed形式のログが送信されます。
      </p>
      <ul>
        <li>全10グループ・全30種類のログに対応</li>
        <li>全ログ共通の送信先／グループ単位／イベント単位の送信先を設定可能</li>
        <li>イベントごとに取得する・しないを切り替え可能</li>
        <li>特定のチャンネル・ロールのログを除外可能</li>
        <li>送信先チャンネルごとにWebhookを自動作成（大量送信にも対応）</li>
      </ul>

      <h2>取得できるログ</h2>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>グループ</th>
            <th>取得するログ</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🔊 VC</td>
            <td>VC入室 / VC退出 / VC移動</td>
          </tr>
          <tr>
            <td>🛡️ モデレーション</td>
            <td>BAN / BAN解除 / KICK / タイムアウト / タイムアウト解除</td>
          </tr>
          <tr>
            <td>💬 メッセージ</td>
            <td>メッセージ削除 / メッセージ編集 / 一括メッセージ削除</td>
          </tr>
          <tr>
            <td>🎭 ロール付与・剥奪</td>
            <td>ロール付与 / ロール剥奪</td>
          </tr>
          <tr>
            <td>🛠️ ロール管理</td>
            <td>ロール作成 / ロール編集 / ロール削除</td>
          </tr>
          <tr>
            <td>👤 メンバー操作</td>
            <td>ニックネーム変更 / アイコン変更 / サーバー入室 / サーバー退出</td>
          </tr>
          <tr>
            <td>📁 チャンネル管理</td>
            <td>チャンネル作成 / チャンネル削除 / チャンネル編集</td>
          </tr>
          <tr>
            <td>🏠 サーバー管理</td>
            <td>招待リンク作成</td>
          </tr>
          <tr>
            <td>😀 絵文字管理</td>
            <td>絵文字作成 / 絵文字編集 / 絵文字削除</td>
          </tr>
          <tr>
            <td>🏷️ スタンプ管理</td>
            <td>スタンプ作成 / スタンプ編集 / スタンプ削除</td>
          </tr>
        </tbody>
      </table></div>

      <h3>記録される主な内容</h3>
      <ul>
        <li><strong>実行者</strong>: 監査ログから取得（取得できない場合は「不明」）</li>
        <li><strong>対象</strong>: 操作されたメンバー・ロール・チャンネルなど</li>
        <li><strong>理由</strong>: BAN / KICK時に理由が入力されていれば表示</li>
        <li><strong>変更内容</strong>: 名前・権限・色・トピックなどの変更前後</li>
        <li><strong>メッセージ</strong>: 削除・編集前後の本文（最大500文字）と添付ファイル名</li>
      </ul>

      <h2>設定方法</h2>

      <h3>1. 設定パネルを開く</h3>
      <ol class="steps">
        <li>
          <strong>コマンドを実行</strong>
          <code>/ログ設定</code>
        </li>
        <li>
          <strong>ログ機能を有効にする</strong>
          「⚙️ 全般設定」から「ログ機能を有効にする」をチェック
        </li>
        <li>
          <strong>送信先を設定する</strong>
          必要に応じて「📂 グループ設定」「🎯 個別設定」で送信先を指定
        </li>
      </ol>

      <div class="alert alert-warning">
        <p><strong>⚠️ 送信先が未設定の場合</strong>
        ログ機能が有効でも、送信先チャンネルが1つも設定されていない
        イベントは送信されません。まず「⚙️ 全般設定」で
        全ログ送信先を設定するのがおすすめです。</p>
      </div>

      <h3>2. 全般設定</h3>
      <p>ログ機能全体のON/OFFと、共通の送信先を設定します。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>設定項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ログ機能</td>
            <td>OFFにすると全てのログ送信を停止します</td>
          </tr>
          <tr>
            <td>全ログ送信先</td>
            <td>グループ・個別設定が無いログの送信先チャンネル</td>
          </tr>
        </tbody>
      </table></div>

      <h3>3. グループ設定</h3>
      <p>
        グループ（VC・モデレーション・メッセージなど）単位で
        送信先と取得イベントを一括設定します。
      </p>
      <ul>
        <li>「📂 グループ設定」→ グループを選択</li>
        <li>送信先チャンネルを選択（未選択で全体設定を使用）</li>
        <li>取得するログにチェックを入れる（外すと送信しない）</li>
      </ul>

      <h3>4. 個別設定</h3>
      <p>
        特定のイベントだけ別のチャンネルへ送信したい場合に使用します。
        グループ設定より優先されます。
      </p>
      <ul>
        <li>「🎯 個別設定」→ グループを選択 → イベントを選択</li>
        <li>送信先チャンネルを選択（未選択でグループ設定を使用）</li>
        <li>「このログを取得する」のチェックでON/OFFを切り替え</li>
      </ul>

      <h3>5. 除外設定</h3>
      <p>
        「🚫 除外設定」から、ログを送信しないチャンネル・ロールを
        最大10件ずつ指定できます。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>設定項目</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>除外チャンネル</td>
            <td>
              対象チャンネルに関するログを送信しません
              （メッセージ・VC・チャンネル編集・招待など）
            </td>
          </tr>
          <tr>
            <td>除外ロール</td>
            <td>
              実行者または対象メンバーがそのロールを持つ場合、
              ログを送信しません
            </td>
          </tr>
        </tbody>
      </table></div>

      <h3>6. 設定のリセット</h3>
      <p>
        「🗑️ 設定リセット」から確認ダイアログを経て、
        このサーバーのログ設定をすべて削除できます。
      </p>

      <h2>送信先の決まり方</h2>
      <p>各ログの送信先は、次の優先順位で決まります。</p>
      <ol class="steps">
        <li><strong>イベント個別設定</strong>（🎯 個別設定）</li>
        <li><strong>グループ設定</strong>（📂 グループ設定）</li>
        <li><strong>全体設定</strong>（⚙️ 全般設定の全ログ送信先）</li>
      </ol>
      <p>
        いずれも未設定、またはイベントが無効になっている場合は
        送信されません。
      </p>

      <h2>Webhookによる送信</h2>
      <p>
        ログは大量のメッセージ送信が必要になるため、
        送信先チャンネルごとに専用Webhookを自動作成して送信します。
      </p>
      <ul>
        <li>Botが送信先チャンネルで「Webhookの管理」権限を持っている必要があります</li>
        <li>Webhookが見つからない場合は自動で再作成します</li>
        <li>Webhookを作成できない場合は通常のチャンネル送信に切り替えます</li>
        <li>Discordのレート制限を超えないよう、チャンネルごとに送信間隔を調整します</li>
        <li>スレッドが送信先の場合は、親チャンネルのWebhookからスレッドへ送信します</li>
      </ul>

      <h2>必要な権限</h2>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>対象</th>
            <th>必要な権限</th>
            <th>用途</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>コマンド実行者</td>
            <td>管理者</td>
            <td><code>/ログ設定</code> の実行・設定変更</td>
          </tr>
          <tr>
            <td>Bot</td>
            <td>Webhookの管理</td>
            <td>送信先チャンネルへのWebhook作成</td>
          </tr>
          <tr>
            <td>Bot</td>
            <td>監査ログを見る</td>
            <td>実行者・理由の取得</td>
          </tr>
          <tr>
            <td>Bot</td>
            <td>メッセージを管理 など</td>
            <td>各ログ種別のイベント受信・内容取得</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 監査ログ権限がない場合</strong>
        BAN・KICK・ロール変更などの実行者は「不明」と表示されますが、
        ログ自体は送信されます。</p>
      </div>

      <h2>コマンド一覧</h2>

      <div class="command-block">
        <div class="cmd-name">/ログ設定</div>
        <div class="cmd-desc">
          ログ設定パネルを開きます。全般設定・グループ設定・
          個別設定・除外設定・設定リセットを行えます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>注意事項</h2>
      <ul>
        <li>ログ機能を有効にしない限り、ログは送信されません</li>
        <li>送信先チャンネルを削除すると、そのチャンネル宛てのログは送信されません</li>
        <li>BAN・KICK・タイムアウトなどの実行者取得には「監査ログを見る」権限が必要です</li>
        <li>招待リンクは「作成」のみ記録します（削除は対象外）</li>
        <li>Bot自身が送信したメッセージの削除・編集は記録しません</li>
        <li>ロール削除に伴う一括剥奪は、ロール削除ログとして記録されます</li>
        <li>短時間に大量のイベントが発生した場合は、順番に送信されるため遅延することがあります</li>
      </ul>

      <h2>よくある質問</h2>

      <h3>ログが送信されません</h3>
      <ul>
        <li>「⚙️ 全般設定」でログ機能が有効になっているか確認してください</li>
        <li>送信先チャンネルが設定されているか確認してください</li>
        <li>対象イベントが「📂 グループ設定」「🎯 個別設定」で無効になっていないか確認してください</li>
        <li>除外チャンネル・除外ロールに該当していないか確認してください</li>
        <li>Botに「Webhookの管理」または送信先での「メッセージを送信」権限があるか確認してください</li>
      </ul>

      <h3>実行者が「不明」になります</h3>
      <ul>
        <li>Botに「監査ログを見る」権限を付与してください</li>
        <li>Discord側の監査ログ記録が反映されるまで数秒かかる場合があります</li>
      </ul>

      <h3>メッセージの本文が表示されません</h3>
      <ul>
        <li>Botがメッセージ内容を取得できない場合（キャッシュ外の古いメッセージなど）は「内容なし」と表示されます</li>
      </ul>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
