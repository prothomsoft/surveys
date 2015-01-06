<?$objAppSession = new AppSession();
	$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
	$arrProduct = $event->getArg('arrProduct');
	$SN = $objAppSession->getSession('SN');
	$sLang = $objAppSession->getSession('sLang');
	require_once("model/components/translator.inc.php");
	$oT = new Translator('template3',$sLang);
?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtShoppingCart")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<?$urlExtension = "/instrumenter";?>

<div class="ui-widget-content ui-corner-all center-content">

<?$BackProductId = $objAppSession->getSession("BackProductId");?>
<?$urlExtensionBack = "/instrumenter";?>

	<form name="f1" method="post" action="" id="shoppingCartForm">
		
		<?if ($arrProduct) {?>
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="1">
       				<tr class="ui-widget ">
						<td width="400" colspan="2"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtProducts")?></p></td>
						<td width="100"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtPrice")?></p></td>
						<td width="25"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtQuantity")?></p></td>
						<td width="100"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtTotal")?></p></td>
						<td width="60"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtRemove")?></p></td>
					</tr>
				
             
					<?$cartTotal = 0;?>
					<?$totalBasketItems = 0;?>
					<?$totalPoints = 0;?>
					<?$cartWeightTotal = 0;?>
					
					<?foreach($event->getArg('arrProduct') as $objProduct) { 
						$quantity = $arrShoppingCartItems[$objProduct->getProductId()];
						$totalBasketItems = $totalBasketItems + $quantity; 
						$total = $objProduct->getPrice() * $quantity;
						$totalPoints = $totalPoints + $objProduct->getPoints() * $quantity;
						$cartTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getPrice();
						$cartWeightTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getWeight();?>
						<tr>
						<?if($BackProductId == $objProduct->getProductId()) {
							if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
								$urlExtensionBack = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
							} else {
								$urlExtensionBack = "/".$objProduct->getProductCategoryLevelOneSeoName();
							}	
						}?>
							<input type="hidden" name="arrProductId[]" value="<?=$objProduct->getProductId()?>">
							<td>
								<a href="<?=$SN?>produkt/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>upload/micro/<?=$objProduct->getImgDriveName();?>"></a>
							</td>
							<?$urlExtension = "/instrumenter";?>
							<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
								$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
								$categoryName = $objProduct->getProductCategoryLevelTwoName();
							} else {
								$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
								$categoryName = $objProduct->getProductCategoryLevelOneName();
							}?>
							
							<td>
								<p style="text-align:left">
									<a class="anchor_link_product" href="<?=$SN?>produkt/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><?=$objProduct->getName()?></a>
								</p>
							</td>
							
							<td>
							<p style="text-align:right">
							<?if ($objProduct->getPriceOld() != 0) {?>
								<strike><font color="#000000"><?=$objProduct->getPriceOld();?> NOK</font></strike><br/>
								<font color="#000000"><?=$objProduct->getPrice();?> NOK</font>
							<?} else {?>
								<font color="#000000"><?=$objProduct->getPrice();?> NOK</font>
							<?}?>
							</p></td>
							
							<td width="15"><input class="quantity" style="width:15px" type="text" size="3" name="arrQuantity[]" value="<?=$quantity?>" onKeyPress="return disableEnterKey(event)"></td>
							<td><p style="text-align:right; color: #000000;"><?=number_format($total, 2, '.', '');?> NOK</p></td>
							<td>
								<span class="shoppingCartButton">
									<a href="javascript:submitToUrl('<?=$SN;?>executeRemoveShoppingCartAction/<?=$objProduct->getProductId()?>.html');"><u><?=$oT->gL("txtRemove")?></u></a>
								</span>
							</td>
						</tr>
					<?}?>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><p style="text-align:right"><strong><?=$oT->gL("txtTotal")?>:</strong></p></td>
							<td><p style="text-align:right"><strong><?=$totalBasketItems;?></strong></p></td>
							<td><p style="text-align:right; color: #000000;"><strong><span id="cartTotal"><?=number_format($cartTotal,2, '.', '');?></span> NOK</strong></p></td>
							<td>&nbsp;</td>
						</tr>
				</table>
        		<?// shipPrice it also needs to be changed in jquery.musikkgaver.js line 820
        		
        		
				
				  $shipPrice = $objAppSession->setSession("shipPrice", $shipPrice);
				  if($cartWeightTotal >= 0 && $cartWeightTotal < 999) {
					$shipPrice = "80.00";
					$shipMessage = "Vektkategori A:  0- 750 g kr. 70,- +  kr. 10,- = kr. 80.00";
				  } else if ($cartWeightTotal >= 1000 && $cartWeightTotal < 1999) {
					$shipPrice = "110.00";
					$shipMessage = "Vektkategori B: 1,0 - 1,750 kg kr. 100,- + kr. 10,- = kr. 110,-";
				  } else if ($cartWeightTotal >= 2000 && $cartWeightTotal < 9599) {
					$shipPrice = "150.00";
					$shipMessage = "Vektkategori C: 2,0 - 9,5 kg  kr. 140,- + kr. 10, = kr. 150,-";
				  } else if ($cartWeightTotal >= 9600 && $cartWeightTotal < 24999) {
					$shipPrice = "260.00";
					$shipMessage = "Vektkategori D: 9,6  24,5 kg kr. 250,- + kr. 10,- = kr. 260,-";
				  } else if ($cartWeightTotal >= 25000) {
					$shipPrice = "370.00";
					$shipMessage = "Vektkategori E: 25 kg 34,5 kg kr. 360 + kr. 10,- = kr. 370,-";
				  }								
				  
				  // customerType
				  $customerType = $objAppSession->setSession("customerType", $customerType);
				  if($customerType == "") { $customerType = "Private";}
				  
				  // deliveryType
				  $deliveryType = $objAppSession->setSession("deliveryType", $deliveryType);
				  if($deliveryType == "") { $deliveryType = "Post";}
				?>
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td valign="top">
								<table cellpadding="0" cellspacing="0" border="0">
									<tr>
										<td align="right"><a href="javascript:submitToUrl('<?=$SN;?>executeUpdateShoppingCartAction<?=$urlExtension;?>.html');"><img src="<?=$SN?>images/refresh.png" /></a></td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
					
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td><strong>Velg ønsket betalingsmetode:</strong></td>
						</tr>																		
						<tr>
							<td width="99%">
								<div class="customerType">
									<p style="text-align:left">
                                    	<input type="radio" name="customerType" id="customerType" value="Private" style="width:20px" <?if($customerType == "Private") {echo "checked=\"checked\"";}?> />
                                    	<span id="customerType1">Privatkunde (betal med kort/paypal)</span><br/>
										<input type="radio" name="customerType" id="customerType" value="Company" style="width:20px;" <?if($customerType == "Company") {echo "checked=\"checked\"";}?> />
										<span id="customerType2">Bedrift/skolekunde (faktura)</span>
									</p>
								</div>
							</td>
						</tr>
					</table>
					
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td><strong>Velg ønsket leveringsmetode:</strong></td>
						</tr>																		
						<tr>
							<td width="99%">
								<div class="deliveryType">
									<p style="text-align:left">
									
										<input type="hidden" name="cartWeightTotal" id="cartWeightTotal" value="<?=$cartWeightTotal?>" />
									
                                    	<input type="radio" name="deliveryType" id="deliveryType" value="Post" style="width:20px" <?if($deliveryType == "Post") {echo "checked=\"checked\"";}?> />
										<span id="deliveryType1">Post (porto blir lagt til prisen)</span><br/>
										<input type="radio" name="deliveryType" id="deliveryType" value="Appointment" style="width:20px;" <?if($deliveryType == "Appointment") {echo "checked=\"checked\"";}?> />
										<span id="deliveryType2">Hent varen selv etter avtale (ta kontakt)</span>
									</p>
								</div>
							</td>
						</tr>
					</table>
								
					<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td><p><strong><font color="#000000"><?=$oT->gL("txtDeliveryCost")?>: <span id="shipPrice"><?=$shipPrice;?></span> NOK</font></strong></p>
							 <?/*<p>Cart Weight Total: <?=$cartWeightTotal?> grams - <?=$shipMessage;?></p>*/?>
							</td>
						</tr>
						<tr>
							<td><p><strong><font color="#000000"><?=$oT->gL("txtTotal")?>: <span id="finalPrice"><?=number_format($cartTotal + $shipPrice,2, '.', '');?></span> NOK</font></strong></p></td>
						</tr>
					</table>
					
			</fieldset>
		<?} else {?>
			<fieldset>
        		<table cellpadding="0" cellspacing="0" border="1">
					<tr class="ui-widget ">
						<td width="400" colspan="2"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtProducts")?></p></td>
						<td width="100"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtPrice")?></p></td>
						<td width="25"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtQuantity")?></p></td>
						<td width="80"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtTotal")?></p></td>
						<td width="60"><p style="text-align:left; font-weight:bold;"><?=$oT->gL("txtRemove")?></p></td>
					</tr>
					<tr>
						<td align="center" colspan="5"><br/><?=$oT->gL("txtShoppingCartEmpty")?><br/><br/></td>
					</tr>
				</table>
				<br/>
			</fieldset>
		<?}?>
		
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->


<input type="hidden" id="orderComments" name="orderComments" value="">
<input type="hidden" id="formShipId" name="shipId" value="<?=$shipId?>">
<input type="hidden" id="formShipName" name="shipName" value="<?=$shipName?>">
<input type="hidden" id="formShipPrice" name="shipPrice" value="<?=$shipPrice?>">

</form>


<?$objAppSession->setSession("totalBasketItems",$totalBasketItems);?>
<?$objAppSession->setSession("cartTotal",$cartTotal);?>



<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

<div style="text-align:center">
	
			<span>
				<a href="javascript:submitToUrl('<?=$SN;?>produkty<?=$urlExtensionBack;?>.html');"><img src="<?=$SN?>images/button_bg_continue.png" /></a>
			</span>&nbsp;&nbsp;
			
			<?if ($arrProduct) {?>
					<span class="shoppingCartButtonCheckout">
						<a href="javascript:submitToUrl('<?=$SN?>zamowienie_adres.html');"><img src="<?=$SN?>images/checkout.png" /></a>
					</span>					
			<?}?>
					
</div>

	<div class="ui-helper-clearfix spacer"> </div>   
    <div class="ui-helper-clearfix spacer"> </div>    