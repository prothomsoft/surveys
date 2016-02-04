<?php
require_once("components/session.inc.php");
require_once("components/Rmail.php");
require_once("components/class.phpmailer.php");
require_once("components/db.inc.php");
 
require_once("UserDao.inc.php");
require_once("UserGateway.inc.php");
require_once("UserBean.inc.php");

require_once("RightsUserDao.inc.php");
require_once("RightsUserBean.inc.php");
require_once("RightsUserGateway.inc.php");

class model_UserListener extends MachII_framework_Listener {
	
	function configure() {}
	    
	function logIn(&$event){	
      
		// email
		$email = $event->getArg('email');
		$password = $event->getArg('password');
		$hashedPassword = md5($password);
		 
		$objUserDao = new UserDao();
		$objUserBean = $objUserDao->getByEmailAndPassword($email,$hashedPassword);
      
		if($objUserBean->getUserId() != "" && $objUserBean->getStatus() == 1) {
			$objAppSession = new AppSession();
			$objAppSession->setSession("User",$objUserBean);
			
			if ($objUserBean->getUserId() == 3) {
				$arrResult = array(validationResult => true, userType => "admin");
				header("Location: ".$SN."admin/index.php?event=startAdmin");
			} else {
				header("Location: ".$SN."lesConsultationsEnCoursChat.html");
			}
		} else {
			$newEventArgs = &$event->getArgs();
			$newEventArgs['message'] = 'txtEmailOrPasswordIncorrect';
			$newEventArgs['missingField'] = 'email';
			$failEvent = "login";
			$this->announceEvent($failEvent, $newEventArgs);
			return false;			
		}
	}

	function logOut(&$event){
		$objAppSession = new AppSession();
		$objAppSession->destroySession();
		return true;
	}
    
	function getUsersApprovedTableData(&$event) {
   	
		$DB = new DB();
		$DB->connect();
				
		// columns in the table
		$aColumns = array('UserId', 'NameFirst', 'NameLast', 'Email', 'CreateDate', 'Status');
		$sIndexColumn = "UserId";
		
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
		
		// filtering
		$sSearch = $event->getArg("sSearch");
		$sWhere = "";
		if ($sSearch != "")	{
			$sWhere = "WHERE ";
			for ($i=0;$i<count($aColumns);$i++)	{
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($sSearch)."%' OR ";
			}
			$sWhere = substr_replace($sWhere, "", -3);
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   User
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
			FROM   User
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];
		
		// output
		$sEcho = $event->getArg("sEcho");
		$sOutput = '{';
		$sOutput .= '"sEcho": '.intval($sEcho).', ';
		$sOutput .= '"iTotalRecords": '.$iTotal.', ';
		$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$sOutput .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$sOutput .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				$UserId = $aRow[0];
				$NameFirst = $aRow[1];
				$NameLast = $aRow[2];
				$Email = $aRow[3];
				$CreateDate = $aRow[4];
				$Status = $aRow[5];
				
				if ( $aColumns[$i] == "Status" ) {
					// Special output formatting example
					if(($aRow[ $aColumns[$i] ]=="1")) {
						$sOutput .= '"Active",';
					} else {
						$sOutput .= '"Not Active",';
					}
				} else if ( $aColumns[$i] == "NameFirst" ) {
					$sOutput .= '"'.$NameLast.' '.$NameFirst.'",';
				} else {
					/* General output */
					$sOutput .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			if($aRow[0] != 3) {
				$sOutput .= '"<a class=\"anchor_link\" href=\"index.php?event=showEditUserApprovedForm&userId='.$aRow[0].'\">View</a>';
				$sOutput .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveUsersApprovedAction&userId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';	
			} else {
				$sOutput .= '"<a class=\"anchor_link\" href=\"index.php?event=showEditUserApprovedForm&userId='.$aRow[0].'\">Edit</a>",';
			}
			
			
			
			$sOutput = substr_replace( $sOutput, "", -1 );
			$sOutput .= "],";
		}
		$sOutput = substr_replace( $sOutput, "", -1 );
		$sOutput .= '] }';
		
		$event->setArg('responseJSON', $sOutput);
	}
		
