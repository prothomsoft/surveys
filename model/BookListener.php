<?php
require_once("components/session.inc.php");
require_once("components/Rmail.php");


require_once("BookBean.inc.php");
require_once("BookDao.inc.php");
require_once("BookGateway.inc.php");

require_once("SigmaBean.inc.php");
require_once("SigmaDao.inc.php");

class model_BookListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('BookId', 'FirstName', 'LastName', 'Email', 'CreateDate');
		$sIndexColumn = "BookId";
		
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
		$sWhere = "";
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Book
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
			FROM   Book
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
				
				$BookId = $aRow[0];
				$FirstName = $aRow[1];
				$LastName = $aRow[2];
				$Email = $aRow[3];
				$CreateDate = $aRow[4];
				
				if ($aColumns[$i] == "CreateDate") {
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showBookView&Book_id='.$BookId.'\">Details</a>';
			$responseJSON .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveBookAction&bookId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a> ';
			$responseJSON .= '<br/><a class=\"anchor_link\" href=\"index.php?event=executeAuthorizeBookAction&bookId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to approve this record?\')\">Approve</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
    	
    function addEmail(&$event) {
		
		$email = $event->getArg("email");
		
		$objBookBean = new BookBean();
		
		$date = date('Y-m-d');
		$objBookBean->setEmail($email);
		$objBookBean->setCreateDate($date);
		
		$objBookDao = new BookDao();
		$objBookDao->create($objBookBean);
	}
	
	function getById(&$event) {
		$BookId = $event->getArg("Book_id");
		
		$objBookDao = new BookDao();
		$objBookBean = $objBookDao->read($BookId);
		
		$SigmaId = $objBookBean->getSigmaId();
		$objSigmaDao = new SigmaDao();
		$objSigma = $objSigmaDao->read($SigmaId);
		
		$event->setArg("objSigma", $objSigma);
		$event->setArg("objBook", $objBookBean);
	}
	
	function getEntryId(&$event) {
		
		$SigmaId = $event->getArg("id1");
		$objSigmaDao = new SigmaDao();
		$objSigma = $objSigmaDao->read($SigmaId);
		
		$event->setArg("objSigma", $objSigma);
	}
	
	function saveBook(&$event) {
		$firstName = $event->getArg("firstName");
		$lastName = $event->getArg("lastName");
		$email = $event->getArg("email");
		$id1 = $event->getArg("id1");
		$companyName = $event->getArg("companyName");
		
		$objBookBean = new BookBean();
		$objBookBean->setFirstName($firstName);
		$objBookBean->setLastName($lastName);
		$objBookBean->setEmail($email);
		$objBookBean->setCity("0");
		$objBookBean->setCompanyName($companyName);
		$objBookBean->setSigmaId($id1);
		
		
		$date = date('Y-m-d');
		$objBookBean->setCreateDate($date);
		
		
		$objBookDao = new BookDao();
		$bookId = $objBookDao->create($objBookBean);
		
		
		$fromEmail = "Marius Sjoli <mariussj@gmail.com>";
		$toEmail = 'mariussj@gmail.com';
		$subject  = 'New Entry for Blog Comment';
		$messageContent = "First and Last Name: ".$firstName." ".$lastName."<br/>";
		$messageContent .= "Email: ".$email."<br />";
		$messageContent .= "Entry: ".$companyName."";
		$mail = new Rmail();
    	$mail->setFrom($fromEmail);
    	$mail->setSubject($subject);
	    $mail->setHTML($messageContent);
    	//$result = $mail->send(array($toEmail));
		
		
		$newEventArgs = &$event->getArgs();
		$this->announceEvent("news_comment_confirm", $newEventArgs);
	}
	
	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objBookGateway = new BookGateway();
    	
    	if (!$event->isArgDefined('id3')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id3');
    	}
    	$blogId = $event->getArg("id1");
    	 
		$arrBook = $objBookGateway->findAllAuthorized($blogId);
		$i=1;
		if ($arrBook) {
			foreach ($arrBook as $objBook) {
	       		$arrIds[$i] = $objBook->getBookId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getListNavigation(&$event) {
		if (!$event->isArgDefined('id3')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id3');
	 	}
      
     	$arrQueue = $event->getArg('arrQueue');
		$nBooks = count($arrQueue);
		$objPagination = new pagination($nBooks,6); 
    	$arrPagination = $objPagination->paginate("BookList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objBookGateway = new BookGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id3')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id3');
    	}
    	$blogId = $event->getArg("id1");
    	
    	$arrBooks = $objBookGateway->findAllAuthorizedLimited($blogId, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);
    	$event->setArg('arrBooks',$arrBooks);	
	}
	
	function findByCategoryId(&$event) {
		$categoryId = $event->getArg("id2");
		$objBookGateway = new BookGateway();
		$arrBooks = $objBookGateway->findByCategoryId($categoryId);
		$event->setArg("arrBooks", $arrBooks);
	}
	
	function removeRecord(&$event) {
    	$bookId = $event->getArg('bookId');
    	
		$objBookDao = new BookDao();
		$objBookBean = new BookBean();
		$objBookBean = $objBookDao->delete($bookId);
		    	    	    
    }
    
    function authorizeRecord(&$event) {
    	$bookId = $event->getArg('bookId');
    	$objBookDao = new BookDao();
		$objBookBean = new BookBean();
		$objBookBean = $objBookDao->read($bookId);
		$objBookBean->setCity("1");
		$objBookDao->update($objBookBean);    	    	    
    }
	
}
?>