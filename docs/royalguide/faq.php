<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'FAQ - RoyalGuide ドキュメント'; ?>
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
      <h1>❓ FAQ</h1>
      <p>よくある質問とその回答をまとめています。</p>

      <h2>導入について</h2>

      <h3>Q. 無料で使えますか？</h3>
      <p>
        <strong>A.</strong> はい。RoyalGuide は無償で提供しています。
        運営が管理するサーバー上で稼働しており、利用者側で用意するものは Discord サーバーだけです。
      </p>

      <h3>Q. 導入には何が必要ですか？</h3>
      <p>
        <strong>A.</strong> 以下が必要です。
      </p>
      <ul>
        <li>Discord サーバーと、Bot を招待できる権限</li>
        <li>「メッセージコンテンツ」インテントの有効化</li>
        <li>「チャンネルを見る」「メッセージを送信」「スラッシュコマンドを使用」の権限</li>
        <li>音楽再生を使う場合は「ボイスチャンネルに接続」の権限</li>
      </ul>

      <h3>Q. 複数のサーバーに導入できますか？</h3>
      <p>
        <strong>A.</strong> はい。設定はサーバー（ギルド）ごとに独立して保存されるため、
        サーバーごとに違う保存先・プリセット・既定音量を設定できます。
      </p>

      <h2>機能について</h2>

      <h3>Q. 投稿者プリセットは何に使うのですか？</h3>
      <p>
        <strong>A.</strong> Webhook で投稿するときの「投稿者名」と「アイコン」を
        プリセットとして保存しておき、投稿のたびに使い回すための機能です。
        設定名・表示名・アイコンURL・アップロード画像の4項目を登録できます。
      </p>

      <h3>Q. プリセットはいくつまで作れますか？</h3>
      <p>
        <strong>A.</strong> 1サーバーあたり最大 <strong>24件</strong> です。
      </p>

      <h3>Q. 保存先チャンネルを設定しないとどうなりますか？</h3>
      <p>
        <strong>A.</strong> 「機能ごとの個別設定 → グローバルチャンネル → 機能の既定値」の順で
        自動的に解決されます。そのため、まず <code>/基本設定</code> で
        グローバルチャンネルだけ決めておけば、各機能はそのまま動作します。
      </p>

      <h3>Q. 音楽はどのサービスから再生できますか？</h3>
      <p>
        <strong>A.</strong> SoundCloud のみ対応しています。曲の URL とプレイリストの URL を
        <code>/play</code> に渡せます。YouTube など他のサービスには対応していません。
      </p>

      <h3>Q. 音量はどこまで上げられますか？</h3>
      <p>
        <strong>A.</strong> 0〜200% の範囲で指定できます。150% を超えると音割れする場合があるため、
        サーバーに合わせて <code>/defaultvolume</code> で既定値を調整してください。
      </p>

      <h3>Q. ずんだもん等の声で読み上げできますか？</h3>
      <p>
        <strong>A.</strong> はい。VOICEVOX Engine を起動しておくと、
        <code>/音声設定</code> からずんだもん等の話者を選べます。
        エンジンに接続できない場合は edge-tts の既定音声で読み上げます。
        <code>/音声設定</code> のパネルに VOICEVOX Engine の接続状態が表示されます。
      </p>

      <h3>Q. 読み上げの声を変えたのに反映されません</h3>
      <p>
        <strong>A.</strong> 声は投稿者ごとに「ロール設定 → ユーザー設定 →
        サーバーデフォルト」の順で決まります。ロール音声制御に一致している場合は
        話者が固定されます（<code>/音声設定</code> のパネルに表示されます）。
        また、読み上げ中に変更した場合は次のメッセージから反映されます。
      </p>

      <h3>Q. 「読み上げ起動」と送るだけで始まるのはなぜですか？</h3>
      <p>
        <strong>A.</strong> サーバー読み上げ設定の「開始/終了テキスト」による
        ショートカットです。既定は <code>読み上げ起動</code> /
        <code>読み上げ停止</code> で、<code>/サーバー読み上げ設定</code> から変更できます。
        全インスタンスで共有され、最初に応答した 1 台だけが処理します。
      </p>

      <h3>Q. 設定系のコマンドが見つかりません</h3>
      <p>
        <strong>A.</strong> <code>/音声設定</code> <code>/基本設定</code>
        <code>/投稿者設定</code> <code>/サーバー読み上げ設定</code>
        <code>/辞書</code> は RoyalGuide01 でのみ動作します。
        他のインスタンスでは、読み上げや音楽再生のみ利用できます。
      </p>

      <h2>トラブルシューティング</h2>

      <h3>Q. 反応しません</h3>
      <p>
        <strong>A.</strong> 以下の点をご確認ください。
      </p>
      <ul>
        <li>Bot がオンラインで動作しているか</li>
        <li>必要な権限（コマンド使用・メッセージ送信）が付与されているか</li>
        <li>「メッセージコンテンツ」インテントが有効になっているか</li>
        <li>コマンドがそのチャンネルで使用可能か（チャンネル個別の権限設定）</li>
      </ul>

      <h3>Q. 「管理者専用」と表示されます</h3>
      <p>
        <strong>A.</strong> <code>/投稿者設定</code> と <code>/基本設定</code> はサーバー管理者専用です。
        <code>/defaultvolume</code> は「サーバー管理」権限を持つユーザーが実行できます。
      </p>

      <h3>Q. ボイスチャンネルに接続できません</h3>
      <p>
        <strong>A.</strong> 「ボイスチャンネルに接続」の権限が付与されているか、
        ボイスチャンネルの人数上限に達していないかをご確認ください。
        同じサーバーで他の再生が動いている場合も接続できません。
      </p>

      <h3>Q. 曲が再生されません</h3>
      <p>
        <strong>A.</strong> 非公開の曲や、SoundCloud 側で配信が制限されている曲は再生できません。
        別の曲またはプレイリストの URL でお試しください。詳しくは
        <a href="known-issues">既知の不具合</a> をご覧ください。
      </p>

      <h2>その他</h2>

      <h3>Q. 機能のリクエストはできますか？</h3>
      <p>
        <strong>A.</strong> サポートサーバーにて機能リクエストを受け付けています。ただし、すべてのリクエストにお応えできるとは限りません。
      </p>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
