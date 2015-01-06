<?php
class CmsCategoryPlainBean{
   private $CmsCategoryPlainId;
   private $CategoryId;
   private $CategoryName;
   private $CategorySeoName;
     
   public function setCmsCategoryPlainId($val){
      $this->CmsCategoryPlainId=$val;
   }

   public function getCmsCategoryPlainId(){
      return $this->CmsCategoryPlainId;
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