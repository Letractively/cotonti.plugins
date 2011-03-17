<?php
/* ====================
[BEGIN_COT_EXT]
Hooks=forums.posts.tags
Tags=forums.posts.tpl:{TRANSLATE_SELECT}
[END_COT_EXT]
==================== */

/**
 * Selector tag for forum posts
 *
 * @package gtranslate
 * @version 1.1
 * @author Amro, Trustmaster
 * @copyright Copyright (c) Amro, Cotonti Team 2008-2011
 * @license BSD
 */

defined('COT_CODE') or die('Wrong URL');

$translate = '<img src="'.$cfg['plugins_dir'].'/translate/img/clear.gif" style="cursor:pointer;" title="Clear Translated Text" alt="Clear Translated Text" onclick="back()" />
<select id="lang" name="lang" onchange="translate(this.value)">
  <option value="none">Select language</option>
  <option value="sq">Albanian</option>
  <option value="ar">Arabic</option>
  <option value="bg">Bulgarian</option>
  <option value="ca">Catalan</option>
  <option value="zh-CN">Chinese</option>
  <option value="hr">Croatian</option>
  <option value="cs">Czech</option>
  <option value="da">Danish</option>
  <option value="nl">Dutch</option>
  <option value="en">English</option>
  <option value="et">Estonian</option>
  <option value="tl">Filipino</option>
  <option value="fi">Finnish</option>
  <option value="fr">French</option>
  <option value="gl">Galician</option>
  <option value="de">German</option>
  <option value="el">Greek</option>
  <option value="iw">Hebrew</option>
  <option value="hi">Hindi</option>
  <option value="hu">Hungarian</option>
  <option value="id">Indonesian</option>
  <option value="it">Italian</option>
  <option value="ja">Japanese</option>
  <option value="ko">Korean</option>
  <option value="lv">Latvian</option>
  <option value="lt">Lithuanian</option>
  <option value="mt">Maltese</option>
  <option value="no">Norwegian</option>
  <option value="pl">Polish</option>
  <option value="pt">Portuguese</option>
  <option value="ro">Romanian</option>
  <option value="ru">Russian</option>
  <option value="sr">Serbian</option>
  <option value="sk">Slovak</option>
  <option value="sl">Slovenian</option>
  <option value="es">Spanish</option>
  <option value="sv">Swedish</option>
  <option value="th">Thai</option>
  <option value="tr">Turkish</option>
  <option value="uk">Ukrainian</option>
  <option value="vi">Vietnamese</option>
</select>
<input type="checkbox" id="deflang" name="deflang" title="Set Default Language" onclick="set_defaultlang()" />';

$t->assign('TRANSLATE_SELECT', $translate);
?>
