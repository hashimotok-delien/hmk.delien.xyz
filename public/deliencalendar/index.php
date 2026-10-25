<?php
/**
 * DeLien Calendar 紹介ページ（ランディング）
 *
 * 文言・リンクは assets/include/config.php で一元管理する。
 * スタイルはこのページ内にインラインで持つ（法務ページは assets/css/style.css）。
 */
require __DIR__ . '/assets/include/config.php';

$h = static fn (string $value): string => htmlspecialchars($value, ENT_QUOTES, 'UTF-8');

// アセットのキャッシュ破棄用（更新時刻を付ける）
$asset = static fn (string $path): string => (string) (@filemtime(__DIR__ . $path) ?: time());

// このページ自身の絶対URL（OGP用）
$scheme = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off') ? 'https' : 'http';
$host   = $_SERVER['HTTP_HOST'] ?? 'calendar.delien.xyz';
$dir    = rtrim(str_replace('\\', '/', dirname($_SERVER['SCRIPT_NAME'] ?? '/')), '/');
$siteUrl = $scheme . '://' . $host . $dir;

$description = 'DeLien Calendar は Discord アカウントでログインして使う予定管理システム。Google カレンダー風の月／週／日／年表示、公開カレンダーの共有、日本の祝日、Discord 通知、Windows アプリのアラームに対応します。';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $h($PRODUCT_NAME) ?> | <?= $h($SITE_OWNER) ?></title>
<meta name="description" content="<?= $h($description) ?>">
<link rel="canonical" href="<?= $h($siteUrl) ?>/">

<meta property="og:type" content="website">
<meta property="og:site_name" content="<?= $h($PRODUCT_NAME) ?>">
<meta property="og:title" content="<?= $h($PRODUCT_NAME) ?>">
<meta property="og:description" content="<?= $h($description) ?>">
<meta property="og:url" content="<?= $h($siteUrl) ?>/">
<meta property="og:image" content="<?= $h($siteUrl) ?>/assets/img/ogp.png">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" href="assets/img/favicon.ico?v=<?= $asset('/assets/img/favicon.ico') ?>" sizes="any">
<link rel="icon" type="image/png" sizes="32x32" href="assets/img/favicon-32x32.png?v=<?= $asset('/assets/img/favicon-32x32.png') ?>">
<link rel="icon" type="image/png" sizes="16x16" href="assets/img/favicon-16x16.png?v=<?= $asset('/assets/img/favicon-16x16.png') ?>">
<link rel="icon" type="image/png" sizes="192x192" href="assets/img/icon-192.png?v=<?= $asset('/assets/img/icon-192.png') ?>">
<link rel="apple-touch-icon" href="assets/img/apple-touch-icon.png?v=<?= $asset('/assets/img/apple-touch-icon.png') ?>">

<style>
:root{
  --accent:#00e5ff;
  --accent-dark:#00bcd4;
  --bg:#0a0a0f;
  --card-bg:rgba(18,18,26,0.7);
  --text:#e0e0e0;
  --text-dim:#8888aa;
}

*{box-sizing:border-box;}

body{
  margin:0;
  font-family:'Noto Sans JP','Hiragino Sans','Hiragino Kaku Gothic ProN','Yu Gothic UI','Meiryo',system-ui,sans-serif;
  background:var(--bg);
  color:var(--text);
  overflow-x:hidden;
}

a{
  color:var(--accent);
  text-decoration:none;
}

a:hover{
  text-decoration:underline;
}

/* 背景アニメ */
body::before{
  content:"";
  position:fixed;
  width:200%;
  height:200%;
  background:
    radial-gradient(circle at 20% 20%, rgba(0,229,255,0.15), transparent),
    radial-gradient(circle at 80% 80%, rgba(0,229,255,0.1), transparent);
  animation:moveBg 15s linear infinite alternate;
  z-index:-1;
  pointer-events:none;
}

@keyframes moveBg{
  from{transform:translate(0,0);}
  to{transform:translate(-80px,-80px);}
}

/* 走査線っぽい質感 */
body::after{
  content:"";
  position:fixed;
  width:100%;
  height:100%;
  background:linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px);
  background-size:100% 3px;
  pointer-events:none;
}

