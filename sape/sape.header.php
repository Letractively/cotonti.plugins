<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=header.tags
[END_COT_EXT]
==================== */
defined('COT_CODE') or die('Wrong URL');
if(!empty($cfg['plugin']['sape']['sape_key'])){
		global $sape;
		if (!defined('_SAPE_USER')){
									define('_SAPE_USER', $cfg['plugin']['sape']['sape_key']);
									}

		require_once($_SERVER['DOCUMENT_ROOT'].'/'._SAPE_USER.'/sape.php');
       // $ia['force_show_code'] = true;
		$ia['charset'] = 'UTF-8';
		$sape = new SAPE_client($ia);
		$sape_context = new SAPE_context($ia);
		ob_start(array(&$sape_context,'replace_in_page'));
}else{require_once cot_langfile('sape', 'plug');   echo $L['sape_no_key'];}
?>
