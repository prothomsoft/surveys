<?php
require_once(dirname(__FILE__)."/ClubDao.inc.php");
require_once(dirname(__FILE__)."/BetaDao.inc.php");

/**
 * DeltaBEAN
 * 
 * accessors' class for data retrieved from Delta
 */
class DeltaBean{
   private $DeltaId;
   private $ClubId;
   private $Club;   // additional property for foreign key object
   private $BetaId;
   private $Beta;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $ShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $DeltaOrder;
   private $Status;
   private $ImgDriveName;
   private $EventDate;
   private $EventCalendar;
   
   
   
   public function setDeltaId($val){
      $this->DeltaId=$val;
   }

   public function getDeltaId(){
      return $this->DeltaId;
   }
               
   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
   }
   
   public function getClub(){   // additional getter for foreign key object
      if(!is_object($this->Club)){
         $objClubDao = new ClubDao();
         $objClubBean = $objClubDao->read($this->getClubId());
         $this->Club = $objClubBean;
      }
      return $this->Club;
   }
   
   public function setBetaId($val){
      $this->BetaId=$val;
   }

   public function getBetaId(){
      return $this->BetaId;
   }
   
   public function getBeta(){   // additional getter for foreign key object
      if(!is_object($this->Beta)){
         $objBetaDao = new BetaDao();
         $objBetaBean = $objBetaDao->read($this->getBetaId());
         $this->Beta = $objBetaBean;
      }
      return $this->Beta;
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

   public function setDeltaOrder($val){
      $this->DeltaOrder=$val;
   }

   public function getDeltaOrder(){
      return $this->DeltaOrder;
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
   
   public function setEventCalendar($val){
      $this->EventCalendar=$val;
   }

   public function getEventCalendar(){
      return $this->EventCalendar;
   }
}
?>