<?php
require_once(dirname(__FILE__)."/ClubPictureDao.inc.php");

class ClubPictureBean{
   private $ClubPictureId;
   private $ClubId;
   private $ImgDriveName;
   private $ImgAltName;
   private $IW;
   private $IH;
   
   public function setClubPictureId($val){
      $this->ClubPictureId=$val;
   }

   public function getClubPictureId(){
      return $this->ClubPictureId;
   }

   public function setClubId($val){
      $this->ClubId=$val;
   }

   public function getClubId(){
      return $this->ClubId;
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