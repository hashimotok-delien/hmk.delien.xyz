<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>けい🤖 Portfolio</title>
<meta name="description" content="けい🤖（hashimotok）のポートフォリオ。Discord Bot「Cultivate」「RoyalGuide」、予定管理システム「DeLien Calendar」、Windows向けオーディオミキサー「PulseWeaver」などの制作物と、Web・Bot・デスクトップアプリ開発のスキルを紹介します。">



<link rel="icon" type="image/png" sizes="32x32" href="favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="favicon.png">
<link rel="shortcut icon" href="favicon.ico">
<link rel="apple-touch-icon" href="favicon.png">

<style>
/* セルフホストフォント（日本語サブセット） */
@font-face{
  font-family:'Noto Sans JP';
  src:url("./assets/fonts/noto-sans-jp-400.woff2?v=<?= @filemtime(__DIR__ . '/assets/fonts/noto-sans-jp-400.woff2') ?: time() ?>") format("woff2");
  font-weight:400;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Noto Sans JP';
  src:url("./assets/fonts/noto-sans-jp-600.woff2?v=<?= @filemtime(__DIR__ . '/assets/fonts/noto-sans-jp-600.woff2') ?: time() ?>") format("woff2");
  font-weight:600;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Noto Sans JP';
  src:url("./assets/fonts/noto-sans-jp-700.woff2?v=<?= @filemtime(__DIR__ . '/assets/fonts/noto-sans-jp-700.woff2') ?: time() ?>") format("woff2");
  font-weight:700;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Orbitron';
  src:url("./assets/fonts/orbitron.woff2?v=<?= @filemtime(__DIR__ . '/assets/fonts/orbitron.woff2') ?: time() ?>") format("woff2");
  font-weight:400 900;
  font-style:normal;
  font-display:swap;
}
html{
  background:#0a0a0f;
}

body{
  margin:0;
  font-family:'Noto Sans JP',sans-serif;
  background:#0a0a0f;
  color:#e0e0e0;
  overflow-x:hidden;
}

body.fade-in{
  opacity:1;
}

/* 背景 */
body::before{
  content:"";
  position:fixed;
  width:200%;height:200%;
  background:
    linear-gradient(rgba(0,229,255,0.05) 1px, transparent 1px),
    linear-gradient(90deg, rgba(0,229,255,0.05) 1px, transparent 1px);
  background-size:40px 40px;
  animation:gridMove 20s linear infinite;
  z-index:-1;
  pointer-events:none;
}

@keyframes gridMove{
  to{transform:translate(-40px,-40px);}
}

body::after {
  content: "";
  position: fixed;
  width: 100%;
  height: 100%;
  background:
    radial-gradient(circle at 20% 30%, rgba(0,229,255,0.15) 2px, transparent 3px),
    radial-gradient(circle at 70% 60%, rgba(0,229,255,0.15) 2px, transparent 3px);
  background-size: 200px 200px;
  animation: nodeMove 20s linear infinite;
  pointer-events: none;
  z-index: -1;
}

@keyframes nodeMove {
  from { transform: translate(0,0); }
  to { transform: translate(-100px,-100px); }
}

body.fade-out{
  opacity:0;
  transition:0.5s;
}

#loader{
  position:fixed;
  width:100%;
  height:100%;
  background:#0a0a0f;
  display:flex;
  justify-content:center;
  align-items:center;
  z-index:99999;
}

.loader-text{
  font-family:'Orbitron';
  font-size:2rem;
  color:#00e5ff;
  letter-spacing:3px;
  animation:glitch 1.2s infinite;
}

@keyframes glitch{
  0%{opacity:1;}
  50%{opacity:0.4; transform:translateX(2px);}
  100%{opacity:1;}
}

/* header */
header{
  height:100vh;
  display:flex;
  flex-direction:column;
  justify-content:center;
  align-items:center;
  text-align:center;
}

header {
  gap: 15px;
}

header img{
  width:120px;
  border-radius:50%;
  animation:float 4s infinite;
}

@keyframes float{
  50%{transform:translateY(-10px);}
}

