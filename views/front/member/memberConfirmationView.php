<?
require_once("model/components/session.inc.php");
require_once("model/components/emails.inc.php");
$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');
$sLang = $objAppSession->getSession('sLang');
require_once("model/components/translator.inc.php");
$oT = new Translator('template3',$sLang);

?>

<div class="site-center-content cms">
	<div class="cms subpage_head">
		<div>
			<h3 class="cms">Medlemskap</h3>
		</div>
	</div>
	
	<div class="list-box cms">
		
		<p>Navn: <?=$event->getArg("Name");?><br/>
		Adresse: <?=$event->getArg("Adresse");?><br/>
		Postnummer: <?=$event->getArg("Postnummer");?><br/>
		Sted: <?=$event->getArg("Sted");?><br/>
		Telefon: <?=$event->getArg("Telefon");?><br/>
		E-post: <?=$event->getArg("Email");?><br/>
		Kommentarer: <?=$event->getArg("Kommentar");?></p>

		<?$paypalData = "";?>
		
		<?$YourOption = $event->getArg("YourOption");?>
		<p>Ditt valg: 
		<?if($YourOption == 1) {?>
			<?$paypalData .= "<input type=\"hidden\" name=\"item_name_1\" value=\"Senior - 250 NOK\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"amount_1\" value=\"250\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"quantity_1\" value=\"1\">\n";?>
				Senior - 250 NOK
		<?}?>
		<?if($YourOption == 2) {?>
			<?$paypalData .= "<input type=\"hidden\" name=\"item_name_1\" value=\"Senior + familiemedlem(mer) - 300 NOK\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"amount_1\" value=\"300\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"quantity_1\" value=\"1\">\n";?>
				Senior + familiemedlem(mer) - 300 NOK
		<?}?>
		<?if($YourOption == 3) {?>
			<?$paypalData .= "<input type=\"hidden\" name=\"item_name_1\" value=\"Junior (under 18 år) - 100 NOK\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"amount_1\" value=\"100\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"quantity_1\" value=\"1\">\n";?>
				Junior (under 18 ar) - 100 NOK
		<?}?>
		<?if($YourOption == 4) {?>
			<?$paypalData .= "<input type=\"hidden\" name=\"item_name_1\" value=\"Bedrift - 1000 NOK\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"amount_1\" value=\"1000\">\n";						
				$paypalData .= "<input type=\"hidden\" name=\"quantity_1\" value=\"1\">\n";?>
				Bedrift - 1000 NOK
		<?}?>
		<?if($YourOption == 5) {?>
				Du vil motta giroblankett i posten
				
				<?// send email to administrator to tell that invoice was requested
					$fromEmail = "FVR <fvr@fvr.no>";
					$toEmail = "fvr@fvr.no";
					$subject  = "Ny medlemshenvendelse: ønsker tilsendt giro i posten";
					
					$MemberId = $event->getArg("MemberId");
					$objMemberDao = new MemberDao();
    				$objMemberBean = $objMemberDao->read($MemberId);
						
					$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
					$messageContent .= "color:#5d5d5d;"; 
					$messageContent .= "font-size:14px\">";	  
					$messageContent .= "<p style=\"font-size:18px\">Ny medlemshenvendelse: ønsker tilsendt giro i posten<br/></p>";  
					$messageContent .= "Navn: ".$objMemberBean->getName()."<br/>";
					$messageContent .= "Adresse: ".$objMemberBean->getAdresse()."<br/>";
					$messageContent .= "Postnummer: ".$objMemberBean->getPostnummer()."<br/>";
					$messageContent .= "Sted: ".$objMemberBean->getSted()."<br/>";
					$messageContent .= "Telefon: ".$objMemberBean->getTelefon()."<br/>";
					$messageContent .= "Email: ".$objMemberBean->getEmail()."<br/>";
					$messageContent .= "Kommentarer: ".$objMemberBean->getKommentar()."<br/>";
					$messageContent .= "Ditt valg:";
					$messageContent .= "Jeg ønsker å få tilsendt giroblankett.";
						
					$mail = new Rmail();
				    $mail->setFrom($fromEmail); 
				    $mail->setSubject($subject);
					$mail->setHTML($messageContent);
				    $result = $mail->send(array($toEmail));?>
				
		<?}?>
		</p>
		
		
		<?if($YourOption == 5) {?>
			<div class="ui-helper-clearfix spacer">
			</div> <!-- end .ui-helper-clearfix spacer -->
			<div class="ui-widget formButtons">
				<span class="siteButton"><a href="<?=$SN;?>fvr.html"><?=$oT->gL("txtStart")?></a></span>
			</div>
		<?} else {?>
			<?$MemberId= $event->getArg("MemberId");?>
			<form style="display: inline;" name="f2" method="post" action="https://www.paypal.com/cgi-bin/webscr">		
				<input type="hidden" name="cmd" value="_cart">
				<input type="hidden" name="lc" value="no_NO">
				<input type="hidden" name="upload" value="1">
				<input type="hidden" name="no_note" value="1" />
				<input type="hidden" name="no_shipping" value="1" />
				<input type="hidden" name="charset" value="utf-8">
				<input type="hidden" name="business" value="yk@bbse.no" />
				<input type="hidden" name="invoice" value="<?=$MemberId?>">
				<input type="hidden" name="notify_url" value="<?=$SN?>payment_online_member.html" />
				<input type="hidden" name="return" value="<?=$SN?>payment_ok.html" />
				<input type="hidden" name="cancel_return" value="<?=$SN?>payment_error.html" />		
				<input type="hidden" name="currency_code" value="NOK">				
				<? echo $paypalData; ?>	
			</form>	
			<div style="text-align:center">
				<span class="shoppingCartButton"><a href="javascript:document.f2.submit();"><img src="<?=$SN?>images/paypal_payment.png" /></a></span>
			</div>
		<?}?>
		</div>
	
	
	</div>
</div>
<div class="ui-helper-clearfix spacer"></div>