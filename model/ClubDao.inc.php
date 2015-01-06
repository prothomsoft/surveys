<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ClubBean.inc.php");

/**
 * ClubDAO
 * 
 * database access class - CRUD methods for table Club
 */
class ClubDao{

   function __construct(){
   }
   public function create($objClubBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Club(Name,SeoName,Keyword,Description,Address,ShortDescription,LongDescription,UpdateDate,ClubOrder,Status,ImgDriveName,Manager,Phone,Email,Route,Lat,Lng,IsClub) ";
      $query.= "VALUES('".$objClubBean->getName()."','".$objClubBean->getSeoName()."','".$objClubBean->getKeyword()."','".$objClubBean->getDescription()."','".$objClubBean->getAddress()."','".$objClubBean->getShortDescription()."','".$objClubBean->getLongDescription()."','".$objClubBean->getUpdateDate()."','".$objClubBean->getClubOrder()."','".$objClubBean->getStatus()."','".$objClubBean->getImgDriveName()."','".$objClubBean->getManager()."','".$objClubBean->getPhone()."','".$objClubBean->getEmail()."','".$objClubBean->getRoute()."','".$objClubBean->getLat()."','".$objClubBean->getLng()."','".$objClubBean->getIsClub()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objClubBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Club SET ";
      $query.="Name='".$objClubBean->getName()."',";
      $query.="SeoName='".$objClubBean->getSeoName()."',";
      $query.="Keyword='".$objClubBean->getKeyword()."',";
      $query.="Description='".$objClubBean->getDescription()."',";
      $query.="Address='".$objClubBean->getAddress()."',";
      $query.="ShortDescription='".$objClubBean->getShortDescription()."',";
      $query.="LongDescription='".$objClubBean->getLongDescription()."',";
      $query.="UpdateDate='".$objClubBean->getUpdateDate()."',";
      $query.="ClubOrder='".$objClubBean->getClubOrder()."',";
      $query.="Status='".$objClubBean->getStatus()."',";
      $query.="ImgDriveName='".$objClubBean->getImgDriveName()."',";
      $query.="Manager='".$objClubBean->getManager()."',";
      $query.="Phone='".$objClubBean->getPhone()."',";
      $query.="Email='".$objClubBean->getEmail()."',";
      $query.="Route='".$objClubBean->getRoute()."',";
      $query.="Lat='".$objClubBean->getLat()."',";
      $query.="Lng='".$objClubBean->getLng()."',";
      $query.="IsClub='".$objClubBean->getIsClub()."' ";
      $query.="WHERE ClubId=".$objClubBean->getClubId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ClubId,Name,SeoName,Keyword,Description,Address,ShortDescription,LongDescription,UpdateDate,ClubOrder,Status,ImgDriveName,Manager,Phone,Email,Route,Lat,Lng,IsClub FROM Club";
      $query.=" WHERE ClubId=".$id;
      $DB->query($query);
      $objClubBean= new ClubBean();
      $objClubBean->setClubId($DB->getField("ClubId"));
      $objClubBean->setName($DB->getField("Name"));
      $objClubBean->setSeoName($DB->getField("SeoName"));
      $objClubBean->setKeyword($DB->getField("Keyword"));
      $objClubBean->setDescription($DB->getField("Description"));
      $objClubBean->setAddress($DB->getField("Address"));
      $objClubBean->setShortDescription($DB->getField("ShortDescription"));
      $objClubBean->setLongDescription($DB->getField("LongDescription"));
      $objClubBean->setUpdateDate($DB->getField("UpdateDate"));
      $objClubBean->setClubOrder($DB->getField("ClubOrder"));
      $objClubBean->setStatus($DB->getField("Status"));
      $objClubBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objClubBean->setManager($DB->getField("Manager"));
      $objClubBean->setPhone($DB->getField("Phone"));
      $objClubBean->setEmail($DB->getField("Email"));
      $objClubBean->setRoute($DB->getField("Route"));
      $objClubBean->setLat($DB->getField("Lat"));
      $objClubBean->setLng($DB->getField("Lng"));
      $objClubBean->setIsClub($DB->getField("IsClub"));
      
      return $objClubBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ClubId,Name,SeoName,Keyword,Description,Address,ShortDescription,LongDescription,UpdateDate,ClubOrder,Status,ImgDriveName,Manager,Phone,Email,Route,Lat,Lng,IsClub FROM Club";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objClubBean= new ClubBean();
      $objClubBean->setClubId($DB->getField("ClubId"));
      $objClubBean->setName($DB->getField("Name"));
      $objClubBean->setSeoName($DB->getField("SeoName"));
      $objClubBean->setKeyword($DB->getField("Keyword"));
      $objClubBean->setDescription($DB->getField("Description"));
      $objClubBean->setAddress($DB->getField("Address"));
      $objClubBean->setShortDescription($DB->getField("ShortDescription"));
      $objClubBean->setLongDescription($DB->getField("LongDescription"));
      $objClubBean->setUpdateDate($DB->getField("UpdateDate"));
      $objClubBean->setClubOrder($DB->getField("ClubOrder"));
      $objClubBean->setStatus($DB->getField("Status"));
      $objClubBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objClubBean->setManager($DB->getField("Manager"));
      $objClubBean->setPhone($DB->getField("Phone"));
      $objClubBean->setEmail($DB->getField("Email"));
      $objClubBean->setRoute($DB->getField("Route"));
      $objClubBean->setLat($DB->getField("Lat"));
      $objClubBean->setLng($DB->getField("Lng"));
      $objClubBean->setIsClub($DB->getField("IsClub"));
      
      return $objClubBean;
   }
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Club ";
      $query.="WHERE ClubId=".$id;
      $DB->query($query);
   }
}
?>