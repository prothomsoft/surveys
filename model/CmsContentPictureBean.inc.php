<?php
require_once(dirname(__FILE__)."/CmsContentPictureDao.inc.php");

class CmsContentPictureBean{
   private $CmsContentPictureId;
   private $CmsContentId;
   private $ImgDriveName;
   private $ImgAltName;
   private $ImgOrder;
   private $IW;
   private $IH;
   
   public function setCmsContentPictureId($val){
      $this->CmsContentPictureId=$val;
   }

   public function getCmsContentPictureId(){
      return $this->CmsContentPictureId;
   }

   public function setCmsContentId($val){
      $this->CmsContentId=$val;
   }

   public function getCmsContentId(){
      return $this->CmsContentId;
   }

   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }

   public function setImgAltName($val){
      $this->ImgAltName=$val;
   }

   public function getImgAltName(){
      return $this->ImgAltName;
   }
   
   public function setImgOrder($val){
      $this->ImgOrder=$val;
   }

   public function getImgOrder(){
      return $this->ImgOrder;
   }
   
   public function setIW($val){
      $this->IW=$val;
   }

   public function getIW(){
      return $this->IW;
   }
   
   public function setIH($val){
      $this->IH=$val;
   }

   public function getIH(){
      return $this->IH;
   }
}
?>