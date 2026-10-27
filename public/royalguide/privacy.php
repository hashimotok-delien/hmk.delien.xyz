<?php
/**
 * プライバシーポリシー
 * テーマは assets/css/legal.css を流用し、
 * 法務ページ用の最小限のスタイルだけ <style> に足す。
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
      <h1>プライバシーポリシー</h1>
      <p class="legal-meta">制定日：2026年10月27日／最終改定日：2026年10月27日</p>
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
        <p>運営は、本サービスの提供に必要な範囲で、次の情報を取得・保存します。</p>
        <ol class="legal-list">
          <li>Discord のユーザーID、サーバー（ギルド）ID、チャンネルID など、Discord API を通じて取得できる識別子</li>
          <li>各機能の設定内容（保存先チャンネル、投稿者プリセット、サーバー既定音量など）</li>
          <li>投稿者プリセットに登録された設定名・表示名・アイコンURL およびアップロードされた画像</li>
          <li>音声再生のために入力された SoundCloud の URL および再生履歴（キュー・再生中の曲）</li>
          <li>エラー発生時のログ（コマンド名、例外の内容、発生日時など）</li>
        </ol>
      </section>

      <!-- ===== 第2条 ===== -->
      <section class="legal-section" id="art2">
        <h2>第2条（利用目的）</h2>
        <p>運営は、取得した情報を次の目的で利用します。</p>
        <ul>
          <li>本サービスの機能を提供し、設定内容を保存・復元するため</li>
          <li>不具合の調査・修正および品質の改善を行うため</li>
          <li>利用状況を把握し、機能の追加・改善を検討するため</li>
          <li>利用規約に違反する行為や不正利用に対応するため</li>
        </ul>
      </section>

      <!-- ===== 第3条 ===== -->
      <section class="legal-section" id="art3">
        <h2>第3条（第三者提供・外部サービスの利用）</h2>
        <p>
          本サービスは Discord 上で動作するため、Discord Inc. が提供する
          API およびプラットフォームを利用します。音声再生機能では、
          SoundCloud が提供するサービスへ URL を送信して音声を取得します。
          取得した情報は、運営が管理するサーバー上のデータベース（MariaDB）に保存されます。
        </p>
        <p>
          運営は、法令に基づく場合または人の生命・身体・財産の保護のために
          必要であって本人の同意を得ることが困難な場合を除き、
          あらかじめ本人の同意を得ることなく個人情報を第三者へ提供しません。
        </p>
      </section>

      <!-- ===== 第4条 ===== -->
      <section class="legal-section" id="art4">
        <h2>第4条（保存期間および削除）</h2>
        <p>
          設定データは、本サービスの提供期間中、サーバー（ギルド）単位で保存されます。
          Bot がサーバーから退出した場合、または利用者から削除の依頼があった場合は、
          合理的な期間内に該当データを削除します。
          エラーログは不具合の調査に必要な期間のみ保持し、その後削除します。
        </p>
      </section>

      <!-- ===== 第5条 ===== -->
      <section class="legal-section" id="art5">
        <h2>第5条（開示・訂正・削除等の請求）</h2>
        <p>
          利用者は、自己に関する情報の開示・訂正・削除を求めることができます。
          ご希望の場合は下記のお問い合わせ窓口までご連絡ください。
          本人確認のため、Discord のユーザーID の提示をお願いする場合があります。
        </p>
      </section>

      <!-- ===== 第6条 ===== -->
      <section class="legal-section" id="art6">
        <h2>第6条（本ポリシーの変更）</h2>
        <p>
          運営は、必要に応じて本ポリシーを変更することがあります。
          重要な変更を行う場合は、サポートサーバーおよび本サイト上でお知らせします。
          変更後の本ポリシーは、本サイトに掲載した時点から効力を生じるものとします。
        </p>
      </section>

      <!-- ===== 第7条 ===== -->
      <section class="legal-section" id="art7">
        <h2>第7条（お問い合わせ）</h2>
        <p>
          本ポリシーに関するお問い合わせは、
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a>
          までお願いします。
        </p>
      </section>
    </div>
  </main>

  <?php include __DIR__ . '/assets/include/footer.php'; ?>

</body>
</html>
