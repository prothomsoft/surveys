<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<?$arrProducts = $event->getArg("arrProducts");?>
<?if($arrProducts) {?>
	
	<div class="ui-corner-bottom center-content"  style="padding: 20px 7px 20px 7px; border-left: 1px solid #DEDEDE; border-right: 1px solid #DEDEDE; border-bottom: 1px solid #DEDEDE;">
	<?$counter = 1;?>
	<?foreach($arrProducts as $objProduct) {?>
		<?if($objProduct->getIsBestProduct() == 1) {?>
					
			<?$urlExtension = "";?>
			<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
			} else {
				$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
			}?>
				<table border="0" cellpadding="0" cellspacing="0"  style="border-bottom: 1px dotted #DEDEDE;">
					<tr>
						<td>
							<p style="line-height:15px;text-align:center;"><a title="<?=$objProduct->getProductType()?>"  href="<?=$SN?>produkt/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><?=$objProduct->getName();?></a><br/><?=$objProduct->getPrice();?> NOK<br/><br/></p>
							<center><a title="<?=$objProduct->getProductType()?>" href="<?=$SN?>produkt/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>upload/micro/<?=$objProduct->getImgDriveName();?>" alt="<?=$objProduct->getName();?> - <?=htmlspecialchars_decode($objProduct->getProducerName());?>" /></a></center>
						</td>						
					</tr>
				</table>
			<?}?>
		<?}?>
	</div>
<?}?>