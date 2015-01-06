<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divContactConfirm" title="<?=$oT->gL("txtContact")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formContactConfirm" onsubmit="return false;" action="">  
	<fieldset style="margin-left:0px;">
		<label><?=$oT->gL("txtYourMessageSent")?></label>
	</fieldset>
	</form>
</div>
