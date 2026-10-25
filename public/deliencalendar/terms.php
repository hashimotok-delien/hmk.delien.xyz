<?php
/**
 * 利用規約 — テンプレート
 * テーマは共通の assets/css/style.css を流用する。
 *
 * 注意: 文面は必ず自サービスに合わせて書き直すこと（テンプレートのまま公開しない）。
 *       有料プランを提供する場合は、特定商取引法に基づく表記も別途用意する。
 */
require __DIR__ . '/assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>利用規約 - <?= $PRODUCT_NAME ?></title>
  <meta name="description" content="<?= $PRODUCT_NAME ?> の利用規約です。本サービスのご利用にあたっての条件を定めています。">
  <link rel="stylesheet" href="assets/css/style.css?v=<?= @filemtime(__DIR__ . '/assets/css/style.css') ?: time() ?>">
  <style>
    .legal {
      max-width: 860px;
      margin: 0 auto;
      padding: 48px 24px 24px;
    }

    .legal-meta {
      font-size: 0.85rem;
      color: var(--text-muted);
      margin-bottom: 8px;
    }

    .legal-nav {
      background: var(--bg-card);
      border: 1px solid var(--border);
      border-radius: var(--radius);
      padding: 20px 24px;
      margin: 28px 0 40px;
    }

    .legal-nav-title {
      font-size: 0.9rem;
      font-weight: 600;
      color: var(--accent);
      margin-bottom: 10px;
    }

    .legal-nav ol {
      list-style: none;
      padding: 0;
      margin: 0;
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(260px, 1fr));
      gap: 4px 24px;
    }

    .legal-nav a {
      font-size: 0.88rem;
      color: var(--text-secondary);
    }
    .legal-nav a:hover { color: var(--accent); }

    .legal-section {
      margin-bottom: 40px;
      scroll-margin-top: 90px;
    }

    .legal-section h2 {
      font-size: 1.25rem;
      margin-bottom: 14px;
    }

    .legal-section h3 {
      margin: 20px 0 8px;
      color: var(--text-primary);
    }

    .legal-section p { margin-bottom: 12px; }

    .legal-section ul,
    .legal-section ol.legal-list {
      margin: 0 0 12px;
      padding-left: 24px;
      color: var(--text-secondary);
    }

    .legal-section li { margin-bottom: 6px; }

    .legal-section ol.legal-list {
      list-style: decimal;
    }

    .legal-section ol.legal-list > li::marker {
      color: var(--accent);
      font-weight: 600;
    }

    .legal-section ul > li::marker {
      color: var(--accent);
    }

    @media (max-width: 720px) {
      .legal { padding: 32px 16px 16px; }
    }
  </style>
</head>
<body>

  <?php $BASE = '.'; $LOGO_LABEL = 'App'; ?>
  <?php include __DIR__ . '/assets/include/header.php'; ?>

  <main>
    <div class="legal">
      <h1>利用規約</h1>
      <p class="legal-meta">制定日：（TODO: YYYY年M月D日）／最終改定日：（TODO: YYYY年M月D日）</p>
      <p>
        本利用規約（以下「本規約」といいます）は、
        （TODO: 運営者名）（以下「運営」といいます）が提供する
        <?= $PRODUCT_NAME ?>（以下「本サービス」といいます）の利用条件を定めるものです。
        利用者は、本規約に同意のうえ本サービスを利用するものとします。
      </p>

      <nav class="legal-nav" aria-label="目次">
        <div class="legal-nav-title">目次</div>
        <ol>
          <li><a href="#art1">第1条（適用）</a></li>
          <li><a href="#art2">第2条（定義）</a></li>
          <li><a href="#art3">第3条（利用条件）</a></li>
          <li><a href="#art4">第4条（本サービスの内容）</a></li>
          <li><a href="#art5">第5条（禁止事項）</a></li>
          <li><a href="#art6">第6条（有料プラン）</a></li>
          <li><a href="#art7">第7条（データの取扱い）</a></li>
          <li><a href="#art8">第8条（免責事項）</a></li>
          <li><a href="#art9">第9条（本規約の変更）</a></li>
          <li><a href="#art10">第10条（準拠法・管轄裁判所）</a></li>
          <li><a href="#art11">第11条（お問い合わせ）</a></li>
        </ol>
      </nav>

      <!-- ===== 第1条 ===== -->
      <section class="legal-section" id="art1">
        <h2>第1条（適用）</h2>
        <p>本規約は、利用者と運営との間の本サービスの利用に関わる一切の関係に適用されます。</p>
      </section>

      <!-- ===== 第2条 ===== -->
      <section class="legal-section" id="art2">
        <h2>第2条（定義）</h2>
        <ol class="legal-list">
          <li>「本サービス」とは、（TODO: 定義）をいいます。</li>
          <li>「利用者」とは、（TODO: 定義）をいいます。</li>
        </ol>
      </section>

      <!-- ===== 第3条 ===== -->
      <section class="legal-section" id="art3">
        <h2>第3条（利用条件）</h2>
        <p>（TODO: 利用に必要な環境・アカウント等を書く）</p>
      </section>

      <!-- ===== 第4条 ===== -->
      <section class="legal-section" id="art4">
        <h2>第4条（本サービスの内容）</h2>
        <p>（TODO: 提供する機能の概要）</p>
      </section>

      <!-- ===== 第5条 ===== -->
      <section class="legal-section" id="art5">
        <h2>第5条（禁止事項）</h2>
        <p>利用者は、本サービスの利用にあたり、次の行為をしてはなりません。</p>
        <ol class="legal-list">
          <li>（TODO: 禁止事項1）</li>
          <li>（TODO: 禁止事項2）</li>
        </ol>
      </section>

      <!-- ===== 第6条 ===== -->
      <section class="legal-section" id="art6">
        <h2>第6条（有料プラン）</h2>
        <p>（TODO: 料金・支払い方法・解約・返金の条件。プラン内容は <a href="plans/">プラン一覧</a> を参照）</p>
      </section>

      <!-- ===== 第7条 ===== -->
      <section class="legal-section" id="art7">
        <h2>第7条（データの取扱い）</h2>
        <p>データの取扱いについては、<a href="privacy">プライバシーポリシー</a> の定めによるものとします。</p>
      </section>

      <!-- ===== 第8条 ===== -->
      <section class="legal-section" id="art8">
        <h2>第8条（免責事項）</h2>
        <p>（TODO: 免責事項を書く）</p>
      </section>

      <!-- ===== 第9条 ===== -->
      <section class="legal-section" id="art9">
        <h2>第9条（本規約の変更）</h2>
        <p>（TODO: 変更時の告知方法を書く）</p>
      </section>

      <!-- ===== 第10条 ===== -->
      <section class="legal-section" id="art10">
        <h2>第10条（準拠法・管轄裁判所）</h2>
        <p>（TODO: 準拠法と管轄裁判所を書く）</p>
      </section>

      <!-- ===== 第11条 ===== -->
      <section class="legal-section" id="art11">
        <h2>第11条（お問い合わせ）</h2>
        <p>
          本規約に関するお問い合わせは、
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a>
          までお願いします。
        </p>
      </section>
    </div>
  </main>

  <?php include __DIR__ . '/assets/include/footer.php'; ?>

</body>
</html>
