<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - RoyalGuide ドキュメント'; ?>
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
        <p>RoyalGuide のアップデート情報</p>
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

      <!-- ========================================================= -->
      <!-- v0.0.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.0.0</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">✨</div>
        <div class="update-body">
          <div class="update-title">
            初回リリース
            <span class="update-date">2026/10/27</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li>投稿者プリセットの管理（<code>/投稿者設定</code>）。作成・編集・削除をボタンで操作し、設定名・表示名・アイコンURL・アップロード画像を保持します。</li>
            <li>保存先チャンネルの一元管理（<code>/基本設定</code>）。グローバル／投稿者設定／交流スタンプラリーの保存先を設定できます。</li>
            <li>SoundCloud の再生機能。曲・プレイリストの URL から再生し、キュー（最大100曲）に対応します。</li>
            <li>再生コントロールパネル。一時停止・スキップ・停止・シャッフル・ループ（オフ／1曲／全体）を絵文字ボタンで操作できます。</li>
            <li>サーバーごとの既定音量設定（<code>/defaultvolume</code>）。0〜200% の範囲で保存できます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">⚙️</div>
        <div class="update-body">
          <div class="update-title">
            システム
            <span class="update-date">2026/10/27</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>複数インスタンスでの起動に対応しました。</li>
            <li>機能ごとに独立したシステムコグ構成へ移行し、他の Bot への移植がしやすい形になりました。</li>
            <li>本ドキュメントサイトを公開しました。</li>
          </ul>
        </div>
      </div>

      <!-- 更新を追加するときは
           <div class="update-version">…</div> と
           <div class="update-card" data-tags="…">…</div> をセットで先頭に追記する -->

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
