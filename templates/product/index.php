<?php
/**
 * 商品ランディングページ — テンプレート
 *
 * 構成: 自己完結型（CSS はこのファイル内の <style> にインラインで持つ）
 * 　　　商品名・URL は assets/include/config.php に集約
 *
 * 置き場所の前提: public/<slug>/index.php（＝ドキュメンルート直下の1階層）
 * そのため favicon やフォントは ../ で参照している。
 */
require __DIR__ . '/assets/include/config.php';
?>
<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= $PRODUCT_NAME ?> | <?= $SITE_OWNER ?></title>
<meta name="description" content="（TODO: 120文字以内で商品の説明を書く）">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $PRODUCT_NAME ?> | <?= $SITE_OWNER ?>">
<meta property="og:description" content="（TODO: OGP 用の説明文）">
<meta property="og:image" content="（TODO: 1200x630 のサムネイル絶対URL）">
<meta name="twitter:card" content="summary_large_image">

<link rel="icon" type="image/png" sizes="32x32" href="../favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon.png">
<link rel="shortcut icon" href="../favicon.ico">
<link rel="apple-touch-icon" href="../favicon.png">

<style>
/* ============================================================
   デザイントークン
   アクセント色を変えるときは --accent と --accent-rgb の両方を更新する
   （rgba(var(--accent-rgb), .x) の形で半透明に使っているため）
   ============================================================ */
:root{
  --bg:#0a0a0f;
  --text:#e0e0e0;
  --accent:#00e5ff;
  --accent-rgb:0,229,255;
  --accent-2:#00bcd4;
  --card-bg:rgba(18,18,26,0.7);
  --radius:12px;
}

/* セルフホストフォント（日本語サブセット）
   フォントを差し替えたら tools/build_fonts.py で再生成する */
@font-face{
  font-family:'Noto Sans JP';
  src:url("../assets/fonts/noto-sans-jp-400.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-400.woff2') ?: time() ?>") format("woff2");
  font-weight:400;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Noto Sans JP';
  src:url("../assets/fonts/noto-sans-jp-600.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-600.woff2') ?: time() ?>") format("woff2");
  font-weight:600;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Noto Sans JP';
  src:url("../assets/fonts/noto-sans-jp-700.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-700.woff2') ?: time() ?>") format("woff2");
  font-weight:700;
  font-style:normal;
  font-display:swap;
}
@font-face{
  font-family:'Orbitron';
  src:url("../assets/fonts/orbitron.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/orbitron.woff2') ?: time() ?>") format("woff2");
  font-weight:400 900;
  font-style:normal;
  font-display:swap;
}

body{
  margin:0;
  font-family:'Noto Sans JP',sans-serif;
  background:var(--bg);
  color:var(--text);
  overflow-x:hidden;
}

/* 背景アニメ */
body::before{
  content:"";
  position:fixed;
  width:200%;
  height:200%;
  background:
    radial-gradient(circle at 20% 20%, rgba(var(--accent-rgb),0.15), transparent),
    radial-gradient(circle at 80% 80%, rgba(var(--accent-rgb),0.1), transparent);
  animation:moveBg 15s linear infinite alternate;
  z-index:-1;
  pointer-events:none;
}

@keyframes moveBg{
  from{transform:translate(0,0);}
  to{transform:translate(-80px,-80px);}
}

/* ノイズっぽい線（IT感） */
body::after{
  content:"";
  position:fixed;
  width:100%;
  height:100%;
  background:linear-gradient(rgba(255,255,255,0.02) 1px, transparent 1px);
  background-size:100% 3px;
  pointer-events:none;
}

/* ヒーロー */
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
  box-shadow:0 0 30px rgba(var(--accent-rgb),0.7);
}

@keyframes float{
  0%{transform:translateY(0);}
  50%{transform:translateY(-15px);}
  100%{transform:translateY(0);}
}

h1{
  font-family:'Orbitron';
  font-size:2.8rem;
  text-shadow:0 0 20px rgba(var(--accent-rgb),0.6);
}

.tagline{
  color:var(--accent);
  font-size:1.2rem;
}

.benefit{
  opacity:0.8;
}

/* ボタン */
.btn{
  display:inline-block;
  padding:14px 28px;
  background:linear-gradient(45deg,var(--accent),var(--accent-2));
  color:#000;
  border-radius:var(--radius);
  font-weight:bold;
  text-decoration:none;
  transition:0.3s;
}

