<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - 製品名 ドキュメント'; ?>
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
        <p>（TODO: 製品名）のアップデート情報</p>
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
        <div class="version-badge">v0.0.0</div>
        <p class="version-date">2026年1月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">✨</div>
        <div class="update-body">
          <div class="update-title">
            初回リリース
            <span class="update-date">2026/01/01</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li>（TODO: 変更点を書く）</li>
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
