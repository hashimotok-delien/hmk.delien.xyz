<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '更新履歴 - RoyalGuide ドキュメント'; ?>
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
        <p>RoyalGuide のアップデート情報</p>
      </div>

      <!-- フィルター（data-filter は update-card の data-tags と揃える） -->
      <div class="filter-bar">
        <span class="filter-label">🔍 絞り込み：</span>
        <button class="filter-tag active" data-filter="all">すべて</button>
        <button class="filter-tag" data-filter="feature">
          <span class="tag tag-feature">新機能 / 機能改善</span>
        </button>
        <button class="filter-tag" data-filter="bug">
          <span class="tag tag-bug">バグ修正</span>
        </button>
        <button class="filter-tag" data-filter="info">
          <span class="tag tag-info">システム</span>
        </button>
      </div>

      <!-- ========================================================= -->
      <!-- v0.3.1 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.3.1</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">🐛</div>
        <div class="update-body">
          <div class="update-title">
            バグ修正
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>サーバー読み上げ設定のモーダルが開けない不具合を修正しました（Component V2 のラベル二重指定）。</li>
            <li>音声設定のモーダルも同じ形式に統一しました。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.3.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.3.0</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🔧</div>
        <div class="update-body">
          <div class="update-title">
            読み上げ挙動設定
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/サーバー読み上げ設定</code> に「🔧 読み上げ挙動設定」を追加しました。</li>
            <li>VC入場時・離脱時の読み上げメッセージ、名前を読まない待機期間、使用する名前の種類を設定できます。</li>
            <li>発言者の名前・入退室・添付ファイル・スタンプ・カスタム絵文字・連続した同じ文章・VC在室者のみ、を個別にON/OFFできます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🗣️</div>
        <div class="update-body">
          <div class="update-title">
            VCごとの読み上げ
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li>1つのVCにつき1台のBotが担当し、別のVCは別の号機が同時に担当できます。</li>
            <li>使用中のVCでは入れ替えを行わず、担当中のBotを案内します。</li>
            <li>指定したBotが使用中の場合は、空いている号機へ自動で割り当てます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">🐛</div>
        <div class="update-body">
          <div class="update-title">
            バグ修正
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>RoyalGuide01 の音声設定が 02 / 03 に反映されない問題を修正しました（系列Bot共通のストレージキーを使用）。</li>
            <li>既存の読み上げを強制的に入れ替えてしまう問題を修正しました。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.2.3 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.2.3</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">🐛</div>
        <div class="update-body">
          <div class="update-title">
            バグ修正
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>読み上げ開始メッセージの「音声」欄を修正しました（VOICEVOX 未起動時の代替音声・ロール音声ルール・投稿者ごとの適用を正しく表示）。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.2.2 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.2.2</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">🐛</div>
        <div class="update-body">
          <div class="update-title">
            バグ修正
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>系列Botへ委譲した読み上げが開始できない不具合を修正しました（接続処理の引数不一致）。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.2.1 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.2.1</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🤝</div>
        <div class="update-body">
          <div class="update-title">
            系列Botへの読み上げ委譲
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/読み上げ開始 [bot]</code> で、読み上げを担当する系列Botを指定できるようになりました。</li>
            <li>指定したBotが使用中・応答なしの場合は、自動で別の系列Botへ切り替えます。</li>
            <li>実行は担当Bot自身が行います（他Botのトークンやコマンドを代行しません）。</li>
            <li><code>/読み上げ終了</code> <code>/読み上げスキップ</code> <code>/読み上げ状態</code> も担当Botへ委譲します。</li>
            <li>開始時は、以前の担当Botを自動で停止します（二重再生の防止）。</li>
            <li>読み上げの操作コマンドは RoyalGuide01 に集約されました。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.2.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.2.0</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🗣️</div>
        <div class="update-body">
          <div class="update-title">
            読み上げ（Text To Speech）
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/読み上げ開始</code> <code>/読み上げ終了</code> <code>/読み上げスキップ</code> <code>/読み上げ状態</code> を追加しました。</li>
            <li>edge-tts（Azure）に加え、VOICEVOX Engine の話者（ずんだもん等）に対応しました。</li>
            <li>メンション・ロール・チャンネル・カスタム絵文字・URL を読み上げ用に整形し、長文は文単位で分割します。</li>
            <li>音声は投稿者ごとに解決します（ロール設定 → ユーザー設定 → サーバーデフォルト の順）。</li>
            <li>VC から人がいなくなると自動で退出します。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">🔊</div>
        <div class="update-body">
          <div class="update-title">
            音声設定
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/音声設定</code> から、ユーザーごとの音量・話者・話速を設定できるようにしました。</li>
            <li>サーバーデフォルトも同じパネルから設定できます（サーバー管理権限）。</li>
            <li>適用順は「ユーザー設定 → サーバーデフォルト → 全体既定」です。未設定の項目は自動でフォールバックします。</li>
            <li>サーバー側で許可された話者のみ保存でき、話速・音量は設定された範囲内へ自動補正されます。</li>
            <li>ロール音声ルールに一致するユーザーは話者を変更できません。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">⚙️</div>
        <div class="update-body">
          <div class="update-title">
            サーバー読み上げ設定（RoyalGuide01 限定）
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/サーバー読み上げ設定</code>（管理者）から 5 つの設定を編集できます。</li>
            <li>読み上げ開始/終了テキスト（既定: <code>読み上げ起動</code> / <code>読み上げ停止</code>）。その文字だけを送ると開始・終了します。</li>
            <li>全インスタンスで共有し、最初に応答した 1 台だけが処理します。</li>
            <li>サーバーデフォルト音声・サーバー音声制御（許可話者・話速/音量の上下限）・サーバーロール音声制御に対応しました。</li>
            <li>ロール音声制御はページネーション付きで、新規追加・編集・削除・デフォルトに戻すを操作できます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">📚</div>
        <div class="update-body">
          <div class="update-title">
            読み上げ辞書
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li><code>/辞書 追加</code> <code>/辞書 削除</code> <code>/辞書 一覧</code> <code>/辞書 出力</code> <code>/辞書 読み込み</code> を追加しました。</li>
            <li>形式は ShabeleA 互換の <code>単語,読み</code>（UTF-8）。出力したファイルをそのまま読み込めます。</li>
            <li>長い単語を優先して置換します。最大 2,000 件まで登録できます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">🗄️</div>
        <div class="update-body">
          <div class="update-title">
            システム
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>データストアを MySQL/MariaDB から MongoDB へ移行しました。</li>
            <li>全インスタンスが同一の MongoDB を共有し、設定変更は Change Streams で即時同期されます（利用できない場合は差分ポーリング）。</li>
            <li>設定コグ（音声設定・基本設定・投稿者設定・サーバー読み上げ設定）は RoyalGuide01 のみで動作します。</li>
            <li>ダッシュボード連携（heartbeat・ログ転送・設定スキーマ・リソース統計）に対応しました。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="bug">
        <div class="update-icon">🐛</div>
        <div class="update-body">
          <div class="update-title">
            バグ修正
            <span class="update-date">2026/10/31</span>
            <span class="tag tag-bug">バグ修正</span>
          </div>
          <ul>
            <li>既存インデックスと名前が異なることで起動時に <code>IndexOptionsConflict</code>（コード 85）が発生する問題を修正しました。</li>
            <li>MongoDB の認証・権限エラー時に、原因と対処が分かるログを出力するようにしました。</li>
          </ul>
        </div>
      </div>
      <!-- ========================================================= -->
      <!-- v0.1.0 -->
      <!-- ========================================================= -->

      <div class="update-version">
        <div class="version-badge">v0.1.0</div>
        <p class="version-date">2026年10月</p>
      </div>

      <div class="update-card" data-tags="feature">
        <div class="update-icon">✨</div>
        <div class="update-body">
          <div class="update-title">
            初回リリース
            <span class="update-date">2026/10/18</span>
            <span class="tag tag-feature">新機能 / 機能改善</span>
          </div>
          <ul>
            <li>投稿者プリセットの管理（<code>/投稿者設定</code>）。作成・編集・削除をボタンで操作し、設定名・表示名・アイコンURL・アップロード画像を保持します。</li>
            <li>保存先チャンネルの一元管理（<code>/基本設定</code>）。グローバル／投稿者設定／交流スタンプラリーの保存先を設定できます。</li>
            <li>SoundCloud の再生機能。曲・プレイリストの URL から再生し、キュー（最大100曲）に対応します。</li>
            <li>再生コントロールパネル。一時停止・スキップ・停止・シャッフル・ループ（オフ／1曲／全体）を絵文字ボタンで操作できます。</li>
            <li>サーバーごとの既定音量設定（<code>/defaultvolume</code>）。0〜200% の範囲で保存できます。</li>
          </ul>
        </div>
      </div>

      <div class="update-card" data-tags="info">
        <div class="update-icon">⚙️</div>
        <div class="update-body">
          <div class="update-title">
            システム
            <span class="update-date">2026/10/18</span>
            <span class="tag tag-info">システム</span>
          </div>
          <ul>
            <li>複数インスタンスでの起動に対応しました。</li>
            <li>機能ごとに独立したシステムコグ構成へ移行し、他の Bot への移植がしやすい形になりました。</li>
            <li>本ドキュメントサイトを公開しました。</li>
          </ul>
        </div>
      </div>

      <!-- 更新を追加するときは
           <div class="update-version">…</div> と
           <div class="update-card" data-tags="…">…</div> をセットで先頭に追記する -->

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
