<?php
require_once(dirname(__FILE__)."/PollVoteDao.inc.php");

class PollVoteBean{
   private $PollVoteId;
   private $UserId;
   private $PollId;
   private $PollAnswerId;
   private $PollOpenAnswer;
   private $CreateDate;
      
   
   public function setPollVoteId($val){
      $this->PollVoteId=$val;
   }

   public function getPollVoteId(){
      return $this->PollVoteId;
   }
   
   public function setUserId($val){
   	$this->UserId=$val;
   }
    
   public function getUserId(){
   	return $this->UserId;
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
   
   public function setPollOpenAnswer($val){
   	$this->PollOpenAnswer=$val;
   }
    
   public function getPollOpenAnswer(){
   	return $this->PollOpenAnswer;
   }
   
   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }  
}
?>