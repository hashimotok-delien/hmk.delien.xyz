<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>コマンド一覧 - master Bot ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
  <noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap"></noscript>
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '.'; $PAGE_TITLE = 'コマンド一覧'; ?>
  <?php include __DIR__ . '/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/include/topbar.php'; ?>

    <div class="content">
      <h1>📜 コマンド一覧</h1>
      <p>
        master Bot で使用できる全コマンドの一覧です。
        <span class="tag tag-admin">管理者専用</span>
        <span class="tag tag-user">ユーザー用</span>
      </p>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> スラッシュコマンドは <code>/</code> を入力すると候補が表示されます。管理者専用コマンドはサーバーの管理者権限が必要です。</p>
      </div>

      <h2>⚙️ 設定・管理</h2>

      <div class="command-block">
        <div class="cmd-name">/panel</div>
        <div class="cmd-desc">設定用パネルを表示します。寝落ち送りの ON/OFF、部屋作成先カテゴリの登録・解除、申請制限ロールの登録・解除、投稿時ロール設定、パネル更新を行えます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/チャンネル投稿時ロール設定 [チャンネル]</div>
        <div class="cmd-desc">チャンネルにメッセージを投稿した際に付与・剥奪するロールを設定します。チャンネルを省略すると実行したチャンネルが対象になります。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/プロフィールv2設定</div>
        <div class="cmd-desc">プロフィール v2 の設定メニューを表示します。プリセット管理、VCインチャプロフ、プロフテンプレートチェックの設定を行えます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/自動リアクション設定 [既存メッセージにも付与] [本文に絵文字がある場合のみ] [絵文字1〜20]</div>
        <div class="cmd-desc">メッセージ投稿時に自動で付与するリアクションを設定します。最大20個の絵文字を登録でき、既存メッセージへの一括付与にも対応しています。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>👤 役職パネル</h2>

      <div class="command-block">
        <div class="cmd-name">/役職パネル &lt;タイトル&gt; &lt;種類&gt; &lt;ロールA&gt; [説明] [ロールB]...</div>
        <div class="cmd-desc">役職パネルを新規作成します。種類は「許可」「禁止」「特殊」「付与専用」「取外専用」から選択でき、最大22個のロールを設定可能です。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/役職パネルロール追加 &lt;ロール&gt; [絵文字]</div>
        <div class="cmd-desc">選択中の役職パネルにロールを追加します。絵文字を指定するとボタンに表示されます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/役職パネルロール削除 &lt;ロール&gt;</div>
        <div class="cmd-desc">選択中の役職パネルからロールを削除します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/役職パネル編集 &lt;項目&gt; [値]</div>
        <div class="cmd-desc">選択中の役職パネルを編集します。項目は「タイトル」「説明」「重複許可」から選択できます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🔒 部屋・パネル設置</h2>

      <div class="command-block">
        <div class="cmd-name">/表2shot作成用パネル</div>
        <div class="cmd-desc">表2shot 作成用パネルを現在のチャンネルに設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/裏2shot作成用パネル</div>
        <div class="cmd-desc">裏2shot 作成用パネルを現在のチャンネルに設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/表個室作成用パネル</div>
        <div class="cmd-desc">表個室 作成用パネルを現在のチャンネルに設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/裏個室作成用パネル</div>
        <div class="cmd-desc">裏個室 作成用パネルを現在のチャンネルに設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/dmフレンド開通用パネル</div>
        <div class="cmd-desc">DM・フレンド開通用のパネルを現在のチャンネルに設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>📢 募集</h2>

      <div class="command-block">
        <div class="cmd-name">/表募集作成用パネル</div>
        <div class="cmd-desc">表募集を作成するチャンネルを選択し、作成用パネルを設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/裏募集設定</div>
        <div class="cmd-desc">裏募集設定のプリセットを管理します。新規作成・編集・削除が行えます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/裏募集パネル設定</div>
        <div class="cmd-desc">裏募集パネル設定のプリセットを管理します。Embed やボタンのカスタマイズ、任意のチャンネルへの設置が行えます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🖼️ プロフィール</h2>

      <div class="command-block">
        <div class="cmd-name">/プロフィールv2表示 [メンバー]</div>
        <div class="cmd-desc">メンバーのプロフィールを表示します。メンバーを省略すると自分のプロフィールを表示します。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/プロフィール保存 &lt;メッセージリンク&gt;</div>
        <div class="cmd-desc">メッセージリンクからプロフィールを保存します。リンク先のチャンネルがプロフィール対象の場合は v2 として保存されます。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/プロフィール再表示</div>
        <div class="cmd-desc">VCインチャプロフを全員分再表示します。VC に入室している状態で実行してください。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <h2>🖱️ コンテキストメニュー</h2>
      <p>メッセージを右クリック（長押し）→「アプリ」から実行できます。</p>

      <div class="command-block">
        <div class="cmd-name">メッセージ手動ロール付与</div>
        <div class="cmd-desc">対象メッセージが投稿時ロール設定チャンネルの場合、投稿者にロールを付与（または剥奪）します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">役職パネル選択</div>
        <div class="cmd-desc">役職パネルの編集対象としてメッセージを選択します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">役職パネル修復</div>
        <div class="cmd-desc">役職パネルのボタンや表示を修復します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <?php include __DIR__ . '/include/footer.php'; ?>
    </div>
  </main>

  <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/js/main.js') ?: time() ?>"></script>
</body>
</html>
