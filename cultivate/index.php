<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Cultivate | けい🤖</title>
<meta name="description" content="Cultivate — Discord サーバー運営を自動化する多機能Bot。役職パネル、VC管理、プロフィール保存、自動リアクションなどで運営を効率化します。">



<link rel="icon" type="image/png" sizes="32x32" href="../favicon.png">
<link rel="icon" type="image/png" sizes="16x16" href="../favicon.png">
<link rel="shortcut icon" href="../favicon.ico">
<link rel="apple-touch-icon" href="../favicon.png">

<link rel="preload" as="font" type="font/woff2" crossorigin
      href="../assets/fonts/noto-sans-jp-400.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-400.woff2') ?: time() ?>">
<link rel="preload" as="font" type="font/woff2" crossorigin
      href="../assets/fonts/noto-sans-jp-700.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-700.woff2') ?: time() ?>">

<noscript>
<style>
  section{opacity:1 !important;transform:none !important}
</style>
</noscript>

<style>
/* セルフホストフォント（日本語サブセット） */
@font-face{
  font-family:'Noto Sans JP';
  src:url("../assets/fonts/noto-sans-jp-400.woff2?v=<?= @filemtime(__DIR__ . '/../assets/fonts/noto-sans-jp-400.woff2') ?: time() ?>") format("woff2");
  font-weight:400;
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
  background:#0a0a0f;
  color:#e0e0e0;
  overflow-x:hidden;
}

