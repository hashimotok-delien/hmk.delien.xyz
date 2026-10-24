<?php
$siteName = 'master Bot ドキュメント';
$pageTitle = $PAGE_TITLE ?? $siteName;
$pageDescription = $PAGE_DESCRIPTION
    ?? $siteName . '。サーバー運営に必要な機能を1つにまとめた多機能 Bot';
$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'docs.delien.xyz')
    . ($_SERVER['REQUEST_URI'] ?? '/master/');
$escapeMeta = static fn(string $value): string =>
    htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<title><?= $escapeMeta($pageTitle) ?></title>
<meta name="description" content="<?= $escapeMeta($pageDescription) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= $escapeMeta($siteName) ?>">
<meta property="og:title" content="<?= $escapeMeta($pageTitle) ?>">
<meta property="og:description" content="<?= $escapeMeta($pageDescription) ?>">
<meta property="og:url" content="<?= $escapeMeta($pageUrl) ?>">
<meta name="twitter:card" content="summary">
<meta name="twitter:title" content="<?= $escapeMeta($pageTitle) ?>">
<meta name="twitter:description" content="<?= $escapeMeta($pageDescription) ?>">
<link rel="stylesheet"
      href="<?= $ROOT ?? '.' ?>/assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
<script src="<?= $ROOT ?? '.' ?>/assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"
        defer></script>
