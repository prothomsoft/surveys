<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divSamples" title="Wyślij mi listę">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formSamples" onsubmit="return false;" name="formSamples" method="post" action="">  
	<fieldset style="margin-left:0px;">
		<label for="formSamplesEmail">Email</label>
		<input type="text" name="email" value="" id="formSamplesEmail" class="text ui-widget-content ui-corner-all" />		
	</fieldset>
	</form>
</div>
