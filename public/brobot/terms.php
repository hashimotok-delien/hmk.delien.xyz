<?php
/**
 * 利用規約 — 兄弟Bot
 * テーマは plans/css/style.css を流用し、法務ページ用の最小限のスタイルを追記。
 */
require __DIR__ . '/assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>利用規約 - <?= $PRODUCT_NAME ?></title>
  <meta name="description" content="<?= $PRODUCT_NAME ?> の利用規約です。サービスの利用条件・禁止事項・免責事項について定めています。">
  <link rel="stylesheet" href="plans/css/style.css?v=<?= @filemtime(__DIR__ . '/plans/css/style.css') ?: time() ?>">
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
      <p class="legal-meta">制定日：2026年10月28日／最終改定日：2026年10月28日</p>
      <p>
        この利用規約（以下「本規約」といいます）は、
        けい（以下「運営」といいます）が提供する
        <?= $PRODUCT_NAME ?>（以下「本サービス」といいます）の利用条件を定めるものです。
      </p>
      <p>
        利用者（以下「利用者」といいます）は、本規約に同意のうえ本サービスを利用するものとします。
        本サービスを利用した時点で、本規約に同意したものとみなします。
      </p>

      <nav class="legal-nav" aria-label="目次">
        <div class="legal-nav-title">目次</div>
        <ol>
          <li><a href="#art1">第1条（適用）</a></li>
          <li><a href="#art2">第2条（利用条件）</a></li>
          <li><a href="#art3">第3条（禁止事項）</a></li>
          <li><a href="#art4">第4条（本サービスの変更・停止・終了）</a></li>
          <li><a href="#art5">第5条（免責事項）</a></li>
          <li><a href="#art6">第6条（知的財産権）</a></li>
          <li><a href="#art7">第7条（個人情報の取扱い）</a></li>
          <li><a href="#art8">第8条（本規約の変更）</a></li>
          <li><a href="#art9">第9条（準拠法・お問い合わせ）</a></li>
        </ol>
      </nav>

      <!-- ===== 第1条 ===== -->
      <section class="legal-section" id="art1">
        <h2>第1条（適用）</h2>
        <p>
          本規約は、利用者と運営との間の本サービスの利用に関わる一切の関係に適用されます。
          運営が本サービス上または本ページに掲載する個別の規定は、本規約の一部を構成します。
        </p>
      </section>

      <!-- ===== 第2条 ===== -->
      <section class="legal-section" id="art2">
        <h2>第2条（利用条件）</h2>
        <ol class="legal-list">
          <li>本サービスは無料で提供します。料金は発生しません。</li>
          <li>
            本サービスの導入には、Discord サーバーの管理者権限を持つ利用者による操作が必要です。
          </li>
          <li>
            本サービスは特定のサーバー向けに提供しており、運営が認めたサーバーでのみ利用できます。
          </li>
          <li>
            利用者は、Discord の利用規約および各種ポリシーを遵守するものとします。
          </li>
          <li>
            本サービスの利用に必要な通信環境・端末は、利用者の責任と費用で用意するものとします。
          </li>
        </ol>
      </section>

      <!-- ===== 第3条 ===== -->
      <section class="legal-section" id="art3">
        <h2>第3条（禁止事項）</h2>
        <p>利用者は、本サービスの利用にあたり、次の行為をしてはなりません。</p>
        <ul>
          <li>法令または公序良俗に違反する行為</li>
          <li>他の利用者に対する嫌がらせ、迷惑行為、権利侵害</li>
          <li>本サービスの運営を故意に妨害する行為（過度な連続実行、負荷をかける行為など）</li>
          <li>本サービスの不具合を悪用する行為</li>
          <li>本サービスを無断で改変・再配布し、運営の許諾なく商用利用する行為</li>
          <li>その他、運営が不適切と判断する行為</li>
        </ul>
        <p>
          運営は、利用者がこれらに該当すると判断した場合、事前の通知なく本サービスの提供を
          停止または終了することがあります。
        </p>
      </section>

      <!-- ===== 第4条 ===== -->
      <section class="legal-section" id="art4">
        <h2>第4条（本サービスの変更・停止・終了）</h2>
        <p>
          運営は、利用者へ事前に通知することなく、本サービスの内容を変更し、
          または提供を停止・終了することがあります。
        </p>
        <p>
          保守、障害、その他運営が必要と判断した場合には、
          本サービスを一時的に停止することがあります。
        </p>
      </section>

      <!-- ===== 第5条 ===== -->
      <section class="legal-section" id="art5">
        <h2>第5条（免責事項）</h2>
        <ol class="legal-list">
          <li>
            運営は、本サービスの完全性・正確性・有用性・特定目的への適合性について、
            保証しません。
          </li>
          <li>
            運営は、本サービスの利用により生じた利用者または第三者の損害について、
            運営に故意または重大な過失がある場合を除き、責任を負いません。
          </li>
          <li>
            Discord の仕様変更、API の制限、通信障害など運営の管理を超える事由により
            本サービスが利用できない場合、運営は責任を負いません。
          </li>
          <li>
            本サービスの利用に関して利用者間または第三者との間で生じた紛争は、
            利用者の責任と費用において解決するものとします。
          </li>
        </ol>
      </section>

      <!-- ===== 第6条 ===== -->
      <section class="legal-section" id="art6">
        <h2>第6条（知的財産権）</h2>
        <p>
          本サービスを構成するプログラムおよびドキュメントに関する著作権は、
          運営または正当な権利者に帰属します。
        </p>
        <p>
          本サービスで利用する Discord の名称・ロゴその他の商標は、
          それぞれの権利者に帰属します。
        </p>
      </section>

      <!-- ===== 第7条 ===== -->
      <section class="legal-section" id="art7">
        <h2>第7条（個人情報の取扱い）</h2>
        <p>
          運営は、本サービスの利用に伴い取得する情報を、
          <a href="privacy">プライバシーポリシー</a> に従って適切に取り扱います。
        </p>
      </section>

      <!-- ===== 第8条 ===== -->
      <section class="legal-section" id="art8">
        <h2>第8条（本規約の変更）</h2>
        <p>
          運営は、必要と判断した場合に本規約を変更することがあります。
          変更後の本規約は、本ページに掲載した時点から効力を生じるものとします。
          変更後に本サービスを利用した場合、利用者は変更後の本規約に同意したものとみなします。
        </p>
      </section>

      <!-- ===== 第9条 ===== -->
      <section class="legal-section" id="art9">
        <h2>第9条（準拠法・お問い合わせ）</h2>
        <p>
          本規約の解釈にあたっては、日本法を準拠法とします。
          本サービスに関して紛争が生じた場合には、運営の所在地を管轄する裁判所を
          専属的合意管轄とします。
        </p>
        <p>
          本規約に関するお問い合わせは、
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポート窓口</a>
          までお願いします。
        </p>
      </section>
    </div>
  </main>

  <?php include __DIR__ . '/assets/include/footer.php'; ?>

</body>
</html>
