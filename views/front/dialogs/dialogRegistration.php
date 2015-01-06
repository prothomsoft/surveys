<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>

<div id="divRegistration" title="<?=$oT->gL("txtRegister")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formRegistration" onsubmit="return false;" action="">
	<fieldset style="margin-left:0px;">
	

		<?=$oT->gL("txtRegister1")?><br /><br/><?=$oT->gL("txtRegister2")?><br/><br/>	
	</fieldset>
	  
	<fieldset style="margin-left:0px;">
		<label for="formRegistrationEmail"><?=$oT->gL("txtYourEmail")?></label>
		<input type="text" name="email" value="" id="formRegistrationEmail" class="text ui-widget-content ui-corner-all" />
		<label for="formRegistrationPassword"><?=$oT->gL("txtPassword")?></label>
		<input type="text" name="password" id="formRegistrationPassword" value="" class="text ui-widget-content ui-corner-all" />
	</fieldset>    	
	</form>
</div>
