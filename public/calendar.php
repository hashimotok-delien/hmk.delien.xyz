<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>DeLien Calendar | けい🤖</title>

<link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link rel="preload" as="style" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Noto+Sans+JP&display=swap" onload="this.onload=null;this.rel='stylesheet'">
<noscript><link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Orbitron:wght@400;700&family=Noto+Sans+JP&display=swap"></noscript>

<link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<link rel="shortcut icon" href="favicon.ico">
<link rel="apple-touch-icon" href="favicon.png">

<style>
body{
  margin:0;
  font-family:'Noto Sans JP',sans-serif;
  background:#0a0a0f;
  color:#e0e0e0;
  overflow-x:hidden;
}

/* 背景アニメ（強化版） */
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

/* ノイズっぽい線追加（IT感） */
body::after{
  content:"";
  position:fixed;
  width:100%;
  height:100%;
  background:linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px);
  background-size:100% 3px;
  pointer-events:none;
}

/* ヘッダー */
header{
  height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
  gap:10px;
}

header img{
  width:120px;
  border-radius:20px;
  animation:float 4s ease-in-out infinite;
  box-shadow:0 0 30px rgba(0,229,255,0.7);
}

@keyframes float{
  0%{transform:translateY(0);}
  50%{transform:translateY(-15px);}
  100%{transform:translateY(0);}
}

h1{
  font-family:'Orbitron';
  font-size:2.8rem;
  text-shadow:0 0 20px rgba(0,229,255,0.6);
}

.tagline{
  color:#00e5ff;
  font-size:1.2rem;
}

.benefit{
  opacity:0.8;
}

/* ボタン */
.btn{
  padding:14px 28px;
  background:linear-gradient(45deg,#00e5ff,#00bcd4);
  color:#000;
  border-radius:12px;
  font-weight:bold;
  text-decoration:none;
  transition:0.3s;
}

.btn:hover{
  transform:scale(1.08);
  box-shadow:0 0 30px rgba(0,229,255,0.8);
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
  border-left:4px solid #00e5ff;
  padding-left:10px;
  margin-bottom:30px;
}

/* グリッド */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:25px;
}

/* カード */
.card{
  background:rgba(18,18,26,0.7);
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
  color:#00e5ff;
  margin-bottom:10px;
  font-weight:bold;
}

code{
  font-family:Consolas,'Courier New',monospace;
  background:rgba(0,229,255,0.1);
  color:#00e5ff;
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
  color:#00e5ff;
}

/* 固定CTA */
.fixed-cta{
  position:fixed;
  bottom:20px;
  right:20px;
  z-index:999;
}

/* スクロールバー */
::-webkit-scrollbar{
  width:8px;
}
::-webkit-scrollbar-thumb{
  background:#00e5ff;
  border-radius:10px;
}

#progress-bar{
  position:fixed;
  top:0;
  left:0;
  height:3px;
  width:0%;
  background:#00e5ff;
  z-index:9999;
  box-shadow:0 0 10px #00e5ff;
}

#page-transition{
  position:fixed;
  width:100%;
  height:100%;
  top:0;
  left:0;
  background:#0a0a0f; /* 初期は黒 */
  transform:scaleY(0);
  transform-origin:bottom;
  z-index:99999;
  filter: blur(10px);
  pointer-events:none;
  transition: transform 0.5s ease, filter 0.5s ease;
}

@media (max-width:600px){
  h1{
    font-size:1.8rem;
  }

  header img{
    width:90px;
  }

  section{
    padding:70px 20px;
  }

  .role{
    flex-direction:column;
    gap:2px;
  }
}
</style>
</head>
<body>
<div id="page-transition"></div>
<div id="progress-bar"></div>

<header>
  <picture>
    <source srcset="assets/img/calendar_icon.webp?v=<?= @filemtime(__DIR__ . '/assets/img/calendar_icon.webp') ?: time() ?>" type="image/webp">
    <img src="assets/img/calendar_icon.png?v=<?= @filemtime(__DIR__ . '/assets/img/calendar_icon.png') ?: time() ?>" alt="DeLien Calendar" width="120" height="120" decoding="async">
  </picture>
  <h1>DeLien Calendar</h1>
  <div class="tagline">予定管理を、みんなで回せるカレンダーへ</div>
  <div class="benefit">Googleカレンダー風の予定管理システム（calendar.delien.xyz）</div>
  <a href="https://calendar.delien.xyz" class="btn" target="_blank" rel="noopener">カレンダーを開く</a>
</header>

