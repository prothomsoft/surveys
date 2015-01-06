<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>

<div class="ui-widget-header ui-corner-top center-header">
	Users - User Management
</div>

<div class="ui-widget-content ui-corner-bottom center-content" style="padding-right:20px;">
	<form id="formAddEditNewUserApproved" action="index.php?event=<?=$event->getArg("submitEvent").$urlExtension;?>" method="post">
		<input type="hidden" name="userId" value="<?=$event->getArg("userId")?>">
		<input type="hidden" name="nipPL" value="<?=$event->getArg("nipPL")?>">
		<input type="hidden" name="companyName" value="<?=$event->getArg("companyName")?>">
		
		<fieldset>
			<label for="LoginInformation">Login credentials</label>
		</fieldset>
			
		<fieldset>
			<label for="email">Email</label>
			<input type="text" name="email" id="formAddEditNewUserApprovedEmail" value="<?=$event->getArg("email")?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "email") echo "ui-state-error"?>" />
			<label for="password">Password</label>
			<input type="text" name="password" id="formAddEditNewUserApprovedPassword" value="<?=$event->getArg("password")?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "password") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="AdditionalInformation">Additional information</label>
		</fieldset>
		
		<div style="float:left; width:48%">
			<fieldset>
				<label for="nameFirst">First name</label>
				<input type="text" name="nameFirst" id="formAddEditNewUserApprovedNameFirst" value="<?=$event->getArg("nameFirst")?>" class="text ui-widget-content ui-corner-all" />
				<label for="nameLast">Last name</label>
				<input type="text" name="nameLast" id="formAddEditNewUserApprovedNameLast" value="<?=$event->getArg("nameLast")?>" class="text ui-widget-content ui-corner-all" />
				<label for="street">Street</label>
				<input type="text" name="street" id="formAddEditNewUserApprovedStreet" value="<?=$event->getArg("street")?>" class="text ui-widget-content ui-corner-all" />
				<label for="number">House number</label>
				<input type="text" name="number" id="formAddEditNewUserApprovedNumber" value="<?=$event->getArg("number")?>" class="text ui-widget-content ui-corner-all" />
			</fieldset>
		</div>
		
		<div style="float:right;  width:48%">
			<fieldset>
				<label for="zip">Postal Code</label>
				<input type="text" name="zip" id="formAddEditNewUserApprovedZip" value="<?=$event->getArg("zip")?>" class="text ui-widget-content ui-corner-all" />
				<label for="city">City</label>
				<input type="text" name="city" id="formAddEditNewUserApprovedCity" value="<?=$event->getArg("city")?>" class="text ui-widget-content ui-corner-all" />
				<label for="phone1">Phone</label>
				<input type="text" name="phone1" id="formAddEditNewUserApprovedPhone1" value="<?=$event->getArg("phone1")?>" class="text ui-widget-content ui-corner-all" />
			</fieldset>
		</div>
		<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Save changes" class="wymupdate">
	<span id="List"><a href="index.php?event=showUsersApprovedList">Cancel</a></span>
</div>
</form>
