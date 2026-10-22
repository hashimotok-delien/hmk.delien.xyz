<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = 'ランクシステム - ねくさす⋆˚ʚɞ ドキュメント'; ?>
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <?php include __DIR__ . '/../assets/include/header.php'; ?>
</head>
<body>
  <?php include __DIR__ . '/../assets/include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../assets/include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">🏆</div>
        <h1>ランクシステム</h1>
        <p>VC滞在時間を計測してレベルアップ</p>
      </div>

      <div class="alert alert-info">
        <p><strong>💡 ランクシステムとは？</strong>
        VC の滞在時間に応じて<strong>経験値（XP）</strong>を獲得し、
        レベルアップしていくシステムです。
        サーバーごとに自由に成長曲線を設計できます。</p>
        <p><strong>🎯 設計思想:</strong>
        レベルは常に XP から<strong>その場計算</strong>されます。
        保存されるのは生の XP 値のみで、ランク表示時に設定に応じてレベルを算出します。
        そのため、成長曲線を変更しても過去の XP から新しいレベルが自動的に再計算されます。</p>
      </div>

      <div class="alert alert-warning">
        <p><strong>🎤 ねくさす⋆˚ʚɞ では VC 計測専用です</strong></p>
        <p>
          本 Bot では<strong>チャットメッセージ・VC内チャット（インチャット）</strong>の
          XP 計測は行いません。<strong>VC 滞在時間のみ</strong>で XP を獲得できます。
          そのため設定パネルでは「💬 チャット計測」「#️⃣ チャット WH/BL」
          「📝 ボーナス」「💬 カスタムメッセージ」などのチャット系項目は表示されず、
          「🎤 VC計測」は<strong>解除できない必須機能</strong>として扱われます。
        </p>
      </div>

      <!-- ============================================================ -->
      <!-- 概要 -->
      <!-- ============================================================ -->
      <h2>概要</h2>
      <p>
        ランクシステムは、ユーザーの VC 活動量を可視化する機能です。
        VC への接続時間に応じて XP が溜まり、一定量貯まると<strong>レベルアップ</strong>します。
      </p>
      <p>
        ミュート勢の利便性を考慮し、<strong>ミュート中でも XP が獲得できる</strong>設計です。
        VC 接続中は<strong>1分ごとの自動加算</strong>と
        <strong>切断時の比例計算</strong>の両方で XP が付与されます。
      </p>
      <p>
        1つのサーバーに複数の<strong>プリセット</strong>を作成でき、
        同時に有効化できるのは<strong>無料で3つ・プレミアムで10個</strong>までです。
        有効化したプリセットはすべて並行して XP を計測します。
      </p>

      <!-- ============================================================ -->
      <!-- 機能一覧 -->
      <!-- ============================================================ -->
      <h2>機能一覧</h2>
      <p>設定パネルで ON / OFF できる機能モジュールの一覧です。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>機能</th><th>説明</th><th>初期値</th></tr>
        </thead>
        <tbody>
          <tr><td>🎤 VC計測（必須）</td><td>VC接続時間に応じてXPを付与（ミュート中もOK／解除不可）</td><td>🟢 常時ON</td></tr>
          <tr><td>🎤 VC WL/BL</td><td>XP を獲得できる VC・カテゴリを許可 / 拒否で指定</td><td>🔴 OFF</td></tr>
          <tr><td>📅 XPキャップ</td><td>日次・週次の XP 上限を設定</td><td>🔴 OFF</td></tr>
          <tr><td>🎤 VC条件</td><td>VC の必要人数・同席者/自分のロール条件・人数不足時のXP倍率</td><td>🔴 OFF</td></tr>
          <tr><td>🚀 イベントブースト</td><td>期間限定で VC XP 獲得量に倍率を適用</td><td>🔴 OFF</td></tr>
          <tr><td>🟢 有効期間</td><td>ランク計測を特定の期間だけ有効化</td><td>🔴 OFF</td></tr>
          <tr><td>🎭 ランクロール制御</td><td>レベル条件を満たしたユーザーに付与するロールを登録</td><td>🔴 OFF</td></tr>
          <tr><td>🎭 ランクロール高度制御</td><td>レベル条件でロールを付与 / 剥奪する設定を登録（制御とは排他）</td><td>🔴 OFF</td></tr>
          <tr><td>🎴 ランクカード設定</td><td>ランクカードの色・非表示項目を設定</td><td>🟢 ON</td></tr>
        </tbody>
      </table></div>
      <p>
        このほか、機能モジュールとは別に
        「プリセット有効」「⭐ メイン設定」「XP統合設定」「成長テンプレート」
        「通知CH」「上限Lv」「ログ機能」などが常に設定できます。
      </p>

      <!-- ============================================================ -->
      <!-- 経験値の獲得方法 -->
      <!-- ============================================================ -->
      <h2>経験値の獲得方法</h2>

      <h3>🎤 VC経験値</h3>
      <ul>
        <li>VC接続中は<strong>1分ごとの自動加算</strong>（毎分実行されるtick処理）でXPが付与</li>
        <li>VC切断時（またはVC移動時）は、前回加算からの<strong>経過秒数で比例計算</strong>して加算</li>
        <li>1分あたりのXP × (経過秒数 / 60) で計算（端数も計算）</li>
        <li><strong>自分以外のメンバーが条件人数以上いる場合のみ</strong>付与（初期値は自分以外1人＝合計2人以上）</li>
        <li><strong>ミュート中でもXPが獲得可能</strong></li>
        <li>VC WL/BL で拒否されている VC では付与されません</li>
        <li>自分・同席者のロール条件を満たさない場合は付与されません</li>
        <li>有効期間外・プリセット無効時は付与されません</li>
      </ul>

      <div class="alert alert-warning">
        <p><strong>⚠️ 注意:</strong>
        Bot が停止している間に VC から抜けた場合、その区間の XP は付与されません。
        停止中も VC に残っていた場合、Bot 再起動後の接続分から計測されます。</p>
      </div>

      <h3>⏳ VC最小接続時間</h3>
      <p>
        VC 接続後、<strong>指定分数未満</strong>で切断した場合は
        切断時の精算が行われません。
        初期値は<strong>1分</strong>で、0 を設定すると
        最小時間の判定なしで<strong>秒単位の比例計算</strong>になります。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>設定値</th><th>接続時間</th><th>切断時の精算</th></tr>
        </thead>
        <tbody>
          <tr><td><code>1</code>（初期値）</td><td>30秒</td><td>❌ 精算しない</td></tr>
          <tr><td><code>1</code>（初期値）</td><td>90秒</td><td>✅ 残り秒数を比例計算</td></tr>
          <tr><td><code>3</code></td><td>2分</td><td>❌ 精算しない（3分未満）</td></tr>
          <tr><td><code>0</code></td><td>30秒</td><td>✅ 30秒分を比例計算</td></tr>
        </tbody>
      </table></div>
      <p>
        <strong>1分ごとの自動加算は最小接続時間の影響を受けません。</strong>
        接続から1分経過した時点で加算され、以降は1分ごとに加算されます。
        最小接続時間は「切断時に残り時間を精算するかどうか」の条件です。
      </p>

      <h3>🎤 VC条件</h3>
      <p>VC で XP を獲得するための条件を設定できます。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>項目</th><th>説明</th><th>初期値</th></tr>
        </thead>
        <tbody>
          <tr><td>自分以外の必要人数</td><td>自分と Bot を除いた同席者の最低人数</td><td><code>1</code>（合計2人以上）</td></tr>
          <tr><td>🛡️ VC同席者ロール</td><td>同席者のいずれかが必要なロール（未設定なら条件なし）</td><td>なし</td></tr>
          <tr><td>🎯 VC自分ロール</td><td>自分が持っている必要があるロール（未設定なら条件なし）</td><td>なし</td></tr>
          <tr><td>人数不足時のVC XP倍率</td><td>人数が足りないときに掛ける倍率（0.0～1.0）</td><td><code>0.0</code>（付与なし）</td></tr>
        </tbody>
      </table></div>
      <ul>
        <li>ロール条件は「いずれか1つを持っていればOK」の<strong>OR条件</strong>です</li>
        <li>「人数不足時のXP倍率」が 0 の場合、人数不足のユーザーは<strong>セッション自体が作成されません</strong></li>
        <li>0.1～1.0 を設定すると、人数不足でも<strong>通常XP × 倍率</strong>が付与されます（例: <code>0.2</code> → 通常の20%）</li>
        <li><strong>VC自分ロール</strong>は、ランク確認パネルの「確認」ボタンでも判定に使われます</li>
      </ul>

      <!-- ============================================================ -->
      <!-- ランダムEXPシステム -->
      <!-- ============================================================ -->
      <h2>ランダムEXPシステム</h2>
      <p>
        1分あたりの VC XP の決め方を4つのモードから選べます。
        設定は「💬🎤 XP統合設定」から行います。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>モード</th><th>概要</th><th>入力例</th></tr>
        </thead>
        <tbody>
          <tr><td>固定</td><td>入力した値がそのまま1分あたりのXPになる</td><td><code>10</code></td></tr>
          <tr><td>🎲 ランダム①（一様分布）</td><td>下限～上限から一様に抽選</td><td><code>1~10</code></td></tr>
          <tr><td>🎲 ランダム②（三角分布）</td><td>下限～上限から三角分布で抽選（下限に寄る）</td><td><code>1~10</code></td></tr>
          <tr><td>🎯 カスタム数式</td><td>下限・上限・乱数を使って自由に計算</td><td><code>lo + int(R * (hi - lo + 1))</code></td></tr>
        </tbody>
      </table></div>
      <p>
        モードによって入力欄の意味が変わります。
        固定モードでは「VC XP/分」に<strong>固定値</strong>を入力し、
        ランダム・カスタム数式モードでは「<strong>下限~上限</strong>」の形式で入力します。
      </p>
      <ul>
        <li><strong>VC倍率</strong>: 計算結果に掛ける倍率（初期値 <code>1.0</code>）</li>
        <li>実際の付与XPは「1分あたりのXP × 経過分数」で計算されます</li>
      </ul>

      <h3>カスタム数式モード（モード3）</h3>
      <p>使用できる変数と関数は以下のとおりです。</p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>記号</th><th>意味</th></tr>
        </thead>
        <tbody>
          <tr><td><code>lo</code></td><td>設定した下限XP</td></tr>
          <tr><td><code>hi</code></td><td>設定した上限XP</td></tr>
          <tr><td><code>R</code></td><td>0～1 のランダム値</td></tr>
          <tr><td><code>int()</code> / <code>min()</code> / <code>max()</code> など</td><td>一般的な数値関数</td></tr>
        </tbody>
      </table></div>
      <p>設定例：</p>
      <pre><code># 一様ランダムと同じ挙動
