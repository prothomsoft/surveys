<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Uwaga:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>

<div class="ui-widget-header ui-corner-top center-header">
	Punkty Close2you &raquo; Dodaj punkty ujemne
</div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form id="formAddEditNewPoint" action="index.php?event=<?=$event->getArg("submitEvent").$urlExtension;?>" method="post">
		<input type="hidden" name="PointId" value="<?=$event->getArg("PointId")?>">
		
		<fieldset style="height:58px">
			<label for="CustomerInformation">Proszę wybrać klienta, któremu chcesz odjąć punkty</label>
			<?$arrAllUsers = $event->getArg("arrAllUsers");?>
			<?if($arrAllUsers) {?>
				<select name="userId" style="width:250px;">
					<option value="">--- wybierz ---</a>
					<?foreach($arrAllUsers as $objUser) {?>
						<?if($event->getArg("userId") == $objUser->getUserId()) {$selected = "selected";} else {$selected = "";}?>
						
						<?if($objUser->getNameFirst() != "" && $objUser->getNameLast() != "") {
							$firstLastName = " (".$objUser->getNameFirst()." ".$objUser->getNameLast().")";
						} else {
							$firstLastName = "";
						}?>
						
						<option value="<?=$objUser->getUserId();?>" <?=$selected?>><?=$objUser->getEmail();?> <?=$firstLastName;?></a>
					<?}?>
				</select>
			<?}?>
		</fieldset>
		
		<fieldset style="height:58px">
			<label for="ProductInformation">Informacje o punktach produktu</label>
			<?$arrProducts = $event->getArg("arrProducts");?>
			<?if($arrProducts) {?>
				<select name="productId" style="width:250px;">
					<option value="">--- wybierz ---</a>
					<?foreach($arrProducts as $objProduct) {?>
						<option value=""><?=$objProduct->getName();?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<?=$objProduct->getPointsMinus();?></a>
					<?}?>
				</select>
			<?}?>
		</fieldset>
		
		<fieldset>
			<label for="amount">Proszę podać ilość punktów do odjęcia</label>
			<input style="width:240px" type="text" name="amount" id="amount" value="<?echo stripslashes($event->getArg('amount'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "amount") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset style="width:750px;">
			<label for="PointComment">Opis do punktów</label>
			<textarea name="PointComment" id="PointComment" cols="91" rows="3"><?echo stripslashes($event->getArg('PointComment'));?></textarea>			
		</fieldset>
			
		<fieldset class="formButtons">
			<input type="submit" value="Zapisz">
			<span id="List"><a href="index.php?event=showPointsList">Powrót do listy</a></span>
		</fieldset>
	
	</form>
</div>