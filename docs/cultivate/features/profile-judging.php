<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プロフ審査 - Cultivate ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '..'; $PAGE_TITLE = 'プロフ審査'; ?>
  <?php include __DIR__ . '/../include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">🧑‍⚖️</div>
        <h1>プロフ審査機能</h1>
        <p>メンバーのプロフィールをコミュニティで審査・評価</p>
      </div>

      <h2>概要</h2>
      <p>
        プロフ審査機能は、メンバーが投稿した自己紹介（プロフィール）を専用チャンネルに転送し、
        サーバー内の他のメンバーが評価・投票できる審査システムです。
        「知っているか」「おすすめできるか」「NG か」などをフォームから回答でき、
        結果は自動集計されてスレッドで管理されます。
      </p>
      <p>
        審査結果に基づいて、コミュニティの健全な交流を促進することができます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 対象:</strong> 審査の設定・管理は管理者が行います。審査への投票はサーバーメンバー誰でも可能です（ロール制限も設定可）。</p>
      </div>

      <h2>導入手順</h2>
      <ol class="steps">
        <li>
          <strong>設定パネルを開く</strong>
          <code>/設定パネル</code> を実行し、<strong>プロフィール設定</strong> → <strong>プロフ審査設定</strong> をクリック
        </li>
        <li>
          <strong>新規作成</strong>
          「➕新規作成」ボタンから審査設定を作成します
        </li>
        <li>
          <strong>各項目を設定</strong>
          以下の設定項目を必要に応じて構成します
        </li>
      </ol>

      <h2>設定項目</h2>

      <h3>基本設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>名前</td>
            <td>審査設定の名前（管理用）</td>
          </tr>
          <tr>
            <td>有効/無効</td>
            <td>審査機能の ON/OFF</td>
          </tr>
          <tr>
            <td>プロフ投稿チャンネル</td>
            <td>メンバーがプロフィールを投稿するチャンネル（複数設定可）</td>
          </tr>
          <tr>
            <td>転送先チャンネル</td>
            <td>投稿されたプロフィールを転送し、審査を行うチャンネル</td>
          </tr>
        </tbody>
      </table></div>

      <h3>ロールフィルター</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>転送対象ロール</td>
            <td>設定したロールを<strong>1つでも</strong>持つメンバーのみ審査へ転送されます（未設定なら全員）</td>
          </tr>
          <tr>
            <td>転送非対象ロール</td>
            <td>設定したロールを<strong>1つでも</strong>持つメンバーは審査へ転送されません（<strong>転送対象ロールより優先</strong>）</td>
          </tr>
          <tr>
            <td>通知メンションロール</td>
            <td>新規審査時にメンションするロール</td>
          </tr>
        </tbody>
      </table></div>

      <h3>審査フォーム設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>知っていますか？</td>
            <td>「関わったことがある/ない」のラジオボタン（表示 ON/OFF 可、回答の必須/任意 可、文言カスタマイズ可）</td>
          </tr>
          <tr>
            <td>おすすめ度</td>
            <td>「おすすめできる/どちらでも/おすすめしない」のラジオボタン（表示 ON/OFF 可、回答の必須/任意 可、文言カスタマイズ可）</td>
          </tr>
          <tr>
            <td>紹介フラグ</td>
            <td>「この方を紹介しました」チェックボックス（表示 ON/OFF 可）</td>
          </tr>
          <tr>
            <td>NG フラグ</td>
            <td>「NGです」チェックボックス（表示 ON/OFF 可）</td>
          </tr>
          <tr>
            <td>コメント</td>
            <td>自由記述テキスト（表示 ON/OFF 可、入力の必須/任意 可、プレースホルダーカスタマイズ可）</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 ポイント:</strong>「知っていますか？」「おすすめ度」
        「コメント」は、各項目の<strong>「編集」ボタンから開く編集画面</strong>で
        <strong>回答の必須／任意</strong>を切り替えられます。
        任意にすると未回答のままでも審査を送信できます
        （未回答は集計の選択肢別カウントには含まれません）。</p>
        <p>選択肢を持つ質問では、編集画面が
        <strong>1ページ1選択肢のページング式</strong>になり、
        「質問事項編集」「選択肢追加」は全ページ共通、
        「選択肢編集」「選択肢削除」は
        <strong>表示中のページの選択肢</strong>を操作します。
        ラベルや説明を編集しても集計結果は維持されます
        （<strong>削除して作り直した選択肢は別の集計</strong>になります）。</p>
      </div>

      <h3>締切設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>締切日数</td>
            <td>投稿から何日後に審査を自動締め切りするか（デフォルト: 3日）</td>
          </tr>
          <tr>
            <td>締切時刻</td>
            <td>締切となる時刻（HH:MM）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>管理メニュー設定</h2>
      <p>
        プロフ審査設定には、転送メッセージから実行できる
        <strong>管理メニュー</strong>を登録できます。
        審査対象者に対して、ロール操作・KICK・メッセージ送信を
        ボタン一つで実行できるようになります。
      </p>
      <ul>
        <li>1つのプロフ審査設定につき最大 <strong>20件</strong> まで登録可能</li>
        <li>転送メッセージに「管理メニュー」ボタンが表示されます（1件以上のとき）</li>
        <li>ボタンを押すと、実行できる操作がSelectで一覧表示されます</li>
        <li>操作ごとに「操作可能ロール」「対象者のユーザーロール条件」を設定できます</li>
      </ul>

      <div class="alert alert-info">
        <p><strong>💡 既存の「説明会開始」ボタンについて</strong>
        これまで一部サーバー限定だった「説明会開始」ボタンは、
        管理メニュー設定へ自動で移行されます。
        既存メッセージの「説明会開始」ボタンを押した場合も、
        同じ管理メニューが開きます。</p>
      </div>

      <h3>設定画面の開き方</h3>
      <ol class="steps">
        <li><strong><code>/プロフ審査設定</code> を実行</strong></li>
        <li><strong>対象の設定を選択して「⚙️ 編集」</strong></li>
        <li><strong>「🧩 管理メニュー設定」を押す</strong>
          管理メニューの一覧が表示されます
        </li>
      </ol>

      <h3>基本設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定名</td>
            <td>Selectに表示される名前（他の管理メニューと重複不可）</td>
          </tr>
          <tr>
            <td>操作タイプ</td>
            <td>ロール操作 / KICK / メッセージ送信</td>
          </tr>
          <tr>
            <td>ユーザーロール（ホワイト）</td>
            <td>
              いずれかを所持している審査対象者に表示します。
              空欄の場合は制限なしです。
            </td>
          </tr>
          <tr>
            <td>ユーザーロール（ブラック）</td>
            <td>
              いずれかを所持している審査対象者には表示しません
              （ホワイトより優先）。
            </td>
          </tr>
          <tr>
            <td>操作可能ロール</td>
            <td>
              このロールを持つか、管理者権限を持つ場合のみ実行できます。
              未設定の場合は管理者のみ実行できます。
            </td>
          </tr>
        </tbody>
      </table></div>

      <h3>操作タイプ別の詳細設定</h3>

      <h4>ロール操作</h4>
      <ul>
        <li>
          <strong>無条件操作</strong>:
          対象者に対して必ず実行する付与ロール・剥奪ロール
        </li>
        <li>
          <strong>条件操作</strong>（最大9件）:
          対象者の所持ロールに応じて実行する付与・剥奪ロール
          <ul>
            <li>所持ロール条件・AND / OR・優先順位を設定</li>
            <li>条件操作は、成立したもののうち優先順位が最も高い1件のみ実行されます</li>
            <li>優先順位は数値が小さいほど優先されます</li>
          </ul>
        </li>
      </ul>

      <h4>KICK</h4>
      <ul>
        <li>対象メンバーをKICKします</li>
        <li>理由設定で指定した内容がKICK理由として記録されます</li>
      </ul>

      <h4>メッセージ送信</h4>
      <ul>
        <li>送信先チャンネルと本文を設定します</li>
        <li>本文では <code>{usermention}</code> <code>{username}</code>
          <code>{userid}</code> <code>{setting_name}</code>
          <code>{setting_id}</code> が使用できます</li>
      </ul>

      <h3>理由設定</h3>
      <p>
        操作理由（監査ログ・KICK理由）を設定します。
        デフォルトは
        <code>{setting_name}(#{setting_id})の{option_name}(#{option_id})を{ctrl_name}(#{ctrl_id})操作した</code>
        です。次のプレースホルダーが使用できます。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>プレースホルダー</th>
            <th>置き換え内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>{setting_name}</code> / <code>{setting_id}</code></td>
            <td>プロフ審査設定の設定名 / 設定ID</td>
          </tr>
          <tr>
            <td><code>{judging_name}</code> / <code>{judging_id}</code></td>
            <td>上記の別名（後方互換）</td>
          </tr>
          <tr>
            <td><code>{option_name}</code> / <code>{option_id}</code></td>
            <td>管理メニューの設定名 / 設定ID</td>
          </tr>
          <tr>
            <td><code>{ctrl_name}</code> / <code>{ctrl_id}</code></td>
            <td>管理メニューを操作したユーザーの表示名 / ID</td>
          </tr>
          <tr>
            <td><code>{ctrl_mention}</code></td>
            <td>管理メニューを操作したユーザーへのメンション</td>
          </tr>
          <tr>
            <td><code>{user_name}</code> / <code>{user_id}</code> / <code>{user_mention}</code></td>
            <td>上記（操作したユーザー）の別名</td>
          </tr>
          <tr>
            <td><code>{target_name}</code> / <code>{target_id}</code></td>
            <td>操作対象のメンバー（プロフ投稿者）の表示名 / ID</td>
          </tr>
          <tr>
            <td><code>{target_mention}</code></td>
            <td>操作対象のメンバーへのメンション</td>
          </tr>
          <tr>
            <td><code>{action_name}</code></td>
            <td>操作タイプ（ロール操作 / KICK / メッセージ送信）</td>
          </tr>
          <tr>
            <td><code>{guild_name}</code> / <code>{guild_id}</code></td>
            <td>サーバー名 / サーバーID</td>
          </tr>
          <tr>
            <td><code>{date}</code> / <code>{time}</code></td>
            <td>操作日時（<code>YYYY/MM/DD</code> / <code>HH:MM:SS</code>・JST）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>審査の流れ</h2>
      <ol class="steps">
        <li>
          <strong>メンバーがプロフを投稿</strong>
          設定された投稿チャンネルに自己紹介メッセージを送信します
        </li>
        <li>
          <strong>自動転送 &amp; スレッド作成</strong>
          Bot が転送先チャンネルにメッセージを転送し、プライベートスレッドを作成します
        </li>
        <li>
          <strong>メンバーが投票</strong>
          転送されたメッセージの「投票する」ボタンからフォームを開き、評価を入力します
        </li>
        <li>
          <strong>結果集計</strong>
          プライベートスレッドで投票結果が自動集計・表示されます
        </li>
        <li>
          <strong>自動締切</strong>
          設定された日数後に審査が自動で締め切られます
        </li>
      </ol>

      <h2>テンプレートチェックとの連携</h2>
      <p>
        プロフ審査と<a href="profile-template-check">テンプレートチェック</a>の
        両方が有効になっているチャンネルでは、投稿されたメッセージは
        まずテンプレートチェックで検証され、
        <strong>合格した場合のみプロフ審査が開始</strong>されます。
      </p>
      <ol class="steps">
        <li>
          <strong>メンバーがプロフを投稿</strong>
          投稿チャンネルに自己紹介メッセージを送信します
        </li>
        <li>
          <strong>テンプレートチェック</strong>
          テンプレートに沿っているか自動検証されます
        </li>
        <li>
          <strong>合格時のみ審査開始</strong>
          テンプレートに合格したメッセージだけが転送され、
          審査が開始されます（不合格の場合は審査されません）
        </li>
        <li>
          <strong>メンバーが投票</strong>
          転送されたメッセージの「投票する」ボタンからフォームを開き、評価を入力します
        </li>
      </ol>
      <div class="alert alert-info">
        <p><strong>💡 ポイント:</strong> テンプレートチェックが有効でない
        チャンネルでは従来どおり、投稿されたメッセージがそのまま審査対象になります。</p>
      </div>

      <h2 id="auto-forward">自動転送と手動転送</h2>
      <p>
        デフォルトではプロフ投稿チャンネルにメッセージが投稿されると
        <strong>自動で審査転送</strong>されます。
        設定の「転送先・連携設定」にある
        <strong>「自動転送を行わない」</strong>チェックボックスをONにすると、
        自動転送を停止し、<strong>手動転送のみ</strong>になります。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>設定</th>
            <th>投稿時の動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>自動転送ON（デフォルト）</td>
            <td>投稿されたメッセージを自動で転送し審査を開始します</td>
          </tr>
          <tr>
            <td>自動転送OFF</td>
            <td>自動では転送されません。管理者がコンテキストメニューから手動転送します</td>
          </tr>
        </tbody>
      </table></div>
      <div class="alert alert-info">
        <p><strong>💡 ポイント:</strong> 自動転送OFFはサーバーごとの設定で、
        既存設定には自動転送ONがデフォルトで適用されます（現行運用に影響しません）。</p>
      </div>

      <h2>コンテキストメニュー</h2>
      <p>
        メッセージを右クリック（長押し）→ 「アプリ」→ 「プロフ審査登録」を選択することで、
        既存のメッセージをプロフ審査に登録したり、審査中のメッセージを最新の内容に更新したりできます。
        自動転送OFFに設定している場合でも、この操作から手動で転送できます。
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
            <td>プロフ審査登録</td>
            <td>選択したメッセージを新規に審査登録します（Bot のメッセージは登録不可）</td>
          </tr>
          <tr>
            <td>プロフ審査更新</td>
            <td>既に審査中のメッセージの内容を最新に更新します</td>
          </tr>
        </tbody>
      </table></div>

      <h3>元メッセージの編集への追従</h3>
      <p>
        審査中に<strong>元メッセージが編集された場合、転送先のメッセージも自動で更新</strong>されます。
        投稿内容を修正したときも、転送メッセージと審査結果の内容が最新の状態に保たれます。
        コンテキストメニューの「プロフ審査更新」を使わなくても、
        元メッセージを編集するだけで反映されます。
      </p>

      <div class="alert alert-warning">
        <p><strong>⚠️ 注意:</strong> 審査設定はサーバーごとに独立しています。設定が存在しない状態でコンテキストメニューから登録しようとするとエラーになります。先に設定パネルから設定を作成してください。</p>
      </div>

      <?php include __DIR__ . '/../include/footer.php'; ?>
    </div>
  </main>
  <script src="../js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"></script>
</body>
</html>