/* 上部ナビ */
.topnav{
  display:flex;
  align-items:center;
  justify-content:space-between;
  gap:16px;
  max-width:1100px;
  margin:0 auto;
  padding:18px 20px;
}

.topnav .brand{
  display:flex;
  align-items:center;
  gap:10px;
  font-weight:700;
  color:var(--text);
}

.topnav .brand img{
  width:28px;
  height:28px;
  border-radius:8px;
}

.topnav nav{
  display:flex;
  align-items:center;
  gap:18px;
  flex-wrap:wrap;
  font-size:0.9rem;
}

.topnav nav a{
  color:var(--text-dim);
  transition:0.2s;
}

.topnav nav a:hover{
  color:var(--accent);
  text-decoration:none;
}

.topnav nav a.back-link{
  padding:8px 14px;
  border:1px solid rgba(0,229,255,0.35);
  border-radius:999px;
  background:rgba(0,229,255,0.08);
  color:var(--text);
  font-weight:600;
}

.topnav nav a.back-link:hover{
  background:rgba(0,229,255,0.18);
  color:var(--text);
  text-decoration:none;
}

.topnav nav a.nav-cta{
  padding:8px 16px;
  border-radius:10px;
  background:linear-gradient(45deg,var(--accent),var(--accent-dark));
  color:#000;
  font-weight:700;
}

.topnav nav a.nav-cta:hover{
  color:#000;
  text-decoration:none;
  box-shadow:0 0 20px rgba(0,229,255,0.6);
}

/* ヘッダー */
header{
  min-height:calc(100vh - 70px);
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
  gap:10px;
  padding:40px 20px 80px;
}

header img{
  width:120px;
  height:120px;
  border-radius:24px;
  animation:float 4s ease-in-out infinite;
  box-shadow:0 0 30px rgba(0,229,255,0.7);
}

@keyframes float{
  0%{transform:translateY(0);}
  50%{transform:translateY(-15px);}
  100%{transform:translateY(0);}
}

h1{
  font-family:'Orbitron',system-ui,-apple-system,'Segoe UI',sans-serif;
  font-size:2.8rem;
  letter-spacing:0.02em;
  margin:0;
  text-shadow:0 0 20px rgba(0,229,255,0.6);
}

.tagline{
  color:var(--accent);
  font-size:1.2rem;
  margin:0;
}

.benefit{
  opacity:0.8;
  margin:0;
}

.hero-actions{
  display:flex;
  gap:12px;
  flex-wrap:wrap;
  justify-content:center;
  margin-top:24px;
}

/* ボタン */
.btn{
  display:inline-block;
  padding:14px 28px;
  background:linear-gradient(45deg,var(--accent),var(--accent-dark));
  color:#000;
  border-radius:12px;
  font-weight:bold;
  text-decoration:none;
  transition:0.3s;
}

.btn:hover{
  transform:scale(1.08);
  box-shadow:0 0 30px rgba(0,229,255,0.8);
  text-decoration:none;
}

.btn-ghost{
  background:transparent;
  border:1px solid rgba(0,229,255,0.45);
  color:var(--accent);
}

.btn-ghost:hover{
  background:rgba(0,229,255,0.12);
  box-shadow:0 0 24px rgba(0,229,255,0.35);
  color:var(--accent);
}

/* セクション */
section{
  max-width:1000px;
  margin:auto;
  padding:100px 20px;
  opacity:0;
  transform:translateY(40px);
  transition:0.8s;
}

section.active{
  opacity:1;
  transform:translateY(0);
}

h2{
  border-left:4px solid var(--accent);
  padding-left:10px;
  margin:0 0 30px;
}

.lead{
  color:var(--text-dim);
  line-height:1.9;
  margin:0 0 24px;
}

/* グリッド */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:25px;
}

/* カード */
.card{
  background:var(--card-bg);
  backdrop-filter:blur(15px);
  padding:25px;
  border-radius:18px;
  transition:0.3s;
  border:1px solid rgba(0,229,255,0.1);
}

.card:hover{
  transform:translateY(-8px) scale(1.02);
  box-shadow:0 0 30px rgba(0,229,255,0.25);
}

.card h3{
  margin:0 0 10px;
  font-size:1.1rem;
}

.card p{
  margin:0;
  line-height:1.8;
}

