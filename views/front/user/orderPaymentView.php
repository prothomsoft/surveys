<?	$objAppSession = new AppSession();
	$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
	$arrProduct = $event->getArg('arrProduct');
	$SN = $objAppSession->getSession('SN');
	$OrderId = $event->getArg("OrderId");
	$SessionId = session_id();
	$delivery = $objAppSession->getSession("Delivery");
	$payment = $objAppSession->getSession("Payment");
    $orderComment = $objAppSession->getSession("OrderComment");
    $sLang = $objAppSession->getSession('sLang');
	require_once("model/components/translator.inc.php");
	$oT = new Translator('template3',$sLang);
?>


<?$shipPrice = $objAppSession->getSession("shipPrice"); //calculated ship price
  $deliveryType = $objAppSession->getSession("deliveryType");  //Post or Appointment
  $customerType = $objAppSession->getSession("customerType");  //Private or Company
 ?>

<?if ($event->getArg('message') != "") {?>
<div class="ui-state-error ui-corner-all" style="padding: 8px;">
	<p style="color:#FFF;"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
	<strong><?=$oT->gL("txtWarning")?>:</strong><?=$event->getArg('message');?></p> 
</div>
<div class="ui-helper-clearfix spacer"></div>
<?}?>

<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtOrderPayment")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget-content ui-corner-all center-content">
		<fieldset>
			<label for="Address"><strong><?=$oT->gL("txtDeliveryAddress")?>: </strong></label>
		</fieldset>
		
		<div style="float:left; width:48%">
			<fieldset>
				<label for="email"><?=$oT->gL("txtEmail")?>: <strong><?=$event->getArg("email")?></strong></label>
				<label for="nameFirst"><?=$oT->gL("txtFirstName")?>: <strong><?=$event->getArg("nameFirst")?></strong></label>
				<label for="nameLast"><?=$oT->gL("txtLastName")?>: <strong><?=$event->getArg("nameLast")?></strong></label>
				<label for="street"><?=$oT->gL("txtStreet")?>: <strong><?=$event->getArg("street")?></strong></label>
			</fieldset>
		</div>
		
		<div style="float:right;  width:48%">
			<fieldset>
				<label for="number"><?=$oT->gL("txtHouseNumber")?>: <strong><?=$event->getArg("number")?></strong></label>
				<label for="zip"><?=$oT->gL("txtZip")?>: <strong><?=$event->getArg("zip")?></strong></label>
				<label for="city"><?=$oT->gL("txtCity")?>: <strong><?=$event->getArg("city")?></strong></label>
				<label for="phone1"><?=$oT->gL("txtPhoneNumber")?>:  <strong><?=$event->getArg("phone1")?></strong></label>				
			</fieldset>
		</div>
		<div class="ui-helper-clearfix spacer"></div>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->


