<?php
require_once(dirname(__FILE__)."/SigmaPictureDao.inc.php");

class SigmaPictureBean{
   private $SigmaPictureId;
   private $SigmaId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setSigmaPictureId($val){
      $this->SigmaPictureId=$val;
   }

   public function getSigmaPictureId(){
      return $this->SigmaPictureId;
   }

   public function setSigmaId($val){
      $this->SigmaId=$val;
   }

   public function getSigmaId(){
      return $this->SigmaId;
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