.category{
  color:var(--accent);
  margin-bottom:10px;
  font-weight:bold;
}

code{
  font-family:Consolas,'Courier New',monospace;
  background:rgba(0,229,255,0.1);
  color:var(--accent);
  padding:2px 6px;
  border-radius:4px;
  font-size:0.9em;
}

.role{
  display:flex;
  gap:10px;
  padding:6px 0;
  border-bottom:1px solid rgba(0,229,255,0.1);
}

.role:last-child{
  border-bottom:none;
}

.role span:first-child{
  min-width:110px;
  color:var(--accent);
}

/* 手順 */
.steps{
  counter-reset:step;
  display:grid;
  gap:14px;
  list-style:none;
  padding:0;
  margin:0;
}

.step{
  display:flex;
  gap:16px;
  background:var(--card-bg);
  border:1px solid rgba(0,229,255,0.1);
  border-radius:16px;
  padding:20px 22px;
}

.step::before{
  counter-increment:step;
  content:counter(step);
  flex:0 0 32px;
  height:32px;
  border-radius:50%;
  background:rgba(0,229,255,0.15);
  color:var(--accent);
  display:flex;
  align-items:center;
  justify-content:center;
  font-weight:700;
}

.step h3{
  margin:0 0 6px;
  font-size:1rem;
}

.step p{
  margin:0;
  color:var(--text-dim);
  font-size:0.92rem;
  line-height:1.8;
}

/* スペック表 */
.specs{
  list-style:none;
  padding:0;
  margin:20px 0 0;
  font-size:0.92rem;
}

.specs li{
  display:flex;
  gap:12px;
  padding:10px 0;
  border-bottom:1px solid rgba(0,229,255,0.1);
}

.specs li:last-child{
  border-bottom:none;
}

.specs strong{
  min-width:160px;
  color:var(--accent);
  font-weight:600;
}

.specs span{
  color:var(--text-dim);
}

/* 固定CTA */
.fixed-cta{
  position:fixed;
  bottom:20px;
  right:20px;
  z-index:999;
}

/* フッター */
.site-footer{
  max-width:1000px;
  margin:0 auto;
  padding:20px 20px 100px;
  text-align:center;
  color:var(--text-dim);
  font-size:0.85rem;
  line-height:2;
}

.footer-links{
  display:flex;
  gap:8px 18px;
  justify-content:center;
  flex-wrap:wrap;
  margin-bottom:8px;
}

.site-footer a{
  color:var(--text-dim);
}

.site-footer a:hover{
  color:var(--accent);
}

/* スクロールバー */
::-webkit-scrollbar{
  width:8px;
}
::-webkit-scrollbar-thumb{
  background:var(--accent);
  border-radius:10px;
}

#progress-bar{
  position:fixed;
  top:0;
  left:0;
  height:3px;
  width:0%;
  background:var(--accent);
  z-index:9999;
  box-shadow:0 0 10px var(--accent);
}

#page-transition{
  position:fixed;
  width:100%;
  height:100%;
  top:0;
  left:0;
  background:var(--bg);
  transform:scaleY(0);
  transform-origin:bottom;
  z-index:99999;
  filter:blur(10px);
  pointer-events:none;
  transition:transform 0.5s ease, filter 0.5s ease;
}

@media (max-width:600px){
  h1{
    font-size:1.8rem;
  }

  header img{
    width:90px;
    height:90px;
  }

  section{
    padding:70px 20px;
  }

  .role{
    flex-direction:column;
    gap:2px;
  }

  .topnav{
    flex-direction:column;
    gap:10px;
  }

  .specs li{
    flex-direction:column;
    gap:2px;
  }
}

@media (prefers-reduced-motion:reduce){
  *{
    animation:none !important;
    transition:none !important;
  }

  section{
    opacity:1;
    transform:none;
  }
}
</style>
</head>
<body id="top">
<div id="page-transition"></div>
<div id="progress-bar"></div>