lo + int(R * (hi - lo + 1))

# 正規分布風
int((lo + hi) / 2 + (R - 0.5) * (hi - lo))

# 高確率で最大値近く
int(hi * R ** 0.5)</code></pre>
      <div class="alert alert-info">
        <p><strong>💡 数式が不正な場合:</strong>
        設定時に検証が行われ、エラーがあれば保存されません。
        保存済みの数式が後から評価できなくなった場合は固定値にフォールバックします。</p>
      </div>

      <!-- ============================================================ -->
      <!-- 拡張機能 -->
      <!-- ============================================================ -->
      <h2>拡張機能</h2>

      <h3>🎤 VC WL/BL（VCフィルター）</h3>
      <p>
        XP を獲得できる VC を<strong>ホワイトリスト（許可）</strong>と
        <strong>ブラックリスト（拒否）</strong>で指定できます。
      </p>
      <div class="table-wrapper"><table>
        <thead><tr><th>リスト</th><th>挙動</th></tr></thead>
        <tbody>
          <tr><td>✅ ホワイトリスト</td><td>設定されている場合、該当 VC CH / カテゴリのみ XP 計測。未設定（空）ならすべての VC が対象。</td></tr>
          <tr><td>❌ ブラックリスト</td><td>該当 VC CH / カテゴリを XP 計測から除外（ホワイトリストより優先）。</td></tr>
        </tbody>
      </table></div>
      <p>設定できるのは以下の4項目です（各最大25件）。</p>
      <ul>
        <li>✅ VCカテゴリWH（そのカテゴリ内の全VCが対象）</li>
        <li>✅ VCチャンネルWH（個別のVCが対象）</li>
        <li>❌ VCカテゴリBL（そのカテゴリ内の全VCを除外）</li>
        <li>❌ VCチャンネルBL（個別のVCを除外）</li>
      </ul>
      <p>対象となるチャンネル種別は<strong>ボイスチャンネル</strong>と<strong>ステージチャンネル</strong>です。</p>
      <div class="alert alert-info">
        <p><strong>💡 機能を OFF にすると</strong>、設定済みの WH / BL はすべてクリアされます。</p>
      </div>

      <h3>📅 XPキャップ</h3>
      <p>獲得XPの上限を設定できます。<code>0</code> を設定すると上限なし（初期値）です。</p>
      <ul>
        <li><strong>日次上限</strong>: 1日あたりの獲得XP上限</li>
        <li><strong>週次上限</strong>: 1週間あたりの獲得XP上限</li>
        <li>機能を ON にした時点で未設定だった場合は、日次 <code>100</code> / 週次 <code>500</code> が入ります</li>
        <li>機能を OFF にすると日次・週次ともに <code>0</code>（上限なし）に戻ります</li>
      </ul>
      <div class="alert alert-warning">
        <p><strong>⚠️ 現在のVC専用モードでの挙動:</strong>
        XP キャップは<strong>チャットXPにのみ適用</strong>されており、
        VC で獲得した XP には適用されません。
        本 Bot は VC 計測専用のため、実質的にこの設定は効果を持ちません。
        詳細は<a href="../known-issues">既知の不具合</a>を参照してください。</p>
      </div>

      <h3>🚀 イベントブースト</h3>
      <p>特定の期間、XP 獲得量に倍率を掛けられるイベント機能です。</p>
      <ul>
        <li><strong>VC倍率</strong>を設定（初期値 <code>2.0</code>）</li>
        <li>開始日時・終了日時を <code>YYYY/MM/DD HH:MM</code> 形式で設定（空欄可）</li>
        <li>期間外・無効時は倍率 <code>1.0</code>（通常状態）</li>
        <li>1分ごとの自動加算・切断時の精算の<strong>どちらにも適用</strong>されます</li>
      </ul>

      <h3>🟢 有効期間</h3>
      <p>ランクシステムの計測自体を特定の期間だけ有効にできます。</p>
      <ul>
        <li><strong>開始日時</strong>のみ設定 → その日時以降のみ計測</li>
        <li><strong>終了日時</strong>のみ設定 → その日時までのみ計測</li>
        <li>両方空欄 → 常時有効（初期値）</li>
        <li>有効期間外は一切XPが付与されません</li>
      </ul>

      <h3>🎭 ランクロール制御 / 高度制御</h3>
      <p>
        「必要VCレベル」と「付与するロール」をセットで複数登録できる一覧型の設定です。
        1件が1ページで表示され、<strong>➕新規作成 / ✏️名前変更 / ⚙️設定 / 🗑️削除</strong>で管理します。
      </p>
      <div class="table-wrapper"><table>
        <thead><tr><th>種類</th><th>設定できる内容</th></tr></thead>
        <tbody>
          <tr><td>🎭 ランクロール制御</td><td>必要VCレベル／付与ロール</td></tr>
          <tr><td>🎭 ランクロール高度制御</td><td>必要VCレベル／➕付与ロール／➖剥奪ロール</td></tr>
        </tbody>
      </table></div>
      <div class="alert alert-info">
        <p><strong>💡 2つの機能は排他です。</strong>
        片方を ON にすると、もう片方は自動的に OFF になります。</p>
      </div>
      <div class="alert alert-warning">
        <p><strong>⚠️ 現在の実装状況:</strong>
        ここで登録した内容は<strong>保存されるのみ</strong>で、
        レベルアップ時の自動付与・剥奪はまだ行われません。</p>
        <p>
          プリセット一覧の<strong>「🎭 現在レベルのロール反映」</strong>ボタンは、
          プリセットに保存された<strong>レベル → ロールの対応表</strong>を参照して
          一括付与を行います。
          この対応表は旧バージョンから引き継いだ設定で、現在の設定画面からは編集できません。
        </p>
      </div>

      <h3>🎴 ランクカード設定</h3>
      <p>ランクカードの見た目を変更できます。</p>
      <div class="table-wrapper"><table>
        <thead><tr><th>項目</th><th>説明</th><th>初期値</th></tr></thead>
        <tbody>
          <tr><td>🎨 カラーコード</td><td>アイコンのリング・メーターの色（<code>#RRGGBB</code>）</td><td><code>#7289DA</code></td></tr>
          <tr><td>🔒 次レベル必要経験値を隠す</td><td>メーター内の必要XPを <code>???</code> にする</td><td>OFF</td></tr>
          <tr><td>👁️ 順位を隠す</td><td>メーター上の順位表示を非表示にする</td><td>OFF</td></tr>
          <tr><td>👁️ 合計経験値を隠す</td><td>メーター上の合計EXP表示を非表示にする</td><td>OFF</td></tr>
          <tr><td>👁️ 現在経験値を隠す</td><td>メーター内の現在XPを <code>???</code> にする</td><td>OFF</td></tr>
        </tbody>
      </table></div>
      <p>
        「現在経験値」と「次レベル必要経験値」の<strong>両方を隠す</strong>と、
        メーター内は進捗パーセント（例: <code>45%</code>）のみ表示されます。
      </p>

      <!-- ============================================================ -->
      <!-- ランキング -->
      <!-- ============================================================ -->
      <h2>📊 ランキング</h2>
      <p>
        <code>/ランキング</code> コマンドでサーバー内の XP ランキングを表示できます。
      </p>
      <ul>
        <li>プリセットの一覧がページネーションで表示される（メイン設定は⭐表示）</li>
        <li>「✅ 選択」ボタン → Modal で<strong>種別</strong>と<strong>期間</strong>を選んで実行</li>
        <li>VC専用モードのため、種別は<strong>VC のみ</strong>（固定）</li>
        <li><strong>XP が 0 のユーザーは表示されません</strong></li>
        <li>表示はメダル絵文字（🥇🥈🥉…）付きの <strong>TOP10</strong></li>
        <li>各行は「表示名 - Lv.X (XP)」の形式</li>
      </ul>
      <p>期間は「全期間」「週間」「月間」から選べます。コマンドの引数でも指定できます。</p>

      <h3>期間ランキング</h3>
      <ul>
        <li><strong>週間</strong>: ISO週単位（月曜～日曜）。週が変わると前週のデータを集計してログ出力し、削除します</li>
        <li><strong>月間</strong>: 暦月単位（1日～月末）。月が変わると前月分を同様に処理します</li>
        <li>期間の切り替えは<strong>5分ごと</strong>にチェックされます</li>
        <li>期間ランキングの Lv は、その期間中に獲得した XP から算出されます</li>
      </ul>

      <!-- ============================================================ -->
      <!-- レベル・経験値の仕組み -->
      <!-- ============================================================ -->
      <h2>レベル・経験値の仕組み</h2>

      <h3>成長テンプレート</h3>
      <p>
        4種類のテンプレートから選択できます。未設定時は
        <strong>🌱 スムーズ成長</strong>が使われます。
      </p>
      <div class="table-wrapper"><table>
        <thead>
          <tr><th>テンプレート</th><th>次レベルXP式（L＝現在レベル）</th><th>Lv.1→2</th><th>Lv.10→11</th><th>特徴</th></tr>
        </thead>
        <tbody>
          <tr><td>🌱 スムーズ成長</td><td><code>5 * L ** 2 + 50 * L</code></td><td>55 XP</td><td>1,000 XP</td><td>初期がとても優しい</td></tr>
          <tr><td>⚖️ 序盤ハードル+スムーズ成長</td><td><code>5 * L ** 2 + 50 * L + 100</code></td><td>155 XP</td><td>1,100 XP</td><td>序盤にハードルがある</td></tr>
          <tr><td>📈 線形成長</td><td><code>30 * L + 20</code></td><td>50 XP</td><td>320 XP</td><td>毎レベル一定の伸び</td></tr>
          <tr><td>🍃 緩やか成長</td><td><code>3 * L ** 2 + 30 * L + 15</code></td><td>48 XP</td><td>615 XP</td><td>全体的に緩やか</td></tr>
        </tbody>
      </table></div>

      <div class="table-wrapper"><table>
        <thead>
          <tr><th>レベル</th><th>🌱 スムーズ成長</th><th>⚖️ 序盤ハードル</th><th>📈 線形成長</th><th>🍃 緩やか成長</th></tr>
        </thead>
        <tbody>
          <tr><td>Lv.1 → Lv.2</td><td>55 XP</td><td>155 XP</td><td>50 XP</td><td>48 XP</td></tr>
          <tr><td>Lv.5 → Lv.6</td><td>375 XP</td><td>475 XP</td><td>170 XP</td><td>240 XP</td></tr>
          <tr><td>Lv.10 → Lv.11</td><td>1,000 XP</td><td>1,100 XP</td><td>320 XP</td><td>615 XP</td></tr>
          <tr><td>Lv.50 → Lv.51</td><td>15,000 XP</td><td>15,100 XP</td><td>1,520 XP</td><td>9,015 XP</td></tr>
        </tbody>
      </table></div>

      <h3>📈 成長曲線グラフ</h3>
      <p>各テンプレートの<strong>累積XP</strong>（Lv.1から各レベルに到達するまでの必要総XP）を比較したグラフです。</p>
      <div class="chart-container">
        <canvas id="growthChart" width="860" height="500"></canvas>
        <div class="chart-legend">
          <div class="chart-legend-item"><span class="chart-legend-line easy"></span> 🌱 スムーズ成長</div>
          <div class="chart-legend-item"><span class="chart-legend-line standard"></span> ⚖️ 序盤ハードル+スムーズ成長</div>
          <div class="chart-legend-item"><span class="chart-legend-line hard"></span> 📈 線形成長</div>
          <div class="chart-legend-item"><span class="chart-legend-line linear"></span> 🍃 緩やか成長</div>
        </div>
      </div>

      <h3>高度設定：カスタム数式</h3>
      <p>
        「📈 カスタム数式設定」から、次レベルに必要な XP を表す式を自由に設定できます。
        <code>L</code> が現在のレベルです。
      </p>
      <pre><code># 初期値（スムーズ成長と同じ）
