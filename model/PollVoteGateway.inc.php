<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollVoteBean.inc.php");

class PollVoteGateway {
	
	public function getByPollId($PollId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, PollVote, PollVoteOrder";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objPollVote = new PollVoteBean();
	      			$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
	      			$objPollVote->setUserId($DB->getField("UserId"));
	      			$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				    $objPollVote->setPollVote($DB->getField("PollVote"));
				    $objPollVote->setPollVoteOrder($DB->getField("PollVoteOrder"));				    
				    $arr[] = $objPollVote;
	      		}
	      }
	      return $arr;
	}		
}
?>