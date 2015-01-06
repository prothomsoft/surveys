
<div class="ui-widget-header ui-corner-all center-header">
	Magazine - Description
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
	<?php echo $event->getArg('AlfaWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showAlfaStep2">
<input type="hidden" name="AlfaId" id="AlfaId" value="<?=$event->getArg('AlfaId')?>">
<input type="hidden" name="BetaId" id="BetaId" value="<?=$event->getArg('BetaId')?>">
<input type="hidden" name="ClubId" id="ClubId" value="<?=$event->getArg('ClubId')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="EventDate" id="EventDate" value="<?=$event->getArg('EventDate')?>"><input type="hidden" name="EventCalendar" id="EventCalendar" value="<?=$event->getArg('EventCalendar')?>">
<input type="hidden" name="YouTube" id="YouTube" value="<?=$event->getArg('YouTube')?>">
<input type="hidden" name="VeryShortDescription" id="VeryShortDescription" value="<?=$event->getArg('VeryShortDescription')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">

	
<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:20%">
	
		<?if($event->getArg('AlfaOrder') != 0) {
			$maxAlfaOrder = $event->getArg("AlfaOrder");
		} else {
			$maxAlfaOrder = $event->getArg("maxAlfaOrder");
			$maxAlfaOrder = $maxAlfaOrder + 1;
		}?>	
	
		<fieldset >
			<label for="AlfaOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="AlfaOrder" id="AlfaOrder" value="<?=$maxAlfaOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "AlfaOrder") echo "ui-state-error"?>" />
		</fieldset>
		
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Title</label>
		<input type="text" name="Name" id="Name" value="<?echo $event->getArg('Name');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">URL to file from File Manager (e.g. /dokumenty/polforf_1.pdf)</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo $event->getArg('Keyword');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>	
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
		<fieldset style="width:750px;">
			<label for="ShortDescription">Short description</label>
			<textarea name="ShortDescription" id="ShortDescription" cols="91" rows="15" class="wymeditor"><?echo htmlspecialchars_decode($event->getArg('ShortDescription'));?></textarea>			
		</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Add picture" class="wymupdate">
	<span class="wizardButton wymupdate"><a href="javascript:$('#event').val('executeAlfaWizardClose');$('#AlfaId').val('<?=$event->getArg("AlfaId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				