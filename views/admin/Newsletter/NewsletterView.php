<?
$objNewsletterBean=$event->getArg("objNewsletter");
?>

<div class="ui-widget" style="margin:-14px 0px 0px 0px;">
	<div class="ui-widget-header ui-corner-top center-header">
		Rezerwacja - Szczegóły			
	</div>
	
	<div class="ui-widget-content ui-corner-bottom center-content">
	
	<form id="formNewsletter" name="formNewsletter" action="<?=$SN?>index.php?event=showNewsletterList" method="post">
		<fieldset style="margin-left:12px;">
			<label for="formNewsletterEmail">Data przyjazdu: <?=$objNewsletterBean->getStartDate();?></label>
			<label for="formNewsletterEmail">Data odjazdu: <?=$objNewsletterBean->getEndDate();?></label>
			<label for="formNewsletterEmail">Adres email: <?=$objNewsletterBean->getEmail();?></label>
			<label for="formNewsletterFirstName">Imię: <?=$objNewsletterBean->getFirstName();?></label>
			<label for="formNewsletterLastName">Nazwisko: <?=$objNewsletterBean->getLastName();?></label>
			<label for="formNewsletterCity">Miejscowość: <?=$objNewsletterBean->getCity();?></label>
			<label for="formNewsletterCode">Kod pocztowy: <?=$objNewsletterBean->getCode();?></label>
			<label for="formNewsletterStreet">Ulica: <?=$objNewsletterBean->getStreet();?></label>
			<label for="formNewsletterNumber">Numer domu/mieszkania: <?=$objNewsletterBean->getNumber();?></label>
			<label for="formNewsletterPhone">Telefon: <?=$objNewsletterBean->getPhone();?></label>
			<label for="formNewsletterCompanyName">Hotel (28-29 lipca) – tak, nie*: <?=$objNewsletterBean->getCompanyName();?></label>
			
		</fieldset>
	
		
	<div class="ui-helper-clearfix spacer">
	</div>
		
	<div class="ui-widget formButtons">
		<input type="submit" value="Powrót do listy" class="wymupdate">		
	</div>
	</form>
	

	</div>
	
	
		
</div>