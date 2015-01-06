<?php
require_once(dirname(__FILE__)."/DeltaDao.inc.php");
require_once(dirname(__FILE__)."/BetaDao.inc.php");

/**
 * SigmaBEAN
 * 
 * accessors' class for data retrieved from Sigma
 */
class SigmaBean{
   private $SigmaId;
   private $DeltaId;
   private $Delta;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $Keyword;
   private $Description;
   private $ShortDescription;
   private $LongDescription;
   private $UpdateDate;
   private $SigmaOrder;
   private $Status;
   private $ImgDriveName;
   private $EventDate;
   private $EventCalendar;
   
   
   
   public function setSigmaId($val){
      $this->SigmaId=$val;
   }

   public function getSigmaId(){
      return $this->SigmaId;
   }
               
   public function setDeltaId($val){
      $this->DeltaId=$val;
   }

   public function getDeltaId(){
      return $this->DeltaId;
   }
   
   public function getDelta(){   // additional getter for foreign key object
      if(!is_object($this->Delta)){
         $objDeltaDao = new DeltaDao();
         $objDeltaBean = $objDeltaDao->read($this->getDeltaId());
         $this->Delta = $objDeltaBean;
      }
      return $this->Delta;
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

   public function setSigmaOrder($val){
      $this->SigmaOrder=$val;
   }

   public function getSigmaOrder(){
      return $this->SigmaOrder;
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