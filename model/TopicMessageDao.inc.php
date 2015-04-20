<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/TopicMessageBean.inc.php");

class TopicMessageDao{

   function __construct(){
   }
   public function create($objTopicMessageBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO TopicMessage(TopicMessageId,UserId,TopicId,Message,CreateDateTime) ";
      $query.= "VALUES('".$objTopicMessageBean->getTopicMessageId()."','".$objTopicMessageBean->getUserId()."','".$objTopicMessageBean->getTopicId()."','".mysql_real_escape_string($objTopicMessageBean->getMessage())."','".$objTopicMessageBean->getCreateDateTime()."') ";	  
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objTopicMessageBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE TopicMessage SET ";
      $query.="UserId='".$objTopicMessageBean->getUserId()."',";
      $query.="TopicId='".$objTopicMessageBean->getTopicId()."',";
      $query.="Message='".$objTopicMessageBean->getMessage()."',";
      $query.="CreateDateTime='".$objTopicMessageBean->getCreateDateTime()."' ";
      $query.="WHERE TopicMessageId=".$objTopicMessageBean->getTopicMessageId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT TopicMessageId,UserId,TopicId,Message,CreateDateTime FROM TopicMessage";
      $query.=" WHERE TopicMessageId=".$id;
      $DB->query($query);
      $objTopicMessageBean= new TopicMessageBean();
      $objTopicMessageBean->setTopicMessageId($DB->getField("TopicMessageId"));
      $objTopicMessageBean->setUserId($DB->getField("UserId"));
      $objTopicMessageBean->setTopicId($DB->getField("TopicId"));
      $objTopicMessageBean->setTopicOpenAnwer($DB->getField("Message"));
      $objTopicMessageBean->setCreateDateTime($DB->getField("CreateDateTime"));      
      return $objTopicMessageBean;
   }
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from TopicMessage ";
      $query.="WHERE TopicMessageId=".$id;
      $DB->query($query);
   }
}
?>