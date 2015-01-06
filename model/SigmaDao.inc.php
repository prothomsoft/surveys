<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/SigmaBean.inc.php");

/**
 * SigmaDAO
 * 
 * database access class - CRUD methods for table Sigma
 */
class SigmaDao{

   function __construct(){
   }
   public function create($objSigmaBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Sigma(DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar) ";
      $query.= "VALUES('".$objSigmaBean->getDeltaId()."','".$objSigmaBean->getName()."','".$objSigmaBean->getSeoName()."','".$objSigmaBean->getKeyword()."','".$objSigmaBean->getDescription()."','".$objSigmaBean->getShortDescription()."','".$objSigmaBean->getLongDescription()."','".$objSigmaBean->getUpdateDate()."','".$objSigmaBean->getSigmaOrder()."','".$objSigmaBean->getStatus()."','".$objSigmaBean->getImgDriveName()."','".$objSigmaBean->getEventDate()."','".$objSigmaBean->getEventCalendar()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objSigmaBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Sigma SET ";
      $query.="DeltaId='".$objSigmaBean->getDeltaId()."',";
      $query.="Name='".$objSigmaBean->getName()."',";
      $query.="SeoName='".$objSigmaBean->getSeoName()."',";
      $query.="Keyword='".$objSigmaBean->getKeyword()."',";
      $query.="Description='".$objSigmaBean->getDescription()."',";
      $query.="ShortDescription='".$objSigmaBean->getShortDescription()."',";
      $query.="LongDescription='".$objSigmaBean->getLongDescription()."',";
      $query.="UpdateDate='".$objSigmaBean->getUpdateDate()."',";
      $query.="SigmaOrder='".$objSigmaBean->getSigmaOrder()."',";
      $query.="Status='".$objSigmaBean->getStatus()."',";
      $query.="ImgDriveName='".$objSigmaBean->getImgDriveName()."',";
      $query.="EventDate='".$objSigmaBean->getEventDate()."',";
      $query.="EventCalendar='".$objSigmaBean->getEventCalendar()."' ";
      $query.="WHERE SigmaId=".$objSigmaBean->getSigmaId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Sigma";
      $query.=" WHERE SigmaId=".$id;
      $DB->query($query);
      $objSigmaBean= new SigmaBean();
      $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
      $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
      $objSigmaBean->setName($DB->getField("Name"));
      $objSigmaBean->setSeoName($DB->getField("SeoName"));
      $objSigmaBean->setKeyword($DB->getField("Keyword"));
      $objSigmaBean->setDescription($DB->getField("Description"));
      $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
      $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
      $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
      $objSigmaBean->setStatus($DB->getField("Status"));
      $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objSigmaBean->setEventDate($DB->getField("EventDate"));
      $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));
      
      return $objSigmaBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Sigma";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objSigmaBean= new SigmaBean();
      $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
      $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
      $objSigmaBean->setName($DB->getField("Name"));
      $objSigmaBean->setSeoName($DB->getField("SeoName"));
      $objSigmaBean->setKeyword($DB->getField("Keyword"));
      $objSigmaBean->setDescription($DB->getField("Description"));
      $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
      $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
      $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
      $objSigmaBean->setStatus($DB->getField("Status"));
      $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objSigmaBean->setEventDate($DB->getField("EventDate"));
      $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));
      
      return $objSigmaBean;
   }
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Sigma ";
      $query.="WHERE SigmaId=".$id;
      $DB->query($query);
   }
}
?>