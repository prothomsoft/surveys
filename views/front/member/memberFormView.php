<?
require_once("model/components/session.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
?>

<div class="site-center-content cms">

		<?if ($event->getArg('message') != "") {?>
		<div class="ui-state-error ui-corner-all" style="padding: 8px;">
			<p style="color:#FFF"><span class="ui-icon ui-icon-alert" style="float: left; margin-right: .3em;"></span> 
				
				<strong>Warning:</strong>
				<?if($event->getArg("message") != "") {
					echo $event->getArg("message");
				}?>
		</div>
		<div class="ui-helper-clearfix spacer"></div>
		<?}?>
		
		<form name="f4" action="<?=$SN?>executeMembershipAction.html" method="post">
		
		<div class="cms subpage_head">
			<div>
				<h3 class="cms">Medlemskap</h3>
			</div>
		</div>
		
		<div class="list-box cms">
		
			<p>Meld deg inn via skjemaet nedenfor. Du kan velge om du ønsker å betale direkte på nettet, eller få tilsendt giroblankett og brosjyre i posten.</p>
			<p>Ved adresseendring, spørsmål eller andre meldinger kan du benytte kontaktlinken i menyen. Medlemskap inkluderer 4 hefter av tidsskriftet Våre Rovdyr.</p>
			<p>Gavebeløp (over kontingentbeløpet) mellom 500 og 12.000 kroner er fradragsberettiget.</p>
			
			<p><strong>Hvis du ønsker familiemedlemskap, husk å oppgi alle familiemedlemmene som skal inkluderes i kommentarfeltet.</strong></p>
		
			<fieldset>
				<label for="formNewsletterName">Navn: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="Name" value="<?=$event->getArg('Name');?>" id="formNewsletterName" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Name") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset>
				<label for="formNewsletterAdresse">Adresse: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="Adresse" value="<?=$event->getArg('Adresse');?>" id="formNewsletterAdresse" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Adresse") echo "ui-state-error"?>" />		
			</fieldset>
			  
			<fieldset>
				<label for="formNewsletterPostnummer">Postnummer: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="Postnummer" value="<?=$event->getArg('Postnummer');?>" id="formNewsletterPostnummer" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Postnummer") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset>
				<label for="formNewsletterSted">Sted: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="Sted" value="<?=$event->getArg('Sted');?>" id="formNewsletterSted" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Sted") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset>
				<label for="formNewsletterTelefon">Telefon:</label>
				<input style="width:300px" type="text" name="Telefon" value="<?=$event->getArg('Telefon');?>" id="formTelefonTelefon" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Telefon") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset>
				<label for="formEmailEmail">E-post: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="Email" value="<?=$event->getArg('Email');?>" id="formEmailEmail" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "Email") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset>
				<label for="formEmailEmailRepeat">Gjenta E-post: <font color="red">*</font></label>
				<input style="width:300px" type="text" name="EmailRepeat" value="<?=$event->getArg('EmailRepeat');?>" id="formEmailEmailRepeat" class="text ui-widget-content ui-corner-all  <?if ($event->getArg("missingField") == "EmailRepeat") echo "ui-state-error"?>" />		
			</fieldset>
			
			<fieldset style="width:300px;">
			<label for="formKommentar">Kommentarer:</label>
				<textarea name="Kommentar" id="formKommentar" cols="36" rows="3" class="text ui-widget-Kommentar ui-corner-all  <?if ($event->getArg("missingField") == "CompanyAddress") echo "ui-state-error"?>><?=$event->getArg('Kommentar');?>"></textarea><br/><br/>
			</fieldset>
			
			<fieldset>
				<label for="formEmailEmail">Ditt valg: <font color="red">*</font></label>
				<input style="width:20px;" type="radio" name="YourOption" value="1" checked /> Senior - 250 NOK<br/>
				<input style="width:20px;" type="radio" name="YourOption" value="2" /> Senior + familiemedlem(mer)	- 300 NOK <br/>
				<input style="width:20px;" type="radio" name="YourOption" value="3" /> Junior (under 18 år) - 100 NOK <br/>
				<input style="width:20px;" type="radio" name="YourOption" value="4" /> Bedrift - 1000 NOK <br/>
				<input style="width:20px;" type="radio" name="YourOption" value="5" /> Jeg ønsker å få tilsendt giroblankett<br/>
			</fieldset>
						
			</form>
		</div>
		
		<div class="center-content">
			<p style="padding-left:10px"><font color="red">*</font> Obligatorisk</p>
		</div>
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
		
		
		
		<p><strong>Innmeldingsfunksjonen er for tiden nede for teknisk vedlikehold. <br/>For innmelding, send en epost med dine opplysninger til <a href="mailto:fvr@fvr.no">fvr@fvr.no</a></strong></p>
		<?/*
		<div class="ui-widget formButtons" style="text-align:left; padding-left:20px;">
			<span class="siteButton"><a href="javascript:document.f4.submit();">Send</a></span>
			<span class="siteButton"><a href="<?=$SN;?>ekopoint_start.html">Avbryt</a></span>
		</div>
		*/?>
		
		
		<div class="ui-helper-clearfix spacer">
		</div> <!-- end .ui-helper-clearfix spacer -->
		
		<div class="list-box cms">
			<p>Du kan også velge å melde deg inn ved å innbetale kontingenten på grunnlag av opplysningene nedenfor.</p>

			<p>Foreningen Våre Rovdyr<br/>
			Postboks 195<br/>
			2151 Årnes<br/>
			Konto 2800.11.12149</p>
			
			<p>Innmelding i november/desember: Betaling av medlemskontingent i november og desember gjelder som kontingent året etter hvis du ikke angir noe annet på innbetalingen. Du mottar da desembernummeret av Våre Rovdyr som bonus.</p>
		</div>
			
		
</div>