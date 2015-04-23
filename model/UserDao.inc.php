<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/UserBean.inc.php");

class UserDao{

   function __construct(){
   }
   public function create($objUserBean){
      $DB = new DB();
      $DB->connect();
      
      $query = "INSERT INTO `User`(CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,UpdateDate,Status, ImgDriveName, ActivationToken, Info, TesterStatus, TesterDate) ";
      $query.= "VALUES('".$objUserBean->getCountryId()."','".$objUserBean->getProvinceId()."','".mysql_real_escape_string($objUserBean->getEmail())."','".mysql_real_escape_string($objUserBean->getPassword())."','".$objUserBean->getCompanyName()."','".$objUserBean->getNameFirst()."','".$objUserBean->getNameLast()."','".$objUserBean->getStreet()."','".$objUserBean->getNumber()."','".$objUserBean->getZip()."','".$objUserBean->getCity()."','".mysql_real_escape_string($objUserBean->getPhone1())."','".mysql_real_escape_string($objUserBean->getPhone2())."','".$objUserBean->getFax1()."','".$objUserBean->getFax2()."','".$objUserBean->getWebsite1()."','".$objUserBean->getWebsite2()."','".$objUserBean->getNipPL()."','".$objUserBean->getNipUE()."','".$objUserBean->getRegon()."',NOW(),NOW(),'".$objUserBean->getStatus()."','".$objUserBean->getImgDriveName()."','".$objUserBean->getActivationToken()."','".$objUserBean->getInfo()."','".$objUserBean->getTesterStatus()."','".$objUserBean->getTesterDate()."') ";      
	  $DB->query($query);
      return $DB->getLast();
   }
   public function update($objUserBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `User` SET ";
      $query.="CountryId='".$objUserBean->getCountryId()."',";
      $query.="ProvinceId='".$objUserBean->getProvinceId()."',";
      $query.="Email='".mysql_real_escape_string($objUserBean->getEmail())."',";
      $query.="Password='".$objUserBean->getPassword()."',";
      $query.="CompanyName='".$objUserBean->getCompanyName()."',";
      $query.="NameFirst='".$objUserBean->getNameFirst()."',";
      $query.="NameLast='".$objUserBean->getNameLast()."',";
      $query.="Street='".$objUserBean->getStreet()."',";
      $query.="Number='".$objUserBean->getNumber()."',";
      $query.="Zip='".$objUserBean->getZip()."',";
      $query.="City='".$objUserBean->getCity()."',";
      $query.="Phone1='".mysql_real_escape_string($objUserBean->getPhone1())."',";
      $query.="Phone2='".mysql_real_escape_string($objUserBean->getPhone2())."',";
      $query.="Fax1='".$objUserBean->getFax1()."',";
      $query.="Fax2='".$objUserBean->getFax2()."',";
      $query.="Website1='".$objUserBean->getWebsite1()."',";
      $query.="Website2='".$objUserBean->getWebsite2()."',";
      $query.="NipPL='".$objUserBean->getNipPL()."',";
      $query.="NipUE='".$objUserBean->getNipUE()."',";
      $query.="Regon='".$objUserBean->getRegon()."',";
      $query.="CreateDate='".$objUserBean->getCreateDate()."',";
      $query.="UpdateDate='".$objUserBean->getUpdateDate()."',";
      $query.="Status='".$objUserBean->getStatus()."',";
      $query.="ImgDriveName='".$objUserBean->getImgDriveName()."',";
      $query.="ActivationToken='".$objUserBean->getActivationToken()."',";
      $query.="TesterStatus='".$objUserBean->getTesterStatus()."',";
      $query.="TesterDate='".$objUserBean->getTesterDate()."',";
      $query.="Info='".$objUserBean->getInfo()."' ";
      $query.="WHERE UserId=".$objUserBean->getUserId()."";
      
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate FROM `User`";
      $query.=" WHERE UserId=".$id;      
      $DB->query($query);
      $objUserBean= new UserBean();
      $objUserBean->setUserId($DB->getField("UserId"));
      $objUserBean->setCountryId($DB->getField("CountryId"));
      $objUserBean->setProvinceId($DB->getField("ProvinceId"));
      $objUserBean->setEmail($DB->getField("Email"));
      $objUserBean->setPassword($DB->getField("Password"));
      $objUserBean->setCompanyName($DB->getField("CompanyName"));
      $objUserBean->setNameFirst($DB->getField("NameFirst"));
      $objUserBean->setNameLast($DB->getField("NameLast"));
      $objUserBean->setStreet($DB->getField("Street"));
      $objUserBean->setNumber($DB->getField("Number"));
      $objUserBean->setZip($DB->getField("Zip"));
      $objUserBean->setCity($DB->getField("City"));
      $objUserBean->setPhone1($DB->getField("Phone1"));
      $objUserBean->setPhone2($DB->getField("Phone2"));
      $objUserBean->setFax1($DB->getField("Fax1"));
      $objUserBean->setFax2($DB->getField("Fax2"));
      $objUserBean->setWebsite1($DB->getField("Website1"));
      $objUserBean->setWebsite2($DB->getField("Website2"));
      $objUserBean->setNipPL($DB->getField("NipPL"));
      $objUserBean->setNipUE($DB->getField("NipUE"));
      $objUserBean->setRegon($DB->getField("Regon"));
      $objUserBean->setCreateDate($DB->getField("CreateDate"));
      $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
      $objUserBean->setStatus($DB->getField("Status"));
      $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objUserBean->setActivationToken($DB->getField("ActivationToken"));
      $objUserBean->setInfo($DB->getField("Info"));
      $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
      $objUserBean->setTesterDate($DB->getField("TesterDate"));

      return $objUserBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `User` ";
      $query.="WHERE UserId=".$id;
      $DB->query($query);
   }
   
