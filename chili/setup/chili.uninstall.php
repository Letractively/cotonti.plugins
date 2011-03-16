<?php
/**
 * Uninstalls highlight bbcode if necessary
 *
 * @package chili
 * @version 1.1
 * @author Trustmaster, Cotonti Team
 * @copyright Copyright (c) Cotonti Team 2008-2011
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

if (cot_plugin_active('bbcode'))
{
	// Remove plugin bbcodes
	cot_bbcode_remove(0, 'chili');
}
?>
