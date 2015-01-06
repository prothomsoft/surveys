<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("DeltaGateway.inc.php");
require_once("DeltaDao.inc.php");
require_once("DeltaBean.inc.php");

require_once("DeltaPictureGateway.inc.php");
require_once("DeltaPictureDao.inc.php");
require_once("DeltaPictureBean.inc.php");

class model_DeltaListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('DeltaId', 'ImgDriveName', 'Name', 'SeoName', 'UpdateDate', 'DeltaOrder');
		$sIndexColumn = "DeltaId";
		
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
			FROM   Delta
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
			FROM   Delta
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
				
				$DeltaId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$UpdateDate = $aRow[4];
				$DeltaOrder = $aRow[5];
				
				if ( $aColumns[$i] == "ImgDriveName") {
					if($ImgDriveName != "") {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/upload/micro/'.$ImgDriveName.'\"></td></tr></table>",';	
					} else {
						$responseJSON .= '"<table border=\"0\"><tr><td width=\"200\" height=\"200\" valign=\"middle\"><img src=\"'.$SN.'/images/hotel.jpg\"></td></tr></table>",';
					}
				} else if ($aColumns[$i] == "Name"){
					$responseJSON .= '"<strong>'.$Name.'</strong>",';
				} else if ($aColumns[$i] == "UpdateDate"){
					$responseJSON .= '"'.substr($UpdateDate, 0, 10).'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showDeltaStep1&DeltaId='.$DeltaId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveDeltaAction&DeltaId='.$DeltaId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$DeltaId = $event->getArg('DeltaId');
   		$objDeltaBean = new DeltaBean();
		$objDeltaDao = new DeltaDao();
		
		if ($DeltaId == "") {
			// we need to create empty DeltaId
			$DeltaId = $objDeltaDao->create($objDeltaBean);
			$event->setArg('DeltaId', $DeltaId);	
		}
		
		$objDeltaBean = $objDeltaDao->read($DeltaId);
		
		$today = date("Y-m-d");
      	$objDeltaBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objDeltaBean->setStatus($Status);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objDeltaBean->setStatus($Status);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getStatus() != "") {
			$Status = $objDeltaBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// ClubId ---------->
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') != "") {
			$ClubId = $event->getArg('ClubId');
			$objDeltaBean->setClubId($ClubId);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') == "") {
			$ClubId = "0";
			$objDeltaBean->setClubId($ClubId);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getClubId() != "") {
			$ClubId = $objDeltaBean->getClubId(); 
			$event->setArg('ClubId', $ClubId);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars($event->getArg('Name'), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objDeltaBean->setSeoName($objClearUrl->clear());
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objDeltaBean->setName($name);
			$objDeltaBean->setSeoName($name);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getName() != "") {
			$name = $objDeltaBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setKeyword($Keyword);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objDeltaBean->setKeyword($Keyword);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getKeyword() != "") {
			$Keyword = $objDeltaBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setDescription($Description);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objDeltaBean->setDescription($Description);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getDescription() != "") {
			$Description = $objDeltaBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// EventDate ---------->
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') != "") {
			$EventDate = htmlspecialchars(trim($event->getArg('EventDate')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setEventDate($EventDate);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') == "") {
			$EventDate = "";
			$objDeltaBean->setEventDate($EventDate);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getEventDate() != "") {
			$EventDate = $objDeltaBean->getEventDate();
			$event->setArg('EventDate', $EventDate);
		}
		
		// EventCalendar ---------->
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') != "") {
			$EventCalendar = htmlspecialchars(trim($event->getArg('EventCalendar')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setEventCalendar($EventCalendar);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') == "") {
			$EventCalendar = "";
			$objDeltaBean->setEventCalendar($EventCalendar);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getEventCalendar() != "") {
			$EventCalendar = $objDeltaBean->getEventCalendar();
			$event->setArg('EventCalendar', $EventCalendar);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setShortDescription($ShortDescription);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objDeltaBean->setShortDescription($ShortDescription);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getShortDescription() != "") {
			$ShortDescription = $objDeltaBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objDeltaBean->setLongDescription($longDescription);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objDeltaBean->setLongDescription($LongDescription);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getLongDescription() != "") {
			$LongDescription = $objDeltaBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 DeltaOrder---------->
		if($event->isArgDefined('DeltaOrder') && $event->getArg('DeltaOrder') != "") {
			$DeltaOrder = $event->getArg('DeltaOrder');
			$objDeltaBean->setDeltaOrder($DeltaOrder);
			$objDeltaDao->update($objDeltaBean);						
		}
		if($event->isArgDefined('DeltaOrder') && $event->getArg('DeltaOrder') == "") {
			$DeltaOrder = "";
			$objDeltaBean->setDeltaOrder($DeltaOrder);
			$objDeltaDao->update($objDeltaBean);
		}
		if($objDeltaBean->getDeltaOrder() != "") {
			$DeltaOrder = $objDeltaBean->getDeltaOrder(); 
			$event->setArg('DeltaOrder', $DeltaOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$DeltaId = $event->getArg('DeltaId');
    	$objDeltaDao = new DeltaDao();
		$objDeltaBean = new DeltaBean();
		$objDeltaBean = $objDeltaDao->delete($DeltaId);    	    	    
    }
    
    function findLatest(&$event) {
    	$objDeltaGateway = new DeltaGateway();
		$arrDeltas = $objDeltaGateway->findLatest();
		$event->setArg('arrDeltas',$arrDeltas);
   }
   
   function findInCurrentMonth(&$event) {
    	$objDeltaGateway = new DeltaGateway();
		$arrDeltas = $objDeltaGateway->findInCurrentMonth();
		$event->setArg('arrCurrentMonthDeltas',$arrDeltas);
   }
    
	function findAll(&$event) {
		
		$objAppSession=new AppSession();
		$objDeltaGateway = new DeltaGateway();
		$arrDeltas = $objDeltaGateway->findAll();
		$event->setArg("arrDeltas", $arrDeltas);
	}
	
	function getMaxDeltaOrder(&$event) {
    	$objDeltaGateway = new DeltaGateway();
    	$maxDeltaOrder = $objDeltaGateway->getMaxDeltaOrder();
    	$event->setArg('maxDeltaOrder',$maxDeltaOrder);
    }
    
    function findByItemSeo(&$event)	{
		$id = $event->getArg('id1');
		$objDeltaDao = new DeltaDao();
		$objDelta = $objDeltaDao->read($id);
      	$event->setArg('objDelta',$objDelta);
	}
	
	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objDeltaGateway = new DeltaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	 
		$arrDelta = $objDeltaGateway->findAll();
		$i=1;
		if ($arrDelta) {
			foreach ($arrDelta as $objDelta) {
	       		$arrIds[$i] = $objDelta->getDeltaId();
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
		$nDeltas = count($arrQueue);
		$objPagination = new pagination($nDeltas,30); 
    	$arrPagination = $objPagination->paginate("DeltaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objDeltaGateway = new DeltaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	
    	$arrDeltas = $objDeltaGateway->findAllLimited($arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrDeltas',$arrDeltas);	
	}
	
	function findByCategoryId(&$event) {
		$categoryId = $event->getArg("id2");
		$objDeltaGateway = new DeltaGateway();
		$arrDeltas = $objDeltaGateway->findByCategoryId($categoryId);
		$event->setArg("arrDeltas", $arrDeltas);
	}
	
	function removeEmptyRecords(&$event) {
   		$objDeltaDao = new DeltaDao();
		$objDeltaBean = new DeltaBean();
		$objDeltaDao->deleteEmptyRecords();				   	    
    }	
}
?>