	function createUserWithActivation(&$event) {
		echo "123";
		$objUserBean = new UserBean();
		$objUserBean->setEmail($event->getArg('email'));
		$password = $event->getArg('password');
		$phone1 = $event->getArg("phone1");
		$website1 = $event->getArg("website1");
		$phone2 = $event->getArg("phone2");
		$objUserBean->setPassword(md5($password));
		
		// generateActivationToken
		$securityKey = $_SERVER['HTTP_USER_AGENT'];
		$rand = rand(5, 1500);
		$rand1 = rand(5, 1500);
		$securityKey .= 'SHIFLETT'.$rand.$rand1;
		$securityKey = md5($securityKey);
			
		$objUserBean->setStatus('0');
		$objUserBean->setRegon('1');
		$objUserBean->setPhone1($phone1);
		$objUserBean->setWebsite1($website1);
		$objUserBean->setPhone2($phone2);
		$objUserBean->setActivationToken($securityKey);
		$objUser = new UserDao();
		$userId = $objUser->create($objUserBean);
		$event->setArg('userId',$userId);
		
		$objAppSession = new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$sLang = $objAppSession->getSession('sLang');
		$oT = new Translator('template3',$sLang);
		
		// send activation email
		$name = $event->getArg('email');
  		$fromEmail = "grandeconsultation.fr <admin@grandeconsultation.fr>";
		$toEmail = $event->getArg('email');
		$subject  = $oT->gL("txtRegisterConfirmationMessage1");

		$messageContent .= "<p style=\"font-size:18px\">".$oT->gL("txtRegisterConfirmationMessage2")." <br/><br/></p>"; 
		// tresc wiadomosci

		$messageContent .= $oT->gL("txtRegisterConfirmationMessage3")."<br/>";
		$messageContent .= "<b>Email: </b>".$event->getArg('email')."<br/>";
		$messageContent .= "<b>Mot de passe: </b>".$event->getArg('password')."<br/><br/>";
		$messageContent .= $oT->gL("txtRegisterConfirmationMessage4")."<br/>";
		$messageContent .= "<a href=\"".$SN."activation/".$securityKey.".html\">".$SN."activation/".$securityKey.".html</a><br/><br/>";
		$messageContent .= "<br /><br />";
				
		$mail = new Rmail();
    	$mail->setFrom($fromEmail); 
    	$mail->setSubject($subject);
	    $mail->setHTML($messageContent);
    	$result = $mail->send(array($toEmail));
	}
	
	function executeActivation(&$event) {
		$activationToken = $event->getArg("id1");				
		$objUserBean = new UserBean();
		$objUserDao = new UserDao();				
		$objUserBean = $objUserDao->getByActivationToken($activationToken);
		
		if($objUserBean->getUserId() != "") {
			$objUserBean->setActivationToken('');
			$objUserBean->setStatus('1');				
			$objUserDao->update($objUserBean);
			$activationStatus = "success";
			$event->setArg("activationStatus", $activationStatus);
		
		} else {
			$activationStatus = "fail";
			$event->setArg("activationStatus", $activationStatus);
		}
	}
	    
	function assignUserToRight(&$event) {
		$objRightsUserBean=new RightsUserBean();
		$objRightsUserBean->setRightsId('2'); // access zone 2
		$objRightsUserBean->setUserId($event->getArg('userId'));
		$objRightsUserDao = new RightsUserDao();
		$objRightsUserDao->create($objRightsUserBean);
		header("Location: ".$SN."registerConfirmation.html");
	}
	
	
	
	
	
	function validationResultTrue() {
		$arrResult = array(validationResult => true,  
						   errorMessage => "",
						   fieldName => "");
		echo json_encode($arrResult);
	}
	                
    function executeContact(&$event){	
		$objUserDao = new UserDao();
		$objUserBean=new UserBean();
		$name = $event->getArg('name');
		$email = $event->getArg('email');
		$message = $event->getArg('message');
		
	
 		$fromEmail = $email;
		
		$subject  = "".$email." - Melding fra musikkglede.no";	
		// logo
	//	$messageContent = "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
	//	$messageContent .= "<br /><br /><br />";
		// ustawienie fontow
		$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		// tytuł
		$messageContent .= "<p style=\"font-size:18px\">Melding fra musikkglede.no <br /></p>"; 
		// tresc wiadomosci
		$messageContent .= "<b>Navn: </b>".$name."<br/>";
		$messageContent .= "<b>Epost: </b> <a href=\"mailto:".$email."\">".$email."</a><br />";
		$messageContent .= "<b>Message: </b>".$message."";
		$messageContent .= "<br />";
		$messageContent .= "<br />";
		// footer wiadomosci
	//	$messageContent .= "<br /><p style=\"font-size:12px\">";		
	//	$messageContent .= "<hr style=\"border: 1px solid rgb(115, 186, 20);\">";
	//	$messageContent .= "<strong>Pozdrawiamy,</strong><br />";	
	//	$messageContent .= "Sklep internetowy Close2you.pl<br />";
	//	$messageContent .= "ul. Dobrego Pasterza 64<br />";
	//	$messageContent .= "31-416 Kraków<br />";
	//	$messageContent .= "czynne pn-pt w godzinach 8 do 16 <br />";	
	//	$messageContent .= "tel/fax. (12) 418 19 07 <br /><br />";			
	//	$messageContent .= "Zapraszamy - <a href=\"http://www.close2you.pl\" style=\"color:#C43471\">www.close2you.pl</a> - Perfumy najbliżej Ciebie<br /></p>";
		
		
		
		
		
		$toEmail = "musikkglede@hotmail.com";
			$mail = new Rmail();
	    	$mail->setFrom($fromEmail); 
	    	$mail->setSubject($subject);
		    $mail->setHTML($messageContent);
	    	$result = $mail->send(array($toEmail));
	    	
	    	$toEmail = "musikkglede@musikkglede.no";
			$mail = new Rmail();
	    	$mail->setFrom($fromEmail); 
	    	$mail->setSubject($subject);
		    $mail->setHTML($messageContent);
	    	$result = $mail->send(array($toEmail));
		
	}
	
