
<div class="ui-widget-header ui-corner-all center-header">
	Project Category - Description
</div>

<?if ($event->getArg('message') != "") {?>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-state-error ui-corner-all" style="padding: 8px;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
	<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
</div>
<?}?>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget">
	<?php echo $event->getArg('ClubWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showClubStep2">
<input type="hidden" name="ClubId" id="ClubId" value="<?=$event->getArg('ClubId')?>">
<input type="hidden" name="Manager" id="Manager" value="<?=$event->getArg('Manager')?>">
<input type="hidden" name="Phone" id="Phone" value="<?=$event->getArg('Phone')?>">
<input type="hidden" name="Email" id="Email" value="<?=$event->getArg('Email')?>">
<input type="hidden" name="Lat" id="Lat" value="<?=$event->getArg('Lat')?>">
<input type="hidden" name="Lng" id="Lng" value="<?=$event->getArg('Lng')?>">
<input type="hidden" name="IsClub" id="IsClub" value="<?=$event->getArg('IsClub')?>">
<input type="hidden" name="Address" id="Address" value="<?=$event->getArg('Address')?>">
<input type="hidden" name="Route" id="Route" value="<?=$event->getArg('Route')?>">
<input type="hidden" name="IsClub" id="IsClub" value="<?=$event->getArg('IsClub')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">
<input type="hidden" name="Keyword" id="Keyword" value="<?=$event->getArg('Keyword')?>">
	
<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:20%">
	
		<?if($event->getArg('ClubOrder') != 0) {
			$maxClubOrder = $event->getArg("ClubOrder");
		} else {
			$maxClubOrder = $event->getArg("maxClubOrder");
			$maxClubOrder = $maxClubOrder + 1;
		}?>	
	
		<fieldset >
			<label for="ClubOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="ClubOrder" id="ClubOrder" value="<?=$maxClubOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ClubOrder") echo "ui-state-error"?>" />
		</fieldset>
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Name</label>
		<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<?/*<input type="submit" value="Add Pictures" class="wymupdate">*/?>
	<span class="wizardButton"><a href="javascript:$('#event').val('executeClubWizardClose');$('#ClubId').val('<?=$event->getArg("ClubId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				