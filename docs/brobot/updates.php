<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '兄弟Bot の各機能のアップデート情報をまとめています。'; ?>
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
          バージョンは機能（システムコグ）ごとに管理しています。
          同じ日に複数の機能が更新されることもあります。
        </p>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年10月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026年10月</div>
        <p class="version-date">合コン進行 / 個室リレーv2 / ランダム会議 / スティッキーメッセージ</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">💑</div>
        <div class="update-body">
          <div class="update-title">
            合コン進行 v1.0.0
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
            個室リレーv2 v2.1.0
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
            ランダム会議 v1.0.0
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
            スティッキーメッセージ v1.2.2
            <span class="update-date">2026/10/14</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li><code>utils.profile</code> 未導入の環境でも読み込みが失敗しないように修正</li>
            <li>未導入時はプロフ関連機能を自動的に無効化</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年9月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026年9月</div>
        <p class="version-date">スティッキーメッセージ</p>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ v1.2.1
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
            スティッキーメッセージ v1.2.0
            <span class="update-date">2026/09/06</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>旧 <code>utils/sticky/</code> のスタブ群を削除し、本モジュールへ一元化</li>
            <li>依存元を本モジュール直参照に変更</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年8月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026年8月</div>
        <p class="version-date">全自動椅子取りv2 / 個室リレーv2</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🪑</div>
        <div class="update-body">
          <div class="update-title">
            全自動椅子取りv2 v2.0.0
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
            個室リレーv2 v2.0.0
            <span class="update-date">2026/08/25</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/個室リレーv2</code> をリリース</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年7月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026年7月</div>
        <p class="version-date">投稿者設定 / スティッキーメッセージ</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📛</div>
        <div class="update-body">
          <div class="update-title">
            投稿者設定 v1.0.0
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
            スティッキーメッセージ v1.1.2
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
            スティッキーメッセージ v1.1.1
            <span class="update-date">2026/07/18</span>
            <span class="tag tag-feature">機能改善</span>
          </div>
          <ul>
            <li>設定UIを大幅に見直し</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年5月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026年5月</div>
        <p class="version-date">スティッキーメッセージ</p>
      </div>

      <div class="update-card" data-tags="feature bug">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ v1.1.0
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

      <!-- ========================================================= -->
      <!-- 2025年9月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2025年9月</div>
        <p class="version-date">スティッキーメッセージ</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📌</div>
        <div class="update-body">
          <div class="update-title">
            スティッキーメッセージ v1.0.0
            <span class="update-date">2025/09/28</span>
            <span class="tag tag-feature">初回リリース</span>
          </div>
          <ul>
            <li>スティッキーメッセージ機能をリリース</li>
          </ul>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