5 * L ** 2 + 50 * L

# ゆるやかに増やしたい
10 * L + 30

# 指数的に伸ばしたい
2 ** L + 50</code></pre>
      <ul>
        <li>使用できるのは四則演算・べき乗（<code>**</code>）と <code>L</code> のみです</li>
        <li>式が不正な場合は<strong>初期値の式にフォールバック</strong>します</li>
        <li>テンプレートを選ぶとカスタム数式はテンプレートの式で上書きされます</li>
        <li><strong>上限レベル</strong>は 0 で無制限、1 以上で到達可能な最大レベルを指定します</li>
      </ul>

      <!-- ============================================================ -->
      <!-- ランク確認パネル -->
      <!-- ============================================================ -->
      <h2>📌 ランク確認パネル</h2>
      <p>
        チャンネルに<strong>常設のパネル</strong>を設置し、ユーザーがボタンで
        自分のランクカードを確認できるようにできます。
      </p>
      <h3>設置方法</h3>
      <ol>
        <li><code>/ランク設定</code> を実行</li>
        <li>対象プリセットのページで <strong>「📌 設置」</strong> を押す</li>
        <li>Modal で <strong>設置先チャンネル</strong>・<strong>吊り下げ</strong>・<strong>パネル名</strong>・<strong>パネル色</strong>・<strong>パネル説明</strong> を入力</li>
      </ol>
      <div class="table-wrapper"><table>
        <thead><tr><th>項目</th><th>説明</th></tr></thead>
        <tbody>
          <tr><td>設置先</td><td>テキストチャンネル / 公開・プライベートスレッド。未選択で保存すると吊り下げパネルを解除</td></tr>
          <tr><td>パネルを吊り下げにする</td><td>ON にすると、最新メッセージの位置へ自動で移動し続ける</td></tr>
          <tr><td>パネル名</td><td>Embed のタイトル（最大200文字）</td></tr>
          <tr><td>パネル色</td><td><code>fdf682</code> または <code>#fdf682</code> 形式</td></tr>
          <tr><td>パネル説明</td><td>Embed の本文（最大3000文字）</td></tr>
        </tbody>
      </table></div>
      <h3>動作</h3>
      <ul>
        <li>パネルの「確認」ボタンを押すと、押したユーザーのランクカードが表示されます</li>
        <li><strong>🎯 VC自分ロール</strong>の条件を満たさないユーザーは確認できません</li>
        <li>連続で押した場合は<strong>5秒のクールダウン</strong>がかかります</li>
        <li>吊り下げパネルの場合、カードはチャンネルに表示され、パネルは最下部へ移動します</li>
        <li>パネルは Bot 再起動後も維持されます</li>
      </ul>

      <!-- ============================================================ -->
      <!-- コマンド一覧 -->
      <!-- ============================================================ -->
      <h2>コマンド一覧</h2>
      <div class="table-wrapper"><table>
        <thead><tr><th>コマンド</th><th>説明</th><th>権限</th></tr></thead>
        <tbody>
          <tr><td><code>/ランク [@ユーザー]</code></td><td>ランクカードを表示（対象は⭐メイン設定のプリセット）</td><td>全員</td></tr>
          <tr><td><code>/ランキング [期間]</code></td><td>プリセットごとの XP ランキング TOP10 を表示</td><td>全員</td></tr>
          <tr><td><code>/ランク設定</code></td><td>プリセット一覧・編集パネルを開く</td><td>管理者</td></tr>
        </tbody>
      </table></div>

      <!-- ============================================================ -->
      <!-- 設定パネル項目一覧 -->
      <!-- ============================================================ -->
      <h2>設定パネル項目一覧</h2>
      <p>
        <code>/ランク設定</code> → プリセットの「✏️ 編集」で開くエディタには、
        2つのセレクトメニューがあります。
      </p>

      <h3>Select1：有効な機能</h3>
      <p>上の表「機能一覧」のモジュールを複数選択して ON / OFF します。</p>

      <h3>Select2：設定項目</h3>
      <div class="table-wrapper"><table>
        <thead><tr><th>項目</th><th>内容</th></tr></thead>
        <tbody>
          <tr><td>🟢/🔴 プリセット有効</td><td>プリセット自体の有効 / 無効（同時有効化数の上限あり）</td></tr>
          <tr><td>📛 設定名変更</td><td>プリセット名を変更</td></tr>
          <tr><td>⭐ メイン設定</td><td><code>/ランク</code> の表示対象にする（ON にすると他は自動OFF）</td></tr>
          <tr><td>💬🎤 XP統合設定</td><td>ランダムモード・VC XP・VC倍率をまとめて設定</td></tr>
          <tr><td>🎯 ランダム数式設定</td><td>カスタム数式モードの式を設定</td></tr>
          <tr><td>⏱️ クールダウン設定</td><td>VC最小接続時間（分）を設定</td></tr>
          <tr><td>📋 成長テンプレート選択</td><td>4種類の成長曲線から選択</td></tr>
          <tr><td>📈 カスタム数式設定</td><td>次レベルXP式を自由入力</td></tr>
          <tr><td>📢 通知CH設定</td><td>レベルアップ通知 / ランクアップ通知の送信先</td></tr>
          <tr><td>🔝 上限Lv設定</td><td>到達可能な最大レベル（0=無制限）</td></tr>
          <tr><td>📋 ログ機能設定</td><td>ログ出力先チャンネルをカテゴリ別に設定</td></tr>
        </tbody>
      </table></div>

      <h3>拡張機能設定</h3>
      <p>Select1 で ON にした機能は、Select2 に「⚙️ 設定」項目として追加されます。</p>
      <ul>
        <li>⚙️ 🎤 VC WH/BL設定</li>
        <li>⚙️ 📅 XPキャップ設定</li>
        <li>⚙️ 🎤 VC条件設定</li>
        <li>⚙️ 🚀 ブースト設定</li>
        <li>⚙️ 🟢 有効期間設定</li>
        <li>⚙️ 🎭 ランクロール制御設定 / 🎭 ランクロール高度制御設定</li>
        <li>⚙️ 🎴 ランクカード設定</li>
      </ul>
      <p>
        編集内容は「💾 保存」を押すまで確定しません。
        画面上部に <strong>💾 未保存 / ✅ 保存済み</strong> が表示されます。
      </p>

      <!-- ============================================================ -->
      <!-- メイン設定 -->
      <!-- ============================================================ -->
      <h2>⭐ メイン設定</h2>
      <p>
        複数のプリセットを作成できるランクシステムでは、
        <strong>メイン設定</strong>で <code>/ランク</code> の表示対象を1つに絞れます。
      </p>
      <div class="alert alert-info">
        <p><strong>💡 仕組み:</strong></p>
        <ul>
          <li>各プリセットのエディタから「⭐ メイン設定」を ON にできます</li>
          <li>メインを ON にすると、他の全プリセットのメイン設定は自動的に OFF になります</li>
          <li><code>/ランク</code> はメイン設定のプリセットのみを表示します</li>
          <li>メイン設定が1つもない場合、<code>/ランク</code> はエラーメッセージを表示します</li>
          <li>プリセット一覧・ランキング画面ではメイン設定に ⭐ が表示されます</li>
          <li><code>/ランキング</code> や XP 計測はメイン設定に関係なく全プリセットで動作します</li>
        </ul>
      </div>

      <!-- ============================================================ -->
      <!-- ログ設定 -->
      <!-- ============================================================ -->
      <h2>📋 ログ設定</h2>
      <p>
        ランクシステムの各イベントの出力先チャンネルを
        <strong>6つのカテゴリ</strong>に分けて設定できます。
        個別のカテゴリが未設定の場合は<strong>グローバル</strong>にフォールバックします。
      </p>

      <h3>ログカテゴリ一覧</h3>
      <div class="table-wrapper"><table>
        <thead><tr><th>カテゴリ</th><th>設定項目</th><th>説明</th></tr></thead>
        <tbody>
          <tr><td rowspan="1">🌐 グローバル</td><td>ログCH</td><td>他カテゴリ未設定時のフォールバック先</td></tr>
          <tr><td rowspan="3">📊 レベル関連</td><td>レベルUP</td><td>レベルが上がったときのログ</td></tr>
          <tr><td>レベルDOWN</td><td>レベルが下がったときのログ</td></tr>
          <tr><td>上限到達</td><td>最大レベルに到達したときのログ</td></tr>
          <tr><td rowspan="4">🎭 ロール関連</td><td>制御付与</td><td>ランクロール制御による付与のログ</td></tr>
          <tr><td>制御剥奪</td><td>ランクロール制御による剥奪のログ</td></tr>
          <tr><td>高度付与</td><td>高度制御による付与のログ</td></tr>
          <tr><td>高度剥奪</td><td>高度制御による剥奪のログ</td></tr>
          <tr><td rowspan="2">⭐ XP関連</td><td>XP上限到達</td><td>XPキャップに達したときのログ</td></tr>
          <tr><td>VC条件不達</td><td>VC条件を満たさず XP が付与されなかったログ</td></tr>
          <tr><td rowspan="4">⚙️ システム関連</td><td>プリセット切替</td><td>メイン設定が切り替えられたときのログ</td></tr>
          <tr><td>設定変更</td><td>プリセット設定が変更されたときのログ</td></tr>
          <tr><td>エラー</td><td>ランクシステム内部でエラーが発生したときのログ</td></tr>
          <tr><td>警告</td><td>ランクシステムの警告事項のログ</td></tr>
          <tr><td>📅 期間ランキング</td><td>集計結果出力</td><td>週間・月間ランキングの集計結果を出力するログ</td></tr>
        </tbody>
      </table></div>

      <h3>設定方法</h3>
      <ol>
        <li><code>/ランク設定</code> を実行し、プリセットのエディタを開く</li>
        <li>Select2 で「📋 ログ機能設定」を選択</li>
        <li>カテゴリを選択 → Modal 内の ChannelSelect で出力先を指定</li>
      </ol>

      <div class="alert alert-warning">
        <p><strong>⚠️ 現在の実装状況:</strong>
        実際にログが出力されるのは<strong>「📅 期間ランキング」</strong>のみです。
        期間の切り替え時に、上位の集計結果がログチャンネルへ送信されます。
        その他のカテゴリは出力先を保存できる状態で、
        送信処理は今後のアップデートで対応予定です。</p>
      </div>

      <!-- ============================================================ -->
      <!-- ランク表示の例 -->
      <!-- ============================================================ -->
      <h2>ランク表示の例</h2>
      <p>
        <code>/ランク</code> を実行すると、以下のような
        <strong>画像のランクカード</strong>が表示されます。
        VC専用モードのため、メーターは<strong>VC の1本のみ</strong>です。
      </p>

      <h3>ランクカード（VCモード・メーター1本）</h3>
      <p><img src="../assets/img/rank_card_vc.png" alt="ランクカード（VCモード）" style="max-width:100%;border:1px solid #ccc;border-radius:8px;"></p>

      <div class="alert alert-info">
        <p><strong>💡 ランクカードの内容:</strong></p>
        <ul>
          <li><strong>左上</strong>: 丸抜きアイコン＋リング（色は「🎴 ランクカード設定」で変更可能）</li>
          <li><strong>中央上部</strong>: 表示名・ユーザー名（絵文字はカラーで描画）</li>
          <li><strong>表示名の文字補完</strong>: 日本語フォントに無い文字は、文字ごとに最適なフォントを自動選択して描画</li>
          <li><strong>アイコン下</strong>: レベル（LVL＋数字）</li>
          <li><strong>メーター左</strong>: 系統ごとのレベル（VC）</li>
          <li><strong>メーター直上</strong>: 順位・合計EXP</li>
          <li><strong>メーター内</strong>: 現在Lv内XP / 次Lv必要XP（進捗%）</li>
          <li><strong>背景</strong>: <code>data/img/rank_default_card.png</code> があればそれを使用（1100×420にリサイズ）。無い場合は白背景</li>
          <li>カードが生成できない場合は、Embed 形式の簡易表示にフォールバックします</li>
        </ul>
      </div>

      <div class="alert alert-warning">
        <p><strong>🎴 表示の隠し方（ランクカード設定）:</strong></p>
        <ul>
          <li><strong>順位を隠す</strong>: メーター直上の順位表示を非表示にします</li>
          <li><strong>合計経験値を隠す</strong>: メーター直上の合計EXP表示を非表示にします</li>
          <li><strong>現在経験値を隠す</strong>: メーター内の現在XPを <code>???</code> にします</li>
          <li><strong>次レベル必要経験値を隠す</strong>: メーター内の必要XPを <code>???</code> にします</li>
          <li><strong>現在経験値と次レベル必要経験値の両方を隠す</strong>: メーター内は進捗%（例: <code>45%</code>）のみ表示されます</li>
        </ul>
      </div>

      <!-- ============================================================ -->
      <!-- 注意事項 -->
      <!-- ============================================================ -->
      <h2>注意事項</h2>
      <ul>
        <li>VC は<strong>自分以外の人数が条件を満たす場合のみ</strong>XPが付与されます（初期値は自分以外1人＝合計2人以上）</li>
        <li>レベルアップ通知は「📢 通知CH設定」で指定したチャンネルに送信されます。未設定なら通知されません</li>
        <li>カスタム数式の評価に失敗した場合は、初期値の式に戻ります</li>
        <li>VC フィルターは VC CH ID・カテゴリ ID で指定します</li>
        <li><strong>VC最小接続時間の初期値は1分</strong>です。0 に設定すると切断時も秒単位で比例計算されます</li>
        <li>Bot 停止中に VC から抜けた区間の XP は付与されません</li>
        <li><strong>ランキングでは XP が 0 のユーザーは表示されません</strong></li>
        <li>レベルは保存されず、すべて XP からその場計算されます。数式を変更しても過去データとの整合性は保たれます</li>
        <li>同時に有効化できるプリセットは無料で<strong>最大3つ</strong>、プレミアムで<strong>最大10個</strong>です</li>
        <li>「上限Lv」は<strong>レベルアップ通知とロール反映</strong>に適用されます。カード表示のレベルは XP から算出された値です</li>
      </ul>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>

  <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
  <script>
    (function() {
      const canvas = document.getElementById('growthChart');
      if (!canvas) return;

      // ---- 成長曲線の計算 ----
      // 各テンプレートの「次レベル必要XP」式から累積XPを計算
      function nextXpSmooth(l)   { return 5 * l * l + 50 * l; }
      function nextXpStandard(l) { return 5 * l * l + 50 * l + 100; }
      function nextXpLinear(l)   { return 30 * l + 20; }
      function nextXpGentle(l)   { return 3 * l * l + 30 * l + 15; }

      function cumulative(fn, maxLv) {
        const arr = [];
        let sum = 0;
        for (let lv = 1; lv <= maxLv; lv++) {
          sum += fn(lv);
          arr.push(sum);
        }
        return arr;
      }

      const maxLevel = 50;
      const labels = Array.from({length: maxLevel}, (_, i) => i + 1);
      const smoothData   = cumulative(nextXpSmooth,   maxLevel);
      const standardData = cumulative(nextXpStandard, maxLevel);
      const linearData   = cumulative(nextXpLinear,   maxLevel);
      const gentleData   = cumulative(nextXpGentle,   maxLevel);

      new Chart(canvas, {
        type: 'line',
        data: {
          labels: labels,
          datasets: [
            {
              label: '🌱 スムーズ成長',
              data: smoothData,
              borderColor: '#4CAF50',
              backgroundColor: 'rgba(76,175,80,0.08)',
              borderWidth: 2.5,
              tension: 0.3,
              pointRadius: 0,
              fill: false
            },
            {
              label: '⚖️ 序盤ハードル+スムーズ成長',
              data: standardData,
              borderColor: '#FF9800',
              backgroundColor: 'rgba(255,152,0,0.08)',
              borderWidth: 2.5,
              tension: 0.3,
              pointRadius: 0,
              fill: false
            },
            {
              label: '📈 線形成長',
              data: linearData,
              borderColor: '#2196F3',
              backgroundColor: 'rgba(33,150,243,0.08)',
              borderWidth: 2.5,
              tension: 0.3,
              pointRadius: 0,
              fill: false
            },
            {
              label: '🍃 緩やか成長',
              data: gentleData,
              borderColor: '#9C27B0',
              backgroundColor: 'rgba(156,39,176,0.08)',
              borderWidth: 2.5,
              tension: 0.3,
              pointRadius: 0,
              fill: false
            }
          ]
        },
        options: {
          responsive: true,
          maintainAspectRatio: false,
          plugins: {
            legend: {
              display: false  // 凡例はHTML側の chart-legend で表示
            },
            tooltip: {
              callbacks: {
                label: function(ctx) {
                  return ctx.dataset.label + ': ' + ctx.parsed.y.toLocaleString() + ' XP';
                }
              }
            }
          },
          scales: {
            x: {
              title: { display: true, text: 'レベル', font: { size: 13 } },
              grid: { color: 'rgba(200,200,200,0.15)' }
            },
            y: {
              title: { display: true, text: '累積XP', font: { size: 13 } },
              ticks: { callback: v => v.toLocaleString() },
              grid: { color: 'rgba(200,200,200,0.15)' }
            }
          },
          interaction: {
            intersect: false,
            mode: 'index'
          }
        }
      });
    })();
  </script>
</body>
</html>
