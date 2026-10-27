<?php
/**
 * プライバシーポリシー — 兄弟Bot
 * テーマは plans/css/style.css を流用し、法務ページ用の最小限のスタイルを追記。
 */
require __DIR__ . '/assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>プライバシーポリシー - <?= $PRODUCT_NAME ?></title>
  <meta name="description" content="<?= $PRODUCT_NAME ?> のプライバシーポリシーです。取得する情報・利用目的・第三者提供について定めています。">
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
      <h1>プライバシーポリシー</h1>
      <p class="legal-meta">制定日：2026年10月28日／最終改定日：2026年10月28日</p>
      <p>
        本プライバシーポリシー（以下「本ポリシー」といいます）は、
        けい（以下「運営」といいます）が提供する
        <?= $PRODUCT_NAME ?>（以下「本サービス」といいます）における、
        利用者に関する情報の取扱いを定めるものです。
      </p>
      <p>
        本ポリシーは、<a href="terms">利用規約</a> に基づく個別規定として定めるものです。
        本サービスを利用するすべての利用者（以下「利用者」といいます）は、
        本ポリシーに同意したものとみなします。
      </p>

      <nav class="legal-nav" aria-label="目次">
        <div class="legal-nav-title">目次</div>
        <ol>
          <li><a href="#art1">第1条（取得する情報）</a></li>
          <li><a href="#art2">第2条（利用目的）</a></li>
          <li><a href="#art3">第3条（第三者提供・外部サービスの利用）</a></li>
          <li><a href="#art4">第4条（保存期間および削除）</a></li>
          <li><a href="#art5">第5条（開示・訂正・削除等の請求）</a></li>
          <li><a href="#art6">第6条（本ポリシーの変更）</a></li>
          <li><a href="#art7">第7条（お問い合わせ）</a></li>
        </ol>
      </nav>

      <!-- ===== 第1条 ===== -->
      <section class="legal-section" id="art1">
        <h2>第1条（取得する情報）</h2>
        <p>
          運営は、本サービスの提供に必要な範囲で、次の情報を取得・保存します。
          本サービスは Discord 上で動作するため、取得する情報は Discord が提供する
          識別子および本サービスの機能を利用するために送信された情報に限られます。
        </p>
        <ol class="legal-list">
          <li>Discord のユーザーID、サーバー（ギルド）ID、チャンネルID、ロールID</li>
          <li>本サービスの設定情報（対象VC・対象ロール・ラウンド時間などの設定値）</li>
          <li>ボイスチャンネルの在室状況およびイベントの進行状態</li>
          <li>スティッキーメッセージ機能で利用者が登録した本文・埋め込みの内容</li>
          <li>イベント機能における同席履歴・配置履歴などの進行ログ</li>
          <li>コマンドの実行履歴およびエラーログ</li>
        </ol>
        <p>
          運営は、メッセージ本文の常時収集は行いません。本文を保存するのは、
          利用者がスティッキーメッセージ機能に登録した内容に限られます。
        </p>
      </section>

      <!-- ===== 第2条 ===== -->
      <section class="legal-section" id="art2">
        <h2>第2条（利用目的）</h2>
        <p>運営は、取得した情報を次の目的で利用します。</p>
        <ul>
          <li>本サービスの各機能（イベント進行・メッセージ吊り下げ・サーバー管理）を提供するため</li>
          <li>Bot の再起動後も設定と進行状態を復元するため</li>
          <li>不具合の原因調査および品質改善のため</li>
          <li>利用者からのお問い合わせに対応するため</li>
          <li>本サービスの利用状況を把握し、機能の追加・改善を検討するため</li>
        </ul>
      </section>

      <!-- ===== 第3条 ===== -->
      <section class="legal-section" id="art3">
        <h2>第3条（第三者提供・外部サービスの利用）</h2>
        <p>
          運営は、法令に基づく場合を除き、利用者の情報を第三者へ提供しません。
        </p>
        <p>
          本サービスは、その提供のために次の外部サービスを利用します。
          これらのサービスにおける情報の取扱いは、各サービスの定めに従います。
        </p>
        <ul>
          <li>Discord（Discord Inc.）— Bot の動作基盤およびメッセージ送受信のため</li>
          <li>データベースサーバー — 設定情報・進行状態の保存のため（運営が管理）</li>
        </ul>
        <p>
          本サービスは決済機能を持たないため、クレジットカード情報などの決済情報を取得しません。
        </p>
      </section>

      <!-- ===== 第4条 ===== -->
      <section class="legal-section" id="art4">
        <h2>第4条（保存期間および削除）</h2>
        <p>
          取得した情報は、本サービスの提供に必要な期間、保存します。
          開催中のみ有効な情報（イベントの進行状態・同席履歴など）は、
          イベントの終了時または本サービスの終了処理時に削除されます。
        </p>
        <p>
          利用者が Bot をサーバーから退出させた場合、当該サーバーに紐づく設定情報は
          運用上必要な範囲で保存されたのち、順次削除されます。
          削除を希望する場合は第5条の窓口へご連絡ください。
        </p>
      </section>

      <!-- ===== 第5条 ===== -->
      <section class="legal-section" id="art5">
        <h2>第5条（開示・訂正・削除等の請求）</h2>
        <p>
          利用者は、運営が保有する自己の情報について、開示・訂正・利用停止・削除を
          請求することができます。請求は第7条の窓口へ、Discord のユーザーID を添えて
          ご連絡ください。
        </p>
        <p>
          請求が本人からのものであることを確認したうえで、
          合理的な期間内に対応します。
        </p>
      </section>

      <!-- ===== 第6条 ===== -->
      <section class="legal-section" id="art6">
        <h2>第6条（本ポリシーの変更）</h2>
        <p>
          運営は、必要と判断した場合に本ポリシーを変更することがあります。
          変更後の本ポリシーは、本ページに掲載した時点から効力を生じるものとします。
          重要な変更を行う場合は、本サービス上またはサポート窓口にて周知します。
        </p>
      </section>

      <!-- ===== 第7条 ===== -->
      <section class="legal-section" id="art7">
        <h2>第7条（お問い合わせ）</h2>
        <p>
          本ポリシーに関するお問い合わせは、
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポート窓口</a>
          までお願いします。
        </p>
      </section>
    </div>
  </main>

  <?php include __DIR__ . '/assets/include/footer.php'; ?>

</body>
</html>
