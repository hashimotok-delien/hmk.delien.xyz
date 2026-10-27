<?php
/**
 * 兄弟Bot（BroBot）ランディングページ
 *
 * 構成: 自己完結型（CSS はこのファイル内の <style> にインラインで持つ）
 * 　　　商品名・URL は assets/include/config.php に集約
 *
 * 置き場所の前提: public/brobot/index.php
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
<meta name="description" content="界隈サーバー専用の無料Discord Bot。個室リレー・ランダム会議・合コン進行・全自動椅子取りなど、VCイベントの進行を自動化します。">
<meta property="og:type" content="website">
<meta property="og:title" content="<?= $PRODUCT_NAME ?> | <?= $SITE_OWNER ?>">
<meta property="og:description" content="界隈サーバー専用の無料Discord Bot。VCイベントの進行をボタン1つで自動化します。">
<meta property="og:image" content="<?= $SITE_URL ?>assets/img/og.png">
<meta name="twitter:card" content="summary_large_image">
<meta name="twitter:image" content="<?= $SITE_URL ?>assets/img/og.png">

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

/* ポートフォリオへ戻る */
.back-link{
  position:fixed;
  top:20px;
  left:20px;
  z-index:1000;
  display:inline-flex;
  align-items:center;
  gap:6px;
  padding:10px 18px;
  border:1px solid rgba(var(--accent-rgb),0.45);
  border-radius:999px;
  background:rgba(10,10,15,0.75);
  backdrop-filter:blur(10px);
  color:var(--text);
  font-size:0.9rem;
  font-weight:600;
  text-decoration:none;
  transition:0.3s;
}

.back-link:hover{
  background:rgba(var(--accent-rgb),0.15);
  box-shadow:0 0 20px rgba(var(--accent-rgb),0.4);
  transform:translateX(-2px);
}

