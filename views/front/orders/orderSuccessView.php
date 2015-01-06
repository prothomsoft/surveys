<?	$objAppSession = new AppSession();
	$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
	$arrProduct = $event->getArg('arrProduct');
	$SN = $objAppSession->getSession('SN');
?>

<?
$authorizePaymentStatus = $event->getArg('authorizePaymentStatus');
$firstName = $event->getArg('firstName');
$lastName = $event->getArg('lastName');
$amount = $event->getArg('amount');
?>
 
 
 <div class="cms subpage_head">
	<div>
		<h3><font color="#666">Takk!</font></h3>
	</div>
</div>
<div class="ui-helper-clearfix spacer12"></div> <!-- end .ui-helper-clearfix spacer -->

<div class="ui-widget-content ui-corner-bottom center-content">
	<p><strong>Din ordre er mottatt.</strong> </p>
	<p>Odrebekreftelsen er sendt til din epostadresse.</p>
	<p><a href="<?=$SN?>musikkpedagogikk.html">Klikk her</a> for å gå tilbake til startsiden.</span>
</div>

<div class="ui-helper-clearfix spacer">
</div> <!-- end .ui-helper-clearfix spacer -->