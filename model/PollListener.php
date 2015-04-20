<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("PollGateway.inc.php");
require_once("PollDao.inc.php");
require_once("PollBean.inc.php");

require_once("PollAnswerGateway.inc.php");
require_once("PollAnswerDao.inc.php");
require_once("PollAnswerBean.inc.php");

require_once("PollVoteGateway.inc.php");
require_once("PollVoteDao.inc.php");
require_once("PollVoteBean.inc.php");

class model_PollListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('PollId', 'Question', 'CreateDate', 'Status', 'Question', 'PollOrder');
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
				
				$aColumns = array('PollId', 'Question', 'CreateDate', 'Status', 'Question', 'PollOrder');
				
				$PollId = $aRow[0];
				$Question = $aRow[1];
				$CreateDate = $aRow[2];
				$Status = $aRow[3];
				$Question1 = $aRow[4];
				$PollOrder = $aRow[5];
				
				
				if ($aColumns[$i] == "Question"){
					$responseJSON .= '"'.$Question.'",';
				} else if ($aColumns[$i] == "Status"){
						if($Status == 0) {
							$responseJSON .= '"In development",';
						} else if($Status == 1) {
								$responseJSON .= '"Open for votes",';
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
			if($Status == 0) {
				$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showPollStep1&PollId='.$PollId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;';
			} else {
				$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showPollStep1&PollId='.$PollId.'\">Edit</a>&nbsp;|&nbsp;&nbsp;<a class=\"anchor_link\" href=\"index.php?event=showPollResults&PollId='.$PollId.'\">Results</a>&nbsp;|&nbsp;&nbsp;';
			}
			
			$responseJSON .= '<a class=\"anchor_link\" href=\"index.php?event=executeRemovePollAction&PollId='.$PollId.'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getById(&$event){
		$PollId = $event->getArg('PollId');		
		$objPollDao = new PollDao();
		$objPollBean = $objPollDao->read($PollId);
		$event->setArg("objPoll", $objPollBean);		
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
      	// OpenQuestion ---------->
      	if($event->isArgDefined('OpenQuestion') && $event->getArg('OpenQuestion') != "") {
      		$OpenQuestion = htmlspecialchars($event->getArg('OpenQuestion'), ENT_QUOTES,'UTF-8',true);
      		$objPollBean->setOpenQuestion($OpenQuestion);
      		$objPollDao->update($objPollBean);
      	}
      	if($event->isArgDefined('OpenQuestion') && $event->getArg('OpenQuestion') == "") {
      		$OpenQuestion = "";
      		$objPollBean->setName($OpenQuestion);
      		$objPollDao->update($objPollBean);
      	}
      	if($objPollBean->getOpenQuestion() != "") {
      		$OpenQuestion = $objPollBean->getOpenQuestion();
      		$event->setArg('OpenQuestion', $OpenQuestion);
      	}
      	
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
				
		// Answer
		$arrAnswers = $event->getArg("answers");
		if($arrAnswers) {
			// We always update list of answers for pollId so we need to clear it first
			$objPollAnswerDAO = new PollAnswerDAO();
			$objPollAnswerDAO->deleteByPollId($PollId);
			
			$objPollAnswerBean = new PollAnswerBean();
			foreach ($arrAnswers as $PollAnswerOrder => $PollAnswer) {
				$objPollAnswerBean->setPollId($PollId);
				$objPollAnswerBean->setPollAnswer($PollAnswer);
				$objPollAnswerBean->setPollAnswerOrder($PollAnswerOrder);
				$objPollAnswerDAO->create($objPollAnswerBean);
			}
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
    
	function checkQuestionsStatus(&$event) {
		$objPoll = $this->getActivePoll();
		if($objPoll != "") {
			$PollId = $objPoll->getPollId();
		}
		$event->setArg("PollId", $PollId);
		$UserId = $this->getActiveUser();
		
		//echo $UserId;
		//echo "<br/>";
		//echo $PollId;
		//echo "<br/>";
		
		if($PollId != "" && $UserId != "") {
			$objPollVoteGateway = new PollVoteGateway();
			$arrPollVote = $objPollVoteGateway->findByPollAndUserId($PollId, $UserId);
			$openQuestionStatus = 0;
			$pollQuestionStatus = 0;
			if($arrPollVote) {
				foreach ($arrPollVote as $objPollVote) {
					if($objPollVote->getPollOpenAnswer() != "") {
						$openQuestionStatus = 1;
						$event->setArg("PollOpenAnswer", $objPollVote->getPollOpenAnswer());
					}
					if($objPollVote->getPollAnswerId() != 0) {
						$pollQuestionStatus = 1;
						$event->setArg("PollAnswerId", $objPollVote->getPollAnswerId());
					}
				}				
			}
			$event->setArg("openQuestionStatus", $openQuestionStatus);
			$event->setArg("pollQuestionStatus", $pollQuestionStatus);
			
			$event->setArg("objPoll", $objPoll);
			//echo "Open: ";
			//echo $openQuestionStatus;
			//echo "<br/>";
			//echo "Close: ";
			//echo $pollQuestionStatus;
			//echo "<br/>";			
		}   
    }
    
    function getActiveUser() {
    	$objAppSession=new AppSession();
    	if ($objAppSession->getSession("User") != "") {
    		return $UserId = $objAppSession->getSession("User")->getUserId();
    	} else {
    		return "";
    	}
    }
    
    function getActivePoll() {
    	$objPollGateway = new PollGateway();
    	$arrActive = $objPollGateway->findActive();
    	
    	if($arrActive) {
    		if(count($arrActive) == 1) {    			
    			return $arrActive[0];
    		} else {
    			return "";
    		}
    	}
    }
    
    function saveOpenAnswer(&$event) {
    	$objPoll = $this->getActivePoll();
		if($objPoll != "") {
    		$PollId = $objPoll->getPollId();
    	}
    	
    	$event->setArg("PollId", $PollId);
    	$UserId = $this->getActiveUser();
    	
    	$PollOpenAnswer = $event->getArg("PollOpenAnswer");
		$defaultText = "Please enter Your answer here...";

		//if($UserId != "" && $PollId != "" && $PollOpenAnswer != "" && $PollOpenAnswer != $defaultText) {
		if($UserId != "" && $PollId != "" && $PollOpenAnswer != "") {
			$date = date('Y-m-d');
			$time = date('H:m:s');
			$createDateTime = "".$date." ".$time."";
			$objPollVoteBean = new PollVoteBean();
			$objPollVoteDao = new PollVoteDao();
			$objPollVoteBean->setUserId($UserId);
			$objPollVoteBean->setPollId($PollId);
			$objPollVoteBean->setPollOpenAnswer($PollOpenAnswer);
			$objPollVoteBean->setCreateDate($createDateTime);
			
			$objPollVoteGateway = new PollVoteGateway();
			$arrPollVoteCheck = $objPollVoteGateway->findByPollAndUserAndPollOpenAnswer($PollId, $UserId, $PollOpenAnswer);
			if(!$arrPollVoteCheck) {
				$objPollVoteDao->create($objPollVoteBean);
			}
			
			
		}
    }
    
    function savePollAnswers(&$event) {
    	$objPoll = $this->getActivePoll();
    	if($objPoll != "") {
    		$PollId = $objPoll->getPollId();
    	}
    	
    	$event->setArg("PollId", $PollId);
    	$UserId = $this->getActiveUser();
    	
    	$PollAnswerId = $event->getArg("PollAnswerId");
    	
    	//echo $PollAnswerId;
    	//echo "<br/>";
    	//echo $PollId;
    	//echo "<br/>";
    	//echo $UserId;
    	    	 
    	if($UserId != "" && $PollId != "" && $PollAnswerId != "") {
	    	$date = date('Y-m-d');
	    	$time = date('H:m:s');
	    	$createDateTime = "".$date." ".$time."";
	    	$objPollVoteBean = new PollVoteBean();
	    	$objPollVoteDao = new PollVoteDao();
	    	$objPollVoteBean->setUserId($UserId);
	    	$objPollVoteBean->setPollId($PollId);
	    	$objPollVoteBean->setPollAnswerId($PollAnswerId);
	    	$objPollVoteBean->setCreateDate($createDateTime);
	    	
	    	$objPollVoteGateway = new PollVoteGateway();
	    	$arrPollVoteCheck = $objPollVoteGateway->findByPollAndUserAndPollAnswerId($PollId, $UserId, $PollAnswerId);
	    	if(!$arrPollVoteCheck) {
	    		$objPollVoteDao->create($objPollVoteBean);
	    	}
    	}
    	
    	header("Location: ".$SN."themeMarketResults.html");
    }
    
    function getTotalNumberVotes(&$event) {
    	$totalNumberVotes = 0;
    	$objPoll = $this->getActivePoll();
    	if($objPoll != "") {
    		$PollId = $objPoll->getPollId();
    	}
    	$event->setArg("PollId", $PollId);
    	if($PollId != "") {
    		$objPollVoteGateway = new PollVoteGateway();
			$arrPollVote = $objPollVoteGateway->findByPollId($PollId);
			if($arrPollVote) {
				$totalNumberVotes = count($arrPollVote);
			}
    	}
    	$event->setArg("totalNumberVotes", $totalNumberVotes);    	
    }
    
    function getResultsTotalNumberVotes(&$event) {
    	$totalNumberVotes = 0;
    	$PollId = $event->getArg("PollId");
    	if($PollId != "") {
    		$objPollVoteGateway = new PollVoteGateway();
    		$arrPollVote = $objPollVoteGateway->findByPollId($PollId);
    		if($arrPollVote) {
    			$totalNumberVotes = count($arrPollVote);
    		}
    	}
    	$event->setArg("totalNumberVotes", $totalNumberVotes);
    }
}
?>