@media (max-width:600px){
  .back-link{
    top:12px;
    left:12px;
    padding:8px 14px;
    font-size:0.8rem;
  }
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

/* ============================================================
   パネルプレビュー（スクリーンショットの代わりに実物に近いUIを再現）
   ============================================================ */
.panel-preview{
  background:#2b2d31;
  border-radius:14px;
  padding:16px 16px 20px;
  margin-top:14px;
  box-shadow:0 0 24px rgba(var(--accent-rgb),0.18);
}

.panel-msg{
  display:flex;
  gap:12px;
}

.panel-avatar{
  flex:0 0 40px;
  width:40px;
  height:40px;
  border-radius:50%;
  background:linear-gradient(135deg,var(--accent),var(--accent-2));
  display:flex;
  align-items:center;
  justify-content:center;
  font-size:1.1rem;
}

.panel-body{ flex:1 1 auto; min-width:0; }

.panel-author{
  font-size:0.85rem;
  font-weight:600;
  color:#f2f3f5;
  margin-bottom:4px;
}

.panel-author .bot-tag{
  margin-left:6px;
  padding:1px 5px;
  border-radius:4px;
  background:#5865f2;
  color:#fff;
  font-size:0.65rem;
  font-weight:600;
  vertical-align:middle;
}

.panel-embed{
  border-left:4px solid var(--accent);
  background:#232428;
  border-radius:6px;
  padding:12px 16px;
}

.panel-embed h4{
  margin:0 0 10px;
  font-size:0.95rem;
  color:#f2f3f5;
}

.panel-field{
  display:flex;
  gap:8px;
  font-size:0.82rem;
  color:#a3a6ad;
  margin-bottom:5px;
}

.panel-field b{
  color:#dbdee1;
  font-weight:600;
  min-width:5.5em;
}

.panel-buttons{
  display:flex;
  flex-wrap:wrap;
  gap:8px;
  margin-top:12px;
}

.panel-btn{
  padding:7px 14px;
  border-radius:6px;
  background:#4e5058;
  color:#fff;
  font-size:0.8rem;
  font-weight:600;
  white-space:nowrap;
}

.panel-btn.primary{ background:#248046; }
.panel-btn.danger{ background:#da373c; }
.panel-btn.off{ opacity:0.4; }

.panel-caption{
  margin-top:12px;
  font-size:0.8rem;
  color:#8b8f97;
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

<a class="back-link" href="../">← ポートフォリオに戻る</a>

<header>
  <img src="<?= $ICON_PATH ?>?v=<?= @filemtime(__DIR__ . '/assets/img/icon.svg') ?: time() ?>"
       alt="<?= $PRODUCT_NAME ?> のアイコン" width="120" height="120" decoding="async">
  <h1><?= $PRODUCT_NAME ?></h1>
  <div class="tagline">界隈サーバーの交流を、もっと楽しく。</div>
  <div class="benefit">VCイベントの進行を、ボタンひとつで自動化する Discord Bot です。</div>
  <div style="display:flex; gap:12px; flex-wrap:wrap; justify-content:center; margin-top:8px;">
    <a href="<?= $DOCS_URL ?>getting-started" class="btn">導入する</a>
    <a href="<?= $DOCS_URL ?>" class="btn"
       style="background:transparent; border:1px solid var(--accent); color:var(--accent);">📚 ドキュメント</a>
  </div>
</header>

<main>

<!-- ===== 何ができる？ ===== -->
<section>
  <h2>💡 何ができる？</h2>
  <div class="grid">
    <div class="card">
      <div class="category">🎠 個室リレーv2</div>
      <p>
        男女に分かれて個室をぐるぐる回るイベントを進行します。
        個室VCの作成・椅子側/移動側の配置・ラウンドタイマー・休憩室の自動計算まで
        パネルのボタンだけで回せます。
      </p>
    </div>
    <div class="card">
      <div class="category">🎲 ランダム会議</div>
      <p>
        待機VCに集まった人をランダムに少人数の会議へ振り分けます。
        余り調整・参加調整・男女マッチング・新規開拓（はじめまして優先）に対応。
      </p>
    </div>
    <div class="card">
      <div class="category">💑 合コン進行</div>
      <p>
        参加者を「組」として登録・承認し、組単位でVCをローテーション。
        女性固定・男性移動の合コン進行をノータイムで回せます。
      </p>
    </div>
    <div class="card">
      <div class="category">🪑 全自動椅子取りv2</div>
      <p>
        男女比から椅子側を判定し、個室の作成から座席のローテーションまで
        全自動で進行します。イベント本番で手が止まりません。
      </p>
    </div>
    <div class="card">
      <div class="category">📌 スティッキーメッセージ</div>
      <p>
        チャンネルを開いたとき常に最新の案内が一番下に来るよう、
        メッセージを自動で吊り下げ続けます。ルールや連絡事項の掲示に。
      </p>
    </div>
    <div class="card">
      <div class="category">🛠️ サーバー運営ツール</div>
      <p>
        VCの一括作成・削除、全員へのロール付与、自動リアクション、
        モデレーター設定、Botの導入サーバー管理までまとめて提供します。
      </p>
    </div>
  </div>
</section>

<!-- ===== なぜ使う？ ===== -->
<section>
  <h2>🚀 なぜ使う？</h2>
  <div class="grid">
    <div class="card">🖱️ <strong>操作はボタンだけ</strong><br>進行・席替え・タイマー開始まで、パネルのボタン1つで完結。コマンドを覚える必要はありません。</div>
    <div class="card">♻️ <strong>再起動しても復元</strong><br>進行状態をDBに保存しているので、Botが再起動してもパネルと状態がそのまま戻ります。</div>
    <div class="card">🧩 <strong>1ファイルで移植できる</strong><br>各機能は単一ファイルの「システムコグ」。別のBotへファイルを置くだけで同じ機能が動きます。</div>
    <div class="card">💸 <strong>完全無料</strong><br>界隈サーバー運営の負担を減らすことを目的に、無料で配布しています。</div>
  </div>
</section>

<!-- ===== 導入方法 ===== -->
<section>
  <h2>📥 導入方法</h2>
  <div class="card">
    <p>
      サーバー管理者権限を持つ人が Bot を招待し、<code>/モデレーター設定</code> などの
      初期設定を済ませれば使い始められます。くわしい手順はドキュメントをご覧ください。
    </p>
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:6px;">
      <a href="<?= $DOCS_URL ?>getting-started" class="btn">導入ガイドを読む</a>
      <a href="<?= $SUPPORT_URL ?>" class="btn" style="background:linear-gradient(45deg,#7c4dff,var(--accent));" target="_blank" rel="noopener">💬 サポート</a>
    </div>
  </div>
</section>

<!-- ===== 使用イメージ =====
     スクリーンショット画像ではなく、実際のパネルに近いUIをHTML/CSSで再現している。
     画像を用意した場合は .panel-preview を <picture> に差し替える。 -->
<section>
  <h2>🖼 使用イメージ</h2>

  <div class="card">
    <p><strong>🪑 全自動椅子取りv2 の操作パネル</strong>：フェーズに応じてボタンが増減し、次にやるべき操作がひと目で分かります。</p>
    <div class="panel-preview">
      <div class="panel-msg">
        <div class="panel-avatar">👬</div>
        <div class="panel-body">
          <div class="panel-author">兄弟Bot <span class="bot-tag">BOT</span></div>
          <div class="panel-embed">
            <h4>🪑 全自動椅子取りv2</h4>
            <div class="panel-field"><b>状態</b><span>ラウンド進行中</span></div>
            <div class="panel-field"><b>モード</b><span>👨 男性椅子</span></div>
            <div class="panel-field"><b>ラウンド</b><span>3 / 8</span></div>
            <div class="panel-field"><b>残り時間</b><span>1分23秒</span></div>
            <div class="panel-field"><b>個室</b><span>4部屋（椅子側 4人 / 移動側 9人）</span></div>
          </div>
          <div class="panel-buttons">
            <span class="panel-btn primary">次へ</span>
            <span class="panel-btn">停止</span>
            <span class="panel-btn">最終ラウンドへ</span>
            <span class="panel-btn">椅子側配置</span>
            <span class="panel-btn danger">強制終了</span>
            <span class="panel-btn">設定</span>
          </div>
          <div class="panel-caption">※ イメージです。実際の表示はサーバーの設定によって変わります。</div>
        </div>
      </div>
    </div>
  </div>

  <div class="card">
    <p><strong>🎲 ランダム会議 のシャッフル結果</strong>：人数・男女比・同席履歴を見ながら、ルールに沿って自動で部屋を組みます。</p>
    <div class="panel-preview">
      <div class="panel-msg">
        <div class="panel-avatar">👬</div>
        <div class="panel-body">
          <div class="panel-author">兄弟Bot <span class="bot-tag">BOT</span></div>
          <div class="panel-embed">
            <h4>🎲 ランダム会議</h4>
            <div class="panel-field"><b>状態</b><span>ラウンド 2 進行中</span></div>
            <div class="panel-field"><b>会議人数</b><span>4人 / 部屋</span></div>
            <div class="panel-field"><b>部屋数</b><span>3部屋（12人）</span></div>
            <div class="panel-field"><b>待機</b><span>2人</span></div>
            <div class="panel-field"><b>残り時間</b><span>4分02秒</span></div>
          </div>
          <div class="panel-buttons">
            <span class="panel-btn">シャッフル</span>
            <span class="panel-btn">追加シャッフル</span>
            <span class="panel-btn primary">ラウンド開始</span>
            <span class="panel-btn">全員回収</span>
            <span class="panel-btn danger">終了</span>
          </div>
          <div class="panel-caption">※ イメージです。実際の表示はサーバーの設定によって変わります。</div>
        </div>
      </div>
    </div>
  </div>
</section>

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
