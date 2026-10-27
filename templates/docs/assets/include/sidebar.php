<button class="mobile-menu-btn" id="mobile-menu-btn">☰</button>
<div class="mobile-menu-overlay" id="menu-overlay"></div>

<aside class="sidebar" id="sidebar">
  <div class="sidebar-header">
    <!-- TODO: サイト名を書き換える（ロゴ・サブタイトル） -->
    <div class="logo">製品名</div>
    <div class="logo-sub">ドキュメント</div>
  </div>
  <nav class="sidebar-nav">
    <div class="nav-section">はじめに</div>
    <a href="<?= $ROOT ?? '.' ?>/"><span class="nav-icon">🏠</span>トップ</a>
    <a href="<?= $ROOT ?? '.' ?>/getting-started"><span class="nav-icon">🚀</span>導入方法</a>
    <a href="<?= $ROOT ?? '.' ?>/commands"><span class="nav-icon">📜</span>コマンド一覧</a>
    <a href="<?= $ROOT ?? '.' ?>/faq"><span class="nav-icon">❓</span>FAQ</a>

    <div class="nav-section">機能</div>
    <a href="<?= $ROOT ?? '.' ?>/features/example"><span class="nav-icon">✨</span>サンプル機能</a>
    <!-- 機能ページを追加したら、ここにもナビゲーションリンクを追加する -->

    <div class="nav-section">その他</div>
    <a href="<?= $ROOT ?? '.' ?>/updates"><span class="nav-icon">📋</span>更新履歴</a>
    <a href="<?= $ROOT ?? '.' ?>/known-issues"><span class="nav-icon">⚠️</span>既知の不具合</a>
  </nav>
</aside>
