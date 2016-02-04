<?php
/**
 * TopicBEAN
 * 
 * accessors' class for data retrieved from Topic
 */
class TopicBean{
   private $TopicId;
   private $UpdateCategoryId;
   private $Question;
   private $OpenQuestion;
   private $CreateDate;
   private $Status;
   private $TopicOrder;
   
   
   public function setTopicId($val){
      $this->TopicId=$val;
   }

   public function getTopicId(){
      return $this->TopicId;
   }
   
   public function setUpdateCategoryId($val){
      $this->UpdateCategoryId=$val;
   }

   public function getUpdateCategoryId(){
      return $this->UpdateCategoryId;
   }
         
   public function setQuestion($val){
      $this->Question=$val;
   }

   public function getQuestion(){
      return $this->Question;
   }
   
   public function setOpenQuestion($val){
   	$this->OpenQuestion=$val;
   }
   
   public function getOpenQuestion(){
   	return $this->OpenQuestion;
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
   
   public function setTopicOrder($val){
   	$this->TopicOrder=$val;
   }
   
   public function getTopicOrder(){
   	return $this->TopicOrder;
   }
}
?>