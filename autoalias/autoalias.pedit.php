<?PHP

/* ====================
[BEGIN_COT_EXT]
Hooks=page.edit.tags
[END_COT_EXT]
==================== */


defined('COT_CODE') or die('Wrong URL');

$t->assign(array(
    "PAGEEDIT_FORM_TITLE" => "<input type=\"text\" class=\"text\" name=\"rpagetitle\" id=\"rpagetitle\" value=\"".$pag['page_title']."\" size=\"56\" onchange=\"genSEF(this, document.forms['pageform'].rpagealias,1)\" onkeyup=\"genSEF(this,document.forms['pageform'].rpagealias,1)\" maxlength=\"255\" />",
    "PAGEEDIT_FORM_ALIAS" => "<input type=\"text\" class=\"text\" name=\"rpagealias\" id=\"rpagealias\" value=\"".$pag['page_alias']."\" size=\"16\" maxlength=\"255\" />"
 ));

?>