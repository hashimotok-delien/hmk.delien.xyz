<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '個室リレーv2 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '個室リレーv2 の概要・使い方・設定項目を説明します。'; ?>
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
        <div class="feature-icon">🎠</div>
        <h1>個室リレーv2</h1>
        <p>男女に分かれて個室をぐるぐる回る、VCイベントの進行をまるごと自動化。</p>
      </div>

      <h2>概要</h2>
      <p>
        <code>/個室リレーv2</code> で操作パネルを投稿し、ボタンだけでイベントを進行します。
        椅子側（個室に固定される側）と移動側（個室をローテーションする側）に分かれ、
        ラウンドごとに移動側が1つずつ隣の個室へ移ります。
      </p>
      <p>
        個室VCの自動作成・休憩室の計算・ラウンドタイマー・参加者への通知までを
        Bot が担当するため、運営はボタンを押すだけです。
      </p>

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
            <td>椅子側を判定し、個室VCを作成して配置します。開始後は「次へ」に変わります。</td>
          </tr>
          <tr>
            <td><strong>次へ / 再開</strong></td>
            <td>フェーズを1つ進めます。停止中は「再開」として動作します。</td>
          </tr>
          <tr>
            <td><strong>停止</strong></td>
            <td>進行を一時中断します。個室VCと進行状態は保持されます。</td>
          </tr>
          <tr>
            <td><strong>最終ラウンドへ</strong></td>
            <td>次のラウンドを最終ラウンドに予約します。</td>
          </tr>
          <tr>
            <td><strong>椅子側配置</strong></td>
            <td>椅子側の居ない個室へ、椅子側の人を送ります（途中参加者・欠員の補充用）。</td>
          </tr>
          <tr>
            <td><strong>強制終了</strong></td>
            <td>全員を集合ロビーへ戻し、個室VCを削除して完全に終了します。</td>
          </tr>
          <tr>
            <td><strong>設定</strong></td>
            <td>設定画面を開きます。パネル表示後はいつでも利用できます。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>進行の流れ</h2>
      <ol class="steps">
        <li>
          <strong>開始</strong>
          必須設定を確認し、椅子側の人数分の個室VCを作成して配置します。
        </li>
        <li>
          <strong>椅子側を送る</strong>
          椅子側のメンバーを、椅子側の居ない個室へ1人ずつ送ります。
        </li>
        <li>
          <strong>移動側を送る</strong>
          集合ロビーの移動側を各個室へ配置します。休憩室設定に従って配置先を決めます。
        </li>
        <li>
          <strong>ラウンド開始 → ラウンド終了</strong>
          タイマーが動き、残り1分・終了時に通知します。「次へ」でスキップも可能です。
        </li>
        <li>
          <strong>席替え → 次のラウンド</strong>
          移動側を1つずつ隣の個室へ移します。最終ラウンドが終わると終了します。
        </li>
      </ol>

      <h2>コマンド</h2>
      <pre><code>/個室リレーv2</code></pre>
      <p>
        既にパネルが残っている場合は、引き継ぎの確認が表示されます。
        <strong>YES</strong> を選ぶと旧パネルを削除して新しいパネルを投稿します。
      </p>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">項目</th>
            <th>説明</th>
            <th style="width: 90px;">必須</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>パネル操作ロール</td>
            <td>パネルの進行ボタンを押せるロール（複数可）</td>
            <td>—</td>
          </tr>
          <tr>
            <td>設定可能ロール</td>
            <td>設定の変更を許可するロール（複数可）</td>
            <td>—</td>
          </tr>
          <tr>
            <td>集合ロビーVC</td>
            <td>移動側が待機するVC（複数可）</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>個室作成カテゴリ</td>
            <td>個室VCを作成するカテゴリ（複数可）</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>通知メンションロール</td>
            <td>ラウンド開始・残り1分などでメンションするロール</td>
            <td>—</td>
          </tr>
          <tr>
            <td>移動不可ロール</td>
            <td>このロールを持つ人は自動移動の対象外（運営用）</td>
            <td>—</td>
          </tr>
          <tr>
            <td>男性ロール / 女性ロール</td>
            <td>椅子側・移動側の判定に使うロール</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>ラウンド時間</td>
            <td>1ラウンドの長さ（1〜60分・既定 3分）</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>モード</td>
            <td>椅子側にする性別（男性椅子 / 女性椅子）</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>VC名</td>
            <td>個室VCの名前。<code>{VC名} - 1</code> の形式で連番になります</td>
            <td>✅</td>
          </tr>
          <tr>
            <td>休憩室設定</td>
            <td>無効 / 自動計算 / 偶数 / 3の倍数 / 偶数・3の倍数</td>
            <td>—</td>
          </tr>
          <tr>
            <td>途中参加自動参加</td>
            <td>ON にすると、途中参加の椅子側を空いている椅子へ自動配置します（既定 OFF）</td>
            <td>—</td>
          </tr>
          <tr>
            <td>自動有効化</td>
            <td>ON にすると、席替え後に次のラウンドを自動で開始します（既定 OFF）</td>
            <td>—</td>
          </tr>
          <tr>
            <td>各通知メッセージ</td>
            <td>8タイミングの通知文・色・画像を個別に設定できます</td>
            <td>—</td>
          </tr>
        </tbody>
      </table></div>

      <h2>休憩室設定について</h2>
      <p>
        椅子側の人数が個室数より多い場合、移動側を配置しない「休憩室」を作れます。
        休憩室には椅子側だけが入り、移動側は配置されません。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 160px;">設定</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>無効</td>
            <td>休憩室を作りません。集合ロビーから各VCへ順番に移動します。</td>
          </tr>
          <tr>
            <td>自動計算</td>
            <td>椅子側の人数に応じて、最も均等になる休憩室の配置を計算します。</td>
          </tr>
          <tr>
            <td>偶数</td>
            <td>偶数番目の個室を休憩室にします。</td>
          </tr>
          <tr>
            <td>3の倍数</td>
            <td>3の倍数番目の個室を休憩室にします。</td>
          </tr>
          <tr>
            <td>偶数・3の倍数</td>
            <td>「偶数」と「3の倍数」の両方を試し、より均等になる方を採用します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>通知タイミング</h2>
      <ul>
        <li>椅子側移動時</li>
        <li>移動側移動時</li>
        <li>ラウンド開始</li>
        <li>残り1分</li>
        <li>ラウンド終了</li>
        <li>最終ラウンド開始</li>
        <li>最終ラウンド残り1分</li>
        <li>最終ラウンド終了</li>
      </ul>
      <p>
        通知は Modal で設定し、各タイミングを Checkbox で有効／無効にできます。
        説明文と画像の両方が空欄の場合、有効にしていても送信されません。
      </p>

      <div class="alert alert-info">
        <p>
          <strong>💡 情報:</strong>
          進行状態はデータベースに保存されるため、Bot が再起動してもパネルと状態が復元されます。
          ただし進行中のタイマーは復元されません。
        </p>
      </div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          個室VCを作成するカテゴリには、Bot の「チャンネル管理」権限が必要です。
          権限がない場合、開始時にエラーになります。
        </p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
