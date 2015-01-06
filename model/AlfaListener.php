<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("AlfaGateway.inc.php");
require_once("AlfaDao.inc.php");
require_once("AlfaBean.inc.php");

require_once("AlfaPictureGateway.inc.php");
require_once("AlfaPictureDao.inc.php");
require_once("AlfaPictureBean.inc.php");

class model_AlfaListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('AlfaId', 'ImgDriveName', 'Name', 'SeoName', 'ClubId', 'AlfaOrder');
		$sIndexColumn = "AlfaId";
		
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
			FROM   Alfa
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
			FROM   Alfa
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
				
				$AlfaId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$ClubId = $aRow[4];
				$AlfaOrder = $aRow[5];
				
				if ( $aColumns[$i] == "ImgDriveName") {
					if($ImgDriveName != "") {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/upload/micro/'.$ImgDriveName.'\"></td></tr></table>",';	
					} else {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/images/hotel.jpg\"></td></tr></table>",';
					}
				} else if ($aColumns[$i] == "Name"){
					$responseJSON .= '"<strong>'.$Name.'</strong>",';
				} else if ($aColumns[$i] == "ClubId"){
					
					// get the club by ID
					$objClubDao = new ClubDao();
					$objClub = $objClubDao->read($ClubId);
					
					$responseJSON .= '"'.$objClub->getName().'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showAlfaStep1&AlfaId='.$AlfaId.'\">Edytuj</a><br/><br/>';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveAlfaAction&AlfaId='.$AlfaId.'\" onclick=\"return confirm(\'Czy na pewno chcesz usunąć ten rekord?\')\">Usuń</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getEventCalendarData(&$event) {
	
			$month = $event->getArg("month");
			$year = $event->getArg("year");
			
			$objAlfaGateway = new AlfaGateway();
			$arrAlfas = $objAlfaGateway->findInCurrentMonth($month, $year);
			
			//echo count($arrAlfas);
			
			
			$responseJSON = '{';
			$responseJSON .= '"entries": [';
			
			if ($arrAlfas) {
			foreach ($arrAlfas as $objAlfa) {
			
				$responseJSON .= '{';
			    $responseJSON .= '"id": '.$objAlfa->getAlfaId().',';
			    
			    $title = htmlspecialchars_decode($objAlfa->getName());
			    $title = $content = preg_replace("/[\"]/", "''", $title);
			    
			    $responseJSON .= '"title": "'.$title.'",';
			    $responseJSON .= '"date": "'.$objAlfa->getEventDate().'",';
			    
			    $content = htmlspecialchars_decode($objAlfa->getShortDescription());
			    $content = preg_replace("/[\"]/", "''", $content);
			    
			    $responseJSON .= '"content": "'.$content.'",';
			    $responseJSON .= '"start": "'.$objAlfa->getEventCalendar().'",';
			    $responseJSON .= '"finish": "'.$objAlfa->getEventCalendar().'"';
			    $responseJSON .= '},';
			    }
			 }
			 
			 $responseJSON = substr_replace($responseJSON,"",-1);
			
			
			$responseJSON .= ']';
			$responseJSON .= '}';
			
			
			$event->setArg('responseJSON', $responseJSON);
    
	
	
	}
   
	function checkId(&$event){
   		$AlfaId = $event->getArg('AlfaId');
   		$objAlfaBean = new AlfaBean();
		$objAlfaDao = new AlfaDao();
		
		if ($AlfaId == "") {
			// we need to create empty AlfaId
			$AlfaId = $objAlfaDao->create($objAlfaBean);
			$event->setArg('AlfaId', $AlfaId);	
		}
		
		$objAlfaBean = $objAlfaDao->read($AlfaId);
		
		$today = date("Y-m-d");
      	$objAlfaBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objAlfaBean->setStatus($Status);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objAlfaBean->setStatus($Status);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getStatus() != "") {
			$Status = $objAlfaBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// ClubId ---------->
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') != "") {
			$ClubId = $event->getArg('ClubId');
			$objAlfaBean->setClubId($ClubId);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') == "") {
			$ClubId = "0";
			$objAlfaBean->setClubId($ClubId);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getClubId() != "") {
			$ClubId = $objAlfaBean->getClubId(); 
			$event->setArg('ClubId', $ClubId);
		}
		
		// YouTube ---------->
		if($event->isArgDefined('YouTube') && $event->getArg('YouTube') != "") {
			$YouTube = htmlspecialchars(trim($event->getArg('YouTube')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setYouTube($YouTube);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('YouTube') && $event->getArg('YouTube') == "") {
			$YouTube = "";
			$objAlfaBean->setYouTube($YouTube);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getYouTube() != "") {
			$YouTube = $objAlfaBean->getYouTube();
			$event->setArg('YouTube', $YouTube);
		}
		
		// BetaId ---------->
		if($event->isArgDefined('BetaId') && $event->getArg('BetaId') != "") {
			$BetaId = $event->getArg('BetaId');
			$objAlfaBean->setBetaId($BetaId);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('BetaId') && $event->getArg('BetaId') == "") {
			$BetaId = "0";
			$objAlfaBean->setBetaId($BetaId);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getBetaId() != "") {
			$BetaId = $objAlfaBean->getBetaId(); 
			$event->setArg('BetaId', $BetaId);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objAlfaBean->setSeoName($objClearUrl->clear());
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objAlfaBean->setName($name);
			$objAlfaBean->setSeoName($name);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getName() != "") {
			$name = $objAlfaBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setKeyword($Keyword);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objAlfaBean->setKeyword($Keyword);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getKeyword() != "") {
			$Keyword = $objAlfaBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setDescription($Description);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objAlfaBean->setDescription($Description);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getDescription() != "") {
			$Description = $objAlfaBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// EventDate ---------->
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') != "") {
			$EventDate = htmlspecialchars(trim($event->getArg('EventDate')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setEventDate($EventDate);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') == "") {
			$EventDate = "";
			$objAlfaBean->setEventDate($EventDate);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getEventDate() != "") {
			$EventDate = $objAlfaBean->getEventDate();
			$event->setArg('EventDate', $EventDate);
		}
		
		// EventCalendar ---------->
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') != "") {
			$EventCalendar = htmlspecialchars(trim($event->getArg('EventCalendar')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setEventCalendar($EventCalendar);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') == "") {
			$EventCalendar = "";
			$objAlfaBean->setEventCalendar($EventCalendar);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getEventCalendar() != "") {
			$EventCalendar = $objAlfaBean->getEventCalendar();
			$event->setArg('EventCalendar', $EventCalendar);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setShortDescription($ShortDescription);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objAlfaBean->setShortDescription($ShortDescription);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getShortDescription() != "") {
			$ShortDescription = $objAlfaBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// VeryShortDescription ---------->
		if($event->isArgDefined('VeryShortDescription') && $event->getArg('VeryShortDescription') != "") {
			$VeryShortDescription = htmlspecialchars(trim($event->getArg('VeryShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setVeryShortDescription($VeryShortDescription);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('VeryShortDescription') && $event->getArg('VeryShortDescription') == "") {
			$VeryShortDescription = "";
			$objAlfaBean->setVeryShortDescription($VeryShortDescription);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getVeryShortDescription() != "") {
			$VeryShortDescription = $objAlfaBean->getVeryShortDescription();
			$event->setArg('VeryShortDescription', $VeryShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objAlfaBean->setLongDescription($longDescription);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objAlfaBean->setLongDescription($LongDescription);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getLongDescription() != "") {
			$LongDescription = $objAlfaBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 AlfaOrder---------->
		if($event->isArgDefined('AlfaOrder') && $event->getArg('AlfaOrder') != "") {
			$AlfaOrder = $event->getArg('AlfaOrder');
			$objAlfaBean->setAlfaOrder($AlfaOrder);
			$objAlfaDao->update($objAlfaBean);						
		}
		if($event->isArgDefined('AlfaOrder') && $event->getArg('AlfaOrder') == "") {
			$AlfaOrder = "";
			$objAlfaBean->setAlfaOrder($AlfaOrder);
			$objAlfaDao->update($objAlfaBean);
		}
		if($objAlfaBean->getAlfaOrder() != "") {
			$AlfaOrder = $objAlfaBean->getAlfaOrder(); 
			$event->setArg('AlfaOrder', $AlfaOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$AlfaId = $event->getArg('AlfaId');
    	$objAlfaDao = new AlfaDao();
		$objAlfaBean = new AlfaBean();
		$objAlfaBean = $objAlfaDao->delete($AlfaId);    	    	    
    }
    
    function findLatest(&$event) {
    	$objAlfaGateway = new AlfaGateway();
		$arrAlfas = $objAlfaGateway->findLatest();
		$event->setArg('arrAlfas',$arrAlfas);
   }
   
   function findInCurrentMonth(&$event) {
    	$objAlfaGateway = new AlfaGateway();
		$arrAlfas = $objAlfaGateway->findInCurrentMonth();
		$event->setArg('arrCurrentMonthAlfas',$arrAlfas);
   }
    
	function findAll(&$event) {
		
		$objAppSession=new AppSession();
		$sLang = $objAppSession->getSession('sLang');
		
		$objAlfaGateway = new AlfaGateway();
		$arrAlfas = $objAlfaGateway->findAll($sLang);
		$event->setArg("arrAlfas", $arrAlfas);
	}
	
	function getMaxAlfaOrder(&$event) {
    	$objAlfaGateway = new AlfaGateway();
    	$maxAlfaOrder = $objAlfaGateway->getMaxAlfaOrder();
    	$event->setArg('maxAlfaOrder',$maxAlfaOrder);
    }
    
    function findByItemSeo(&$event)	{
		$id = $event->getArg('id1');
		$objAlfaDao = new AlfaDao();
		$objAlfa = $objAlfaDao->read($id);
      	$event->setArg('objAlfa',$objAlfa);
	}
	
	// -- AKTUALNOSCI
	
	function getAktualnosciQueue(&$event) {
		$objAppSession = new AppSession();
    	$objAlfaGateway = new AlfaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$clubId = $event->getArg('id2');
    	$isArchived = $event->getArg('id3');
    	 
		$arrAlfa = $objAlfaGateway->findAktualnosciAll($clubId, $isArchived);
		$i=1;
		if ($arrAlfa) {
			foreach ($arrAlfa as $objAlfa) {
	       		$arrIds[$i] = $objAlfa->getAlfaId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getAktualnosciListNavigation(&$event) {
		if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}
      
     	$arrQueue = $event->getArg('arrQueue');
		$nAlfas = count($arrQueue);
		$objPagination = new pagination($nAlfas,10); 
    	$arrPagination = $objPagination->paginate("AlfaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getAktualnosciList(&$event){
		$objAppSession = new AppSession();
		$objAlfaGateway = new AlfaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$clubId = $event->getArg('id2');
    	$isArchived = $event->getArg('id3');
    	
    	$arrAlfas = $objAlfaGateway->findAktualnosciAllLimited($clubId, $isArchived,  $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrAlfasPage',$arrAlfas);	
	}
	
		// -- WYDARZENIA
	
	function getWydarzeniaQueue(&$event) {
		$objAppSession = new AppSession();
    	$objAlfaGateway = new AlfaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$categoryId = $event->getArg('id2');
    	 
		$arrAlfa = $objAlfaGateway->findWydarzeniaAll($categoryId);
		$i=1;
		if ($arrAlfa) {
			foreach ($arrAlfa as $objAlfa) {
	       		$arrIds[$i] = $objAlfa->getAlfaId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getWydarzeniaListNavigation(&$event) {
		if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}
      
     	$arrQueue = $event->getArg('arrQueue');
		$nAlfas = count($arrQueue);
		$objPagination = new pagination($nAlfas,10); 
    	$arrPagination = $objPagination->paginate("AlfaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getWydarzeniaList(&$event){
		$objAppSession = new AppSession();
		$objAlfaGateway = new AlfaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$categoryId = $event->getArg('id2');
    	
    	
    	$arrAlfas = $objAlfaGateway->findWydarzeniaAllLimited($categoryId, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrAlfas1',$arrAlfas);	
	}
	
	// Keyword search
	
	function getKeywordQueue(&$event) {
    	
    	$search_keyword = $event->getArg('search_keyword');
    	if($event->getArg('id2') != "") {
    		$search_keyword = $event->getArg('id2');
    	}
    	
		$objAppSession = new AppSession();
		$objAlfaGateway = new AlfaGateway();
		$arrAlfa = $objAlfaGateway->findKeywordAll($search_keyword);
    	
		$i=1;
		if ($arrAlfa['0']) {
			foreach ($arrAlfa as $objAlfa) {
	       		$arrIds[$i] = $objAlfa->getAlfaId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 
	
	function getKeywordListNavigation(&$event) {
		
		if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}
	 	
	 	$arrQueue = $event->getArg('arrQueue');
		$nAlfas = count($arrQueue); 
     	$objPagination = new pagination($nAlfas,7); 
    	$arrPagination = $objPagination->paginate("AlfaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  

   function getKeywordList(&$event){
		$objAppSession = new AppSession();
		$objAlfaGateway = new AlfaGateway();
		$arrPagination = $event->getArg('arrPagination');
		$search_keyword = $event->getArg('search_keyword');
		if($event->getArg('id2') != "") {
    		$search_keyword = $event->getArg('id2');
    	}
		$arrAlfas = $objAlfaGateway->findKeywordAllLimited($search_keyword,$arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);
    	$event->setArg('arrAlfas1',$arrAlfas);	
	}
	
	function removeEmptyRecords(&$event) {
   		$objAlfaDao = new AlfaDao();
		$objAlfaBean = new AlfaBean();
		$objAlfaDao->deleteEmptyRecords();				   	    
    }
	
}
?>