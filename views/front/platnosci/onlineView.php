<?php

require_once("model/components/session.inc.php");
require_once("model/components/emails.inc.php");

require_once("model/OrdersBean.inc.php");
require_once("model/OrdersDao.inc.php");

require_once("model/UserBean.inc.php");
require_once("model/UserDao.inc.php");

$server = 'www.platnosci.pl';
$server_script = '/paygw/UTF/Payment/get';
define(PLATNOSCI_POS_ID, 67129);
define(PLATNOSCI_KEY1, "a04f6e2cc194d5034cf505cfdc70fa90");
define(PLATNOSCI_KEY2, "ee7b6b74bc35b4bc25217d68a4106845");

function get_status($parts){
  if ($parts[1] != PLATNOSCI_POS_ID) return array('code' => false,'message' => 'błędny numer POS');  //--- bledny numer POS
      $sig = md5($parts[1].$parts[2].$parts[3].$parts[5].$parts[4].$parts[6].$parts[7].PLATNOSCI_KEY2);
      if ($parts[8] != $sig) return array('code' => false,'message' => 'błędny podpis');  //--- bledny podpis
      switch ($parts[5]) {
          case 1: return array('code' => $parts[5], 'message' => 'nowa'); break;
          case 2: return array('code' => $parts[5], 'message' => 'anulowana'); break;
          case 3: return array('code' => $parts[5], 'message' => 'odrzucona'); break;
          case 4: return array('code' => $parts[5], 'message' => 'rozpoczęta'); break;
          case 5: return array('code' => $parts[5], 'message' => 'oczekuje na odbiór'); break;
          case 6: return array('code' => $parts[5], 'message' => 'autoryzacja odmowna'); break;
          case 7: return array('code' => $parts[5], 'message' => 'płatność odrzucona'); break;
          case 99: return array('code' => $parts[5], 'message' => 'płatność odebrana - zakończona'); break;
          case 888: return array('code' => $parts[5], 'message' => 'błędny status'); break;
          default: return array('code' => false, 'message' => 'brak statusu'); break;
  }
}


if(!isset($_POST['pos_id']) || !isset($_POST['session_id']) || !isset($_POST['ts']) || !isset($_POST['sig'])) die('ERROR: EMPTY PARAMETERS'); //-- brak wszystkich parametrow

if ($_POST['pos_id'] != PLATNOSCI_POS_ID) die('ERROR: WRONG POS ID');   //--- błędny numer POS

$sig = md5( $_POST['pos_id'] . $_POST['session_id'] . $_POST['ts'] . PLATNOSCI_KEY2);
if ($_POST['sig'] != $sig) die('ERROR: WRONG SIGNATURE');   //--- błędny podpis

$ts = time();
$sig = md5( PLATNOSCI_POS_ID . $_POST['session_id'] . $ts . PLATNOSCI_KEY1);
$parameters = "pos_id=" . PLATNOSCI_POS_ID . "&session_id=" . $_POST['session_id'] . "&ts=" . $ts . "&sig=" . $sig;

$fsocket = false;
$curl = false;
$result = false;

if ( (PHP_VERSION >= 4.3) && ($fp = @fsockopen('ssl://' . $server, 443, $errno, $errstr, 30)) ) {
 $fsocket = true;
} elseif (function_exists('curl_exec')) {
 $curl = true;
}

if ($fsocket == true) {
 $header = 'POST ' . $server_script . ' HTTP/1.0' . "\r\n" .
   'Host: ' . $server . "\r\n" .
   'Content-Type: application/x-www-form-urlencoded' . "\r\n" .
   'Content-Length: ' . strlen($parameters) . "\r\n" .
   'Connection: close' . "\r\n\r\n";
 @fputs($fp, $header . $parameters);
 $platnosci_response = '';
 while (!@feof($fp)) {
  $res = @fgets($fp, 1024);
  $platnosci_response .= $res;
 }
 @fclose($fp);
  
} elseif ($curl == true) {
 $ch = curl_init();
 curl_setopt($ch, CURLOPT_URL, "https://" . $server . $server_script);
 curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
 curl_setopt($ch, CURLOPT_HEADER, 0);
 curl_setopt($ch, CURLOPT_TIMEOUT, 20);
 curl_setopt($ch, CURLOPT_POST, 1);
 curl_setopt($ch, CURLOPT_POSTFIELDS, $parameters);
 curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
 $platnosci_response = curl_exec($ch);
 curl_close($ch);
} else {
 die("ERROR: No connect method ...\n");
}


