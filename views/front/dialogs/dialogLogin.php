<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divLogin" title="<?=$oT->gL("txtLogin")?>">

	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formLogin" onsubmit="return false;" name="formLogin" method="post" action="">
	<input type="hidden" name="referenceEvent" value="<?=$event->getArg("event");?>" />
	<fieldset style="margin-left:0px;">
		<label for="formLoginEmail"><?=$oT->gL("txtYourEmail")?></label>
		<input type="text" name="email" value="" id="formLoginEmail" class="text ui-widget-content ui-corner-all" />
		<label for="formLoginPassword"><?=$oT->gL("txtPassword")?></label>
		<input type="password" name="password" id="formLoginPassword" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>
	<?/*
	<fieldset style="margin-left:0px;">
    	<?=$oT->gL("txtIfYouAreNewClient")?> <a id="signUpLink" href=""> <u><?=$oT->gL("txtClickHere")?></u></a> <?=$oT->gL("txtToRegister")?>.</a>
	</fieldset>
	*/?>
	</form>
	
	<form id="executeLoginAdmin" action="<?=$SN?>admin/index.php?event=startAdmin">
	</form>
	
	<form id="executeLoginClientProfile" action="<?=$SN?>produkty/T-skjorter.html">
	</form>
	
	<form id="executeLoginClientBasket" action="<?=$SN?>koszyk.html">
	</form>
</div>
