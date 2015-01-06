<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/AlfaBean.inc.php");

/**
 * AlfaDAO
 * 
 * database access class - CRUD methods for table Alfa
 */
class AlfaDao{

   function __construct(){
   }
   public function create($objAlfaBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Alfa(ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube) ";
      $query.= "VALUES('".$objAlfaBean->getClubId()."','".$objAlfaBean->getBetaId()."','".$objAlfaBean->getName()."','".$objAlfaBean->getSeoName()."','".$objAlfaBean->getKeyword()."','".$objAlfaBean->getDescription()."','".$objAlfaBean->getShortDescription()."','".$objAlfaBean->getVeryShortDescription()."','".$objAlfaBean->getLongDescription()."','".$objAlfaBean->getUpdateDate()."','".$objAlfaBean->getAlfaOrder()."','".$objAlfaBean->getStatus()."','".$objAlfaBean->getImgDriveName()."','".$objAlfaBean->getImgDriveNameHeader()."','".$objAlfaBean->getEventDate()."','".$objAlfaBean->getEventCalendar()."','".$objAlfaBean->getYouTube()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objAlfaBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Alfa SET ";
      $query.="ClubId='".$objAlfaBean->getClubId()."',";
      $query.="BetaId='".$objAlfaBean->getBetaId()."',";
      $query.="Name='".$objAlfaBean->getName()."',";
      $query.="SeoName='".$objAlfaBean->getSeoName()."',";
      $query.="Keyword='".$objAlfaBean->getKeyword()."',";
      $query.="Description='".$objAlfaBean->getDescription()."',";
      $query.="ShortDescription='".$objAlfaBean->getShortDescription()."',";
      $query.="VeryShortDescription='".$objAlfaBean->getVeryShortDescription()."',";
      $query.="LongDescription='".$objAlfaBean->getLongDescription()."',";
      $query.="UpdateDate='".$objAlfaBean->getUpdateDate()."',";
      $query.="AlfaOrder='".$objAlfaBean->getAlfaOrder()."',";
      $query.="Status='".$objAlfaBean->getStatus()."',";
      $query.="ImgDriveName='".$objAlfaBean->getImgDriveName()."',";
      $query.="ImgDriveNameHeader='".$objAlfaBean->getImgDriveNameHeader()."',";
      $query.="EventDate='".$objAlfaBean->getEventDate()."',";
      $query.="EventCalendar='".$objAlfaBean->getEventCalendar()."',";
      $query.="YouTube='".$objAlfaBean->getYouTube()."' ";
      $query.="WHERE AlfaId=".$objAlfaBean->getAlfaId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube FROM Alfa";
      $query.=" WHERE AlfaId=".$id;
      $DB->query($query);
      $objAlfaBean= new AlfaBean();
      $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
      $objAlfaBean->setClubId($DB->getField("ClubId"));
      $objAlfaBean->setBetaId($DB->getField("BetaId"));
      $objAlfaBean->setName($DB->getField("Name"));
      $objAlfaBean->setSeoName($DB->getField("SeoName"));
      $objAlfaBean->setKeyword($DB->getField("Keyword"));
      $objAlfaBean->setDescription($DB->getField("Description"));
      $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
      $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
      $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
      $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
      $objAlfaBean->setStatus($DB->getField("Status"));
      $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
      $objAlfaBean->setEventDate($DB->getField("EventDate"));
      $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
      $objAlfaBean->setYouTube($DB->getField("YouTube"));
      
      return $objAlfaBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objAlfaBean= new AlfaBean();
      $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
      $objAlfaBean->setClubId($DB->getField("ClubId"));
      $objAlfaBean->setBetaId($DB->getField("BetaId"));
      $objAlfaBean->setName($DB->getField("Name"));
      $objAlfaBean->setSeoName($DB->getField("SeoName"));
      $objAlfaBean->setKeyword($DB->getField("Keyword"));
      $objAlfaBean->setDescription($DB->getField("Description"));
      $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
      $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
      $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
      $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
      $objAlfaBean->setStatus($DB->getField("Status"));
      $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
      $objAlfaBean->setEventDate($DB->getField("EventDate"));
      $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
      $objAlfaBean->setYouTube($DB->getField("YouTube"));
      
      return $objAlfaBean;
   }
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Alfa ";
      $query.="WHERE AlfaId=".$id;
      $DB->query($query);
   }
   
   public function deleteEmptyRecords(){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Alfa ";
      $query.="WHERE UpdateDate='0000-00-00'";
      $DB->query($query);
   }       
}
?>