h1{
  font-family:'Orbitron';
  font-size:2.8rem;
  text-shadow:0 0 15px #00e5ff;
}

.tagline{
  color:#00e5ff;
  margin-bottom:15px;
}

.scroll{
  margin-top:40px;
  opacity:0.6;
  animation:fade 2s infinite;
}

@keyframes fade{
  50%{opacity:1;transform:translateY(10px);}
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

section:nth-child(odd){
  transform: translateY(60px);
}

section:nth-child(even){
  transform: translateY(100px);
}

section.active{
  opacity:1;
  transform:none;
}

h2{
  border-left:4px solid #00e5ff;
  padding-left:10px;
}

/* カード */
.grid{
  display:grid;
  grid-template-columns:repeat(auto-fit,minmax(250px,1fr));
  gap:20px;
}

.card {
  position: relative;
  overflow: hidden;
  padding: 20px;
  border: 1px solid rgba(0, 229, 255, 0.15);
  border-radius: 14px;
  background: rgba(18, 18, 26, 0.8);
  line-height: 1.7;
  transition: transform 0.3s, box-shadow 0.3s, border-color 0.3s;
}

.card h3 {
  margin: 0 0 8px;
  font-size: 1.05rem;
}

.card p {
  margin: 0;
  opacity: 0.8;
}

.card::before {
  content: "";
  position: absolute;
  inset: 0;
  background: linear-gradient(120deg, transparent, rgba(0,229,255,0.3), transparent);
  opacity: 0;
  transition: 0.4s;
  pointer-events: none;
}

.card:hover::before {
  opacity: 1;
}

.card:hover {
  transform: translateY(-8px) scale(1.03);
  box-shadow: 0 0 30px rgba(0,229,255,0.5);
  border-color: rgba(0,229,255,0.45);
}

/* サービス一覧（1サービス = 1ブロック） */
.service {
  position: relative;
  overflow: hidden;
  margin-bottom: 32px;
  padding: 32px;
  border: 1px solid rgba(0, 229, 255, 0.16);
  border-radius: 20px;
  background: linear-gradient(160deg, rgba(22, 22, 32, 0.95), rgba(10, 10, 15, 0.95));
  box-shadow: 0 12px 32px rgba(0, 0, 0, 0.45);
}

.service:last-of-type {
  margin-bottom: 0;
}

.service::after {
  content: "";
  position: absolute;
  top: 0;
  left: 0;
  right: 0;
  height: 2px;
  background: linear-gradient(90deg, transparent, #00e5ff, transparent);
  opacity: 0.7;
  pointer-events: none;
}

/* Cultivate（主力）を強調 */
.service.main {
  border-color: rgba(0, 229, 255, 0.5);
  box-shadow: 0 0 40px rgba(0, 229, 255, 0.18), 0 12px 32px rgba(0, 0, 0, 0.45);
}

.service-head h3 {
  margin: 0 0 10px;
  font-size: 1.45rem;
  letter-spacing: 1px;
}

.service-head p {
  margin: 0 0 24px;
  opacity: 0.8;
  line-height: 1.8;
}

/* サービス内は 2×2 で揃える */
.service .grid {
  grid-template-columns: repeat(2, minmax(0, 1fr));
}

.service-actions {
  display: flex;
  gap: 12px;
  flex-wrap: wrap;
  margin-top: 24px;
}

/* ボタン */
.btn{
  display:inline-block;
  margin-top:10px;
  padding:10px 15px;
  background:#00e5ff;
  color:#000;
  border-radius:8px;
  text-decoration:none;
  font-weight:bold;
}

.btn:hover{
  box-shadow:0 0 15px #00e5ff;
}

/* skills */
.skills span{
  background:#00e5ff;
  color:#000;
  padding:5px 10px;
  margin:5px;
  border-radius:8px;
  display:inline-block;
}

/* 固定CTA */
.fixed-cta{
  position:fixed;
  bottom:20px;
  right:20px;
  z-index:999;
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

@media (max-width: 600px){
  section{ padding: 70px 16px; }
  .service{ padding: 22px 18px; border-radius: 16px; }
  .service-head h3{ font-size: 1.25rem; }
  .service .grid{ grid-template-columns: 1fr; }
}
</style>
</head>

<body>
<div id="loader" aria-hidden="true">
  <div class="loader-text">Kei Dev</div>
</div>
<div id="page-transition"></div>
<div id="progress-bar"></div>

<header>
  <picture>
    <source srcset="./assets/img/kei_icon-120.webp?v=<?= @filemtime(__DIR__ . '/assets/img/kei_icon-120.webp') ?: time() ?> 1x, ./assets/img/kei_icon.webp?v=<?= @filemtime(__DIR__ . '/assets/img/kei_icon.webp') ?: time() ?> 2x" type="image/webp">
    <img src="./assets/img/kei_icon.png?v=<?= @filemtime(__DIR__ . '/assets/img/kei_icon.png') ?: time() ?>" alt="けい🤖" width="120" height="120" decoding="async">
  </picture>
  <h1>けい🤖</h1>

  <div class="tagline" id="typing"></div>

  <p>Discord Botで“運営を仕組み化”するエンジニア</p>
  
  <a href="./cultivate/" class="btn">Cultivateを見る</a>

  <div class="scroll">↓ Scroll ↓</div>
</header>

<main>

<!-- 🛠 Services（サービス一覧） -->
<section id="services">
  <h2>🛠 Services</h2>

  <article class="service main">
    <div class="service-head">
      <h3>𝓒𝓾𝓵𝓽𝓲𝓿𝓪𝓽𝓮</h3>
      <p>これ1つで“運営が回る”界隈サーバーを構築。運営・VC・ユーザー管理の作業を、ボタン操作と自動化でまとめて引き受けるDiscord Botです。</p>
    </div>

    <div class="grid">
      <div class="card">
        <h3>🧑‍💼 運営パネル</h3>
        <p>役職パネル・設定パネル・吊下げメッセージなど、運営の定型作業をボタンだけで完結</p>
      </div>

      <div class="card">
        <h3>🎤 VC運用</h3>
        <p>裏2shot・寝落ち送り・VC制御・VCカウンターで、VCの立ち上げと片付けを自動化</p>
      </div>

      <div class="card">
        <h3>🛂 入退室とロール管理</h3>
        <p>必須ロール確認・自動KICK・ロール同期・カテゴリ権限同期で、安全なサーバーを保つ</p>
      </div>

      <div class="card">
        <h3>🏆 プロフィールとランク</h3>
        <p>プロフィール v2・プロフィール審査・ランクシステム・予約投稿で、交流を可視化</p>
      </div>
    </div>

    <div class="service-actions">
      <a class="btn" href="./cultivate/">詳細を見る</a>
      <a class="btn" href="https://docs.delien.xyz/cultivate/" target="_blank" rel="noopener">ドキュメントを見る</a>
    </div>
  </article>

  <article class="service">
    <div class="service-head">
      <h3>👑 RoyalGuide</h3>
      <p>投稿者プリセット・保存先チャンネル・SoundCloud再生を、この1台にまとめたDiscord Bot。設定はスラッシュコマンドとボタン操作だけで完結します。</p>
    </div>

    <div class="grid">
      <div class="card">
        <h3>👤 投稿者プリセット</h3>
        <p>Webhook投稿の表示名・アイコンをプリセットとして最大24件登録。作成も切替もボタン操作で完結</p>
      </div>

      <div class="card">
        <h3>🗂 保存先の一元管理</h3>
        <p>グローバルと機能別の保存先チャンネルを1か所で設定。未設定なら自動でフォールバック</p>
      </div>

      <div class="card">
        <h3>🎧 SoundCloud再生</h3>
        <p>URLを貼るだけでVCに再生。最大100曲のキューと、3モードのループに対応</p>
      </div>

      <div class="card">
        <h3>🎛 再生コントロールパネル</h3>
        <p>一時停止・スキップ・停止・シャッフル・ループを、常設パネルのボタンから操作</p>
      </div>
    </div>

    <div class="service-actions">
      <a class="btn" href="./royalguide/">詳細を見る</a>
      <a class="btn" href="https://docs.delien.xyz/royalguide/" target="_blank" rel="noopener">ドキュメントを見る</a>
    </div>
  </article>

  <article class="service">
    <div class="service-head">
      <h3>🎚️ PulseWeaver</h3>
      <p>H/W入力6・バーチャル入力3の計9系統を、H/W出力A1〜A4へ自由に振り分けるWindows向けの無料オーディオミキサー。ゲーム・通話・配信の音をアプリごとに分けたまま、同時に届けられます。</p>
    </div>

    <div class="grid">
      <div class="card">
        <h3>🎛 9入力 → 4出力</h3>
        <p>入力ごと・出力ごとの音量を個別に調整し、A1〜A4へ自由に振り分け</p>
      </div>

      <div class="card">
        <h3>🔁 ループバック取り込み</h3>
        <p>既定出力やDiscordに流れている音をそのまま入力に。ゲームと通話を別々にミックス</p>
      </div>

      <div class="card">
        <h3>💾 構成の保存・切替</h3>
        <p>「ゲーム配信」「Discord通話」などの構成をJSONで保存し、選ぶだけで即切替</p>
      </div>

      <div class="card">
        <h3>🔄 無料・自動更新</h3>
        <p>追加のランタイム不要。24時間に1回アップデートを確認し、そのまま更新</p>
      </div>
    </div>

    <div class="service-actions">
      <a class="btn" href="./pulseweaver/">詳細を見る</a>
      <a class="btn" href="https://github.com/hashimotok-delien/PulseWeaver/releases" target="_blank" rel="noopener">ダウンロード</a>
    </div>
  </article>

  <article class="service">
    <div class="service-head">
      <h3>📅 DeLien Calendar</h3>
      <p>Googleカレンダー風の予定管理システム。グループ（カレンダー）単位で予定を管理し、公開設定・メンバー招待・カレンダー画像出力・Discord通知までこなします。</p>
    </div>

    <div class="grid">
      <div class="card">
        <h3>🗓 月 / 週 / 日表示</h3>
        <p>複数日予定はバー表示。ワンクリックで「予定あり」表示に切替</p>
      </div>

      <div class="card">
        <h3>🔐 3段階の公開設定</h3>
        <p>非公開 / 限定公開 / 公開 +「内容を隠して公開」</p>
      </div>

      <div class="card">
        <h3>👥 権限と招待</h3>
        <p>作成者・管理者・編集者・メンバー・閲覧者の5段階</p>
      </div>

      <div class="card">
        <h3>🔔 Discord通知</h3>
        <p>登録・編集・削除・開始前リマインドをBotが配信</p>
      </div>
    </div>

    <div class="service-actions">
      <a class="btn" href="./deliencalendar/">詳細を見る</a>
      <a class="btn" href="https://calendar.delien.xyz" target="_blank" rel="noopener">サービスを開く</a>
    </div>
  </article>
</section>

<section>
  <h2>👤 Profile</h2>

  <div class="card">
    Discord Botエンジニア / 鯖主<br>
    大型イベントBot貸出3件 / 出店2件
  </div>

  <div class="card skills">
    <h3>💻 Skills</h3>
    <span>Python</span><span>Java</span><span>C#</span><span>PHP</span>
    <span>HTML</span><span>CSS</span>
    <span>JavaScript</span><span>SQL</span>
  </div>
</section>

<section>
  <h2>🚀 Projects</h2>

  <div class="grid">
    <div class="card">
      <h3>𝓐𝓬𝓽𝓲𝓿𝓪𝓽𝓮</h3>
      <p>イベ鯖専用Bot</p>
    </div>

    <div class="card">
      <h3>兄弟Bot</h3>
      <p>VCイベント自動化</p>
    </div>
  </div>
</section>

<section>
  <h2>🔗 Links</h2>

  <div class="card">
    <a class="btn" href="https://x.com/hashimotok0808" target="_blank">X</a>
    <a class="btn" href="https://github.com/hashimotok-delien/" target="_blank">GitHub</a>
  </div>
</section>

<div class="fixed-cta">
  <a href="./cultivate/" class="btn">Cultivate</a>
</div>

</main>
<script>
// タイピング
const text = "使えないなら作ってしまえDiscord Bot";
let i = 0;

function startTyping() {
  i = 0;
  const el = document.getElementById("typing");
  el.textContent = "";

  function typing() {
    if (i < text.length) {
      el.textContent = text.slice(0, i + 1);
      i++;
      setTimeout(typing, 50);
    }
  }

  typing();
}

// スクロール表示
const sections=document.querySelectorAll("section");
const observer=new IntersectionObserver(e=>{
 e.forEach(el=>{
  if(el.isIntersecting) el.target.classList.add("active");
 });
});
sections.forEach(s=>observer.observe(s));

// マウス追従グロー（読み取りと書き込みを1フレーム1回にまとめる）
document.querySelectorAll(".card").forEach(card=>{
  let frame = 0;
  let px = 0, py = 0;

  card.addEventListener("mousemove", e=>{
    px = e.clientX;
    py = e.clientY;

    if(frame) return;

    frame = requestAnimationFrame(()=>{
      frame = 0;
      const rect = card.getBoundingClientRect();
      const x = px - rect.left;
      const y = py - rect.top;

      card.style.background = `radial-gradient(circle at ${x}px ${y}px, rgba(0,229,255,0.15), rgba(18,18,26,0.8) 40%)`;
    });
  });

  card.addEventListener("mouseleave", ()=>{
    if(frame){
      cancelAnimationFrame(frame);
      frame = 0;
    }
    card.style.background = "";
  });
});

// 読み込み
window.addEventListener("load", ()=>{
  const skip = sessionStorage.getItem("skipLoader");

  if(skip === "true"){
    // ローディングスキップ
    document.getElementById("loader").style.display = "none";

    sessionStorage.removeItem("skipLoader");

    startTyping(); // ←忘れずに
    return;
  }

  // 通常ローディング
  setTimeout(()=>{
    const loader = document.getElementById("loader");
    loader.style.opacity = "0";

    setTimeout(()=>{
      loader.style.display = "none";
      setTimeout(startTyping, 300);
    },500);

  },1500);

});

// ページ移動
document.querySelectorAll("a").forEach(link=>{
  link.addEventListener("click", function(e){
    const href = this.getAttribute("href");

    if(href && !href.startsWith("#") && !this.target){
      e.preventDefault();

      const overlay = document.getElementById("page-transition");

      // 🔥 行き先ごとの色
      if(href.includes("cultivate") || href.includes("deliencalendar") || href.includes("pulseweaver")){
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
window.addEventListener("pageshow", ()=>{
  document.body.classList.add("fade-in");
});

// プログレスバー / 背景パララックス
// スクロール範囲は layout 読み取りを伴うため、読み込み時とリサイズ時だけ測る
const progressBar = document.getElementById("progress-bar");
let scrollRange = 0;
let scrollFrame = 0;

const measureScrollRange = ()=>{
  scrollRange = document.documentElement.scrollHeight - window.innerHeight;
};
measureScrollRange();
window.addEventListener("load", measureScrollRange);
window.addEventListener("resize", measureScrollRange, { passive: true });

window.addEventListener("scroll", ()=>{
  if(scrollFrame) return;

  scrollFrame = requestAnimationFrame(()=>{
    scrollFrame = 0;
    const y = window.scrollY;
    progressBar.style.width = (scrollRange > 0 ? (y / scrollRange) * 100 : 0) + "%";
    document.body.style.backgroundPositionY = y * 0.3 + "px";
  });
}, { passive: true });

const header = document.querySelector("header");
let tiltFrame = 0;

document.addEventListener("mousemove", e=>{
  if(tiltFrame) return;

  tiltFrame = requestAnimationFrame(()=>{
    tiltFrame = 0;
    const x = (e.clientX / window.innerWidth - 0.5) * 10;
    const y = (e.clientY / window.innerHeight - 0.5) * 10;

    header.style.transform = `rotateX(${ -y }deg) rotateY(${ x }deg)`;
  });
});
</script>

</body>
</html>