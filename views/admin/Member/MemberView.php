<?
$objMemberBean=$event->getArg("objMember");
?>

<div class="ui-widget" style="margin:-14px 0px 0px 0px;">
	<div class="ui-widget-header ui-corner-top center-header">
		Member - details			
	</div>
	
	<div class="ui-widget-content ui-corner-bottom center-content">
	
	<form id="formMember" name="formMember" action="<?=$SN?>index.php?event=showMemberList" method="post">
		<fieldset style="margin-left:12px;">
			<label for="formMemberEmail">Navn: <?=$objMemberBean->getName();?></label>
			<label for="formMemberFirstName">Adresse: <?=$objMemberBean->getAdresse();?></label>
			<label for="formMemberLastName">Postnummer: <?=$objMemberBean->getPostnummer();?></label>
			<label for="formMemberCity">Sted: <?=$objMemberBean->getSted();?></label>
			<label for="formMemberCode">Telefon: <?=$objMemberBean->getTelefon();?></label>
			<label for="formMemberStreet">E-post: <?=$objMemberBean->getEmail();?></label>
			<label for="formMemberNumber">Kommentar: <?=$objMemberBean->getKommentar();?></label>
			
			<?$YourOption = $objMemberBean->getYourOption();?>
		<label for="formOption">Selected option: 
		<?if($YourOption == 1) {?>
				Senior - 250 NOK
		<?}?>
		<?if($YourOption == 2) {?>
				Senior + familiemedlem(mer) - 300 NOK
		<?}?>
		<?if($YourOption == 3) {?>
				Junior (under 18 ar) - 100 NOK
		<?}?>
		<?if($YourOption == 4) {?>
				Bedrift - 1000 NOK
		<?}?>
		<?if($YourOption == 4) {?>
				I want to pay later
		<?}?>
		</label>
		
		<label for="formOption"><strong>Note: In this point I will add ability to change PaymentStatus and Membership status if this is approved.</strong></label>
		
			
		</fieldset>
	<div class="ui-helper-clearfix spacer">
	</div>
		
	<div class="ui-widget formButtons">
		<input type="submit" value="Back to the list" class="wymupdate">		
	</div>
	</form>
	

	</div>
	
	
		
</div>