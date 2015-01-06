<?php
require_once("components/session.inc.php");
require_once("components/emails.inc.php");
require_once("components/Rmail.php");
require_once("components/translator.inc.php");

require_once("OrdersBean.inc.php");
require_once("OrdersDao.inc.php");
require_once("OrdersGateway.inc.php");

require_once("OrdersProductBean.inc.php");
require_once("OrdersProductDao.inc.php");
require_once("OrdersProductGateway.inc.php");

class model_OrdersListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('OrderId', 'CreateDate', 'CustomerInformation', 'Amount', 'AuthorizeStatus', 'IsSend', 'IsPointed');
		$sIndexColumn = "OrderId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// ordering
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sOrder = "";
		if (isset($iSortCol_0)) {
			$sOrder = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sOrder .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sOrder = substr_replace($sOrder, "", -2);
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Orders
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = $DB->query($sQuery);
		
		// data set length after filtering
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $DB->query($sQuery);
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
				
		// total data set length
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   Orders
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];

		$sEcho = $event->getArg("sEcho");
		$responseJSON = '{';
		$responseJSON .= '"sEcho": '.intval($sEcho).', ';
		$responseJSON .= '"iTotalRecords": '.$iTotal.', ';
		$responseJSON .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$responseJSON .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$responseJSON .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				$OrderId = $aRow[0];
				$CreateDate = $aRow[1];
				$CustomerInformation = $aRow[2];
				$Amount = $aRow[3];
				$AuthorizeStatus = $aRow[4];
				$IsSend = $aRow[5];
				$IsPointed = $aRow[6];
				
				if ($aColumns[$i] == "Amount"){
					$responseJSON .= '"$'.$aRow[ $aColumns[$i] ].' ",';
				} else if ($aColumns[$i] == "AuthorizeStatus"){
					if($aRow[$aColumns[$i]] == 99) {
						$responseJSON .= '"Tak",';
					} else {
						$responseJSON .= '"Nie",';
					}
				} else if ($aColumns[$i] == "IsSend"){
					if($aRow[$aColumns[$i]] == 1) {
						$responseJSON .= '"Tak",';
					} else {
						$responseJSON .= '"Nie",';
					}
				} else if ($aColumns[$i] == "IsPointed"){
					
					// see if the order has some points
					$objOrdersProductGateway = new OrdersProductGateway();
					$arrOrdersProduct = $objOrdersProductGateway->findProductsbyOrderId($OrderId);
					
					$totalPoints = 0;
					if($arrOrdersProduct) {
		      			foreach($arrOrdersProduct as $objProduct) {
		      				$totalPoints = $totalPoints + $objProduct->getPoints() * $objProduct->getQuantity();
		      			}
					} else {
						$totalPoints = 0;
					}
	      			
	      			if($totalPoints == 0) {
	      				$responseJSON .= '"-",';
	      			} else {
	      				if($aRow[$aColumns[$i]] == 1) {
							$responseJSON .= '"Tak ('.$totalPoints.')",';
						} else {
							$responseJSON .= '"Nie ('.$totalPoints.')",';
						}
	      			}
	      			
	      			
				} else if ($aColumns[$i] == "CreateDate"){
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",';						
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showEditOrderForm&orderId='.$aRow[0].'\">Edit</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getUserTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$objUser = $objAppSession->getSession("User");
		$userId = $objUser->getUserId();
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('OrderId', 'CreateDate', 'NameFirst', 'NameLast',  'Amount', 'AuthorizeStatus', 'IsSend');
		$sIndexColumn = "OrderId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// ordering
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sOrder = "";
		if (isset($iSortCol_0)) {
			$sOrder = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sOrder .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sOrder = substr_replace($sOrder, "", -2);
		}
		
		$sWhere = "WHERE UserId = '".$userId."' ";
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Orders
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = $DB->query($sQuery);
		
		// data set length after filtering
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $DB->query($sQuery);
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
				
		// total data set length
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   Orders
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];

		$sEcho = $event->getArg("sEcho");
		$responseJSON = '{';
		$responseJSON .= '"sEcho": '.intval($sEcho).', ';
		$responseJSON .= '"iTotalRecords": '.$iTotal.', ';
		$responseJSON .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$responseJSON .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$responseJSON .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				$OrderId = $aRow[0];
				$CreateDate = $aRow[1];
				$NameFirst = $aRow[2];
				$NameLast = $aRow[3];
				$Amount = $aRow[4];
				$AuthorizeStatus = $aRow[5];
				$IsSend = $aRow[6];
				
				if ($aColumns[$i] == "Amount"){
					$responseJSON .= '"$'.$aRow[ $aColumns[$i] ].' ",';
				} else if ($aColumns[$i] == "NameFirst"){
						$responseJSON .= '"'.$NameFirst.' '.$NameLast.'",';
				} else if ($aColumns[$i] == "AuthorizeStatus"){
					if($aRow[$aColumns[$i]] == 99) {
						$responseJSON .= '"Tak",';
					} else {
						$responseJSON .= '"Nie",';
					}
				} else if ($aColumns[$i] == "IsSend"){
					if($aRow[$aColumns[$i]] == 1) {
						$responseJSON .= '"Tak",';
					} else {
						$responseJSON .= '"Nie",';
					}
				} else if ($aColumns[$i] == "CreateDate"){
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",';
					
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"'.$SN.'zamowienie/'.$aRow[0].'.html\">Szczegóły</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
    function createOrder(&$event) {
    	
    	if($event->getArg("OrderId") == "") {
	    		
	    	// this part is usefull for testing only		
			$objAppSession = new AppSession();
			if ($objAppSession->getSession("User") != "") {
				$firstName = $objAppSession->getSession("User")->getNameFirst();
				$lastName = $objAppSession->getSession("User")->getNameLast();
				$emailName = $objAppSession->getSession("User")->getEmail();
				$street = $objAppSession->getSession("User")->getStreet();
				$number = $objAppSession->getSession("User")->getNumber();
				$zip = $objAppSession->getSession("User")->getZip();
				$city = $objAppSession->getSession("User")->getCity();
				$phone1 = $objAppSession->getSession("User")->getPhone1();				
			}
			
			// jeżeli imię i nazwisko było zmienione lub wpisane tylko w dostawie bierzemy te dane
			if($event->getArg("nameFirst") != "") {
				$firstName = $event->getArg("nameFirst");	
			}
			if($event->getArg("nameLast") != "") {
				$lastName = $event->getArg("nameLast");	
			}
			if($event->getArg("street") != "") {
				$street = $event->getArg("street");	
			}
			if($event->getArg("number") != "") {
				$number = $event->getArg("number");	
			}
			if($event->getArg("zip") != "") {
				$zip = $event->getArg("zip");	
			}
			if($event->getArg("city") != "") {
				$city = $event->getArg("city");	
			}
			if($event->getArg("phone1") != "") {
				$phone1 = $event->getArg("phone1");	
			}
			if($event->getArg("country") != "") {
				$country = $event->getArg("country");	
			}
			if($event->getArg("email") != "") {
				$email = $event->getArg("email");	
			}
			
			
			$authorizePaymentStatus = 0;
			$authorizeMail = 0;
			
			$arrShoppingCartItems = $objAppSession->getSession("ShoppingCartItems");
					
			$cartTotal = 0;
			foreach($event->getArg('arrProduct') as $objProduct) {
				$quantity = $arrShoppingCartItems[$objProduct->getProductId()];
				$cartTotal += $arrShoppingCartItems[$objProduct->getProductId()] * $objProduct->getPrice();
				$cartTotal = number_format($cartTotal, 2, '.', '');
			}
			$amount = $cartTotal;
			
			
			$objOrdersBean = new OrdersBean();
			
			$date = date('Y-m-d');
			$time = date('H:m:s');
			$createDateTime = "".$date." ".$time."";
			
			$delivery = $objAppSession->getSession("Delivery");
			$orderComment = $objAppSession->getSession("OrderComment");
			
			if ($delivery == "0.00") {
				$shipPrice = "0.00";	
				$selected = "None";				
			} else {
				$shipPrice = $delivery;
			}
			
			$sLang = $objAppSession->getSession('sLang');
			$oT = new Translator('template3',$sLang);
			
			$shipName = $oT->gL("txtDelivery2");
						
			$objOrdersBean->setShipName($shipName);
			$objOrdersBean->setShipPrice($shipPrice);
			
			$objOrdersBean->setCreateDate($createDateTime);
	      	$objOrdersBean->setAuthorizeStatus($authorizePaymentStatus);
	      	$objOrdersBean->setAuthorizeMail($authorizeMail);
	      	$objOrdersBean->setCustomerInformation("".$emailName."");
	      	
	      	// dodatkowe pola na adres wysyłkowy wpisany podczas składania zamówienia
	      	$objOrdersBean->setNameFirst($firstName);
	        $objOrdersBean->setNameLast($lastName);
	        $objOrdersBean->setStreet($street);
	        $objOrdersBean->setNumber($number);
	        $objOrdersBean->setZip($zip);
	        $objOrdersBean->setCity($city);
	        $objOrdersBean->setPhone1($phone1);
	        $objOrdersBean->setCountry($country);
	      	      	
	      	$orderComment = htmlspecialchars(trim($objAppSession->getSession("OrderComment")), ENT_QUOTES,'UTF-8',true);
	      	$objOrdersBean->setComments($orderComment);
	      	$objOrdersBean->setAmount($amount);
	      	$objOrdersBean->setIsSend(0);
	      	$objOrdersBean->setIsPointed(0);
	      	$objOrdersBean->setPointComment("");
	      	
	      	$objOrdersDao = new OrdersDao();
	      	$orderId = $objOrdersDao->create($objOrdersBean);
	      	
	      	$event->setArg("OrderId", $orderId);
	      	
	      	// create entry in OrderProduct table ------------->
	      	$objOrdersProductBean = new OrdersProductBean();
			$objOrdersProductDao = new OrdersProductDao();
			
			$messageContentTable = "";
			
			$messageContentTable .= "<strong><br />".$oT->gL("txtOrderedProducts").":</strong><br/><br/>";	
			$messageContentTable .= "<table width=\"650\" cellspacing=\"0\" cellpadding=\"10\" border=\"1\" style=\"border:1px solid #666;\">";
			$messageContentTable .= "<tr>";
			$messageContentTable .= "<td width=\"100\">";
	  		$messageContentTable .= "<strong></strong>";
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"275\">";
	  		$messageContentTable .= "<strong>".$oT->gL("txtProducts")."</strong>";
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"100\" align=\"center\">";
	  		$messageContentTable .= "<strong>".$oT->gL("txtPrice")."</strong>";
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"75\" align=\"center\">";
	  		$messageContentTable .= "<strong>".$oT->gL("txtQuantity")."</strong>";
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"100\" align=\"center\">";
	  		$messageContentTable .= "<strong>".$oT->gL("txtTotal")."</strong>";
	  		$messageContentTable .= "</td>";
			$messageContentTable .= "</tr>";
			
			      	
			$totalBasketItems = 0;
			$cartTotal = 0;
			$totalPoints = 0;
	      	foreach($event->getArg('arrProduct') as $objProduct) {
	      		
				$quantity = $arrShoppingCartItems[$objProduct->getProductId()];
				$totalBasketItems = $totalBasketItems + $quantity;
				$cartTotal +=  $quantity * $objProduct->getPrice();
				$totalPoints = $totalPoints + $objProduct->getPoints() * $quantity;
				
				$objOrdersProductBean->setOrderId($orderId);
				$objOrdersProductBean->setProductId($objProduct->getProductId());
				$objOrdersProductBean->setPurchasePrice($objProduct->getPrice());
				$objOrdersProductBean->setQuantity($quantity);
				$objOrdersProductBean->setIsFilled(0);
				$objOrdersProductBean->setProductCategoryLevelOneName($objProduct->getProductCategoryLevelOneName());
				$objOrdersProductBean->setProductCategoryLevelTwoName($objProduct->getProductCategoryLevelTwoName());
				$objOrdersProductBean->setImgDriveName($objProduct->getImgDriveName());
				$objOrdersProductBean->setName($objProduct->getName());
				$objOrdersProductBean->setPoints($objProduct->getPoints());
				
				
				$objOrdersProductDao->create($objOrdersProductBean);
				
				$messageContentTable .= "<tr>";
				
				$messageContentTable .= "<td width=\"100\" align=\"center\">";
				$messageContentTable .= "<img src=\"http://www.s1120197-253.crystone.net/upload/micro/".$objProduct->getImgDriveName()."\">";
				$messageContentTable .= "</td>";
				
	      		$messageContentTable .= "<td>";
	      		$messageContentTable .= $objProduct->getName();
	      		$messageContentTable .= "</td>";
	      		$messageContentTable .= "<td align=\"center\">";
	      		$messageContentTable .= $objProduct->getPrice()." NOK";
	      		$messageContentTable .= "</td>";
	      		$messageContentTable .= "<td align=\"center\">";
	      		$messageContentTable .= $quantity;
	      		$messageContentTable .= "</td>";
	      		$messageContentTable .= "<td align=\"center\">";
	 		    $messageContentTable .= number_format($quantity * $objProduct->getPrice(),2, '.', '')." NOK";	
	      		$messageContentTable .= "</td>";
				$messageContentTable .= "</tr>";
							
			}
			
			$messageContentTable .= "<tr>";
	      	$messageContentTable .= "<td colspan=\"3\" align=\"right\">";
	      	$messageContentTable .= $oT->gL("txtTotal");
	      	$messageContentTable .= "</td>";
	      	$messageContentTable .= "<td align=\"center\">";
	      	$messageContentTable .= $totalBasketItems;
	      	$messageContentTable .= "</td>";
	      	$messageContentTable .= "<td align=\"center\">";
	      	$messageContentTable .= number_format($cartTotal,2, '.', '')." NOK";
	      	$messageContentTable .= "</td>";
			$messageContentTable .= "</tr>";
			
			$messageContentTable .= "</table><br/>";
			$messageContentTable .= "<strong>".$oT->gL("txtChosenDeliveryMethod").":</strong><br/>";	
			$messageContentTable .= "".$shipName."<br/><br/>";
			
			$messageContentTable .= "<table width=\"650\" cellspacing=\"0\" cellpadding=\"10\" border=\"1\"  style=\"border:1px solid #666;\">";
			$messageContentTable .= "<tr>";
	  		$messageContentTable .= "<td width=\"550\" align=\"right\">";
	  		$messageContentTable .= $oT->gL("txtDeliveryCost");
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"100\" align=\"center\">";
	  		$messageContentTable .= number_format($shipPrice,2, '.', '')." NOK";
	  		$messageContentTable .= "</td>";
			$messageContentTable .= "</tr>";
			$messageContentTable .= "<tr>";
	  		$messageContentTable .= "<td width=\"550\" align=\"right\">";
	  		$messageContentTable .= "<strong>".$oT->gL("txtTotal")."</strong>";
	  		$messageContentTable .= "</td>";
	  		$messageContentTable .= "<td width=\"100\" align=\"center\">";
	  		$messageContentTable .= "<strong>".number_format($cartTotal +$shipPrice,2, '.', '')." NOK";
	  		$messageContentTable .= "</td>";
			$messageContentTable .= "</tr>";
			$messageContentTable .= "</table><br/>";
			
			//Tomku tu wpisz dane odboircy
			$messageContentTable .= "<strong>".$oT->gL("txtDeliveryAddress").":</strong><br/>";
			$messageContentTable .= $oT->gL("txtFirstName").":".$firstName."<br/>";
			$messageContentTable .= $oT->gL("txtLastName").":".$lastName."<br/>";	
			$messageContentTable .= $oT->gL("txtStreet").":".$street."<br/>";
			$messageContentTable .= $oT->gL("txtHouseNumber").":".$number."<br/>";
			$messageContentTable .= $oT->gL("txtZip").":".$zip."<br/>";
			$messageContentTable .= $oT->gL("txtCity").":".$city."<br/>";
			$messageContentTable .= $oT->gL("txtPhoneNumber").":".$phone1."<br/><br/>";
			
			
			// send email to customer
	  		$fromEmail = "mariussj@s1120197-253.crystone.net";
			//$toEmail = $email;
			$toEmail = "tprokop@prothomsoft.com";
			$subject = "Musikkgaver - ".$oT->gL("txtOrderConfirmation").": ".$orderId."";
			$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
			$messageContent .= "color:#5d5d5d;"; 
			$messageContent .= "font-size:14px\">";	  
			// tytuł 
			$messageContent .= "<p style=\"font-size:18px\">".$oT->gL("txtOrderNumber")." ".$orderId." ".$oT->gL("txtHasBeenReceived")."<br/></p>"; 
			// 
			$messageContent .= "<hr style=\"border: 1px solid rgb(115, 186, 20);\">";
			$messageContent .= $messageContentTable;
			
			// footer wiadomosci		
			$messageContent .= "<br /><p style=\"font-size:12px\">";		
			$messageContent .= "<hr style=\"border: 1px solid rgb(115, 186, 20);\">";
			$messageContent .= "<strong>".$oT->gL("txtKindRegards").",</strong><br />";	
			$messageContent .= "Musikkgaver<br />";
			$messageContent .= "<a href=\"http://www.musikkgaver.no\" style=\"color:#C43471\">www.musikkgaver.no</a><br /></p>";
			
			$emails = new Emails("1", $fromEmail, $toEmail, $subject, $messageContent);
			$emails->sendEmail();
			
	    	// send email to administrator
	  		$fromEmail = "mariussj@s1120197-253.crystone.net";
			$subject  = "Salg av instrumenter. Order no.: ".$orderId." from: ".$firstName." ".$lastName." ";
			$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
			$messageContent .= "color:#5d5d5d;"; 
			$messageContent .= "font-size:14px\">";	  
			$messageContent .= "<p style=\"font-size:18px\">Salg av instrumenter. Order: ".$orderId." from: ".$firstName." ".$lastName."<br/></p>"; 
		
			$messageContent .= "<strong>Create date:</strong> ".substr(($createDateTime),0,10)."<br/>";		
			$messageContent .= "<b>Email: </b> <a href=\"mailto:".$email."\">".$email."</a><br />";
			$messageContent .= $messageContentTable;
			
			$toEmail = "mariussj@gmail.com";
			$emails = new Emails("2", $fromEmail, $toEmail, $subject, $messageContent);
			//$emails->sendEmail();
			
	    	$toEmail = "tprokop@prothomsoft.com";
			$emails = new Emails("2", $fromEmail, $toEmail, $subject, $messageContent);
			$emails->sendEmail();
    	}
		
    }
    
    function updateOrder(&$event) {
    	
    	$orderId = $event->getArg("orderId");
    	if($event->getArg("AuthorizeStatus") == 99) {
    		$objOrdersDao = new OrdersDao();
	    	$objOrdersBean = $objOrdersDao->read($orderId);
	    	$date = date('Y-m-d');
	    	$objOrdersBean->setAuthorizeDate($date);
	    	// odebrana, zakończona
	    	$status = 99;
	    	$objOrdersBean->setAuthorizeStatus($status);
	    	$objOrdersDao->update($objOrdersBean);
    	}
    	
	}
    
    function setFieldsForUpdate(&$event) {
    	$objOrdersDao = new OrdersDao();
    	
    	if($event->getArg('id1') != "") {
    		$orderId = $event->getArg('id1');
    	} else {
    		$orderId = $event->getArg('orderId');
    	}
    		
    	$objOrder = $objOrdersDao->read($orderId);
    	
    	if (!$event->isArgDefined('CustomerInformation')) {
    		$CustomerInformation = $objOrder->getCustomerInformation();
    		$event->setArg('CustomerInformation',$CustomerInformation);
    	}
    	
    	if (!$event->isArgDefined('UserId')) {
    		$UserId= $objOrder->getUserId();
    		$event->setArg('UserId',$UserId);
    	}
    	
    	if (!$event->isArgDefined('CreateDate')) {
    		$CreateDate= $objOrder->getCreateDate();
    		$event->setArg('CreateDate',$CreateDate);
    	}
    	
    	if (!$event->isArgDefined('Amount')) {
    		$Amount= $objOrder->getAmount();
    		$event->setArg('Amount',$Amount);
    	}
    	
    	if (!$event->isArgDefined('AuthorizeDate')) {
    		$AuthorizeDate= $objOrder->getAuthorizeDate();
    		$event->setArg('AuthorizeDate',$AuthorizeDate);
    	}
    	
    	if (!$event->isArgDefined('AuthorizeStatus')) {
    		$AuthorizeStatus= $objOrder->getAuthorizeStatus();
    		$event->setArg('AuthorizeStatus',$AuthorizeStatus);
    	}
    	
    	if (!$event->isArgDefined('AuthorizeMail')) {
    		$AuthorizeMail= $objOrder->getAuthorizeMail();
    		$event->setArg('AuthorizeMail',$AuthorizeMail);
    	}
    	
    	if (!$event->isArgDefined('Comments')) {
    		$Comments= $objOrder->getComments();
    		$event->setArg('Comments',$Comments);
    	}
    	
    	if (!$event->isArgDefined('IsSend')) {
    		$IsSend = $objOrder->getIsSend();
    		$event->setArg('IsSend',$IsSend);
    	}
    	
    	if (!$event->isArgDefined('IsPointed')) {
    		$IsPointed = $objOrder->getIsPointed();
    		$event->setArg('IsPointed',$IsPointed);
    	}
    	
    	if (!$event->isArgDefined('PointComment')) {
    		$PointComment = $objOrder->getPointComment();
    		$event->setArg('PointComment',$PointComment);
    	}
    	
    	if (!$event->isArgDefined('ShipName')) {
    		$ShipName = $objOrder->getShipName();
    		$event->setArg('ShipName',$ShipName);
    	}
    	
    	if (!$event->isArgDefined('PaymentName')) {
    		$PaymentName = $objOrder->getPaymentName();
    		$event->setArg('PaymentName',$PaymentName);
    	}
    	
    	if (!$event->isArgDefined('ShipPrice')) {
    		$ShipPrice = $objOrder->getShipPrice();
    		$event->setArg('ShipPrice',$ShipPrice);
    	}
    	
    	if (!$event->isArgDefined('NameFirst')) {
    		$NameFirst = $objOrder->getNameFirst();
    		$event->setArg('NameFirst',$NameFirst);
    	}
    	
    	if (!$event->isArgDefined('NameLast')) {
    		$NameLast = $objOrder->getNameLast();
    		$event->setArg('NameLast',$NameLast);
    	}
    	
    	if (!$event->isArgDefined('Street')) {
    		$Street = $objOrder->getStreet();
    		$event->setArg('Street',$Street);
    	}
    	
    	if (!$event->isArgDefined('Number')) {
    		$Number = $objOrder->getNumber();
    		$event->setArg('Number',$Number);
    	}
    	
    	if (!$event->isArgDefined('Zip')) {
    		$Zip = $objOrder->getZip();
    		$event->setArg('Zip',$Zip);
    	}
    	
    	if (!$event->isArgDefined('City')) {
    		$City = $objOrder->getCity();
    		$event->setArg('City',$City);
    	}
    	
    	if (!$event->isArgDefined('Phone1')) {
    		$Phone1 = $objOrder->getPhone1();
    		$event->setArg('Phone1',$Phone1);
    	}
    	if (!$event->isArgDefined('Country')) {
    		$Country = $objOrder->getCountry();
    		$event->setArg('Country',$Country);
    	}
    }
    
    function findOrder(&$event)	{
		$orderId = $event->getArg('orderId');
		$objOrdersDao = new OrdersDao();
        $objOrder = $objOrdersDao->read($orderId);
		$event->setArg('objOrder',$objOrder);
	}
	
	function findOrderItems(&$event) {
		if($event->getArg('id1') != "") {
    		$orderId = $event->getArg('id1');
    	} else {
    		$orderId = $event->getArg('orderId');
    	}
		$objOrdersProductGateway = new OrdersProductGateway();
		$arrOrdersProduct = $objOrdersProductGateway->findProductsbyOrderId($orderId);
		$event->setArg('arrOrdersProduct',$arrOrdersProduct);
	}
	
	function sendDeliveryMessage(&$event) {
		
		$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		if($event->getArg("isSendFlag")) {
				$orderId = $event->getArg('orderId');
				$userId = $event->getArg('userId');
					
				$objUserDao = new UserDao();
				$objUser = $objUserDao->read($userId); 
				
				$objOrdersDao = new OrdersDao();
				$objOrdersBean = new OrdersBean();
				$objOrdersBean = $objOrdersDao->read($orderId);
				$isSend = $event->getArg('IsSend');
				
				if ($isSend == 1) {
						
						$objOrdersBean->setIsSend($isSend);
						$objOrdersDao->update($objOrdersBean);
						
						if ($objOrdersBean->getShipName() == "Odbiór osobisty - Kraków, ul. Dobrego Pasterza 64") {
							$subjectCustomer  = "Close2you.pl - Zamówienie numer ".$orderId." jest gotowe do odbioru";
							$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
							$messageContent .= "color:#5d5d5d;"; 
							$messageContent .= "font-size:14px\">";	  
	      					$messageContent .= "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";						
							$messageContent .= "<p style=\"font-size:18px\">Zamówienie numer ".$orderId." jest gotowe do odbioru.<br/></p>"; 
							$messageContent .= "Zamowienie numer ".$orderId." jest gotowe do odbioru w siedzibie firmy pod adresem:<br/><br/>";			
							$messageContent .= "Close2you.pl<br/>";
							$messageContent .= "31-416 Kraków<br/>"; 
							$messageContent .= "Dobrego Pasterza 64<br/><br/>";
							$messageContent .= "Przesyłkę możesz odebrać od poniedziałku do piątku w godzinach od 9.00 do 15.30<br/><br/>";
							$messageContent .= "Skorzystaj ze <a href=\"".$SN."wskazowki_dojazdu.html\" target=\"_blank\">wskazówek dojazdu</a> umieszczonych w Centrum Pomocy Close2you.pl <br/><br/>";

							$subjectAdmin = "Zamówienie nr ".$orderId." jest gotowe do odbioru";	
						
						// to doreczenie usunieto z koszyka  -mozna je wykorzystac w przyszlosci				
						} else if ($objOrdersBean->getShipName() == "Doręczenie do domu przez pracownika sklepu - czas dostawy: 1-3 dni") {
							$subjectCustomer  = "Close2you.pl - Zamówienie numer ".$orderId." jest gotowe do doręczenia przez pracownika sklepu";							
							$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
							$messageContent .= "color:#5d5d5d;"; 
							$messageContent .= "font-size:14px\">";	  
		      				$messageContent .= "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";					
							$messageContent .= "<p style=\"font-size:18px\">Zamowienie numer ".$orderId." jest gotowe do doręczenia przez pracownika firmy.<br/></p>"; 
							$messageContent .= "Skontaktujemy się z Tobą telefonicznie w celu ustalenia miejsca i godziny dostarczenia przesyłki.<br/>";

							$messageContent .= "<br/>";														
							$messageContent .= "Status swojego zamówienia zobaczysz w zakładce <a href=\"http://www.close2you.pl/historia_zamowien.html\">Moje konto -> Historia zamówień</a>.<br/><br/>";
												
							$subjectAdmin = "Zamówienie nr ".$orderId." jest gotowe do doręczenia przez pracownika sklepu";
						} else {
							$subjectCustomer = "Close2you.pl - Zamówienie numer ".$orderId." - potwierdzenie wysłania";			
							$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
							$messageContent .= "color:#5d5d5d;"; 
							$messageContent .= "font-size:14px\">";	  						
							$messageContent .= "<p style=\"font-size:18px\">Zamowienie numer ".$orderId." zostało wysłane.<br/></p>";
							$messageContent .= "Status swojego zamówienia zobaczysz w zakładce <a href=\"http://www.close2you.pl/historia_zamowien.html\">Moje konto -> Historia zamówień</a>.<br/><br/>";							 
							$messageContent .= "<img src=\"http://www.close2you.pl/images/Email/wyslano.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" />";
							$messageContent .= "<br /><br />";
							$subjectAdmin = "Zamówienie nr ".$orderId." - wysłano";	
						}
						
						
						//pb
							// footer massage content
						$messageContentFooter = "<br/><br/>";
						$messageContentFooter .= "W razie jakichkolwiek pytań proszę odwiedzić Centrum Pomocy Close2you.pl <br />bądź skontaktować się z nami mailowo lub telefonicznie.<br/><br/>";	
									
						$messageContentFooter .= "<br /><p style=\"font-size:12px\">";		
						$messageContentFooter .= "<hr style=\"border: 1px solid rgb(115, 186, 20);\">";
						$messageContentFooter .= "<strong>Pozdrawiamy,</strong><br />";	
						$messageContentFooter .= "Sklep internetowy Close2you.pl<br />";
						$messageContentFooter .= "ul. Dobrego Pasterza 64<br />";
						$messageContentFooter .= "31-416 Kraków<br />";
						$messageContentFooter .= "czynne pn-pt w godzinach 8 do 16 <br />";	
						$messageContentFooter .= "tel/fax. (12) 418 19 07 <br /><br />";			
						$messageContentFooter .= "Zapraszamy - <a href=\"http://www.close2you.pl\" style=\"color:#C43471\">www.close2you.pl</a> - Perfumy najbliżej Ciebie<br /></p>";		
							// end footer massage content 				

							// top massage content
	      				$messageContentTop = "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";							
						$messageContentTop .= "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
						$messageContentTop .= "<br /><br /><br />";
							// end top massage content
						
						$messageContentCustomer = "<br/>";	
						$messageContentCustomer .= $messageContentTop;										
						$messageContentCustomer .= $messageContent;	
						$messageContentCustomer .= $messageContentFooter;	
						
						$messageContentAdmin = "<br/>";								
						$messageContentAdmin .= $messageContent;
						//pb end					
																	
						// send email to customer
						$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
						$toEmail = $objUser->getEmail();
						$mail = new Rmail();
				    	$mail->setFrom($fromEmail); 
				    	$mail->setSubject($subjectCustomer);
					    $mail->setHTML($messageContentCustomer);
				    	$result = $mail->send(array($toEmail));
				    	
				    	// send email to administrator
						$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
						//$toEmail = "tprokop@prothomsoft.com";
						$toEmail = "sklep@close2you.pl";
						$mail = new Rmail();
				    	$mail->setFrom($fromEmail); 
				    	$mail->setSubject($subjectAdmin);
					    $mail->setHTML($messageContentAdmin);
				    	$result = $mail->send(array($toEmail));
					}
			}
	}
	
	function sendPointsMessage(&$event) {
		
		$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		if($event->getArg("isPointedFlag")) {
	
			$orderId = $event->getArg('orderId');
			$userId = $event->getArg('userId');
				
			$objUserDao = new UserDao();
			$objUser = $objUserDao->read($userId); 
			
			$objOrdersDao = new OrdersDao();
			$objOrdersBean = new OrdersBean();
			$objOrdersBean = $objOrdersDao->read($orderId);
			$isPointed = $event->getArg('IsPointed');
			$PointComment = $event->getArg('PointComment');
			
			if ($isPointed == 1) {
				
				$objOrdersBean->setIsPointed($isPointed);
				$objOrdersBean->setPointComment($PointComment);
				$objOrdersDao->update($objOrdersBean);
			
				// add points for this uses
				$totalPoints = $event->getArg("totalPoints");
				
				$objUserDao = new UserDao();
				$objUser = $objUserDao->read($userId);
				
				$customerInformation = "".$objUser->getEmail()."";  
				
				$objPointsBean = new PointsBean();
				
				$date = date('Y-m-d');
				$time = date('H:m:s');
				$createDateTime = "".$date." ".$time."";
				
		    	$objPointsBean->setCustomerInformation($customerInformation);
				$objPointsBean->setCreateDate($createDateTime);
		      	$objPointsBean->setAmount($totalPoints);
		      	$objPointsBean->setUserId($userId);
		      	$objPointsBean->setOrderId($orderId);
		      	$objPointsBean->setComments($PointComment);
		      	
		      	$objPointsDao = new PointsDao();
		      	$PointId = $objPointsDao->create($objPointsBean);
		      	
		      	// send email to customer
				$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
				$toEmail = $objUser->getEmail();
				$subject  = "Close2you.pl - Przyznano ".$totalPoints." punkty za zamówienie numer ".$orderId."";
	
				// logo plus ustawienie fontow
		        $messageContent = "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";				
				$messageContent .= "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
				$messageContent .= "<br /><br /><br />";
				$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
				$messageContent .= "color:#5d5d5d;"; 
				$messageContent .= "font-size:14px\">";	  
				// tytuł
				$messageContent .= "<p style=\"font-size:18px\">Przyznano ".$totalPoints." punkty za zamówienie numer ".$orderId."<br/></p>"; 
				// tresc wiadomosci
				$messageContent .= "Promocja <a href=\"".$SN."pomoc/o-sklepie-close2youpl/plac-punktami-close2you.html\" target=\"_blank\">Płać punktami Close2you</a> polega na otrzymywaniu gratisów za zakupy punktowanych produktów w sklepie Close2you.<br/><br/>";
				$messageContent .= " .<br/><br/>";
				$messageContent .= "Ilość punktów Close2you do wykorzystania oraz historię zobaczysz  w zakładce <a href=\"http://www.close2you.pl/punkty.html\">Moje konto -> Punkty Close2you</a>.<br/>";
				$messageContent .= "<br/><br/>";
				$messageContent .= "W razie jakichkolwiek pytań proszę odwiedzić Centrum Pomocy Close2you.pl <br />bądź skontaktować się z nami mailowo lub telefonicznie.<br/><br/>";	
				
				$messageContent .= "<a href=\"http://close2you.pl/pomoc/o-sklepie-close2youpl/plac-punktami-close2you.html\" <img border=\"0\" src=\"http://www.close2you.pl/images/Email/punkty.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" /></a> ";
				$messageContent .= "<br /><br />";
				// footer wiadomosci		
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
				$subject  = "Zamówienie numer ".$orderId." przyznano ".$totalPoints." punkt(y)";
				
				$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
				$messageContent .= "color:#5d5d5d;"; 
				$messageContent .= "font-size:14px\">";	 
				$messageContent .= "<p style=\"font-size:18px\">Przyznano ".$totalPoints." punkt(y).<br /></p>"; 
				$messageContent .= "Przyznano ".$totalPoints." punkt(y) za zamówienie numer ".$orderId.".<br />"; 
				
				$mail = new Rmail();
		    	$mail->setFrom($fromEmail); 
		    	$mail->setSubject($subject);
			    $mail->setHTML($messageContent);
		    	$result = $mail->send(array($toEmail));
		      	
			}
			
		}
		
	}
	
	function findById(&$event) {
		$orderId = $event->getArg('orderId');
		$objOrdersDao = new OrdersDao();
		$objOrder = $objOrdersDao->read($orderId);
		$event->setArg('objOrder',$objOrder);
	}
	
	
	
}
?>