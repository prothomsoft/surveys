<?php
require_once(dirname(__FILE__)."/AlfaPictureDao.inc.php");

class AlfaPictureBean{
   private $AlfaPictureId;
   private $AlfaId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setAlfaPictureId($val){
      $this->AlfaPictureId=$val;
   }

   public function getAlfaPictureId(){
      return $this->AlfaPictureId;
   }

   public function setAlfaId($val){
      $this->AlfaId=$val;
   }

   public function getAlfaId(){
      return $this->AlfaId;
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