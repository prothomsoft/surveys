<?php
require_once(dirname(__FILE__)."/DeltaPictureDao.inc.php");

class DeltaPictureBean{
   private $DeltaPictureId;
   private $DeltaId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setDeltaPictureId($val){
      $this->DeltaPictureId=$val;
   }

   public function getDeltaPictureId(){
      return $this->DeltaPictureId;
   }

   public function setDeltaId($val){
      $this->DeltaId=$val;
   }

   public function getDeltaId(){
      return $this->DeltaId;
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