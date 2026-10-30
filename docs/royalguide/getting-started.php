<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '導入方法 - RoyalGuide ドキュメント'; ?>
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
        RoyalGuide をサーバーに導入し、使い始めるまでの手順を説明します。
      </p>

      <h2>導入の流れ</h2>
      <ol class="steps">
        <li>
          <strong>Bot を招待する</strong>
          サポートサーバーに参加し、案内に従って Bot を自分のサーバーへ招待します。
          <br>
          <a href="https://discord.gg/AmMkFhhD2D" class="btn btn-outline" style="margin-top: 8px;" target="_blank">サポートサーバーへ</a>
        </li>
        <li>
          <strong>権限を確認する</strong>
          Bot に「チャンネルを見る」「メッセージを送信」「スラッシュコマンドを使用」
          を付与します。音楽再生を使う場合は「ボイスチャンネルに接続」も必要です。
        </li>
        <li>
          <strong>保存先チャンネルを設定する</strong>
          <code>/基本設定</code> を実行し、グローバルチャンネルを決めれば準備完了です。
        </li>
      </ol>

      <div class="alert alert-info">
        <p><strong>💡 注意:</strong> Bot はメッセージ本文を扱う機能を持つため、導入には
        「メッセージコンテンツ」インテントの有効化が必要です。すでに有効になっている
        サーバーでは追加の操作は不要です。</p>
      </div>

      <h2>初期設定</h2>
      <p>導入後は、以下の設定を行ってください。</p>

      <h3>1. 基本設定を開く</h3>
      <pre><code>/基本設定</code></pre>
      <p>
        サーバー管理者のみ実行できます。パネルのボタンから設定したい項目を選び、
        保存先のチャンネルを指定します。
      </p>

      <h3>2. 保存先チャンネルを決める</h3>
      <ul>
        <li><strong>🌐 グローバルチャンネル</strong> — 全機能のデフォルト保存先</li>
        <li><strong>📁 投稿者設定チャンネル</strong> — 投稿者設定でアップロードした画像の保存先</li>
      </ul>
      <p>
        個別の設定が未設定の場合、グローバルチャンネルが使われます。
        グローバルも未設定の場合は機能ごとの既定値が使われます。
      </p>

      <h3>3. 各機能の詳細設定</h3>
      <p>
        各機能の詳しい使い方は、以下のページを参照してください。
      </p>

      <div class="card-grid" style="margin-top: 32px;">
        <div class="card">
          <h3>👤 投稿者プリセット</h3>
          <p>投稿者名・アイコンをプリセットとして登録し、投稿に使い回せます。</p>
          <a href="features/authors">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🗂 基本設定</h3>
          <p>保存先チャンネルの解決順序と設定項目をまとめています。</p>
          <a href="features/base-settings">設定方法 →</a>
        </div>
        <div class="card">
          <h3>🎧 SoundCloud 再生</h3>
          <p>ボイスチャンネルへの参加から再生・キュー操作まで。</p>
          <a href="features/soundcloud">使い方 →</a>
        </div>
        <div class="card">
          <h3>🗣 読み上げ</h3>
          <p>テキストチャンネルの投稿をVCで読み上げます。辞書で読みを調整できます。</p>
          <a href="features/read">使い方 →</a>
        </div>
        <div class="card">
          <h3>🔊 音声設定</h3>
          <p>音量・話者・話速の設定と、サーバー側の音声制御。</p>
          <a href="features/voice-settings">設定方法 →</a>
        </div>
      </div>

      <h3>4. 読み上げを使う場合（任意）</h3>
      <p>
        テキストチャンネルの投稿を読み上げるには、実行者がボイスチャンネルへ
        参加した状態で <code>/読み上げ開始</code> を実行します。
        音声や話速は <code>/音声設定</code> から変更できます。
      </p>
      <div class="alert alert-info">
        <p><strong>💡 ずんだもん等を使う場合:</strong> VOICEVOX Engine
        （既定 <code>http://127.0.0.1:50021</code>）を起動しておく必要があります。
        起動していない場合は edge-tts の既定音声で読み上げます。</p>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
