// ===== Cultivate Docs - Navigation & Interactions =====

document.addEventListener('DOMContentLoaded', initPage);

function initPage() {
  // --- Sidebar active link ---
  const currentPath = location.pathname;
  const navLinks = document.querySelectorAll('.sidebar-nav a');

  navLinks.forEach(link => {
    const href = link.getAttribute('href');
    if (href && currentPath.endsWith(href)) {
      link.classList.add('active');
    }
  });

  // --- Mobile menu toggle ---
  const menuBtn = document.getElementById('mobile-menu-btn');
  const sidebar = document.getElementById('sidebar');
  const overlay = document.getElementById('menu-overlay');

  if (menuBtn && sidebar && overlay) {
    menuBtn.addEventListener('click', () => {
      sidebar.classList.toggle('open');
      overlay.classList.toggle('show');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.remove('open');
      overlay.classList.remove('show');
    });

    navLinks.forEach(link => {
      link.addEventListener('click', () => {
        sidebar.classList.remove('open');
        overlay.classList.remove('show');
      });
    });
  }

  // --- Smooth scroll for anchor links ---
  document.querySelectorAll('a[href^="#"]').forEach(anchor => {
    anchor.addEventListener('click', e => {
      const target = document.querySelector(anchor.getAttribute('href'));
      if (target) {
        e.preventDefault();
        target.scrollIntoView({ behavior: 'smooth', block: 'start' });
      }
    });
  });

  // --- Update filter bar (tag-based sorting) ---
  const filterBar = document.querySelector('.filter-bar');
  if (filterBar) {
    const filterBtns = Array.from(filterBar.querySelectorAll('.filter-tag'));
    const updateCards = Array.from(
      document.querySelectorAll('.update-card')
    );
    const versionSections = Array.from(
      document.querySelectorAll('.update-version')
    );
    const loadMoreBtn = document.getElementById('updates-load-more');
    const VERSIONS_PER_PAGE = 8;
    let shownVersions = VERSIONS_PER_PAGE;

    // バージョン見出しと、その直後に続く更新カードをグループ化する
    const groups = versionSections.map(section => {
      const nodes = [section];
      let next = section.nextElementSibling;
      while (next && next.classList.contains('update-card')) {
        nodes.push(next);
        next = next.nextElementSibling;
      }
      return nodes;
    });

    const currentFilter = () => {
      const active = filterBar.querySelector('.filter-tag.active');
      return active ? active.dataset.filter : 'all';
    };

    const applyUpdatesLayout = () => {
      const filtering = currentFilter() !== 'all';

      groups.forEach((group, index) => {
        const cards = group.filter(
          node => node.classList.contains('update-card')
        );
        const hasMatch = cards.length === 0 || cards.some(
          card => !card.classList.contains('hidden-by-filter')
        );
        // 絞り込み中は全履歴を対象にし、通常時は先頭から
        // VERSIONS_PER_PAGE 件ずつ表示する
        const show = hasMatch && (filtering || index < shownVersions);
        group.forEach(node => {
          node.style.display = show ? '' : 'none';
        });
      });

      if (loadMoreBtn) {
        const remaining = Math.max(0, groups.length - shownVersions);
        loadMoreBtn.hidden = filtering || remaining === 0;
        const counter = loadMoreBtn.querySelector('[data-remaining]');
        if (counter) counter.textContent = String(remaining);
      }
    };

    filterBtns.forEach(btn => {
      btn.addEventListener('click', () => {
        const filter = btn.dataset.filter;

        filterBtns.forEach(b => b.classList.remove('active'));
        btn.classList.add('active');

        updateCards.forEach(card => {
          const tags = card.dataset.tags || '';
          if (filter === 'all' || tags.split(' ').includes(filter)) {
            card.classList.remove('hidden-by-filter');
          } else {
            card.classList.add('hidden-by-filter');
          }
        });

        applyUpdatesLayout();
      });
    });

    if (loadMoreBtn) {
      loadMoreBtn.addEventListener('click', () => {
        shownVersions += VERSIONS_PER_PAGE;
        applyUpdatesLayout();
      });
    }

    applyUpdatesLayout();
  }

  // --- Copy code blocks ---
  document.querySelectorAll('pre code').forEach(block => {
    const btn = document.createElement('button');
    btn.textContent = '📋';
    btn.style.cssText = `
      position: absolute;
      top: 6px;
      right: 8px;
      background: var(--bg-primary);
      border: 1px solid var(--border);
      border-radius: 4px;
      padding: 4px 8px;
      cursor: pointer;
      font-size: 0.8rem;
      color: var(--text-secondary);
      transition: all 0.2s;
    `;
    btn.addEventListener('click', () => {
      navigator.clipboard.writeText(block.textContent).then(() => {
        btn.textContent = '✅';
        setTimeout(() => { btn.textContent = '📋'; }, 2000);
      });
    });
    const pre = block.parentElement;
    if (pre) {
      pre.style.position = 'relative';
      pre.appendChild(btn);
    }
  });

  // --- Setting screen preview ---
  initScreenPreview();
}

