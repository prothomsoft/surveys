
<div class="ui-widget-header ui-corner-all center-header">
	News Entry - Description
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
	<?php echo $event->getArg('SigmaWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showSigmaStep2">
<input type="hidden" name="SigmaId" id="SigmaId" value="<?=$event->getArg('SigmaId')?>">
<input type="hidden" name="ClubId" id="ClubId" value="<?=$event->getArg('ClubId')?>">
<input type="hidden" name="DeltaId" id="DeltaId" value="<?=$event->getArg('DeltaId')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">

	
<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:50%">
	
		<?if($event->getArg('SigmaOrder') != 0) {
			$maxSigmaOrder = $event->getArg("SigmaOrder");
		} else {
			$maxSigmaOrder = $event->getArg("maxSigmaOrder");
			$maxSigmaOrder = $maxSigmaOrder + 1;
		}?>	
	
		<fieldset >
			<label for="SigmaOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="SigmaOrder" id="SigmaOrder" value="<?=$maxSigmaOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "SigmaOrder") echo "ui-state-error"?>" />
		</fieldset>
		
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Title</label>
		<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">Sub Title</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo htmlspecialchars_decode($event->getArg('Keyword'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="EventDate">Date of the entry (DD.MM.YYYY)</label>
		<input type="text" name="EventDate" id="EventDate" value="<?echo htmlspecialchars_decode($event->getArg('EventDate'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "EventDate") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Description">YouTube Code: http://www.youtube.com/embed/KjQEAb6VT-E</label>
		<input type="text" name="Description" id="Description" value="<?echo htmlspecialchars_decode($event->getArg('Description'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Description") echo "ui-state-error"?>" />
	</fieldset>
	
</div>
	
<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
		<fieldset style="width:750px;">
			<label for="ShortDescription">Short Text</label>
			<textarea name="ShortDescription" id="ShortDescription" cols="91" rows="15" class="wymeditor"><?echo htmlspecialchars_decode($event->getArg('ShortDescription'));?></textarea>			
		</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget-content ui-corner-all center-content">
		<fieldset style="width:750px;">
			<label for="LongDescription">Long Text</label>
			<textarea name="LongDescription" id="LongDescription" cols="91" rows="15" class="wymeditor"><?echo htmlspecialchars_decode($event->getArg('LongDescription'));?></textarea>			
		</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>


<div class="ui-widget formButtons">
	<input type="submit" value="Add Pictures" class="wymupdate">
	<span class="wizardButton wymupdate"><a href="javascript:$('#event').val('executeSigmaWizardClose');$('#SigmaId').val('<?=$event->getArg("SigmaId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				