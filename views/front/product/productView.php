<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>
<?$objProduct = $event->getArg("objProduct");?>
<?$urlExtension = "";?>
<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
	$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
} else {
	$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
}?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$objProduct->getName();?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-helper-clearfix center-content" style="padding:0px;">
		
		<div id="productDescription">
			<div class="ui-helper-clearfix spacer">
			</div> <!-- end .ui-helper-clearfix spacer -->
		
			<div style="float:left; width:320px; padding:0px 0px 10px 0px;">
				<div class="galeria" style="float:left; width:320px; height:320px; padding: 0px 20px 0px 0px;">
					<a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>upload/proper/<?=$objProduct->getImgDriveName();?>" class="photo"  rel="prettyPhoto[gallery0]" ><img  style="border: 1px dotted #e5e5e5;z-index:-1;"  src="<?=$SN?>upload/thumb/<?=$objProduct->getImgDriveName();?>" /></a>
				</div>
			</div>
		
			<div style="float:right; width:340px; padding-right:10px;">
				
				<div class="ui-widget-content ui-corner-all center-content">            
						<h1><?=$objProduct->getName();?></h1>
					
						<h3><br/>Pris: 
						<?if ($objProduct->getPriceOld() != 0) {?>
							<strong><strike><font color="#000"><?=$objProduct->getPriceOld();?> NOK</font></strike></strong>&nbsp;&nbsp;
							<strong><font color="#000"><?=$objProduct->getPrice();?> NOK</font></strong>
							<? if($objProduct->getIsAvailable() != 1) {?>
								- Produkt jest niedostępny
							<?}?>
                           </h3><br/> 
						<?} else {?>
							<strong><font color="#000"><?=$objProduct->getPrice();?> NOK</font></strong>
							<? if($objProduct->getIsAvailable() != 1) {?>
								- Product is not available
							<?}?>
                            </h3> <br/>
						<?}?>	
					
					<? if($objProduct->getIsAvailable() == 1) {?>
						<a title="Legg i handlekurven" href="<?=$SN?>executeAddShoppingCartAction<?=$urlExtension?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>images/button_bg_green_70.png" alt="Legg i handlekurven"/></a>&nbsp;
					<?} else {?>
						<img src="<?=$SN?>images/button_bg_green_70_grey.png" alt="do_koszyka" />&nbsp;
					<?}?>
                    <?$title = $objProduct->getProductCategoryLevelTwoName();?>
					<a title="<?=$title;?>" href="<?=$SN;?>produkty<?=$urlExtension;?>.html"><img src="<?=$SN?>images/button_bg_continue.png" alt="Przejdź do <?=$objProduct->getProductCategoryLevelTwoSeoName();?>"/></a>
				</div>
			    
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
				<?if ($objProduct->getLongDescription() != "&lt;br /&gt;" && $objProduct->getLongDescription() != "") {?>
					<div class="ui-widget-content ui-corner-all center-content">
						<?=htmlspecialchars_decode($objProduct->getLongDescription());?>
					</div>
					
					<div class="ui-helper-clearfix spacer">
					</div> <!-- end .ui-helper-clearfix spacer -->
				<?}?>
				
				<div class="ui-helper-clearfix spacer">
				</div> <!-- end .ui-helper-clearfix spacer -->
				
			</div>
			
		</div>
</div>