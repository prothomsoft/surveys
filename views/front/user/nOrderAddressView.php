<?$objAppSession = new AppSession();
	$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
	$arrProduct = $event->getArg('arrProduct');
	$SN = $objAppSession->getSession('SN');
	$sLang = $objAppSession->getSession('sLang');
	require_once("model/components/translator.inc.php");
	$oT = new Translator('template3',$sLang);
?>

<?$shipPrice = $objAppSession->getSession("shipPrice"); //calculated ship price
  $deliveryType = $objAppSession->getSession("deliveryType");  //Post or Appointment
  $customerType = $objAppSession->getSession("customerType");  //Private or Company
 ?>

<!-- SHOPPING_CART -->
<section class="shopping_cart">
	<div class="container">				
		<div class="row">
			<!-- .shop-navbar -->
            <div class="col-md-3 hidden-xs hidden-sm">
                <div class="row">
                    <div class="col-md-12">
                        <div class="widget-box sidebar">                                    
                            <ul class="wdgt-ul">
                            	<?$arrBetas = $event->getArg("arrBetas");?>
								<?if($arrBetas) {?>
									<?foreach($arrBetas as $objBeta) {?>
										<li>
		                                    <a href="<?=$SN?>products/<?=$objBeta->getBetaId();?>/<?=$objBeta->getSeoName();?>.html"><?=$objBeta->getName();?></a>                                            
		                                </li>		                                
									<?}?>						
								<?}?>                         
                            </ul>
                        </div>
                    </div>                                                   
                </div>
            </div>
			
			<div class="col-md-9">
				
				<?if ($arrProduct) {?>				
				<form name="f1" method="post" action="<?=$SN;?>executeCreateOrderAndPayment.html" id="shoppingCartForm">
				
				
					<?/* LEVERINGSADRESSE STARTS HERE */?>
					<div class="row">
						<div class="col-md-12">
							<h3><?=$oT->gL("txtDeliveryAddress")?></h3>
							
							<?if ($event->getArg('message') != "") {?>
							<div class="alert alert-danger" id="contacterror">
									<strong><?=$oT->gL("txtWarning")?>:</strong> <?=$event->getArg('message');?></p>
							</div>
							<?}?>
							
							
							<div class="col-xs-6 col-sm-6">
								<div class="form-group">
									<label for="email"><?=$oT->gL("txtEmail");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="email" name="email" value="<?=$event->getArg("email");?>">
								</div>
								<div class="form-group">
									<label for="emailRepeat"><?=$oT->gL("txtRepeatEmail");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="emailRepeat" name="emailRepeat" value="<?=$event->getArg("emailRepeat")?>">
								</div>
								<div class="form-group">
									<label for="nameFirst"><?=$oT->gL("txtFirstName");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="nameFirst" name="nameFirst" value="<?=$event->getArg("nameFirst")?>">
								</div>
								<div class="form-group">
									<label for="nameLast"><?=$oT->gL("txtLastName");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="nameLast" name="nameLast" value="<?=$event->getArg("nameLast")?>">
								</div>
								<div class="form-group">
									<label for="street"><?=$oT->gL("txtStreet");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="street" name="street" value="<?=$event->getArg("street")?>">
								</div>
							</div>
												
							<div class="col-xs-6 col-sm-6">
								<div class="form-group">
									<label for="number"><?=$oT->gL("txtHouseNumber");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="number" name="number" value="<?=$event->getArg("number")?>">
								</div>
								<div class="form-group">
									<label for="zip"><?=$oT->gL("txtZip");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="zip" name="zip" value="<?=$event->getArg("zip")?>">
								</div>
								<div class="form-group">
									<label for="city"><?=$oT->gL("txtCity");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="city" name="city" value="<?=$event->getArg("city")?>">
								</div>
								<div class="form-group">
									<label for="phone1"><?=$oT->gL("txtPhoneNumber");?> <font color="red">*</font></label>
									<input type="text" class="form-control" id="phone1" name="phone1" value="<?=$event->getArg("phone1")?>">
								</div>
								<p><font color="red">*</font> Obligatoriske felt</p>								
							</div>
							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12" style="padding:10px;">							
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12">
							<p style="text-align:center">Ønsker du å støtte din musikkorganisasjon med 20% av kjøpssummen eks. moms og frakt?</p>
							<div class="col-xs-6 col-sm-6">
								<div class="form-group">
									<label for="organization"><?=$oT->gL("txtOrganization");?></label>
									<input type="text" class="form-control" id="organization" name="organization" value="<?=$event->getArg("organization");?>">
								</div>
							</div>
							<div class="col-xs-6 col-sm-6">
								<div class="form-group">
									<label for="organizationEmail"><?=$oT->gL("txtOrganizationEmail");?></label>
									<input type="text" class="form-control" id="organizationEmail" name="organizationEmail" value="<?=$event->getArg("organizationEmail")?>">
								</div>
							</div>
						</div>
					</div>
					
					<?/* LEVERINGSADRESSE ENDS HERE */?>
					
					<div class="row">
						<div class="col-md-12" style="padding:10px;">							
						</div>
					</div>
					
					
					<?/* SHOPPING CART STARTS HERE */?>
					<div class="row">
						<div class="col-md-12">
								<h3><?=$oT->gL("txtOrderedProducts")?></h3>
								            	
								<table cellspacing="0" class="shop_table" width="100%">
									<thead>
										<tr>
											<th class="product-thumbnail">
												<?=$oT->gL("txtProducts")?>
											</th>
											<th class="product-name">
												&nbsp;
											</th>
											<th class="product-price">
												<?=$oT->gL("txtPrice")?>
											</th>
											<th class="product-quantity">
												<?=$oT->gL("txtQuantity")?>
											</th>
											<th class="product-subtotal">
												<?=$oT->gL("txtTotal")?>
											</th>											
										</tr>
									</thead>
									<tbody>
										<?$cartTotal = 0;?>
										<?$totalBasketItems = 0;?>
										<?$totalPoints = 0;?>
										<?$cartWeightTotal = 0;?>
										<?
										foreach($arrProduct as $objProduct) { 
										$quantity = $arrShoppingCartItems[$objProduct->getProductId()];
										$totalBasketItems = $totalBasketItems + $quantity; 
										$total = $objProduct->getPrice() * $quantity;
										$totalPoints = $totalPoints + $objProduct->getPoints() * $quantity;
										$cartTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getPrice();
										$cartWeightTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getWeight();?>
										<input type="hidden" name="arrProductId[]" value="<?=$objProduct->getProductId()?>">
										<input type="hidden" name="arrQuantity[]" value="<?=$quantity?>">
										<tr class="cart_table_item">
											<td class="product-thumbnail">
												<img src="<?=$SN?>upload/micro/<?=$objProduct->getImgDriveName();?>">
											</td>
											<td class="product-name"><center>
												<?=$objProduct->getName()?></center>											
											</td>
											<td class="product-price"><center>
												<span class="amount"><?=$objProduct->getPrice();?> NOK</span></center>
											</td>
											<td class="product-quantity">
												<span class="amount"><?=$quantity?></span></center>											
											</td>
											<td class="product-subtotal"><center>
												<span class="amount"><?=number_format($total, 2, '.', '');?> NOK</span></center>
											</td>											
										</tr>
										<?}?>
										
										
										<tr class="cart_table_item">
											<td colspan="2">
												&nbsp;
											</td>
											<td class="product-price"><center>
												<?=$oT->gL("txtTotal")?></center>
											</td>
											<td class="product-quantity">
												<?=$totalBasketItems;?>
											</td>
											<td class="product-subtotal"><center>
												<span class="amount"><?=number_format($cartTotal,2, '.', '');?></span> NOK</center>
											</td>											
										</tr>
										
									</tbody>
								</table>													
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12" style="padding:10px;">							
						</div>
					</div>
					
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
					  }?>
					
					<div class="row">
						<div class="col-md-12">
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><strong>Velg ønsket betalingsmetode:</strong></td>
								</tr>																		
								<tr>
									<td width="99%">
										<div class="customerType">
											<p style="text-align:left">
		                                    	<span id="customerType1">Privatkunde (betal med kort/paypal)</span>
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
												Post (porto blir lagt til prisen)
											</p>
										</div>
									</td>
								</tr>
							</table>
										
							<table cellpadding="0" cellspacing="0" border="0">
								<tr>
									<td><p><strong><font color="#000000"><?=$oT->gL("txtDeliveryCost")?>: <span id="shipPrice"><?=$shipPrice;?></span> NOK</font></strong></p></td>
								</tr>
								<tr>
									<td><p><strong><font color="#000000"><?=$oT->gL("txtTotal")?>: <span id="finalPrice"><?=number_format($cartTotal + $shipPrice,2, '.', '');?></span> NOK</font></strong></p></td>
								</tr>
							</table>
						</div>
					</div>
				
					<div class="row">
						<div class="col-md-12" style="text-align:center; padding-top:20px;">
							<a href="<?=$SN?>shoppingCart.html" class="btn btn-default width_help" role="button">Handlekurven</a>
							<?if ($arrProduct) {?>
								<a href="javascript:document.f1.submit();" class="btn btn-default width_help" role="button">Gå till kassen</a>
							<?}?>
						</div>					
					</div>
					
				</form>
				<?} else {?>
					<div class="row">
						<div class="col-md-12">	                	
							<form name="f1" method="post" action="" id="shoppingCartForm">
								<table cellspacing="0" class="shop_table" width="100%">
									<thead>
										<tr>
											<th class="product-thumbnail">
												<?=$oT->gL("txtProducts")?>
											</th>
											<th class="product-name">
												&nbsp;
											</th>
											<th class="product-price">
												<?=$oT->gL("txtPrice")?>
											</th>
											<th class="product-quantity">
												<?=$oT->gL("txtQuantity")?>
											</th>
											<th class="product-subtotal">
												<?=$oT->gL("txtTotal")?>
											</th>
											<th class="product-remove">
												<?=$oT->gL("txtRemove")?>
											</th>
										</tr>
									</thead>
									<tbody>
										<td align="center" colspan="6"><br/><?=$oT->gL("txtShoppingCartEmpty")?><br/><br/></td>
									</tbody>
								</table>
							</form>						
						</div>
					</div>					
				<?}?>
			
		</div>
	</div>
</section>
<!-- END SHOPPING_CART -->