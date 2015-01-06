<?php
require_once("components/session.inc.php");

require_once("MemberBean.inc.php");
require_once("MemberDao.inc.php");


class model_MemberListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('MemberId', 'Email', 'CreateDate');
		$sIndexColumn = "MemberId";
		
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
			FROM   Member
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
			FROM   Member
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
				
				$MemberId = $aRow[0];
				$Email = $aRow[1];
				$CreateDate = $aRow[2];
				
				if ($aColumns[$i] == "CreateDate") {
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=executeRemoveMemberAction&MemberId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
    function addEmail(&$event) {
		
		$MemberName = $event->getArg("Name");
		$MemberAdresse = $event->getArg("Adresse");
		$MemberPostnummer = $event->getArg("Postnummer");
		$MemberSted = $event->getArg("Sted");
		$MemberTelefon = $event->getArg("Telefon");
		$MemberEmail = $event->getArg("Email");
		$MemberKommentar = $event->getArg("Kommentar");
		$MemberYourOption = $event->getArg("YourOption");
		$MemberPaymentStatus = $event->getArg("PaymentStatus");
		$MemberMembershipStatus = $event->getArg("MembershipStatus");
		
		$objMemberBean = new MemberBean();
		$objMemberBean->setName($MemberName);
		$objMemberBean->setAdresse($MemberAdresse);
		$objMemberBean->setPostnummer($MemberPostnummer);
		$objMemberBean->setSted($MemberSted);
		$objMemberBean->setTelefon($MemberTelefon);
		$objMemberBean->setEmail($MemberEmail);
		$objMemberBean->setKommentar($MemberKommentar);
		$objMemberBean->setYourOption($MemberYourOption);
		$objMemberBean->setPaymentStatus($MemberPaymentStatus);
		$objMemberBean->setMembershipStatus($MemberMembershipStatus);
		
		$date = date('Y-m-d');
		$objMemberBean->setCreateDate($date);
		
		$objMemberDao = new MemberDao();
		$MemberId = $objMemberDao->create($objMemberBean);
		$event->setArg("MemberId", $MemberId);
		
	}
	
	function getById(&$event) {
		$MemberId = $event->getArg("Member_id");
		
		$objMemberDao = new MemberDao();
		$objMemberBean = $objMemberDao->read($MemberId);
		
		$event->setArg("objMember", $objMemberBean);
	}
	
	function removeRecord(&$event) {
    	$MemberId = $event->getArg('MemberId');
    	
		$objMemberDao = new MemberDao();
		$objMemberBean = new MemberBean();
		$objMemberBean = $objMemberDao->delete($MemberId);
		    	    	    
    }
	
}
?>