   public function getByEmailAndPassword($email,$password){
      $DB = new DB();
      $DB->connect();
      
      $email  = mysql_real_escape_string($email);
      $password  = mysql_real_escape_string($password);
      
      $query="SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate FROM `User` ";
      $query.="WHERE Email='".$email."' and Password='".$password."'";
      $DB->query($query);
      $objUserBean = new UserBean();
      if ($DB->numRows()==1){
         $objUserBean= new UserBean();
         $objUserBean->setUserId($DB->getField("UserId"));
         $objUserBean->setCountryId($DB->getField("CountryId"));
         $objUserBean->setProvinceId($DB->getField("ProvinceId"));
         $objUserBean->setEmail($DB->getField("Email"));
         $objUserBean->setPassword($DB->getField("Password"));
         $objUserBean->setCompanyName($DB->getField("CompanyName"));
         $objUserBean->setNameFirst($DB->getField("NameFirst"));
         $objUserBean->setNameLast($DB->getField("NameLast"));
         $objUserBean->setStreet($DB->getField("Street"));
         $objUserBean->setNumber($DB->getField("Number"));
         $objUserBean->setZip($DB->getField("Zip"));
         $objUserBean->setCity($DB->getField("City"));
         $objUserBean->setPhone1($DB->getField("Phone1"));
         $objUserBean->setPhone2($DB->getField("Phone2"));
         $objUserBean->setFax1($DB->getField("Fax1"));
         $objUserBean->setFax2($DB->getField("Fax2"));
         $objUserBean->setWebsite1($DB->getField("Website1"));
         $objUserBean->setWebsite2($DB->getField("Website2"));
         $objUserBean->setNipPL($DB->getField("NipPL"));
         $objUserBean->setNipUE($DB->getField("NipUE"));
         $objUserBean->setRegon($DB->getField("Regon"));
         $objUserBean->setCreateDate($DB->getField("CreateDate"));
         $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
         $objUserBean->setStatus($DB->getField("Status"));
         $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
         $objUserBean->setActivationToken($DB->getField("ActivationToken"));
         $objUserBean->setInfo($DB->getField("Info"));
         $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         $objUserBean->setTesterDate($DB->getField("TesterDate"));
      }
      return $objUserBean;
   }
          
