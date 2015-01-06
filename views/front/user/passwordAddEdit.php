<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);
?>


<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p style="color:#FFF;"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong><?=$oT->gL("txtWarning")?>:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>


<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtChangePassword")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->
				
<form id="formAddEditNewUserApproved" name="formAddEditNewUserApproved" action="<?=$SN?>zmiana_hasla_zapisz.html" method="post">
<div class="ui-widget-content ui-corner-all center-content" style="padding-right:20px;">
		<input type="hidden" name="userId" value="<?=$event->getArg("userId")?>">
		<fieldset>
			<label for="password"><?=$oT->gL("txtOldPassword")?>:</label>
			<input style="width:100px" type="text" name="password" id="formAddEditNewUserApprovedPassword" value="" class="text ui-widget-content ui-corner-all" />
			<label for="newPassword"><?=$oT->gL("txtNewPassword")?>:</label>
			<input style="width:100px" type="text" name="newPassword" id="formAddEditNewUserApprovedNewPassword" value="<?=$event->getArg("newPassword")?>" class="text ui-widget-content ui-corner-all" />
			<label for="repeatNewPassword"><?=$oT->gL("txtRepeatNewPassword")?>:</label>
			<input style="width:100px" type="text" name="repeatNewPassword" id="formAddEditNewUserApprovedRepeatNewPassword" value="<?=$event->getArg("repeatNewPassword")?>" class="text ui-widget-content ui-corner-all" />
		</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div style="text-align:center">
	<span>
		<a href="javascript:document.formAddEditNewUserApproved.submit();"><img src="<?=$SN?>images/save_changes.png" /></a>
	</span>
</div>
</form>
