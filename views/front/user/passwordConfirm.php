<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div class="center-content" style="padding-left:10px">
	<h1 style="font-size:16px"><?=$oT->gL("txtChangePassword")?></h1>
</div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<p><?=$oT->gL("txtPasswordChanged")?>Your password has been changed.</p>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget" style="text-align:center;">
	<span class="shoppingCartButton" style="line-height: 1em; letter-spacing: 0em;">
			<a href="<?=$SN?>fvr.html"><img src="<?=$SN?>images/button_bg_continue.png"></a>
		</span>
</div>