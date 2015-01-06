<div class="ui-widget-header ui-corner-all center-header">
	Produkt - Product Category
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
	<?php echo $event->getArg('productWizardNavigation')?>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form name="f1" method="post" action="index.php">
		<input type="hidden" name="event" id="event" value="showProductStep2">
		<input type="hidden" name="productId" id="productId" value="<?=$event->getArg('productId')?>">
		
		
		<fieldset>
			<label for="ProductCategory">Product Category:</label>
			<?$arrBetas = $event->getArg('arrBetas');?>
			<?if($arrBetas) {?>
				<select name="BetaId" style="width:250px;">
					<option value="">--- select ---</a>
					<?foreach($arrBetas as $objBeta) {?>
						<?if($event->getArg("BetaId") == $objBeta->getBetaId()) {$selected = "selected";} else {$selected = "";}?>
						<option value="<?=$objBeta->getBetaId();?>" <?=$selected?>><?=$objBeta->getName();?></a>
					<?}?>
				</select>
			<?}?>
		</fieldset>
		
		<fieldset>
			<label for="Information">Product Category is a required field.</label>
		</fieldset>
		
	</form>
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<span class="wizardButton"><a href="javascript:document.f1.submit();">Next Step</a></span>
	<span class="wizardButton"><a href="javascript:$('#event').val('executeWizardClose');$('#productId').val('<?=$event->getArg("productId");?>');document.f1.submit();">Save Changes</a></span>
</div>