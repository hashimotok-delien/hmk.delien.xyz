<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>更新履歴 - master Bot ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>
  <?php $ROOT = '.'; $PAGE_TITLE = '更新履歴'; ?>
  <?php include __DIR__ . '/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">📋</div>
        <h1>更新履歴</h1>
        <p>master Bot のアップデート情報</p>
      </div>

      <!-- ========================================================= -->
      <!-- フィルター -->
      <!-- ========================================================= -->

      <div class="filter-bar">
        <span class="filter-label">🔍 絞り込み：</span>
        <button class="filter-tag active" data-filter="all">すべて</button>
        <button class="filter-tag" data-filter="feature">
          <span class="tag tag-feature">新機能 / 機能改善</span>
        </button>
        <button class="filter-tag" data-filter="bug">
          <span class="tag tag-bug">バグ修正</span>
        </button>
        <button class="filter-tag" data-filter="profile">
          <span class="tag tag-profile">プロフィール</span>
        </button>
        <button class="filter-tag" data-filter="info">
          <span class="tag tag-info">システム</span>
        </button>
      </div>

      <!-- ========================================================= -->
      <!-- v1.0.0 — リリース -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.0.0</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature info">
        <div class="update-icon">🤖</div>
        <div class="update-body">
          <div class="update-title">
            master Bot リリース
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li>サーバー運営向けの各機能を master Bot として実装しました</li>
            <li>システムコグ（<code>utils/system_cogs/</code>）単位で機能を追加・削除できます</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature info">
        <div class="update-icon">⚙️</div>
        <div class="update-body">
          <div class="update-title">
            設定パネル
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/panel</code> で設定パネルを表示</li>
            <li>寝落ち送りの ON/OFF、部屋作成先カテゴリの登録・解除</li>
            <li>申請制限ロールの登録・解除、投稿時ロール設定に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">👤</div>
        <div class="update-body">
          <div class="update-title">
            役職パネル
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/役職パネル</code> でロール選択パネルを作成</li>
            <li><code>/役職パネルロール追加</code>・<code>/役職パネルロール削除</code>・<code>/役職パネル編集</code> に対応</li>
            <li>許可 / 禁止 / 特殊 / 付与専用 / 取外専用 の種類に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🔒</div>
        <div class="update-body">
          <div class="update-title">
            個室・2shot
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li>表 / 裏 の 2shot・個室 VC をボタンから作成</li>
            <li>VC 内のボタンから個室名の変更・削除に対応</li>
            <li>裏個室は毎朝5時に自動削除</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📢</div>
        <div class="update-body">
          <div class="update-title">
            募集（表募集 / 裏募集）
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/表募集作成用パネル</code> で表募集パネルを設置</li>
            <li><code>/裏募集設定</code>・<code>/裏募集パネル設定</code> でプリセットを管理</li>
            <li>立候補・通知（DM / スレッド）に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature profile">
        <div class="update-icon">🖼️</div>
        <div class="update-body">
          <div class="update-title">
            プロフィール v2
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
            <span class="tag tag-profile">プロフィール</span>
          </div>
          <ul>
            <li><code>/プロフィールv2表示</code>・<code>/プロフィール保存</code>・<code>/プロフィール再表示</code> に対応</li>
            <li>プリセット管理・カードデザイン・VCインチャプロフを設定可能</li>
            <li>プロフテンプレートチェックに対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">😊</div>
        <div class="update-body">
          <div class="update-title">
            自動リアクション
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/自動リアクション設定</code> で最大20個の絵文字を登録</li>
            <li>既存メッセージへの一括付与に対応</li>
            <li>設定解除・再付与に対応</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🤝</div>
        <div class="update-body">
          <div class="update-title">
            DM/フレンド開通
            <span class="update-date">2026/10/22</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li><code>/dmフレンド開通用パネル</code> で申請パネルを設置</li>
            <li>「いいよ / 仲良くなったら / ごめんね」のボタンで回答</li>
          </ul>
        </div>
      </div>

      <?php include __DIR__ . '/include/footer.php'; ?>
    </div>
  </main>

  <script src="js/main.js?v=<?= @filemtime(__DIR__ . '/js/main.js') ?: time() ?>"></script>
</body>
</html>
