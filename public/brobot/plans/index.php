<?php
/**
 * ご利用について — 兄弟Bot
 * スタイルは plans/css/style.css（プランページ／法務ページ共通のデザインシステム）
 */
require __DIR__ . '/../assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title><?= $PRODUCT_NAME ?> のご利用について | <?= $SITE_OWNER ?></title>
  <meta name="description" content="兄弟Bot は無料で配布しています。利用条件・導入の流れ・サポートについてまとめています。">
  <link rel="stylesheet" href="css/style.css?v=<?= @filemtime(__DIR__ . '/css/style.css') ?: time() ?>">
</head>
<body>

  <?php $BASE = '..'; $LOGO_LABEL = 'Bot'; $SHOW_TERMS = true; ?>
  <?php include __DIR__ . '/../assets/include/header.php'; ?>

  <main>
    <!-- ===== ヒーロー ===== -->
    <section class="hero">
      <div class="hero-icon">🎁</div>
      <h1>ご利用について</h1>
      <p>兄弟Bot は、界隈サーバー運営の負担を減らすことを目的に<strong>無料</strong>で配布しています。</p>
      <p class="hero-note">
        料金プランはありません。決済も発生しません。
      </p>
    </section>

    <!-- ===== 利用形態 ===== -->
    <section class="section">
      <h2>利用形態</h2>
      <p class="section-lead">
        どちらも無料です。運用スタイルに合わせて選んでください。
      </p>

      <div class="plan-grid">
        <article class="plan-card silver">
          <div class="plan-emblem">🤝</div>
          <div class="plan-name">ホスト版を利用</div>
          <div class="plan-servers">運営がホストしている Bot を招待</div>
          <div class="plan-price">¥0<span>/月</span></div>
          <div class="plan-tax">（無料）</div>
          <ul class="plan-features">
            <li>招待するだけですぐ使える</li>
            <li>アップデートは自動で反映</li>
            <li>利用できるサーバーは限定</li>
          </ul>
          <a class="btn btn-block" href="#howto">導入の流れを見る</a>
        </article>

        <article class="plan-card gold popular">
          <div class="plan-emblem">🧩</div>
          <div class="plan-name">セルフホスト</div>
          <div class="plan-servers">自分の環境で Bot を動かす</div>
          <div class="plan-price">¥0<span>/月</span></div>
          <div class="plan-tax">（無料・ホスティング費用は自己負担）</div>
          <ul class="plan-features">
            <li>ホスト版の全機能</li>
            <li>機能を選んで組み込める（システムコグ）</li>
            <li>設定・データを完全に自分で管理</li>
          </ul>
          <a class="btn btn-block" href="<?= $DOCS_URL ?>getting-started">導入手順を見る</a>
        </article>
      </div>
    </section>

    <!-- ===== 機能比較 ===== -->
    <section class="section">
      <h2>できること</h2>
      <div class="table-wrapper">
        <table>
          <thead>
            <tr>
              <th>機能</th>
              <th>概要</th>
              <th>費用</th>
            </tr>
          </thead>
          <tbody>
            <tr>
              <td>VCイベント進行</td>
              <td>個室リレーv2 / ランダム会議 / 合コン進行 / 全自動椅子取りv2</td>
              <td>¥0</td>
            </tr>
            <tr>
              <td>スティッキーメッセージ</td>
              <td>チャンネルの案内メッセージを常に最新位置へ吊り下げ</td>
              <td>¥0</td>
            </tr>
            <tr>
              <td>サーバー運営ツール</td>
              <td>VC一括作成・削除、ロール管理、自動リアクション、Bot管理</td>
              <td>¥0</td>
            </tr>
            <tr>
              <td>サポート</td>
              <td>不具合報告・機能リクエストの受け付け</td>
              <td>¥0</td>
            </tr>
          </tbody>
        </table>
      </div>
    </section>

    <!-- ===== 導入の流れ ===== -->
    <section class="section" id="howto">
      <h2>導入の流れ</h2>
      <ol class="steps">
        <li>
          <strong>サポート窓口へ相談する</strong>
          <p>導入可否を確認します。兄弟Bot は利用できるサーバーを限定しています。</p>
        </li>
        <li>
          <strong>Bot を招待する</strong>
          <p>サーバー管理者権限で招待し、必要な権限を付与します。</p>
        </li>
        <li>
          <strong>初期設定を行う</strong>
          <p><code>/モデレーター設定</code> でロールを登録し、各機能のパネルから設定を済ませます。</p>
        </li>
      </ol>

      <div class="alert alert-info">
        <p>
          <strong>💡 ヒント:</strong>
          くわしい手順は <a href="<?= $DOCS_URL ?>getting-started">ドキュメントの導入方法</a> を参照してください。
        </p>
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
              <td>料金はかかりますか？</td>
              <td>かかりません。無料で配布しています。</td>
            </tr>
            <tr>
              <td>有料プランはありますか？</td>
              <td>ありません。すべての機能を無料で利用できます。</td>
            </tr>
            <tr>
              <td>解約はどうすれば？</td>
              <td>契約がないため解約手続きは不要です。Bot をサーバーから退出させれば利用は終了します。</td>
            </tr>
            <tr>
              <td>複数のサーバーで使えますか？</td>
              <td>はい。設定と進行状態はサーバー単位で分離して保存されます。</td>
            </tr>
          </tbody>
        </table>
      </div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong> ご不明な点がある場合は
          <a href="<?= $SUPPORT_URL ?>" target="_blank" rel="noopener">サポート窓口</a> までお問い合わせください。
        </p>
      </div>
    </section>
  </main>

  <?php include __DIR__ . '/../assets/include/footer.php'; ?>

</body>
</html>
