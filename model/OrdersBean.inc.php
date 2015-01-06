<?php

/**
 * OrdersBEAN
 * 
 * accessors' class for data retrieved from Orders
 */
class OrdersBean{
   private $OrderId;
   private $UserId;
   private $CreateDate;
   private $AuthorizeDate;
   private $AuthorizeStatus;
   private $AuthorizeMail;
   private $CustomerInformation;
   private $Comments;
   private $Amount;
   private $IsSend;
   private $IsPointed;
   private $PointComment;
   private $ShipName;
   private $PaymentName;
   private $ShipPrice;
   
   private $NameFirst;
   private $NameLast;
   private $Street;
   private $Number;
   private $Zip;
   private $City;
   private $Phone1;
   private $Country;
   private $Organization;
   private $OrganizationEmail;
   
   public function setOrderId($val){
      $this->OrderId=$val;
   }

   public function getOrderId(){
      return $this->OrderId;
   }
   
   public function setUserId($val){
      $this->UserId=$val;
   }

   public function getUserId(){
      return $this->UserId;
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
   
   public function setAuthorizeMail($val){
      $this->AuthorizeMail=$val;
   }

   public function getAuthorizeMail(){
      return $this->AuthorizeMail;
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
   
   public function setIsPointed($val){
      $this->IsPointed=$val;
   }

   public function getIsPointed(){
      return $this->IsPointed;
   }
   
   public function setPointComment($val){
      $this->PointComment=$val;
   }

   public function getPointComment(){
      return $this->PointComment;
   }
   
   public function setShipName($val){
      $this->ShipName=$val;
   }

   public function getShipName(){
      return $this->ShipName;
   }
   
   public function setPaymentName($val){
      $this->PaymentName=$val;
   }

   public function getPaymentName(){
      return $this->PaymentName;
   }
   
   public function setShipPrice($val){
      $this->ShipPrice=$val;
   }

   public function getShipPrice(){
      return $this->ShipPrice;
   }
   
      public function setNameFirst($val){
      $this->NameFirst=$val;
   }

   public function getNameFirst(){
      return $this->NameFirst;
   }
   
   public function setNameLast($val){
      $this->NameLast=$val;
   }

   public function getNameLast(){
      return $this->NameLast;
   }
   
   public function setStreet($val){
      $this->Street=$val;
   }

   public function getStreet(){
      return $this->Street;
   }
   
   public function setNumber($val){
      $this->Number=$val;
   }

   public function getNumber(){
      return $this->Number;
   }
   
   public function setZip($val){
      $this->Zip=$val;
   }

   public function getZip(){
      return $this->Zip;
   }
   
   public function setCity($val){
      $this->City=$val;
   }

   public function getCity(){
      return $this->City;
   }
   
   public function setPhone1($val){
      $this->Phone1=$val;
   }

   public function getPhone1(){
      return $this->Phone1;
   }
   
   public function setCountry($val){
      $this->Country=$val;
   }

   public function getCountry(){
      return $this->Country;
   }
   
   public function setOrganization($val){
   	$this->Organization=$val;
   }
   
   public function getOrganization(){
   	return $this->Organization;
   }
   
   public function setOrganizationEmail($val){
   	$this->OrganizationEmail=$val;
   }
   
   public function getOrganizationEmail(){
   	return $this->OrganizationEmail;
   }
   
}
?>