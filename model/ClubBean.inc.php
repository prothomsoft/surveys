<?php
require_once(dirname(__FILE__)."/UserDao.inc.php");

/**
 * ClubBEAN
 * 
 * accessors' class for data retrieved from Club
 */
class ClubBean{
   private $ClubId;
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $Address;
   private $ShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $ClubOrder;
   private $Status;
   private $ImgDriveName;
   
   private $Manager;
   private $Phone;
   private $Email;
   private $Route;
   private $Lat;
   private $Lng;
   private $IsClub;
   
   
   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
   }
      
   public function setName($val){
      $this->Name=$val;
   }

   public function getName(){
      return $this->Name;
   }
   
   public function setSeoName($val){
      $this->SeoName=$val;
   }

   public function getSeoName(){
      return $this->SeoName;
   }


   public function setKeyword($val){
      $this->Keyword=$val;
   }

   public function getKeyword(){
      return $this->Keyword;
   }

   public function setDescription($val){
      $this->Description=$val;
   }

   public function getDescription(){
      return $this->Description;
   }
   
   public function setAddress($val){
      $this->Address=$val;
   }

   public function getAddress(){
      return $this->Address;
   }
   
   public function setShortDescription($val){
      $this->ShortDescription=$val;
   }

   public function getShortDescription(){
      return $this->ShortDescription;
   }
   

   public function setLongDescription($val){
      $this->LongDescription=$val;
   }

   public function getLongDescription(){
      return $this->LongDescription;
   }
      
   public function setUpdateDate($val){
      $this->UpdateDate=$val;
   }

   public function getUpdateDate(){
      return $this->UpdateDate;
   }

   public function setClubOrder($val){
      $this->ClubOrder=$val;
   }

   public function getClubOrder(){
      return $this->ClubOrder;
   }

   public function setStatus($val){
      $this->Status=$val;
   }

   public function getStatus(){
      return $this->Status;
   }
   
   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }
   
   public function setManager($val){
      $this->Manager=$val;
   }

   public function getManager(){
      return $this->Manager;
   }
   
   public function setPhone($val){
      $this->Phone=$val;
   }

   public function getPhone(){
      return $this->Phone;
   }
   
   public function setEmail($val){
      $this->Email=$val;
   }

   public function getEmail(){
      return $this->Email;
   }
   
   public function setRoute($val){
      $this->Route=$val;
   }

   public function getRoute(){
      return $this->Route;
   }
   
   public function setLat($val){
      $this->Lat=$val;
   }

   public function getLat(){
      return $this->Lat;
   }
   
   public function setLng($val){
      $this->Lng=$val;
   }

   public function getLng(){
      return $this->Lng;
   }
   
   public function setIsClub($val){
      $this->IsClub=$val;
   }

   public function getIsClub(){
      return $this->IsClub;
   }
   
   
}
?>