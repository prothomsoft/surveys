<?php
require_once("components/session.inc.php");
require_once("components/Rmail.php");
require_once("components/class.phpmailer.php");
require_once("components/db.inc.php");

class CronGateway {

   function __construct(){
   }
	

	function send_remind_after10($email) {
		
	
	echo $email;
	echo "<br/><br/>";
	
	 


	// maila do klienta		
	$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
	$toEmail = $email;
	$subject  = 'Perfumy Close2you.pl - termin ważności kodu darmowej wysyłki upływa za 2 dni';
	$messageContent .= "<p style=\"font-size:18px\">Przypominamy o ważności<br /></p>"; 
	$messageContent .= "<br />Adres email: ".$email."";
	
	$toEmail = 'biuro@close2you.pl';
	//$mail = new Rmail();
	//$mail->setFrom($fromEmail);
	//$mail->setSubject($subject);
    //$mail->setHTML($messageContent);
	//$result = $mail->send(array($toEmail));					
		
	// maila do sklepu
 	$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
	$toEmail = 'sklep@close2you.pl';
	$subject  = "".$email." - dostał przypomnienie";		
	$messageContent .= "<p style=\"font-size:18px\">Przypominamy o ważności<br /></p>"; 
	$messageContent .= "<br />Adres email: ".$email."";		
	
	$toEmail = 'biuro@close2you.pl';
	//$mail = new Rmail();
	//$mail->setFrom($fromEmail);
	//$mail->setSubject($subject);
    //$mail->setHTML($messageContent);
	//$result = $mail->send(array($toEmail));	
		
	}
}
?>
