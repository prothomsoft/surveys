<?$objAppSession = new AppSession();
	$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
	$arrProduct = $event->getArg('arrProduct');
	$SN = $objAppSession->getSession('SN');
	$sLang = $objAppSession->getSession('sLang');
	require_once("model/components/translator.inc.php");
	$oT = new Translator('template3',$sLang);
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
				<form name="f1" method="post" action="" id="shoppingCartForm">
					<div class="row">
						<div class="col-md-12">	                	
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
										<tr class="cart_table_item">
											<td class="product-thumbnail">
												<a href="<?=$SN?>product/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><img src="<?=$SN?>upload/micro/<?=$objProduct->getImgDriveName();?>"></a>
											</td>
											<td class="product-name"><center>
												<a href="<?=$SN?>product/<?=$objProduct->getSeoName()?>/<?=$objProduct->getProductId()?>.html"><?=$objProduct->getName()?></a></center>											
											</td>
											<td class="product-price"><center>
												<span class="amount"><?=$objProduct->getPrice();?> NOK</span></center>
											</td>
											<td class="product-quantity">
												<input class="quantity" style="width:30px" type="text" size="3" name="arrQuantity[]" value="<?=$quantity?>" onKeyPress="return disableEnterKey(event)">											
											</td>
											<td class="product-subtotal"><center>
												<span class="amount"><?=number_format($total, 2, '.', '');?> NOK</span></center>
											</td>
											<td class="product-remove">
												<a href="javascript:submitToUrl('<?=$SN;?>executeRemoveShoppingCartAction/<?=$objProduct->getProductId();?>.html');">
													<i class="fa fa-times-circle"></i>
												</a>
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
											<td class="product-remove">
												&nbsp;
											</td>
										</tr>
										
									</tbody>
								</table>													
						</div>
					</div>
					
					<div class="row">
						<div class="col-md-12" style="text-align:right; padding:30px 15px 30px 0px;">
							<div><a href="javascript:submitToUrl('<?=$SN;?>executeUpdateShoppingCartAction<?=$urlExtension;?>.html');" class="btn btn-default width_help" role="button">Oppdater handlekurv</a></div>
						</div>
					</div>
					
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
		                                    	<input type="radio" name="customerType" id="customerType" value="Private" style="width:20px" checked="checked" />
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
												<input type="radio" name="deliveryType" id="deliveryType" value="Post" style="width:20px" checked="checked" />
												<span id="deliveryType1">Post (porto blir lagt til prisen)</span>
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
							<a href="<?=$SN?>musikkgaver.html" class="btn btn-default width_help" role="button">Fortsett å handle</a>
							<?if ($arrProduct) {?>
								<a href="javascript:submitToUrl('<?=$SN?>orderAddress.html');" class="btn btn-default width_help" role="button">Gå till kassen</a>
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