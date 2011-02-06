<?PHP

/* ====================
[BEGIN_COT_EXT]
Hooks=page.add.tags
[END_COT_EXT]
==================== */


defined('COT_CODE') or die('Wrong URL');

$t->assign(array(
    "PAGEADD_FORM_TITLE" => "<input type=\"text\" class=\"text\" name=\"rpagetitle\" id=\"newpagetitle\" value=\"".$newpagetitle."\" size=\"56\" onchange=\"genSEF(this, document.forms['pageform'].newpagealias,1)\" onkeyup=\"genSEF(this,document.forms['pageform'].newpagealias,1)\" maxlength=\"255\" />",
    "PAGEADD_FORM_ALIAS" => "<input type=\"text\" class=\"text\" name=\"rpagealias\" id=\"newpagealias\" value=\"".$newpagealias."\" size=\"16\" maxlength=\"255\" />"
));

?>