<div class="cms subpage_head">
	<div>
		<h3><font color="#666"><?=$oT->gL("txtOrderedProducts")?></font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget-content ui-corner-bottom center-content">
		<?if ($arrProduct) {?>
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="1">
					<?$cartTotal = 0;?>
					<?$totalBasketItems = 0;?>
					<?$totalPoints = 0;?>
					<?$cartWeightTotal = 0;?>
					<?$paypalData = "";?>					
					<?$paypalCounter = 1;?>
					<?foreach($event->getArg('arrProduct') as $objProduct) { 
						$quantity = $arrShoppingCartItems[$objProduct->getProductId()];
						$totalBasketItems = $totalBasketItems + $quantity; 
						$total = $objProduct->getPrice() * $quantity;
						$totalPoints = $totalPoints + $objProduct->getPoints() * $quantity;
						$total = number_format($total, 2, '.', '');
						$cartTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getPrice();
						$cartTotal = number_format($cartTotal, 2, '.', '');
						$cartWeightTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getWeight();
						$paypalData .= "<input type=\"hidden\" name=\"item_name_".$paypalCounter."\" value=\"".$objProduct->getName()."\">\n";						
						$paypalData .= "<input type=\"hidden\" name=\"amount_".$paypalCounter."\" value=\"".$objProduct->getPrice()."\">\n";						
						$paypalData .= "<input type=\"hidden\" name=\"quantity_".$paypalCounter."\" value=\"".$quantity."\">\n";						
						$paypalCounter = $paypalCounter + 1;
						?>
						<tr>
						<?$urlExtension = "";?>
						<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
							$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
						} else {
							$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
						}?>
						
							<input type="hidden" name="arrProductId[]" value="<?=$objProduct->getProductId()?>">
							<td width="55">
								<img src="<?=$SN?>upload/micro/<?=$objProduct->getImgDriveName();?>">
							</td>
							<?$urlExtension = "";?>
							<?if($objProduct->getProductCategoryLevelTwoSeoName() != "") {
								$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName()."/".$objProduct->getProductCategoryLevelTwoSeoName();
								$categoryName = $objProduct->getProductCategoryLevelTwoName();
							} else {
								$urlExtension = "/".$objProduct->getProductCategoryLevelOneSeoName();
								$categoryName = $objProduct->getProductCategoryLevelOneName();
							}?>
							
							<td width="300">
								<p style="text-align:left">
									<a class="anchor_link_product" href="#"><?=$objProduct->getName()?></a>
								</p>
							</td>
							
							<td width="100">
								<p  style="text-align:right">
									<?if ($objProduct->getPriceOld() != 0) {?>
										<strong><strike><font color="#000000"><?=$objProduct->getPriceOld();?> NOK</font></strike></strong><br/>
										<strong><font color="#000000"><?=$objProduct->getPrice();?> NOK</font></strong>
									<?} else {?>
										<strong><font color="#000000"><?=$objProduct->getPrice();?> NOK</font></strong>
									<?}?>
								</p>
							</td>
							<input type="hidden" name="arrQuantity[]" value="<?=$quantity?>">
							<td width="25"><p style="text-align:right"><font color="#000000"><?=$quantity?></font></p></td>
							<td width="80"><p style="text-align:right"><font color="#000000"><?=$total?> NOK</font></p></td>
						</tr>
					<?}?>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><p style="text-align:right"><strong>Total:</strong></p></td>
							<td><p style="text-align:right"><strong><?=$totalBasketItems;?></strong></p></td>
							<td><p style="text-align:right"><strong><?=number_format($cartTotal,2, '.', '');?> NOK</strong></p></td>
						</tr>
				</table>
				
			 	<?if($cartWeightTotal >= 0 && $cartWeightTotal < 999) {
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
				  if($deliveryType == "Appointment") {
				  	$shipPrice = "0";
				  	$shipMessage = "";
				  }
				  ?>
				  
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td>&nbsp;</td>
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
									<?if($customerType == "Private") {?>
										Privatkunde (betal med kort/paypal)
									<?}?>
									<?if($customerType == "Company") {?>
										Bedrift/skolekunde (faktura)
									<?}?>
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
									<?if($deliveryType == "Post") {?>
										Post (porto blir lagt til prisen)
									<?}?>
									<?if($deliveryType == "Appointment") {?>
										Hent varen selv etter avtale (ta kontakt)
									<?}?>
								</p>
							</div>
						</td>
					</tr>
				</table>
				    
				<table cellpadding="0" cellspacing="0" border="0">
						<tr>
							<td valign="top">
								<p><strong><?=$oT->gL("txtDeliveryCost")?>: <span id="shipPrice"><?=$shipPrice;?> NOK</span></strong></p>
								<p><strong><font color="#000000"><?=$oT->gL("txtTotal")?>: <span id="finalPrice"><?=number_format($cartTotal + $shipPrice,2, '.', '');?> NOK</span></font></strong></p>
							</td>							
						</tr>
					</table>
					
			</fieldset>
		<?} else {?>
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="0">
					<tr class="ui-widget ui-widget-header">
							<td width="15%">&nbsp;</td>
							<td width="35%"><?=$oT->gL("txtProducts")?></td>
							<td width="20%"><?=$oT->gL("txtPrice")?></td>
							<td width="10%"><?=$oT->gL("txtQuantity")?></td>
							<td width="20%"><?=$oT->gL("txtTotal")?></td>
						</tr>
					<tr>
						<td colspan="5"><?=$oT->gL("txtShoppingCartEmpty")?></td>
					</tr>
				</table>
			</fieldset>
		<?}?>
		
	</form>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->

<?
	$finalPrice = number_format($cartTotal + $shipPrice,2, '.', '');
	$finalPrice = $finalPrice * 100;	
?>

<form style="display: inline;" name="f2" method="post" action="https://www.paypal.com/cgi-bin/webscr">		
	<input type="hidden" name="cmd" value="_cart">
	<input type="hidden" name="lc" value="no_NO">		
	<input type="hidden" name="upload" value="1">
	<input type="hidden" name="no_note" value="1" />
	<input type="hidden" name="no_shipping" value="1" />
	<input type="hidden" name="charset" value="utf-8">
	<input type="hidden" name="business" value="musikkgaver@hotmail.com" />
	<input type="hidden" name="invoice" value="<?=$OrderId?>">
	<input type="hidden" name="notify_url" value="<?=$SN?>payment_online_store.html" />
	<input type="hidden" name="return" value="<?=$SN?>payment_ok.html" />
	<input type="hidden" name="cancel_return" value="<?=$SN?>payment_error.html" />		
	<input type="hidden" name="currency_code" value="NOK">				
	<? echo $paypalData; ?>	
	<input type="hidden" name="item_name_<?=$paypalCounter;?>" value="Fraktkostnad">
	<input type="hidden" name="amount_<?=$paypalCounter;?>" value="<?=$shipPrice;?>">
	<input type="hidden" name="quantity_<?=$paypalCounter;?>" value="1">
</form>	
<div style="text-align:center">
	<span class="shoppingCartButton"><a href="javascript:document.f2.submit();"><img src="<?=$SN?>images/paypal_payment.png" /></a></span>
</div>
					
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->