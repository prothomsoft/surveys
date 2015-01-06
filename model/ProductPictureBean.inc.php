<?php
require_once(dirname(__FILE__)."/ProductPictureDao.inc.php");

class ProductPictureBean{
   private $ProductPictureId;
   private $ProductId;
   private $ImgDriveName;
   private $ImgFileName;
   private $ImgAlt;
   private $ImgType;
   
   private $BigImgDriveName;
   private $BigImgFileName;
   private $BigImgAlt;
   private $BigImgType;

   public function setProductPictureId($val){
      $this->ProductPictureId=$val;
   }

   public function getProductPictureId(){
      return $this->ProductPictureId;
   }

   public function setProductId($val){
      $this->ProductId=$val;
   }

   public function getProductId(){
      return $this->ProductId;
   }

   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }

   public function setImgFileName($val){
      $this->ImgFileName=$val;
   }

   public function getImgFileName(){
      return $this->ImgFileName;
   }

   public function setImgAlt($val){
      $this->ImgAlt=$val;
   }

   public function getImgAlt(){
      return $this->ImgAlt;
   }

   public function setImgType($val){
      $this->ImgType=$val;
   }

   public function getImgType(){
      return $this->ImgType;
   }
   
   
   public function setBigImgDriveName($val){
      $this->BigImgDriveName=$val;
   }

   public function getBigImgDriveName(){
      return $this->BigImgDriveName;
   }

   public function setBigImgFileName($val){
      $this->BigImgFileName=$val;
   }

   public function getBigImgFileName(){
      return $this->BigImgFileName;
   }

   public function setBigImgAlt($val){
      $this->BigImgAlt=$val;
   }

   public function getBigImgAlt(){
      return $this->BigImgAlt;
   }

   public function setBigImgType($val){
      $this->BigImgType=$val;
   }

   public function getBigImgType(){
      return $this->BigImgType;
   }


}
?>