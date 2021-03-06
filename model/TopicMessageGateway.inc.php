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
    
    public function findTopicMessagesByTopicId($TopicId){
      $DB = new DB();
      $DB->connect();
      
      $query  = "SELECT u.UserId, u.Email, tm.CreateDateTime, tm.Message ";
      $query .= "FROM TopicMessage tm, User u ";
      $query .= " WHERE tm.UserId = u.UserId";
      $query .= " AND tm.TopicId =  '".$TopicId."'"; 
      $query .= " ORDER BY tm.CreateDateTime DESC;";
      $DB->query($query);
      $i = 0;
      $value = "";
      if ($DB->numRows() > 0) {
            while($DB->move_next()) {
                $frenchHour = date("H", strtotime($DB->getField("CreateDateTime")));
                $frenchMinutes = date("i", strtotime($DB->getField("CreateDateTime")));
                $frenchTime = $frenchHour."h".$frenchMinutes;
                $value{"TopicMessage"}{$i}{"UserId"} = $DB->getField("UserId");
                $value{"TopicMessage"}{$i}{"Email"} = $DB->getField("Email");
                $value{"TopicMessage"}{$i}{"CreateDateTime"} = $frenchTime;
                $value{"TopicMessage"}{$i}{"Message"} = $DB->getField("Message");
                $i++;
            }
      }
      return json_encode($value);
   }	
}
?>