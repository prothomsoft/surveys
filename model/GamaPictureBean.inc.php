<?php
require_once(dirname(__FILE__)."/GamaPictureDao.inc.php");

class GamaPictureBean{
   private $GamaPictureId;
   private $GamaId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setGamaPictureId($val){
      $this->GamaPictureId=$val;
   }

   public function getGamaPictureId(){
      return $this->GamaPictureId;
   }

   public function setGamaId($val){
      $this->GamaId=$val;
   }

   public function getGamaId(){
      return $this->GamaId;
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