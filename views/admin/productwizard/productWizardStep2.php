<div class="ui-widget-header ui-corner-all center-header">
	Product - Product Details
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
	    <input type="hidden" name="event" id="event" value="showProductStep3">
	    <input type="hidden" name="productId" id="productId" value="<?=$event->getArg('productId')?>">
	    <input type="hidden" name="Code" id="Code" value="1">
	    <input type="hidden" name="Delivery" id="Delivery" value="1">
	    <input type="hidden" name="ProductType" id="ProductType" value="1">
	    <input type="hidden" name="ProducerName" id="ProducerName" value="1">
	    <input type="hidden" name="IsVisible" id="IsVisible" value="1">
	    <input type="hidden" name="PriceOld" id="PriceOld" value="">
	    <input type="hidden" name="Points" id="Points" value="">
	    <input type="hidden" name="PointsMinus" id="PointsMinus" value="">
	    <input type="hidden" name="PointsMinus" id="PointsMinus" value="">
	    
	    
	<div style="float:left; width:48%">
	
    	<? //$read = True;?>
    	<? $read = False;?>        
		<fieldset>
			<label for="Name">Name</label>
			<input type="text" name="Name" id="Name" value="<?echo htmlspecialchars_decode($event->getArg('Name'));?>" class="text ui-widget-content ui-corner-all
             <?if($read) echo "ui-state-error"?> <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" <?if($read) echo "readonly"?> />
		</fieldset>
		
		<fieldset>
			<label for="ExtName">Code</label>
			<input type="text" name="ExtName" id="ExtName" value="<?echo htmlspecialchars_decode($event->getArg('ExtName'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ExtName") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="ProductType">Keyword</label>
			<input type="text" name="ProductType" id="ProductType" value="<?echo htmlspecialchars_decode($event->getArg('ProductType'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ProductType") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="Delivery">Delivery Time</label>
			<input type="text" name="Delivery" id="Delivery" value="<?echo htmlspecialchars_decode($event->getArg('Delivery'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Delivery") echo "ui-state-error"?>" />
		</fieldset>
			
	</div>
	
	<div style="float:right; width:48%">
	    	
		<fieldset>
			<label for="Price">Price (NOK)</label>
			<input style="width:240px" type="text" name="Price" id="Price" value="<?echo htmlspecialchars_decode($event->getArg('Price'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Price") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="Weight">Weight (g)</label>
			<input style="width:240px" type="text" name="Weight" id="Weight" value="<?echo htmlspecialchars_decode($event->getArg('Weight'));?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "Weight") echo "ui-state-error"?>" />
		</fieldset>
		
		<?if($event->getArg('ProductOrder') != 0) {
			$maxProductOrder = $event->getArg("ProductOrder");
		} else {
			$maxProductOrder = $event->getArg("maxProductOrder");
			$maxProductOrder = $maxProductOrder + 1;
		}?>
		
		<fieldset>
			<label for="ProductOrder">Order</label>
			<input style="width:240px" type="text" name="ProductOrder" id="ProductOrder" value="<?= $maxProductOrder;?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "ProductOrder") echo "ui-state-error"?>" />
		</fieldset>
		
		<fieldset>
			<label for="InStock">Products in stock</label>
			<input style="width:240px" type="text" name="InStock" id="InStock" value="<?= $event->getArg("InStock");?>" class="text ui-widget-content ui-corner-all <?if ($event->getArg("missingField") == "InStock") echo "ui-state-error"?>" />
		</fieldset>
	
	</div>
	<div class="ui-helper-clearfix spacer"></div>
		
		<fieldset style="width:750px;">
			<label for="ShortDescription">Product Short Description - it is for facebook should be short and without HTML tags</label>
			<textarea name="ShortDescription" id="ShortDescription" cols="91" rows="15"><?echo htmlspecialchars_decode($event->getArg('ShortDescription'));?></textarea>			
		</fieldset>
		
	    <fieldset style="width:750px;">
			<label for="LongDescription">Product Long Description</label>
			<textarea name="LongDescription" id="LongDescription" cols="91" rows="15" class="wymeditor"><?echo htmlspecialchars_decode($event->getArg('LongDescription'));?></textarea>			
		</fieldset>
		
		<input type="hidden" name="HDescription" value="">
		<input type="hidden" name="PreviewDescription" value="">
		<input type="hidden" name="ContactDescription" value="">		
	<div class="ui-helper-clearfix spacer"></div>
	
	<input type="hidden" name="IsBestProduct" value="1">
	<input type="hidden" name="IsHomeProduct" value="1">
	
	<input type="hidden" name="IsAvailable" value="1">
	<input type="hidden" name="ProductIdLink1" value="">
	<input type="hidden" name="ProductIdLink2" value="">
	<input type="hidden" name="ProductIdLink3" value="">
	<input type="hidden" name="ProductIdLink4" value="">
	<input type="hidden" name="ProductIdLink5" value="">
		
</div>

<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<input type="submit" value="Next Step" class="wymupdate">
	<span class="wizardButton wymupdate"><a href="javascript:$('#event').val('executeWizardClose');$('#productId').val('<?=$event->getArg("productId");?>');document.f1.submit();">Save Changes</a></span>
</div>
</form>				