<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divRegistrationConfirm" title="<?=$oT->gL("txtRegister")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formRegistrationConfirm" onsubmit="return false;" action="">  
	<fieldset style="margin-left:0px;">
		<label><?=$oT->gL("txtRegister3")?> <br/><?=$oT->gL("txtRegister4")?></label>
	</fieldset>
	</form>
</div>
