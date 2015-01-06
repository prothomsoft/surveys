<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");

require_once("ClubGateway.inc.php");
require_once("ClubDao.inc.php");
require_once("ClubBean.inc.php");

require_once("ClubPictureGateway.inc.php");
require_once("ClubPictureDao.inc.php");
require_once("ClubPictureBean.inc.php");

class model_ClubListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('ClubId', 'ImgDriveName', 'Name', 'SeoName', 'UpdateDate', 'ClubOrder');
		$sIndexColumn = "ClubId";
		
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
			FROM   Club
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
			FROM   Club
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
				
				$ClubId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$UpdateDate = $aRow[4];
				$ClubOrder = $aRow[5];
				
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
			
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showClubStep1&ClubId='.$ClubId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveClubAction&ClubId='.$ClubId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$ClubId = $event->getArg('ClubId');
   		$objClubBean = new ClubBean();
		$objClubDao = new ClubDao();
		
		if ($ClubId == "") {
			// we need to create empty ClubId
			$ClubId = $objClubDao->create($objClubBean);
			$event->setArg('ClubId', $ClubId);	
		}
		
		$objClubBean = $objClubDao->read($ClubId);
		
		$today = date("Y-m-d");
      	$objClubBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objClubBean->setStatus($Status);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objClubBean->setStatus($Status);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getStatus() != "") {
			$Status = $objClubBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objClubBean->setSeoName($objClearUrl->clear());
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objClubBean->setName($name);
			$objClubBean->setSeoName($name);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getName() != "") {
			$name = $objClubBean->getName();
			$event->setArg('Name', $name);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setKeyword($Keyword);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objClubBean->setKeyword($Keyword);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getKeyword() != "") {
			$Keyword = $objClubBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setDescription($Description);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objClubBean->setDescription($Description);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getDescription() != "") {
			$Description = $objClubBean->getDescription();
			$event->setArg('Description', $Description);
		}
		
		// Address ---------->
		if($event->isArgDefined('Address') && $event->getArg('Address') != "") {
			$Address = htmlspecialchars(trim($event->getArg('Address')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setAddress($Address);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Address') && $event->getArg('Address') == "") {
			$Address = "";
			$objClubBean->setAddress($Address);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getAddress() != "") {
			$Address = $objClubBean->getAddress();
			$event->setArg('Address', $Address);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setShortDescription($ShortDescription);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objClubBean->setShortDescription($ShortDescription);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getShortDescription() != "") {
			$ShortDescription = $objClubBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setLongDescription($longDescription);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objClubBean->setLongDescription($LongDescription);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getLongDescription() != "") {
			$LongDescription = $objClubBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// 	 ClubOrder---------->
		if($event->isArgDefined('ClubOrder') && $event->getArg('ClubOrder') != "") {
			$ClubOrder = $event->getArg('ClubOrder');
			$objClubBean->setClubOrder($ClubOrder);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('ClubOrder') && $event->getArg('ClubOrder') == "") {
			$ClubOrder = "";
			$objClubBean->setClubOrder($ClubOrder);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getClubOrder() != "") {
			$ClubOrder = $objClubBean->getClubOrder(); 
			$event->setArg('ClubOrder', $ClubOrder);
		}
		
		// Manager ---------->
		if($event->isArgDefined('Manager') && $event->getArg('Manager') != "") {
			$Manager = htmlspecialchars(trim($event->getArg('Manager')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setManager($Manager);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Manager') && $event->getArg('Manager') == "") {
			$Manager = "";
			$objClubBean->setManager($Manager);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getManager() != "") {
			$Manager = $objClubBean->getManager();
			$event->setArg('Manager', $Manager);
		}
		
		// Phone ---------->
		if($event->isArgDefined('Phone') && $event->getArg('Phone') != "") {
			$Phone = htmlspecialchars(trim($event->getArg('Phone')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setPhone($Phone);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Phone') && $event->getArg('Phone') == "") {
			$Phone = "";
			$objClubBean->setPhone($Phone);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getPhone() != "") {
			$Phone = $objClubBean->getPhone();
			$event->setArg('Phone', $Phone);
		}
		
		// Email ---------->
		if($event->isArgDefined('Email') && $event->getArg('Email') != "") {
			$Email = htmlspecialchars(trim($event->getArg('Email')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setEmail($Email);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Email') && $event->getArg('Email') == "") {
			$Email = "";
			$objClubBean->setEmail($Email);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getEmail() != "") {
			$Email = $objClubBean->getEmail();
			$event->setArg('Email', $Email);
		}
		
		// Route ---------->
		if($event->isArgDefined('Route') && $event->getArg('Route') != "") {
			$Route = htmlspecialchars(trim($event->getArg('Route')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setRoute($Route);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Route') && $event->getArg('Route') == "") {
			$Route = "";
			$objClubBean->setRoute($Route);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getRoute() != "") {
			$Route = $objClubBean->getRoute();
			$event->setArg('Route', $Route);
		}
		
		// Lat ---------->
		if($event->isArgDefined('Lat') && $event->getArg('Lat') != "") {
			$Lat = htmlspecialchars(trim($event->getArg('Lat')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setLat($Lat);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Lat') && $event->getArg('Lat') == "") {
			$Lat = "";
			$objClubBean->setLat($Lat);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getLat() != "") {
			$Lat = $objClubBean->getLat();
			$event->setArg('Lat', $Lat);
		}
		
		// Lng ---------->
		if($event->isArgDefined('Lng') && $event->getArg('Lng') != "") {
			$Lng = htmlspecialchars(trim($event->getArg('Lng')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setLng($Lng);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('Lng') && $event->getArg('Lng') == "") {
			$Lng = "";
			$objClubBean->setLng($Lng);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getLng() != "") {
			$Lng = $objClubBean->getLng();
			$event->setArg('Lng', $Lng);
		}
		
		// IsClub ---------->
		if($event->isArgDefined('IsClub') && $event->getArg('IsClub') != "") {
			$IsClub = htmlspecialchars(trim($event->getArg('IsClub')), ENT_QUOTES,'UTF-8',true);
			$objClubBean->setIsClub($IsClub);
			$objClubDao->update($objClubBean);						
		}
		if($event->isArgDefined('IsClub') && $event->getArg('IsClub') == "") {
			$IsClub = "";
			$objClubBean->setIsClub($IsClub);
			$objClubDao->update($objClubBean);
		}
		if($objClubBean->getIsClub() != "") {
			$IsClub = $objClubBean->getIsClub();
			$event->setArg('IsClub', $IsClub);
		}
		
   }
   
   function removeRecord(&$event) {
    	$ClubId = $event->getArg('ClubId');
    	$objClubDao = new ClubDao();
		$objClubBean = new ClubBean();
		$objClubBean = $objClubDao->delete($ClubId);    	    	    
    }
    
	function findAll(&$event) {
		$objClubGateway = new ClubGateway();
		$arrClubs = $objClubGateway->findAll();
		$event->setArg("arrClubs", $arrClubs);
	}
	
	function getMaxClubOrder(&$event) {
    	$objClubGateway = new ClubGateway();
    	$maxClubOrder = $objClubGateway->getMaxClubOrder();
    	$event->setArg('maxClubOrder',$maxClubOrder);
    }
    
    function findByItemSeo(&$event)	{
		$itemSeo = $event->getArg('id1');
		$objClubDao = new ClubDao();
		$objClub = $objClubDao->readByItemSeo($itemSeo);
      	$event->setArg('objClub',$objClub);
	}
}
?>