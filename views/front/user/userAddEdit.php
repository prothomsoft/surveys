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
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong><?=$oT->gL("txtWarning")?>:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>


<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtPersonalDetails")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget-content ui-corner-all center-content">
		
	<form id="formAddEditNewUserApproved" name="formAddEditNewUserApproved"  action="<?=$SN?>moje_konto_zapisz.html" method="post">
	
			<input type="hidden" name="userId" value="<?=$event->getArg("userId")?>">
			<input type="hidden" name="email" value="<?=$event->getArg("email")?>">
			<input type="hidden" name="password" value="<?=$event->getArg("password")?>">
			
			
			
			<div style="float:left; width:48%">
			
				<fieldset>
					<label for="adres"><strong><?=$oT->gL("txtDeliveryAddress")?></strong></label>
				</fieldset>
				
				<fieldset>
					<label for="nameFirst"><?=$oT->gL("txtFirstName")?></label>
					<input type="text" name="nameFirst" id="formAddEditNewUserApprovedNameFirst" value="<?=$event->getArg("nameFirst")?>" class="text ui-widget-content ui-corner-all" />
					<label for="nameLast"><?=$oT->gL("txtLastName")?></label>
					<input type="text" name="nameLast" id="formAddEditNewUserApprovedNameLast" value="<?=$event->getArg("nameLast")?>" class="text ui-widget-content ui-corner-all" />
					<label for="street"><?=$oT->gL("txtStreet")?></label>
					<input type="text" name="street" id="formAddEditNewUserApprovedStreet" value="<?=$event->getArg("street")?>" class="text ui-widget-content ui-corner-all" />
					<label for="number"><?=$oT->gL("txtHouseNumber")?></label>
					<input type="text" name="number" id="formAddEditNewUserApprovedNumber" value="<?=$event->getArg("number")?>" class="text ui-widget-content ui-corner-all" />
				</fieldset>
			</div>
			
			<div style="float:right;  width:48%">
			
				<fieldset>
					<label for="adres">&nbsp;</label>
				</fieldset>
			
				<fieldset>
					<label for="zip"><?=$oT->gL("txtZip")?></label>
					<input type="text" name="zip" id="formAddEditNewUserApprovedZip" value="<?=$event->getArg("zip")?>" class="text ui-widget-content ui-corner-all" />
					<label for="city"><?=$oT->gL("txtCity")?></label>
					<input type="text" name="city" id="formAddEditNewUserApprovedCity" value="<?=$event->getArg("city")?>" class="text ui-widget-content ui-corner-all" />
					<label for="phone1"><?=$oT->gL("txtPhoneNumber")?></label>
					<input type="text" name="phone1" id="formAddEditNewUserApprovedPhone1" value="<?=$event->getArg("phone1")?>" class="text ui-widget-content ui-corner-all" />
				</fieldset>
				
			</div>
	
	<div class="ui-helper-clearfix spacer"></div>
	
	<div class="ui-widget" style="text-align:center;">
	
		<span>
			<a href="javascript:document.formAddEditNewUserApproved.submit();"><img src="<?=$SN?>images/save_changes.png" /></a>
		</span>
	</div>
	</form>
</div>