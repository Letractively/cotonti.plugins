<?php
/**
 * Installs highlight bbcode if necessary
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
	// Installing new bbcodes
	cot_bbcode_remove(0, 'chili');
	cot_bbcode_add('highlight', 'callback', '\[highlight=([\w\-]+)\](.*?)\[/highlight\]', 'return \'<div class="highlight"><pre class="\'.$input[1].\'">\'.cot_bbcode_cdata($input[2]).\'</pre></div>\';', true, 3, 'chili');
}
?>
