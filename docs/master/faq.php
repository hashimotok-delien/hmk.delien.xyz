<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>FAQ - master Bot ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '.'; $PAGE_TITLE = 'FAQ'; ?>
  <?php include __DIR__ . '/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/include/topbar.php'; ?>

    <div class="content">
      <h1>❓ FAQ</h1>
      <p>よくある質問とその回答をまとめています。</p>

      <h2>導入について</h2>

      <h3>Q. master Bot は無料で使えますか？</h3>
      <p>
        <strong>A.</strong> はい、無料で基本利用できます。界隈サーバー専用の無料配布 Bot です。ただし、サーバーのストレージを圧迫するような機能やDiscordとの通信を多用する機能は制限されており、将来的に有料プランが導入される可能性があります。
      </p>

      <h3>Q. 導入には何が必要ですか？</h3>
      <p>
        <strong>A.</strong> サーバーの管理者権限が必要です。サポートサーバーに参加し、チケットから導入リクエストを送信してください。
      </p>

      <h3>Q. 複数のサーバーで使用できますか？</h3>
      <p>
        <strong>A.</strong> 基本的には1サーバーにつき1つの導入となります。詳細はサポートサーバーでお問い合わせください。
      </p>

      <h2>機能について</h2>

      <h3>Q. 役職パネルにはいくつのロールを設定できますか？</h3>
      <p>
        <strong>A.</strong> 1つのパネルにつき最大22個のロールを設定できます。
      </p>

      <h3>Q. 自動リアクションにはいくつの絵文字を設定できますか？</h3>
      <p>
        <strong>A.</strong> 最大20個の絵文字を設定できます。
      </p>

      <h3>Q. 個室はいつ削除されますか？</h3>
      <p>
        <strong>A.</strong> 裏個室の VC は毎朝5時に自動削除されます。表個室は VC 内の「個室を削除」ボタンから削除できます。
      </p>

      <h3>Q. 裏募集のプリセットはいくつまで作成できますか？</h3>
      <p>
        <strong>A.</strong> 無料では募集設定5件・パネル設定3件までです。プレミアム環境では募集設定20件・パネル設定10件まで作成できます。
      </p>

      <h3>Q. DM/フレンド申請の回答期限はありますか？</h3>
      <p>
        <strong>A.</strong> 申請は5分でタイムアウトします。相手からの回答が無い場合は、もう一度申請してください。
      </p>

      <h2>トラブルシューティング</h2>

      <h3>Q. Bot が反応しません</h3>
      <p>
        <strong>A.</strong> 以下の点をご確認ください。
      </p>
      <ul>
        <li>Bot がサーバーにオンラインで参加しているか</li>
        <li>コマンドを実行するチャンネルで Bot の権限が適切に設定されているか</li>
        <li>必要な権限（メッセージ管理、ロール管理など）が付与されているか</li>
      </ul>

      <h3>Q. 設定パネルが表示されません</h3>
      <p>
        <strong>A.</strong> 管理者権限を持っているか確認してください。また、パネルの設置チャンネルが適切かどうかもご確認ください。
      </p>

      <h3>Q. 寝落ち送りが動きません</h3>
      <p>
        <strong>A.</strong> 以下をご確認ください。
      </p>
      <ul>
        <li>設定パネルで寝落ち送りが有効になっているか</li>
        <li>「寝落ち送り」テキストチャンネルと「寝落ち部屋」VC が同じカテゴリにあるか</li>
        <li>対象メンバーが「寝落ち部屋に送らないでね」ロールを持っていないか</li>
        <li>寝落ち枕 Bot が導入されている場合、寝落ち送りはそちらに任されます</li>
      </ul>

      <h3>Q. エラーが発生した場合の対処法は？</h3>
      <p>
        <strong>A.</strong> 発生した操作とエラーメッセージをメモして、サポートサーバーまでご報告ください。
      </p>

      <h2>その他</h2>

      <h3>Q. 機能のリクエストはできますか？</h3>
      <p>
        <strong>A.</strong> サポートサーバーにて機能リクエストを受け付けています。ただし、すべてのリクエストにお応えできるとは限りません。
      </p>

      <h3>Q. バグ報告はどこにすればいいですか？</h3>
      <p>
        <strong>A.</strong> サポートサーバーまでご連絡ください。可能であれば、発生した状況やエラーメッセージのスクリーンショットなどを添付していただけると助かります。
      </p>

      <?php include __DIR__ . '/include/footer.php'; ?>
    </div>
  </main>

  <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/js/main.js') ?: time() ?>"></script>
</body>
</html>
