<?php

require_once("model/components/session.inc.php");
require_once("model/components/emails.inc.php");

require_once("model/MemberBean.inc.php");
require_once("model/MemberDao.inc.php");

include_once('model/components/paypal.inc.php');
$paypal=new paypal();

// optionally enable logging
$paypal->log=1;
$paypal->logfile='/hsphere/local/home/fvr10/fvr.no/paypal/logfile_member.txt';


//if you are dealing with subscriptions this must be called first
//$paypal->ignore_type=array('subscr_signup');

if($paypal->validate_ipn())
{

    if($paypal->payment_success==1)
    {
        //payment is successfull
        //use the item id to identify for which product the payment was made 
        $OrderId=intval($paypal->posted_data['invoice']);
        $paypal->log_string("Payment was done for item id:");
        $paypal->log_string($OrderId);
        
        // we need to update Member Record in this point and send some emails to recipients.
        $objMemberDao = new MemberDao();
    	$objMemberBean = $objMemberDao->read($OrderId);
    	$objMemberBean->setPaymentStatus(1);
    	$objMemberBean->setMembershipStatus(1);
    	
    	$objMemberDao->update($objMemberBean);
    	
    	// send email to administrator
		$fromEmail = "FVR <fvr@fvr.no>";
		$subject  = "Nytt betalende medlem: ".$OrderId."";
			
		$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		$messageContent .= "Nytt betalende medlem: ".$OrderId.".<br/><br/>";
		$messageContent .= "Navn: ".$objMemberBean->getName()."<br/>";
		$messageContent .= "Adresse: ".$objMemberBean->getAdresse()."<br/>";
		$messageContent .= "Postnummer: ".$objMemberBean->getPostnummer()."<br/>";
		$messageContent .= "Sted: ".$objMemberBean->getSted()."<br/>";
		$messageContent .= "Telefon: ".$objMemberBean->getTelefon()."<br/>";
		$messageContent .= "Email: ".$objMemberBean->getEmail()."<br/>";
		$messageContent .= "Kommentarer: ".$objMemberBean->getKommentar()."<br/>";
		
		$messageContent .= "Ditt valg:";
		$yourOption = $objMemberBean->getYourOption();
		if($yourOption == 1) {
			$messageContent .= "Senior - 250 NOK";
		}
		if($yourOption == 2) {
			$messageContent .= "Senior + familiemedlem(mer)	- 300 NOK";
		}
		if($yourOption == 3) {
			$messageContent .= "Junior (under 18 ar) - 100 NOK";
		}
		if($yourOption == 4) {
			$messageContent .= "Bedrift - 1000 NOK";
		}
		if($yourOption == 5) {
			$messageContent .= "Jeg ønsker å få tilsendt giroblankett.";
		}
			
		$toEmail = "yk@bbse.no";
		$mail = new Rmail();
	    $mail->setFrom($fromEmail); 
	    $mail->setSubject($subject);
		$mail->setHTML($messageContent);
	    $result = $mail->send(array($toEmail));
	    
	    $toEmail = "helgariekeles@me.com";
	    $mail = new Rmail();
	    $mail->setFrom($fromEmail); 
	    $mail->setSubject($subject);
		$mail->setHTML($messageContent);
	    $result = $mail->send(array($toEmail));
	    
	    $toEmail = "tprokop@prothomsoft.com";
	    $mail = new Rmail();
	    $mail->setFrom($fromEmail); 
	    $mail->setSubject($subject);
		$mail->setHTML($messageContent);
	    $result = $mail->send(array($toEmail));
    	
    }
    else
    {
        //payment not successful and/or subcsription cancelled
        $OrderId=intval($paypal->posted_data['invoice']);
        $paypal->log_string("Payment was not successfull or cancelled for item id:");
        $paypal->log_string($OrderId);
    }
}
else
{
	//not valid PIPN  log
	$paypal->log_string("not valid PIPN  log");
}

?> 