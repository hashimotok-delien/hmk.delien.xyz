<button class="mobile-menu-btn" id="mobile-menu-btn">☰</button>
<div class="mobile-menu-overlay" id="menu-overlay"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo">𝓶𝓪𝓼𝓽𝓮𝓻 𝓑𝓸𝓽</div>
    <div class="logo-sub">ドキュメント</div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-section">はじめに</div>
    <a href="<?= $ROOT ?? '.' ?>/"><span class="nav-icon">🏠</span>トップ</a>
    <a href="<?= $ROOT ?? '.' ?>/getting-started"><span class="nav-icon">🚀</span>導入方法</a>
    <a href="<?= $ROOT ?? '.' ?>/commands"><span class="nav-icon">📜</span>コマンド一覧</a>
    <a href="<?= $ROOT ?? '.' ?>/faq"><span class="nav-icon">❓</span>FAQ</a>
    <a href="<?= $ROOT ?? '.' ?>/server-spec"><span class="nav-icon">🖥️</span>サーバースペック</a>

    <div class="nav-section">運営系機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/settings"><span class="nav-icon">⚙️</span>設定パネル</a>
    <a href="<?= $ROOT ?? '.' ?>/features/role-panel"><span class="nav-icon">👤</span>役職パネル</a>
    <a href="<?= $ROOT ?? '.' ?>/features/ch-role"><span class="nav-icon">📝</span>投稿時ロール設定</a>
    <a href="<?= $ROOT ?? '.' ?>/features/auto-reaction"><span class="nav-icon">😊</span>自動リアクション</a>

    <div class="nav-section">VC・募集系機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/vc-room"><span class="nav-icon">🔒</span>個室・2shot</a>
    <a href="<?= $ROOT ?? '.' ?>/features/dm-friend"><span class="nav-icon">🤝</span>DM/フレンド開通</a>
    <a href="<?= $ROOT ?? '.' ?>/features/recruitment"><span class="nav-icon">📢</span>募集</a>

    <div class="nav-section">ユーザー機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/profile-v2"><span class="nav-icon">🖼️</span>プロフィール v2</a>
    <a href="<?= $ROOT ?? '.' ?>/features/profile-template-check"><span class="nav-icon">📝</span>プロフテンプレートチェック</a>

    <div class="nav-section">その他</div>
    <a href="<?= $ROOT ?? '.' ?>/updates"><span class="nav-icon">📋</span>更新履歴</a>
    <a href="<?= $ROOT ?? '.' ?>/known-issues"><span class="nav-icon">⚠️</span>既知の不具合</a>
  </nav>
</aside>
