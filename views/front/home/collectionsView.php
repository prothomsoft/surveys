<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>
	

<div class="center-content" style="padding:0px;">

<div class="center-content" style="padding-left:10px">
	<h1 style="font-size:16px">The most recommended products</h1>
</div>

<?$arrProducts = $event->getArg("arrProducts");?>
<?if($arrProducts) {?>
	<?$counter = 1;?>
	<?foreach($arrProducts as $objProduct) {?>
		
		<?if($objProduct->getIsHomeProduct() == 1) {?>
			<?$urlExtension = "";?>
			<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
			} else {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
			}?>
			
			<?if ($counter % 4 == 0) {?>
				<div class="productGrid" style="padding-right:0px">
					<div class="ui-widget-content ui-corner-all center-content">
						<p style="text-align:center; height:200px; padding: 10px 0px 10px 0px;"><a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>produkt/<?=$objProduct->getSeoName();?>/<?=$objProduct->getProductId()?>.html"><img  style="border: 2px solid #D0BA99;" src="<?=$SN?>upload/thumb/<?=$objProduct->getImgDriveName();?>" alt="<?=$objProduct->getName();?> - <?=htmlspecialchars_decode($objProduct->getProducerName());?>" /></a></p>
						<p style="text-align:center">&nbsp;</p>
						<p style="text-align:center">
							<?if ($objProduct->getPriceOld() != 0) {?>
								<strong><strike><font color="#84B0CF">$<?=$objProduct->getPriceOld();?></font></strike></strong>&nbsp;&nbsp;&nbsp;
								<strong><font color="#84B0CF">$<?=$objProduct->getPrice();?></font></strong>
							<?} else {?>
								<strong><font color="#84B0CF">$<?=$objProduct->getPrice();?></font></strong>
							<?}?>
						</p>
						<p style="text-align:center">&nbsp;</p>
						<p style="text-align:center">
							<a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>produkt/<?=$objProduct->getSeoName();?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>images/button_bg_pink_70.png" alt="wiecej"/></a>&nbsp;&nbsp;
							<? if($objProduct->getIsAvailable() == 1) {?>
								<a title="Do koszyka" href="<?=$SN?>executeAddShoppingCartAction<?=$urlExtension?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>images/button_bg_green_70.png" alt="do koszyka"/></a>
							<?} else {?>
								<img src="<?=$SN?>images/button_bg_green_70_grey.png" alt="do koszyka"/>&nbsp;
							<?}?>
						</p>
					</div>
				</div>
			<?} else {?>
				<div class="productGrid">
					<div class="ui-widget-content ui-corner-all center-content">
						<p style="text-align:center; height:200px; padding: 10px 0px 10px 0px;"><a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>produkt/<?=$objProduct->getSeoName();?>/<?=$objProduct->getProductId()?>.html"><img style="border: 2px solid #D0BA99;" src="<?=$SN?>upload/thumb/<?=$objProduct->getImgDriveName();?>" alt="<?=$objProduct->getName();?> - <?=htmlspecialchars_decode($objProduct->getProducerName());?>" /></a></p>
						<p style="text-align:center">&nbsp;</p>
						<p style="text-align:center">
							<?if ($objProduct->getPriceOld() != 0) {?>
								<strong><strike><font color="#84B0CF">$<?=$objProduct->getPriceOld();?></font></strike></strong>&nbsp;&nbsp;&nbsp;
								<strong><font color="#84B0CF">$<?=$objProduct->getPrice();?></font></strong>
							<?} else {?>
								<strong><font color="#84B0CF">$<?=$objProduct->getPrice();?></font></strong>
							<?}?>						
						</p>
						<p style="text-align:center">&nbsp;</p>
						<p style="text-align:center">
							<a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>produkt/<?=$objProduct->getSeoName();?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>images/button_bg_pink_70.png" alt="wiecej"/></a>&nbsp;&nbsp;
							<? if($objProduct->getIsAvailable() == 1) {?>
								<a title="Do koszyka" href="<?=$SN?>executeAddShoppingCartAction<?=$urlExtension?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>images/button_bg_green_70.png" alt="do koszyka"/></a>
							<?} else {?>
								<img src="<?=$SN?>images/button_bg_green_70_grey.png" alt="do koszyka"/>&nbsp;
							<?}?>
						</p>
					</div>
				</div>
			<?}?>
			<?$counter = $counter + 1;?>
		<?}?>
		
	<?}?>
<?}?>

</div>