<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ロール同期 - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">🎭</div>
        <h1>ロール同期</h1>
        <p>連携元サーバーのロールを、連携先サーバーへ自動付与</p>
      </div>

      <div class="alert alert-info">
        <p><strong>🆕 新機能:</strong> この機能は <strong>v1.9.0</strong> で追加されました。</p>
      </div>

      <h2>概要</h2>
      <p>
        ロール同期機能は、連携元サーバー（メインサーバー）で保持しているロールを、
        連携先サーバー（サブサーバーなど）の対応するロールへ <strong>自動で付与</strong>
        する機能です。サーバー連携機能と組み合わせることで、メインサーバーのロール
        構成をそのままサブサーバーへ引き継げます。
      </p>
      <p>
        連携元サーバーでは「グループ」を作成してトークンを発行し、連携先サーバーでは
        そのトークンを使ってロールを紐づけます。以降、連携元のロールを持つメンバーが
        連携先サーバーへ参加すると、対応するロールが自動で付与されます。
      </p>

      <div class="alert alert-info">
        <p><strong>💡 ユースケース:</strong> メインサーバーで「本男」「本女」「学生」などの
        認証ロールを運用している場合、サブサーバーでも同じ意味のロールを
        自動で付与できます。</p>
      </div>

      <h2>機能詳細</h2>

      <h3>連携元サーバー（グループ管理）</h3>
      <p>
        他サーバーへ同期するロールを「グループ」単位でまとめて管理します。グループを
        作成するとトークンが発行され、このトークンを連携先サーバーの管理者へ渡します。
      </p>
      <ul>
        <li>グループごとに同期対象のロールを最大 <strong>60 個</strong> まで登録可能</li>
        <li>グループごとに有効／無効を切り替え可能</li>
        <li>トークンの再発行、グループ名の変更、削除に対応</li>
      </ul>

      <h3>連携先サーバー（リンク管理）</h3>
      <p>
        連携元サーバーのグループを「リンク」として取り込み、連携元のロールごとに
        対応させるロールを設定します。
      </p>
      <ul>
        <li>サーバー連携が成立している相手サーバーのみ指定可能</li>
        <li>連携元ロールと連携先ロールを1対1で紐づけ（最大 60 個）</li>
        <li>「優先付与ロール」を最大 <strong>40 個</strong> まで指定可能</li>
        <li>リンクごとに有効／無効を切り替え可能</li>
      </ul>

      <h3>自動同期</h3>
      <p>
        連携元のロールを持つメンバーが連携先サーバーへ参加した時点で、対応するロールを
        自動で付与します。連携先で既に持っている他のロールには影響しません。
      </p>
      <ul>
        <li>付与のみを行い、<strong>剥奪は行いません</strong></li>
        <li>変更が無いメンバーには API を実行しません</li>
        <li>既存メンバーへまとめて反映したい場合は「🔄 今すぐ同期」を使用</li>
      </ul>

      <h2>設定手順（連携元サーバー）</h2>

      <ol class="steps">
        <li>
          <strong>グループ管理パネルを開く</strong>
          <code>/ロール同期グループ</code> を実行（管理者専用）
        </li>
        <li>
          <strong>グループを作成</strong>
          「➕ 新規作成」でグループ名を入力し、表示された
          <strong>トークンをコピー</strong> します（再表示はできません）
        </li>
        <li>
          <strong>対象ロールを設定</strong>
          「🎭 対象ロール」で同期対象のロールを選択（最大 60 個）
        </li>
        <li>
          <strong>トークンを渡す</strong>
          コピーしたトークンを、連携先サーバーの管理者へ共有します
        </li>
      </ol>

      <h2>設定手順（連携先サーバー）</h2>

      <ol class="steps">
        <li>
          <strong>リンク管理パネルを開く</strong>
          <code>/ロール同期設定</code> を実行（管理者専用）
        </li>
        <li>
          <strong>リンクを作成</strong>
          「➕ 新規リンク」で <span class="tag tag-info">連携元サーバーID</span>
          と <span class="tag tag-info">グループトークン</span> を入力
        </li>
        <li>
          <strong>ロールを紐づけ</strong>
          「🔗 紐づけ」で連携元ロールごとに対応させるサーバーロールを選択
        </li>
        <li>
          <strong>優先付与ロールを設定（任意）</strong>
          「⭐ 優先ロール」で、付与上限に達した場合でも優先するロールを設定
        </li>
        <li>
          <strong>既存メンバーへ反映（任意）</strong>
          「🔄 今すぐ同期」で対象メンバーを一括同期
        </li>
      </ol>

      <h2>動作の流れ</h2>

      <ol class="steps">
        <li>
          <strong>メンバーが参加</strong>
          連携元サーバーのロールを持つメンバーが連携先サーバーへ参加
        </li>
        <li>
          <strong>付与ロールを判定</strong>
          保持ロールに紐づく連携先ロールを算出（優先付与ロールを優先）
        </li>
        <li>
          <strong>不足分のみ付与</strong>
          すでに保持している場合は何も行いません
        </li>
      </ol>

      <h2>コマンド</h2>

      <div class="command-block">
        <div class="cmd-name">/ロール同期グループ</div>
        <div class="cmd-desc">サーバー間ロール同期のグループを管理します（連携元用）。グループの作成・名前変更・対象ロール設定・トークン再発行・有効/無効・削除ができます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ロール同期設定</div>
        <div class="cmd-desc">他サーバーのロール同期グループとの紐づけを管理します（連携先用）。リンクの作成・ロールの紐づけ・優先付与ロール設定・有効/無効・今すぐ同期・削除ができます。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <div class="command-block">
        <div class="cmd-name">/ロール同期実行 [メンバー]</div>
        <div class="cmd-desc">ロール同期を手動で実行します。メンバーを指定しない場合は全対象メンバーを同期します。</div>
        <div class="cmd-meta"><span class="tag tag-admin">管理者専用</span></div>
      </div>

      <h2>上限値</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>項目</th>
            <th>上限</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>1グループの対象ロール数</td>
            <td>60 個</td>
          </tr>
          <tr>
            <td>1リンクの紐づけ数</td>
            <td>60 個</td>
          </tr>
          <tr>
            <td>優先付与ロール数</td>
            <td>40 個</td>
          </tr>
          <tr>
            <td>1メンバーへ付与するロール数</td>
            <td>60 個</td>
          </tr>
        </tbody>
      </table></div>

      <h2>注意事項</h2>

      <div class="alert alert-warning">
        <p><strong>⚠️ 付与のみ:</strong> この機能はロールの <strong>付与のみ</strong> を行います。
        連携元でロールを外しても、連携先で付与されたロールは自動では剥奪されません。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ トークンの取り扱い:</strong> トークンは作成時にしか表示されません。
        トークンを再発行しても、すでに作成済みのリンクはそのまま動作します。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>⚠️ ロール階層:</strong> Bot のロールが、付与対象のロールより上位にある
        必要があります。上位にないロールは付与できません。</p>
      </div>

      <div class="alert alert-danger">
        <p><strong>🚫 前提条件:</strong> 連携には <strong>サーバー連携</strong> が相互に
        成立している必要があります。また連携元・連携先の両方に Bot が参加している
        必要があります。</p>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
