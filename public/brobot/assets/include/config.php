<?php
/**
 * 兄弟Bot（BroBot）公式サイト 共通設定
 *
 * ここだけ書き換えれば全ページに反映される。
 * assets/include/ は doc-hub 側の .htaccess で直接アクセス禁止になっているため、
 * 設定ファイルの置き場所として安全。
 *
 * 注意: このファイルは出力を一切してはいけない（各ページの <!DOCTYPE html> より前に
 *       require するため、空白や改行を出すとレイアウトが崩れる）。
 */

// 商品の表示名
$PRODUCT_NAME = '兄弟Bot';

// ロゴ横に出す絵文字（不要なら ''）
$PRODUCT_EMOJI = '👬';

// 公式サイトのフォルダ名。ランディングのページ遷移アニメの判定に使う
$PRODUCT_SLUG = 'brobot';

// ヘッダーロゴのラベル（Bot / Premium など）。各ページで上書き可
$LOGO_LABEL ??= 'Bot';

// ドキュメントサイト（別ドメインなら絶対URLで書く）
$DOCS_URL = 'https://docs.delien.xyz/brobot/';

// この公式サイト自身の URL（末尾スラッシュ必須）。OGP の絶対URL生成に使う
$SITE_URL = 'https://hmk.delien.xyz/brobot/';

// サポート窓口
// TODO: Discord の招待URLが確定したら差し替える
$SUPPORT_URL = 'https://discord.gg/AmMkFhhD2D';

// ヘッダーのアイコン画像。assets/img/ に置き、商品ルートからの相対パスで書く
$ICON_PATH = './assets/img/icon.svg';

// アクセント色の RGB 値。「R,G,B」形式で、CSS の rgba(var(--accent-rgb), .x) と揃える
$ACCENT_RGB = '0,229,255';

// <title> の「|」以降に出すサイト名
$SITE_OWNER = 'けい🤖';

// フッターの著作権表記
$COPYRIGHT_HOLDER = 'けい';
$COPYRIGHT_URL = 'https://hmk.delien.xyz/';
