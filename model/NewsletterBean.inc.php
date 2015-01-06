<?php
class NewsletterBean{
   private $NewsletterId;
   private $Email;
   private $CreateDate;

   public function setNewsletterId($val){
      $this->NewsletterId=$val;
   }

   public function getNewsletterId(){
      return $this->NewsletterId;
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
   
}
?>