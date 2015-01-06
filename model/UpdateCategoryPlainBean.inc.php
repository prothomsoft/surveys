<?php

/**
 * UpdateCategoryPlainBEAN
 * 
 * accessors' class for data retrieved from UpdateCategoryPlain
 */
class UpdateCategoryPlainBean{
   private $UpdateCategoryPlainId;
   private $CategoryId;
   private $CategoryName;
   private $CategorySeoName;
     
   public function setUpdateCategoryPlainId($val){
      $this->UpdateCategoryPlainId=$val;
   }

   public function getUpdateCategoryPlainId(){
      return $this->UpdateCategoryPlainId;
   }

   public function setCategoryId($val){
      $this->CategoryId=$val;
   }

   public function getCategoryId(){
      return $this->CategoryId;
   }

   public function setCategoryName($val){
      $this->CategoryName=$val;
   }

   public function getCategoryName(){
      return $this->CategoryName;
   }
   
   public function setCategorySeoName($val){
      $this->CategorySeoName=$val;
   }

   public function getCategorySeoName(){
      return $this->CategorySeoName;
   }
}
?>