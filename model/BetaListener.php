<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("BetaGateway.inc.php");
require_once("BetaDao.inc.php");
require_once("BetaBean.inc.php");

require_once("BetaPictureGateway.inc.php");
require_once("BetaPictureDao.inc.php");
require_once("BetaPictureBean.inc.php");

class model_BetaListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('BetaId', 'ImgDriveName', 'Name', 'SeoName', 'ClubId', 'BetaOrder');
		$sIndexColumn = "BetaId";
		
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
			FROM   Beta
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
			FROM   Beta
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
				
				$BetaId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$ClubId = $aRow[4];
				$BetaOrder = $aRow[5];
				
				if ( $aColumns[$i] == "ImgDriveName") {
					if($ImgDriveName != "") {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/upload/micro/'.$ImgDriveName.'\"></td></tr></table>",';	
					} else {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/images/hotel.jpg\"></td></tr></table>",';
					}
				} else if ($aColumns[$i] == "Name"){
					$responseJSON .= '"<strong>'.$Name.'</strong>",';
				} else if ($aColumns[$i] == "ClubId"){
					
					if($ClubId == 1) {$value = "Architektura";} 
					if($ClubId == 2) {$value = "Przyroda";}
					if($ClubId == 3) {$value = "San";}
					if($ClubId == 4) {$value = "Wydarzenia";}
					if($ClubId == 5) {$value = "Inne";}
					
					$responseJSON .= '"'.$value.'",';
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showBetaStep1&BetaId='.$BetaId.'\">Edytuj</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveBetaAction&BetaId='.$BetaId.'\" onclick=\"return confirm(\'Czy na pewno chcesz usunąć ten rekord?\')\">Usuń</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$BetaId = $event->getArg('BetaId');
   		$objBetaBean = new BetaBean();
		$objBetaDao = new BetaDao();
		
		if ($BetaId == "") {
			// we need to create empty BetaId
			$BetaId = $objBetaDao->create($objBetaBean);
			$event->setArg('BetaId', $BetaId);	
		}
		
		$objBetaBean = $objBetaDao->read($BetaId);
		
		$today = date("Y-m-d");
      	$objBetaBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objBetaBean->setStatus($Status);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objBetaBean->setStatus($Status);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getStatus() != "") {
			$Status = $objBetaBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// ClubId ---------->
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') != "") {
			$ClubId = $event->getArg('ClubId');
			$objBetaBean->setClubId($ClubId);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') == "") {
			$ClubId = "0";
			$objBetaBean->setClubId($ClubId);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getClubId() != "") {
			$ClubId = $objBetaBean->getClubId(); 
			$event->setArg('ClubId', $ClubId);
		}
		
		// GamaId ---------->
		if($event->isArgDefined('GamaId') && $event->getArg('GamaId') != "") {
			$GamaId = $event->getArg('GamaId');
			$objBetaBean->setGamaId($GamaId);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('GamaId') && $event->getArg('GamaId') == "") {
			$GamaId = "0";
			$objBetaBean->setGamaId($GamaId);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getGamaId() != "") {
			$GamaId = $objBetaBean->getGamaId(); 
			$event->setArg('GamaId', $GamaId);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objBetaBean->setSeoName($objClearUrl->clear());
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objBetaBean->setName($name);
			$objBetaBean->setSeoName($name);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getName() != "") {
			$name = $objBetaBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setKeyword($Keyword);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objBetaBean->setKeyword($Keyword);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getKeyword() != "") {
			$Keyword = $objBetaBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setDescription($Description);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objBetaBean->setDescription($Description);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getDescription() != "") {
			$Description = $objBetaBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// EventDate ---------->
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') != "") {
			$EventDate = htmlspecialchars(trim($event->getArg('EventDate')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setEventDate($EventDate);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') == "") {
			$EventDate = "";
			$objBetaBean->setEventDate($EventDate);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getEventDate() != "") {
			$EventDate = $objBetaBean->getEventDate();
			$event->setArg('EventDate', $EventDate);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setShortDescription($ShortDescription);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objBetaBean->setShortDescription($ShortDescription);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getShortDescription() != "") {
			$ShortDescription = $objBetaBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objBetaBean->setLongDescription($longDescription);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objBetaBean->setLongDescription($LongDescription);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getLongDescription() != "") {
			$LongDescription = $objBetaBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 BetaOrder---------->
		if($event->isArgDefined('BetaOrder') && $event->getArg('BetaOrder') != "") {
			$BetaOrder = $event->getArg('BetaOrder');
			$objBetaBean->setBetaOrder($BetaOrder);
			$objBetaDao->update($objBetaBean);						
		}
		if($event->isArgDefined('BetaOrder') && $event->getArg('BetaOrder') == "") {
			$BetaOrder = "";
			$objBetaBean->setBetaOrder($BetaOrder);
			$objBetaDao->update($objBetaBean);
		}
		if($objBetaBean->getBetaOrder() != "") {
			$BetaOrder = $objBetaBean->getBetaOrder(); 
			$event->setArg('BetaOrder', $BetaOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$BetaId = $event->getArg('BetaId');
    	$objBetaDao = new BetaDao();
		$objBetaBean = new BetaBean();
		$objBetaBean = $objBetaDao->delete($BetaId);    	    	    
    }
    
	function findAll(&$event) {
		$objBetaGateway = new BetaGateway();
		$arrBetas = $objBetaGateway->findAll();
		$event->setArg("arrBetas", $arrBetas);
	}
	
	function findLatest(&$event) {
    	$objBetaGateway = new BetaGateway();
		$arrBetas = $objBetaGateway->findLatest();
		$event->setArg('arrBetaLatest',$arrBetas);
   }
	
	function getMaxBetaOrder(&$event) {
    	$objBetaGateway = new BetaGateway();
    	$maxBetaOrder = $objBetaGateway->getMaxBetaOrder();
    	$event->setArg('maxBetaOrder',$maxBetaOrder);
    }
    
    function findById(&$event)	{
		$id = $event->getArg('id1');
		$objBetaDao = new BetaDao();
		$objBeta = $objBetaDao->read($id);
      	$event->setArg('objBeta',$objBeta);
	}
	
	function findHomePageDetails(&$event)	{
		$id = 1;
		$objBetaDao = new BetaDao();
		$objBeta = $objBetaDao->read($id);
      	$event->setArg('objBeta',$objBeta);
	}
	
	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objBetaGateway = new BetaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$clubId = $event->getArg('id2');
    	$gamaId = $event->getArg('id3');
    	 
		$arrBeta = $objBetaGateway->findAll();
		$i=1;
		if ($arrBeta) {
			foreach ($arrBeta as $objBeta) {
	       		$arrIds[$i] = $objBeta->getBetaId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getListNavigation(&$event) {
		if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}
	 	
     	$arrQueue = $event->getArg('arrQueue');
		$nBetas = count($arrQueue);
		$objPagination = new pagination($nBetas,10); 
    	$arrPagination = $objPagination->paginate("BetaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objBetaGateway = new BetaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$clubId = $event->getArg('id2');
    	$gamaId = $event->getArg('id3');
    	
    	$arrBetas = $objBetaGateway->findAllLimited($arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrBetas',$arrBetas);	
	}
}
?>