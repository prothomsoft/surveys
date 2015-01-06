<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollAnswerBean.inc.php");

class PollAnswerGateway {
	
	public function getByPollId($PollId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT PollAnswerId, PollAnswer, PollAnswerOrder";
		$query .= " FROM PollAnswer";
		$query .= " WHERE PollId = '".$PollId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objPollAnswer = new PollAnswerBean();
	      			$objPollAnswer->setPollAnswerId($DB->getField("PollAnswerId"));
				    $objPollAnswer->setPollAnswer($DB->getField("PollAnswer"));
				    $objPollAnswer->setPollAnswerOrder($DB->getField("PollAnswerOrder"));				    
				    $arr[] = $objPollAnswer;
	      		}
	      }
	      return $arr;
	}		
}
?>