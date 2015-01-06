<?php
require_once(dirname(__FILE__)."/RightsUserDao.inc.php");

class UserBean{
   private $UserId;
   private $CountryId;
   private $ProvinceId;
   private $Email;
   private $Password;
   private $CompanyName;
   private $NameFirst;
   private $NameLast;
   private $Street;
   private $Number;
   private $Zip;
   private $City;
   private $Phone1;
   private $Phone2;
   private $Fax1;
   private $Fax2;
   private $Website1;
   private $Website2;
   private $NipPL;
   private $NipUE;
   private $Regon;
   private $CreateDate;
   private $UpdateDate;
   private $Status;
   private $ImgDriveName;
   private $ActivationToken;
   private $Info;
   private $TesterStatus;
   private $TesterDate;
   private $Kogo;  
   private $Data; 
       
   private $RightsUser;
   
   public function getRightsUser(){   // additional getter for foreign key object
      if(!is_object($this->RightsUser)){
         $objRightsUserDao = new RightsUserDao();
         $objRightsUserBean = $objRightsUserDao->readByUser($this->getUserId());
         $this->RightsUser = $objRightsUserBean;
      }
      return $this->RightsUser;
   }

   public function setUserId($val){
      $this->UserId=$val;
   }

   public function getUserId(){
      return $this->UserId;
   }

   public function setCountryId($val){
      $this->CountryId=$val;
   }

   public function getCountryId(){
      return $this->CountryId;
   }
   
   public function setProvinceId($val){
      $this->ProvinceId=$val;
   }

   public function getProvinceId(){
      return $this->ProvinceId;
   }

   public function setEmail($val){
      $this->Email=$val;
   }

   public function getEmail(){
      return $this->Email;
   }

   public function setPassword($val){
      $this->Password=$val;
   }

   public function getPassword(){
      return $this->Password;
   }

   public function setCompanyName($val){
      $this->CompanyName=$val;
   }

   public function getCompanyName(){
      return $this->CompanyName;
   }

   public function setNameFirst($val){
      $this->NameFirst=$val;
   }

   public function getNameFirst(){
      return $this->NameFirst;
   }

   public function setNameLast($val){
      $this->NameLast=$val;
   }

   public function getNameLast(){
      return $this->NameLast;
   }

   public function setStreet($val){
      $this->Street=$val;
   }

   public function getStreet(){
      return $this->Street;
   }

   public function setNumber($val){
      $this->Number=$val;
   }

   public function getNumber(){
      return $this->Number;
   }

   public function setZip($val){
      $this->Zip=$val;
   }

   public function getZip(){
      return $this->Zip;
   }

   public function setCity($val){
      $this->City=$val;
   }

   public function getCity(){
      return $this->City;
   }

   public function setPhone1($val){
      $this->Phone1=$val;
   }

   public function getPhone1(){
      return $this->Phone1;
   }

   public function setPhone2($val){
      $this->Phone2=$val;
   }

   public function getPhone2(){
      return $this->Phone2;
   }

   public function setFax1($val){
      $this->Fax1=$val;
   }

   public function getFax1(){
      return $this->Fax1;
   }

   public function setFax2($val){
      $this->Fax2=$val;
   }

   public function getFax2(){
      return $this->Fax2;
   }

   public function setWebsite1($val){
      $this->Website1=$val;
   }

   public function getWebsite1(){
      return $this->Website1;
   }

   public function setWebsite2($val){
      $this->Website2=$val;
   }

   public function getWebsite2(){
      return $this->Website2;
   }

   public function setNipPL($val){
      $this->NipPL=$val;
   }

   public function getNipPL(){
      return $this->NipPL;
   }

   public function setNipUE($val){
      $this->NipUE=$val;
   }

   public function getNipUE(){
      return $this->NipUE;
   }

   public function setRegon($val){
      $this->Regon=$val;
   }

   public function getRegon(){
      return $this->Regon;
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

   public function setStatus($val){
      $this->Status=$val;
   }

   public function getStatus(){
      return $this->Status;
   }
   
   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }
   
   public function setActivationToken($val){
      $this->ActivationToken=$val;
   }

   public function getActivationToken(){
      return $this->ActivationToken;
   }
   
   public function setInfo($val){
      $this->Info=$val;
   }

   public function getInfo(){
      return $this->Info;
   }
   
   public function setTesterStatus($val){
      $this->TesterStatus=$val;
   }

   public function getTesterStatus(){
      return $this->TesterStatus;
   }
   
   public function setTesterDate($val){
      $this->TesterDate=$val;
   }

   public function getTesterDate(){
      return $this->TesterDate;
   }
 
   public function setKogo($val){
      $this->Kogo=$val;
   }
   
   public function getKogo(){
      return $this->Kogo; 
 	}   
 
   public function setData($val){
      $this->Data=$val;
   }  
 
   public function getData(){
      return $this->Data;
   }
  
   
}
?>