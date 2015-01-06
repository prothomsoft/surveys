<?php
require_once(dirname(__FILE__)."/UserDao.inc.php");

/**
 * GamaBEAN
 * 
 * accessors' class for data retrieved from Gama
 */
class GamaBean{
   private $GamaId;
   private $ClubId;
   private $GminaId;
   private $User;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $ShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $GamaOrder;
   private $Status;
   private $ImgDriveName;
   private $VideoDriveName;
   private $YouTube;
   private $EventDate;
   
   
   public function setGamaId($val){
      $this->GamaId=$val;
   }

   public function getGamaId(){
      return $this->GamaId;
   }
               
   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
   }
   
   public function setGminaId($val){
      $this->GminaId=$val;
   }

   public function getGminaId(){
      return $this->GminaId;
   }

   public function getUser(){   // additional getter for foreign key object
      if(!is_object($this->User)){
         $objUserDao = new UserDao();
         $objUserBean = $objUserDao->read($this->getClubId());
         $this->User = $objUserBean;
      }
      return $this->User;
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

   public function setGamaOrder($val){
      $this->GamaOrder=$val;
   }

   public function getGamaOrder(){
      return $this->GamaOrder;
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
   
   public function setVideoDriveName($val){
      $this->VideoDriveName=$val;
   }

   public function getVideoDriveName(){
      return $this->VideoDriveName;
   }
   
   public function setYouTube($val){
      $this->YouTube=$val;
   }

   public function getYouTube(){
      return $this->YouTube;
   }
   
   public function setEventDate($val){
      $this->EventDate=$val;
   }

   public function getEventDate(){
      return $this->EventDate;
   }
}
?>