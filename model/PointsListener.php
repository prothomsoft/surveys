<?php
require_once("components/session.inc.php");
require_once("components/emails.inc.php");

require_once("PointsBean.inc.php");
require_once("PointsDao.inc.php");
require_once("PointsGateway.inc.php");

require_once("UserBean.inc.php");
require_once("UserDao.inc.php");
require_once("UserGateway.inc.php");

class model_PointsListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('PointId', 'CustomerInformation',  'CreateDate', 'Amount', 'UserId', 'OrderId');
		$sIndexColumn = "PointId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// Pointing
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sPoint = "";
		if (isset($iSortCol_0)) {
			$sPoint = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sPoint .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sPoint = substr_replace($sPoint, "", -2);
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Points
			$sWhere
			$sPoint
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
			FROM   Points
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
				
				$PointId = $aRow[0];
				$CustomerInformation = $aRow[1];
				$CreateDate = $aRow[2];
				$Amount = $aRow[3];
				$UserId = $aRow[4];
				$OrderId = $aRow[5];
				
				if ($aColumns[$i] == "Amount"){
					$responseJSON .= '"'.$aRow[ $aColumns[$i] ].'",';
				} else if ($aColumns[$i] == "CreateDate"){
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",';
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=executeRemovePointsAction&PointId='.$aRow[0].'\" onclick=\"return confirm(\'Czy na pewno chcesz usunąć ten rekord?\')\">Usuń</a>",';
			
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
		$aColumns = array('PointId', 'CustomerInformation',  'CreateDate', 'Amount', 'Comments', 'UserId', 'OrderId');
		$sIndexColumn = "PointId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// Pointing
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sPoint = "";
		if (isset($iSortCol_0)) {
			$sPoint = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sPoint .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sPoint = substr_replace($sPoint, "", -2);
		}
		
		$sWhere = "WHERE UserId = '".$userId."' ";
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Points
			$sWhere
			$sPoint
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
			FROM   Points
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
				
				$PointId = $aRow[0];
				$CustomerInformation = $aRow[1];
				$CreateDate = $aRow[2];
				$Amount = $aRow[3];
				$Comments = $aRow[4];
				$UserId = $aRow[5];
				$OrderId = $aRow[6];
				
				if ($aColumns[$i] == "Amount"){
					$responseJSON .= '"'.$aRow[ $aColumns[$i] ].'",';
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
	
    
    function createPoint(&$event) {
    			
		$objAppSession = new AppSession();
		$amount = $event->getArg('amount');
		
		$userId = $event->getArg('userId');
		
		$objUserDao = new UserDao();
		$objUser = $objUserDao->read($userId);
		
		$customerInformation = "".$objUser->getNameFirst()." ".$objUser->getNameLast()." (".$objUser->getEmail().")";  
		
		$objPointsBean = new PointsBean();
		
		$date = date('Y-m-d');
		$time = date('H:m:s');
		$createDateTime = "".$date." ".$time."";
		
		$PointComment = $event->getArg("PointComment");
		
    	$objPointsBean->setCustomerInformation($customerInformation);
		$objPointsBean->setCreateDate($createDateTime);
      	$objPointsBean->setAmount($amount);
      	$objPointsBean->setUserId($userId);
      	$objPointsBean->setComments($PointComment);
      		
      	$objPointsDao = new PointsDao();
      	$PointId = $objPointsDao->create($objPointsBean);
    }
    
    function setFieldsForUpdate(&$event) {
    	$objPointsDao = new PointsDao();
    	
    	if($event->getArg('id1') != "") {
    		$PointId = $event->getArg('id1');
    	} else {
    		$PointId = $event->getArg('PointId');
    	}
    		
    	$objPoint = $objPointsDao->read($PointId);
    	
    	if (!$event->isArgDefined('UserId')) {
    		$UserId= $objPoint->getUserId();
    		$event->setArg('UserId',$UserId);
    	}
    	
    	if (!$event->isArgDefined('CreateDate')) {
    		$CreateDate= $objPoint->getCreateDate();
    		$event->setArg('CreateDate',$CreateDate);
    	}
    	
    	if (!$event->isArgDefined('Amount')) {
    		$Amount= $objPoint->getAmount();
    		$event->setArg('Amount',$Amount);
    	}
    }
    
	function updatePoint(&$event) {
		$PointId = $event->getArg('PointId');
		
		$objPointsDao = new PointsDao();
		$objPointsBean = new PointsBean();
		$objPointsBean = $objPointsDao->read($PointId);
		
		$amount = $event->getArg('amount');

		$objPointsBean->setAmount($amount);
		
    	$objPointsDao->update($objPointsBean);    	
	}
	
	function removeRecord(&$event) {
		$PointId = $event->getArg('PointId');
		$objPointsDao = new PointsDao();
		$objPointsDao->delete($PointId);
	}
	
	function findPoint(&$event)	{
		$PointId = $event->getArg('PointId');
		$objPointsDao = new PointsDao();
        $objPoint = $objPointsDao->read($PointId);
		$event->setArg('objPoint',$objPoint);
	}
	
	function findByUserId(&$event)	{
		$userId = $event->getArg('userId');
		$objPointsGateway = new PointsGateway();
        $arrPoints = $objPointsGateway->findByUserId($userId);
		$event->setArg('arrPoints',$arrPoints);
	}
}
?>