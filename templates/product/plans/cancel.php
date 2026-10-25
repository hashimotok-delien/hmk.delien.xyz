<?php
/**
 * 決済キャンセルページ — テンプレート
 * 決済を中断したときの戻り先。noindex を必ず付ける。
 */
require __DIR__ . '/../assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>決済がキャンセルされました - <?= $PRODUCT_NAME ?></title>
  <meta name="description" content="お申し込み手続きがキャンセルされました。">
  <meta name="robots" content="noindex">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>

  <?php $BASE = '..'; $LOGO_LABEL = 'Premium'; $SHOW_TERMS = true; ?>
  <?php include __DIR__ . '/../assets/include/header.php'; ?>

  <main>
    <section class="result-hero">
      <div class="result-icon">😌</div>
      <h1>決済がキャンセルされました</h1>
      <p>お支払い手続きが完了しなかったため、契約は成立していません。</p>
      <p>（TODO: 再契約の導線を書く）</p>

      <div class="result-actions">
        <a class="btn" href="./">プラン一覧に戻る</a>
        <a class="btn btn-outline" href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a>
      </div>
    </section>

    <section class="section">
      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong> 決済済みなのに契約が反映されない場合は、
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a>
          までお問い合わせください。
        </p>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/../assets/include/footer.php'; ?>

</body>
</html>
