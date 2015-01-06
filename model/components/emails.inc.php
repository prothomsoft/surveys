<?php
class Emails
{
	 private $sName;
	 private $sFromEmail;
	 private $sToEmail;
	 private $sSubject;
	 private $sMessage;
		 	 
   function __construct($sName=self::sName, $sFromEmail=self::sFromEmail,$sToEmail=self::sToEmail,$sSubject=self::sSubject,$sMessage=self::sMessage) {
   	  $this->sName = $sName;
      $this->sFromEmail = $sFromEmail;
      $this->sToEmail = $sToEmail;
      $this->sSubject = $sSubject;
      $this->sMessage = $sMessage;
   }
    
   public function sendEmail() {
   	
   	
	$header = "MIME-Versio: 1.0r\n"."Content-type: text/html; charset=UTF-8r\n";
	$header .= "From: " . $this->sFromEmail . "\n";
   		mail($this->sToEmail, $this->sSubject, $this->sMessage, $header);
   }
}
?>