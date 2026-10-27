<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'コマンド一覧 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '兄弟Bot で使用できるコマンドの一覧と、それぞれの権限・用途をまとめています。'; ?>
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
        使用できる全コマンドの一覧です。
        <span class="tag tag-admin">管理者専用</span>
        <span class="tag tag-user">運営・ユーザー用</span>
      </p>

      <div class="alert alert-info">
        <p>
          <strong>💡 ヒント:</strong>
          VCイベント系のコマンドは、<code>/モデレーター設定</code> で登録したロールを持つ人も実行できます。
        </p>
      </div>

      <h2>🎠 VCイベント</h2>

      <div class="command-block">
        <div class="cmd-name">/個室リレーv2</div>
        <div class="cmd-desc">
          個室リレーv2 の操作パネルを投稿します。個室VCの自動作成から席替え・タイマーまで
          パネルのボタンで進行します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">操作ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ランダム会議</div>
        <div class="cmd-desc">
          ランダム会議の操作パネルを投稿します。待機VCの人をランダムに少人数の会議へ振り分けます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">操作ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/全自動椅子取りv2</div>
        <div class="cmd-desc">
          全自動椅子取りv2 の操作パネルを投稿します。男女比から椅子側を判定し、
          席替えまで自動で進行します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">操作ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/合コン</div>
        <div class="cmd-desc">
          合コンの操作パネルを投稿します。登録・組み分け済みの「組」をVCへ配置し、
          ラウンドごとにローテーションします。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">操作ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/合コン登録</div>
        <div class="cmd-desc">
          参加登録パネルを投稿します。リーダーが組を登録し、メンバーが承認すると組が成立します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">設定ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/合コン組み分け</div>
        <div class="cmd-desc">
          組み分け設定パネルを投稿します。参加組の反映・手動編集・プリセットの保存ができます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">設定ロール / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/モデレーター設定</div>
        <div class="cmd-desc">
          イベント運営に使用するモデレーターロールを登録します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>role</code> — モデレーターロール（必須）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/イベンターパネル</div>
        <div class="cmd-desc">
          イベンター用の操作パネルを投稿します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🛠️ サーバー管理</h2>

      <div class="command-block">
        <div class="cmd-name">/イベルーム管理</div>
        <div class="cmd-desc">
          指定カテゴリーに VC を一括作成します。<code>size</code> に 0 を指定すると削除のみを行います。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">管理者 / 管理ロール</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>category_1</code> 〜 <code>category_3</code> — 対象カテゴリー（任意）</li>
            <li><code>size</code> — 作成するVCの数（0 の場合は削除のみ／任意）</li>
            <li><code>channel_name</code> — チャンネル名（任意・既存があれば無視）</li>
            <li><code>user_limit</code> — ユーザー制限（0 は無制限／任意）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/vc削除コマンド</div>
        <div class="cmd-desc">
          カテゴリーを選択して、その中の VC をまとめて削除します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/vcロール付与</div>
        <div class="cmd-desc">
          VC に参加しているメンバーへロールを付与します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">管理者 / 管理ロール</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>role</code> — 付与するロール（必須）</li>
            <li><code>admin_role</code> — 管理者ロール（任意）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/vcロール確認</div>
        <div class="cmd-desc">
          指定ロールを持っていないメンバーを一覧表示します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">管理者 / 管理ロール</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>role</code> — 確認するロール（必須）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/全員ロール付与</div>
        <div class="cmd-desc">
          サーバー内の全員にロールを付与します。絞り込み用のロールを2つまで指定できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>role</code> — 付与するロール（必須）</li>
            <li><code>filter_has_role1</code> / <code>filter_has_role2</code> — 絞り込みロール（任意）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/全員ロール削除</div>
        <div class="cmd-desc">
          サーバー内の全員からロールを削除します。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>role</code> — 削除するロール（必須）</li>
            <li><code>bot</code> — Bot も対象に含めるか（任意・既定 OFF）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/自動リアクション</div>
        <div class="cmd-desc">
          メッセージに自動で付けるリアクションを登録・確認・削除します。<code>計測</code> で利用状況を集計できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">管理者 / 管理ロール</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>arg</code> — <code>登録</code> / <code>確認</code> / <code>削除</code> / <code>計測</code>（必須）</li>
            <li><code>emoji1</code> 〜 <code>emoji12</code> — 登録する絵文字（任意・最大12個）</li>
          </ul>
        </div>
      </div>

      <h2>📌 メッセージ・投稿者</h2>

      <div class="command-block">
        <div class="cmd-name">/投稿者設定</div>
        <div class="cmd-desc">
          スティッキーメッセージなどの「投稿者」プリセットを作成・編集・削除します。
          表示名・アイコンURL・アップロード画像を登録できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">!sticky / !unsticky</div>
        <div class="cmd-desc">
          スティッキーメッセージ（吊り下げ）を設定・解除します。
          接頭辞コマンドのため、スラッシュコマンド一覧には表示されません。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🤖 Bot 管理</h2>

      <div class="command-block">
        <div class="cmd-name">/bot管理</div>
        <div class="cmd-desc">
          Bot の管理コマンド。導入サーバーの一覧表示や、サーバーからの退出を行えます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🗂 旧版コマンド（レガシー）</h2>
      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          以下は旧仕様のコマンドです。現在は <code>v2</code> 系のコマンドを使用してください。
          互換性のため残していますが、今後のアップデートで変更・削除される可能性があります。
        </p>
      </div>

      <div class="command-block">
        <div class="cmd-name">/椅子取りゲーム</div>
        <div class="cmd-desc">旧仕様の椅子取りゲーム進行コマンド。</div>
        <div class="cmd-meta"><span class="tag tag-user">運営 / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/全自動椅子取り</div>
        <div class="cmd-desc">旧仕様の全自動椅子取りコマンド。<code>/全自動椅子取りv2</code> を使用してください。</div>
        <div class="cmd-meta"><span class="tag tag-user">運営 / 管理者</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/かおす会議</div>
        <div class="cmd-desc">かおす会議イベントの進行コマンド。</div>
        <div class="cmd-meta"><span class="tag tag-user">運営 / 管理者</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>arg</code> — <code>開始</code> / <code>再開</code> / <code>設定</code> / <code>終了</code></li>
            <li><code>minutes</code> — 時間[分]（既定 3）</li>
          </ul>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ぐるぐる個室リレー</div>
        <div class="cmd-desc">旧仕様の個室リレーコマンド。<code>/個室リレーv2</code> を使用してください。</div>
        <div class="cmd-meta"><span class="tag tag-user">運営 / 管理者</span></div>
        <div class="cmd-args">
          <strong>引数</strong>
          <ul>
            <li><code>arg</code> — <code>開始</code> / <code>再開</code> / <code>設定</code> / <code>終了</code></li>
            <li><code>minutes</code> — 時間[分]（既定 3）</li>
          </ul>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
