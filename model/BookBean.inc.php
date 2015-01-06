<?php
class BookBean{
   private $BookId;
   private $SigmaId;
   private $Email;
   private $CreateDate;
   private $FirstName;
   private $LastName;
   private $CompanyName;
   private $City;
   private $Code;
   private $Street;
   private $Number;
   private $Phone;

   public function setBookId($val){
      $this->BookId=$val;
   }

   public function getBookId(){
      return $this->BookId;
   }
   
   public function setSigmaId($val){
      $this->SigmaId=$val;
   }

   public function getSigmaId(){
      return $this->SigmaId;
   }

   public function setEmail($val){
      $this->Email=$val;
   }

   public function getEmail(){
      return $this->Email;
   }
   
   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }
   
   public function setFirstName($val){
      $this->FirstName=$val;
   }

   public function getFirstName(){
      return $this->FirstName;
   }

   public function setLastName($val){
      $this->LastName=$val;
   }

   public function getLastName(){
      return $this->LastName;
   }
   
   public function setCompanyName($val){
      $this->CompanyName=$val;
   }

   public function getCompanyName(){
      return $this->CompanyName;
   }
   
   public function setCity($val){
      $this->City=$val;
   }

   public function getCity(){
      return $this->City;
   }
   
   public function setCode($val){
      $this->Code=$val;
   }

   public function getCode(){
      return $this->Code;
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

   public function setPhone($val){
      $this->Phone=$val;
   }

   public function getPhone(){
      return $this->Phone;
   }
   
}
?>