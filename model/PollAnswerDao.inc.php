<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollAnswerBean.inc.php");

class PollAnswerDao{

   function __construct(){
   }
   public function create($objPollAnswerBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO PollAnswer(PollId,PollAnswer,PollAnswerOrder) ";
      $query.= "VALUES('".$objPollAnswerBean->getPollId()."','".$objPollAnswerBean->getPollAnswer()."','".$objPollAnswerBean->getPollAnswerOrder()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objPollAnswerBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE PollAnswer SET ";
      $query.="PollId='".$objPollAnswerBean->getPollId()."',";
      $query.="PollAnswer='".$objPollAnswerBean->getPollAnswer()."',";
      $query.="PollAnswerOrder='".$objPollAnswerBean->getPollAnswerOrder()."' ";
      $query.="WHERE PollAnswerId=".$objPollAnswerBean->getPollAnswerId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT PollAnswerId,PollId,PollAnswer,PollAnswerOrder FROM PollAnswer";
      $query.=" WHERE PollAnswerId=".$id;
      $DB->query($query);
      $objPollAnswerBean= new PollAnswerBean();
      $objPollAnswerBean->setPollAnswerId($DB->getField("PollAnswerId"));
      $objPollAnswerBean->setPollId($DB->getField("PollId"));
      $objPollAnswerBean->setPollAnswer($DB->getField("PollAnswer"));
      $objPollAnswerBean->setPollAnswerOrder($DB->getField("PollAnswerOrder"));
      
      return $objPollAnswerBean;
   }
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from PollAnswer ";
      $query.="WHERE PollAnswerId=".$id;
      $DB->query($query);
   }
}
?>