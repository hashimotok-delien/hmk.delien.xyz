<?php
$pageTitle = $PAGE_TITLE ?? 'ねくさす⋆˚ʚɞ ドキュメント';
$pageDescription = $PAGE_DESCRIPTION
    ?? $pageTitle . '。ねくさす⋆˚ʚɞ の機能・設定方法を紹介するドキュメントです。';
$pageUrl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'docs.delien.xyz')
    . ($_SERVER['REQUEST_URI'] ?? '/nexus/');
$pageBasePath = ($ROOT ?? '.') === '..'
    ? dirname(dirname($_SERVER['SCRIPT_NAME'] ?? '/nexus/features/'))
    : dirname($_SERVER['SCRIPT_NAME'] ?? '/nexus/');
$pageImage = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'
        ? 'https://' : 'http://')
    . ($_SERVER['HTTP_HOST'] ?? 'docs.delien.xyz')
    . rtrim($pageBasePath, '/') . '/assets/img/rank_card_vc.png';
$escapeMeta = static fn(string $value): string =>
    htmlspecialchars($value, ENT_QUOTES, 'UTF-8');
?>
<title><?= $escapeMeta($pageTitle) ?></title>
<meta name="description" content="<?= $escapeMeta($pageDescription) ?>">
<meta property="og:type" content="website">
<meta property="og:site_name" content="ねくさす⋆˚ʚɞ ドキュメント">
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
<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap"></noscript>
<link rel="stylesheet"
      href="<?= $ROOT ?? '.' ?>/assets/css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
<script src="<?= $ROOT ?? '.' ?>/assets/js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"
        defer></script>
