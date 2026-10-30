<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '読み上げ - RoyalGuide ドキュメント'; ?>
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
        <div class="feature-icon">🗣</div>
        <h1>読み上げ（Text To Speech）</h1>
        <p>テキストチャンネルの投稿を、ボイスチャンネルで読み上げる。</p>
      </div>

      <h2>概要</h2>
      <p>
        読み上げ対象のチャンネルへ投稿されたメッセージを、ボイスチャンネルで
        順番に読み上げます。音声は edge-tts（Azure）と VOICEVOX Engine に対応し、
        投稿者ごとに話者を切り替えられます。
      </p>

      <h2>コマンド</h2>

      <h3>読み上げを開始する</h3>
      <pre><code>/読み上げ開始</code></pre>
      <p>
        実行者が参加しているボイスチャンネルへ接続し、実行したチャンネルの投稿を
        読み上げます。終了するときは <code>/読み上げ終了</code> を実行します。
      </p>

      <h3>その他のコマンド</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>コマンド</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/読み上げ終了</code></td>
            <td>読み上げを停止し、ボイスチャンネルから退出します。</td>
          </tr>
          <tr>
            <td><code>/読み上げスキップ</code></td>
            <td>再生中の読み上げを中断し、待機中の読み上げを破棄します。</td>
          </tr>
          <tr>
            <td><code>/読み上げ状態</code></td>
            <td>接続中のVC・対象チャンネル・待機件数・使用中の音声を表示します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>系列Botを指定する</h2>
      <p>
        <code>/読み上げ開始 bot:RoyalGuide02</code> のように系列Botを指定すると、
        そのBotが読み上げを担当します。指定しない場合は、既存の担当または
        空いている系列Botが自動で選ばれます。
      </p>
      <ul>
        <li>指定したBotが使用中・応答なしの場合は、自動で別の系列Botへ切り替わります。</li>
        <li>開始時は、以前の担当Botを自動で停止します（二重再生の防止）。</li>
        <li>実際の参加・読み上げは担当Bot自身が行います。</li>
        <li><code>/読み上げ終了</code> <code>/読み上げスキップ</code> <code>/読み上げ状態</code> は担当Botへ自動で振り分けられます。</li>
        <li>操作コマンドは RoyalGuide01 にのみ実装されています。</li>
        <li>対象のBotがサーバーに参加している必要があります（未参加なら次の候補へ）。</li>
      </ul>

      <h2>読み上げのルール</h2>
      <ul>
        <li>Bot / Webhook の投稿は読み上げません。</li>
        <li><code>!</code> <code>?</code> <code>/</code> などで始まるコマンド入力は読み上げません。</li>
        <li>メンション・ロール・チャンネル・カスタム絵文字・URL は読み上げやすい文字列へ変換します。</li>
        <li>長文は文単位で分割し、上限を超えた部分は省略します。</li>
        <li>ボイスチャンネルから人がいなくなると自動で退出します。</li>
      </ul>

      <h2>VCごとの担当</h2>
      <p>
        読み上げは<strong>ボイスチャンネル単位</strong>で管理されます。
        1つのVCにつき1台のBotが担当し、別のVCは別の号機が同時に担当できます。
      </p>
      <ul>
        <li>使用中のVCで別のBotを指定しても、入れ替えは行いません（担当中のBotを案内します）。</li>
        <li>指定したBotが別のVCで使用中の場合は、空いている号機へ自動で割り当てます。</li>
        <li><code>/読み上げ終了</code> <code>/読み上げスキップ</code> <code>/読み上げ状態</code> は、参加中のVCの担当Botへ振り分けられます。</li>
      </ul>

      <h2>音声の決まり方</h2>
      <p>読み上げる声は、投稿者ごとに次の順で決まります。</p>
      <ol class="steps">
        <li>
          <strong>ロール音声制御</strong>
          一致するルールがあれば、その中の話者からランダムに1つ使います。
        </li>
        <li>
          <strong>ユーザー音声設定</strong>
          ロール設定がない場合、そのユーザーの <code>/音声設定</code> を使います。
        </li>
        <li>
          <strong>サーバーデフォルト</strong>
          どちらも未設定の場合、サーバーの既定音声を使います。
        </li>
      </ol>
      <p>
        詳しい設定方法は <a href="voice-settings">音声設定</a> を参照してください。
        入退室の読み上げや名前の扱いは、同じパネルの
        「🔧 読み上げ挙動設定」から変更できます。
      </p>

      <h2>読み上げ辞書</h2>
      <p>
        辞書に登録した単語は、読み上げ時に指定した読みへ置き換えます。
        長い単語を優先して適用します。
      </p>

      <h3>辞書形式（ShabeleA 互換）</h3>
      <pre><code>入店,にゅうてん
vc,ぶいしー</code></pre>
      <ul>
        <li>1行1エントリの <code>単語,読み</code>（UTF-8）。</li>
        <li>空行と <code>#</code> で始まる行は無視します。</li>
        <li>単語 60 文字 / 読み 120 文字、最大 2,000 件まで。</li>
      </ul>

      <h3>辞書コマンド</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>コマンド</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/辞書 追加</code></td>
            <td>単語と読みを登録します（同じ単語は上書き）。</td>
          </tr>
          <tr>
            <td><code>/辞書 削除</code></td>
            <td>登録した単語を削除します。</td>
          </tr>
          <tr>
            <td><code>/辞書 一覧</code></td>
            <td>登録内容を表示します。</td>
          </tr>
          <tr>
            <td><code>/辞書 出力</code></td>
            <td>ShabeleA 形式のファイルとして出力します。</td>
          </tr>
          <tr>
            <td><code>/辞書 読み込み</code></td>
            <td>ファイルを読み込みます（追加 / 置換）。</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-warning">
        <p><strong>💡 注意:</strong> 辞書コマンドは管理者専用で、RoyalGuide01 でのみ利用できます。</p>
      </div>

      <h2>VOICEVOX（ずんだもん等）</h2>
      <p>
        VOICEVOX Engine を起動しておくと、ずんだもん等の話者を選べます。
        エンジンに接続できない場合は edge-tts の既定音声で読み上げます。
        接続状態は <code>/音声設定</code> のパネルで確認できます。
      </p>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
