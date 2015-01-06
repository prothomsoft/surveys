<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divForgotPasswordConfirm" title="<?=$oT->gL("txtForgotPassword")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formForgotPasswordConfirm" onsubmit="return false;" action="">  
	<fieldset style="margin-left:0px;">
		<label><?=$oT->gL("txtEmailWithPasswordSent")?></label>
	</fieldset>
	</form>
</div>
