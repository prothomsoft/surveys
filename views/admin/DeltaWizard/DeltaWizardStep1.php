<div class="ui-widget-header ui-corner-all center-header">
	Header - Content
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
	<?php echo $event->getArg('DeltaWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showDeltaStep2">
<input type="hidden" name="DeltaId" id="DeltaId" value="<?=$event->getArg('DeltaId')?>">
<input type="hidden" name="Keyword" id="Keyword" value="<?=$event->getArg('Keyword')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">
<input type="hidden" name="ShortDescription" id="ShortDescription" value="<?=$event->getArg('ShortDescription')?>">

<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:20%">
	
		<?if($event->getArg('DeltaOrder') != 0) {
			$maxDeltaOrder = $event->getArg("DeltaOrder");
		} else {
			$maxDeltaOrder = $event->getArg("maxDeltaOrder");
			$maxDeltaOrder = $maxDeltaOrder + 1;
		}?>	
	
		<fieldset >
			<label for="DeltaOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="DeltaOrder" id="DeltaOrder" value="<?=$maxDeltaOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "DeltaOrder") echo "ui-state-error"?>" />
		</fieldset>
		
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Caption</label>
		<input type="text" name="Name" id="Name" value="<?echo $event->getArg('Name');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">URL</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo $event->getArg('Keyword');?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Add Picture" class="wymupdate">
	<span class="wizardButton"><a href="javascript:$('#event').val('executeDeltaWizardClose');$('#DeltaId').val('<?=$event->getArg("DeltaId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				