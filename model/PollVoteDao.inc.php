<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollVoteBean.inc.php");

class PollVoteDao{

   function __construct(){
   }
   public function create($objPollVoteBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO PollVote(PollVoteId,UserId,PollId,PollAnswerId,PollOpenAnswer,CreateDate) ";
      $query.= "VALUES('".$objPollVoteBean->getPollVoteId()."','".$objPollVoteBean->getUserId()."','".$objPollVoteBean->getPollId()."','".$objPollVoteBean->getPollAnswerId()."','".mysql_real_escape_string($objPollVoteBean->getPollOpenAnswer())."','".$objPollVoteBean->getCreateDate()."') ";	  
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objPollVoteBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE PollVote SET ";
      $query.="UserId='".$objPollVoteBean->getUserId()."',";
      $query.="PollId='".$objPollVoteBean->getPollId()."',";
      $query.="PollAnswerId='".$objPollVoteBean->getPollAnswerId()."',";
      $query.="PollOpenAnswer='".$objPollVoteBean->getPollOpenAnswer()."',";
      $query.="CreateDate='".$objPollVoteBean->getCreateDate()."' ";
      $query.="WHERE PollVoteId=".$objPollVoteBean->getPollVoteId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT PollVoteId,UserId,PollId,PollAnswerId,PollOpenAnswer,CreateDate FROM PollVote";
      $query.=" WHERE PollVoteId=".$id;
      $DB->query($query);
      $objPollVoteBean= new PollVoteBean();
      $objPollVoteBean->setPollVoteId($DB->getField("PollVoteId"));
      $objPollVoteBean->setUserId($DB->getField("UserId"));
      $objPollVoteBean->setPollId($DB->getField("PollId"));
      $objPollVoteBean->setPollAnswerId($DB->getField("PollAnswerId"));
      $objPollVoteBean->setPollOpenAnwer($DB->getField("PollOpenAnswer"));
      $objPollVoteBean->setCreateDate($DB->getField("CreateDate"));      
      return $objPollVoteBean;
   }
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from PollVote ";
      $query.="WHERE PollVoteId=".$id;
      $DB->query($query);
   }
}
?>