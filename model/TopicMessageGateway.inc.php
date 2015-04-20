<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/TopicMessageBean.inc.php");

class TopicMessageGateway {
	
	public function findByTopicAndUserId($TopicId, $UserId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT TopicMessageId, UserId, TopicId, Message, CreateDateTime";
		$query .= " FROM TopicMessage";
		$query .= " WHERE TopicId = '".$TopicId."'";
		$query .= " AND UserId = '".$UserId."'";		
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objTopicMessage = new TopicMessageBean();
	      			$objTopicMessage->setTopicMessageId($DB->getField("TopicMessageId"));
	      			$objTopicMessage->setUserId($DB->getField("UserId"));
	      			$objTopicMessage->setTopicId($DB->getField("TopicId"));
	      			$objTopicMessage->setMessage($DB->getField("Message"));
				    $objTopicMessage->setCreateDateTime($DB->getField("CreateDateTime"));				    
				    $arr[] = $objTopicMessage;
	      		}
	      }
	      return $arr;
	}

	public function findByTopicId($TopicId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT TopicMessageId, UserId, TopicId, Message, CreateDateTime";
		$query .= " FROM TopicMessage";
		$query .= " WHERE TopicId = '".$TopicId."'";
		$query .= " ORDER BY CreateDateTime DESC";				
		$DB->query($query);
	
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
				$objTopicMessage = new TopicMessageBean();
				$objTopicMessage->setTopicMessageId($DB->getField("TopicMessageId"));
				$objTopicMessage->setUserId($DB->getField("UserId"));
				$objTopicMessage->setTopicId($DB->getField("TopicId"));
				$objTopicMessage->setMessage($DB->getField("Message"));
				$objTopicMessage->setCreateDateTime($DB->getField("CreateDateTime"));
				$arr[] = $objTopicMessage;
			}
		}
		return $arr;
	}	
}
?>