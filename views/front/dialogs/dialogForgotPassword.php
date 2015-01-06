<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divForgotPassword" title="<?=$oT->gL("txtForgotPassword")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formForgotPassword" onsubmit="return false;" action="">  
	<fieldset style="margin-left:0px;">
		<label for="formForgotPasswordEmail"><?=$oT->gL("txtYourEmail")?></label>
		<input type="text" name="email" value="" id="formForgotPasswordEmail" class="text ui-widget-content ui-corner-all" />		
	</fieldset>
	</form>
</div>
