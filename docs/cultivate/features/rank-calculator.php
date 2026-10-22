<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ランク成長計算 - Cultivate ドキュメント</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Noto+Sans+JP:wght@400;500;600;700&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="../css/style.css?v=<?= @filemtime(__DIR__ . '/../css/style.css') ?: time() ?>">
  <style>
    .calculator-grid {
      display: grid;
      grid-template-columns: repeat(auto-fit, minmax(240px, 1fr));
      gap: 16px;
      margin: 20px 0;
    }
    .calculator-grid label {
      display: flex;
      flex-direction: column;
      gap: 6px;
      font-weight: 600;
    }
    .calculator-grid input,
    .calculator-grid select {
      width: 100%;
      box-sizing: border-box;
      padding: 10px 12px;
      border: 1px solid #cbd5e1;
      border-radius: 8px;
      background: #fff;
      color: #1e293b;
      font: inherit;
    }
    .calculator-results {
      overflow-x: auto;
      margin-top: 20px;
    }
    .calculator-results table {
      width: 100%;
      border-collapse: collapse;
    }
    .calculator-results th,
    .calculator-results td {
      padding: 12px;
      border: 1px solid #dbe2ea;
      text-align: right;
      white-space: nowrap;
    }
    .calculator-results th:first-child,
    .calculator-results td:first-child {
      text-align: left;
    }
    .calculator-note {
      color: #64748b;
      font-size: 0.92em;
    }
    #calculator-error {
      color: #b91c1c;
      font-weight: 600;
    }
  </style>