	function executeSamples(&$event){	
		
		$objAppSession = new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$objUserDao = new UserDao();
		$objUserBean=new UserBean();
		
		$email = $event->getArg('email');
		$odpowiednik = $event->getArg('odpowiednik');
		
		$mail = new PHPMailer(true);
		
		$mail->IsSMTP();
		$mail->Host = 'ssl://smtp.gmail.com:465';
		$mail->SMTPAuth   = true;
		$mail->Username   = "odpowiednikiclose2you@gmail.com";
		$mail->Password   = "close123CLOSE";
		
		$mail->SetFrom("odpowiednikiclose2you@gmail.com", "Drogeria Close2you.pl");
		$mail->AddAttachment("odpowiedniki/".$odpowiednik."");
		$mail->CharSet = "UTF-8";
		$mail->AddAddress($email); // ADRESAT
		
		$subject  = "Lista zapachów";
		
		
		$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		
		$messageContent .= "<p style=\"font-size:18px\">Witaj, <br /></p>"; 
	
		$messageContent .= "Listę zapachów znajdziesz w załączniku tej wiadomości email.<br />";
		$messageContent .= "Dziękujemy,<br/><br/>";
		$messageContent .= "Ta wiadomość została przesłana z adresu e-mail <br/>";
		$messageContent .= "przeznaczonego wyłącznie do wysyłania komunikatów. <br/>";
		$messageContent .= "Proszę nie odpowiadać na tę wiadomość.";	
		$mail->Subject = $subject;
		$mail->MsgHTML($messageContent);
		$result = $mail->Send();
		
		//dopiseane -  wysłanie wiadmosci o pobraniu do sklepu	
		
				
		$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
		$toEmail = 'sklep@close2you.pl';
		$subject  = "".$email." - pobrał odpowiedniki";		
		$messageContent = "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		$messageContent .= "<p style=\"font-size:18px\">Pobrano odpowiedniki<br /></p>"; 
		$messageContent .= "Pobrano odpowiedniki na adres <a href=\"mailto:".$email."\">".$email."</a><br />";
		$messageContent .= "<br />";
		$messageContent .= "<br />";
			
		$mail = new Rmail();
    	$mail->setFrom($fromEmail);
    	$mail->setSubject($subject);
	    $mail->setHTML($messageContent);
    	$result = $mail->send(array($toEmail));
			
			// koniec wysłanie wiadmosci o pobraniu do sklepu	
		
		
		
		
	}

	
	
	
		
	
	
	
    
	function executeForgotPassword(&$event){	
		$objUserDao = new UserDao();
		$objUserBean=new UserBean();
		$email = $event->getArg('email');
		$objUserBean=$objUserDao->getByEmail($email);
		
		$objAppSession = new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		if ($objUserBean->getUserId() != ""){
			// send email to the user with new generated password
			$name = $objUserBean->getNameFirst()." ".$objUserBean->getNameLast() ;
			
			// generate new password and update user
			$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
			$newPassword = substr(str_shuffle($chars),0,8);
			$objUserBean->setPassword(md5($newPassword));
			$objUserDao->update($objUserBean);
			
			$fromEmail = "grandeconsultation.fr <admin@grandeconsultation.fr>";
			$toEmail = $objUserBean->getEmail();
			$subject  = "Surveys - Forgot Password";
			
			// tytuł
			$messageContent .= "<p style=\"font-size:18px\">Forgot password<br/></p>"; 
			//tresc wiadomosci
		
			$messageContent .= "Your login credentials are as follows:<br/>";
			$messageContent .= "<b>Login: </b>".$objUserBean->getEmail()."<br />";
			$messageContent .= "<b>Password: </b>".$newPassword."<br /><br/>";
			$messageContent .= "Click the link below and login to Your account:<br/>";
	  		$messageContent .= "<a href=\"http://grandeconsultation.fr/login.html\">http://grandeconsultation.fr/login.html</a><br/><br/>";
			
			$mail = new Rmail();
    		$mail->setFrom($fromEmail);
    		$mail->setSubject($subject);
	    	$mail->setHTML($messageContent);
    		$result = $mail->send(array($toEmail));
			header("Location: ".$SN."forgotPasswordConfirmation.html");
			return false;
		} else{
			$newEventArgs = &$event->getArgs();
			$newEventArgs['message'] = 'txtEmailNotFound';
			$newEventArgs['missingField'] = 'email';
			$failEvent = "forgotPassword";
			$this->announceEvent($failEvent, $newEventArgs);
			return false;			
		}
	}
      
	function changeLanguage(&$event) {
   	
   		// find a user based on email
   		$lang = $event->getArg('id1');
   		
   		$appSession = new AppSession();
   		if ($lang == "PL") {
      		$appSession->setSession("sLang",'PL');
      	}
      	if ($lang == "EN") {
      		$appSession->setSession("sLang",'EN');
      	}
   }
   
