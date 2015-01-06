<?php
require_once(dirname(__FILE__)."/UserDao.inc.php");

/**
 * BetaBEAN
 * 
 * accessors' class for data retrieved from Beta
 */
class BetaBean{
   private $BetaId;
   private $ClubId;
   private $GamaId;
   private $User;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $ShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $BetaOrder;
   private $Status;
   private $ImgDriveName;
   private $EventDate;
   
   
   public function setBetaId($val){
      $this->BetaId=$val;
   }

   public function getBetaId(){
      return $this->BetaId;
   }
               
   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
   }
   
   public function setGamaId($val){
      $this->GamaId=$val;
   }

   public function getGamaId(){
      return $this->GamaId;
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

   public function setBetaOrder($val){
      $this->BetaOrder=$val;
   }

   public function getBetaOrder(){
      return $this->BetaOrder;
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
   
   public function setEventDate($val){
      $this->EventDate=$val;
   }

   public function getEventDate(){
      return $this->EventDate;
   }
}
?>