<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ランダム会議 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = 'ランダム会議 の概要・シャッフルルール・設定項目を説明します。'; ?>
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
        <div class="feature-icon">🎲</div>
        <h1>ランダム会議</h1>
        <p>待機VCに集まった人を、ランダムに少人数の会議へ振り分けます。</p>
      </div>

      <h2>概要</h2>
      <p>
        <code>/ランダム会議</code> で操作パネルを投稿し、待機VCと会議VCにいる人を
        シャッフルルールに沿って再配置します。会議VCは会議カテゴリ内に自動で作成され、
        終了時にすべて削除されます。
      </p>

      <h2>パネルのフェーズ</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 140px;">フェーズ</th>
            <th>状態</th>
            <th>表示されるボタン</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>setup</code></td>
            <td>必須設定が不足</td>
            <td>設定</td>
          </tr>
          <tr>
            <td><code>ready</code></td>
            <td>必須設定が揃い開始待ち</td>
            <td>設定・開始</td>
          </tr>
          <tr>
            <td><code>running</code></td>
            <td>進行中（待機）</td>
            <td>シャッフル・追加シャッフル・ラウンド開始・ラウンド終了・最終ラウンド開始・全員回収・終了</td>
          </tr>
          <tr>
            <td><code>round</code></td>
            <td>ラウンド中</td>
            <td>上記と同じ</td>
          </tr>
          <tr>
            <td><code>final_round</code></td>
            <td>最終ラウンド中</td>
            <td>上記と同じ</td>
          </tr>
        </tbody>
      </table></div>

      <h2>コマンド</h2>
      <pre><code>/ランダム会議</code></pre>
      <p>
        既にパネルが残っている場合は、操作の引き継ぎ確認が表示されます。
        1サーバーにつきパネルは1つです。
      </p>

      <h2>シャッフルの種類</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 180px;">ボタン</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><strong>シャッフル</strong></td>
            <td>待機VCと管理VCにいる人を全員対象に、ルールに沿って再配置します。</td>
          </tr>
          <tr>
            <td><strong>追加シャッフル</strong></td>
            <td>待機VCにいる人だけを、既存の会議VCの空きへ配置します。空きが足りなければ部屋を追加作成します。</td>
          </tr>
          <tr>
            <td><strong>全員回収</strong></td>
            <td>会議VCにいる全員を待機VCへ戻します。</td>
          </tr>
          <tr>
            <td><strong>終了</strong></td>
            <td>全員回収 → 会議VC削除 → 開催中データの削除を行い、パネルを初期状態に戻します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>シャッフルルール</h2>
      <p>優先順位は次のとおりです。</p>
      <p style="padding-left: 16px; color: var(--accent); font-weight: 600;">
        参加調整 → マッチング → 新規開拓 → 男女比調整 → 余り調整
      </p>

      <h3>余り調整</h3>
      <p>
        OFF のときは <code>人数 ÷ 会議人数</code> の部屋数を作り、余りは待機VCに残します。
        ON のときは部屋数を持ち上げて均等に配分します（部屋ごとの人数差は最大1）。
      </p>
      <ul>
        <li>12人 / 5人設定 → 4・4・4</li>
        <li>14人 / 5人設定 → 5・5・4</li>
        <li>6人 / 5人設定 → 6</li>
      </ul>

      <h3>参加調整</h3>
      <p>
        直近Nラウンドの「配置されなかった回数」を記録し、指定した比率分の枠を
        未配置回数の多い人から優先的に確保します。比率 0% のときは記録も行いません。
      </p>

      <h3>男女マッチング</h3>
      <p>
        ON のとき、同一マッチングロールだけの部屋（2人以上）を作りません。
        物理的に不可能な場合は混合できる部屋だけを作り、余る人は待機VCに残します。
      </p>

      <h3>男女比調整</h3>
      <p>
        ON のとき、各マッチングロールの人数が部屋間でできるだけ均等（差が1以内）に
        なるよう調整します。「1部屋目 4:1 / 2部屋目 1:4」のような偏りを防ぎます。
      </p>

      <h3>新規開拓優先</h3>
      <p>
        同席履歴（ペア単位）を保存し、履歴の無いペアを「はじめまして」と判定します。
        ON のとき、2人以上の全部屋に「はじめまして」ペアを1組以上作るよう調整します。
        履歴は終了時に削除されます。
      </p>

      <h3>マッチングロール不所持者の扱い</h3>
      <ul>
        <li>
          <strong>ON</strong> — マッチングロールも移動非対象ロールも持たない人を「その他」という
          1グループとして扱い、配置・マッチング・男女比調整の対象に含めます。
        </li>
        <li>
          <strong>OFF</strong> — グループ制約の対象外とし、各部屋の空きへランダムに配置します。
        </li>
      </ul>

      <h2>設定項目</h2>

      <h3>必須設定</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">項目</th>
            <th>備考</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>マッチングロール</td>
            <td>1件以上のロールが設定されていること（初期値：男性・女性）</td>
          </tr>
          <tr>
            <td>待機VC</td>
            <td>VC のみ（ステージは不可）</td>
          </tr>
          <tr>
            <td>会議カテゴリ</td>
            <td>複数指定可</td>
          </tr>
          <tr>
            <td>会議VC名</td>
            <td>空欄時は <code>会議-{num}</code> を採用</td>
          </tr>
        </tbody>
      </table></div>
      <p>
        必須設定が途中でも保存は可能です。段階的に設定してください。
      </p>

      <h3>ロール設定</h3>
      <ul>
        <li>操作可能ロール / 設定可能ロール / 移動非対象ロール（各25件まで）</li>
        <li>各項目に「全所持必須」の ON/OFF があります（既定 OFF）</li>
        <li>
          移動非対象ロールを持つ人は、シャッフル・追加シャッフルで移動させません
          （全員回収・終了時は移動対象）。
        </li>
      </ul>

      <h3>マッチングロール設定</h3>
      <ul>
        <li>最大40件。1ページ1件で一覧表示します。</li>
        <li>ロール名（必須・50文字）／ロール選択（最大25件）／マッチング対象／全所持必須</li>
        <li>削除時に他の設定から参照されている場合は警告し、自動で「未設定」に戻します。</li>
      </ul>

      <h3>進行メッセージ設定</h3>
      <p>
        送信先は進行TC（テキストチャンネルまたはスレッド）です。次のタイミングを個別に設定できます。
      </p>
      <ul>
        <li>ラウンド開始 / 残り1分 / ラウンド終了</li>
        <li>最終ラウンド開始 / 最終ラウンド残り1分 / 最終ラウンド終了</li>
        <li>指定時間メッセージ（ラウンド終了の指定秒前・最大10件）</li>
      </ul>

      <div class="alert alert-info">
        <p>
          <strong>💡 情報:</strong>
          タイマー動作中に別の操作をすると「タイマーをキャンセルして◯◯を行いますか？」と
          確認が表示されます（60秒で無効）。
        </p>
      </div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          Bot 再起動時は進行状態を復元しますが、タイマーは復元されません。
          ラウンド中だった場合は「ラウンド終了」扱いにリセットされます。
        </p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
