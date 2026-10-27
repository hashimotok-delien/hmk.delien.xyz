<button class="mobile-menu-btn" id="mobile-menu-btn">☰</button>
<div class="mobile-menu-overlay" id="menu-overlay"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo">RoyalGuide</div>
    <div class="logo-sub">ドキュメント</div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-section">はじめに</div>
    <a href="<?= $ROOT ?? '.' ?>/"><span class="nav-icon">🏠</span>トップ</a>
    <a href="<?= $ROOT ?? '.' ?>/getting-started"><span class="nav-icon">🚀</span>導入方法</a>
    <a href="<?= $ROOT ?? '.' ?>/commands"><span class="nav-icon">📜</span>コマンド一覧</a>
    <a href="<?= $ROOT ?? '.' ?>/faq"><span class="nav-icon">❓</span>FAQ</a>

    <div class="nav-section">機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/authors"><span class="nav-icon">👤</span>投稿者プリセット</a>
    <a href="<?= $ROOT ?? '.' ?>/features/base-settings"><span class="nav-icon">🗂</span>基本設定（保存先）</a>
    <a href="<?= $ROOT ?? '.' ?>/features/soundcloud"><span class="nav-icon">🎧</span>SoundCloud 再生</a>

    <div class="nav-section">その他</div>
    <a href="<?= $ROOT ?? '.' ?>/updates"><span class="nav-icon">📋</span>更新履歴</a>
    <a href="<?= $ROOT ?? '.' ?>/known-issues"><span class="nav-icon">⚠️</span>既知の不具合</a>
  </nav>
</aside>
