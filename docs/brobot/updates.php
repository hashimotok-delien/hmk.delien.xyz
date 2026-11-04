<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '兄弟Bot のバージョンごとのアップデート情報をまとめています。'; ?>
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
      <div class="feature-hero">
        <div class="feature-icon">📋</div>
        <h1>更新履歴</h1>
        <p>兄弟Bot のアップデート情報</p>
      </div>

      <!-- フィルター（data-filter は update-card の data-tags と揃える） -->
      <div class="filter-bar">
        <span class="filter-label">🔍 絞り込み：</span>
        <button class="filter-tag active" data-filter="all">すべて</button>
        <button class="filter-tag" data-filter="feature">
          <span class="tag tag-feature">新機能 / 機能改善</span>
        </button>
        <button class="filter-tag" data-filter="bug">
          <span class="tag tag-bug">バグ修正</span>
        </button>
        <button class="filter-tag" data-filter="info">
          <span class="tag tag-info">システム</span>
        </button>
      </div>

      <div class="alert alert-info">
        <p>
          <strong>💡 メモ:</strong>
          バージョンは <strong>Bot 本体のバージョン</strong>（<code>Var.BOT_VERSION</code>）で管理しています。
          機能（システムコグ）ごとの細かい変更は、リポジトリ直下の
          <code>CHANGELOG.md</code> を参照してください。
        </p>
      </div>

      <!-- ========================================================= -->
      <!-- v1.2.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.2.0</div>
        <p class="version-date">2026/11/04 ・ 全自動椅子取りv2 / 個室リレーv2 / ランダム会議 / 合コン進行</p>
      </div>

      <div class="update-card" data-tags="feature bug">
        <div class="update-icon">🪑</div>
        <div class="update-body">
          <div class="update-title">
            全自動椅子取りv2 の改善
            <span class="update-date">2026/11/04</span>
            <span class="tag tag-feature">機能改善</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>「途中参加の自動参加」を実装（集合ロビーから空き椅子へ自動配置）</li>
            <li>回収対象を<strong>移動側</strong>に統一（「男回収」→「移動側回収」へ改名）</li>
            <li>パネルを常設メッセージ化し、再起動後も操作・更新できるように変更</li>
            <li>VC移動の失敗を検知してエラー表示、自動進行の失敗時は手動操作へ復帰</li>
            <li>「男性椅子」モードが機能していなかった問題、参加済みロールの付与対象を修正</li>
            <li>タイマー登録の競合・再起動復旧・DBの号機分離（<code>bot_id</code>）に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature bug">
        <div class="update-icon">🎠</div>
        <div class="update-body">
          <div class="update-title">
            個室リレーv2 の改善
            <span class="update-date">2026/11/04</span>
            <span class="tag tag-feature">機能改善</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>休憩室設定「3の倍数」「偶数・3の倍数」を仕様どおりの計算に修正</li>
            <li>休憩室判定は椅子側の退出時のみ適用（移動側の退出・Bot移動では解除）</li>
            <li>部屋割り当てのキー不一致でVCが増殖する問題、椅子側の設定陳腐化を修正</li>
            <li>確認ダイアログが応答されない問題、終了時に参加者が切断される問題を修正</li>
            <li>停止・再開、最終ラウンド復旧、終了後パネルの復元を修正</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature bug">
        <div class="update-icon">🎲</div>
        <div class="update-body">
          <div class="update-title">
            ランダム会議 の改善
            <span class="update-date">2026/11/04</span>
            <span class="tag tag-feature">機能改善</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>「停止 / 再開」ボタンを追加（他機能と操作体系を統一）</li>
            <li>待機VCが無い場合は終了・回収を中止し、参加者の切断を防止</li>
            <li>マッチングロール全削除時に既定値が復活する問題を修正</li>
            <li>設定読み込み失敗時に既定値で上書き保存される問題を修正</li>
            <li>マッチング対象（同じ部屋にしたい相手）が編成に反映されない問題を修正</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">💑</div>
        <div class="update-body">
          <div class="update-title">
            合コン進行 の改善
            <span class="update-date">2026/11/04</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>開始時にVC移動が全滅していてもラウンドを開始してしまう問題を修正</li>
            <li>席替えで「移動不可ロール」が無視される問題を修正</li>
            <li>最終ラウンドの予約が解除されず、以後も最終扱いになる問題を修正</li>
            <li>承認時に別の組へ重複所属できる問題を修正</li>
            <li>登録リセット後に組み分けパネルが更新されない問題を修正</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info bug">
        <div class="update-icon">🛠️</div>
        <div class="update-body">
          <div class="update-title">
            システム共通の改善
            <span class="update-date">2026/11/04</span>
            <span class="tag tag-info">システム</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>権限モデルを統一（操作: 操作ロール or 設定ロール or 管理者 / 設定: 設定ロール or 管理者）</li>
            <li>タイマー方式を絶対時刻（<code>round_end_ts</code>）に統一</li>
            <li>再起動時のフェーズ復旧を4機能で統一</li>
            <li>投稿者プリセットが反映されない問題（<code>await</code> 漏れ）を修正</li>
            <li>DB接続の解放漏れ（47箇所）と、コマンド実行後の「考え中」残留を修正</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- v1.1.1 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.1.1</div>
        <p class="version-date">2025/07/25 ・ 各システムコグの追加・改善（2025/09/28 〜 2026/10/24）</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">💑</div>
        <div class="update-body">
          <div class="update-title">
            合コン進行
            <span class="update-date">2026/10/24</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/合コン</code>・<code>/合コン登録</code>・<code>/合コン組み分け</code> を追加</li>
            <li>リーダー登録 + メンバー承認による組の成立</li>
            <li>組み分けプリセットの保存・読み込み（最大25件）</li>
            <li>ロビーをFIFOキューとして扱うローテーション進行</li>
            <li>同席履歴による「まだ同席していない組」の優先昇格</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature info">
        <div class="update-icon">🎠</div>
        <div class="update-body">
          <div class="update-title">
            個室リレーv2 の設定UI刷新
            <span class="update-date">2026/10/16</span>
            <span class="tag tag-feature">機能改善</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>設定UIをランダム会議と同等の作りに刷新</li>
            <li>保存結果の表示・画面の再描画・モーダル初期値のサニタイズに対応</li>
            <li>排他選択項目を RadioGroup 化</li>
            <li>テーブルを <code>(bot_id, guild_id)</code> 複合主キー化（旧DBは自動移行）</li>
            <li>パネルを通常メッセージ化し、再起動時に復元するように変更</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🎲</div>
        <div class="update-body">
          <div class="update-title">
            ランダム会議
            <span class="update-date">2026/10/14</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/ランダム会議</code> を追加</li>
            <li>余り調整・参加調整・男女マッチング・男女比調整に対応</li>
            <li>新規開拓（はじめまして優先）と同席履歴の記録</li>
            <li>進行メッセージのカスタマイズ（最大10件の指定時間メッセージ）</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ の修正
            <span class="update-date">2026/10/14</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li><code>utils.profile</code> 未導入の環境でも読み込みが失敗しないように修正</li>
            <li>未導入時はプロフ関連機能を自動的に無効化</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ の内部整理
            <span class="update-date">2026/09/06</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li><code>on_message</code> 処理をモジュール内の Cog リスナーへ移設</li>
            <li>旧 <code>cmds/sticky_cmd.py</code>（重複実装）を完全削除</li>
            <li>本モジュールのみで完結する構成に変更</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ のモジュール統合
            <span class="update-date">2026/09/06</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>旧 <code>utils/sticky/</code> のスタブ群を削除し、本モジュールへ一元化</li>
            <li>依存元を本モジュール直参照に変更</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🪑</div>
        <div class="update-body">
          <div class="update-title">
            全自動椅子取りv2
            <span class="update-date">2026/08/26</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/全自動椅子取りv2</code> をリリース</li>
            <li>男女比からの椅子側判定と個室VCの自動作成</li>
            <li>自動有効化・途中参加自動参加に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🎠</div>
        <div class="update-body">
          <div class="update-title">
            個室リレーv2
            <span class="update-date">2026/08/25</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/個室リレーv2</code> をリリース</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📛</div>
        <div class="update-body">
          <div class="update-title">
            投稿者設定
            <span class="update-date">2026/07/29</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/投稿者設定</code> を追加</li>
            <li>表示名・アイコンURL・アップロード画像をプリセットとして管理</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ のプロフ機能
            <span class="update-date">2026/07/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li>プロフ目次を実装</li>
            <li>自分のプロフ取得機能を追加</li>
            <li>プロフ検索機能を追加</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ の設定UI見直し
            <span class="update-date">2026/07/18</span>
            <span class="tag tag-feature">機能改善</span>
          </div>
          <ul>
            <li>設定UIを大幅に見直し</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature bug">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ の編集機能改善
            <span class="update-date">2026/05/09</span>
            <span class="tag tag-feature">機能改善</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>吊り下げ編集で各設定を簡単に設定できるように修正</li>
            <li>各設定項目を日本語化</li>
            <li>編集していないのに「未保存」と表示される問題を修正</li>
            <li>投稿者名・アイコン未設定時に吊り下げ文が二重投稿される問題を修正</li>
            <li>メンション通知 OFF を追加</li>
            <li>Bot 反応 OFF を追加</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ
            <span class="update-date">2025/09/28</span>
            <span class="tag tag-feature">初回リリース</span>
          </div>
          <ul>
            <li>スティッキーメッセージ機能をリリース</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- v1.0.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.0.0</div>
        <p class="version-date">2025/06/22 ・ 初回リリース</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">👬</div>
        <div class="update-body">
          <div class="update-title">
            兄弟Bot
            <span class="update-date">2025/06/22</span>
            <span class="tag tag-feature">初回リリース</span>
          </div>
          <ul>
            <li>サーバー運営ツールと VC イベント進行の基盤をリリース</li>
          </ul>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
