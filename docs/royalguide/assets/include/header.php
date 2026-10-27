<?php
$siteName = 'RoyalGuide ドキュメント';
$pageTitle = $PAGE_TITLE ?? $siteName;
$pageDescription = $PAGE_DESCRIPTION
    ?? $pageTitle . '。RoyalGuide の機能・設定方法を紹介するドキュメントです。';
$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'docs.delien.xyz')
    . ($_SERVER['REQUEST_URI'] ?? '/royalguide/');
$pageBasePath = ($ROOT ?? '.') === '..'
    ? dirname(dirname($_SERVER['SCRIPT_NAME'] ?? '/royalguide/features/'))
    : dirname($_SERVER['SCRIPT_NAME'] ?? '/royalguide/');
$pageBasePath = str_replace('\\', '/', $pageBasePath);
$pageImage = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'docs.delien.xyz')
    . rtrim($pageBasePath, '/') . '/assets/img/social-preview.png';
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
<meta property="og:image" content="<?= $escapeMeta($pageImage) ?>">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:title" content="<?= $escapeMeta($pageTitle) ?>">
<meta name="twitter:description" content="<?= $escapeMeta($pageDescription) ?>">
<meta name="twitter:image" content="<?= $escapeMeta($pageImage) ?>">
<link rel="icon" type="image/svg+xml"
      href="<?= $ROOT ?? '.' ?>/assets/img/favicon.svg">
<link rel="stylesheet"
      href="<?= $ROOT ?? '.' ?>/assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
<script src="<?= $ROOT ?? '.' ?>/assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"
        defer></script>