if (eregi("<trans>.*<pos_id>([0-9]*)</pos_id>.*<session_id>(.*)</session_id>.*<order_id>(.*)</order_id>.*<amount>([0-9]*)</amount>.*<status>([0-9]*)</status>.*<desc>(.*)</desc>.*<ts>([0-9]*)</ts>.*<sig>([a-z0-9]*)</sig>.*</trans>", $platnosci_response, $parts))  $result = get_status($parts);
if ( $result['code'] ) {  //--- rozpoznany status transakcji

    $pos_id = $parts[1];
    $session_id = $parts[2];
    $order_id = $parts[3];
    $amount = $parts[4];  //-- w groszach
    $status = $parts[5];
    $desc = $parts[6];
    $ts = $parts[7];
    $sig = $parts[8];
    
    if ( $result['code'] == '99' ) {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// odebrana, zakończona
    	$status = 99;
    	$objOrdersBean->setAuthorizeStatus($status);
    	
    	
    	// we send this mail only once
    	if ($objOrdersBean->getAuthorizeMail() == 0) {
    		// get userEmail address
			$userId = $objOrdersBean->getUserId();
			$objUserDao = new UserDao();
			$objUserBean = $objUserDao->read($userId);
			
			$status = 1;
			$objOrdersBean->setAuthorizeMail($status);
		
			// send email to customer
			$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
			$toEmail = $objUserBean->getEmail();
			$subject  = "Close2you.pl - Potwierdzenie płatności za zamówienie numer ".$order_id."";
			
				$messageContent = "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
				$messageContent .= "<br /><br /><br />";
				$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
				$messageContent .= "color:#5d5d5d;"; 
				$messageContent .= "font-size:14px\">";	  
				$messageContent .= "<p style=\"font-size:18px\">Potwierdzenie płatności<br/></p>"; 
				$messageContent .= "Zamówienie numer  ".$order_id." zostało zapłacone.<br/><br/>";
				$messageContent .= "Status swojego zamówienia zobaczysz w zakładce <a href=\"http://www.close2you.pl/historia_zamowien.html\">Moje konto -> Historia zamówień</a>.<br/><br/>";					
							
				$messageContent .= "<br/><br/>";
				$messageContent .= "W razie jakichkolwiek pytań proszę odwiedzić Centrum Pomocy Close2you.pl <br />bądź skontaktować się z nami mailowo lub telefonicznie.<br/><br/>";		
				$messageContent .= "<br /><p style=\"font-size:12px\">";		
				$messageContent .= "<hr style=\"border: 1px solid rgb(115, 186, 20);\">";
				$messageContent .= "<strong>Pozdrawiamy,</strong><br />";	
				$messageContent .= "Sklep internetowy Close2you.pl<br />";
				$messageContent .= "ul. Dobrego Pasterza 64<br />";
				$messageContent .= "31-416 Kraków<br />";
				$messageContent .= "czynne pn-pt w godzinach 8 do 16 <br />";	
				$messageContent .= "tel/fax. (12) 418 19 07 <br /><br />";			
				$messageContent .= "Zapraszamy - <a href=\"http://www.close2you.pl\" style=\"color:#C43471\">www.close2you.pl</a> - Perfumy najbliżej Ciebie<br /></p>";	
			
			$mail = new Rmail();
	    	$mail->setFrom($fromEmail); 
	    	$mail->setSubject($subject);
		    $mail->setHTML($messageContent);
	    	$result = $mail->send(array($toEmail));
	    	
	    	// send email to administrator
			$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
			//$toEmail = "tprokop@prothomsoft.com";
			$toEmail = "sklep@close2you.pl";
			$subject  = "Zamówienie numer: ".$order_id."  zapłacone od ".$objUserBean->getNameFirst()." ".$objUserBean->getNameLast().", ".$objUserBean->getEmail()."";
			
			
				$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
				$messageContent .= "color:#5d5d5d;"; 
				$messageContent .= "font-size:14px\">";	  
				$messageContent .= "<p style=\"font-size:18px\">Potwierdzenie płatności<br/></p>";  
				$messageContent .= "Zamówienie numer  ".$order_id." zostało zapłacone.<br/><br/>";

			
			$mail = new Rmail();
	    	$mail->setFrom($fromEmail); 
	    	$mail->setSubject($subject);
		    $mail->setHTML($messageContent);
	    	$result = $mail->send(array($toEmail));
    	}
    	
    	
    	$objOrdersDao->update($objOrdersBean);
    	
	} else if ( $result['code'] == '1' ) {
		
		$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// nowa
    	$status = 1;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);    	
        
    } else if ( $result['code'] == '2' ) {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// anulowana
    	$status = 2;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);    	

	} else if ( $result['code'] == '3' ) {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// odrzucona
    	$status = 3;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);

	} else if ( $result['code'] == '4' ) {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// rozpoczęta
    	$status = 4;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);
    	
	} else if ( $result['code'] == '5' ) {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// oczekuje na odbiór
    	$status = 5;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);
    	
	} else if ( $result['code'] == '7' ) {
		
		$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// odrzucona
    	$status = 7;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);
    	
    } else {
    	
    	$objOrdersDao = new OrdersDao();
    	$objOrdersBean = $objOrdersDao->read($order_id);
    	$date = date('Y-m-d');
    	$objOrdersBean->setAuthorizeDate($date);
    	// other
    	$status = 0;
    	$objOrdersBean->setAuthorizeStatus($status);
    	$objOrdersDao->update($objOrdersBean);
    	    	
    } 
    
    echo "OK";
    exit;   
  
} else {
    echo "ERROR: Blad danych ....\n";
    echo "code=" . $result['code'] . " message=" . $result['message'] . "\n";
    echo $platnosci_response;    
}

?> 