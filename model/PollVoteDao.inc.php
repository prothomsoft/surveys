<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollVoteBean.inc.php");

class PollVoteDao{

   function __construct(){
   }
   public function create($objPollVoteBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO PollVote(PollId,PollAnswerId,UserId,PollVote,PollVoteOrder) ";
      $query.= "VALUES('".$objPollVoteBean->getPollId()."','".$objPollVoteBean->getPollAnswerId()."','".$objPollVoteBean->getUserId()."','".$objPollVoteBean->getPollVote()."','".$objPollVoteBean->getPollVoteOrder()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objPollVoteBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE PollVote SET ";
      $query.="PollId='".$objPollVoteBean->getPollId()."',";
      $query.="PollAnswerId='".$objPollVoteBean->getPollAnswerId()."',";
      $query.="UserId='".$objPollVoteBean->getUserId()."',";
      $query.="PollVote='".$objPollVoteBean->getPollVote()."',";
      $query.="PollVoteOrder='".$objPollVoteBean->getPollVoteOrder()."' ";
      $query.="WHERE PollVoteId=".$objPollVoteBean->getPollVoteId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT PollVoteId,PollId,PollAnswerId,UserId,PollVote,PollVoteOrder FROM PollVote";
      $query.=" WHERE PollVoteId=".$id;
      $DB->query($query);
      $objPollVoteBean= new PollVoteBean();
      $objPollVoteBean->setPollVoteId($DB->getField("PollVoteId"));
      $objPollVoteBean->setPollId($DB->getField("PollId"));
      $objPollVoteBean->setPollAnwerId($DB->getField("PollAnswerId"));
      $objPollVoteBean->setUserId($DB->getField("UserId"));
      $objPollVoteBean->setPollVote($DB->getField("PollVote"));
      $objPollVoteBean->setPollVoteOrder($DB->getField("PollVoteOrder"));
      
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