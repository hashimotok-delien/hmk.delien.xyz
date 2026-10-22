<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = 'コマンド一覧 - ねくさす⋆˚ʚɞ ドキュメント'; ?>
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
        ねくさす⋆˚ʚɞ で使用できるコマンドの一覧です。
        <span class="tag tag-admin">管理者専用</span>
        <span class="tag tag-user">ユーザー用</span>
      </p>

      <h2>🖥️ 管理</h2>

      <div class="command-block">
        <div class="cmd-name">/bot管理</div>
        <div class="cmd-desc">
          Bot の管理コマンド。導入サーバー一覧の表示や、サーバーごとの操作を行えます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">Bot 所有者専用</span></div>
      </div>

      <h2>📸 プロフィール</h2>

      <div class="command-block">
        <div class="cmd-name">/プロフ設定</div>
        <div class="cmd-desc">
          プロフィール保存機能の設定パネルを開きます。プロフチャンネルや操作可能ロールを設定できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>🌐 マイプロフ（鯖間プロフ）</h2>

      <div class="command-block">
        <div class="cmd-name">/マイプロフ設定</div>
        <div class="cmd-desc">
          マイプロフ機能の設定パネルを開きます。プロフの送信方法（DM / プライベートスレッド）や、
          鯖間取得・保存の可否をプリセット単位で設定できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/マイプロフパネル設置</div>
        <div class="cmd-desc">
          マイプロフパネルを現在のチャンネルに設置します。
          パネルから「他鯖取得」「保存取得」「保存」を操作できます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>💬 交流計測</h2>

      <div class="command-block">
        <div class="cmd-name">/交流計測v2 設定</div>
        <div class="cmd-desc">
          交流計測v2 の設定パネルを開きます。コマンド操作権限ロール・設定ファイル・
          ランキング定義・初期設定（性別ロール）を管理できます。
        </div>
        <div class="cmd-meta">
          <span class="tag tag-admin">管理者 / 権限ロール</span>
          <span class="tag tag-user">ベータ導入サーバーのみ</span>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/交流計測v2 ランキング</div>
        <div class="cmd-desc">
          設定ファイルを選び、ランキングの種別を選んで結果を表示します。
        </div>
        <div class="cmd-meta">
          <span class="tag tag-admin">管理者 / 権限ロール</span>
          <span class="tag tag-user">ベータ導入サーバーのみ</span>
        </div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/交流計測v2 記録パネル</div>
        <div class="cmd-desc">
          個人の交流スコアを確認できるパネルを設置します。
          ユーザーはパネルのボタンから自分のスコアを確認できます。
        </div>
        <div class="cmd-meta">
          <span class="tag tag-admin">管理者 / 権限ロール</span>
          <span class="tag tag-user">ベータ導入サーバーのみ</span>
        </div>
      </div>

      <h3>従来版の交流計測</h3>
      <p>従来版のコマンドも引き続き利用できます。詳細は<a href="features/exchange-measure">交流計測</a>を参照してください。</p>

      <div class="command-block">
        <div class="cmd-name">/交流計測設定</div>
        <div class="cmd-desc">従来版の交流計測設定パネルを開きます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者 / 権限ロール</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/交流計測ランキング</div>
        <div class="cmd-desc">従来版の交流計測ランキングを表示します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者 / 権限ロール</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/交流計測記録パネル</div>
        <div class="cmd-desc">従来版の交流計測記録パネルを設置します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者 / 権限ロール</span></div>
      </div>

      <h2>🏆 ランクシステム</h2>

      <div class="command-block">
        <div class="cmd-name">/ランク [@ユーザー]</div>
        <div class="cmd-desc">
          自分または指定ユーザーのランクを<strong>画像のランクカード</strong>で表示します。
          表示対象は<strong>⭐ メイン設定</strong>のプリセットです。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ランキング [期間]</div>
        <div class="cmd-desc">
          サーバー内の VC XP ランキング TOP10 を表示します。
          プリセットを選び、種別（VC）と期間（全期間 / 週間 / 月間）を指定して実行します。
        </div>
        <div class="cmd-meta"><span class="tag tag-user">ユーザー用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ランク設定</div>
        <div class="cmd-desc">
          ランクシステムの設定パネルを開きます。プリセットの作成・編集・削除、
          ランク確認パネルの設置、現在レベルのロール反映を行えます。
        </div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 旧コマンドについて:</strong>
        <code>/rank</code> と <code>/rank設定</code> は旧バージョンのコマンドです。
        現在は <code>/ランク</code> と <code>/ランク設定</code> を使用してください。</p>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>

</body>
</html>
