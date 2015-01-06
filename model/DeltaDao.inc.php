<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/DeltaBean.inc.php");

/**
 * DeltaDAO
 * 
 * database access class - CRUD methods for table Delta
 */
class DeltaDao{

   function __construct(){
   }
   public function create($objDeltaBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Delta(ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar) ";
      $query.= "VALUES('".$objDeltaBean->getClubId()."','".$objDeltaBean->getBetaId()."','".$objDeltaBean->getName()."','".$objDeltaBean->getSeoName()."','".$objDeltaBean->getKeyword()."','".$objDeltaBean->getDescription()."','".$objDeltaBean->getShortDescription()."','".$objDeltaBean->getLongDescription()."','".$objDeltaBean->getUpdateDate()."','".$objDeltaBean->getDeltaOrder()."','".$objDeltaBean->getStatus()."','".$objDeltaBean->getImgDriveName()."','".$objDeltaBean->getEventDate()."','".$objDeltaBean->getEventCalendar()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objDeltaBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Delta SET ";
      $query.="ClubId='".$objDeltaBean->getClubId()."',";
      $query.="BetaId='".$objDeltaBean->getBetaId()."',";
      $query.="Name='".$objDeltaBean->getName()."',";
      $query.="SeoName='".$objDeltaBean->getSeoName()."',";
      $query.="Keyword='".$objDeltaBean->getKeyword()."',";
      $query.="Description='".$objDeltaBean->getDescription()."',";
      $query.="ShortDescription='".$objDeltaBean->getShortDescription()."',";
      $query.="LongDescription='".$objDeltaBean->getLongDescription()."',";
      $query.="UpdateDate='".$objDeltaBean->getUpdateDate()."',";
      $query.="DeltaOrder='".$objDeltaBean->getDeltaOrder()."',";
      $query.="Status='".$objDeltaBean->getStatus()."',";
      $query.="ImgDriveName='".$objDeltaBean->getImgDriveName()."',";
      $query.="EventDate='".$objDeltaBean->getEventDate()."',";
      $query.="EventCalendar='".$objDeltaBean->getEventCalendar()."' ";
      $query.="WHERE DeltaId=".$objDeltaBean->getDeltaId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Delta";
      $query.=" WHERE DeltaId=".$id;
      $DB->query($query);
      $objDeltaBean= new DeltaBean();
      $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
      $objDeltaBean->setClubId($DB->getField("ClubId"));
      $objDeltaBean->setBetaId($DB->getField("BetaId"));
      $objDeltaBean->setName($DB->getField("Name"));
      $objDeltaBean->setSeoName($DB->getField("SeoName"));
      $objDeltaBean->setKeyword($DB->getField("Keyword"));
      $objDeltaBean->setDescription($DB->getField("Description"));
      $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
      $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
      $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
      $objDeltaBean->setStatus($DB->getField("Status"));
      $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objDeltaBean->setEventDate($DB->getField("EventDate"));
      $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));
      
      return $objDeltaBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Delta";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objDeltaBean= new DeltaBean();
      $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
      $objDeltaBean->setClubId($DB->getField("ClubId"));
      $objDeltaBean->setBetaId($DB->getField("BetaId"));
      $objDeltaBean->setName($DB->getField("Name"));
      $objDeltaBean->setSeoName($DB->getField("SeoName"));
      $objDeltaBean->setKeyword($DB->getField("Keyword"));
      $objDeltaBean->setDescription($DB->getField("Description"));
      $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
      $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
      $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
      $objDeltaBean->setStatus($DB->getField("Status"));
      $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objDeltaBean->setEventDate($DB->getField("EventDate"));
      $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));
      
      return $objDeltaBean;
   }
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Delta ";
      $query.="WHERE DeltaId=".$id;
      $DB->query($query);
   }
   
   public function deleteEmptyRecords(){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Delta ";
      $query.="WHERE UpdateDate='0000-00-00'";
      $DB->query($query);
   } 
}
?>