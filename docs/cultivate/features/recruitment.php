<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '裏募集 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🔱</div>
        <h1>裏募集</h1>
        <p>募集パネルから投稿・立候補・通知までをまとめて管理</p>
      </div>

      <div class="alert alert-info">
        <p><strong>🆕 新機能:</strong> この機能は <strong>v1.9.0</strong> で追加されました。</p>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 裏募集とは？</strong>
        サーバー内に<strong>募集パネル</strong>を設置し、メンバーが
        <strong>募集の投稿・編集・削除</strong>と
        <strong>立候補・辞退</strong>を行えるようにする機能です。
        立候補があったことは、あらかじめ登録した
        <strong>通知対象</strong>へ DM またはスレッドで自動通知されます。</p>
      </div>

      <h2>コマンド一覧</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>コマンド</th>
            <th>説明</th>
            <th>権限</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>/裏募集設定</code></td>
            <td>募集プリセット（募集文・対象ロール・通知先）を管理します</td>
            <td>管理者</td>
          </tr>
          <tr>
            <td><code>/裏募集パネル設定</code></td>
            <td>パネルプリセット（パネル本文・使用する募集設定）を管理し、チャンネルへ設置します</td>
            <td>管理者</td>
          </tr>
        </tbody>
      </table></div>

      <h2>機能詳細</h2>

      <h3>裏募集設定（募集プリセット）</h3>
      <p>
        募集の内容と通知先をまとめた「募集プリセット」を管理します。
        コマンドを実行するとプリセット一覧がページ送りで表示され、
        各ページから <strong>新規作成 / 編集 / 削除 / 閉じる</strong> を
        操作できます。
      </p>
      <p>
        編集画面では、下のボタンから各項目を設定し、
        <strong>保存</strong> を押したタイミングで反映されます
        （保存するまでプレビューのみが更新されます）。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>🎭 ロール登録</td>
            <td>
              性別ロール（募集の宛先グループ）、投稿者必須ロール、
              立候補必須ロールを登録します。必須ロールは
              「いずれか所持」または「全所持必須」を選べます。
            </td>
          </tr>
          <tr>
            <td>🔔 通知対象設定</td>
            <td>
              対象ラベル・性別ロール・対象ロール・募集投稿チャンネルを
              1件ずつ登録します。立候補はここで登録した宛先へ通知されます。
            </td>
          </tr>
          <tr>
            <td>🌙 通知メンション設定</td>
            <td>
              日中／深夜それぞれの通知メンションロールと、
              深夜とみなす時間帯（初期値 0:00〜7:00）を設定します。
            </td>
          </tr>
        </tbody>
      </table></div>

      <h3>裏募集パネル設定（パネルプリセット）</h3>
      <p>
        募集パネルの見た目と、使用する募集プリセットをまとめた
        「パネルプリセット」を管理します。一覧から
        <strong>新規作成 / 編集 / 削除 / 閉じる</strong> を操作でき、
        編集画面の <strong>設置</strong> からチャンネルへパネルを投稿します。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>内容</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>📝 基本設定</td>
            <td>
              パネル色・通知方式（DM / スレッド / DM→スレッド）・
              オプション（選択式募集・匿名募集・複数立候補禁止・
              アピール文必須・複数宛先可）を設定します。
              選択式募集を有効にすると投稿者が投稿先（通知対象）を選べ、
              無効の場合は登録した通知対象すべてへ投稿されます。
            </td>
          </tr>
          <tr>
            <td>📄 募集・立候補設定</td>
            <td>
              パネル本文、募集文テンプレートと募集色、
              立候補文テンプレートと立候補色を設定します。
              色が未設定の場合は性別ロールの色を使用します。
            </td>
          </tr>
          <tr>
            <td>🔗 裏募集設定</td>
            <td>
              このパネルで使用する募集プリセットを選択します
              （複数選択でき、解除で外せます）。
            </td>
          </tr>
          <tr>
            <td>📍 設置状態</td>
            <td>
              設置済みチャンネルと投稿中の募集件数を表示します。
            </td>
          </tr>
        </tbody>
      </table></div>

      <h3>募集の投稿と立候補</h3>
      <p>
        設置したパネルの <strong>投稿 / 編集 / 削除</strong> ボタンで
        募集を管理します。同じパネルからの投稿は1件までです。
      </p>
      <ul>
        <li>投稿された募集の <strong>立候補</strong> ボタンから立候補できます</li>
        <li>アピール文必須の設定では、立候補時にアピール文の入力が必要です</li>
        <li><strong>辞退</strong> ボタンは立候補した本人のみ操作できます</li>
        <li>複数立候補禁止の設定では、2件目以降の立候補はできません</li>
        <li>立候補は通知対象へ DM / スレッド / DM→スレッド で通知されます</li>
      </ul>

      <h2>プリセット上限</h2>
      <p>
        作成できるプリセット数はサーバーのプレミアム状態で変わります。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>種類</th>
            <th>無料</th>
            <th>プレミアム</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>裏募集設定（募集プリセット）</td>
            <td>5</td>
            <td>20</td>
          </tr>
          <tr>
            <td>裏募集パネル設定（パネルプリセット）</td>
            <td>3</td>
            <td>10</td>
          </tr>
        </tbody>
      </table></div>

      <h2>注意事項</h2>

      <div class="alert alert-warning">
        <p><strong>⚠️ DM 通知:</strong> DM で通知する場合、通知対象のユーザーが
        DM を受信できる設定になっている必要があります。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ スレッド通知:</strong> スレッド通知は、募集投稿チャンネルに
        スレッドを作成できる権限（スレッド作成）が必要です。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ ロールの並び:</strong> Bot のロールは、通知メンションで
        使用するロールより上位に配置してください。下位の場合、メンションが
        正しく表示されないことがあります。</p>
      </div>

      <div class="alert alert-danger">
        <p><strong>🚫 権限:</strong> どちらのコマンドも <strong>管理者</strong> のみ
        実行できます。パネルの設置・削除には、対象チャンネルへの
        メッセージ送信権限が必要です。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
