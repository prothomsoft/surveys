<?php

/**
 * PointsBEAN
 * 
 * accessors' class for data retrieved from Points
 */
class PointsBean{
   private $PointId;
   private $UserId;
   private $OrderId;
   private $CreateDate;
   private $AuthorizeDate;
   private $AuthorizeStatus;
   private $CustomerInformation;
   private $Comments;
   private $Amount;
   private $IsSend;
   private $IsReceived;

   public function setPointId($val){
      $this->PointId=$val;
   }

   public function getPointId(){
      return $this->PointId;
   }
   
   public function setUserId($val){
      $this->UserId=$val;
   }

   public function getUserId(){
      return $this->UserId;
   }
   
   public function setOrderId($val){
      $this->OrderId=$val;
   }

   public function getOrderId(){
      return $this->OrderId;
   }

   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }

   public function setAuthorizeDate($val){
      $this->AuthorizeDate=$val;
   }

   public function getAuthorizeDate(){
      return $this->AuthorizeDate;
   }

   public function setAuthorizeStatus($val){
      $this->AuthorizeStatus=$val;
   }

   public function getAuthorizeStatus(){
      return $this->AuthorizeStatus;
   }
   
   public function setCustomerInformation($val){
      $this->CustomerInformation=$val;
   }

   public function getCustomerInformation(){
      return $this->CustomerInformation;
   }
   
   public function setComments($val){
      $this->Comments=$val;
   }

   public function getComments(){
      return $this->Comments;
   }
   
   public function setAmount($val){
      $this->Amount=$val;
   }

   public function getAmount(){
      return $this->Amount;
   }
   
   public function setIsSend($val){
      $this->IsSend=$val;
   }

   public function getIsSend(){
      return $this->IsSend;
   }
   
   public function setIsReceived($val){
      $this->IsReceived=$val;
   }

   public function getIsReceived(){
      return $this->IsReceived;
   }
}
?>