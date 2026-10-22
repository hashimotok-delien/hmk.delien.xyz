<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '.'; $PAGE_TITLE = '既知の不具合 - ねくさす⋆˚ʚɞ ドキュメント'; ?>
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
      <h1>⚠️ 既知の不具合</h1>
      <p>
        現在確認されている既知の不具合と、その回避策・対応状況をまとめています。
      </p>

      <div class="alert alert-warning">
        <p><strong>💡 注意:</strong>
        このページの内容は予告なく変更される場合があります。
        不具合に遭遇した場合はサポートサーバーまでご報告ください。</p>
      </div>

      <!-- ============================================================ -->
      <h2>🏆 ランクシステム</h2>

      <h3>📅 XPキャップが VC の XP に適用されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - 📅 XPキャップ</td></tr>
          <tr><th>内容</th><td>
            XPキャップはチャットXPの付与時のみ判定されます。
            VC で獲得する XP（1分ごとの自動加算・切断時の精算）には適用されません。
            また、週次上限の項目は現在使用されていません。
          </td></tr>
          <tr><th>影響</th><td>本 Bot は VC計測専用のため、XPキャップの設定は実質的に効果を持ちません。</td></tr>
          <tr><th>回避策</th><td>VC XP を制限したい場合は、VC条件やイベントブーストの倍率で調整してください。</td></tr>
          <tr><th>状況</th><td>未対応</td></tr>
        </tbody>
      </table></div>

      <h3>📋 ログが「📅 期間ランキング」でしか出力されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - 📋 ログ機能設定</td></tr>
          <tr><th>内容</th><td>
            ログの出力先は6カテゴリすべて設定できますが、
            実際に送信処理があるのは「📅 期間ランキング」のみです。
            レベル関連・ロール関連・XP関連・システム関連の各ログは、
            出力先を保存するだけで送信されません。
          </td></tr>
          <tr><th>回避策</th><td>レベルアップ通知は「📢 通知CH設定」のレベルアップ通知CHをご利用ください。</td></tr>
          <tr><th>状況</th><td>未対応</td></tr>
        </tbody>
      </table></div>

      <h3>📢 ランクアップ通知CH が送信されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - 📢 通知CH設定</td></tr>
          <tr><th>内容</th><td>
            「ランクアップ通知CH」は設定値として保存されますが、
            現在は通知の送信処理がありません。
            実際に送信されるのは「レベルアップ通知CH」宛てのレベルアップ通知のみです。
          </td></tr>
          <tr><th>状況</th><td>未対応</td></tr>
        </tbody>
      </table></div>

      <h3>🎭 ランクロール制御 / 高度制御 の内容が反映されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - 🎭 ランクロール制御 / ランクロール高度制御</td></tr>
          <tr><th>内容</th><td>
            一覧で登録した「必要VCレベル」とロールの設定は保存されますが、
            レベルアップ時のロール付与・剥奪にはまだ使われません。
            高度制御の「剥奪ロール」も同様に未適用です。
          </td></tr>
          <tr><th>回避策</th><td>ロール付与は Discord のロールメニューや他機能で手動対応してください。</td></tr>
          <tr><th>状況</th><td>未対応</td></tr>
        </tbody>
      </table></div>

      <h3>🔝 上限Lv がカード表示に反映されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - 🔝 上限Lv設定</td></tr>
          <tr><th>内容</th><td>
            上限Lv はレベルアップ通知とロール反映の判定にのみ使われます。
            ランクカードやランキングのレベルは XP から計算されるため、
            上限を超えたレベルが表示されることがあります。
          </td></tr>
          <tr><th>状況</th><td>仕様（表示のみ）</td></tr>
        </tbody>
      </table></div>

      <h3>⏳ VC最小接続時間が1分ごとの自動加算に適用されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - ⏱️ クールダウン設定（VC最小接続時間）</td></tr>
          <tr><th>内容</th><td>
            VC最小接続時間は<strong>切断時の精算</strong>にのみ適用されます。
            接続から1分経過した時点の自動加算は、
            最小接続時間の設定に関係なく行われます。
          </td></tr>
          <tr><th>状況</th><td>仕様（自動加算は対象外）</td></tr>
        </tbody>
      </table></div>

      <h3>🔄 Bot 停止中に切断された VC の XP が付与されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>ランクシステム - VC計測全般</td></tr>
          <tr><th>内容</th><td>
            Bot が停止している間に VC から切断した場合、その区間の XP は付与されません。
            Bot 再起動後、VC に残っているメンバーの記録は再開されます。
          </td></tr>
          <tr><th>状況</th><td>仕様</td></tr>
        </tbody>
      </table></div>

      <!-- ============================================================ -->
      <h2>💬 交流計測</h2>

      <h3>交流計測v2 のコマンドが一部サーバーに表示されない</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>交流計測v2</td></tr>
          <tr><th>内容</th><td>
            <code>/交流計測v2</code> のコマンドグループは、
            現在ベータ導入サーバーにのみ登録されます。
            それ以外のサーバーでは表示されません。
          </td></tr>
          <tr><th>回避策</th><td>従来版の <code>/交流計測設定</code> をご利用ください。</td></tr>
          <tr><th>状況</th><td>段階的に提供予定</td></tr>
        </tbody>
      </table></div>

      <h3>スコアの反映に最大2分かかる</h3>
      <div class="table-wrapper"><table>
        <tbody>
          <tr><th>対象</th><td>交流計測v2</td></tr>
          <tr><th>内容</th><td>
            スコアは<strong>120秒ごと</strong>の定期集計で更新されます。
            VC に入った直後や退出直後は、記録パネルの数値がすぐには変わりません。
          </td></tr>
          <tr><th>状況</th><td>仕様</td></tr>
        </tbody>
      </table></div>

      <!-- ============================================================ -->
      <h2>📢 報告のお願い</h2>
      <p>
        上記以外の不具合を見つけた場合は、以下の情報を添えて
        サポートサーバーまでご報告ください。
      </p>
      <ul>
        <li>実行したコマンド</li>
        <li>表示されたエラーメッセージ（スクリーンショット可）</li>
        <li>発生日時と、そのときの状況</li>
      </ul>

      <?php include __DIR__ . '/assets/include/footer.php'; ?>
    </div>
  </main>

</body>
</html>
