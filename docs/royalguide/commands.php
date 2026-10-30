<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'コマンド一覧 - RoyalGuide ドキュメント'; ?>
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
      <h1>📜 コマンド一覧</h1>
      <p>
        使用できる全コマンドの一覧です。すべてスラッシュコマンドです。
        <span class="tag tag-admin">管理者専用</span>
        <span class="tag tag-info">管理権限</span>
        <span class="tag tag-user">ユーザー用</span>
      </p>

      <h2>🔧 設定・管理</h2>

      <div class="command-block">
        <div class="cmd-name">/投稿者設定</div>
        <div class="cmd-desc">
          投稿者プリセットを管理します。パネルから作成・編集・削除ができます。
          設定名・表示名・アイコンURL・アップロード画像を登録でき、最大24件まで保持します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/基本設定</div>
        <div class="cmd-desc">
          保存先チャンネルを設定します。グローバルチャンネル／投稿者設定の
          2項目をボタンから選んで設定します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/defaultvolume [value]</div>
        <div class="cmd-desc">
          サーバーの既定音量（0.0〜200.0 %）を設定・表示します。省略すると現在値を表示します。
          以降の再生はこの音量で始まります。
        </div>
        <div class="cmd-meta"><span class="tag tag-info">管理権限</span></div>
      </div>

      <h2>🗣 読み上げ・音声</h2>

      <div class="command-block">
        <div class="cmd-name">/読み上げ開始 [bot]</div>
        <div class="cmd-desc">
          実行者がいるボイスチャンネルで読み上げを開始します。
          <code>bot</code> に系列Bot（RoyalGuide02 など）を指定すると、
          そのBotが担当します。読み上げはVCごとに管理され、
          別のVCは空いている系列Botが担当します。使用中のVCでは
          入れ替えを行いません（担当中のBotを案内します）。
          指定したBotが使用中・応答なしの場合は、自動で別の系列Botへ
          切り替えます。
          RoyalGuide01 でのみ利用できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/読み上げ終了</div>
        <div class="cmd-desc">
          読み上げを停止し、ボイスチャンネルから退出します。
          担当Botへ自動で振り分けられます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/読み上げスキップ</div>
        <div class="cmd-desc">
          再生中の読み上げを中断し、待機中の読み上げを破棄します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/読み上げ状態</div>
        <div class="cmd-desc">
          接続中のボイスチャンネル・読み上げ対象・待機件数・使用中の音声を表示します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/音声設定</div>
        <div class="cmd-desc">
          ユーザー音声設定（音量・話者・話速）と、サーバーデフォルト音声設定を
          モーダルから編集します。未設定の項目はサーバーデフォルトへフォールバックします。
        </div>
        <div class="cmd-meta">
          <span class="tag tag-user">ユーザー用</span>
          <span class="tag tag-info">サーバー既定は管理権限</span>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/サーバー読み上げ設定</div>
        <div class="cmd-desc">
          読み上げ開始/終了テキスト、サーバーデフォルト音声、音声制御
          （許可話者・話速/音量の上下限）、辞書、ロール音声制御を編集します。
          RoyalGuide01 のみで利用できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/辞書 追加・削除・一覧・出力・読み込み</div>
        <div class="cmd-desc">
          読み上げ辞書を管理します。形式は ShabeleA 互換の
          <code>単語,読み</code>（UTF-8）です。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🎧 音楽再生</h2>

      <div class="command-block">
        <div class="cmd-name">/join</div>
        <div class="cmd-desc">実行者がいるボイスチャンネルへ参加します。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/leave</div>
        <div class="cmd-desc">ボイスチャンネルから退出します。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/play url</div>
        <div class="cmd-desc">
          SoundCloud の曲またはプレイリストの URL を再生、またはキューに追加します。
          再生を開始すると、絵文字ボタン付きの再生コントロールパネルが投稿されます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/queue</div>
        <div class="cmd-desc">再生中の曲と、次に再生される曲を含むキューを表示します。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/volume [value]</div>
        <div class="cmd-desc">
          再生音量（0.0〜200.0 %）を設定・表示します。省略すると現在値を表示します。
          この設定は現在の再生にのみ適用されます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/skip</div>
        <div class="cmd-desc">再生中の音声をスキップします。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/stop</div>
        <div class="cmd-desc">再生を停止し、キューを消去します。</div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> 再生コントロールパネルのボタン（一時停止／スキップ／停止／シャッフル／ループ）は、
        再生中のボイスチャンネルに参加しているユーザーであれば誰でも操作できます。</p>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
