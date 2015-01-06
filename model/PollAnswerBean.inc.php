<?php
require_once(dirname(__FILE__)."/PollAnswerDao.inc.php");

class PollAnswerBean{
   private $PollAnswerId;
   private $PollId;
   private $PollAnswer;
   private $PollAnswerOrder;   
   
   public function setPollAnswerId($val){
      $this->PollAnswerId=$val;
   }

   public function getPollAnswerId(){
      return $this->PollAnswerId;
   }

   public function setPollId($val){
      $this->PollId=$val;
   }

   public function getPollId(){
      return $this->PollId;
   }

   public function setPollAnswer($val){
      $this->PollAnswer=$val;
   }

   public function getPollAnswer(){
      return $this->PollAnswer;
   }

   public function setPollAnswerOrder($val){
      $this->PollAnswerOrder=$val;
   }

   public function getPollAnswerOrder(){
      return $this->PollAnswerOrder;
   }  
}
?>