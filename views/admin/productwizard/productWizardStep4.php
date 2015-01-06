
<div class="ui-widget-header ui-corner-all center-header">
	Produkt - Product Preview
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

<?$productId = $event->getArg('productId');
	$objProductDao = new ProductDao();
	$objProduct = $objProductDao->read($productId);?>

<div class="center-content" style="width=790px;  padding:0px;">
</div>
	

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

	
<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget formButtons">
	<form name="f1" method="post" action="index.php">
	      <input type="hidden" name="event" id="event" value="showProductStep5">
	      <input type="hidden" name="productId" id="productId" value="<?=$event->getArg('productId');?>">
	 </form>
	<span class="wizardButton"><a href="javascript:$('#event').val('executeWizardClose');$('#productId').val('<?=$event->getArg("productId");?>');document.f1.submit();">Save Changes</a></span>
</div>	