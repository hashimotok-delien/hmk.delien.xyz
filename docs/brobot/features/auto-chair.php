<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '全自動椅子取りv2 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '全自動椅子取りv2 の概要・パネル操作・設定項目を説明します。'; ?>
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
        <div class="feature-icon">🪑</div>
        <h1>全自動椅子取りv2</h1>
        <p>男女比から椅子側を判定し、個室の作成から席替えまで全自動で進行します。</p>
      </div>

      <h2>概要</h2>
      <p>
        <code>/全自動椅子取りv2</code> で操作パネルを投稿し、ボタンだけで椅子取りゲームを
        進行します。椅子側（固定）と移動側（ローテーション）を自動で判定し、
        必要な個室VCを作成して配置します。
      </p>

      <h2>コマンド</h2>
      <pre><code>/全自動椅子取りv2</code></pre>

      <h2>パネルのボタン</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 180px;">ボタン</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>開始</strong></td>
            <td>椅子側を判定し、個室VCを作成して配置します。</td>
          </tr>
          <tr>
            <td><strong>停止</strong></td>
            <td>進行を一時中断します。VCと状態は保持されます。</td>
          </tr>
          <tr>
            <td><strong>強制終了</strong></td>
            <td>全員を集合ロビーへ戻し、個室VCを削除して完全に終了します。</td>
          </tr>
          <tr>
            <td><strong>最終ラウンドへ</strong></td>
            <td>次のラウンドを最終ラウンドに予約します。</td>
          </tr>
          <tr>
            <td><strong>女性送り / 男性送り</strong></td>
            <td>指定した側を個室へ送ります。</td>
          </tr>
          <tr>
            <td><strong>男回収 / 仕切り直し</strong></td>
            <td>移動側を集合ロビーへ戻し、配置をやり直します。</td>
          </tr>
          <tr>
            <td><strong>設定</strong></td>
            <td>設定画面を開きます。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>モード</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 180px;">モード</th>
            <th>椅子側</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>女性椅子</td>
            <td>女性が個室に固定され、男性が移動します。</td>
          </tr>
          <tr>
            <td>男性椅子</td>
            <td>男性が個室に固定され、女性が移動します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>設定項目</h2>

      <h3>基本設定（ロール）</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 220px;">操作ロール</th>
            <td>パネルの進行ボタンを押せるロール</td>
          </tr>
          <tr>
            <th>設定ロール</th>
            <td>設定の変更を許可するロール</td>
          </tr>
          <tr>
            <th>メンションロール</th>
            <td>ラウンド開始・残り1分などでメンションするロール</td>
          </tr>
          <tr>
            <th>移動不可ロール</th>
            <td>このロールを持つ人は自動移動の対象外（運営用）</td>
          </tr>
          <tr>
            <th>男性ロール / 女性ロール</th>
            <td>椅子側・移動側の判定に使うロール</td>
          </tr>
          <tr>
            <th>イベンターロール / ルールロール / 参加済みロール</th>
            <td>イベントの進行補助に使うロール</td>
          </tr>
        </tbody>
      </table></div>

      <h3>基本設定（VC等）</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 220px;">集合ロビーVC</th>
            <td>移動側が待機するVC</td>
          </tr>
          <tr>
            <th>スタンバイVC</th>
            <td>椅子側が待機するVC</td>
          </tr>
          <tr>
            <th>集合ロビーVC名 / スタンバイVC名</th>
            <td>VC名を変更する場合に指定します</td>
          </tr>
          <tr>
            <th>椅子VCカテゴリ</th>
            <td>個室VCを作成するカテゴリ</td>
          </tr>
          <tr>
            <th>集合ロビー化オプション</th>
            <td>集合ロビーの扱いに関する追加設定</td>
          </tr>
        </tbody>
      </table></div>

      <h3>基本設定（動作）</h3>
      <ul>
        <li><strong>モード</strong> — 女性椅子 / 男性椅子</li>
        <li><strong>ラウンド時間</strong> — 1ラウンドの長さ（分）</li>
        <li><strong>自動有効化</strong> — ON にするとフェーズが自動で進行します</li>
        <li><strong>途中参加自動参加</strong> — ON にすると途中参加者を空いている椅子へ自動配置します</li>
      </ul>

      <h3>通知設定</h3>
      <p>
        通知タイミングを選択し、送信先チャンネルと投稿者（表示名・アイコン）を設定できます。
      </p>

      <div class="alert alert-info">
        <p>
          <strong>💡 情報:</strong>
          各設定画面はアイテム上限（1Modal 5アイテム）に収めるため、
          「基本設定（ロール）」「基本設定（VC等）」「基本設定（動作）」
          「VC設定」「通知設定」「投稿者設定」に分割されています。
        </p>
      </div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          個室VCを作成するカテゴリには、Bot の「チャンネル管理」権限が必要です。
        </p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
