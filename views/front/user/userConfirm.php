<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtPersonalDetails")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget-content ui-corner-bottom center-content">
	<p><?=$oT->gL("txtPersonalDetailsSaved")?></p>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget" style="text-align:center;">
	<span class="shoppingCartButton" style="line-height: 1em; letter-spacing: 0em;">
			<a href="<?=$SN?>fvr.html"><img src="<?=$SN?>images/button_bg_continue.png"></a>
		</span>
</div>