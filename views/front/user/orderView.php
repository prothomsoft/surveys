<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
?>

<div class="ui-widget-header ui-corner-top center-header">
	Historia Zamówień - Szczegóły zamówienia
</div>

<?$objUser = $event->getArg("objUser");?>

<div class="ui-widget-content ui-corner-bottom center-content">
	<form id="formAddEditNewOrder" action="index.php?event=<?=$event->getArg("submitEvent").$urlExtension;?>" method="post">
		<input type="hidden" name="orderId" value="<?=$event->getArg("orderId")?>">
		<input type="hidden" name="userId" value="<?=$objUser->getUserId();?>">
		
		<fieldset>
			<label for="CreateDate"><strong>Data złożenia zamówienia: </strong>
				<?=substr($event->getArg("CreateDate"), 0, 10)?>
			</label>
		</fieldset>
</div>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
		<fieldset>
			<label for="Address"><strong>Adres dostawy: </strong></label>
		</fieldset>
		
		<div style="float:left; width:48%">
			<fieldset>
				<label for="nameFirst">Imię: <strong><?=$event->getArg("NameFirst");?></strong></label>
				<label for="nameLast">Nazwisko: <strong><?=$event->getArg("NameLast");?></strong></label>
				<label for="street">Ulica: <strong><?=$event->getArg("Street");?></strong></label>
				<label for="number">Nr domu/mieszkania: <strong><?=$event->getArg("Number");?></strong></label>
			</fieldset>
		</div>
		
		<div style="float:right;  width:48%">
			<fieldset>
				<label for="zip">Kod pocztowy: <strong><?=$event->getArg("Zip");?></strong></label>
				<label for="city">Miejscowość: <strong><?=$event->getArg("City");?></strong></label>
				<label for="phone1">Telefon:  <strong><?=$event->getArg("Phone1");?></strong></label>
			</fieldset>
		</div>
		<div class="ui-helper-clearfix spacer"></div>
		
</div>
<?/*if ($objUser->getCompanyName() != "" || $objUser->getNipPL != "") {?>
	<div class="ui-helper-clearfix spacer"></div>
			
	<div class="ui-widget-content ui-corner-bottom center-content" style="padding-right:20px;">
			<div style="float:left; width:48%">
				<fieldset>
					<label for="companyName">Nazwa firmy: <strong><?=$objUser->getCompanyName();?></strong></label>
				</fieldset>
			</div>
			
			<div style="float:right;  width:48%">
				<fieldset>
					<label for="nipPL">NIP: <strong><?=$objUser->getNipPL();?></strong></label>				
				</fieldset>
			</div>
			
			<div class="ui-helper-clearfix spacer"></div>
	</div>
<?}*/?>

