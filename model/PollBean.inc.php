<?php
require_once(dirname(__FILE__)."/ClubDao.inc.php");
require_once(dirname(__FILE__)."/BetaDao.inc.php");

/**
 * PollBEAN
 * 
 * accessors' class for data retrieved from Poll
 */
class PollBean{
   private $PollId;
   private $Question;
   private $CreateDate;
   private $Status;
   private $PollOrder;
   
   
   public function setPollId($val){
      $this->PollId=$val;
   }

   public function getPollId(){
      return $this->PollId;
   }
         
   public function setQuestion($val){
      $this->Question=$val;
   }

   public function getQuestion(){
      return $this->Question;
   }
   
   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }

   public function setStatus($val){
      $this->Status=$val;
   }

   public function getStatus(){
      return $this->Status;
   }
   
   public function setPollOrder($val){
   	$this->PollOrder=$val;
   }
   
   public function getPollOrder(){
   	return $this->PollOrder;
   }
}
?>