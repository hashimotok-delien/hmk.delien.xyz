<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'MBTI機能 - Cultivate ドキュメント'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/../assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/../assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../assets/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">🧠</div>
        <h1>MBTI機能</h1>
        <p>MBTI診断や新規開拓VCでコミュニティを活性化</p>
      </div>

      <h2>概要</h2>
      <p>
        MBTI機能は、MBTI（ Myers-Briggs Type Indicator ）に基づいた診断パネルや
        新規開拓 VC パネルを設置できる機能です。コミュニティ内の交流促進に役立ちます。
      </p>

      <h2>設定画面プレビュー</h2>
      <div class="preview" data-screen-preview>
        <script type="application/json">
{
  "ariaLabel": "MBTI診断設定画面のプレビュー",
  "screens": [
    {
      "channel": "MBTI診断設定",
      "embed": {
        "title": "MBTI診断設定（プレビュー）",
        "desc": "<strong>ベースロールとマッチングロール（順位付き）</strong><br><br><strong>@MBTIベース</strong><br>【順位 1】<br>- @INFJ<br>- @ENFP",
        "fields": [
          {"name": "設定説明", "value": "以下から設定項目を選んでください。<br><br>• ベースロール設定 — ベースとなるロールを複数選択（ページング対応）<br>• マッチング設定 — ベースを選び、サーバーロールを選択<br>• 順位設定 — マッチングロールを 1..N の順位へ割り当て<br><br>※ 変更は <strong>保存</strong> を押すまで DB には反映されません。"}
        ],
        "footer": "Cultivate"
      },
      "select": "MBTI診断設定項目を選んでね",
      "buttons": [
        {"label": "保存", "style": "green"},
        {"label": "キャンセル", "style": "danger"}
      ],
      "caption": "▲ MBTI 診断パネル設置後に開く設定画面。セレクトで項目を選び、<strong>保存</strong> で確定します。"
    }
  ]
}
        </script>
      </div>

      <h2>コマンド</h2>

      <h3>MBTI新規開拓パネル設置</h3>
      <pre><code>/mbti新規開拓パネル設置</code></pre>
      <p>
        MBTI 新規開拓用の VC パネルを設置します。特定サーバー限定で利用できます。
      </p>

      <h3>MBTI診断パネル設置</h3>
      <pre><code>/mbti診断パネル設置</code></pre>
      <p>
        MBTI 診断パネルを設置します。診断ボタン（全員 / 異性 / 同性）が付属し、
        ユーザーは自分の MBTI を診断・登録できます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 情報:</strong> MBTI 機能は特定のサーバー向けに開発されています。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
