<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'サーバー運営ツール - 兄弟Bot ドキュメント'; $PAGE_DESCRIPTION = 'VC管理・ロール管理・自動リアクション・投稿者設定・Bot管理など、サーバー運営に使うツールを説明します。'; ?>
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
        <div class="feature-icon">🛠️</div>
        <h1>サーバー運営ツール</h1>
        <p>VC・ロール・リアクション・投稿者をまとめて管理。</p>
      </div>

      <h2>概要</h2>
      <p>
        イベント機能以外に、日常的なサーバー運営を助けるコマンドをまとめて提供しています。
      </p>

      <h2>VC 管理</h2>

      <h3>VC を一括作成する</h3>
      <pre><code>/イベルーム管理 category_1:@カテゴリ size:5 channel_name:個室 user_limit:0</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><code>category_1</code> 〜 <code>category_3</code></td><td>対象カテゴリー（任意・最大3つ）</td></tr>
          <tr><td><code>size</code></td><td>作成するVCの数。0 を指定すると削除のみ行います</td></tr>
          <tr><td><code>channel_name</code></td><td>チャンネル名（任意・同名が既にあれば無視）</td></tr>
          <tr><td><code>user_limit</code></td><td>ユーザー制限（0 は無制限）</td></tr>
        </tbody>
      </table></div>

      <h3>VC をまとめて削除する</h3>
      <pre><code>/vc削除コマンド</code></pre>
      <p>
        カテゴリーを選択すると、その中の VC をページ単位で選んで削除できます。
        管理者専用です。
      </p>

      <h2>ロール管理</h2>

      <h3>VC 参加者にロールを付与する</h3>
      <pre><code>/vcロール付与 role:@ロール</code></pre>
      <p>VC に参加しているメンバーへロールを付与します。</p>

      <h3>ロールの不足者を確認する</h3>
      <pre><code>/vcロール確認 role:@ロール</code></pre>
      <p>指定したロールを持っていないメンバーを一覧表示します。</p>

      <h3>全員にロールを付与／削除する</h3>
      <pre><code>/全員ロール付与 role:@ロール filter_has_role1:@条件
/全員ロール削除 role:@ロール bot:false</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr><td><code>role</code></td><td>対象のロール（必須）</td></tr>
          <tr><td><code>filter_has_role1</code> / <code>filter_has_role2</code></td><td>付与対象の絞り込みロール（任意）</td></tr>
          <tr><td><code>bot</code></td><td>削除時に Bot も対象へ含めるか（任意・既定 OFF）</td></tr>
        </tbody>
      </table></div>

      <div class="alert alert-warning">
        <p>
          <strong>⚠️ 注意:</strong>
          全員へのロール付与・削除はサーバー全体に影響します。
          実行前に、必ず対象範囲を確認してください。
        </p>
      </div>

      <h2>自動リアクション</h2>
      <pre><code>/自動リアクション arg:登録 emoji1:👍 emoji2:🎉</code></pre>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th style="width: 200px;">引数</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td><code>arg</code></td>
            <td><code>登録</code> / <code>確認</code> / <code>削除</code> / <code>計測</code>（必須）</td>
          </tr>
          <tr>
            <td><code>emoji1</code> 〜 <code>emoji12</code></td>
            <td>登録する絵文字（任意・最大12個）</td>
          </tr>
        </tbody>
      </table></div>
      <p>
        <code>計測</code> を指定すると、自動リアクションの利用状況を集計できます。
      </p>

      <h2>投稿者プリセット</h2>
      <pre><code>/投稿者設定</code></pre>
      <p>
        スティッキーメッセージなどで使う「投稿者」のプリセットを作成・編集・削除します。
        表示名・アイコンURL・アップロード画像を登録でき、設定時に使い回せます。
      </p>

      <h2>モデレーター設定</h2>
      <pre><code>/モデレーター設定 role:@モデレーター</code></pre>
      <p>
        VCイベント系のコマンドを実行できるロールを登録します。
        イベント運営を担当するスタッフに付与してください。
      </p>

      <h2>Bot 管理</h2>
      <pre><code>/bot管理</code></pre>
      <p>
        Bot が導入されているサーバーの一覧を表示し、必要に応じてサーバーから退出させられます。
      </p>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
