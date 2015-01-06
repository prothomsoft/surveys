<?php
class ProductCategoryPlainBean{
   private $ProductCategoryPlainId;
   private $ProductCategoryId;
   private $ProductCategoryName;
   private $ProductCategorySeoName;
  
   public function setProductCategoryPlainId($val){
      $this->ProductCategoryPlainId=$val;
   }

   public function getProductCategoryPlainId(){
      return $this->ProductCategoryPlainId;
   }

   public function setProductCategoryId($val){
      $this->ProductCategoryId=$val;
   }

   public function getProductCategoryId(){
      return $this->ProductCategoryId;
   }

   public function setProductCategoryName($val){
      $this->ProductCategoryName=$val;
   }

   public function getProductCategoryName(){
      return $this->ProductCategoryName;
   }
   
   public function setProductCategorySeoName($val){
      $this->ProductCategorySeoName=$val;
   }

   public function getProductCategorySeoName(){
      return $this->ProductCategorySeoName;
   }
}
?>