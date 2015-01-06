<?php
require_once(dirname(__FILE__)."/ClubDao.inc.php");
require_once(dirname(__FILE__)."/BetaDao.inc.php");

/**
 * AlfaBEAN
 * 
 * accessors' class for data retrieved from Alfa
 */
class AlfaBean{
   private $AlfaId;
   private $ClubId;
   private $BetaId;
   private $Beta;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $ShortDescription;
   private $VeryShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $AlfaOrder;
   private $Status;
   private $ImgDriveName;
   private $ImgDriveNameHeader;
   private $EventDate;
   private $EventCalendar;
   private $YouTube;
   
   
   
   public function setAlfaId($val){
      $this->AlfaId=$val;
   }

   public function getAlfaId(){
      return $this->AlfaId;
   }
               
   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
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
   
   public function setVeryShortDescription($val){
      $this->VeryShortDescription=$val;
   }

   public function getVeryShortDescription(){
      return $this->VeryShortDescription;
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

   public function setAlfaOrder($val){
      $this->AlfaOrder=$val;
   }

   public function getAlfaOrder(){
      return $this->AlfaOrder;
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
   
   public function setImgDriveNameHeader($val){
      $this->ImgDriveNameHeader=$val;
   }

   public function getImgDriveNameHeader(){
      return $this->ImgDriveNameHeader;
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
   
   public function setYouTube($val){
      $this->YouTube=$val;
   }

   public function getYouTube(){
      return $this->YouTube;
   }
}
?>