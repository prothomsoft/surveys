<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("TopicGateway.inc.php");
require_once("TopicDao.inc.php");
require_once("TopicBean.inc.php");

class model_TopicListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('TopicId', 'Question', 'CreateDate', 'Status', 'Question', 'TopicOrder');
		$sIndexColumn = "TopicId";
		
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
			FROM   Topic
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
			FROM   Topic
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
				
				$aColumns = array('TopicId', 'Question', 'CreateDate', 'Status', 'Question', 'TopicOrder');
				
				$TopicId = $aRow[0];
				$Question = $aRow[1];
				$CreateDate = $aRow[2];
				$Status = $aRow[3];
				$Question1 = $aRow[4];
				$TopicOrder = $aRow[5];
				
				
				if ($aColumns[$i] == "Question"){
					$responseJSON .= '"'.$Question.'",';
				} else if ($aColumns[$i] == "Status"){
						if($Status == 0) {
							$responseJSON .= '"Open for discussion",';
						} else {
							$responseJSON .= '"Closed for votes",';							
						}
						
				} else if ($aColumns[$i] == "CreateDate"){
					$responseJSON .= '"'.substr($CreateDate, 0, 10).'",';
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showTopicStep1&TopicId='.$TopicId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;<a class=\"anchor_link\" href=\"index.php?event=showTopicHistory&id1='.$TopicId.'\">History</a>&nbsp;|&nbsp;&nbsp;';
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemoveTopicAction&TopicId='.$TopicId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getById(&$event){
		$TopicId = $event->getArg('TopicId');
        $objTopicDao = new TopicDao();
		$objTopicBean = $objTopicDao->read($TopicId);
		$event->setArg("objTopic", $objTopicBean);		
	}
    
    function getByIdFO(&$event){
        $TopicId = $event->getArg('id1');
        $objTopicDao = new TopicDao();
        $objTopicBean = $objTopicDao->read($TopicId);
        $event->setArg("objTopic", $objTopicBean);      
    }
   
	function checkId(&$event){
   		$TopicId = $event->getArg('TopicId');
   		$objTopicBean = new TopicBean();
		$objTopicDao = new TopicDao();
		
		if ($TopicId == "") {
			// we need to create empty TopicId
			$TopicId = $objTopicDao->create($objTopicBean);
			$event->setArg('TopicId', $TopicId);	
		}		
		
		$objTopicBean = $objTopicDao->read($TopicId);
		
		$today = date("Y-m-d");
      	$objTopicBean->setCreateDate($today);
      	
      	// WIZARD STEP 1 ---------->
      	// OpenQuestion ---------->
      	if($event->isArgDefined('OpenQuestion') && $event->getArg('OpenQuestion') != "") {
      		$OpenQuestion = htmlspecialchars($event->getArg('OpenQuestion'), ENT_QUOTES,'UTF-8',true);
      		$objTopicBean->setOpenQuestion($OpenQuestion);
      		$objTopicDao->update($objTopicBean);
      	}
      	if($event->isArgDefined('OpenQuestion') && $event->getArg('OpenQuestion') == "") {
      		$OpenQuestion = "";
      		$objTopicBean->setOpenQuestion($OpenQuestion);
      		$objTopicDao->update($objTopicBean);
      	}
      	if($objTopicBean->getOpenQuestion() != "") {
      		$OpenQuestion = $objTopicBean->getOpenQuestion();
      		$event->setArg('OpenQuestion', $OpenQuestion);
      	}
      	
		// Question ---------->
		if($event->isArgDefined('Question') && $event->getArg('Question') != "") {
			$Question = htmlspecialchars($event->getArg('Question'), ENT_QUOTES,'UTF-8',true);
			$objTopicBean->setQuestion($Question);
			$objTopicDao->update($objTopicBean);						
		}
		if($event->isArgDefined('Question') && $event->getArg('Question') == "") {
			$Question = "";
			$objTopicBean->setQuestion($Question);
			$objTopicDao->update($objTopicBean);
		}
		if($objTopicBean->getQuestion() != "") {
			$Question = $objTopicBean->getQuestion();
			$event->setArg('Question', $Question);
		}
		
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objTopicBean->setStatus($Status);
			$objTopicDao->update($objTopicBean);
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objTopicBean->setStatus($Status);
			$objTopicDao->update($objTopicBean);
		}
		if($objTopicBean->getStatus() != "") {
			$Status = $objTopicBean->getStatus();
			$event->setArg('Status', $Status);
		}
		
		// TopicOrder---------->
		if($event->isArgDefined('TopicOrder') && $event->getArg('TopicOrder') != "") {
			$TopicOrder = $event->getArg('TopicOrder');
			$objTopicBean->setTopicOrder($TopicOrder);
			$objTopicDao->update($objTopicBean);						
		}
		if($event->isArgDefined('TopicOrder') && $event->getArg('TopicOrder') == "") {
			$TopicOrder = "";
			$objTopicBean->setTopicOrder($TopicOrder);
			$objTopicDao->update($objTopicBean);
		}
		if($objTopicBean->getTopicOrder() != "") {
			$TopicOrder = $objTopicBean->getTopicOrder(); 
			$event->setArg('TopicOrder', $TopicOrder);
		}
		
   }
   
   function removeRecord(&$event) {
    	$TopicId = $event->getArg('TopicId');
    	$objTopicDao = new TopicDao();
		$objTopicBean = new TopicBean();
		$objTopicBean = $objTopicDao->delete($TopicId);    	    	    
    }
    
	function findAll(&$event) {
		$objAppSession=new AppSession();
		$objTopicGateway = new TopicGateway();
		$arrTopics = $objTopicGateway->findAll();
		$event->setArg("arrTopics", $arrTopics);
	}
    
    function findActive(&$event) {
        $objAppSession=new AppSession();
        $objTopicGateway = new TopicGateway();
        $arrTopics = $objTopicGateway->findActive();
        $event->setArg("arrTopics", $arrTopics);
    }
    
    
    
	function getMaxTopicOrder(&$event) {
    	$objTopicGateway = new TopicGateway();
    	$maxTopicOrder = $objTopicGateway->getMaxTopicOrder();
    	$event->setArg('maxTopicOrder',$maxTopicOrder);
    }

	function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objTopicGateway = new TopicGateway();
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	 
		$arrTopic = $objTopicGateway->findAll();
		$i=1;
		if ($arrTopic) {
			foreach ($arrTopic as $objTopic) {
	       		$arrIds[$i] = $objTopic->getTopicId();
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
		$nTopics = count($arrQueue);
		$objPagination = new pagination($nTopics,30); 
    	$arrPagination = $objPagination->paginate("TopicList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getList(&$event){
		$objAppSession = new AppSession();
		$objTopicGateway = new TopicGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
    	if (!$event->isArgDefined('id1')) {
    		$page = 1;
    	} else {
    		$page = $event->getArg('id1');
    	}
    	
    	$arrTopics = $objTopicGateway->findAllLimited($arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrTopics',$arrTopics);	
	}
	
	function removeEmptyRecords(&$event) {
   		$objTopicDao = new TopicDao();
		$objTopicBean = new TopicBean();
		$objTopicDao->deleteEmptyRecords();				   	    
    }    
}
?>