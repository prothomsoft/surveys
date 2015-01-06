<?php
require_once("components/session.inc.php");

require_once("NewsletterBean.inc.php");
require_once("NewsletterDao.inc.php");


class model_NewsletterListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('NewsletterId', 'Email', 'CreateDate');
		$sIndexColumn = "NewsletterId";
		
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
			FROM   Newsletter
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
			FROM   Newsletter
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
				
				$NewsletterId = $aRow[0];
				$Email = $aRow[1];
				$CreateDate = $aRow[2];
				
				if ($aColumns[$i] == "CreateDate") {
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=executeRemoveNewsletterAction&newsletterId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
    function addEmail(&$event) {
		
		$NewsletterEmail = $event->getArg("email");
		
		$objNewsletterBean = new NewsletterBean();
		$objNewsletterBean->setEmail($NewsletterEmail);
		
		$date = date('Y-m-d');
		$objNewsletterBean->setCreateDate($date);
		
		$objNewsletterDao = new NewsletterDao();
		$objNewsletterDao->create($objNewsletterBean);
	}
	
	function getById(&$event) {
		$newsletterId = $event->getArg("newsletter_id");
		
		$objNewsletterDao = new NewsletterDao();
		$objNewsletterBean = $objNewsletterDao->read($newsletterId);
		
		$event->setArg("objNewsletter", $objNewsletterBean);
	}
	
	function removeRecord(&$event) {
    	$newsletterId = $event->getArg('newsletterId');
    	
		$objNewsletterDao = new NewsletterDao();
		$objNewsletterBean = new NewsletterBean();
		$objNewsletterBean = $objNewsletterDao->delete($newsletterId);
		    	    	    
    }
	
}
?>