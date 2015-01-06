<?php
require_once(dirname(__FILE__)."/UpdateCategoryDao.inc.php");
/**
 * UpdateFileBEAN
 * 
 * accessors' class for data retrieved from UpdateFile
 */
class UpdateFileBean{
   private $UpdateFileId;
   private $UpdateCategoryId;
   private $DriveName;
   private $FileName;
   private $FileDescription;
   private $FileType;
   private $ShortContent;
   private $LongContent;
   private $CreateDate;
   private $UpdateDate;
   
   private $UpdateCategory;
   
   public function setUpdateFileId($val){
      $this->UpdateFileId=$val;
   }

   public function getUpdateFileId(){
      return $this->UpdateFileId;
   }
   
   public function setUpdateCategoryId($val){
      $this->UpdateCategoryId=$val;
   }
   
   public function getUpdateCategoryId(){
      return $this->UpdateCategoryId;
   }

   public function setDriveName($val){
      $this->DriveName=$val;
   }
     
   public function getDriveName(){
      return $this->DriveName;
   }
   
   public function setFileName($val){
      $this->FileName=$val;
   }
     
   public function getFileName(){
      return $this->FileName;
   }
   
   public function setShortContent($val){
      $this->ShortContent=$val;
   }
   
   public function getShortContent(){
      return $this->ShortContent;
   }

   public function setLongContent($val){
      $this->LongContent=$val;
   }
     
   public function getLongContent(){
      return $this->LongContent;
   }

   public function setCreateDate($val){
      $this->CreateDate=$val;
   }
     
   public function getCreateDate(){
      return $this->CreateDate;
   }
   
   public function setUpdateDate($val){
      $this->UpdateDate=$val;
   }
     
   public function getUpdateDate(){
      return $this->UpdateDate;
   }

   public function setFileType($val){
      $this->FileType=$val;
   }
   
   public function getFileType(){
      return $this->FileType;
   }
   
   public function getUpdateCategory(){
      if(!is_object($this->UpdateCategory)){
         $objUpdateCategoryDao = new UpdateCategoryDao();
         $objUpdateCategoryBean = $objUpdateCategoryDao->read($this->getUpdateCategoryId());
         $this->UpdateCategory = $objUpdateCategoryBean;
      }
      return $this->UpdateCategory;
   }   
   
   public function setFileKeywords($val){
      $this->FileKeywords=$val;
   }
   
   public function getFileKeywords(){
      return $this->FileKeywords;
   }
   
   public function setFileDescription($val){
      $this->FileDescription=$val;
   }
   
   public function getFileDescription(){
      return $this->FileDescription;
   }
}
?>