   function createRecord(&$event) {
		$objUserBean=new UserBean();
		$objUserBean->setEmail($event->getArg('email'));
		$objUserBean->setPassword($event->getArg('password'));
		$objUserBean->setNameFirst($event->getArg('nameFirst'));
		$objUserBean->setNameLast($event->getArg('nameLast'));
		$objUserBean->setStreet($event->getArg('street'));
		$objUserBean->setNumber($event->getArg('number'));
		$objUserBean->setZip($event->getArg('zip'));
		$objUserBean->setCity($event->getArg('city'));
		$objUserBean->setPhone1($event->getArg('phone1'));
		$objUserBean->setInfo($event->getArg('info'));
		$objUserBean->setTesterStatus(0);
		$objUserBean->setCompanyName($event->getArg('companyName'));
		$objUserBean->setNipPL($event->getArg('nipPL'));
		$objUserBean->setStatus('1');
		$objUserDao = new UserDao();
		$userId = $objUserDao->create($objUserBean);
		$event->setArg('userId',$userId);
		
		$objRightsUserDao = new RightsUserDao();
		$objRightsUserBean = new RightsUserBean();
		$userRightId = 2;
		$objRightsUserBean->setRightsId($userRightId);
		$objRightsUserBean->setUserId($userId);
		$objRightsUserDao->create($objRightsUserBean);
	}
	
	function changePassword(&$event) {
		
		$objAppSession = new AppSession();
		$objUser = $objAppSession->getSession("User");
		
    	$userId = $objUser->getUserId();
    	
		$objUserDao = new UserDao();
		$objUserBean = new UserBean();
		$objUserBean = $objUserDao->read($userId);
		
		$newPassword = $event->getArg("newPassword");
		
		$objUserBean->setPassword(md5($newPassword));
		$objUserDao->update($objUserBean);
		header("Location: ".$SN."changePasswordConfirmation.html");
	}
	
	function removeAccount(&$event) {
		$objAppSession = new AppSession();
		$objUser = $objAppSession->getSession("User");
	
		$userId = $objUser->getUserId();
		 
		$objUserDao = new UserDao();
		$objUserBean = $objUserDao->read($userId);
		
		// send activation email
		$fromEmail = "grandeconsultation.fr <admin@grandeconsultation.fr>";
		$toEmail = "ncurtelin@gmail.com";
		//$toEmail = "tprokop@prothomsoft.com";
		$subject  = "Surveys user account was removed by user.";

		$messageContent = "<p style=\"font-size:18px\">Surveys user account was removed by user <br/><br/></p>"; 
		// tresc wiadomosci

		$messageContent .= "User details:<br/>";
		$messageContent .= "<b>Email: </b>".$objUserBean->getEmail()."<br/>";
				
		$mail = new Rmail();
    	$mail->setFrom($fromEmail); 
    	$mail->setSubject($subject);
	    $mail->setHTML($messageContent);
    	$result = $mail->send(array($toEmail));
		
		$objUserBean = $objUserDao->delete($userId);
		
		header("Location: ".$SN."removeAccountConfirmation.html");
	}
   
   function updateRecord(&$event) {
    	$userId = $event->getArg('userId');
    	
		$objUserDao = new UserDao();
		$objUserBean = new UserBean();
		$objUserBean = $objUserDao->read($userId);
		
    	$objUserBean->setEmail($event->getArg('email'));
    	$objUserBean->setPassword($event->getArg('password'));
    	$objUserBean->setNameFirst($event->getArg('nameFirst'));
		$objUserBean->setNameLast($event->getArg('nameLast'));
		$objUserBean->setStreet($event->getArg('street'));
		$objUserBean->setNumber($event->getArg('number'));
		$objUserBean->setZip($event->getArg('zip'));
		$objUserBean->setCity($event->getArg('city'));
		$objUserBean->setPhone1($event->getArg('phone1'));
		$objUserBean->setInfo($event->getArg('info'));
		$objUserBean->setTesterStatus($event->getArg('testerStatus'));
		$objUserBean->setTesterDate($event->getArg('testerDate'));
		$objUserBean->setCompanyName($event->getArg('companyName'));
		$objUserBean->setNipPL($event->getArg('nipPL'));
		
		if($event->getArg("Regon") == 1) {
			$objUserBean->setRegon(1);
		} else {
			$objUserBean->setRegon(0);
		}
		
		
		$objUserDao->update($objUserBean);
		
		$objRightsUserDao = new RightsUserDao();
		$objRightsUserDao->deleteByUser($userId);
		if($userId == 3) {
			$userRightId = 1;
		} else {
			$userRightId = 2;
		}
		$objRightsUserBean = new RightsUserBean();
		$objRightsUserBean->setRightsId($userRightId);
		$objRightsUserBean->setUserId($userId);
		$objRightsUserDao->create($objRightsUserBean);
		    	    
    }
    
