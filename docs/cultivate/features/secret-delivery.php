<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ひみつ便 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">💌</div>
        <h1>ひみつ便</h1>
        <p>プロフィールパネルから、こっそりメッセージを届ける</p>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 ひみつ便とは？</strong>
          メンバーごとの<strong>プロフィールパネル</strong>をチャンネルに設置し、
          パネルの「ひみつ便」ボタンから<strong>その本人へメッセージを送れる</strong>
          機能です。受け取ったメッセージには送信者の情報が付き、
          そのまま<strong>返信</strong>することもできます。</p>
      </div>

      <h2>概要</h2>
      <p>
        管理者が「ひみつ便設定」を作成し、
        <code>/ひみつ便パネル送信</code> で対象メンバー分のパネルを
        チャンネルへ送信します。パネルには対象者のプロフィールと
        「ひみつ便」ボタンが表示されます。
      </p>
      <p>
        ボタンを押した人はメッセージを入力して送信でき、
        届いたメッセージは<strong>DM</strong>または
        <strong>プライベートスレッド</strong>で受信者に届きます。
        受信者はその場で<strong>削除</strong>・<strong>返信</strong>ができます。
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
            <td>パネル送信</td>
            <td>対象メンバーごとにプロフィールパネルを送信
              （TC / VC / スレッド対応）</td>
          </tr>
          <tr>
            <td>ひみつ便の送信</td>
            <td>パネルのボタンから相手へメッセージを送信</td>
          </tr>
          <tr>
            <td>メッセージ入力</td>
            <td>設定で入力Modalの表示／必須を切り替え（300文字まで）</td>
          </tr>
          <tr>
            <td>通知方法</td>
            <td>DM / スレッド / DM→スレッド（DM失敗時スレッド）を選択</td>
          </tr>
          <tr>
            <td>送信者情報</td>
            <td>表示名・ユーザー名・ID・プロフィールリンクを自動で添付</td>
          </tr>
          <tr>
            <td>削除ボタン</td>
            <td>受け取ったひみつ便をその場で削除</td>
          </tr>
          <tr>
            <td>返信ボタン</td>
            <td>受け取ったひみつ便に返信（返信の受信者には返信ボタンを出さない）</td>
          </tr>
          <tr>
            <td>プロフィール色</td>
            <td>指定ロールを所持していればそのロール色をパネルに使用（上位優先）</td>
          </tr>
          <tr>
            <td>有効/無効切替</td>
            <td>設定ごとに一時的な無効化が可能</td>
          </tr>
          <tr>
            <td>設定数上限</td>
            <td>有効にできる設定は最大 25 件（コマンド補完の上限）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>設定項目</h2>

      <h3>基本設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>初期値</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>設定名</td>
            <td><code>設定1</code> など</td>
            <td>設定の管理名。パネルやメッセージにも使用されます</td>
          </tr>
          <tr>
            <td>通知方法</td>
            <td><code>DM</code></td>
            <td><code>DM</code> / <code>スレッド</code> /
              <code>DM→スレッド</code> から選択</td>
          </tr>
        </tbody>
      </table></div>

      <h3>パネル設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>初期値</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>embedタイトル</td>
            <td><code>{setting_name}</code></td>
            <td>パネルの見出し（プレースホルダー対応）</td>
          </tr>
          <tr>
            <td>embed説明文</td>
            <td><code>**{nickname}**</code><br>
              <code>**[プロフィールはコチラ]({profile_link})**</code></td>
            <td>パネル本文（プレースホルダー対応）</td>
          </tr>
          <tr>
            <td>embedカラー</td>
            <td><code>fdef56</code></td>
            <td>カラーコード（<code>#</code>は任意）</td>
          </tr>
          <tr>
            <td>カラーに使うロール</td>
            <td><code>なし</code></td>
            <td>対象者がロールを所持していればその色を使用。
              複数所持時は<strong>最上位ロール</strong>、
              非所持時は embedカラー</td>
          </tr>
          <tr>
            <td>サムネイルにユーザーアイコンを表示</td>
            <td><code>ON</code></td>
            <td>パネル右上に対象者のアイコンを表示</td>
          </tr>
          <tr>
            <td>パネル表示時にメンションする</td>
            <td><code>ON</code></td>
            <td>パネル送信時に対象者へメンション</td>
          </tr>
        </tbody>
      </table></div>

      <h3>ひみつ便ボタン設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>初期値</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ボタン絵文字</td>
            <td><code>💌</code></td>
            <td>パネルのボタンに表示する絵文字</td>
          </tr>
          <tr>
            <td>ボタンの文字</td>
            <td><code>空欄</code></td>
            <td>空欄なら絵文字のみ表示</td>
          </tr>
          <tr>
            <td>ボタンの色</td>
            <td><code>グレー</code></td>
            <td>グレー / 青 / 緑 / 赤</td>
          </tr>
          <tr>
            <td>メッセージ入力機能</td>
            <td><code>OFF</code></td>
            <td>ONにすると押下時にメッセージ入力Modalを表示</td>
          </tr>
          <tr>
            <td>メッセージ入力を必須にする</td>
            <td><code>OFF</code></td>
            <td>入力機能がONの時のみ有効</td>
          </tr>
        </tbody>
      </table></div>

      <h3>削除ボタン設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>初期値</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ボタン絵文字</td>
            <td><code>🗑️</code></td>
            <td>受け取ったひみつ便に表示する絵文字</td>
          </tr>
          <tr>
            <td>ボタンの文字</td>
            <td><code>空欄</code></td>
            <td>空欄なら絵文字のみ表示</td>
          </tr>
          <tr>
            <td>ボタンの色</td>
            <td><code>グレー</code></td>
            <td>グレー / 青 / 緑 / 赤</td>
          </tr>
          <tr>
            <td>削除ボタンを表示する</td>
            <td><code>ON</code></td>
            <td>OFFにすると削除ボタンを表示しません</td>
          </tr>
        </tbody>
      </table></div>

      <h3>返信ボタン設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>初期値</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ボタン絵文字</td>
            <td><code>💌</code></td>
            <td>受け取ったひみつ便に表示する絵文字</td>
          </tr>
          <tr>
            <td>ボタンの文字</td>
            <td><code>空欄</code></td>
            <td>空欄なら絵文字のみ表示</td>
          </tr>
          <tr>
            <td>ボタンの色</td>
            <td><code>グレー</code></td>
            <td>グレー / 青 / 緑 / 赤</td>
          </tr>
          <tr>
            <td>返信ボタンを表示する</td>
            <td><code>ON</code></td>
            <td>OFFにすると返信ボタンを表示しません</td>
          </tr>
          <tr>
            <td>メッセージ入力機能</td>
            <td><code>OFF</code></td>
            <td>ONにすると返信時にModalを表示</td>
          </tr>
          <tr>
            <td>メッセージ入力を必須にする</td>
            <td><code>OFF</code></td>
            <td>入力機能がONの時のみ有効</td>
          </tr>
        </tbody>
      </table></div>

      <h3>プロフィール設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>デフォルトで使用するプロフィール設定</td>
            <td>パネルの <code>{profile_link}</code> に使うプロフィール。
              未選択の場合は<strong>メイン設定のプロフィール</strong>を使用</td>
          </tr>
        </tbody>
      </table></div>

      <h2>プレースホルダー</h2>
      <p>パネルのタイトル・説明文で使用できます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>変数</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>{setting_name}</code></td>
            <td>設定名</td>
          </tr>
          <tr>
            <td><code>{nickname}</code></td>
            <td>対象者のサーバー内表示名</td>
          </tr>
          <tr>
            <td><code>{profile_link}</code></td>
            <td>対象者のプロフィールメッセージへのリンク</td>
          </tr>
        </tbody>
      </table></div>

      <h2>パネルの送信</h2>
      <p>
        <code>/ひみつ便パネル送信</code> でパネルを送信します。
        設定は<strong>補完（有効な設定のみ）</strong>から選択します。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>オプション</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>設定</code>（必須）</td>
            <td>使用するひみつ便設定</td>
          </tr>
          <tr>
            <td><code>チャンネル</code></td>
            <td>送信先。未指定ならコマンドを実行したチャンネル。
              <strong>TC / VC / スレッド</strong>に送信できます</td>
          </tr>
          <tr>
            <td><code>所持ロール</code></td>
            <td>指定すると、そのロールを持つメンバー<strong>全員</strong>分のパネルを送信</td>
          </tr>
          <tr>
            <td><code>ユーザー</code></td>
            <td>指定すると、そのユーザーのパネルのみ送信</td>
          </tr>
        </tbody>
      </table></div>
      <p><strong>送信対象の決まり方</strong></p>
      <ul>
        <li><code>ユーザー</code> が指定されていれば、そのユーザーのみ</li>
        <li>そうでなく <code>所持ロール</code> が指定されていれば、そのロールを持つ全員</li>
        <li>どちらも未指定なら、<strong>実行者が参加しているVCのメンバー全員</strong></li>
      </ul>

      <h2>ひみつ便の受信</h2>
      <p>届くメッセージは次の2つの埋め込みで構成されます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>埋め込み</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1つ目</td>
            <td>タイトル: <code>{送信者名}からの{設定名}</code><br>
              説明: 入力されたメッセージ（未入力なら「未設定」）<br>
              色: 緑</td>
          </tr>
          <tr>
            <td>2つ目</td>
            <td>タイトル: <code>送信者情報</code><br>
              説明: 表示名 / 名前 / ID / プロフィールリンク<br>
              サムネイル: 送信者のアイコン</td>
          </tr>
        </tbody>
      </table></div>
      <p>受信者は以下のボタンで操作できます（設定で表示を切り替え）。</p>
      <ul>
        <li><strong>削除</strong>: 受け取ったひみつ便を削除します</li>
        <li><strong>返信</strong>: 返信を送信します。送信後は受信メッセージに
          「返信しました」と返信内容が追記され、
          <strong>そのメッセージのボタンは削除</strong>されます</li>
      </ul>

      <h2>通知方法</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>通知方法</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>DM</code></td>
            <td>受信者のDMへ送信</td>
          </tr>
          <tr>
            <td><code>スレッド</code></td>
            <td>パネルが設置されているチャンネルにプライベートスレッドを作成し、
              受信者のみを招待して送信</td>
          </tr>
          <tr>
            <td><code>DM→スレッド</code></td>
            <td>まずDMへ送信し、DMを送れない場合のみスレッドへ送信</td>
          </tr>
        </tbody>
      </table></div>

      <h2>コマンド</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>コマンド</th>
            <th>説明</th>
            <th>権限</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/ひみつ便設定</code></td>
            <td>ひみつ便設定を管理（新規作成・編集・削除・有効/無効）</td>
            <td>管理者</td>
          </tr>
          <tr>
            <td><code>/ひみつ便パネル送信</code></td>
            <td>設定をもとにパネルを送信</td>
            <td>管理者</td>
          </tr>
        </tbody>
      </table></div>

      <h2>注意事項</h2>
      <div class="alert alert-warning">
        <ul>
          <li><strong>DM</strong> で届けるには、受信者がサーバーメンバーからのDMを
            受け取れる設定になっている必要があります。送れない場合は
            <code>DM→スレッド</code> か <code>スレッド</code> を使用してください</li>
          <li>パネルが <strong>VC内</strong> にある場合、Discordの制約により
            スレッドを作成できません。<code>DM</code> または
            <code>DM→スレッド</code> を推奨します</li>
          <li><code>スレッド</code> で届けるには、Botに
            「スレッドの作成」「スレッドでのメッセージ送信」権限が必要です</li>
          <li>返信の受信者に届くメッセージには<strong>返信ボタンが付きません</strong>
            （ひみつ便 → 返信の1往復で終了します）</li>
          <li>有効にできる設定は最大 25 件です。それ以上は
            既存の設定を無効にしてから有効にしてください</li>
          <li>パネルは<strong>対象者1人につき1メッセージ</strong>送信されます。
            ロール指定などで人数が多い場合は送信に時間がかかります</li>
        </ul>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
