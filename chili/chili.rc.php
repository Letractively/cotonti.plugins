<?PHP
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
[END_COT_EXT]
==================== */

/**
 * Chili Highlighter connector for Cotonti
 *
 * @package chili
 * @version 1.1
 * @author Trustmaster
 * @copyright Copyright (c) Cotonti Team 2008-2011
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

global $cfg, $lang;
cot_rc_add_file("{$cfg['plugins_dir']}/chili/js/jquery.chili.js");
cot_rc_add_file("{$cfg['plugins_dir']}/chili/js/jquery.chili.toolbar.js");
cot_rc_add_file("{$cfg['plugins_dir']}/chili/lang/jquery.chili.toolbar.{$lang}.lang.js");
cot_rc_add_file("{$cfg['plugins_dir']}/chili/skins/jquery.chili.toolbar.css");
cot_rc_add_embed('chili_hl', <<<JS
ChiliBook.recipeFolder = "{$cfg['plugins_dir']}/chili/js/";
ChiliBook.lineNumbers = true;
ChiliBook.automaticSelector = ".highlight PRE";
ChiliBook.Toolbar.Utils.PopUpTarget = "jd73kjd9";
delete ChiliBook.Toolbar.Command.CopyToClipboard;
delete ChiliBook.Toolbar.Command.PrintSource;
delete ChiliBook.Toolbar.Command.About;
JS
);

?>