<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '既知の不具合 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '兄弟Bot で現在確認されている既知の不具合と、その回避策・対応状況をまとめています。'; ?>
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
      <h1>⚠️ 既知の不具合</h1>
      <p>現在確認されている既知の不具合と、その回避策・対応状況をまとめています。</p>

      <div class="alert alert-warning">
        <p>
          <strong>💡 注意:</strong>
          このページの内容は予告なく変更される場合があります。
          不具合に遭遇した場合はサポート窓口までご報告ください。
        </p>
      </div>

      <h2>🪑 全自動椅子取りv2 / 個室リレーv2</h2>

      <h3>ラウンド開始直後に「対象ユーザーがVCに接続していません」エラーが出る</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>VC イベント系（椅子側・移動側の移動処理）</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>中 — 該当者の移動だけが失敗し、進行は継続します</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>修正済み（失敗した移動はログに記録し、処理を継続するよう変更）</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-danger">
        <p><strong>🔧 不具合内容:</strong></p>
        <ul>
          <li>
            移動の直前に対象者が VC から切断すると、
            <code>Target user is not connected to voice.</code> が発生していました。
          </li>
        </ul>
      </div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>移動が失敗した参加者は、手動で正しい VC へ移動させてください。</li>
          <li>ラウンド開始前に、参加者が待機 VC に接続していることを確認してください。</li>
        </ul>
      </div>

      <h3>休憩室の数が想定とずれる（人数が変動した場合）</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>個室リレーv2（休憩室設定：自動計算 / 偶数 / 3の倍数）</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>低 — 配置が均等にならず、集合ロビーに移動側が残ることがあります</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>仕様 — 途中参加・途中離脱で人数が変わった場合の既知の制約</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>
            人数が大きく変わる場合は、いったん停止してから再開すると現在の人数で再計算されます。
          </li>
          <li>「椅子側配置」ボタンで、空いている椅子へ手動配置できます。</li>
        </ul>
      </div>

      <h2>🎲 ランダム会議</h2>

      <h3>「開始」ボタンが表示されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>ランダム会議</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>低 — 必須設定が不足しているため開始できません</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>仕様 — 必須設定（マッチングロール / 待機VC / 会議カテゴリ / 会議VC名）が揃うと表示されます</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>パネルの「設定」から必須項目をすべて埋めてください。</li>
        </ul>
      </div>

      <h2>💑 合コン進行</h2>

      <h3>参加者が「承認待ち」のまま進まない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>合コン進行（参加登録）</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>中 — 承認待ちの組は開始時の配置対象外になります</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>仕様 — 全メンバーが承認した時点で組が成立します</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>メンバーに承認ボタンの押下を依頼してください。</li>
          <li>DM が届かない場合は、承認通知スレッドを設定すると通知が投稿されます。</li>
        </ul>
      </div>

      <h2>📌 スティッキーメッセージ</h2>

      <h3>吊り下げが更新されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 120px;">対象機能</th>
            <td>スティッキーメッセージ</td>
          </tr>
          <tr>
            <th>影響</th>
            <td>低 — 最新の案内がチャンネル最下部に来ない</td>
          </tr>
          <tr>
            <th>対応状況</th>
            <td>仕様 — 設定した更新条件によっては更新されません</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>🛡️ 回避策:</strong></p>
        <ul>
          <li>設定の「🔄 更新条件」を確認してください。</li>
          <li>「Bot 反応 OFF」が有効な場合、Bot の投稿では更新されません。</li>
        </ul>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
