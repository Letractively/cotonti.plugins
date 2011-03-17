// Options
// Example options for Cotonti.com

var text_block_id = "div.translatable";
var translate_block_id = "div.translated";
var translate_block_insert = '<div class="translated"></div>';
//var translate_block_insert = "<div class=\"text_translated\" style=\"width:550px; overflow-x:auto; overflow-y:visible; margin-bottom:8px;\"\"></div>";
var def_lang_chekbox = "#deflang";
var langselectbox = "#lang";
var cfg_lock_tags = true;
var clone_mod = ""; //"notext" OR "" - with clone resource text 
var lock_tag = new Array("div.highlight", "pre.code", "div.spoiler");
var max_words_send = 480;
var t = 0;

var replace_conteiner =  new Array();

google.load("language", "1");

/* ----------------------------------------------------------------------------------------------------------------- */
function set_defaultlang()
{
	var flag = 0;
	flag = $(def_lang_chekbox).attr("checked");
	if (flag == 1) {
		lang = $(langselectbox + " option:selected").val();
		if ((lang != "") && ( lang != "none" )) {
			$.cookie('defaultlang', lang);
		}
		else {
			$.cookie('defaultlang', null);
		}
	}
	else  {
		$.cookie('defaultlang', null);
	}
}
/* ------------------------------------------------------------------------------------------------------------------ */
function translate_action(lang, source, index, n) {
	var len = source.length;
	var words = max_words_send;  
	var flag = false;
	$(translate_block_id + ":eq("+index+")").html("");
	while (source.length > 0)
	{
		translate_text = "";
		oldcontent = "";
		p = source.substring(0, words);
		k = p.lastIndexOf('>');
		if (k > 0) {
			k = k + 1;
		}
		if (k == -1) {
			k = p.lastIndexOf(' ');
		}
		if (k < 1) {
			k = words;
		}
		part = source.substring(0, k);
		// -----------------------------------------------------------
		google.language.translate (part, "", lang, function (result) {
			if (!result.error) {
				if (result.translation.length > 0) {
					translate_text += result.translation;
					if (index == (n - 1)) {
						endPartTranslate();
					}
				}
				else {
					translate_text += part;
					if (index == (n - 1)) {
						endPartTranslate();
					}
				}
			}
			oldcontent = $(translate_block_id + ":eq("+index+")").html();
			$(translate_block_id + ":eq("+index+")").html(oldcontent + translate_text);
			translate_text = "";
			oldcontent = "";
		});

		// -------------------------------------------------------------
		source = source.substring(k, source.length);
	}
}
/* -------------------------------------------------------------------------------------------------------------------- */
function back() {
	$(text_block_id).each(tlate)
	function tlate(index)
	{
		$(text_block_id + ":eq("+index+")").show("slow");
		$(translate_block_id + ":eq("+index+")").hide("slow");
	}
}
/* -------------------------------------------------------------------------------------------------------------------- */	 

    
function endPartTranslate()
{ 
	if (cfg_lock_tags)
	{
		for (var key in lock_tag) {
			i = 0;
          
			$(translate_block_id + " " + lock_tag[key]).each(
				function ()
				{
					$(this).html(replace_conteiner[key][i]);
					i++;
				}
				);
		}
		if (clone_mod == "notext")
		{
			for (var key in lock_tag) {
				i = 0;
				$(text_block_id + " " + lock_tag[key]).each(
					function ()
					{
						$(this).html(replace_conteiner[key][i]);
						i++;
					}
					);
			}
		}
	}
}

/* -------------------------------------------------------------------------------------------------------------------------- */

function startPartTranslate(lang)
{
	var n = $(text_block_id).size();
	if (clone_mod == "notext")
	{
		$(text_block_id).each(
			function begin_text_block(index)
			{
				$(text_block_id + ":eq("+index+")").hide();
				translate_action(lang, this.innerHTML, index, n);
			}
			);
	}
	if (clone_mod == "")
	{
		$(translate_block_id).each(
			function begin_translate_block(index)
			{
				$(text_block_id + ":eq("+index+")").hide();
				translate_action(lang, this.innerHTML, index, n);
			}
			);
	}
}

/* -------------------------------------------------------------------------------------------------------------------------- */

// prepare page for pranslate
function translate(lang)
{
	var i = 0;
	// insert translate block
	$(text_block_id).each(insert_translate_block)
	function insert_translate_block(index)
	{
		$(translate_block_id + ":eq("+index+")").remove();
		$(text_block_id + ":eq("+index+")").after(translate_block_insert);
	}
    
	if (clone_mod == "")
	{
		//clone content text_block into translate_block
		$(text_block_id).each(
			function clone_text_block(index)
			{
				source_text = $(text_block_id + ":eq("+index+")").html();
				$(translate_block_id + ":eq("+index+")").html(source_text);
			}
			);
	}
    
	if (cfg_lock_tags)
	{
		if (clone_mod == "")
		{
			//clear translate_block
			for (var key in lock_tag) {
				i = 0;
				replace_conteiner[key] =  new Array();
				$(translate_block_id + " " + lock_tag[key]).each(
					function()
					{
						replace_conteiner[key][i] = $(this).html();
						$(this).html("(*)");
						i++;
					}
					);
			}
		}
		if (clone_mod == "notext")
		{
			//clear translate_block
			for (var key in lock_tag) {
				i = 0;
				replace_conteiner[key] =  new Array();
				$(text_block_id + " " + lock_tag[key]).each(
					function()
					{
						replace_conteiner[key][i] = $(this).html();
						$(this).html("(*)");
						i++;
					}
					);
			}
		}
	}
	// run start part translate text
	startPartTranslate(lang)
}

/* -------------------------------------------------------------------------------------------------------------------------- */

$(document).ready(function() {
	var df = "";
	df = $.cookie("defaultlang");
	if (df === null)  {
		$(def_lang_chekbox).attr("checked", "");
		$(langselectbox + " option:first").attr("selected", "selected");
	}
	else  {
		$(def_lang_chekbox).attr("checked", "checked");
		$(langselectbox + " option[value='"+df+"']").attr('selected', 'selected');
		translate($.cookie("defaultlang"));
	}
});
