<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("SigmaGateway.inc.php");
require_once("SigmaDao.inc.php");
require_once("SigmaBean.inc.php");

require_once("SigmaPictureGateway.inc.php");
require_once("SigmaPictureDao.inc.php");
require_once("SigmaPictureBean.inc.php");

class model_SigmaListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('SigmaId', 'ImgDriveName', 'Name', 'SeoName', 'UpdateDate', 'SigmaOrder');
		$sIndexColumn = "SigmaId";
		
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
			FROM   Sigma
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
			FROM   Sigma
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
				
				$SigmaId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$UpdateDate = $aRow[4];
				$SigmaOrder = $aRow[5];
				
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
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showSigmaStep1&SigmaId='.$SigmaId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveSigmaAction&SigmaId='.$SigmaId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$SigmaId = $event->getArg('SigmaId');
   		$objSigmaBean = new SigmaBean();
		$objSigmaDao = new SigmaDao();
		
		if ($SigmaId == "") {
			// we need to create empty SigmaId
			$SigmaId = $objSigmaDao->create($objSigmaBean);
			$event->setArg('SigmaId', $SigmaId);	
		}
		
		$objSigmaBean = $objSigmaDao->read($SigmaId);
		
		$today = date("Y-m-d");
      	$objSigmaBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objSigmaBean->setStatus($Status);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objSigmaBean->setStatus($Status);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getStatus() != "") {
			$Status = $objSigmaBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// DeltaId ---------->
		if($event->isArgDefined('DeltaId') && $event->getArg('DeltaId') != "") {
			$DeltaId = $event->getArg('DeltaId');
			$objSigmaBean->setDeltaId($DeltaId);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('DeltaId') && $event->getArg('DeltaId') == "") {
			$DeltaId = "0";
			$objSigmaBean->setDeltaId($DeltaId);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getDeltaId() != "") {
			$DeltaId = $objSigmaBean->getDeltaId(); 
			$event->setArg('DeltaId', $DeltaId);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objSigmaBean->setSeoName($objClearUrl->clear());
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objSigmaBean->setName($name);
			$objSigmaBean->setSeoName($name);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getName() != "") {
			$name = $objSigmaBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setKeyword($Keyword);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objSigmaBean->setKeyword($Keyword);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getKeyword() != "") {
			$Keyword = $objSigmaBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setDescription($Description);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objSigmaBean->setDescription($Description);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getDescription() != "") {
			$Description = $objSigmaBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// EventDate ---------->
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') != "") {
			$EventDate = htmlspecialchars(trim($event->getArg('EventDate')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setEventDate($EventDate);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') == "") {
			$EventDate = "";
			$objSigmaBean->setEventDate($EventDate);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getEventDate() != "") {
			$EventDate = $objSigmaBean->getEventDate();
			$event->setArg('EventDate', $EventDate);
		}
		
		// EventCalendar ---------->
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') != "") {
			$EventCalendar = htmlspecialchars(trim($event->getArg('EventCalendar')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setEventCalendar($EventCalendar);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('EventCalendar') && $event->getArg('EventCalendar') == "") {
			$EventCalendar = "";
			$objSigmaBean->setEventCalendar($EventCalendar);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getEventCalendar() != "") {
			$EventCalendar = $objSigmaBean->getEventCalendar();
			$event->setArg('EventCalendar', $EventCalendar);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setShortDescription($ShortDescription);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objSigmaBean->setShortDescription($ShortDescription);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getShortDescription() != "") {
			$ShortDescription = $objSigmaBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objSigmaBean->setLongDescription($longDescription);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objSigmaBean->setLongDescription($LongDescription);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getLongDescription() != "") {
			$LongDescription = $objSigmaBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 SigmaOrder---------->
		if($event->isArgDefined('SigmaOrder') && $event->getArg('SigmaOrder') != "") {
			$SigmaOrder = $event->getArg('SigmaOrder');
			$objSigmaBean->setSigmaOrder($SigmaOrder);
			$objSigmaDao->update($objSigmaBean);						
		}
		if($event->isArgDefined('SigmaOrder') && $event->getArg('SigmaOrder') == "") {
			$SigmaOrder = "";
			$objSigmaBean->setSigmaOrder($SigmaOrder);
			$objSigmaDao->update($objSigmaBean);
		}
		if($objSigmaBean->getSigmaOrder() != "") {
			$SigmaOrder = $objSigmaBean->getSigmaOrder(); 
			$event->setArg('SigmaOrder', $SigmaOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$SigmaId = $event->getArg('SigmaId');
    	$objSigmaDao = new SigmaDao();
		$objSigmaBean = new SigmaBean();
		$objSigmaBean = $objSigmaDao->delete($SigmaId);    	    	    
    }
    
    function findHomePage(&$event) {
    	$objSigmaGateway = new SigmaGateway();
		$arrSigmas = $objSigmaGateway->findHomePage();
		$event->setArg('arrSigmaHomePage',$arrSigmas);
   }
   
   function findLatest(&$event) {
    	$objSigmaGateway = new SigmaGateway();
		$arrSigmas = $objSigmaGateway->findLatest();
		$event->setArg('arrSigmaLatest',$arrSigmas);
   }
   
   function findInCurrentMonth(&$event) {
    	$objSigmaGateway = new SigmaGateway();
		$arrSigmas = $objSigmaGateway->findInCurrentMonth();
		$event->setArg('arrCurrentMonthSigmas',$arrSigmas);
   }
    
	function findAll(&$event) {
		
		$objAppSession=new AppSession();
		$objSigmaGateway = new SigmaGateway();
		$arrSigmas = $objSigmaGateway->findAll();
		$event->setArg("arrSigmaAll", $arrSigmas);
	}
	
	function getMaxSigmaOrder(&$event) {
    	$objSigmaGateway = new SigmaGateway();
    	$maxSigmaOrder = $objSigmaGateway->getMaxSigmaOrder();
    	$event->setArg('maxSigmaOrder',$maxSigmaOrder);
    }
    
    function findByItemSeo(&$event)	{
		$id = $event->getArg('id1');
		$objSigmaDao = new SigmaDao();
		$objSigma = $objSigmaDao->read($id);
      	$event->setArg('objSigma',$objSigma);
	}
	
	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objSigmaGateway = new SigmaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$DeltaId = $event->getArg('id2');
    	 
		$arrSigma = $objSigmaGateway->findAll($DeltaId);
		$i=1;
		if ($arrSigma) {
			foreach ($arrSigma as $objSigma) {
	       		$arrIds[$i] = $objSigma->getSigmaId();
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
		$nSigmas = count($arrQueue);
		$objPagination = new pagination($nSigmas,30); 
    	$arrPagination = $objPagination->paginate("SigmaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objSigmaGateway = new SigmaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$DeltaId = $event->getArg('id2');
    	
    	$arrSigmas = $objSigmaGateway->findAllLimited($DeltaId, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrSigmas',$arrSigmas);	
	}
	
	function findByCategoryId(&$event) {
		$categoryId = $event->getArg("id2");
		$objSigmaGateway = new SigmaGateway();
		$arrSigmas = $objSigmaGateway->findByCategoryId($categoryId);
		$event->setArg("arrSigmas", $arrSigmas);
	}
	
	
	function getSearchQueue(&$event) {
		$objAppSession = new AppSession();
    	$objSigmaGateway = new SigmaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$searchKey = $event->getArg("searchKey");
    	 
		$arrSigma = $objSigmaGateway->findSearchAll($searchKey);
		$i=1;
		if ($arrSigma) {
			foreach ($arrSigma as $objSigma) {
	       		$arrIds[$i] = $objSigma->getSigmaId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getSearchListNavigation(&$event) {
		if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}
      
     	$arrQueue = $event->getArg('arrQueue');
		$nSigmas = count($arrQueue);
		$objPagination = new pagination($nSigmas,30); 
    	$arrPagination = $objPagination->paginate("SigmaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getSearchList(&$event){
		$objAppSession = new AppSession();
		$objSigmaGateway = new SigmaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$searchKey = $event->getArg("searchKey");
    	
    	$arrSigmas = $objSigmaGateway->findSearchAllLimited($searchKey, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrSigmas',$arrSigmas);	
	}
	
}
?>