    function setFieldsForUpdate(&$event){
    	$objUserDao = new UserDao();
    	$objUser = $objUserDao->read($event->getArg('userId'));

		if (!$event->isArgDefined('email')) {
    		$email = $objUser->getEmail();
    		$event->setArg('email',$email);
    	}
    	if (!$event->isArgDefined('password')) {
    		$password = $objUser->getPassword();
    		$event->setArg('password',$password);
    	}
    	if (!$event->isArgDefined('nameFirst')) {
    		$nameFirst = $objUser->getNameFirst();
    		$event->setArg('nameFirst',$nameFirst);
    	}
    	if (!$event->isArgDefined('nameLast')) {
    		$nameLast = $objUser->getNameLast();
    		$event->setArg('nameLast',$nameLast);
    	}
    	if (!$event->isArgDefined('street')) {
    		$street = $objUser->getstreet();
    		$event->setArg('street',$street);
    	}
    	if (!$event->isArgDefined('number')) {
    		$number = $objUser->getnumber();
    		$event->setArg('number',$number);
    	}
    	if (!$event->isArgDefined('zip')) {
    		$zip = $objUser->getzip();
    		$event->setArg('zip',$zip);
    	}
    	if (!$event->isArgDefined('city')) {
    		$city = $objUser->getcity();
    		$event->setArg('city',$city);
    	}
    	if (!$event->isArgDefined('phone1')) {
    		$phone1 = $objUser->getPhone1();
    		$event->setArg('phone1',$phone1);
    	}
    	if (!$event->isArgDefined('phone2')) {
    		$phone2 = $objUser->getPhone2();
    		$event->setArg('phone2',$phone2);
    	}
    	if (!$event->isArgDefined('website1')) {
    		$website1 = $objUser->getWebsite1();
    		$event->setArg('website1',$website1);
    	}
    	if (!$event->isArgDefined('info')) {
    		$info = $objUser->getInfo();
    		$event->setArg('info',$info);
    	}
    	if (!$event->isArgDefined('testerStatus')) {
    		$testerStatus = $objUser->gettesterStatus();
    		$event->setArg('testerStatus',$testerStatus);
    	}
    	if (!$event->isArgDefined('testerDate')) {
    		$testerDate = $objUser->gettesterDate();
    		$event->setArg('testerDate',$testerDate);
    	}    	
    	if (!$event->isArgDefined('companyName')) {
    		$companyName = $objUser->getcompanyName();
    		$event->setArg('companyName',$companyName);
    	}
    	if (!$event->isArgDefined('nipPL')) {
    		$nipPL = $objUser->getnipPL();
    		$event->setArg('nipPL',$nipPL);
    	}
    	
    	if (!$event->isArgDefined('Regon')) {
    		$Regon = $objUser->getRegon();
    		$event->setArg('Regon',$Regon);
    	}
    	
    	if (!$event->isArgDefined('updateDate')) {
    		$updateDate = $objUser->getUpdateDate();
    		$event->setArg('updateDate',$updateDate);
    	}
    	
    	
    	$createDate = $objUser->getCreateDate();
    	$event->setArg('createDate',$createDate);
    	
    	
    }
    
    function removeRecord(&$event) {
    	$userId = $event->getArg('userId');
    	
		$objUserDao = new UserDao();
		$objUserBean = new UserBean();
		$objUserBean = $objUserDao->delete($userId);
		
		$objRightsUserDao = new RightsUserDao();
		$objRightsUserDao->deleteByUser($userId);
		    	    	    
    }
    
    function findAll(&$event) {
		$objUserGateway = new UserGateway();
		$arrAllUsers = $objUserGateway->findAll();
		$event->setArg("arrAllUsers", $arrAllUsers);
	}
	
	function findById(&$event) {
		$userId = $event->getArg("UserId");
		$objUserDao = new UserDao();
		$objUser = $objUserDao ->read($userId);
		$event->setArg("objUser", $objUser);
	}
	
