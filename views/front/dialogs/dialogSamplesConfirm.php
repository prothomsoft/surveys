<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divSamplesConfirm" title="Potwierdzenie">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formSamplesConfirm" onsubmit="return false;" action="">  
	<fieldset style="margin-left:0px;">
		<label>Lista zapachów została wysłana na podany adres email.</label>
	</fieldset>
	</form>
</div>
