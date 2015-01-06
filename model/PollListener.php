<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("PollGateway.inc.php");
require_once("PollDao.inc.php");
require_once("PollBean.inc.php");

require_once("PollPictureGateway.inc.php");
require_once("PollPictureDao.inc.php");
require_once("PollPictureBean.inc.php");

class model_PollListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('PollId', 'Question', 'Status', 'CreateDate', 'PollOrder');
		$sIndexColumn = "PollId";
		
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
			FROM   Poll
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
			FROM   Poll
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
				
				$PollId = $aRow[0];
				$Question = $aRow[1];
				$Status = $aRow[2];
				$CreateDate = $aRow[3];
				$PollOrder = $aRow[4];
				
				if ($aColumns[$i] == "Question"){
					$responseJSON .= '"<strong>'.$Question.'</strong>",';
				} else if ($aColumns[$i] == "CreateDate"){
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",';
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showPollStep1&PollId='.$PollId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemovePollAction&PollId='.$PollId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$PollId = $event->getArg('PollId');
   		$objPollBean = new PollBean();
		$objPollDao = new PollDao();
		
		if ($PollId == "") {
			// we need to create empty PollId
			$PollId = $objPollDao->create($objPollBean);
			$event->setArg('PollId', $PollId);	
		}
		
		$objPollBean = $objPollDao->read($PollId);
		
		$today = date("Y-m-d");
      	$objPollBean->setCreateDate($today);
      	
		// WIZARD STEP 1 ---------->
		
		// Question ---------->
		if($event->isArgDefined('Question') && $event->getArg('Question') != "") {
			$Question = htmlspecialchars($event->getArg('Question'), ENT_QUOTES,'UTF-8',true);
			$objPollBean->setQuestion($Question);
			$objPollDao->update($objPollBean);						
		}
		if($event->isArgDefined('Question') && $event->getArg('Question') == "") {
			$Question = "";
			$objPollBean->setName($Question);
			$objPollDao->update($objPollBean);
		}
		if($objPollBean->getQuestion() != "") {
			$Question = $objPollBean->getQuestion();
			$event->setArg('Question', $Question);
		}
		
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objPollBean->setStatus($Status);
			$objPollDao->update($objPollBean);
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objPollBean->setStatus($Status);
			$objPollDao->update($objPollBean);
		}
		if($objPollBean->getStatus() != "") {
			$Status = $objPollBean->getStatus();
			$event->setArg('Status', $Status);
		}
		
		// PollOrder---------->
		if($event->isArgDefined('PollOrder') && $event->getArg('PollOrder') != "") {
			$PollOrder = $event->getArg('PollOrder');
			$objPollBean->setPollOrder($PollOrder);
			$objPollDao->update($objPollBean);						
		}
		if($event->isArgDefined('PollOrder') && $event->getArg('PollOrder') == "") {
			$PollOrder = "";
			$objPollBean->setPollOrder($PollOrder);
			$objPollDao->update($objPollBean);
		}
		if($objPollBean->getPollOrder() != "") {
			$PollOrder = $objPollBean->getPollOrder(); 
			$event->setArg('PollOrder', $PollOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$PollId = $event->getArg('PollId');
    	$objPollDao = new PollDao();
		$objPollBean = new PollBean();
		$objPollBean = $objPollDao->delete($PollId);    	    	    
    }
    
	function findAll(&$event) {
		$objAppSession=new AppSession();
		$objPollGateway = new PollGateway();
		$arrPolls = $objPollGateway->findAll();
		$event->setArg("arrPolls", $arrPolls);
	}
	
	function getMaxPollOrder(&$event) {
    	$objPollGateway = new PollGateway();
    	$maxPollOrder = $objPollGateway->getMaxPollOrder();
    	$event->setArg('maxPollOrder',$maxPollOrder);
    }

	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objPollGateway = new PollGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	 
		$arrPoll = $objPollGateway->findAll();
		$i=1;
		if ($arrPoll) {
			foreach ($arrPoll as $objPoll) {
	       		$arrIds[$i] = $objPoll->getPollId();
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
		$nPolls = count($arrQueue);
		$objPagination = new pagination($nPolls,30); 
    	$arrPagination = $objPagination->paginate("PollList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objPollGateway = new PollGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	
    	$arrPolls = $objPollGateway->findAllLimited($arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrPolls',$arrPolls);	
	}
	
	function removeEmptyRecords(&$event) {
   		$objPollDao = new PollDao();
		$objPollBean = new PollBean();
		$objPollDao->deleteEmptyRecords();				   	    
    }	
}
?>