	function executeTester(&$event){	
		$objUserDao = new UserDao();
		$objUserBean=new UserBean();
		
		$objAppSession = new AppSession();
    	$objUser = $objAppSession->getSession("User");
		$userId = $objUser->getUserId();
		$objUserBean = $objUserDao->read($userId);
		$email = $objUserBean->getEmail();


		$tester4ry = "";		
		if($event->getArg("tester")== "qe00") {
			$tester4ry = "Nie wybrałaś/łeś testera z kolekcji Cztery Żywioły";
		}
		if($event->getArg("tester")== "qe01") {
			$tester4ry = "Deserto di Fuoco";
		}
		if($event->getArg("tester")== "qe02") {
			$tester4ry = "Tesoro del Oceano";
		}
		if($event->getArg("tester")== "qe03") {
			$tester4ry = "Liberta";
		}			
		if($event->getArg("tester")== "qe04") {
			$tester4ry = "Grande Albero";
		}
		if($event->getArg("tester")== "qe05") {
			$tester4ry = "Calore";
		}	
		if($event->getArg("tester")== "qe06") {
			$tester4ry = "Grande Onda";
		}			
		if($event->getArg("tester")== "qe07") {
			$tester4ry = "Forte Vento";
		}			
		if($event->getArg("tester")== "qe08") {
			$tester4ry = "Fiore Bianco";
		}			
		if($event->getArg("tester")== "qe09") {
			$tester4ry = "Potere Rosso";
		}			
		if($event->getArg("tester")== "qe10") {
			$tester4ry = "Ristoro";
		}			
		if($event->getArg("tester")== "qe11") {
			$tester4ry = "Spazio";
		}			
		if($event->getArg("tester")== "qe12") {
			$tester4ry = "Terra Nera";
		}			
		if($event->getArg("tester")== "qe13") {
			$tester4ry = "Diavolo";
		}			
		if($event->getArg("tester")== "qe14") {
			$tester4ry = "Purezza";
		}			
		if($event->getArg("tester")== "qe15") {
			$tester4ry = "Paradiso";
		}						
		if($event->getArg("tester")== "qe16") {
			$tester4ry = "Torrido Vampa";
		}				
			
			
		$dostawa = "";
		$oplata = "0";	
		
		$doplata1 = "5.00";		
		if($event->getArg("perfumetka1") == "nie wybrano") {
			$doplata1 = "0.00";					
		}		
		
		$doplata2 = "5.00";		
		if($event->getArg("perfumetka2") == "nie wybrano") {
			$doplata2 = "0.00";	
			$perfumetka24ry = "nie wybrano";				
		}
		
		if($event->getArg("perfumetka2")== "qe01") {
			$perfumetka24ry = "Deserto di Fuoco";
		}
		if($event->getArg("perfumetka2")== "qe02") {
			$perfumetka24ry = "Tesoro del Oceano";
		}
		if($event->getArg("perfumetka2")== "qe03") {
			$perfumetka24ry = "Liberta";
		}			
		if($event->getArg("perfumetka2")== "qe04") {
			$perfumetka24ry = "Grande Albero";
		}
		if($event->getArg("perfumetka2")== "qe05") {
			$perfumetka24ry = "Calore";
		}	
		if($event->getArg("perfumetka2")== "qe06") {
			$perfumetka24ry = "Grande Onda";
		}			
		if($event->getArg("perfumetka2")== "qe07") {
			$perfumetka24ry = "Forte Vento";
		}			
		if($event->getArg("perfumetka2")== "qe08") {
			$perfumetka24ry = "Fiore Bianco";
		}			
		if($event->getArg("perfumetka2")== "qe09") {
			$perfumetka24ry = "Potere Rosso";
		}			
		if($event->getArg("perfumetka2")== "qe10") {
			$perfumetka24ry = "Ristoro";
		}			
		if($event->getArg("perfumetka2")== "qe11") {
			$perfumetka24ry = "Spazio";
		}			
		if($event->getArg("perfumetka2")== "qe12") {
			$perfumetka24ry = "Terra Nera";
		}			
		if($event->getArg("perfumetka2")== "qe13") {
			$perfumetka24ry = "Diavolo";
		}			
		if($event->getArg("perfumetka2")== "qe14") {
			$perfumetka24ry = "Purezza";
		}			
		if($event->getArg("perfumetka2")== "qe15") {
			$perfumetka24ry = "Paradiso";
		}						
		if($event->getArg("perfumetka2")== "qe16") {
			$perfumetka24ry = "Torrido Vampa";
		}	
		

		if($event->getArg("pakiet") == 1) {
			$dostawa = "Wybrałaś przesyłkę listem poleconym ekonomicznym - prosimy o wpłatę na nasze konto. <br />Pakiet promocyjny zostanie wysłany do 3 dni roboczych po zaksięgowaniu wpłaty";	
			$dostawa .= "<br /><br />Dane ewidencyjne";	
			$dostawa .= "<br />FHU Skalar";	
			$dostawa .= "<br />31-416 Kraków, ul. Dobrego Pasterza 64";	
			$dostawa .= "<br />Nr konta - MBank : 12 1140 2004 0000 3302 7026 3049";	
			$dostawa .= "<br />Tytuł przelewu: Zestaw promocyjny ";	
			$dostawa .=  " ".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";	
			$oplata = "4.20";						
		}
		if($event->getArg("pakiet") == 2) {		
			$dostawa = "Wybrałaś przesyłkę listem poleconym priorytetowym - prosimy o wpłatę na nasze konto. <br />Pakiet promocyjny zostanie wysłany do 3 dni roboczych po zaksięgowaniu wpłaty";
			$dostawa .= "<br /><br />Dane ewidencyjne";	
			$dostawa .= "<br />FHU Skalar";	
			$dostawa .= "<br />31-416 Kraków, ul. Dobrego Pasterza 64";	
			$dostawa .= "<br />Nr konta - MBank : 12 1140 2004 0000 3302 7026 3049";	
			$dostawa .= "<br />Tytuł przelewu: Zestaw promocyjny ";	
			$dostawa .=  " ".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
			$oplata = "5.20";							
			
		}
		if($event->getArg("pakiet") == 3) {
			$dostawa = "Wybrałaś przesyłkę za pobraniem. Pakiet promocyjny zostanie wysłany do 3 dni roboczych od dnia dzisiejszego. <strong>Płatność przy odbiorze u listonosza.</strong> Przesyłkę wysyłamy po potwierdzeniu telefonicznym.";
			$dostawa .= "<br/>W przypadku braku możliwości kontaktu zamówienie zostanie anulowane.";
			$oplata = "10.50";	
		}
		if($event->getArg("pakiet") == 4) {
			$dostawa = "Wybrałaś odbiór osobisty w punkcie: Kraków, Dobrego Pasterza 64";
			$oplata = "0.00";	
		}
	

 		$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
		$toEmail = 'sklep@close2you.pl';
		$subject  = "".$email." - zestaw promocyjny";	
		// ustawienie fontow
		$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		// tytuł
		$messageContent .= "<p style=\"font-size:18px\">Dziękujemy za zamówienie zestawu promocyjnego perfum Close2you.pl<br /></p>"; 
		// tresc wiadomosci
		$messageContent .= "<br />";
    	$messageContent .= "<br />Adres email: <a href=\"mailto:".$email."\">".$email."</a>";		
		$messageContent .= "<br />Adres wysyłkowy:";
		$messageContent .= "<br />".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
		$messageContent .= "<br />".$event->getArg("street")." ".$event->getArg("number")."";
		$messageContent .= "<br />".$event->getArg("zip")." ".$event->getArg("city")."";
		$messageContent .= "<br />Telefon: ".$event->getArg("phone1")."";
		$messageContent .= "<br />Tester Cztery Żywioły: ".$tester4ry."";
		$messageContent .= "<br />Dodatkowa perfumetka Close2you: ".$event->getArg("perfumetka1")."";
		$messageContent .= "<br />Dodatkowa perfumetka Cztery Żywioły: ".$perfumetka24ry."";
		$messageContent .= "<br />Opłata za przesyłkę: ".$oplata."";				
		$messageContent .= "<br />Całkowita kwota do zapłaty: ".number_format($oplata +$doplata1 + $doplata2,2)."";			
		$messageContent .= "<br /><br />Forma płatności i sposób dostawy: ".$dostawa."";			
		$messageContent .= "<br />";
		$messageContent .= "<br />";
		$messageContent .= "<br />--------------------test-----------------------";		
		$messageContent .= "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";
		$messageContent .= "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
		$messageContent .= "<br /><br /><br />";
		// ustawienie fontow
		$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		// tytuł
		$messageContent .= "<p style=\"font-size:18px\">Dziękujemy za zamówienie zestawu promocyjnego perfum Close2you.pl<br /></p>"; 
		// tresc wiadomosci
		$messageContent .= "Potwierdzenie otrzymania wiadomości od ".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
		
		$messageContent .= "<br />Adres email: ".$email."";	
		$messageContent .= "<br /><br />Adres wysyłkowy:";
		$messageContent .= "<br />".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
		$messageContent .= "<br />".$event->getArg("street")." ".$event->getArg("number")."";
		$messageContent .= "<br />".$event->getArg("zip")." ".$event->getArg("city")."";
		$messageContent .= "<br />Telefon: ".$event->getArg("phone1")."";	
		$messageContent .= "<br /><br />Zamówiono pakiet promocyjny zawierający:";	
		$messageContent .= "<br />Zestaw testerów o pojemności 1ml tzw \"szpilek\" perfum Close2you - 5 zapachów damskich i 2 męskie (Ines, Mia, Amelia, Luna, Leila, Noah i Noah Sport).";			
		$messageContent .= "<br />Tester Cztery Żywioły: ".$tester4ry."";
		$messageContent .= "<br />Dodatkowa perfumetka Close2you: ".$event->getArg("perfumetka1")."";
		$messageContent .= "<br />Dodatkowa perfumetka Cztery Żywioły: ".$perfumetka24ry."";
		$messageContent .= "<br />Kupon rabatowy na darmową przesyłkę ważny 7 dni od daty aktywacji";		
		$messageContent .= "<br /><br />Opłata za przesyłkę: ".$oplata."";				
		$messageContent .= "<br /><strong>Całkowita kwota do zapłaty: ".number_format($oplata +$doplata1 + $doplata2,2)."</strong>";				
		$messageContent .= "<br /><br />Forma płatności i sposób dostawy: ".$dostawa."";
		
		
		$messageContent .= "<br /><br /><br /><br />";
		
		$messageContent .= "<a href=\"http://close2you.pl\" <img border=\"0\" src=\"http://www.close2you.pl/images/Email/kontakt_promocyjny.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" /></a> ";
		$messageContent .= "<br /><br />";	
		$messageContent .= "<a href=\"http://close2you.pl/facebook_close2you.html\" <img border=\"0\" src=\"http://www.close2you.pl/images/Email/kontakt_promocyjny1.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" /></a> ";
		$messageContent .= "<br />";			
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
		$messageContent .= "<br />--------------------test-----------------------";		
		
		
		
		// footer wiadomosci

		
		
		$mail = new Rmail();
    	$mail->setFrom($fromEmail);
    	$mail->setSubject($subject);
	    $mail->setHTML($messageContent);
    	$result = $mail->send(array($toEmail));
		
		
		
		// email do klienta
		$fromEmail = "Close2you.pl - perfumy <sklep@close2you.pl>";
		$toEmail = $email;
		$subject  = 'Close2you.pl - wypróbuj nasze perfumy';
		// logo
		$messageContent = "Wyświetl obrazki aby poprawnie odczytać wiadomość<br />";
		$messageContent .= "<img src=\"http://www.close2you.pl/images/logo.png\" alt=\"Logo Close2you.pl - Perfumy najbliżej Ciebie\" />";
		$messageContent .= "<br /><br /><br />";
		// ustawienie fontow
		$messageContent .= "<body style=\"font-family:Arial, Helvetica, sans-serif;"; 
		$messageContent .= "color:#5d5d5d;"; 
		$messageContent .= "font-size:14px\">";	  
		// tytuł
		$messageContent .= "<p style=\"font-size:18px\">Dziękujemy za zamówienie zestawu promocyjnego perfum Close2you.pl<br /></p>"; 
		// tresc wiadomosci
		$messageContent .= "Potwierdzenie otrzymania wiadomości od ".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
		
		$messageContent .= "<br />Adres email: ".$email."";	
		$messageContent .= "<br /><br />Adres wysyłkowy:";
		$messageContent .= "<br />".$event->getArg("nameFirst")." ".$event->getArg("nameLast")."";
		$messageContent .= "<br />".$event->getArg("street")." ".$event->getArg("number")."";
		$messageContent .= "<br />".$event->getArg("zip")." ".$event->getArg("city")."";
		$messageContent .= "<br />Telefon: ".$event->getArg("phone1")."";	
		$messageContent .= "<br /><br />Zamówiono pakiet promocyjny zawierający:";	
		$messageContent .= "<br />Zestaw testerów o pojemności 1ml tzw \"szpilek\" perfum Close2you - 5 zapachów damskich i 2 męskie (Ines, Mia, Amelia, Luna, Leila, Noah i Noah Sport).";			
		$messageContent .= "<br />Tester Cztery Żywioły: ".$tester4ry."";
		$messageContent .= "<br />Dodatkowa perfumetka Close2you: ".$event->getArg("perfumetka1")."";
		$messageContent .= "<br />Dodatkowa perfumetka Cztery Żywioły: ".$perfumetka24ry."";
		$messageContent .= "<br />Kupon rabatowy na darmową przesyłkę ważny 7 dni od daty aktywacji";		
		$messageContent .= "<br /><br />Opłata za przesyłkę: ".$oplata."";				
		$messageContent .= "<br /><strong>Całkowita kwota do zapłaty: ".number_format($oplata +$doplata1 + $doplata2,2)."</strong>";				
		$messageContent .= "<br /><br />Forma płatności i sposób dostawy: ".$dostawa."";
		
		
		$messageContent .= "<br /><br /><br /><br />";
		
		$messageContent .= "<a href=\"http://close2you.pl\" <img border=\"0\" src=\"http://www.close2you.pl/images/Email/kontakt_promocyjny.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" /></a> ";
		$messageContent .= "<br /><br />";	
		$messageContent .= "<a href=\"http://close2you.pl/facebook_close2you.html\" <img border=\"0\" src=\"http://www.close2you.pl/images/Email/kontakt_promocyjny1.jpg\" alt=\"Drogeria Close2you.pl -  Perfumy najbliżej Ciebie\" /></a> ";
		$messageContent .= "<br />";			
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
    	
    	// zmieniam też pola TesterStatus i TesterDate w tabeli User
    	
		$objUserBean->setTesterStatus(1);
		$date = date('Y-m-d');
		$objUserBean->setTesterDate($date);
		$objUserDao->update($objUserBean);
					
	}

