<?php
/**
 * 決済成功ページ — テンプレート
 * Stripe などの決済完了後にリダイレクトされる先。noindex を必ず付ける。
 */
require __DIR__ . '/../assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ご契約ありがとうございます - <?= $PRODUCT_NAME ?></title>
  <meta name="description" content="お申し込みが完了しました。プランの反映方法をご案内します。">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>

  <?php $BASE = '..'; $LOGO_LABEL = 'Premium'; $SHOW_TERMS = true; ?>
  <?php include __DIR__ . '/../assets/include/header.php'; ?>

  <main>
    <section class="result-hero">
      <div class="result-icon">🎉</div>
      <h1>ご契約ありがとうございます！</h1>
      <p><?= $PRODUCT_NAME ?> Premium へのご契約が完了しました。</p>
      <p>（TODO: 反映のタイミングや同期方法を書く）</p>

      <div class="result-actions">
        <a class="btn" href="./">プラン一覧を見る</a>
        <a class="btn btn-outline" href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a>
      </div>
    </section>

    <section class="section">
      <h2>次のステップ</h2>
      <ol class="steps">
        <li>
          <strong>（TODO: 手順1）</strong>
          <p>（TODO: 補足）</p>
        </li>
        <li>
          <strong>（TODO: 手順2）</strong>
          <p>（TODO: 補足）</p>
        </li>
      </ol>

      <div class="alert alert-success">
        <p><strong>✅ 反映について:</strong> （TODO）</p>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/../assets/include/footer.php'; ?>

</body>
</html>
