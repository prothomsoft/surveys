<?if ($event->getArg('message') != "") {?>
	<div class="ui-state-error ui-corner-all" style="padding: 8px;">
		<p><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
		<strong>Warning:</strong> <?=$event->getArg('message');?></p> 
	</div>
	<div class="ui-helper-clearfix spacer"></div> 
<?}?>

<div class="ui-widget-header ui-corner-top center-header">
	Orders - Order Details
</div>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form id="formAddEditNewOrder" name="formAddEditNewOrder" action="" method="post">
		<input type="hidden" name="orderId" value="<?=$event->getArg("orderId")?>">
		<input type="hidden" id="event" name="event" value="<?=$event->getArg("submitEvent").$urlExtension;?>">
		<input type="hidden" id="isSendFlag" name="isSendFlag" value="">
		<input type="hidden" id="isPointedFlag" name="isPointedFlag" value="">
		
		<fieldset>
			<label><strong>Ordrenummer: </strong>
         	           <?=$event->getArg("orderId")?>
            </label>    
       		<label for="CreateDate"><strong>Dato: </strong>
				<?=substr($event->getArg("CreateDate"), 0, 10)?>
			</label>
		</fieldset>
</div>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
		<fieldset>
			<label for="Address"><strong>Leveringsadresse: </strong></label>
		</fieldset>
		
		
		<div style="float:left; width:48%">
			<fieldset>
				<label for="nameFirst">Fornavn: <strong><?=$event->getArg("NameFirst");?></strong></label>
				<label for="nameLast">Etternavn: <strong><?=$event->getArg("NameLast");?></strong></label>
				<label for="street">Adresse: <strong><?=$event->getArg("Street");?></strong></label>
				<label for="number">Husnummer: <strong><?=$event->getArg("Number");?></strong></label>
			</fieldset>
		</div>
		
		<div style="float:right;  width:48%">
			<fieldset>
				<label for="zip">Postnummer: <strong><?=$event->getArg("Zip");?></strong></label>
				<label for="city">By: <strong><?=$event->getArg("City");?></strong></label>
				<label for="phone1">Telefonnummer:  <strong><?=$event->getArg("Phone1");?></strong></label>
			</fieldset>
		</div>
		<div class="ui-helper-clearfix spacer"></div>
		
</div>

<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
		
		<?$arrOrdersProduct = $event->getArg("arrOrdersProduct");?>
		<?if ($arrOrdersProduct) {?>
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="0">
					<?$cartTotal = 0;?>
					<?$totalBasketItems = 0;?>
					<?$totalPoints = 0;?>
					<?$cartWeightTotal = 0;?>
					<?foreach($event->getArg('arrOrdersProduct') as $objOrdersProduct) { 
						$quantity = $objOrdersProduct->getQuantity();
						$totalBasketItems = $totalBasketItems + $quantity; 
						$total = $objOrdersProduct->getPurchasePrice() * $quantity;
						$totalPoints += $objOrdersProduct->getPoints() * $quantity;
						$cartTotal +=  $objOrdersProduct->getQuantity() * $objOrdersProduct->getPurchasePrice();
						$cartWeightTotal += $objOrdersProduct->getQuantity() * $objOrdersProduct->getPurchaseWeight();?>
						<?if($objOrdersProduct->getProductCategoryLevelTwoName() != "") {
								$categoryName = $objOrdersProduct->getProductCategoryLevelTwoName();
							} else {
								$categoryName = $objOrdersProduct->getProductCategoryLevelOneName();
							}?>
						<tr>
							<td width="100">
								<img src="../upload/micro/<?=$objOrdersProduct->getImgDriveName();?>">
							</td>
							<td width="250">
								<p style="text-align:left">
									<a class="anchor_link_product" href="#"><?=$objOrdersProduct->getName()?></a>
								</p>
							</td>
							
							<td width="100">
								<strong><font color="#C8447C"><?=$objOrdersProduct->getPurchasePrice();?> NOK</font></strong>
							</td>
							<td width="25"><?=$objOrdersProduct->getQuantity();?></td>
							<td width="130"><?=number_format($total, 2, '.', '');?> NOK</td>
						</tr>
					<?}?>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><p style="text-align:right"><strong>Totalt:</strong></p></td>
							<td><strong><?=$totalBasketItems;?></strong></td>
							<td><strong><?=number_format($cartTotal, 2, '.', '');?> NOK</strong></td>
						</tr>
				</table>
			</fieldset>
		<?}?>
		
		<?// shipPrice it also needs to be changed in jquery.musikkglede.js line 820
				  
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
		?>
		
		<fieldset>
		
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="99%">
							<p style="text-align:left">
								<strong>Velg ønsket betalingsmetode: </strong> <?=$event->getArg("PaymentName");?>
							</p>
						</td>
					</tr>
			</table>
		
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="99%">
							<p style="text-align:left">
								<strong>Velg ønsket leveringsmetode: </strong> <?=$event->getArg("ShipName");?>
							</p>
						</td>
					</tr>
			</table>
			
			
			
			
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="160">&nbsp;</td>
						<td width="250">&nbsp;</td>
						<td width="100"><p style="text-align:right"><strong>Fraktkostnad:</strong></p></td>
						<td width="25">&nbsp;</td>
						<td width="130"><strong><?=$event->getArg("ShipPrice");?> NOK</strong></td>
					</tr>
				</table>
				
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="160">&nbsp;</td>
						<td width="250">&nbsp;</td>
						<td width="100"><p style="text-align:right"><strong><font color="#C8447C">Totalt:</font></strong></p></td>
						<td width="25">&nbsp;</td>
						<td width="130"><strong><font color="#C8447C"><?=number_format($cartTotal + $event->getArg("ShipPrice"),2, '.', '');?> NOK</font></strong></td>
					</tr>
				</table>
		</fieldset>
	</div>

<div class="ui-helper-clearfix spacer"></div>

<input type="hidden" name="AuthorizeStatus" value="0">
<input type="hidden" name="IsSend" value="0">
<input type="hidden" name="PointComment" value="0">
<input type="hidden" name="IsPointed" value="0">

<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
		<fieldset class="formButtons">
			<!--<input type="submit" value="Zapisz">-->
			<span id="List"><a href="index.php?event=showOrdersList">Go Back To List of Orders</a></span>
		</fieldset>
	</form>
</div>