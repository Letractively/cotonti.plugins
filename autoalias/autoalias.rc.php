<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=rc
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

$m = cot_import('m','G','TXT');

if($m =='add' || $m =='edit'){
	cot_rc_add_file($cfg['plugins_dir'] . '/autoalias/js/autoalias.js');
 }

?>
