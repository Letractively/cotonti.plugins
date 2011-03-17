<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
[END_COT_EXT]
==================== */

/**
 * Google Translator scripts connector
 *
 * @package gtranslate
 * @version 1.1
 * @author Amro, Trustmaster
 * @copyright Copyright (c) Amro, Cotonti Team 2008-2011
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

cot_rc_add_file("{$cfg['plugins_dir']}/gtranslate/js/jquery.cookie.js");
cot_rc_add_file("{$cfg['plugins_dir']}/gtranslate/js/jsapi.js");
cot_rc_add_file("{$cfg['plugins_dir']}/gtranslate/js/gtranslate.js");

?>
