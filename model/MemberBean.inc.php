<?php
class MemberBean{
   private $MemberId;
   private $Name;
   private $Adresse;
   private $Postnummer;
   private $Sted;
	private $Telefon;
	private $Email;
	private $Kommentar;
	private $YourOption;
	private $PaymentStatus;
	private $MembershipStatus;
   
   private $CreateDate;

   public function setMemberId($val){
      $this->MemberId=$val;
   }

   public function getMemberId(){
      return $this->MemberId;
   }
   
   public function setName($val){
      $this->Name=$val;
   }

   public function getName(){
      return $this->Name;
   }
   
   public function setAdresse($val){
      $this->Adresse=$val;
   }

   public function getAdresse(){
      return $this->Adresse;
   }
   
   public function setPostnummer($val){
      $this->Postnummer=$val;
   }

   public function getPostnummer(){
      return $this->Postnummer;
   }
   
   public function setSted($val){
      $this->Sted=$val;
   }

   public function getSted(){
      return $this->Sted;
   }
   
   public function setTelefon($val){
      $this->Telefon=$val;
   }

   public function getTelefon(){
      return $this->Telefon;
   }

   public function setEmail($val){
      $this->Email=$val;
   }

   public function getEmail(){
      return $this->Email;
   }
   
   public function setKommentar($val){
      $this->Kommentar=$val;
   }

   public function getKommentar(){
      return $this->Kommentar;
   }
   
   public function setYourOption($val){
      $this->YourOption=$val;
   }

   public function getYourOption(){
      return $this->YourOption;
   }
   
   public function setPaymentStatus($val){
      $this->PaymentStatus=$val;
   }

   public function getPaymentStatus(){
      return $this->PaymentStatus;
   }
   
   public function setMembershipStatus($val){
      $this->MembershipStatus=$val;
   }

   public function getMembershipStatus(){
      return $this->MembershipStatus;
   }
   
   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }
   
}
?>