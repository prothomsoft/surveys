<?php

require_once("model/components/session.inc.php");
require_once("model/components/emails.inc.php");

require_once("model/OrdersBean.inc.php");
require_once("model/OrdersDao.inc.php");

include_once('model/components/paypal.inc.php');
$paypal=new paypal();

// optionally enable logging
$paypal->log=1;
$paypal->logfile='/hsphere/local/home/fvr10/fvr.no/paypal/logfile_store.txt';


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
        $objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($OrderId);
    	
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	$status = 1;
    	$objOrdersBean->setAuthorizeStatus($status);
    	
    	$objOrdersDao->update($objOrdersBean);
    	
    	// send email to administrator
		$fromEmail = "FVR <fvr@fvr.no>";
	    $subject  = "Salg av t-skjorte. Nytt betalende medlem: ".$OrderId.".";
			
		$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		$messageContent .= "<p style=\"font-size:18px\">Salg av t-skjorte - betalingsbekreftelse<br/></p>";  
		$messageContent .= "Salg av FVR t-skjorte. Nytt betalende medlem: ".$OrderId.".<br/><br/>";
		$messageContent .= "Navn: ".$objOrdersBean->getNameFirst()." ".$objOrdersBean->getNameLast()."<br/>";
		$messageContent .= "Sum: ".$objOrdersBean->getAmount()."<br/>";
			
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