<section>
  <h2>💡 何ができる？</h2>
  <div class="grid">
    <div class="card">
      <h3>🗓 カレンダー表示</h3>
      <p>月 / 週 / 日表示に対応。複数日にまたがる予定はバーで表示。ワンクリックで「予定あり」表示に切り替え。</p>
    </div>
    <div class="card">
      <h3>📌 予定管理</h3>
      <p>タイトル・日時・終日・説明・色を設定。複数期間の親予定の中にサブ予定（途中予定）を登録可能。</p>
    </div>
    <div class="card">
      <h3>🔗 公開URL</h3>
      <p><code>/c/{slug}</code> で共有。公開カレンダーは「マイカレンダーに登録」で自分のトップに追加できる。</p>
    </div>
    <div class="card">
      <h3>🖼 カレンダー画像</h3>
      <p>月表示を PNG で出力。Discord にリンクを貼るとカレンダー画像がプレビュー表示される。</p>
    </div>
    <div class="card">
      <h3>🇯🇵 日本の祝日</h3>
      <p>固定日・ハッピーマンデー・春分/秋分・振替休日を計算して表示（1949〜2099年）。</p>
    </div>
    <div class="card">
      <h3>🔔 Discord通知</h3>
      <p>登録・編集・削除・開始前リマインドを、Discord Bot が Web API 経由で配信。</p>
    </div>
    <div class="card">
      <h3>👀 カレンダー間フォロー</h3>
      <p>他のカレンダーを「予定あり」だけの状態で自カレンダーに合成表示。空き時間の共有に。</p>
    </div>
    <div class="card">
      <h3>✅ 終わった / 再開</h3>
      <p>開催中の予定を一覧の強調表示から外せる（削除はされない）。間違えたら「再開」で復帰。</p>
    </div>
  </div>
</section>

<section>
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

<section>
  <h2>👥 メンバー権限</h2>
  <div class="card">
    <div class="role"><span>👑 作成者</span><span>全操作（メンバー管理・設定・全予定の編集）</span></div>
    <div class="role"><span>🛡 管理者</span><span>メンバー管理・設定変更・全予定の編集</span></div>
    <div class="role"><span>✍️ 編集者</span><span>全予定の作成・編集</span></div>
    <div class="role"><span>👤 メンバー</span><span>自分の予定の作成・編集</span></div>
    <div class="role"><span>👁 閲覧者</span><span>閲覧のみ</span></div>
  </div>
</section>

<section>
  <h2>🛡 安心して使える設計</h2>
  <div class="grid">
    <div class="card">
      <h3>🍪 Cookie同意</h3>
      <p>初回訪問時に同意バナーを表示。「必須のみ」を選ぶと任意 Cookie は発行されず、発行済みトークンも削除される。</p>
    </div>
    <div class="card">
      <h3>🔑 APIトークン権限</h3>
      <p>トークンごとに参照できるカレンダーと閲覧/編集権限を設定。発行・失効はカレンダー作成者のみ。</p>
    </div>
    <div class="card">
      <h3>🎨 読みやすさの自動調整</h3>
      <p>グループ色に対して文字色・リンク色を自動補正。コントラスト不足でも見えなくならない。</p>
    </div>
    <div class="card">
      <h3>📄 プライバシーポリシー</h3>
      <p>Cookie・保存期間・外部サービスを <code>/privacy.php</code> に明記。</p>
    </div>
  </div>
</section>

<section>
  <h2>🧩 技術スタック</h2>
  <div class="grid">
    <div class="card">PHP 8（フレームワークなし）</div>
    <div class="card">MySQL（PDO）</div>
    <div class="card">Discord OAuth2 認証</div>
    <div class="card">SCSS → CSS</div>
  </div>
</section>

<section>
  <h2>🚀 使ってみる</h2>
  <div class="card">
    <p>ログインには Discord アカウントを使用します。カレンダーの作成・公開設定・メンバー招待はすべてブラウザから操作できます。</p>
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:16px;">
      <a href="https://calendar.delien.xyz" class="btn" target="_blank" rel="noopener">カレンダーを開く</a>
      <a href="./" class="btn" style="background:linear-gradient(45deg,#7c4dff,#00e5ff);">← ポートフォリオへ</a>
    </div>
  </div>
</section>

<div style="position:fixed; top:20px; left:20px;">
  <a href="./" class="btn">← 戻る</a>
</div>

<div class="fixed-cta">
  <a href="https://calendar.delien.xyz" class="btn" target="_blank" rel="noopener">カレンダー</a>
</div>

<script>
const sections=document.querySelectorAll("section");
const observer=new IntersectionObserver(entries=>{
 entries.forEach(e=>{
   if(e.isIntersecting){
     e.target.classList.add("active");
   }
 }
},{threshold:0.2});
sections.forEach(s=>observer.observe(s));

document.querySelectorAll("a").forEach(link=>{
  link.addEventListener("click", function(e){
    const href = this.getAttribute("href");

    if(href && !href.startsWith("#") && !this.target){
      e.preventDefault();

      const overlay = document.getElementById("page-transition");

      // 🔥 行き先ごとの色
      if(href.includes("calendar")){
        overlay.style.background =
          "radial-gradient(circle at 20% 20%, rgba(0, 229, 255, 0.15), transparent), " +
          "radial-gradient(circle at 80% 80%, rgba(0, 229, 255, 0.1), transparent)";

        sessionStorage.setItem("transitionDir", "forward");

      } else {
        overlay.style.background = "#0a0a0f";

        sessionStorage.setItem("transitionDir", "back");
      }

      overlay.style.pointerEvents = "auto";
      overlay.style.transformOrigin = "bottom";
      overlay.style.transform = "scaleY(1)";

      setTimeout(()=>{
        window.location = href;
      },500);
    }
  });
});

// プログレスバー
window.addEventListener("scroll", ()=>{
  const scroll = window.scrollY;
  const height = document.body.scrollHeight - window.innerHeight;
  const percent = (scroll / height) * 100;
  document.getElementById("progress-bar").style.width = percent + "%";
});
</script>

</body>
</html>
