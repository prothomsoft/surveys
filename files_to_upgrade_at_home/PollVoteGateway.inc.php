<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollVoteBean.inc.php");

class PollVoteGateway {
	
	public function findByPollAndUserId($PollId, $UserId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";
		$query .= " AND UserId = '".$UserId."'";		
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objPollVote = new PollVoteBean();
	      			$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
	      			$objPollVote->setUserId($DB->getField("UserId"));
	      			$objPollVote->setPollId($DB->getField("PollId"));
	      			$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
	      			$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				    $objPollVote->setCreateDate($DB->getField("CreateDate"));				    
				    $arr[] = $objPollVote;
	      		}
	      }
	      return $arr;
	}

	public function findByPollId($PollId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";
		$query .= " AND PollAnswerId != 0";		
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objPollVote = new PollVoteBean();
				$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				$objPollVote->setUserId($DB->getField("UserId"));
				$objPollVote->setPollId($DB->getField("PollId"));
				$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
				$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				$objPollVote->setCreateDate($DB->getField("CreateDate"));
				$arr[] = $objPollVote;
			}
		}
		return $arr;
	}
	
	public function findAllByPollId($PollId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";		
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objPollVote = new PollVoteBean();
				$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				$objPollVote->setUserId($DB->getField("UserId"));
				$objPollVote->setPollId($DB->getField("PollId"));
				$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
				$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				$objPollVote->setCreateDate($DB->getField("CreateDate"));
				$arr[] = $objPollVote;
			}
		}
		return $arr;
	}
	
	public function findByPollAndPollAnswerId($PollId, $PollAnswerId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";
		$query .= " AND PollAnswerId = '".$PollAnswerId."'";		
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objPollVote = new PollVoteBean();
				$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				$objPollVote->setUserId($DB->getField("UserId"));
				$objPollVote->setPollId($DB->getField("PollId"));
				$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
				$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				$objPollVote->setCreateDate($DB->getField("CreateDate"));
				$arr[] = $objPollVote;
			}
		}
		return $arr;
	}
	
	public function findByPollAndUserAndPollAnswerId($PollId, $UserId, $PollAnswerId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";
		$query .= " AND UserId = '".$UserId."'";
		$query .= " AND PollAnswerId = '".$PollAnswerId."'";
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objPollVote = new PollVoteBean();
				$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				$objPollVote->setUserId($DB->getField("UserId"));
				$objPollVote->setPollId($DB->getField("PollId"));
				$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
				$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				$objPollVote->setCreateDate($DB->getField("CreateDate"));
				$arr[] = $objPollVote;
			}
		}
		return $arr;
	}
	
	public function findByPollAndUserAndPollOpenAnswer($PollId, $UserId, $PollOpenAnswer){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollVoteId, UserId, PollId, PollAnswerId, PollOpenAnswer, CreateDate";
		$query .= " FROM PollVote";
		$query .= " WHERE PollId = '".$PollId."'";
		$query .= " AND UserId = '".$UserId."'";
		$query .= " AND PollOpenAnswer = '".$PollOpenAnswer."'";
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objPollVote = new PollVoteBean();
				$objPollVote->setPollVoteId($DB->getField("PollVoteId"));
				$objPollVote->setUserId($DB->getField("UserId"));
				$objPollVote->setPollId($DB->getField("PollId"));
				$objPollVote->setPollAnswerId($DB->getField("PollAnswerId"));
				$objPollVote->setPollOpenAnswer($DB->getField("PollOpenAnswer"));
				$objPollVote->setCreateDate($DB->getField("CreateDate"));
				$arr[] = $objPollVote;
			}
		}
		return $arr;
	}
}
?>