    function findAllDateName(&$event) {
		$objUserGateway = new UserGateway();
		$arrAllDateNames = $objUserGateway->findAllDateName();
		$event->setArg("arrAllDateNames", $arrAllDateNames);

	}

	function changeDetails(&$event) {
		
		$objAppSession = new AppSession();
		$objUser = $objAppSession->getSession("User");
		
    	$userId = $objUser->getUserId();
    	
		$objUserDao = new UserDao();
		$objUserBean = new UserBean();
		$objUserBean = $objUserDao->read($userId);
		
		$phone1 = $event->getArg("phone1");
		$website1 = $event->getArg("website1");
		$phone2 = $event->getArg("phone2");
		
		$objUserBean->setPhone1($phone1);
		$objUserBean->setWebsite1($website1);
		$objUserBean->setPhone2($phone2);
		$objUserDao->update($objUserBean);
		header("Location: ".$SN."changeDetailsConfirmation.html");
	}
	
	function getDetails(&$event) {
		$objAppSession = new AppSession();
		$objUser = $objAppSession->getSession("User");
		
		$userId = $objUser->getUserId();
		$objUserDao = new UserDao();
		$objUser = $objUserDao->read($userId);
		
		$event->setArg("objUser", $objUser);
	}
	
	
    
}

?>
