<?php
class SearchBean{
   private $SearchId;
   private $Keyword;
   private $CreateDate;

   public function setSearchId($val){
      $this->SearchId=$val;
   }

   public function getSearchId(){
      return $this->SearchId;
   }

   public function setKeyword($val){
      $this->Keyword=$val;
   }

   public function getKeyword(){
      return $this->Keyword;
   }
   
   public function setCreateDate($val){
      $this->CreateDate=$val;
   }

   public function getCreateDate(){
      return $this->CreateDate;
   }
   
}
?>