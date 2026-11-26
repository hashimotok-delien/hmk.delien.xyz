<!DOCTYPE html>
<html lang="ja">
<?php $ROOT = '..'; $PAGE_TITLE = '設定パネル - Cultivate ドキュメント'; ?>
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
        <div class="feature-icon">⚙️</div>
        <h1>設定パネル</h1>
        <p>Bot の各種設定を一元的に管理</p>
      </div>

      <h2>概要</h2>
      <p>
        設定パネルは、Cultivate のあらゆる設定が可能な管理パネルです。
        管理者用パネルのため、パネルを設置するチャンネルは一般ユーザーには見えない場所に設定してください。
      </p>

      <div class="alert alert-warning">
        <p><strong>⚠️ 重要:</strong> パネルの設置には管理者権限が必要ですが、パネルの操作自体には管理者権限が不要です。そのため一般ユーザーでもパネルを使用して設定を変更できる可能性があるため、パネルの設置場所には十分注意してください。</p>
      </div>

      <h2>使い方</h2>
      <ol class="steps">
        <li>
          <strong>コマンドを実行</strong>
          <code>/設定パネル</code> を管理者権限で実行
        </li>
        <li>
          <strong>パネルから設定</strong>
          表示されたパネルから各種設定を切り替え
        </li>
      </ol>

      <h2>設定画面プレビュー</h2>
      <p>
        実際の Discord 上に表示される設定画面を再現したプレビューです。
        タブで画面を切り替えたり、パネル上の絵文字ボタンを押すと、
        その設定の概要が表示されます。
      </p>

      <div class="preview" data-screen-preview>
        <div class="preview-tabs" role="tablist" aria-label="設定画面プレビュー">
          <button type="button" class="preview-tab is-active" role="tab"
                  aria-selected="true" data-screen="panel">設定パネル</button>
          <button type="button" class="preview-tab" role="tab"
                  aria-selected="false" tabindex="-1"
                  data-screen="prefix">接頭辞変更</button>
          <button type="button" class="preview-tab" role="tab"
                  aria-selected="false" tabindex="-1"
                  data-screen="spoiler">スポイラー判定</button>
        </div>

        <!-- 設定パネル -->
        <div class="preview-screen is-active" role="tabpanel"
             aria-label="設定パネル" data-screen="panel">
          <div class="preview-body">
            <div>
              <div class="dc-frame">
                <div class="dc-frame-bar">
                  <span class="dc-hash">#</span><b>設定パネル</b>
                  <span class="dc-frame-badge">プレビュー</span>
                </div>
                <div class="dc-body">
                  <div class="dc-message">
                    <div class="dc-avatar">⚙️</div>
                    <div class="dc-message-main">
                      <div class="dc-message-head">
                        <b>Cultivate</b>
                        <span class="dc-bot-tag">BOT</span>
                        <span class="dc-time">今日 20:00</span>
                      </div>
                      <div class="dc-embed">
                        <div class="dc-embed-title">どの設定を変更しますか？</div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">コマンド設定</div>
                          <div class="dc-field-value">⌨️接頭辞変更(デフォルト<code>!?</code>)</div>
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">VC設定</div>
                          <div class="dc-field-value">🤖Bot接続時自動人数調整</div>
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">投稿設定</div>
                          <div class="dc-field-value">🖼️画像投稿スポイラー判定</div>
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">プロフィール設定</div>
                          <div class="dc-field-value">👤プロフィールv1設定</div>
                          <div class="dc-field-value">🧑‍⚖️プロフ審査設定</div>
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">パネル更新</div>
                          <div class="dc-field-value">🔄 パネル更新</div>
                        </div>
                        <div class="dc-embed-footer">Cultivate</div>
                      </div>
                      <div class="dc-buttons">
                        <button type="button" class="dc-button" data-note="prefix"
                                aria-pressed="true" title="接頭辞変更">⌨️</button>
                        <button type="button" class="dc-button" data-note="vc"
                                aria-pressed="false" title="Bot接続時自動人数調整">🤖</button>
                        <button type="button" class="dc-button" data-note="spoiler"
                                aria-pressed="false" title="画像投稿スポイラー判定">🖼️</button>
                        <button type="button" class="dc-button" data-note="profile"
                                aria-pressed="false" title="プロフィールv1設定">👤</button>
                        <button type="button" class="dc-button" data-note="judging"
                                aria-pressed="false" title="プロフ審査設定">🧑‍⚖️</button>
                        <button type="button" class="dc-button" data-note="refresh"
                                aria-pressed="false" title="パネル更新">🔄</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <p class="preview-caption">
                ▲ 設定パネルの再現例。絵文字ボタンを押すと、対応する設定の説明が表示されます。
                MBTI 系の項目は対象サーバーでのみ表示されます。
              </p>
            </div>

            <div class="preview-notes">
              <div class="preview-note is-active" data-note="prefix">
                <h3>⌨️ 接頭辞変更</h3>
                <p>
                  コマンドの接頭辞（プレフィックス）をデフォルトの
                  <code>!?</code> から変更できます。他 Bot と競合する場合に使用します。
                </p>
                <a href="command-prefix">詳細を見る →</a>
              </div>
              <div class="preview-note" data-note="vc" hidden>
                <h3>🤖 Bot接続時自動人数調整</h3>
                <p>
                  ボタンを押すたびに ON/OFF が切り替わり、Bot の入退室に合わせて
                  VC の人数制限を自動で調整します。
                </p>
                <a href="vc-control">詳細を見る →</a>
              </div>
              <div class="preview-note" data-note="spoiler" hidden>
                <h3>🖼️ 画像投稿スポイラー判定</h3>
                <p>
                  スポイラー必須チャンネルを設定し、指定チャンネルでスポイラーなしの
                  画像が投稿された場合に自動で削除します。
                </p>
                <a href="spoiler-check">詳細を見る →</a>
              </div>
              <div class="preview-note" data-note="profile" hidden>
                <h3>👤 プロフィール設定</h3>
                <p>
                  指定チャンネルへの投稿をプロフィールとして記録し、VC 入室時に
                  自動で表示する設定です。
                </p>
                <a href="profile">詳細を見る →</a>
              </div>
              <div class="preview-note" data-note="judging" hidden>
                <h3>🧑‍⚖️ プロフ審査設定</h3>
                <p>
                  メンバーのプロフィールをコミュニティで審査・評価する
                  プロフ審査機能の設定です。
                </p>
                <a href="profile-judging">詳細を見る →</a>
              </div>
              <div class="preview-note" data-note="refresh" hidden>
                <h3>🔄 パネル更新</h3>
                <p>
                  パネルの表示を最新の状態に再描画します。設定を変更した後に
                  表示が古いと感じたら押してください。
                </p>
              </div>
            </div>
          </div>
        </div>

        <!-- 接頭辞変更 -->
        <div class="preview-screen" role="tabpanel"
             aria-label="接頭辞変更" data-screen="prefix" hidden>
          <div class="preview-body">
            <div>
              <div class="dc-frame">
                <div class="dc-frame-bar">
                  <span class="dc-hash">#</span><b>設定パネル</b>
                  <span class="dc-frame-badge">プレビュー</span>
                </div>
                <div class="dc-body">
                  <div class="dc-message">
                    <div class="dc-avatar">⚙️</div>
                    <div class="dc-message-main">
                      <div class="dc-message-head">
                        <b>Cultivate</b>
                        <span class="dc-bot-tag">BOT</span>
                        <span class="dc-time">今日 20:01</span>
                      </div>
                      <div class="dc-embed">
                        <div class="dc-embed-title">コマンド接頭辞: 保存済み</div>
                        <div class="dc-embed-desc">
                          吊り下げコマンドなどの接頭辞(prefix)を変更可能です。<br>
                          他 Bot と競合する場合は変更してください。
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">現在値</div>
                          <div class="dc-field-value"><code>!?</code>(初期値)</div>
                        </div>
                      </div>
                      <div class="dc-buttons">
                        <button type="button" class="dc-button green">設定</button>
                        <button type="button" class="dc-button green" disabled>✅ 保存</button>
                        <button type="button" class="dc-button danger">キャンセル</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <p class="preview-caption">
                ▲ 接頭辞設定画面の再現例。「設定」から入力モーダルを開き、
                「✅ 保存」で確定します。
              </p>
            </div>

            <div class="preview-notes">
              <div class="preview-note is-active" data-note="prefix-detail">
                <h3>⌨️ 接頭辞変更の流れ</h3>
                <p>
                  1. 「設定」を押して入力モーダルを開く<br>
                  2. 新しい接頭辞を入力して送信<br>
                  3. 内容を確認して「✅ 保存」を押す
                </p>
                <p>
                  保存前は「未保存」と表示され、キャンセルすると変更は破棄されます。
                </p>
                <a href="command-prefix">詳細を見る →</a>
              </div>
            </div>
          </div>
        </div>

        <!-- スポイラー判定 -->
        <div class="preview-screen" role="tabpanel"
             aria-label="スポイラー判定" data-screen="spoiler" hidden>
          <div class="preview-body">
            <div>
              <div class="dc-frame">
                <div class="dc-frame-bar">
                  <span class="dc-hash">#</span><b>設定パネル</b>
                  <span class="dc-frame-badge">プレビュー</span>
                </div>
                <div class="dc-body">
                  <div class="dc-message">
                    <div class="dc-avatar">⚙️</div>
                    <div class="dc-message-main">
                      <div class="dc-message-head">
                        <b>Cultivate</b>
                        <span class="dc-bot-tag">BOT</span>
                        <span class="dc-time">今日 20:02</span>
                      </div>
                      <div class="dc-embed">
                        <div class="dc-embed-title">スポイラー必須設定（プレビュー）</div>
                        <div class="dc-embed-desc">
                          <strong>スポイラー必須チャンネル設定</strong><br>
                          #spoiler-check, #nsfw-check
                        </div>
                        <div class="dc-embed-field">
                          <div class="dc-field-name">設定説明</div>
                          <div class="dc-field-value">
                            以下から設定項目を選んでください。<br><br>
                            ・スポイラー必須チャンネル設定 — スポイラーを必須にする
                            チャンネルを複数選択<br><br>
                            ※ 変更は一旦一時保存され、<strong>保存</strong> を押すまで
                            DB には反映されません。
                          </div>
                        </div>
                      </div>
                      <div class="dc-select">
                        <span>スポイラー必須設定項目を選んでね</span>
                        <span class="dc-select-caret">▾</span>
                      </div>
                      <div class="dc-buttons">
                        <button type="button" class="dc-button green">保存</button>
                        <button type="button" class="dc-button danger">キャンセル</button>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
              <p class="preview-caption">
                ▲ スポイラー必須設定画面の再現例。チャンネルを選ぶと
                プレビューに反映され、「保存」で DB に確定します。
              </p>
            </div>

            <div class="preview-notes">
              <div class="preview-note is-active" data-note="spoiler-detail">
                <h3>🖼️ スポイラー判定の設定</h3>
                <p>
                  セレクトから「スポイラー必須チャンネル設定」を選び、
                  対象チャンネルを複数選択できます。
                </p>
                <p>
                  未保存の変更がある場合は埋め込みの色とタイトルで判別できます。
                </p>
                <a href="spoiler-check">詳細を見る →</a>
              </div>
            </div>
          </div>
        </div>

        <p class="preview-caption">
          ※ 画像・日時・チャンネル名は説明用のサンプルです。実際の表示とは一部異なります。
        </p>
      </div>

      <h2>設定できる項目</h2>

      <div class="table-wrapper"><table>
        <thead>
          <tr>
            <th>設定項目</th>
            <th>説明</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td>💤 寝落ち送り機能</td>
            <td>VC で寝落ちしたメンバーを専用 VC に移動する機能の ON/OFF</td>
          </tr>
          <tr>
            <td>👥 Bot接続時自動人数調整</td>
            <td>Bot が VC へ入退室した際に人数制限を自動調整する機能の ON/OFF</td>
          </tr>
          <tr>
            <td>�️ プロフィールチャンネル設定</td>
            <td>指定したチャンネルへの投稿を自動的にプロフィールとして記録します</td>
          </tr>
          <tr>
            <td>�🔞 画像投稿スポイラー判定</td>
            <td>画像投稿時のスポイラー判定機能の ON/OFF</td>
          </tr>
          <tr>
            <td>⌨️ 接頭辞変更</td>
            <td>コマンドの接頭辞（プレフィックス）をデフォルトの <code>!?</code> から変更します</td>
          </tr>
          <tr>
            <td>🧑‍⚖️ プロフ審査設定</td>
            <td>プロフィール審査機能の設定を作成・編集します</td>
          </tr>
        </tbody>
      </table></div>

      <h2>各機能の詳細</h2>
      <div class="card-grid">
        <div class="card">
          <h3>💤 寝落ち送り</h3>
          <p>VC 寝落ちメンバーを自動的に専用 VC へ移動します。</p>
          <a href="sleep">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>👥 Bot VC人数調整</h3>
          <p>Bot の入退室に合わせて VC の人数制限を調整します。</p>
          <a href="vc-control">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>🔞 スポイラー判定</h3>
          <p>指定チャンネルでスポイラーなし画像を自動削除します。</p>
          <a href="spoiler-check">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>🖼️ プロフィール設定</h3>
          <p>指定チャンネルへの投稿を自動プロフィール記録。VC 入室時に自動表示されます。</p>
          <a href="profile">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>⌨️ 接頭辞変更</h3>
          <p>コマンドの接頭辞をデフォルトの <code>!?</code> から変更できます。</p>
          <a href="command-prefix">詳細を見る →</a>
        </div>
        <div class="card">
          <h3>🧑‍⚖️ プロフ審査</h3>
          <p>メンバーのプロフィールをコミュニティで審査・評価できるシステムです。</p>
          <a href="profile-judging">詳細を見る →</a>
        </div>
      </div>

      <?php include __DIR__ . '/../assets/include/footer.php'; ?>
    </div>
  </main>
</body>
</html>