.btn:hover{
  transform:scale(1.08);
  box-shadow:0 0 30px rgba(var(--accent-rgb),0.8);
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

/* JS 無効時でも内容が消えないようにする */
@media (prefers-reduced-motion: reduce){
  section{ opacity:1; transform:none; transition:none; }
  body::before, header img{ animation:none; }
}

h2{
  border-left:4px solid var(--accent);
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
  background:var(--card-bg);
  backdrop-filter:blur(15px);
  padding:25px;
  border-radius:18px;
  transition:0.3s;
  border:1px solid rgba(var(--accent-rgb),0.1);
}

.card:hover{
  transform:translateY(-8px) scale(1.02);
  box-shadow:0 0 30px rgba(var(--accent-rgb),0.25);
}

.category{
  color:var(--accent);
  margin-bottom:10px;
  font-weight:bold;
}

/* 画像 */
.card img{
  width:100%;
  border-radius:var(--radius);
  margin-top:10px;
  transition:0.3s;
}

.card img:hover{
  transform:scale(1.02);
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
  h1{ font-size:2rem; }
  section{ padding:70px 16px; }
}
</style>
</head>
<body>
<div id="page-transition"></div>
<div id="progress-bar"></div>

<header>
  <picture>
    <source srcset="./assets/img/icon-120.webp?v=<?= @filemtime(__DIR__ . '/assets/img/icon-120.webp') ?: time() ?> 1x, ./assets/img/icon.webp?v=<?= @filemtime(__DIR__ . '/assets/img/icon.webp') ?: time() ?> 2x" type="image/webp">
    <img src="<?= $ICON_PATH ?>" alt="<?= $PRODUCT_NAME ?> のアイコン" width="120" height="120" decoding="async">
  </picture>
  <h1><?= $PRODUCT_NAME ?></h1>
  <div class="tagline">（TODO: キャッチコピー）</div>
  <div class="benefit">（TODO: 補足の一文）</div>
  <a href="<?= $SUPPORT_URL ?>" class="btn">導入する</a>
</header>

<main>

<!-- ===== 何ができる？ ===== -->
<section>
  <h2>💡 何ができる？</h2>
  <div class="grid">
    <div class="card">
      <div class="category">（TODO: カテゴリ1）</div>
      <p>（TODO: 機能の説明）</p>
    </div>
    <div class="card">
      <div class="category">（TODO: カテゴリ2）</div>
      <p>（TODO: 機能の説明）</p>
    </div>
    <div class="card">
      <div class="category">（TODO: カテゴリ3）</div>
      <p>（TODO: 機能の説明）</p>
    </div>
  </div>
</section>

<!-- ===== なぜ使う？ ===== -->
<section>
  <h2>🚀 なぜ使う？</h2>
  <div class="grid">
    <div class="card">（TODO: 導入メリット1）</div>
    <div class="card">（TODO: 導入メリット2）</div>
    <div class="card">（TODO: 導入メリット3）</div>
    <div class="card">（TODO: 導入メリット4）</div>
  </div>
</section>

<!-- ===== 導入方法 ===== -->
<section>
  <h2>📥 導入方法</h2>
  <div class="card">
    <p>（TODO: 導入手順を1行で書く）</p>
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:6px;">
      <a href="<?= $SUPPORT_URL ?>" class="btn">サポートサーバーへ</a>
      <a href="<?= $DOCS_URL ?>" class="btn" style="background:linear-gradient(45deg,#7c4dff,var(--accent));">📚 ドキュメントを見る</a>
    </div>
  </div>
</section>

<!-- ===== 使用イメージ =====
     スクリーンショットは assets/img/ に置いて自前配信するのが基本。
     外部URL（Gyazo 等）を使うと、リンク切れ・外部依存・遅延の原因になる。 -->
<section>
  <h2>🖼 使用イメージ</h2>

  <div class="card">
    <p><strong>（TODO: 画面名1）</strong>：（TODO: 説明）</p>
    <picture>
      <source type="image/webp"
              srcset="./assets/img/screenshot-1-600.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-1-600.webp') ?: time() ?> 600w,
                      ./assets/img/screenshot-1-900.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-1-900.webp') ?: time() ?> 900w,
                      ./assets/img/screenshot-1-1200.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-1-1200.webp') ?: time() ?> 1200w"
              sizes="(max-width: 1060px) calc(100vw - 90px), 900px">
      <img src="./assets/img/screenshot-1.webp" alt="（TODO: スクリーンショットの説明）"
           width="1200" height="980" loading="lazy" decoding="async"
           style="width:100%; height:auto; border-radius:12px; box-shadow:0 0 20px rgba(var(--accent-rgb),0.3);">
    </picture>
  </div>

  <div class="card">
    <p><strong>（TODO: 画面名2）</strong>：（TODO: 説明）</p>
    <picture>
      <source type="image/webp"
              srcset="./assets/img/screenshot-2-600.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-2-600.webp') ?: time() ?> 600w,
                      ./assets/img/screenshot-2-900.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-2-900.webp') ?: time() ?> 900w,
                      ./assets/img/screenshot-2-1200.webp?v=<?= @filemtime(__DIR__ . '/assets/img/screenshot-2-1200.webp') ?: time() ?> 1200w"
              sizes="(max-width: 1060px) calc(100vw - 90px), 900px">
      <img src="./assets/img/screenshot-2.webp" alt="（TODO: スクリーンショットの説明）"
           width="1200" height="980" loading="lazy" decoding="async"
           style="width:100%; height:auto; border-radius:12px; box-shadow:0 0 20px rgba(var(--accent-rgb),0.3);">
    </picture>
  </div>
</section>

<div style="position:fixed; top:20px; left:20px;">
  <a href="../" class="btn">← 戻る</a>
</div>

<div class="fixed-cta">
  <a href="<?= $SUPPORT_URL ?>" class="btn">導入</a>
</div>

</main>
<script>
const sections=document.querySelectorAll("section");
const observer=new IntersectionObserver(entries=>{
 entries.forEach(e=>{
   if(e.isIntersecting){
     e.target.classList.add("active");
   }
 });
},{threshold:0.2});
sections.forEach(s=>observer.observe(s));

const productSlug = <?= json_encode($PRODUCT_SLUG) ?>;
const accentRgb = <?= json_encode($ACCENT_RGB) ?>;

document.querySelectorAll("a").forEach(link=>{
  link.addEventListener("click", function(e){
    const href = this.getAttribute("href");

    if(href && !href.startsWith("#") && !this.target){
      e.preventDefault();

      const overlay = document.getElementById("page-transition");

      if(href.includes(productSlug)){
        overlay.style.background =
          "radial-gradient(circle at 20% 20%, rgba(" + accentRgb + ", 0.15), transparent), " +
          "radial-gradient(circle at 80% 80%, rgba(" + accentRgb + ", 0.1), transparent)";
      } else {
        overlay.style.background = "";
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
  });
}, { passive: true });
</script>

</body>
</html>