// 設定画面プレビュー（タブ切り替え + パネルボタンで説明を切り替え）
function initScreenPreview() {
  renderScreenPreviews();

  document.querySelectorAll('[data-screen-preview]').forEach(root => {
    const tabs = Array.from(root.querySelectorAll('.preview-tab'));
    const screens = Array.from(root.querySelectorAll('.preview-screen'));
    if (!screens.length) return;

    const activateScreen = name => {
      tabs.forEach(tab => {
        const on = tab.dataset.screen === name;
        tab.classList.toggle('is-active', on);
        tab.setAttribute('aria-selected', on ? 'true' : 'false');
        tab.tabIndex = on ? 0 : -1;
      });
      screens.forEach(screen => {
        const on = screen.dataset.screen === name;
        screen.classList.toggle('is-active', on);
        screen.hidden = !on;
      });
    };

    tabs.forEach((tab, index) => {
      tab.addEventListener('click', () => activateScreen(tab.dataset.screen));
      tab.addEventListener('keydown', event => {
        const step = event.key === 'ArrowRight' ? 1
          : event.key === 'ArrowLeft' ? -1 : 0;
        if (!step) return;
        event.preventDefault();
        const next = tabs[(index + step + tabs.length) % tabs.length];
        activateScreen(next.dataset.screen);
        next.focus();
      });
    });

    // 絵文字ボタン → 対応する説明カードを表示
    screens.forEach(screen => {
      const notes = Array.from(screen.querySelectorAll('.preview-note'));
      const buttons = Array.from(screen.querySelectorAll('[data-note]'));
      if (!notes.length || !buttons.length) return;

      const pressed = buttons.find(
        button => button.getAttribute('aria-pressed') === 'true'
      );
      if (!pressed) buttons[0].setAttribute('aria-pressed', 'true');

      buttons.forEach(button => {
        button.addEventListener('click', () => {
          buttons.forEach(other => {
            other.setAttribute(
              'aria-pressed', other === button ? 'true' : 'false'
            );
          });
          notes.forEach(note => {
            const on = note.dataset.note === button.dataset.note;
            note.classList.toggle('is-active', on);
            note.hidden = !on;
          });
        });
      });
    });

    if (tabs.length) {
      activateScreen(tabs[0].dataset.screen);
    } else {
      screens.forEach(screen => {
        screen.classList.add('is-active');
        screen.hidden = false;
      });
    }
  });
}

