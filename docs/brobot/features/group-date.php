<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '合コン進行 - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = '合コン進行 の参加登録・組み分け・ローテーションの使い方を説明します。'; ?>
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
        <div class="feature-icon">💑</div>
        <h1>合コン進行</h1>
        <p>事前に登録・編成した「組」をVCへ配置し、ラウンドごとにローテーション。</p>
      </div>

      <h2>概要</h2>
      <p>
        参加者を「組」単位で登録し、組ごとVCを移動させる合コン進行機能です。
        1組は最大6人（リーダー + メンバー5人）で、組数が少ない側が「椅子側」として固定され、
        多い側が「移動側」としてラウンドごとに1つ下のVCへ移動します。
      </p>

      <h2>用語</h2>
      <div class="table-wrapper"><table>
        <tbody>
          <tr>
            <th style="width: 180px;">登録パネル</th>
            <td><code>/合コン登録</code> で投稿する参加登録UI。リーダーが組を登録します。</td>
          </tr>
          <tr>
            <th>リーダー</th>
            <td>組を登録した本人。組の代表で、承認は不要（自動承認）です。</td>
          </tr>
          <tr>
            <th>メンバー</th>
            <td>リーダーが選んだ人。承認すると組に加わります。</td>
          </tr>
          <tr>
            <th>承認待ち</th>
            <td>メンバーがまだ承認していない状態。組としては未成立です。</td>
          </tr>
          <tr>
            <th>組み分けパネル</th>
            <td><code>/合コン組み分け</code> で投稿する編成UI。運営が操作します。</td>
          </tr>
          <tr>
            <th>プリセット</th>
            <td>組の並びに名前を付けて保存したもの。合コンの設定で選択して使います。</td>
          </tr>
          <tr>
            <th>椅子側 / 移動側</th>
            <td>組数が少ない側（固定）／多い側（ローテーション）です。</td>
          </tr>
          <tr>
            <th>集合ロビー</th>
            <td>移動側の待機VC。FIFOキューとして扱います。</td>
          </tr>
          <tr>
            <th>休憩室</th>
            <td>椅子側が不在になったVC。移動側の配置先から外します。</td>
          </tr>
        </tbody>
      </table></div>

      <h2>コマンド</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">コマンド</th>
            <th style="width: 180px;">権限</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/合コン登録</code></td>
            <td>設定ロール / 管理者</td>
            <td>参加登録パネルを投稿します</td>
          </tr>
          <tr>
            <td><code>/合コン組み分け</code></td>
            <td>設定ロール / 管理者</td>
            <td>組み分け設定パネルを投稿します</td>
          </tr>
          <tr>
            <td><code>/合コン</code></td>
            <td>操作ロール / 管理者</td>
            <td>操作パネルを投稿します（既存パネルがあれば引き継ぎ確認）</td>
          </tr>
        </tbody>
      </table></div>

      <h2>参加登録</h2>
      <h3>組を登録する</h3>
      <p>
        「👥 組を登録」からModalを開くと、<strong>「1組あたり人数 - 1」個</strong>の
        ユーザー選択欄が並びます（4人設定なら3個、6人設定なら5個）。
        リーダー自身は自動で含まれ、各欄は空欄でも構いません。
      </p>

      <h3>登録時のチェック</h3>
      <ul>
        <li>リーダーが性別ロールを持っていない／両方持っている → エラー</li>
        <li>リーダーが既に別の組に所属している → エラー</li>
        <li>同じメンバーを重複して選択 → エラー（対象者を表示）</li>
        <li>リーダー自身をメンバーに選択 → エラー</li>
        <li>異性を選択 → エラー</li>
        <li>性別ロールを持っていない人を選択 → エラー</li>
        <li>既に別の組に所属している人を選択 → エラー</li>
      </ul>

      <h3>承認と拒否</h3>
      <ul>
        <li>メンバーへ承認通知が届きます（DM、送れない場合は承認通知スレッド）。</li>
        <li>全メンバーが承認した時点で組が成立します。</li>
        <li>拒否した人は組から外れ、リーダーへ通知されます。</li>
        <li>メンバーが離脱すると、残りのメンバーとリーダーへ通知されます。</li>
        <li>リーダーが離脱すると組は解散し、全メンバーへ通知されます。</li>
      </ul>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          承認待ちの組は未成立として扱われ、開始時の配置対象になりません。
        </p>
      </div>

      <h2>組み分け</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">操作</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>登録から反映</td>
            <td>成立済みの参加組をそのまま読み込みます。</td>
          </tr>
          <tr>
            <td>手動編集</td>
            <td>組を選んでメンバーを入れ替える／0人にすると組を削除します。</td>
          </tr>
          <tr>
            <td>＋男性の組 / ＋女性の組</td>
            <td>メンバーを指定して組を追加します。</td>
          </tr>
          <tr>
            <td>保存 / 読込 / 削除</td>
            <td>プリセット（最大25件）の保存・読み込み・削除を行います。</td>
          </tr>
          <tr>
            <td>リセット</td>
            <td>現在の編成を空にします。</td>
          </tr>
          <tr>
            <td>登録リセット</td>
            <td>参加組（登録者と承認状態）をすべて削除します。</td>
          </tr>
        </tbody>
      </table></div>
      <p>
        合コン本体の設定「🧩 組み分けを選ぶ」で、使用するプリセットを選択します。
      </p>

      <h2>進行</h2>
      <ol class="steps">
        <li>
          <strong>開始</strong>
          集合ロビー・管理VCの実在者から登録者だけを対象に組を組み立て、
          椅子側を判定してVCを作成・配置します。1ラウンド目が自動で始まります。
        </li>
        <li>
          <strong>ローテーション</strong>
          移動側が1つ下のVCへ移動します。最下段の移動側はロビー末尾へ、
          ロビー先頭の移動側が最上段へ入ります。
        </li>
        <li>
          <strong>終了</strong>
          全員を集合ロビーへ戻し、VCを削除します。
        </li>
      </ol>
      <p>
        ローテーションは実VCの在室状況を正として再構築されるため、
        運営が手動で移動させた場合も次のラウンドでその状態が反映されます。
      </p>

      <h2>設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 160px;">分類</th>
            <th>項目</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>ロール</td>
            <td>操作ロール / 設定ロール / 移動不可ロール / 男性ロール / 女性ロール</td>
          </tr>
          <tr>
            <td>チャンネル</td>
            <td>集合ロビーVC / 会議カテゴリ（複数） / 通知先 / VC名 / 承認通知スレッド</td>
          </tr>
          <tr>
            <td>進行</td>
            <td>ラウンド時間（1〜60分） / 1組あたり人数（1〜6） / 自動進行</td>
          </tr>
          <tr>
            <td>編成ルール</td>
            <td>同数時の椅子側 / 一部参加の扱い / 再会履歴の記録</td>
          </tr>
          <tr>
            <td>通知</td>
            <td>8タイミング（開始・椅子配置・移動側配置・ラウンド開始・残り1分・ラウンド終了・最終開始・終了）</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p>
          <strong>💡 情報:</strong>
          「再会履歴の記録」を ON にすると、同席した組の回数を記録し、
          ロビー待ちの移動側を「まだ同席していない組」から優先して昇格させます。
        </p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
