<?php
require_once(dirname(__FILE__)."/PollVoteDao.inc.php");

class PollVoteBean{
   private $PollVoteId;
   private $PollId;
   private $PollAnswerId;
   private $UserId;
   private $PollVote;
   private $PollVoteOrder;   
   
   public function setPollVoteId($val){
      $this->PollVoteId=$val;
   }

   public function getPollVoteId(){
      return $this->PollVoteId;
   }

   public function setPollId($val){
      $this->PollId=$val;
   }

   public function getPollId(){
      return $this->PollId;
   }
   
   public function setPollAnswerId($val){
   	$this->PollAnswerId=$val;
   }
   
   public function getPollAnswerId(){
   	return $this->PollAnswerId;
   }
    
   public function setUserId($val){
   	$this->UserId=$val;
   }
   
   public function getUserId(){
   	return $this->UserId;
   }

   public function setPollVote($val){
      $this->PollVote=$val;
   }

   public function getPollVote(){
      return $this->PollVote;
   }

   public function setPollVoteOrder($val){
      $this->PollVoteOrder=$val;
   }

   public function getPollVoteOrder(){
      return $this->PollVoteOrder;
   }  
}
?>