// JSON 設定からプレビュー本体を組み立てる
// ページ側の書式:
//   <div class="preview" data-screen-preview>
//     <script type="application/json">{ "screens": [ ... ] }</script>
//   </div>
// screen: { tab, channel, avatar?, time?, embed, select?, buttons?, notes?, caption? }
// embed: { title, desc?, color?, fields?, footer? }
// buttons[]: { label, style?, note?, title?, disabled?, active? }
// notes[]: { key, title, body?, link?, linkText? }
function renderScreenPreviews() {
  document.querySelectorAll('[data-screen-preview]').forEach(root => {
    const source = root.querySelector('script[type="application/json"]');
    if (!source) return;

    let config;
    try {
      config = JSON.parse(source.textContent);
    } catch (error) {
      return;
    }
    const screens = Array.isArray(config.screens) ? config.screens : [];
    if (!screens.length) return;

    const make = (tag, className, text) => {
      const node = document.createElement(tag);
      if (className) node.className = className;
      if (text != null) node.textContent = text;
      return node;
    };
    // Discord のマークダウン（コード・太字）を軽く HTML へ変換する
    const formatText = text => String(text)
      .replace(/```([\s\S]*?)```/g, '<code>$1</code>')
      .replace(/``([^`]+)``/g, '<code>$1</code>')
      .replace(/`([^`\n]+)`/g, '<code>$1</code>')
      .replace(/\*\*([^*\n]+)\*\*/g, '<strong>$1</strong>');

    const makeRich = (tag, className, html) => {
      const node = make(tag, className);
      if (html != null) node.innerHTML = formatText(html);
      return node;
    };

    root.textContent = '';

    if (screens.length > 1) {
      const tablist = make('div', 'preview-tabs');
      tablist.setAttribute('role', 'tablist');
      tablist.setAttribute(
        'aria-label', config.ariaLabel || '設定画面プレビュー'
      );
      screens.forEach((screen, index) => {
        const tab = make('button', 'preview-tab', screen.tab || `画面 ${index + 1}`);
        tab.type = 'button';
        tab.setAttribute('role', 'tab');
        tab.setAttribute('aria-selected', index === 0 ? 'true' : 'false');
        tab.dataset.screen = `screen-${index}`;
        if (index !== 0) {
          tab.tabIndex = -1;
          tab.classList.remove('is-active');
        } else {
          tab.classList.add('is-active');
        }
        tablist.appendChild(tab);
      });
      root.appendChild(tablist);
    }

    screens.forEach((screen, index) => {
      const section = make('div', 'preview-screen');
      section.setAttribute('role', 'tabpanel');
      section.setAttribute(
        'aria-label', screen.tab || config.ariaLabel || '設定画面'
      );
      section.dataset.screen = `screen-${index}`;
      if (index === 0) {
        section.classList.add('is-active');
      } else {
        section.hidden = true;
      }

      const notes = Array.isArray(screen.notes) ? screen.notes : [];
      const body = make('div', 'preview-body'
        + (notes.length ? ' has-notes' : ' no-notes'));

      const main = make('div', 'preview-main');
      const frame = make('div', 'dc-frame');
      const bar = make('div', 'dc-frame-bar');
      bar.appendChild(make('span', 'dc-hash', '#'));
      bar.appendChild(make('b', null, screen.channel || '設定パネル'));
      bar.appendChild(make('span', 'dc-frame-badge', 'プレビュー'));
      frame.appendChild(bar);

      const frameBody = make('div', 'dc-body');
      const message = make('div', 'dc-message');
      message.appendChild(make('div', 'dc-avatar', screen.avatar || '⚙️'));
      const mainColumn = make('div', 'dc-message-main');

      const head = make('div', 'dc-message-head');
      head.appendChild(make('b', null, screen.bot || 'Cultivate'));
      head.appendChild(make('span', 'dc-bot-tag', 'BOT'));
      head.appendChild(make('span', 'dc-time', screen.time || '今日 20:00'));
      mainColumn.appendChild(head);

      const embed = screen.embed || {};
      const embedNode = make(
        'div', 'dc-embed' + (embed.color ? ` dc-${embed.color}` : '')
      );
      if (embed.title) {
        embedNode.appendChild(
          makeRich('div', 'dc-embed-title', embed.title)
        );
      }
      if (embed.desc) {
        embedNode.appendChild(
          makeRich('div', 'dc-embed-desc', embed.desc)
        );
      }
      (embed.fields || []).forEach(field => {
        const fieldNode = make('div', 'dc-embed-field');
        fieldNode.appendChild(
          makeRich('div', 'dc-field-name', field.name || '')
        );
        fieldNode.appendChild(
          makeRich('div', 'dc-field-value', field.value || '')
        );
        embedNode.appendChild(fieldNode);
      });
      if (embed.footer) {
        embedNode.appendChild(
          make('div', 'dc-embed-footer', embed.footer)
        );
      }
      mainColumn.appendChild(embedNode);

      if (screen.select) {
        const select = make('div', 'dc-select');
        select.appendChild(make('span', null, screen.select));
        select.appendChild(make('span', 'dc-select-caret', '▾'));
        mainColumn.appendChild(select);
      }

      const buttons = Array.isArray(screen.buttons) ? screen.buttons : [];
      if (buttons.length) {
        const row = make('div', 'dc-buttons');
        buttons.forEach(button => {
          const node = make('button', 'dc-button', button.label || '');
          node.type = 'button';
          if (button.style) node.classList.add(button.style);
          if (button.title) node.title = button.title;
          if (button.disabled) node.disabled = true;
          if (button.note) {
            node.dataset.note = button.note;
            node.setAttribute(
              'aria-pressed', button.active ? 'true' : 'false'
            );
          }
          row.appendChild(node);
        });
        mainColumn.appendChild(row);
      }

      message.appendChild(mainColumn);
      frameBody.appendChild(message);
      frame.appendChild(frameBody);
      main.appendChild(frame);

      if (screen.caption) {
        main.appendChild(makeRich('p', 'preview-caption', screen.caption));
      }
      body.appendChild(main);

      if (notes.length) {
        const notesColumn = make('div', 'preview-notes');
        notes.forEach((note, noteIndex) => {
          const key = note.key || `note-${noteIndex}`;
          const noteNode = make('div', 'preview-note');
          noteNode.dataset.note = key;
          noteNode.appendChild(
            makeRich('h3', null, note.title || '')
          );
          if (note.body) {
            noteNode.appendChild(makeRich('p', null, note.body));
          }
          if (note.link) {
            const link = make(
              'a', null, note.linkText || '詳細を見る →'
            );
            link.href = note.link;
            noteNode.appendChild(link);
          }
          const active = noteIndex === 0;
          noteNode.classList.toggle('is-active', active);
          noteNode.hidden = !active;
          notesColumn.appendChild(noteNode);
        });
        body.appendChild(notesColumn);
      }

      section.appendChild(body);
      root.appendChild(section);
    });

    if (config.caption) {
      root.appendChild(makeRich('p', 'preview-caption', config.caption));
    }
  });
}
