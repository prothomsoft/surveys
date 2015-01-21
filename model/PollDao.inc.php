<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollBean.inc.php");

/**
 * PollDAO
 * 
 * database access class - CRUD methods for table Poll
 */
class PollDao{

   function __construct(){
   }
   public function create($objPollBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Poll(Question,OpenQuestion,CreateDate,Status,PollOrder) ";
      $query.= "VALUES('".$objPollBean->getQuestion()."','".$objPollBean->getOpenQuestion()."','".$objPollBean->getCreateDate()."','".$objPollBean->getStatus()."','".$objPollBean->getPollOrder()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objPollBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Poll SET ";
      $query.="Question='".$objPollBean->getQuestion()."',";
      $query.="OpenQuestion='".$objPollBean->getOpenQuestion()."',";
      $query.="CreateDate='".$objPollBean->getCreateDate()."',";
      $query.="Status='".$objPollBean->getStatus()."',";
      $query.="PollOrder='".$objPollBean->getPollOrder()."' ";
      $query.="WHERE PollId=".$objPollBean->getPollId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT PollId,Question,OpenQuestion,CreateDate,Status,PollOrder FROM Poll";
      $query.=" WHERE PollId=".$id;
      $DB->query($query);
      $objPollBean= new PollBean();
      $objPollBean->setPollId($DB->getField("PollId"));
      $objPollBean->setQuestion($DB->getField("Question"));
      $objPollBean->setOpenQuestion($DB->getField("OpenQuestion"));
      $objPollBean->setCreateDate($DB->getField("CreateDate"));
      $objPollBean->setStatus($DB->getField("Status"));
      $objPollBean->setPollOrder($DB->getField("PollOrder"));
      
      return $objPollBean;
   }
   
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Poll ";
      $query.="WHERE PollId=".$id;
      $DB->query($query);
   }
   
   public function deleteEmptyRecords(){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Poll ";
      $query.="WHERE CreateDate='0000-00-00'";
      $DB->query($query);
   } 
}
?>