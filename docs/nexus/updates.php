<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - ねくさす⋆˚ʚɞ ドキュメント'; ?>
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
      <div class="feature-hero">
        <div class="feature-icon">📋</div>
        <h1>更新履歴</h1>
        <p>ねくさす⋆˚ʚɞ のアップデート情報</p>
      </div>

      <!-- ========================================================= -->
      <!-- フィルター -->
      <!-- ========================================================= -->

      <div class="filter-bar">
        <span class="filter-label">🔍 絞り込み：</span>
        <button class="filter-tag active" data-filter="all">すべて</button>
        <button class="filter-tag" data-filter="feature">
          <span class="tag tag-feature">新機能 / 機能改善</span>
        </button>
        <button class="filter-tag" data-filter="bug">
          <span class="tag tag-bug">バグ修正</span>
        </button>
        <button class="filter-tag" data-filter="rank">
          <span class="tag tag-rank">ランク</span>
        </button>
        <button class="filter-tag" data-filter="profile">
          <span class="tag tag-profile">プロフィール</span>
        </button>
        <button class="filter-tag" data-filter="info">
          <span class="tag tag-info">システム</span>
        </button>
      </div>

      <!-- ========================================================= -->
      <!-- 2026年10月 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">2026/10</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature info">
        <div class="update-icon">💬</div>
        <div class="update-body">
          <div class="update-title">
            交流計測v2 を追加
            <span class="update-date">2026/10/07</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li>
              在室ファクト（5分バケット）＋定期集計方式の
              <strong>交流計測v2</strong> を追加
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              設定を変更すると、過去の在室記録から
              <strong>ランキングを自動で再集計</strong>するように
            </li>
            <li>
              固定ランキング（全員 / 異性 / 同性）と
              カスタムランキング定義に対応
            </li>
            <li>
              コマンドは <code>/交流計測v2 設定</code> など。
              現在はベータ導入サーバーのみで提供
              <span class="tag tag-info">システム</span>
            </li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature rank info">
        <div class="update-icon">🏆</div>
        <div class="update-body">
          <div class="update-title">
            ランクシステムを刷新（VC専用モード）
            <span class="update-date">2026/09/28</span>
            <span class="tag tag-rank">ランク</span>
          </div>
          <ul>
            <li>
              Cultivate 由来の新しいランクシステムに更新し、
              ねくさす⋆˚ʚɞ では<strong>VC計測専用</strong>として動作するように
              <span class="tag tag-rank">ランク</span>
            </li>
            <li>
              チャット系の設定項目（チャット計測・チャットWH/BL・ボーナス・
              カスタムメッセージ）を非表示にし、
              VC の設定だけに絞り込み
            </li>
            <li>
              <strong>🎤 VC条件</strong>を拡張 —
              VC の必要人数に加えて、自分 / 同席者のロール条件と
              「人数不足時のXP倍率」を設定できるように
            </li>
            <li>
              <strong>🎴 ランクカード設定</strong>を追加 —
              カードの色と、順位・合計EXP・現在XP・必要XPの非表示を切り替え可能
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              <strong>📌 ランク確認パネル</strong>を追加 —
              チャンネルに設置したパネルのボタンから
              自分のランクカードを確認可能（吊り下げ対応）
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              <strong>🎭 ランクロール制御 / 高度制御</strong>を追加 —
              レベル条件とロールを一覧で管理し、
              「現在レベルのロール反映」で一括付与
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              <strong>📋 ログ機能設定</strong>を追加 —
              6カテゴリの出力先チャンネルを設定
              （現在は期間ランキングのみ実際に出力）
            </li>
            <li>
              期間ランキング（週間・月間）を追加 —
              期間切り替え時に集計結果をログ出力
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              絵文字描画を専用モジュールに分離し、
              表示名の絵文字・記号をカラーで描画できるように
              <span class="tag tag-feature">機能改善</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- v1.0.0 — 初回リリース -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v1.0.0</div>
        <p class="version-date">2026年8月</p>
      </div>

      <div class="update-card" data-tags="feature rank profile info">
        <div class="update-icon">🌙</div>
        <div class="update-body">
          <div class="update-title">
            v1.0.0 — ねくさす⋆˚ʚɞ 初回リリース
            <span class="update-date">2026/08/18</span>
            <span class="tag tag-feature">新機能</span>
          </div>
          <ul>
            <li>
              <strong>📸 プロフィール保存</strong> —
              メッセージリンクからプロフィールを保存・再表示
              <span class="tag tag-profile">プロフィール</span>
            </li>
            <li>
              <strong>🌐 マイプロフ（鯖間プロフ）</strong> —
              他鯖のプロフ引用・DM / スレッド保存・パネル設置によるボタン操作
              <span class="tag tag-profile">プロフィール</span>
            </li>
            <li>
              <strong>💬 交流計測</strong> —
              VC 同席記録に基づく交流人数の計測とランキング表示
              <span class="tag tag-feature">新機能</span>
            </li>
            <li>
              <strong>🏆 ランクシステム</strong> —
              VC 滞在時間に応じた XP 獲得・レベルアップ
              <span class="tag tag-rank">ランク</span>
            </li>
            <li>
              <strong>🖥️ Bot 管理</strong> —
              導入サーバー一覧の表示などの管理コマンド
              <span class="tag tag-info">システム</span>
            </li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 開発準備期 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">🏗️ 開発準備期</div>
        <p class="version-date">2026年上半期</p>
      </div>

      <div class="update-card" data-tags="wip">
        <div class="update-icon">🚀</div>
        <div class="update-body">
          <div class="update-title">
            共同開発プロジェクト 〜 ねくさす⋆˚ʚɞ 誕生
            <span class="update-date">2026/01 〜 2026/08</span>
            <span class="tag tag-wip">開発中</span>
          </div>
          <ul>
            <li>2026年1月 — ねくさす⋆˚ʚɞ プロジェクト始動</li>
            <li><strong>VC交流計測機能</strong>の設計・開発</li>
            <li><strong>鯖間プロフ取得機能</strong>の設計・開発</li>
            <li><strong>VCランクシステム</strong>の設計・開発</li>
          </ul>
        </div>
      </div>

      <!-- ========================================================= -->
      <!-- 凡例 -->
      <!-- ========================================================= -->

      <div class="legend-box">
        <strong>🏷️ タグ凡例</strong>
        <span class="tag tag-feature">新機能 / 機能改善</span>
        <span class="tag tag-bug">バグ修正</span>
        <span class="tag tag-rank">ランク</span>
        <span class="tag tag-profile">プロフィール</span>
        <span class="tag tag-info">システム</span>
      </div>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>

</body>
</html>
