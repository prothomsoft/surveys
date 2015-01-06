<div class="ui-widget-header ui-corner-all center-header">	Product category entry - description </div>
<?if ($event->getArg('message') != "") {?>	<div class="ui-helper-clearfix spacer"></div>	<div class="ui-state-error ui-corner-all" style="padding: 8px;">		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 		<strong>Warning:</strong> <?=$event->getArg('message');?></p> 	</div><?}?>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget">	<?php echo $event->getArg('BetaWizardNavigation')?></div>
<div class="ui-helper-clearfix spacer"></div>
<form name="f1" method="post" action="index.php"><input type="hidden" name="event" id="event" value="showBetaStep2"><input type="hidden" name="ClubId" id="ClubId" value="<?=$event->getArg('ClubId')?>"><input type="hidden" name="BetaId" id="BetaId" value="<?=$event->getArg('BetaId')?>"><input type="hidden" name="ShortDescription" id="ShortDescription" value="<?=$event->getArg('ShortDescription')?>"><input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>"><input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>"><input type="hidden" name="EventDate" id="EventDate" value="1"><div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:20%">
	
		<?if($event->getArg('BetaOrder') != 0) {
			$maxBetaOrder = $event->getArg("BetaOrder");
		} else {
			$maxBetaOrder = $event->getArg("maxBetaOrder");
			$maxBetaOrder = $maxBetaOrder + 1;
		}?>
		<fieldset >
			<label for="BetaOrder">Order <font color="red">*</font></label>
			<input style="width:80px" type="text" name="BetaOrder" id="BetaOrder" value="<?=$maxBetaOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "BetaOrder") echo "ui-state-error"?>" />
		</fieldset>		
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Category Title</label>
		<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">Category Alt Description</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo htmlspecialchars_decode($event->getArg('Keyword'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>		
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Add Pictures" class="wymupdate">
	<span class="wizardButton wymupdate"><a href="javascript:$('#event').val('executeBetaWizardClose');$('#BetaId').val('<?=$event->getArg("BetaId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				