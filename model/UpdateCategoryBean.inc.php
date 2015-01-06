<?php
require_once(dirname(__FILE__)."/UpdateFileDao.inc.php");
require_once(dirname(__FILE__)."/UpdateCategoryDao.inc.php");

class UpdateCategoryBean{
   private $UpdateCategoryId;
   private $FatherId;
   private $Name;
   private $SeoName;
   private $ListOrder;
   private $ContentType;
   private $NumberOfItems;
   private $UpdateFile;   // additional property for foreign key object

   public function setUpdateCategoryId($val){
      $this->UpdateCategoryId=$val;
   }

   public function getUpdateCategoryId(){
      return $this->UpdateCategoryId;
   }

   public function setFatherId($val){
      $this->FatherId=$val;
   }

   public function getFatherId(){
      return $this->FatherId;
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

   public function setListOrder($val){
      $this->ListOrder=$val;
   }

   public function getListOrder(){
      return $this->ListOrder;
   }

   public function setContentType($val){
      $this->ContentType=$val;
   }

   public function getContentType(){
      return $this->ContentType;
   }

   public function setNumberOfItems($val){
      $this->NumberOfItems=$val;
   }

   public function getNumberOfItems(){
      return $this->NumberOfItems;
   }
   
   public function getUpdateFile(){   // additional getter for foreign key object
      if(!is_object($this->UpdateFile)){
         $objUpdateFileDao = new UpdateFileDao();
         $objUpdateFileBean = $objUpdateFileDao->readByCategoryId($this->getUpdateCategoryId());
         $this->UpdateFile = $objUpdateFileBean;
      }
      return $this->UpdateFile;
   }

}
?>