<?php
/**
 * プラン一覧ページ — テンプレート
 * スタイルは plans/css/style.css（プランページ／法務ページ共通のデザインシステム）
 */
require __DIR__ . '/../assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $PRODUCT_NAME ?> プラン | <?= $SITE_OWNER ?></title>
  <meta name="description" content="（TODO: プラン構成の説明）">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>

  <?php $BASE = '..'; $LOGO_LABEL = 'Premium'; $SHOW_TERMS = true; ?>
  <?php include __DIR__ . '/../assets/include/header.php'; ?>

  <main>
    <!-- ===== ヒーロー ===== -->
    <section class="hero">
      <div class="hero-icon">💎</div>
      <h1><?= $PRODUCT_NAME ?> プラン</h1>
      <p>（TODO: プレミアム機能の概要）</p>
      <p class="hero-note">
        契約方法：（TODO: どこから契約するか）。決済：（TODO: 決済事業者名）。
      </p>
    </section>

    <!-- ===== プラン一覧 =====
         .plan-card の silver / gold / diamond は色分け用クラス。
         有効化サーバー数などは商品に合わせて読み替える。 -->
    <section class="section">
      <h2>プラン一覧</h2>
      <p class="section-lead">（TODO: プランの選び方の説明）</p>

      <div class="plan-grid">
        <!-- プラン1 -->
        <article class="plan-card silver">
          <div class="plan-emblem">🥈</div>
          <div class="plan-name">プラン1</div>
          <div class="plan-servers">（TODO: 条件）</div>
          <div class="plan-price">¥0<span>/月</span></div>
          <div class="plan-tax">（税込）</div>
          <ul class="plan-features">
            <li>（TODO: 特典1）</li>
            <li>（TODO: 特典2）</li>
          </ul>
          <a class="btn btn-block" href="#howto">契約する</a>
        </article>

        <!-- プラン2（おすすめ） -->
        <article class="plan-card gold popular">
          <div class="plan-emblem">🥇</div>
          <div class="plan-name">プラン2</div>
          <div class="plan-servers">（TODO: 条件）</div>
          <div class="plan-price">¥0<span>/月</span></div>
          <div class="plan-tax">（税込）</div>
          <ul class="plan-features">
            <li>プラン1 の全特典</li>
            <li>（TODO: 特典）</li>
          </ul>
          <a class="btn btn-block" href="#howto">契約する</a>
        </article>

        <!-- プラン3 -->
        <article class="plan-card diamond">
          <div class="plan-emblem">💎</div>
          <div class="plan-name">プラン3</div>
          <div class="plan-servers">（TODO: 条件）</div>
          <div class="plan-price">¥0<span>/月</span></div>
          <div class="plan-tax">（税込）</div>
          <ul class="plan-features">
            <li>プラン2 の全特典</li>
            <li>（TODO: 特典）</li>
          </ul>
          <a class="btn btn-block" href="#howto">契約する</a>
        </article>
      </div>
    </section>

    <!-- ===== 機能比較 ===== -->
    <section class="section">
      <h2>機能比較</h2>
      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>項目</th>
              <th>🥈 プラン1</th>
              <th>🥇 プラン2</th>
              <th>💎 プラン3</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>月額料金（税込）</td>
              <td>¥0</td>
              <td>¥0</td>
              <td>¥0</td>
            </tr>
            <tr>
              <td>（TODO: 比較項目）</td>
              <td><span class="yes">✔</span></td>
              <td><span class="yes">✔</span></td>
              <td><span class="yes">✔</span></td>
            </tr>
            <tr>
              <td>（TODO: 上位プランのみの機能）</td>
              <td><span class="no">—</span></td>
              <td><span class="yes">✔</span></td>
              <td><span class="yes">✔</span></td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ===== 契約の流れ ===== -->
    <section class="section" id="howto">
      <h2>契約の流れ</h2>
      <ol class="steps">
        <li>
          <strong>（TODO: 手順1）</strong>
          <p>（TODO: 補足）</p>
        </li>
        <li>
          <strong>（TODO: 手順2）</strong>
          <p>（TODO: 補足）</p>
        </li>
        <li>
          <strong>（TODO: 手順3）</strong>
          <p>（TODO: 補足）</p>
        </li>
      </ol>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> （TODO: 反映タイミングなど）</p>
      </div>
    </section>

    <!-- ===== FAQ ===== -->
    <section class="section">
      <h2>よくある質問</h2>
      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>質問</th>
              <th>回答</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>決済方法は？</td>
              <td>（TODO）</td>
            </tr>
            <tr>
              <td>解約はどうすれば？</td>
              <td>（TODO）</td>
            </tr>
            <tr>
              <td>反映までどれくらい？</td>
              <td>（TODO）</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong> ご不明な点がある場合は
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポートサーバー</a> までお問い合わせください。
        </p>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/../assets/include/footer.php'; ?>

</body>
</html>
