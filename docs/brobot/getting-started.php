<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '導入方法 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '兄弟Bot をサーバーへ導入し、最初の設定を済ませるまでの手順を説明します。'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/assets/include/topbar.php'; ?>

    <div class="content">
      <h1>🚀 導入方法</h1>
      <p>
        兄弟Bot をサーバーへ導入し、各機能を使える状態にするまでの手順を説明します。
      </p>

      <div class="alert alert-info">
        <p>
          <strong>💡 前提:</strong>
          兄弟Bot は界隈サーバー専用の無料配布 Bot です。導入には
          <strong>サーバーの管理者権限</strong>が必要です。
        </p>
      </div>

      <h2>導入の流れ</h2>
      <ol class="steps">
        <li>
          <strong>ステップ1 — Bot を招待する</strong>
          <p>
            管理者権限を持つアカウントで招待リンクを開き、導入先のサーバーを選択して承認します。
            付与する権限は「チャンネル管理」「ロール管理」「メッセージ管理」を含めてください。
          </p>
        </li>
        <li>
          <strong>ステップ2 — モデレーターロールを登録する</strong>
          <p>イベント運営に使用するロールを登録します。</p>
          <pre><code>/モデレーター設定 role:@モデレーター</code></pre>
          <p>
            ここで指定したロールを持つ人は、VCイベント系コマンドを実行できるようになります。
          </p>
        </li>
        <li>
          <strong>ステップ3 — 使う機能のパネルを設置する</strong>
          <p>
            イベントで使う機能のコマンドを実行すると、操作パネルが投稿されます。
            パネルの「設定」ボタンから、VC・ロール・ラウンド時間などを設定してください。
          </p>
          <pre><code>/個室リレーv2
/ランダム会議
/合コン
/全自動椅子取りv2</code></pre>
        </li>
      </ol>

      <h2>初期設定</h2>
      <p>
        各機能は「設定」ボタンからすべて設定できます。共通して必要なのは次の項目です。
      </p>

      <h3>1. ロールの設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>操作ロール</td>
            <td>パネルの進行ボタンを押せるロール（複数指定可）</td>
          </tr>
          <tr>
            <td>設定ロール</td>
            <td>設定の変更を許可するロール（複数指定可）</td>
          </tr>
          <tr>
            <td>男性ロール / 女性ロール</td>
            <td>椅子側・移動側の判定に使う性別ロール</td>
          </tr>
          <tr>
            <td>移動不可ロール</td>
            <td>このロールを持つ人は自動移動の対象外（運営用）</td>
          </tr>
        </tbody>
      </table></div>

      <h3>2. チャンネル・VC の設定</h3>
      <ul>
        <li><strong>待機VC / 集合ロビーVC</strong> — 参加者が最初に集まる VC</li>
        <li><strong>個室作成カテゴリ / 会議カテゴリ</strong> — Bot が個室VCを作成するカテゴリ</li>
        <li><strong>通知先</strong> — 進行メッセージを投稿するテキストチャンネル</li>
      </ul>

      <h3>3. ラウンド時間</h3>
      <p>
        既定は 3 分です。1〜60 分の範囲で設定できます。
      </p>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          Bot が個室VCを作成するカテゴリには、Bot のロールに対して
          「チャンネル管理」権限が必要です。権限がない場合、開始時にエラーになります。
        </p>
      </div>

      <h2>各機能の詳細設定</h2>
      <p>
        機能ごとの設定項目は、以下のページを参照してください。
      </p>

      <div class="card-grid" style="margin-top: 32px;">
        <div class="card">
          <h3>🎠 個室リレーv2</h3>
          <p>個室の自動作成・休憩室設定・通知メッセージの設定方法。</p>
          <a href="features/rolling">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🎲 ランダム会議</h3>
          <p>マッチングロール・シャッフルルールの設定方法。</p>
          <a href="features/random-meeting">設定方法 →</a>
        </div>
        <div class="card">
          <h3>💑 合コン進行</h3>
          <p>参加登録・組み分けプリセット・進行設定。</p>
          <a href="features/group-date">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🪑 全自動椅子取りv2</h3>
          <p>椅子側モード・自動有効化・途中参加の扱い。</p>
          <a href="features/auto-chair">設定方法 →</a>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
