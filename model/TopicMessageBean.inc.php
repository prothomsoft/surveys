<?php
require_once(dirname(__FILE__)."/TopicMessageDao.inc.php");

class TopicMessageBean{
   private $TopicMessageId;
   private $UserId;
   private $TopicId;   
   private $Message;
   private $CreateDateTime;
      
   
   public function setTopicMessageId($val){
      $this->TopicMessageId=$val;
   }

   public function getTopicMessageId(){
      return $this->TopicMessageId;
   }
   
   public function setUserId($val){
   	$this->UserId=$val;
   }
    
   public function getUserId(){
   	return $this->UserId;
   }

   public function setTopicId($val){
      $this->TopicId=$val;
   }

   public function getTopicId(){
      return $this->TopicId;
   }
   
   public function setMessage($val){
   	$this->Message=$val;
   }
    
   public function getMessage(){
   	return $this->Message;
   }
   
   public function setCreateDateTime($val){
      $this->CreateDateTime=$val;
   }

   public function getCreateDateTime(){
      return $this->CreateDateTime;
   }  
}
?>