/* 背景（常時アニメーションは負荷が高いため静的化） */
body::before{
  content:"";
  position:fixed;
  inset:0;
  background:
    radial-gradient(circle at 20% 20%, rgba(0,229,255,0.15), transparent),
    radial-gradient(circle at 80% 80%, rgba(0,229,255,0.1), transparent);
  z-index:-1;
  pointer-events:none;
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
  box-shadow:0 0 24px rgba(0,229,255,0.55);
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
  transition:transform 0.25s, box-shadow 0.25s;
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

/* 使用イメージ：PCは左右交互、スマホは説明→プレビュー */
.shots{
  display:flex;
  flex-direction:column;
  gap:28px;
}

.shot-row{
  display:grid;
  grid-template-columns:minmax(0,1.2fr) minmax(0,0.8fr);
  grid-template-areas:"visual info";
  gap:28px;
  align-items:center;
  padding:26px;
  border:1px solid rgba(0,229,255,0.1);
  border-radius:18px;
  background:rgba(18,18,26,0.9);
}

.shot-row:nth-child(even){
  grid-template-columns:minmax(0,0.8fr) minmax(0,1.2fr);
  grid-template-areas:"info visual";
}

.shot-visual{grid-area:visual;min-width:0}
.shot-info{grid-area:info;min-width:0}
.shot-info h3{margin:0 0 10px;font-size:1.15rem;color:#e0e0e0}
.shot-info p{margin:0 0 10px;color:#a9a9c0;font-size:0.9rem;line-height:1.85}
.shot-info ul{margin:0;padding-left:1.2em;color:#9aa0b8;font-size:0.85rem;line-height:1.85}
.shot-info li{margin-bottom:3px}

@media (max-width:820px){
  .shot-row,
  .shot-row:nth-child(even){
    grid-template-columns:1fr;
    grid-template-areas:"info" "visual";
    gap:16px;
    padding:18px;
  }
}

/* カード */
.card{
  background:rgba(18,18,26,0.9);
  padding:25px;
  border-radius:18px;
  transition:transform 0.3s, box-shadow 0.3s, border-color 0.3s;
  border:1px solid rgba(0,229,255,0.1);
}

.card:hover{
  transform:translateY(-6px);
  box-shadow:0 0 24px rgba(0,229,255,0.22);
}

.category{
  color:#00e5ff;
  margin-bottom:10px;
  font-weight:bold;
}

/* ===== 使用イメージ（画像ではなくHTMLで再現） ===== */
.shot{
  margin-top:12px;
  background:#313338;
  border:1px solid #3f4147;
  border-radius:12px;
  overflow:hidden;
  color:#dbdee1;
  font-family:'Noto Sans JP',sans-serif;
  line-height:1.55;
  text-align:left;
}

.shot-bar{
  display:flex;
  align-items:center;
  gap:8px;
  padding:8px 12px;
  background:#2b2d31;
  border-bottom:1px solid #1e1f22;
}

.shot-bar .hash{color:#80848e;font-size:1.05rem;line-height:1}
.shot-bar b{color:#f2f3f5;font-size:0.82rem}
.shot-badge{
  margin-left:auto;
  padding:1px 8px;
  border:1px solid #4b4d69;
  border-radius:999px;
  color:#a9b0d0;
  font-size:0.65rem;
  white-space:nowrap;
}

.shot-body{padding:12px 10px 14px}
.shot-msg{display:flex;gap:10px}
.shot-avatar{
  flex:0 0 auto;
  display:grid;
  place-items:center;
  width:32px;
  height:32px;
  border-radius:50%;
  background:#5865f2;
  font-size:0.95rem;
}
.shot-main{flex:1;min-width:0}
.shot-head{
  display:flex;
  align-items:baseline;
  flex-wrap:wrap;
  gap:6px;
  margin-bottom:4px;
}
.shot-head b{color:#f2f3f5;font-size:0.82rem}
.shot-bot{
  padding:1px 4px;
  border-radius:3px;
  background:#5865f2;
  color:#fff;
  font-size:0.58rem;
  font-weight:700;
}
.shot-time{color:#949ba4;font-size:0.66rem}

.shot-embed{
  padding:10px 12px;
  border-left:4px solid #00bfff;
  border-radius:0 6px 6px 0;
  background:#2b2d31;
}
.shot-embed .t{
  margin-bottom:6px;
  color:#f2f3f5;
  font-size:0.85rem;
  font-weight:700;
}
.shot-embed .d{color:#dbdee1;font-size:0.74rem;line-height:1.7}
.shot-embed .f{margin-top:8px}
.shot-embed .fname{color:#f2f3f5;font-size:0.74rem;font-weight:700}
.shot-embed .fval{color:#dbdee1;font-size:0.74rem;line-height:1.7}
.shot-embed .foot{
  margin-top:8px;
  padding-top:6px;
  border-top:1px solid rgba(255,255,255,0.08);
  color:#949ba4;
  font-size:0.65rem;
}

.shot-btns{display:flex;flex-wrap:wrap;gap:5px;margin-top:6px}
.shot-btn{
  display:inline-flex;
  align-items:center;
  min-width:30px;
  height:26px;
  padding:0 8px;
  border-radius:4px;
  background:#4e5058;
  color:#fff;
  font-size:0.75rem;
}
.shot-btn.green{background:#248046}
.shot-btn.primary{background:#5865f2}
.shot-btn.red{background:#da373c}

.shot-code{
  padding:0 4px;
  border-radius:3px;
  background:rgba(0,0,0,0.3);
  font-family:Consolas,monospace;
  font-size:0.92em;
  color:#e6e9f5;
}

.shot-note{
  margin-top:8px;
  padding:7px 10px;
  border:1px solid #2b2d31;
  border-left:3px solid #57f287;
  border-radius:6px;
  background:#1e1f22;
  color:#dbdee1;
  font-size:0.72rem;
  line-height:1.7;
}
.shot-note b{color:#f2f3f5}

/* 固定CTA */
/* 固定CTAが本文に重ならないよう下に余白を確保 */
main{
  padding-bottom:90px;
}

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
  pointer-events:none;
  transition: transform 0.4s ease;
}

@media (prefers-reduced-motion: reduce){
  html{scroll-behavior:auto}
  *,
  *::before,
  *::after{
    animation-duration:0.001ms !important;
    animation-iteration-count:1 !important;
    transition-duration:0.001ms !important;
  }
}
</style>
</head>
<body>
<div id="page-transition"></div>
<div id="progress-bar"></div>

<header>
  <img src="./assets/img/cultivate_icon_210.webp" alt="Cultivate のアイコン">
  <h1>𝓒𝓾𝓵𝓽𝓲𝓿𝓪𝓽𝓮</h1>
  <div class="tagline">これ1つで“運営が回る”界隈サーバーを構築</div>
  <div class="benefit">運営作業の大部分を自動化し、誰でも回せるサーバーへ</div>
  <a href="https://discord.gg/AmMkFhhD2D" class="btn">導入する</a>
</header>

<main>

<section>
  <h2>💡 何ができる？</h2>
  <div class="grid">
    <div class="card">
      <div class="category">🧑‍💼 運営系</div>
      <p>役職パネル / 吊下げメッセージ / チケット予定</p>
    </div>
    <div class="card">
      <div class="category">🎤 VC系</div>
      <p>裏2shot / 寝落ち送り / VC制御</p>
    </div>
    <div class="card">
      <div class="category">⚙️ 自動化</div>
      <p>人数調整 / スポイラー判定 / ロール連携</p>
    </div>
  </div>
</section>

<section>
  <h2>🚀 なぜ使う？</h2>
  <div class="grid">
    <div class="card">運営工数を大幅削減</div>
    <div class="card">イベント進行を自動化</div>
    <div class="card">初心者でも即運用可能</div>
    <div class="card">界隈特化で相性抜群</div>
  </div>
</section>

<section>
  <h2>📥 導入方法</h2>
  <div class="card">
    <p>① サポートサーバー参加 → ② ルール同意 → ③ チケット送信</p>
    <div style="display:flex; gap:12px; flex-wrap:wrap; margin-top:6px;">
      <a href="https://discord.gg/AmMkFhhD2D" class="btn">サポートサーバーへ</a>
      <a href="https://docs.delien.xyz/cultivate/" class="btn" style="background:linear-gradient(45deg,#7c4dff,#00e5ff);">📚 ドキュメントを見る</a>
    </div>
  </div>
</section>

<section>
  <h2>🖼 使用イメージ</h2>
  <p style="color:#8888aa;font-size:0.85rem;margin-bottom:16px;">
    画像は使用せず、実際の Discord 表示を HTML で再現しています（サンプル）。
  </p>

  <div class="shots">

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>設定パネル</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">⚙️</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:00</span></div>
                <div class="shot-embed">
                  <div class="t">どの設定を変更しますか？</div>
                  <div class="f"><div class="fname">コマンド設定</div><div class="fval">⌨️接頭辞変更(デフォルト<span class="shot-code">!?</span>)</div></div>
                  <div class="f"><div class="fname">VC設定</div><div class="fval">🤖Bot接続時自動人数調整</div></div>
                  <div class="f"><div class="fname">投稿設定</div><div class="fval">🖼️画像投稿スポイラー判定</div></div>
                  <div class="f"><div class="fname">プロフィール設定</div><div class="fval">👤プロフィールv1設定</div></div>
                  <div class="foot">Cultivate</div>
                </div>
                <div class="shot-btns">
                  <span class="shot-btn green">⌨️</span>
                  <span class="shot-btn green">🤖</span>
                  <span class="shot-btn green">🖼️</span>
                  <span class="shot-btn green">👤</span>
                  <span class="shot-btn green">🔄</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>⚙️ 設定パネル</h3>
        <p>
          サーバー設定を1つのパネルに集約。項目を選ぶだけで、
          迷わず目的の設定にたどり着けます。
        </p>
        <ul>
          <li>接頭辞・VC人数調整・スポイラー判定などをボタン操作で変更</li>
          <li>実行できるのは管理者権限を持つメンバーだけ</li>
          <li>「🔄」でパネルを最新の状態に再描画</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>裏2shot</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">🔒</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:01</span></div>
                <div class="shot-embed">
                  <div class="t">裏2shot 作成パネル</div>
                  <div class="d">[作成]ボタンを押下すると裏2shotが作成できます。</div>
                </div>
                <div class="shot-btns">
                  <span class="shot-btn green">作成</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>🔒 裏2shot 作成パネル</h3>
        <p>
          メンバーがボタン1つで2人用のVCを作成できます。
          運営が介在しなくても、自然に交流が生まれます。
        </p>
        <ul>
          <li>作成から入室までワンクリック</li>
          <li>プリセットでVC名・色・権限を固定できる</li>
          <li>使われなかったVCは自動で削除</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>裏2shot</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">✅</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:02</span></div>
                <div class="shot-embed">
                  <div class="t">✅ 裏2shot作成完了</div>
                  <div class="d">裏2shotを作成しました。<br>🔊 2shot-ゆうた<br><br>このVCは <strong>30秒以内に入室しないと自動削除</strong> されます。</div>
                </div>
                <div class="shot-note"><b>あなただけに表示</b>：作成結果は実行者のみに届きます。</div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>✅ ワンクリックVC作成</h3>
        <p>
          「作成」を押した瞬間にVCが生成され、結果は実行者のみに通知されます。
          待ち時間も手間もありません。
        </p>
        <ul>
          <li>30秒以内に入室しない場合は自動削除</li>
          <li>カテゴリ上限時は安全に失敗して通知</li>
          <li>作成したVCはDBに記録され、後から追跡できる</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">🔊</span><b>2shot-ゆうた</b>
            <span class="shot-badge">VCテキスト</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">🔔</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:03</span></div>
                <div class="shot-btns"><span class="shot-btn green">ノック</span></div>
              </div>
            </div>
            <div class="shot-note"><b>あなただけに表示</b>：🔔 VCをあなた以外から制限しました！30秒以内に入室しない場合、再ロックされます。</div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>🔔 ノック機能</h3>
        <p>
          入室前に「ノック」で合図を送れる仕組みです。
          無断入室を防ぎ、落ち着いたコミュニケーションを保てます。
        </p>
        <ul>
          <li>ノックした人だけが30秒間入室できる</li>
          <li>入室がなければ自動で再ロック</li>
          <li>VC内の会話を邪魔しない導線</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>寝落ち送り設定</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">💤</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:10</span></div>
                <div class="shot-embed">
                  <div class="t">💤 寝落ち送り設定 (1/2)</div>
                  <div class="f"><div class="fname">📛 プリセット名</div><div class="fval"><span class="shot-code">メイン用</span></div></div>
                  <div class="f"><div class="fname">状態</div><div class="fval">✅ 有効</div></div>
                  <div class="f"><div class="fname">💬 送信チャンネル</div><div class="fval">#寝落ち連絡</div></div>
                  <div class="f"><div class="fname">🔉 送り先VC</div><div class="fval">#寝落ち部屋</div></div>
                </div>
                <div class="shot-btns">
                  <span class="shot-btn green">➕ 新規作成</span>
                  <span class="shot-btn">✏️ 編集</span>
                  <span class="shot-btn red">🗑️ 削除</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>💤 寝落ち送り</h3>
        <p>
          VCで寝落ちしたメンバーを専用VCへ自動で移動します。
          起床時のトラブルや居座りを減らせます。
        </p>
        <ul>
          <li>プリセットごとに送り先VC・対象ロールを指定</li>
          <li>コメント入力を任意で必須にできる</li>
          <li>ホワイトリスト／ブラックリストで対象を制御</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>VCインチャプロフ編集</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">🔊</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:15</span></div>
                <div class="shot-embed">
                  <div class="t">🔊 VCメインプロフ</div>
                  <div class="f"><div class="fname">📛 設定名</div><div class="fval"><span class="shot-code">VCメインプロフ</span></div></div>
                  <div class="f"><div class="fname">🔘 状態</div><div class="fval">✅ 有効</div></div>
                  <div class="f"><div class="fname">📋 使用プリセット</div><div class="fval">1個</div></div>
                </div>
                <div class="shot-btns">
                  <span class="shot-btn green">✅ 有効/無効</span>
                  <span class="shot-btn">📋 使用プリセット</span>
                  <span class="shot-btn green">💾 保存</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>🔊 VCインチャプロフィール</h3>
        <p>
          VCに入室したときに、プロフィールカードをテキストチャンネルへ自動投稿。
          初対面でも会話のきっかけが生まれます。
        </p>
        <ul>
          <li>プリセットでカードの見た目を切り替え</li>
          <li>表示するVC・カテゴリを細かく制御</li>
          <li>退出時には自動で削除</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>ひみつ便</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">💌</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:20</span></div>
                <div class="shot-embed">
                  <div class="t">DM便</div>
                  <div class="d"><strong>ほげほげ</strong><br><span style="color:#00a8fc;">プロフィールはコチラ</span></div>
                </div>
                <div class="shot-btns"><span class="shot-btn green">💌 送る</span></div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>💌 ひみつ便</h3>
        <p>
          パネルのボタンから、相手へDMでメッセージを送れます。
          言い出しにくい連絡もやさしく届きます。
        </p>
        <ul>
          <li>送信先やテンプレートをプリセットで管理</li>
          <li>通知方法（DM／スレッド）を選択</li>
          <li>返信ボタンで双方向のやり取りが可能</li>
        </ul>
      </div>
    </article>

    <article class="shot-row">
      <div class="shot-visual">
        <div class="shot">
          <div class="shot-bar">
            <span class="hash">#</span><b>定期メッセージ設定</b>
            <span class="shot-badge">プレビュー</span>
          </div>
          <div class="shot-body">
            <div class="shot-msg">
              <div class="shot-avatar">⏰</div>
              <div class="shot-main">
                <div class="shot-head"><b>Cultivate</b><span class="shot-bot">BOT</span><span class="shot-time">今日 20:25</span></div>
                <div class="shot-embed">
                  <div class="t">⏰ 定期告知</div>
                  <div class="f"><div class="fname">📌 送信先チャンネル</div><div class="fval">#general</div></div>
                  <div class="f"><div class="fname">⏱️ 送信間隔</div><div class="fval"><span class="shot-code">600</span>秒</div></div>
                  <div class="f"><div class="fname">状態</div><div class="fval">🟢 有効</div></div>
                  <div class="foot">ページ 1/1 | 合計: 1件</div>
                </div>
                <div class="shot-btns">
                  <span class="shot-btn primary">✏️ 編集</span>
                  <span class="shot-btn green">➕ 新規作成</span>
                  <span class="shot-btn red">🗑️ 削除</span>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="shot-info">
        <h3>⏰ 定期メッセージ</h3>
        <p>
          告知やルールを決まった間隔で自動投稿します。
          運営が毎回手動で投稿する必要がなくなります。
        </p>
        <ul>
          <li>プリセットで文面・送信先・間隔を管理</li>
          <li>自動削除や再投稿時の削除にも対応</li>
          <li>投稿者プリセットと連携して見た目を統一</li>
        </ul>
      </div>
    </article>

  </div>
</section>

<div style="position:absolute; top:20px; left:20px;">
  <a href="../" class="btn">← 戻る</a>
</div>

<div class="fixed-cta">
  <a href="https://discord.gg/AmMkFhhD2D" class="btn">導入</a>
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
},{threshold:0, rootMargin:"0px 0px -10% 0px"});
sections.forEach(s=>observer.observe(s));

document.querySelectorAll("a").forEach(link=>{
  link.addEventListener("click", function(e){
    const href = this.getAttribute("href");

    if(href && !href.startsWith("#") && !this.target){
      e.preventDefault();

      const overlay = document.getElementById("page-transition");

      // 🔥 行き先ごとの色
      if(href.includes("cultivate")){
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
