<?php
require_once("components/session.inc.php");
require_once("components/emails.inc.php");

class model_PaymentListener extends MachII_framework_Listener
{
    function configure() {}
    
    function authorizePayment(&$event) {
    	$tx_token = $event->getArg('tx');
    	    	
    	if($tx_token != "") {
    		// process paypal
    		$req = 'cmd=_notify-synch';
			$auth_token = "2B_RLHZsbtSLMxlLP5bhOEffPPPNYcNyi0obh7nRTYCDYtWJxUdbbGnT3oS";
			$req .= "&tx=$tx_token&at=$auth_token";
			
			// post back to PayPal system to validate
			$header .= "POST /cgi-bin/webscr HTTP/1.0\r\n";
			$header .= "Content-Type: application/x-www-form-urlencoded\r\n";
			$header .= "Content-Length: " . strlen($req) . "\r\n\r\n";
			$fp = fsockopen ('www.paypal.com', 80, $errno, $errstr, 30);
			
			if (!$fp) {
				$newEventArgs = array();
				$this->announceEvent('showOrderFailView', $newEventArgs);
			} else {
				fputs ($fp, $header . $req);
				
				// read the body data 
				$res = '';
				$headerdone = false;
				while (!feof($fp)) {
					$line = fgets ($fp, 1024);
					if (strcmp($line, "\r\n") == 0) {
						// read the header
						$headerdone = true;
					} else if ($headerdone)	{
						// header has been read. now read the contents
						$res .= $line;
					}
				}
	
				// parse the data
				$lines = explode("\n", $res);
				$keyarray = array();
				if (strcmp ($lines[0], "SUCCESS") == 0) 
				{
					for ($i=1; $i<count($lines);$i++)
					{
						list($key,$val) = explode("=", $lines[$i]);
						$keyarray[urldecode($key)] = urldecode($val);
					}
					
					$newEventArgs = array();
					$newEventArgs['authorizePaymentStatus'] = '1';
	        		$newEventArgs['firstName'] = $keyarray['first_name'];
	        		$newEventArgs['lastName'] = $keyarray['last_name'];
	        		$newEventArgs['amount'] = $keyarray['payment_gross'];
	        		if ($newEventArgs['amount'] == "80" OR $newEventArgs['amount'] == "110" OR $newEventArgs['amount'] == "45" OR $newEventArgs['amount'] == "60") {
	        			$this->announceEvent('executeRedirectToConference', $newEventArgs);
	        		} else {
	        			$this->announceEvent('executeConferenceProcessOrder', $newEventArgs);
	        		}
				}
				else if (strcmp ($lines[0], "FAIL") == 0) 
				{
					$newEventArgs = array();
					$this->announceEvent('showOrderFailView', $newEventArgs);
				}
			}
	
			fclose ($fp);
    	} else {
    		$newEventArgs = array();
			$this->announceEvent('showOrderFailView', $newEventArgs);
    	}
    }  	
}
?>