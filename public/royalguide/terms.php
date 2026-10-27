<?php
/**
 * 利用規約
 * テーマは assets/css/legal.css を流用する。
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
  <link rel="stylesheet" href="assets/css/legal.css?v=<?= @filemtime(__DIR__ . '/assets/css/legal.css') ?: time() ?>">
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

  <?php $BASE = '.'; $LOGO_LABEL = 'Bot'; ?>
  <?php include __DIR__ . '/assets/include/header.php'; ?>

  <main>
    <div class="legal">
      <h1>利用規約</h1>
      <p class="legal-meta">制定日：2026年10月27日／最終改定日：2026年10月27日</p>
      <p>
        本利用規約（以下「本規約」といいます）は、
        けい（以下「運営」といいます）が提供する
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
          <li><a href="#art6">第6条（利用料金）</a></li>
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
          <li>「本サービス」とは、運営が Discord 上で提供する Bot「<?= $PRODUCT_NAME ?>」および、これに付随するドキュメント・Web サイトをいいます。</li>
          <li>「利用者」とは、本サービスを導入し、または利用するすべての者（サーバーの管理者を含みます）をいいます。</li>
        </ol>
      </section>

      <!-- ===== 第3条 ===== -->
      <section class="legal-section" id="art3">
        <h2>第3条（利用条件）</h2>
        <p>
          本サービスの利用には、Discord のアカウントおよび Discord の利用規約への同意が必要です。
          Bot を導入するサーバーでは、本サービスの動作に必要な権限
          （チャンネルの閲覧、メッセージの送信、ボイスチャンネルへの接続など）を
          Bot に付与してください。
        </p>
      </section>

      <!-- ===== 第4条 ===== -->
      <section class="legal-section" id="art4">
        <h2>第4条（本サービスの内容）</h2>
        <p>
          本サービスは、投稿者プリセットの管理、保存先チャンネルの設定、
          SoundCloud の音声再生などの機能を提供します。
          運営は、利用者への事前の告知なく、機能の追加・変更・終了を行うことがあります。
        </p>
      </section>

      <!-- ===== 第5条 ===== -->
      <section class="legal-section" id="art5">
        <h2>第5条（禁止事項）</h2>
        <p>利用者は、本サービスの利用にあたり、次の行為をしてはなりません。</p>
        <ol class="legal-list">
          <li>法令または公序良俗に違反する行為</li>
          <li>本サービスの運営を妨害する行為、または過度な負荷をかける行為</li>
          <li>本サービスを逆工学・改変し、または不正にアクセスする行為</li>
          <li>第三者の著作権・肖像権その他の権利を侵害する行為（再生する音源の権利処理は利用者の責任で行うものとします）</li>
          <li>本サービスを再販売し、または運営の許可なく第三者へ提供する行為</li>
        </ol>
      </section>

      <!-- ===== 第6条 ===== -->
      <section class="legal-section" id="art6">
        <h2>第6条（利用料金）</h2>
        <p>
          本サービスは無償で提供します。
          運営は、事前の告知なく提供内容を変更し、または提供を終了することがあります。
        </p>
      </section>

      <!-- ===== 第7条 ===== -->
      <section class="legal-section" id="art7">
        <h2>第7条（データの取扱い）</h2>
        <p>データの取扱いについては、<a href="privacy">プライバシーポリシー</a> の定めによるものとします。</p>
      </section>

      <!-- ===== 第8条 ===== -->
      <section class="legal-section" id="art8">
        <h2>第8条（免責事項）</h2>
        <p>
          運営は、本サービスの完全性・正確性・有用性および特定の目的への適合性を保証しません。
          通信環境、Discord API の仕様変更、外部サービス（SoundCloud など）の状況により、
          本サービスの全部または一部が利用できない場合があります。
          本サービスの利用により生じた損害について、運営は故意または重大な過失による場合を除き、
          責任を負わないものとします。
        </p>
      </section>

      <!-- ===== 第9条 ===== -->
      <section class="legal-section" id="art9">
        <h2>第9条（本規約の変更）</h2>
        <p>
          運営は、必要に応じて本規約を変更することがあります。
          変更を行う場合は、サポートサーバーおよび本サイト上でお知らせします。
          変更後に本サービスを利用した場合、変更後の本規約に同意したものとみなします。
        </p>
      </section>

      <!-- ===== 第10条 ===== -->
      <section class="legal-section" id="art10">
        <h2>第10条（準拠法・管轄裁判所）</h2>
        <p>
          本規約は日本法に準拠します。
          本サービスに関して紛争が生じた場合は、運営の所在地を管轄する裁判所を
          第一審の専属的合意管轄裁判所とします。
        </p>
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
