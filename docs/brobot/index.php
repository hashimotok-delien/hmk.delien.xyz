<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '界隈サーバー専用 Discord Bot「兄弟Bot」の機能・コマンド・設定方法を紹介するドキュメントです。'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/assets/include/header.php'; ?>
</head>
<body>

  <?php include __DIR__ . '/assets/include/sidebar.php'; ?>

  <!-- Main Content -->
  <main class="main-content">
    <?php include __DIR__ . '/assets/include/topbar.php'; ?>

    <div class="content">
      <!-- Hero -->
      <div class="feature-hero">
        <div class="feature-icon">👬</div>
        <h1>兄弟Bot ドキュメント</h1>
        <p>界隈サーバーでの交流を、もっと楽しく。</p>
        <a href="getting-started" class="btn" style="margin-top: 20px;">導入する</a>
      </div>

      <!-- About -->
      <h2>兄弟Bot とは</h2>
      <p>
        兄弟Bot は、とある界隈サーバー専用に開発している Discord Bot です。
        「最低限のサーバー運営がこれ1台で済む」ことを目標に、
        VCイベントの進行支援とサーバー管理ツールをまとめて提供しています。
      </p>
      <p>
        進行パネルはすべてボタン操作で完結し、進行状態はデータベースに保存されるため、
        Bot が再起動してもパネルと状態がそのまま復元されます。
      </p>
      <p>
        各機能は単一ファイルの「システムコグ」として実装されているため、
        別の Bot へファイルを置くだけで同じ機能を移植できます。
      </p>
      <p>
        バージョン <strong>v2.1.0</strong> ／ システムコグ: <strong>6</strong> ／ コマンド: <strong>20</strong>
        <span style="display: inline-block; margin-left: 16px;">
          <a href="updates" style="font-size: 0.9rem;">📋 更新履歴を見る</a>
        </span>
      </p>

      <!-- Features Grid -->
      <h2>機能一覧</h2>
      <div class="card-grid">

        <div class="card">
          <h3>🎠 個室リレーv2</h3>
          <p>
            男女に分かれて個室をローテーションする VC イベントを進行します。
            個室VCの自動作成・休憩室の計算・ラウンドタイマーまで一括管理。
          </p>
          <a href="features/rolling">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🎲 ランダム会議</h3>
          <p>
            待機VCの人をランダムに少人数の会議へ振り分けます。
            余り調整・参加調整・男女マッチング・新規開拓に対応。
          </p>
          <a href="features/random-meeting">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>💑 合コン進行</h3>
          <p>
            参加者を「組」として登録・承認し、組単位でVCをローテーション。
            合コンの進行を運営の手を止めずに回せます。
          </p>
          <a href="features/group-date">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🪑 全自動椅子取りv2</h3>
          <p>
            男女比から椅子側を判定し、個室の作成から席替えまで全自動で進行します。
          </p>
          <a href="features/auto-chair">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>📌 スティッキーメッセージ</h3>
          <p>
            チャンネルの案内メッセージを常に最新の位置へ吊り下げ続けます。
            ルールや連絡事項の掲示に向いています。
          </p>
          <a href="features/sticky">詳しく見る →</a>
        </div>

        <div class="card">
          <h3>🛠️ サーバー運営ツール</h3>
          <p>
            VCの一括作成・削除、全員へのロール付与、自動リアクション、
            Bot の導入サーバー管理などをまとめて提供します。
          </p>
          <a href="features/server-tools">詳しく見る →</a>
        </div>

      </div>

      <!-- Support -->
      <h2>サポート</h2>
      <div class="alert alert-info">
        <p>
          ご質問・不具合の報告・機能のリクエストはサポート窓口までお願いします。
          まずは <a href="faq">FAQ</a> と <a href="known-issues">既知の不具合</a> をご確認ください。
        </p>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