   public function getByEmail($email){
       
      $email  = mysql_real_escape_string($email);
      $password  = mysql_real_escape_string($password);
       
      $DB = new DB();
      $DB->connect();
      $query="SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate FROM `User` ";
      $query.="WHERE Email='".$email."'";
      $DB->query($query);
      $objUserBean = new UserBean();
      if ($DB->numRows()==1){
         $objUserBean= new UserBean();
         $objUserBean->setUserId($DB->getField("UserId"));
         $objUserBean->setCountryId($DB->getField("CountryId"));
         $objUserBean->setProvinceId($DB->getField("ProvinceId"));
         $objUserBean->setEmail($DB->getField("Email"));
         $objUserBean->setPassword($DB->getField("Password"));
         $objUserBean->setCompanyName($DB->getField("CompanyName"));
         $objUserBean->setNameFirst($DB->getField("NameFirst"));
         $objUserBean->setNameLast($DB->getField("NameLast"));
         $objUserBean->setStreet($DB->getField("Street"));
         $objUserBean->setNumber($DB->getField("Number"));
         $objUserBean->setZip($DB->getField("Zip"));
         $objUserBean->setCity($DB->getField("City"));
         $objUserBean->setPhone1($DB->getField("Phone1"));
         $objUserBean->setPhone2($DB->getField("Phone2"));
         $objUserBean->setFax1($DB->getField("Fax1"));
         $objUserBean->setFax2($DB->getField("Fax2"));
         $objUserBean->setWebsite1($DB->getField("Website1"));
         $objUserBean->setWebsite2($DB->getField("Website2"));
         $objUserBean->setNipPL($DB->getField("NipPL"));
         $objUserBean->setNipUE($DB->getField("NipUE"));
         $objUserBean->setRegon($DB->getField("Regon"));
         $objUserBean->setCreateDate($DB->getField("CreateDate"));
         $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
         $objUserBean->setStatus($DB->getField("Status"));
         $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
         $objUserBean->setActivationToken($DB->getField("ActivationToken"));
         $objUserBean->setInfo($DB->getField("Info"));
         $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         $objUserBean->setTesterDate($DB->getField("TesterDate"));
      }
      return $objUserBean;
   }
   
   public function getByActivationToken($activationToken){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate FROM `User` ";
      $query.="WHERE ActivationToken='".$activationToken."'";
      $DB->query($query);
      $objUserBean = new UserBean();
      if ($DB->numRows()==1){
         $objUserBean= new UserBean();
         $objUserBean->setUserId($DB->getField("UserId"));
         $objUserBean->setCountryId($DB->getField("CountryId"));
         $objUserBean->setProvinceId($DB->getField("ProvinceId"));
         $objUserBean->setEmail($DB->getField("Email"));
         $objUserBean->setPassword($DB->getField("Password"));
         $objUserBean->setCompanyName($DB->getField("CompanyName"));
         $objUserBean->setNameFirst($DB->getField("NameFirst"));
         $objUserBean->setNameLast($DB->getField("NameLast"));
         $objUserBean->setStreet($DB->getField("Street"));
         $objUserBean->setNumber($DB->getField("Number"));
         $objUserBean->setZip($DB->getField("Zip"));
         $objUserBean->setCity($DB->getField("City"));
         $objUserBean->setPhone1($DB->getField("Phone1"));
         $objUserBean->setPhone2($DB->getField("Phone2"));
         $objUserBean->setFax1($DB->getField("Fax1"));
         $objUserBean->setFax2($DB->getField("Fax2"));
         $objUserBean->setWebsite1($DB->getField("Website1"));
         $objUserBean->setWebsite2($DB->getField("Website2"));
         $objUserBean->setNipPL($DB->getField("NipPL"));
         $objUserBean->setNipUE($DB->getField("NipUE"));
         $objUserBean->setRegon($DB->getField("Regon"));
         $objUserBean->setCreateDate($DB->getField("CreateDate"));
         $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
         $objUserBean->setStatus($DB->getField("Status"));
         $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
         $objUserBean->setActivationToken($DB->getField("ActivationToken"));
         $objUserBean->setInfo($DB->getField("Info"));
         $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         $objUserBean->setTesterDate($DB->getField("TesterDate"));
      }
      return $objUserBean;
   }

}
?>