<div class="topnav">
  <div class="brand">
    <img src="assets/img/icon-192.png?v=<?= $asset('/assets/img/icon-192.png') ?>" alt="" width="28" height="28" decoding="async">
    <?= $h($PRODUCT_EMOJI) ?> <?= $h($PRODUCT_NAME) ?>
  </div>
  <nav>
    <a class="back-link" href="../">← ポートフォリオ</a>
    <a href="#features">機能</a>
    <a href="#sharing">公開設定</a>
    <a href="#desktop">Windowsアプリ</a>
    <a href="<?= $h($DOCS_URL) ?>" target="_blank" rel="noopener">ドキュメント</a>
    <a class="nav-cta" href="<?= $h($APP_URL) ?>" target="_blank" rel="noopener">開く</a>
  </nav>
</div>

<header>
  <img src="assets/img/icon-192.png?v=<?= $asset('/assets/img/icon-192.png') ?>" alt="<?= $h($PRODUCT_NAME) ?> のアイコン" width="120" height="120" decoding="async">
  <h1><?= $h($PRODUCT_NAME) ?></h1>
  <p class="tagline">予定管理を、みんなで回せるカレンダーへ</p>
  <p class="benefit">Googleカレンダー風の予定管理システム ／ calendar.delien.xyz</p>
  <div class="hero-actions">
    <a class="btn" href="<?= $h($APP_URL) ?>" target="_blank" rel="noopener">カレンダーを開く</a>
    <a class="btn btn-ghost" href="#desktop">Windowsアプリを見る</a>
    <a class="btn btn-ghost" href="<?= $h($DOCS_URL) ?>" target="_blank" rel="noopener">開発者ドキュメント</a>
  </div>
</header>

<main>

<section id="features">
  <h2>💡 何ができる？</h2>
  <div class="grid">
    <div class="card">
      <h3>🗓 カレンダー表示</h3>
      <p>月／週／日／年の4表示に対応。複数日にまたがる予定はバーで表示し、ワンクリックで「予定あり」表示に切り替えられます。</p>
    </div>
    <div class="card">
      <h3>📌 予定管理</h3>
      <p>タイトル・日時・終日・説明・色を設定。複数期間の親予定の中にサブ予定（途中予定）を登録できます。</p>
    </div>
    <div class="card">
      <h3>✅ 終わった／再開</h3>
      <p>開催中の予定を一覧の強調表示から外せます（削除はされません）。間違えたら「再開」でいつでも復帰。</p>
    </div>
    <div class="card">
      <h3>🔗 公開URL</h3>
      <p><code>/c/{slug}</code> で共有。公開カレンダーは「マイカレンダーに登録」で自分のトップに追加できます。</p>
    </div>
    <div class="card">
      <h3>🖼 カレンダー画像</h3>
      <p>月表示を PNG で出力。ブラウザで生成した画像はそのままクリップボードへコピーでき、Discord に貼るとプレビュー表示されます。</p>
    </div>
    <div class="card">
      <h3>🇯🇵 日本の祝日</h3>
      <p>固定日・ハッピーマンデー・春分／秋分・振替休日を計算して表示（1949〜2099年）。</p>
    </div>
    <div class="card">
      <h3>🌗 ダークモード</h3>
      <p>ライト／ダークをボタンで切り替え。初回は OS の設定に追従し、選んだテーマは端末に保存されます。</p>
    </div>
    <div class="card">
      <h3>👀 カレンダー間フォロー</h3>
      <p>他のカレンダーを「予定あり」だけの状態で自カレンダーに合成表示。空き時間の共有に使えます。</p>
    </div>
    <div class="card">
      <h3>🔔 通知</h3>
      <p>登録・編集・削除・開始前リマインドを Discord Bot が配信。Windows アプリならトーストやアラームでも通知できます。</p>
    </div>
  </div>
</section>

<section id="sharing">
  <h2>🔐 公開設定は3段階</h2>
  <div class="grid">
    <div class="card">
      <div class="category">🔒 非公開</div>
      <p>ログイン必須。作成者のみ閲覧できる。</p>
    </div>
    <div class="card">
      <div class="category">🔓 限定公開</div>
      <p>ログイン必須。作成者＋招待メンバーのみ閲覧できる。</p>
    </div>
    <div class="card">
      <div class="category">🌐 公開</div>
      <p>ログイン不要。誰でも詳細まで閲覧できる。</p>
    </div>
    <div class="card">
      <div class="category">👁 内容を隠して公開</div>
      <p>非公開・限定公開に付与できるオプション。予定は「予定あり」とだけ表示され、詳細は非表示になる。</p>
    </div>
  </div>
</section>

