<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");

require_once("GamaGateway.inc.php");
require_once("GamaDao.inc.php");
require_once("GamaBean.inc.php");

require_once("GamaPictureGateway.inc.php");
require_once("GamaPictureDao.inc.php");
require_once("GamaPictureBean.inc.php");

require_once("MigrationGateway.inc.php");

class model_GamaListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('GamaId', 'ImgDriveName', 'Name', 'SeoName', 'ClubId', 'GminaId', 'GamaOrder');
		$sIndexColumn = "GamaId";
		
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
			FROM   Gama
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
			FROM   Gama
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
				
				$GamaId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$ClubId = $aRow[4];
				$GminaId = $aRow[5];
				$GamaOrder = $aRow[6];
				
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
				} else if ($aColumns[$i] == "GminaId"){
					
					if($GminaId == 1) {$value = "Gmina Dynów";} 
					if($GminaId == 2) {$value = "Miasto Dynów";}
					if($GminaId == 3) {$value = "Gmina Nozdrzec";}
					if($GminaId == 4) {$value = "Gmina Dydnia";}
					if($GminaId == 5) {$value = "Gmina Dubiecko";}
					if($GminaId == 6) {$value = "Gmina Krzywcza";}
					
					$responseJSON .= '"'.$value.'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showGamaStep1&GamaId='.$GamaId.'\">Edytuj</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveGamaAction&GamaId='.$GamaId.'\" onclick=\"return confirm(\'Czy na pewno chcesz usunąć ten rekord?\')\">Usuń</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$GamaId = $event->getArg('GamaId');
   		$objGamaBean = new GamaBean();
		$objGamaDao = new GamaDao();
		
		if ($GamaId == "") {
			// we need to create empty GamaId
			$GamaId = $objGamaDao->create($objGamaBean);
			$event->setArg('GamaId', $GamaId);	
		}
		
		$objGamaBean = $objGamaDao->read($GamaId);
		
		$today = date("Y-m-d");
      	$objGamaBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objGamaBean->setStatus($Status);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objGamaBean->setStatus($Status);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getStatus() != "") {
			$Status = $objGamaBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// ClubId ---------->
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') != "") {
			$ClubId = $event->getArg('ClubId');
			$objGamaBean->setClubId($ClubId);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('ClubId') && $event->getArg('ClubId') == "") {
			$ClubId = "0";
			$objGamaBean->setClubId($ClubId);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getClubId() != "") {
			$ClubId = $objGamaBean->getClubId(); 
			$event->setArg('ClubId', $ClubId);
		}
		
		// GminaId ---------->
		if($event->isArgDefined('GminaId') && $event->getArg('GminaId') != "") {
			$GminaId = $event->getArg('GminaId');
			$objGamaBean->setGminaId($GminaId);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('GminaId') && $event->getArg('GminaId') == "") {
			$GminaId = "0";
			$objGamaBean->setGminaId($GminaId);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getGminaId() != "") {
			$GminaId = $objGamaBean->getGminaId(); 
			$event->setArg('GminaId', $GminaId);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objGamaBean->setSeoName($objClearUrl->clear());
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objGamaBean->setName($name);
			$objGamaBean->setSeoName($name);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getName() != "") {
			$name = $objGamaBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setKeyword($Keyword);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objGamaBean->setKeyword($Keyword);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getKeyword() != "") {
			$Keyword = $objGamaBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// VideoDriveName ---------->
		if($event->isArgDefined('VideoDriveName') && $event->getArg('VideoDriveName') != "") {
			$VideoDriveName = htmlspecialchars(trim($event->getArg('VideoDriveName')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setVideoDriveName($VideoDriveName);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('VideoDriveName') && $event->getArg('VideoDriveName') == "") {
			$VideoDriveName = "";
			$objGamaBean->setVideoDriveName($VideoDriveName);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getVideoDriveName() != "") {
			$VideoDriveName = $objGamaBean->getVideoDriveName();
			$event->setArg('VideoDriveName', $VideoDriveName);
		}
		
		// YouTube ---------->
		if($event->isArgDefined('YouTube') && $event->getArg('YouTube') != "") {
			$YouTube = htmlspecialchars(trim($event->getArg('YouTube')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setYouTube($YouTube);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('YouTube') && $event->getArg('YouTube') == "") {
			$YouTube = "";
			$objGamaBean->setYouTube($YouTube);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getYouTube() != "") {
			$YouTube = $objGamaBean->getYouTube();
			$event->setArg('YouTube', $YouTube);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setDescription($Description);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objGamaBean->setDescription($Description);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getDescription() != "") {
			$Description = $objGamaBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// EventDate ---------->
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') != "") {
			$EventDate = htmlspecialchars(trim($event->getArg('EventDate')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setEventDate($EventDate);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('EventDate') && $event->getArg('EventDate') == "") {
			$EventDate = "";
			$objGamaBean->setEventDate($EventDate);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getEventDate() != "") {
			$EventDate = $objGamaBean->getEventDate();
			$event->setArg('EventDate', $EventDate);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setShortDescription($ShortDescription);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objGamaBean->setShortDescription($ShortDescription);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getShortDescription() != "") {
			$ShortDescription = $objGamaBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objGamaBean->setLongDescription($longDescription);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objGamaBean->setLongDescription($LongDescription);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getLongDescription() != "") {
			$LongDescription = $objGamaBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 GamaOrder---------->
		if($event->isArgDefined('GamaOrder') && $event->getArg('GamaOrder') != "") {
			$GamaOrder = $event->getArg('GamaOrder');
			$objGamaBean->setGamaOrder($GamaOrder);
			$objGamaDao->update($objGamaBean);						
		}
		if($event->isArgDefined('GamaOrder') && $event->getArg('GamaOrder') == "") {
			$GamaOrder = "";
			$objGamaBean->setGamaOrder($GamaOrder);
			$objGamaDao->update($objGamaBean);
		}
		if($objGamaBean->getGamaOrder() != "") {
			$GamaOrder = $objGamaBean->getGamaOrder(); 
			$event->setArg('GamaOrder', $GamaOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$GamaId = $event->getArg('GamaId');
    	$objGamaDao = new GamaDao();
		$objGamaBean = new GamaBean();
		$objGamaBean = $objGamaDao->delete($GamaId);    	    	    
    }
    
	function findAll(&$event) {
		
		
		//$objMigrationGateway = new MigrationGateway();
		//$objMigrationGateway->migrate();
		
		
		$objAppSession=new AppSession();
		$sLang = $objAppSession->getSession('sLang');
		
		$objGamaGateway = new GamaGateway();
		$arrGamas = $objGamaGateway->findAll($sLang);
		$event->setArg("arrGamas", $arrGamas);
	}
	
	function findLatest(&$event) {
    	$objGamaGateway = new GamaGateway();
		$arrGamas = $objGamaGateway->findLatest();
		$event->setArg('arrGamas',$arrGamas);
   }
	
	function getMaxGamaOrder(&$event) {
    	$objGamaGateway = new GamaGateway();
    	$maxGamaOrder = $objGamaGateway->getMaxGamaOrder();
    	$event->setArg('maxGamaOrder',$maxGamaOrder);
    }
    
    function findByItemSeoAndId(&$event)	{
		$id = $event->getArg('id1');
    	$objGamaDao = new GamaDao();
		$objGama = $objGamaDao->read($id);
      	$event->setArg('objGama',$objGama);
	}
	
	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objGamaGateway = new GamaGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$categoryId = $event->getArg('id2');
    	 
		$arrGama = $objGamaGateway->findAll($categoryId);
		$i=1;
		if ($arrGama) {
			foreach ($arrGama as $objGama) {
	       		$arrIds[$i] = $objGama->getGamaId();
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
		$nGamas = count($arrQueue);
		$objPagination = new pagination($nGamas,15); 
    	$arrPagination = $objPagination->paginate("GamaList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objGamaGateway = new GamaGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	$categoryId = $event->getArg('id2');
    	
    	$arrGamas = $objGamaGateway->findAllLimited($categoryId, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrGamas',$arrGamas);	
	}
	
	function removeEmptyRecords(&$event) {
   		$objGamaDao = new GamaDao();
		$objGamaBean = new GamaBean();
		$objGamaDao->deleteEmptyRecords();				   	    
    }
}
?>