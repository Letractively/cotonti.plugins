<?php

/* ====================
[BEGIN_COT_EXT]
Hooks=footer.tags
Tags=footer.tpl:{SAPE}
[END_COT_EXT]
==================== */

defined('COT_CODE') or die('Wrong URL');

if(!empty($cfg['plugin']['sape']['sape_key'])){	$t->assign("SAPE", $sape->return_links());}
?>
