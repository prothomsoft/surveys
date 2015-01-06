<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>

<div class="ui-widget-header ui-corner-top center-header">
	Producenci - Zarządzaj zawartością
</div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form id="formAddEditNewProducer" action="index.php?event=<?=$event->getArg("submitEvent").$urlExtension;?>" method="post">
		<input type="hidden" name="producerId" value="<?=$event->getArg("producerId")?>">
			
		<fieldset>
			<label for="name">Nazwa producenta:</label>
			<input type="text" name="name" id="formAddEditNewProducerName" value="<?=$event->getArg("name")?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "name") echo "ui-state-error"?>" />
		</fieldset>
			
		<fieldset class="formButtons">
			<input type="submit" value="Zapisz">
			<span id="List"><a href="index.php?event=showProducersList">Powrót do listy</a></span>
		</fieldset>
	
	</form>
</div>