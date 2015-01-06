<?php
require_once(dirname(__FILE__)."/CmsContentDao.inc.php");
require_once(dirname(__FILE__)."/CmsCategoryDao.inc.php");

class CmsCategoryBean{
   private $CmsCategoryId;
   private $FatherId;
   private $Name;
   private $SeoName;
   private $TransEN;
   private $TransDE;
   private $TransRU;
   private $ListOrder;
   private $Url;
   private $IsModule;
   private $NumberOfItems;
   private $CmsContent;   // additional property for foreign key object

   public function setCmsCategoryId($val){
      $this->CmsCategoryId=$val;
   }

   public function getCmsCategoryId(){
      return $this->CmsCategoryId;
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
   
   public function setTransEN($val){
      $this->TransEN=$val;
   }

   public function getTransEN(){
      return $this->TransEN;
   }
   
   public function setTransDE($val){
      $this->TransDE=$val;
   }

   public function getTransDE(){
      return $this->TransDE;
   }
   
   public function setTransRU($val){
      $this->TransRU=$val;
   }

   public function getTransRU(){
      return $this->TransRU;
   }

   public function setListOrder($val){
      $this->ListOrder=$val;
   }

   public function getListOrder(){
      return $this->ListOrder;
   }

   public function setUrl($val){
      $this->Url=$val;
   }

   public function getUrl(){
      return $this->Url;
   }
   
   public function setIsModule($val){
      $this->IsModule=$val;
   }

   public function getIsModule(){
      return $this->IsModule;
   }

   public function setNumberOfItems($val){
      $this->NumberOfItems=$val;
   }

   public function getNumberOfItems(){
      return $this->NumberOfItems;
   }
   
   public function getCmsContent(){   // additional getter for foreign key object
      if(!is_object($this->CmsContent)){
         $objCmsContentDao = new CmsContentDao();
         $objCmsContentBean = $objCmsContentDao->readByCategoryId($this->getCmsCategoryId());
         $this->CmsContent = $objCmsContentBean;
      }
      return $this->CmsContent;
   }

}
?>