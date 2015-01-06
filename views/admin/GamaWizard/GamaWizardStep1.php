
<div class="ui-widget-header ui-corner-all center-header">
	Miasto - Opis
</div>

<?if ($event->getArg('message') != "") {?>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-state-error ui-corner-all" style="padding: 8px;">
	<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
	<strong>Uwaga:</strong> <?=$event->getArg('message');?></p> 
</div>
<?}?>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget">
	<?php echo $event->getArg('GamaWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>


<form name="f1" method="post" action="index.php">
<input type="hidden" name="event" id="event" value="showGamaStep2">
<input type="hidden" name="ClubId" id="ClubId" value="<?=$event->getArg('ClubId')?>">
<input type="hidden" name="GamaId" id="GamaId" value="<?=$event->getArg('GamaId')?>">
<input type="hidden" name="VideoDriveName" id="VideoDriveName" value="<?=$event->getArg('VideoDriveName')?>">
<input type="hidden" name="EventDate" id="EventDate" value="<?=$event->getArg('EventDate')?>">
<input type="hidden" name="GminaId" id="GminaId" value="<?=$event->getArg('GminaId')?>">
<input type="hidden" name="Description" id="Description" value="<?=$event->getArg('Description')?>">
<input type="hidden" name="ShortDescription" id="ShortDescription" value="<?=$event->getArg('ShortDescription')?>">
<input type="hidden" name="LongDescription" id="LongDescription" value="<?=$event->getArg('LongDescription')?>">
	
<div class="ui-widget-content ui-corner-all center-content">
	
	<div style="float:left; width:20%">
	
		<?if($event->getArg('GamaOrder') != 0) {
			$maxGamaOrder = $event->getArg("GamaOrder");
		} else {
			$maxGamaOrder = $event->getArg("maxGamaOrder");
			$maxGamaOrder = $maxGamaOrder + 1;
		}?>	
	
		<fieldset >
			<label for="GamaOrder">Kolejność <font color="red">*</font></label>
			<input style="width:80px" type="text" name="GamaOrder" id="GamaOrder" value="<?=$maxGamaOrder?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "GamaOrder") echo "ui-state-error"?>" />
		</fieldset>
	</div>
	<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer"></div>
		
<div class="ui-widget-content ui-corner-all center-content">
	<fieldset>
		<label for="Name">Nazwa PL</label>
		<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />
	</fieldset>
	
	<fieldset>
		<label for="Keyword">Translacja EN</label>
		<input type="text" name="Keyword" id="Keyword" value="<?echo htmlspecialchars_decode($event->getArg('Keyword'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Keyword") echo "ui-state-error"?>" />
	</fieldset>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<!--<input type="submit" value="Dodaj zdjęcia" class="wymupdate">-->
	<span class="wizardButton"><a href="javascript:$('#event').val('executeGamaWizardClose');$('#GamaId').val('<?=$event->getArg("GamaId");?>');document.f1.submit();">Zapisz zmiany</a></span>
</div>
</form>				