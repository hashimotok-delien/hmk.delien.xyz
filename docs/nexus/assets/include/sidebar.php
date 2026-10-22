<button class="mobile-menu-btn" id="mobile-menu-btn">☰</button>
<div class="mobile-menu-overlay" id="menu-overlay"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <div class="logo">ねくさす⋆˚ʚɞ</div>
    <div class="logo-sub">ドキュメント</div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-section">はじめに</div>
    <a href="<?= $ROOT ?? '.' ?>/"><span class="nav-icon">🏠</span>トップ</a>
    <a href="<?= $ROOT ?? '.' ?>/getting-started"><span class="nav-icon">🚀</span>導入方法</a>
    <a href="<?= $ROOT ?? '.' ?>/commands"><span class="nav-icon">📜</span>コマンド一覧</a>
    <a href="<?= $ROOT ?? '.' ?>/faq"><span class="nav-icon">❓</span>FAQ</a>

    <div class="nav-section">交流系機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/exchange-measure"><span class="nav-icon">💬</span>交流計測</a>

    <div class="nav-section">ランク系機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/rank"><span class="nav-icon">🏆</span>ランクシステム</a>

    <div class="nav-section">その他</div>
    <a href="<?= $ROOT ?? '.' ?>/updates"><span class="nav-icon">📋</span>更新履歴</a>
    <a href="<?= $ROOT ?? '.' ?>/known-issues"><span class="nav-icon">⚠️</span>既知の不具合</a>
  </nav>
</aside>
