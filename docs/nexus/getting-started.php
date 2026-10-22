<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '導入方法 - ねくさす⋆˚ʚɞ ドキュメント'; ?>
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
        ねくさす⋆˚ʚɞ をサーバーに導入し、各機能を使い始めるまでの手順を説明します。
      </p>

      <h2>導入の流れ</h2>
      <p>
        この Bot は 𝐌𝐚𝐠𝐢𝐜 𝐏𝐨𝐫𝐭𝐚𝐥 専用の Bot です。導入をご希望の場合は、
        <strong>𝐌𝐚𝐠𝐢𝐜 𝐏𝐨𝐫𝐭𝐚𝐥 に問い合わせてください。</strong>
      </p>

      <div class="alert alert-info">
        <p><strong>💡 注意:</strong> ねくさす⋆˚ʚɞ は専用 Bot です。導入方法や費用・利用条件については 𝐌𝐚𝐠𝐢𝐜 𝐏𝐨𝐫𝐭𝐚𝐥 までお問い合わせください。</p>
      </div>

      <h2>初期設定</h2>
      <p>
        Bot が参加したら、利用する機能ごとに設定を行います。
        いずれの設定コマンドも<strong>管理者権限</strong>が必要です。
      </p>

      <h3>1. プロフィール機能の設定</h3>
      <pre><code>/プロフ設定</code></pre>
      <p>
        プロフィール保存機能の設定パネルが表示されます。
        プロフチャンネルや操作可能ロールなどを設定します。
      </p>

      <h3>2. マイプロフ（鯖間プロフ）の設定</h3>
      <pre><code>/マイプロフ設定</code></pre>
      <p>
        プロフの送信方法（DM / プライベートスレッド）や、
        鯖間での取得・保存の可否をプリセット単位で設定できます。
        設定後は <code>/マイプロフパネル設置</code> でパネルをチャンネルに設置します。
      </p>

      <h3>3. 交流計測の初期設定</h3>
      <pre><code>/交流計測v2 設定</code></pre>
      <p>
        最初に「⚙ 初期設定」で<strong>男性ロール・女性ロール</strong>（任意で全員ロール）を登録します。
        性別を判定するための必須設定です。
        そのうえで「設定ファイル」を作成し、計測対象の VC・カテゴリや計測条件を指定します。
      </p>
      <div class="alert alert-info">
        <p><strong>💡 ベータ提供について:</strong>
        <code>/交流計測v2</code> は現在ベータ導入サーバーでのみ利用できます。
        表示されない場合は従来版の <code>/交流計測設定</code> をご利用ください。</p>
      </div>
      <p>
        <a href="features/exchange-measure">交流計測の詳しい設定方法 →</a>
      </p>

      <h3>4. ランクシステムの設定</h3>
      <pre><code>/ランク設定</code></pre>
      <p>
        プリセットを作成し、VC XP の付与量・成長曲線・ランクロールなどを設定します。
        設定したプリセットのうち<strong>⭐ メイン設定</strong>にしたものが
        <code>/ランク</code> の表示対象になります。
      </p>
      <p>
        <a href="features/rank">ランクシステムの詳しい設定方法 →</a>
      </p>

      <h2>必要な権限</h2>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>機能</th><th>Bot に必要な主な権限</th></tr>
        </thead>
        <tbody>
          <tr><td>プロフィール保存</td><td>メッセージ履歴の閲覧、メッセージの送信</td></tr>
          <tr><td>マイプロフ</td><td>メッセージの送信、プライベートスレッドの作成、（DM 送信）</td></tr>
          <tr><td>交流計測</td><td>VC の閲覧（メンバー一覧の取得）</td></tr>
          <tr><td>ランクシステム</td><td>VC の閲覧、メッセージの送信、ロールの管理（ロール付与を使う場合）</td></tr>
        </tbody>
      </table></div>

      <div class="alert alert-warning">
        <p><strong>⚠️ 権限について:</strong>
        権限が不足していると、計測や通知が行われないままエラーも表示されない場合があります。
        設定後は必ず <code>/ランク</code> や記録パネルで動作確認してください。</p>
      </div>

      <div class="card-grid" style="margin-top: 32px;">
        <div class="card">
          <h3>💬 交流計測</h3>
          <p>VC での交流人数を計測・ランキング化します。</p>
          <a href="features/exchange-measure">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🏆 ランクシステム</h3>
          <p>VC 滞在時間に応じたレベルアップを設定します。</p>
          <a href="features/rank">設定方法 →</a>
        </div>
        <div class="card">
          <h3>❓ 困ったときは</h3>
          <p>よくある質問と、現在確認されている不具合をまとめています。</p>
          <a href="faq">FAQ を見る →</a>
        </div>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>

</body>
</html>
