<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '寝落ち送り - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">💤</div>
        <h1>寝落ち送り</h1>
        <p>VC で寝落ちしたメンバーを移動。コマンド/右クリック/メンションの3方式に対応</p>
      </div>

      <h2>概要</h2>
      <p>
        寝落ち送り機能は、VC で寝落ち（長時間の無音・無反応状態）したメンバーを
        専用の「寝落ち部屋」VC に移動させる機能です。<br>
        <strong>v2.0 から複数プリセットが設定できるようになりました。</strong>
        用途に応じた設定を複数作成し、VC やカテゴリごとに異なる動作を割り当てられます。
      </p>

      <h2>3つの寝落ち送り方法</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>方法</th>
            <th>操作</th>
            <th>備考</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>① スラッシュコマンド</td>
            <td><code>/寝落ち送り &lt;メンバー&gt;</code></td>
            <td>誰でも実行可能。対象メンバーの参加VCからプリセットを自動判定</td>
          </tr>
          <tr>
            <td>② メッセージ右クリック</td>
            <td>メッセージを右クリック → アプリ → <strong>寝落ち送り</strong></td>
            <td>メッセージ投稿者を寝落ち送り</td>
          </tr>
          <tr>
            <td>③ メンバー右クリック</td>
            <td>メンバーを右クリック → アプリ → <strong>寝落ち送り</strong></td>
            <td>選択したメンバーを寝落ち送り</td>
          </tr>
        </tbody>
      </table></div>

      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> ①③ は Bot が入れない VC や、メッセージ参照のない場面でも使えます。</p>
        <p><strong>💬 コメント入力:</strong> プリセットの「コメント入力」が
        <strong>必須</strong>または<strong>任意</strong>の場合、
        上記の実行時にコメント入力のモーダルが開きます
        （「必須」は未入力のまま送信できません）。</p>
      </div>

      <h2>設定方法</h2>

      <h3>設定パネルを開く</h3>
      <p>
        <code>/寝落ち送り設定</code> を実行すると、プリセット一覧が表示されます。<br>
        <em>このコマンドは管理者のみ実行可能です。</em>
      </p>

      <h3>プリセット管理</h3>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>ボタン</th>
            <th>動作</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>➕ 新規作成</td>
            <td>新しいプリセットを追加します（最大数制限なし）</td>
          </tr>
          <tr>
            <td>✏️ 編集</td>
            <td>選択中のプリセットの詳細設定を開きます</td>
          </tr>
          <tr>
            <td>🗑️ 削除</td>
            <td>任意のプリセットを削除します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>プリセット設定項目</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>設定項目</th>
            <th>必須</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>📛 名前変更</td>
            <td>任意</td>
            <td>プリセットの表示名を変更します</td>
          </tr>
          <tr>
            <td>✅ 有効/無効切替</td>
            <td>—</td>
            <td>このプリセットを使うかどうかを切り替えます</td>
          </tr>
          <tr>
            <td>⚙️ デフォルト動作</td>
            <td>任意</td>
            <td>ロール条件に合致しないメンバーのデフォルト動作（送り/切断/拒否）</td>
          </tr>
          <tr>
            <td>📺👥 チャンネル・ロール設定</td>
            <td>—</td>
            <td>
              <strong>1つのモーダルで以下の5項目をまとめて設定</strong>します。
              現在の設定は初期選択済みで、選択を外すと未設定に戻せます。
              <ul>
                <li>
                  <strong>💬 送信チャンネル</strong>（任意）:
                  寝落ち送りを受け付け、コメントと結果を投稿するテキストチャンネル
                </li>
                <li>
                  <strong>🔉 送り先VC</strong>（<strong>必須</strong>）:
                  寝落ちしたメンバーを移動させるVC
                </li>
                <li>
                  <strong>👥 寝落ち送りロール</strong>（任意）:
                  このロールを持つメンバー<strong>のみ</strong>寝落ち送り対象
                </li>
                <li>
                  <strong>🔌 寝落ち切断ロール</strong>（任意）:
                  このロールを持つメンバーは寝落ち送り時に<strong>切断</strong>
                </li>
                <li>
                  <strong>🚫 送信拒否ロール</strong>（任意）:
                  このロールを持つメンバーは寝落ち送り<strong>されません</strong>
                </li>
              </ul>
            </td>
          </tr>
          <tr>
            <td>💬 コメント入力</td>
            <td>任意</td>
            <td>
              右クリック／スラッシュコマンドで送る際のコメント入力の扱い
              （📝 必須 / 💬 任意 / 🚫 不要）。初期値は「不要」です
            </td>
          </tr>
          <tr>
            <td>📋 ホワイトリスト</td>
            <td>任意</td>
            <td>このプリセットの<strong>適用対象</strong>となるカテゴリ/VC</td>
          </tr>
          <tr>
            <td>📋 ブラックリスト</td>
            <td>任意</td>
            <td>このプリセットの<strong>適用除外</strong>となるカテゴリ/VC</td>
          </tr>
        </tbody>
      </table></div>

      <h2>コメント入力と結果の表示</h2>
      <p>
        「💬 コメント入力」が <strong>📝 必須</strong> または
        <strong>💬 任意</strong> のプリセットでは、
        右クリック／スラッシュコマンドで寝落ち送りを実行すると
        <strong>コメント入力のモーダル</strong>が開きます。
        「📝 必須」のときは未入力のまま送信できません。
      </p>
      <p>
        入力したコメントと寝落ち送りの結果は
        <strong>💬 送信チャンネル</strong>へ投稿されます。
        送信チャンネルが未設定の場合は、実行したチャンネル
        （VCのチャットなど）に<strong>実行者だけに見える形（エフェメラル）</strong>
        で表示されます。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>結果の項目</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>💬 コメント</td>
            <td>入力したコメント（未入力・不要の場合は表示されません）</td>
          </tr>
          <tr>
            <td>📤 寝落ち送り成功</td>
            <td>寝落ち部屋へ移動できたメンバー</td>
          </tr>
          <tr>
            <td>🔌 寝落ち切断成功</td>
            <td>切断したメンバー（該当者がいるときのみ）</td>
          </tr>
          <tr>
            <td>⚠️ 寝落ち送り失敗</td>
            <td>条件を満たさず移動できなかったメンバー</td>
          </tr>
          <tr>
            <td>🤖 寝落ち送り失敗(Bot)</td>
            <td>Bot のため対象外となったメンバー</td>
          </tr>
        </tbody>
      </table></div>
      <div class="alert alert-info">
        <p><strong>💡 ヒント:</strong> 結果の投稿は
        <strong>メンションなしの返信</strong>で行われるため、
        対象メンバーへ通知（ピン）は飛びません。</p>
      </div>

      <h2>プリセットの優先順位</h2>
      <p>
        ある VC に複数のプリセットがマッチする場合、<strong>プリセットIDが最も小さい（=先に作られた）ものが優先</strong>されます。
      </p>
      <div class="alert alert-info">
        <p><strong>例:</strong> ID=1 に「一般VC → 寝落ちVC A」、ID=2 に「一般VC → 寝落ちVC B」と設定した場合、ID=1 が優先され「寝落ちVC A」に送られます。</p>
      </div>

      <h2>マッチング条件</h2>
      <p>対象メンバーの参加VCから、以下の条件で最適なプリセットを探します。</p>
      <ol class="steps">
        <li>
          <strong>有効なプリセットのみ</strong>
          無効なプリセットはスキップされます
        </li>
        <li>
          <strong>送り先VCが設定されていること</strong>
          voice_channel_id が未設定のものはスキップ
        </li>
        <li>
          <strong>ホワイトリストチェック</strong>
          設定されている場合、対象VC（またはそのカテゴリ）が含まれなければスキップ
        </li>
        <li>
          <strong>ブラックリストチェック</strong>
          設定されている場合、対象VC（またはそのカテゴリ）が含まれていればスキップ
        </li>
        <li>
          <strong>ID昇順で最初にマッチしたものを使用</strong>
        </li>
      </ol>

      <div class="alert alert-warning">
        <p><strong>⚠️ 設計上の注意:</strong> 重複したカテゴリ/VCにまたがるプリセットを作ることは非推奨です。IDの小さいものが常に優先されることを理解した上で設定してください。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ ロール優先度:</strong> 送信拒否ロール ＞ 寝落ち切断ロール ＞ 寝落ち送りロール ＞ デフォルト動作 の順で判定されます。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
