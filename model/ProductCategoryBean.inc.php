<?php

class ProductCategoryBean{
   private $ProductCategoryId;
   private $FatherId;
   private $Name;
   private $Descr;
   private $SeoName;
   private $ListOrder;
   private $Img;
   private $NumberOfItems;

   public function setProductCategoryId($val){
      $this->ProductCategoryId=$val;
   }

   public function getProductCategoryId(){
      return $this->ProductCategoryId;
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
   
   public function setDescr($val){
      $this->Descr=$val;
   }

   public function getDescr(){
      return $this->Descr;
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

   public function setImg($val){
      $this->Img=$val;
   }

   public function getImg(){
      return $this->Img;
   }

   public function setNumberOfItems($val){
      $this->NumberOfItems=$val;
   }

   public function getNumberOfItems(){
      return $this->NumberOfItems;
   }

}
?>