<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
				
		<fieldset>
			<label for="Products"><strong>Zamówione produkty i sposób dostawy: </strong></label>
		</fieldset>
		
		<?$arrOrdersProduct = $event->getArg("arrOrdersProduct");?>
		<?if ($arrOrdersProduct) {?>
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="0">
				
					<?$cartTotal = 0;?>
					<?$totalBasketItems = 0;?>
					<?$totalPoints = 0;?>
					<?foreach($event->getArg('arrOrdersProduct') as $objOrdersProduct) { 
						$quantity = $objOrdersProduct->getQuantity();
						$totalBasketItems = $totalBasketItems + $quantity; 
						$total = $objOrdersProduct->getPurchasePrice() * $quantity;
						$totalPoints = $totalPoints + $objOrdersProduct->getPoints() * $quantity;
						$total = number_format($total, 2);
						$cartTotal +=  $objOrdersProduct->getQuantity() * $objOrdersProduct->getPurchasePrice();
						$cartTotal = number_format($cartTotal, 2);?>
						<?if($objOrdersProduct->getProductCategoryLevelTwoName() != "") {
								$categoryName = $objOrdersProduct->getProductCategoryLevelTwoName();
							} else {
								$categoryName = $objOrdersProduct->getProductCategoryLevelOneName();
							}?>
						<tr>
							<td width="100">
								<img src="../upload/micro/<?=$objOrdersProduct->getImgDriveName();?>">
							</td>
							<td width="300">
								<p style="text-align:left">
									<a class="anchor_link_product" href="#"><?=$objOrdersProduct->getName()?></a>
								</p>
							</td>
							
							<td width="100">
								<strong><font color="#C8447C"><?=$objOrdersProduct->getPurchasePrice();?> PLN</font></strong>
							</td>
							<td width="25"><?=$objOrdersProduct->getQuantity();?></td>
							<td width="80"><?=$total?> PLN</td>
						</tr>
					<?}?>
						<tr>
							<td colspan="2">&nbsp;</td>
							<td><p style="text-align:right"><strong>Razem:</strong></p></td>
							<td><strong><?=$totalBasketItems;?></strong></td>
							<td><strong><?=number_format($cartTotal,2);?> PLN</strong></td>
						</tr>
				</table>
			</fieldset>
		<?}?>
		
		<fieldset>
		
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="99%">
							<p style="text-align:left">
								<strong>Wybrana forma dostawy: </strong> <?=$event->getArg("ShipName");?>
							</p>
						</td>
					</tr>
			</table>
			
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="99%">
							<p style="text-align:left">
								<strong>Wybrana forma płatności: </strong> <?=$event->getArg("PaymentName");?>
							</p>
						</td>
					</tr>
			</table>
			
			<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="160">&nbsp;</td>
						<td width="300">&nbsp;</td>
						<td width="100"><p style="text-align:right"><strong>Koszty dostawy:</strong></p></td>
						<td width="25">&nbsp;</td>
						<td width="80"><strong><?=$event->getArg("ShipPrice");?> PLN</strong></td>
					</tr>
				</table>
				
				<table cellpadding="0" cellspacing="0" border="0">
					<tr>
						<td width="160">&nbsp;</td>
						<td width="300">&nbsp;</td>
						<td width="100"><p style="text-align:right"><strong><font color="#C8447C">Do zapłaty:</font></strong></p></td>
						<td width="25">&nbsp;</td>
						<td width="80"><strong><font color="#C8447C"> <?=number_format($cartTotal + $event->getArg("ShipPrice"),2);?> PLN</font></strong></td>
					</tr>
				</table>
		</fieldset>
	</div>
				
	<?if($totalPoints != 0) {?>
		<div class="ui-helper-clearfix spacer"></div>
		<div class="ui-widget-content ui-corner-all center-content">
			<fieldset>
				<table cellpadding="0" cellspacing="0" border="0">
					
					<tr>
						<?
						$text = "punktów Close2you";
						if ($totalPoints == 1) {
							$text = "punkt Close2you";
						}if ($totalPoints > 1 && $totalPoints < 5) {
							$text = "punkty Close2you";
						}?>
							
						<td colspan="2"><p style="text-align:left;"><strong>Po zrealizowaniu tego zamówienia otrzymasz: <?=$totalPoints;?> <?=$text;?></strong></p></td>
					</tr>
				</table>
			</fieldset>
		</div>
		<?}?>		
			
		
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">

		<fieldset>
			<label for="Products"><strong>Komentarz do zamówienia: </strong>
			<?if($event->getArg("Comments") != "") {echo $event->getArg("Comments");} else {echo "brak";}?>
			</label>
		</fieldset>

</div>
<div class="ui-helper-clearfix spacer"></div>
<div class="ui-widget-content ui-corner-all center-content">
						
		<fieldset>
			<?if($event->getArg("AuthorizeStatus") == 0) {?>
				<label for="AuthorizeStatus"><strong>Zapłacono: </strong>Nie
			<?}?>
			
			<?if($event->getArg("AuthorizeStatus") == 99) {?>
				<label for="AuthorizeStatus"><strong>Zapłacono: </strong>Tak
			<?}?>
			</label>
		</fieldset>
			
		<fieldset>
			<?if($event->getArg("IsSend") == 0) {?>
				<label for="IsSend"><strong>Wysłano: </strong>Nie
			<?}?>
			
			<?if($event->getArg("IsSend") == 1) {?>
				<label for="IsSend"><strong>Wysłano: </strong>Tak
			<?}?>
			</label>
		</fieldset>
		
		<?if($totalPoints != 0) {?>
			
				<?if($event->getArg("IsPointed") == 1) {?>
					<fieldset>
						<label for="IsPointed"><strong>Punkty Close2you: </strong>zostały przyznane
						</label>
					</fieldset>
				<?}?>
		<?}?>

</div>
<div class="ui-helper-clearfix spacer"></div>

<div class="ui-widget" style="text-align:center;">
	<span class="shoppingCartButton" style="line-height: 1em; letter-spacing: 0em;">
		<a href="<?=$SN?>historia_zamowien.html">Historia zamówień</a>
	</span>
</div>
	</form>