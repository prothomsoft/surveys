<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>



<div id="divContact" title="<?=$oT->gL("txtContact")?>">
	<p class="validateTips ui-helper-hidden">&nbsp;</p>
	<form id="formContact" onsubmit="return false;" name="formContact" method="post" action="">  
	<fieldset style="margin-left:0px;">
    	<label for="formContactName"><strong><?=$oT->gL("txtYourName")?></strong></label>
		<input type="text" name="name" value="" id="formContactName" class="text ui-widget-content ui-corner-all" />
		<label for="formContactEmail"><strong><?=$oT->gL("txtYourEmail")?></strong></label>
		<input type="text" name="email" value="" id="formContactEmail" class="text ui-widget-content ui-corner-all" />		
	</fieldset>
	<fieldset style="margin-left:0px;">
		<label for="formContactMessage"><strong><?=$oT->gL("txtMessage")?></strong></label>
		<textarea name="message" id="formContactMessage" cols="54" rows="4" class="text ui-widget-content ui-corner-all" style="width:323px;"></textarea>			
	</fieldset>
	</form>
</div>
