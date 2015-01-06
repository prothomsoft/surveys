<?php
require_once(dirname(__FILE__)."/BetaPictureDao.inc.php");

class BetaPictureBean{
   private $BetaPictureId;
   private $BetaId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setBetaPictureId($val){
      $this->BetaPictureId=$val;
   }

   public function getBetaPictureId(){
      return $this->BetaPictureId;
   }

   public function setBetaId($val){
      $this->BetaId=$val;
   }

   public function getBetaId(){
      return $this->BetaId;
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