</head>
<body>
  <?php $ROOT = '..'; $PAGE_TITLE = 'ランク成長計算'; ?>
  <?php include __DIR__ . '/../include/sidebar.php'; ?>

  <main class="main-content">
    <?php include __DIR__ . '/../include/topbar.php'; ?>

    <div class="content">
      <div class="feature-hero">
        <div class="feature-icon">🧮</div>
        <h1>ランク成長計算</h1>
        <p>成長曲線とXP付与量から目標レベルまでの目安を計算</p>
      </div>

      <div class="alert alert-info">
        <p id="settings-source" hidden></p>
        <p>
          <strong>参考値について:</strong>
          実際のレベルアップ時期を保証するものではありません。
          XPの最低値・最高値を指定し、常に最低値・平均値・最高値が
          付与された場合を比較します。
        </p>
        <p>
          チャットでは「1時間あたりのXP付与回数」をメッセージ数の目安として、
          VCでは1分ごとの付与を1時間あたり60回として入力してください。
          クールダウン、条件、XPキャップ、ボーナス、ブーストなどは
          この単純計算には含めません。
        </p>
      </div>

      <h2>計算条件</h2>
      <div class="calculator-grid">
        <label>
          成長曲線
          <select id="curve">
            <option value="easy_start">🌱 スムーズ成長</option>
            <option value="current">⚖️ 序盤ハードル+スムーズ成長</option>
            <option value="linear">📈 線形成長</option>
            <option value="gentle">🍃 緩やか成長</option>
            <option value="custom">カスタム数式</option>
          </select>
        </label>
        <label>
          XPの種類
          <select id="activity">
            <option value="chat">チャット</option>
            <option value="vc">VC</option>
          </select>
        </label>
        <label>
          目標レベル
          <input id="target-level" type="number" min="2" max="10000" value="10">
        </label>
        <label>
          EXPの最低値（1回あたり）
          <input id="min-exp" type="number" min="0" step="0.01" value="1">
        </label>
        <label>
          EXPの最高値（1回あたり）
          <input id="max-exp" type="number" min="0" step="0.01" value="15">
        </label>
        <label>
          1時間あたりのXP付与回数
          <input id="events-per-hour" type="number" min="0.01" step="0.1" value="1">
        </label>
        <label>
          1日あたりの活動時間
          <input id="hours-per-day" type="number" min="0.01" max="24" step="0.1" value="2">
        </label>
      </div>

      <div id="custom-fields" class="calculator-grid" hidden>
        <label>
          次レベル必要EXPの式（L=現在レベル）
          <input id="next-formula" type="text" maxlength="200" value="5 * L ** 2 + 50 * L">
        </label>
        <label>
          累積EXPの式（任意。空欄なら次レベル式を合算）
          <input id="total-formula" type="text" maxlength="200" placeholder="例: 5 * L ** 3">
        </label>
      </div>

      <p id="calculator-error" role="alert"></p>
      <div class="calculator-results">
        <table>
          <thead>
            <tr>
              <th>付与パターン</th>
              <th>目標までの必要XP</th>
              <th>必要な付与回数</th>
              <th>活動時間の目安</th>
              <th>日数の目安</th>
            </tr>
          </thead>
          <tbody id="results"></tbody>
        </table>
      </div>
      <p class="calculator-note">
        レベル1から目標レベルに到達するまでの累積XPで計算します。
        レベル上限、既に所持しているXP、期間中の設定変更は考慮しません。
      </p>
      <p><a href="rank">← ランクシステムの説明へ戻る</a></p>

      <?php include __DIR__ . '/../include/footer.php'; ?>
    </div>
  </main>
  <script src="../js/main.js?v=<?= @filemtime(__DIR__ . '/../js/main.js') ?: time() ?>"></script>
  <script>
    (function() {
      const templates = {
        easy_start: '5 * L ** 2 + 50 * L',
        current: '5 * L ** 2 + 50 * L + 100',
        linear: '30 * L + 20',
        gentle: '3 * L ** 2 + 30 * L + 15'
      };
      const curve = document.getElementById('curve');
      const customFields = document.getElementById('custom-fields');
      const results = document.getElementById('results');
      const error = document.getElementById('calculator-error');
      const params = new URLSearchParams(window.location.search);
      const formatter = new Intl.NumberFormat('ja-JP', {
        maximumFractionDigits: 2
      });

      function pythonRound(value, digits) {
        const factor = Math.pow(10, digits || 0);
        const scaled = value * factor;
        const lower = Math.floor(scaled);
        const fraction = scaled - lower;
        let rounded = lower;
        if (fraction > 0.5 || (fraction === 0.5 && lower % 2 !== 0)) {
          rounded++;
        }
        return rounded / factor;
      }

      function evaluate(source, level) {
        const tokens = source.match(
          /\s*(\*\*|\/\/|[()+\-*\/%,]|(?:\d+(?:\.\d*)?|\.\d+)|[A-Za-z_]\w*)/g
        );
        if (!tokens || tokens.join('').replace(/\s/g, '') !== source.replace(/\s/g, '')) {
          throw new Error('数式に使用できない文字があります。');
        }
        const list = tokens.map(token => token.trim());
        let index = 0;
        const peek = () => list[index];
        const take = token => {
          if (peek() !== token) throw new Error('数式の構文を確認してください。');
          index++;
        };
        const primary = () => {
          if (peek() === '(') {
            index++;
            const value = expression();
            take(')');
            return value;
          }
          if (/^(?:\d+(?:\.\d*)?|\.\d+)$/.test(peek() || '')) {
            return Number(list[index++]);
          }
          const name = peek();
          if (!name) throw new Error('数式の構文を確認してください。');
          index++;
          if (name === 'L') return level;
          if (!['min', 'max', 'abs', 'pow', 'int', 'float', 'round'].includes(name)) {
            throw new Error('使える変数はL、関数はmin/max/abs/pow/int/float/roundです。');
          }
          take('(');
          const args = [expression()];
          while (peek() === ',') {
            index++;
            args.push(expression());
          }
          take(')');
          const funcs = {
            min: Math.min,
            max: Math.max,
            abs: Math.abs,
            pow: Math.pow,
            int: Math.trunc,
            float: Number,
            round: pythonRound
          };
          return funcs[name](...args);
        };
        const power = () => {
          const left = primary();
          if (peek() === '**') {
            index++;
            return Math.pow(left, factor());
          }
          return left;
        };
        const factor = () => {
          if (peek() === '+') { index++; return factor(); }
          if (peek() === '-') { index++; return -factor(); }
          return power();
        };
        const term = () => {
          let value = factor();
          while (['*', '/', '//', '%'].includes(peek())) {
            const op = list[index++];
            const right = factor();
            if (op === '*') value *= right;
            if (op === '/') value /= right;
            if (op === '//') value = Math.floor(value / right);
            if (op === '%') value %= right;
          }
          return value;
        };
        const expression = () => {
          let value = term();
          while (peek() === '+' || peek() === '-') {
            const op = list[index++];
            const right = term();
            value = op === '+' ? value + right : value - right;
          }
          return value;
        };
        const value = expression();
        if (index !== list.length || !Number.isFinite(value)) {
          throw new Error('数式の結果が不正です。');
        }
        return Math.max(1, Math.trunc(value));
      }

      function calculate() {
        error.textContent = '';
        results.replaceChildren();
        customFields.hidden = curve.value !== 'custom';
        try {
          const target = Number(document.getElementById('target-level').value);
          const minExp = Number(document.getElementById('min-exp').value);
          const maxExp = Number(document.getElementById('max-exp').value);
          const events = Number(document.getElementById('events-per-hour').value);
          const hours = Number(document.getElementById('hours-per-day').value);
          if (!Number.isInteger(target) || target < 2 || target > 10000) {
            throw new Error('目標レベルは2～10000の整数で入力してください。');
          }
          if (![minExp, maxExp, events, hours].every(Number.isFinite)
              || minExp < 0 || maxExp < minExp || events <= 0
              || hours <= 0 || hours > 24) {
            throw new Error('EXP範囲・付与回数・活動時間を確認してください。');
          }
          const nextFormula = curve.value === 'custom'
            ? document.getElementById('next-formula').value.trim()
            : templates[curve.value];
          const totalFormula = curve.value === 'custom'
            ? document.getElementById('total-formula').value.trim()
            : '';
          let neededXp = 0;
          if (totalFormula) {
            neededXp = evaluate(totalFormula, target);
            if (target > 1 && evaluate(totalFormula, target - 1) > neededXp) {
              throw new Error('累積EXP式はレベルとともに増加する必要があります。');
            }
          } else {
            for (let level = 1; level < target; level++) {
              neededXp += evaluate(nextFormula, level);
              if (neededXp > Number.MAX_SAFE_INTEGER) {
                throw new Error('目標レベルが高すぎて計算できません。');
              }
            }
          }
          const patterns = [
            ['常に最低値', minExp],
            ['常に平均値', (minExp + maxExp) / 2],
            ['常に最高値', maxExp]
          ];
          patterns.forEach(([label, exp]) => {
            const count = exp > 0 ? Math.ceil(neededXp / exp) : Infinity;
            const totalHours = count / events;
            const days = totalHours / hours;
            const row = document.createElement('tr');
            [
              label,
              `${formatter.format(neededXp)} XP`,
              Number.isFinite(count) ? formatter.format(count) : '付与なし',
              Number.isFinite(totalHours) ? formatDuration(totalHours) : '算出不可',
              Number.isFinite(days) ? `${formatter.format(days)}日` : '算出不可'
            ].forEach(value => {
              const cell = document.createElement('td');
              cell.textContent = value;
              row.appendChild(cell);
            });
            results.appendChild(row);
          });
        } catch (exception) {
          error.textContent = exception.message;
        }
      }

      function loadSettingsFromQuery() {
        const modeNames = {
          '0': '固定EXP',
          '1': '一様ランダム',
          '2': '三角分布ランダム',
          '3': 'カスタムEXP数式'
        };
        const modeName = modeNames[params.get('mode')];
        if (modeName) {
          const source = document.getElementById('settings-source');
          source.hidden = false;
          source.textContent =
            `Bot設定プレビューから読み込んだ値です（${modeName}）。`;
        }
        const activity = params.get('activity');
        if (activity === 'chat' || activity === 'vc') {
          document.getElementById('activity').value = activity;
        }
        const curveValue = params.get('curve');
        if (curveValue === 'custom') {
          curve.value = 'custom';
          document.getElementById('next-formula').value =
            params.get('next') || '';
          document.getElementById('total-formula').value =
            params.get('total') || '';
        } else if (curveValue && templates[curveValue]) {
          curve.value = curveValue;
        }
        const prefix = document.getElementById('activity').value;
        const minimum = params.get(`${prefix}_min`);
        const maximum = params.get(`${prefix}_max`);
        const events = params.get(`${prefix}_events`);
        if (minimum !== null) {
          document.getElementById('min-exp').value = minimum;
        }
        if (maximum !== null) {
          document.getElementById('max-exp').value = maximum;
        }
        if (events !== null) {
          document.getElementById('events-per-hour').value = events;
        }
      }

      document.getElementById('activity').addEventListener('change', () => {
        const prefix = document.getElementById('activity').value;
        const minimum = params.get(`${prefix}_min`);
        const maximum = params.get(`${prefix}_max`);
        const events = params.get(`${prefix}_events`);
        if (minimum !== null) {
          document.getElementById('min-exp').value = minimum;
        }
        if (maximum !== null) {
          document.getElementById('max-exp').value = maximum;
        }
        if (events !== null) {
          document.getElementById('events-per-hour').value = events;
        }
        calculate();
      });

      function formatDuration(hours) {
        if (hours < 1) return `${formatter.format(hours * 60)}分`;
        if (hours < 24) return `${formatter.format(hours)}時間`;
        return `${formatter.format(hours / 24)}日相当`;
      }

      document.querySelectorAll('input, select').forEach(input => {
        input.addEventListener('input', calculate);
        input.addEventListener('change', calculate);
      });
      loadSettingsFromQuery();
      calculate();
    })();
  </script>
</body>
</html>