<section id="members">
  <h2>👥 メンバー権限</h2>
  <div class="card">
    <div class="role"><span>👑 作成者</span><span>全操作（メンバー管理・設定・全予定の編集）</span></div>
    <div class="role"><span>🛡 管理者</span><span>メンバー管理・設定変更・全予定の編集</span></div>
    <div class="role"><span>✍️ 編集者</span><span>全予定の作成・編集</span></div>
    <div class="role"><span>👤 メンバー</span><span>自分の予定の作成・編集</span></div>
    <div class="role"><span>👁 閲覧者</span><span>閲覧のみ</span></div>
  </div>
</section>

<section id="desktop">
  <h2>💻 Windows デスクトップアプリ</h2>
  <p class="lead">ブラウザ版と同じ画面をそのまま使える常駐アプリです。Windows ネイティブの通知とアラームを追加し、予定の開始を逃しません。</p>
  <div class="grid">
    <div class="card">
      <h3>🖥 タスクトレイ常駐</h3>
      <p>タスクトレイに常駐し、Windows サインイン時に自動起動。「カレンダー」と「設定」をアプリ内タブで切り替えられます。</p>
    </div>
    <div class="card">
      <h3>⏰ トースト／アラーム／サイレント</h3>
      <p>予定の開始 N 分前（既定15分）に通知。通知音はプリセットのほか、任意の WAV / MP3 / M4A も指定できます。</p>
    </div>
    <div class="card">
      <h3>🔌 アプリ未起動でも鳴る</h3>
      <p>Windows タスクスケジューラに登録するため、アプリを終了していてもアラームが発火します。</p>
    </div>
    <div class="card">
      <h3>🔄 予定変更に追従</h3>
      <p>15分間隔のヘッドレス同期でアラーム時刻を自動更新。新しいバージョンがあればアプリ内で更新できます。</p>
    </div>
    <div class="card">
      <h3>🎧 再生デバイスを指定</h3>
      <p>スピーカー／ヘッドホンなど出力先を選択可能。通知対象のカレンダーやリマインド時刻は PC ごとに設定できます。</p>
    </div>
    <div class="card">
      <h3>🔒 閲覧のみの端末トークン</h3>
      <p>端末トークンの権限は <code>calendars:read</code> のみ。予定の改変はできず、いつでも失効できます。</p>
    </div>
  </div>

  <ul class="specs">
    <li><strong>対応OS</strong><span>Windows 10 1809 以降 / Windows 11</span></li>
    <li><strong>ランタイム</strong><span>.NET 8 デスクトップランタイム</span></li>
    <li><strong>WebView2</strong><span>Microsoft Edge WebView2 ランタイム（Windows 11 は標準搭載）</span></li>
  </ul>

  <div class="hero-actions" style="justify-content:flex-start; margin-top:28px;">
    <a class="btn" href="<?= $h($APP_DOWNLOAD_URL) ?>" target="_blank" rel="noopener">Windows版をダウンロード</a>
  </div>
</section>

<section id="security">
  <h2>🛡 安心して使える設計</h2>
  <div class="grid">
    <div class="card">
      <h3>🍪 Cookie同意</h3>
      <p>初回訪問時に同意バナーを表示。「必須のみ」を選ぶと任意 Cookie は発行されず、発行済みトークンも削除される。</p>
    </div>
    <div class="card">
      <h3>🔑 APIトークン権限</h3>
      <p>トークンごとに参照できるカレンダーと閲覧／編集権限を設定。発行・失効はカレンダー作成者のみ。</p>
    </div>
    <div class="card">
      <h3>🔐 判定はすべてサーバー側</h3>
      <p>閲覧範囲や秘匿予定の判定はリクエストごとにサーバーで評価。クライアントを改変しても見える範囲は変わりません。</p>
    </div>
    <div class="card">
      <h3>🎨 読みやすさの自動調整</h3>
      <p>グループ色に対して文字色・リンク色を自動補正。コントラスト不足でも見えなくならない。</p>
    </div>
    <div class="card">
      <h3>📄 プライバシーポリシー</h3>
      <p>Cookie・保存期間・外部サービスを <a href="privacy">プライバシーポリシー</a> に明記。</p>
    </div>
  </div>
</section>

<section id="stack">
  <h2>🧩 技術スタック</h2>
  <div class="grid">
    <div class="card">PHP 8（フレームワークなし）</div>
    <div class="card">MySQL（PDO）</div>
    <div class="card">Discord OAuth2 認証</div>
    <div class="card">SCSS → CSS</div>
    <div class="card">REST API（<code>/api/v1</code>）</div>
    <div class="card">.NET 8 + WebView2（Windowsアプリ）</div>
  </div>
</section>

<section id="getting-started">
  <h2>🚀 はじめかた</h2>
  <ol class="steps">
    <li class="step">
      <div>
        <h3>Discord でログイン</h3>
        <p>アカウント登録は不要。Discord のアカウントでそのままログインします。</p>
      </div>
    </li>
    <li class="step">
      <div>
        <h3>カレンダーを作成</h3>
        <p>グループ名・色・公開範囲（非公開／限定公開／公開）を決めて作成します。</p>
      </div>
    </li>
    <li class="step">
      <div>
        <h3>メンバーを招待</h3>
        <p>Discord ID またはユーザー名で招待し、権限（管理者・編集者・メンバー・閲覧者）を割り当てます。</p>
      </div>
    </li>
    <li class="step">
      <div>
        <h3>予定を登録して共有</h3>
        <p>公開URL・カレンダー画像・Discord 通知など、相手に合わせた方法で予定を届けられます。</p>
      </div>
    </li>
  </ol>

  <div class="hero-actions" style="justify-content:flex-start; margin-top:32px;">
    <a class="btn" href="<?= $h($APP_URL) ?>" target="_blank" rel="noopener">カレンダーを開く</a>
    <a class="btn btn-ghost" href="<?= $h($APP_DOWNLOAD_URL) ?>" target="_blank" rel="noopener">Windows版アプリ</a>
  </div>
</section>

</main>

<div class="fixed-cta">
  <a href="<?= $h($APP_URL) ?>" class="btn" target="_blank" rel="noopener">カレンダー</a>
</div>

<footer class="site-footer">
  <div class="footer-links">
    <a href="<?= $h($DOCS_URL) ?>" target="_blank" rel="noopener">ドキュメント</a>
    <a href="privacy">プライバシーポリシー</a>
    <a href="terms">利用規約</a>
    <a href="<?= $h($SUPPORT_URL) ?>" target="_blank" rel="noopener"><?= $h($SUPPORT_LABEL) ?></a>
  </div>
  <p>© <?= date('Y') ?> <a href="<?= $h($COPYRIGHT_URL) ?>" target="_blank" rel="noopener"><?= $h($COPYRIGHT_HOLDER) ?></a> — <?= $h($PRODUCT_NAME) ?></p>
</footer>

<script>
const sections = document.querySelectorAll("section");
const observer = new IntersectionObserver((entries) => {
  entries.forEach((entry) => {
    if (entry.isIntersecting) entry.target.classList.add("active");
  });
}, { threshold: 0.15 });
sections.forEach((section) => observer.observe(section));

const progressBar = document.getElementById("progress-bar");
let scrollRange = 0;
let scrollFrame = 0;

const measureScrollRange = () => {
  scrollRange = document.documentElement.scrollHeight - window.innerHeight;
};
measureScrollRange();
window.addEventListener("load", measureScrollRange);
window.addEventListener("resize", measureScrollRange, { passive: true });

window.addEventListener("scroll", () => {
  if (scrollFrame) return;

  scrollFrame = requestAnimationFrame(() => {
    scrollFrame = 0;
    const y = window.scrollY;
    progressBar.style.width = (scrollRange > 0 ? (y / scrollRange) * 100 : 0) + "%";
  });
}, { passive: true });

// サイト内リンクだけページ遷移アニメを挟む
const overlay = document.getElementById("page-transition");
document.querySelectorAll("a[href]").forEach((link) => {
  const href = link.getAttribute("href");
  if (!href || href.startsWith("#") || link.target) return;
  if (/^[a-z]+:/i.test(href)) return;

  link.addEventListener("click", (event) => {
    event.preventDefault();
    overlay.style.pointerEvents = "auto";
    overlay.style.transform = "scaleY(1)";

    setTimeout(() => {
      window.location = href;
    }, 450);
  });
});
</script>

</body>
</html>
