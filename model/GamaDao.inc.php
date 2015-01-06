<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/GamaBean.inc.php");

/**
 * GamaDAO
 * 
 * database access class - CRUD methods for table Gama
 */
class GamaDao{

   function __construct(){
   }
   public function create($objGamaBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Gama(ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,ImgDriveName,VideoDriveName,YouTube,EventDate) ";
      $query.= "VALUES('".$objGamaBean->getClubId()."','".$objGamaBean->getGminaId()."','".$objGamaBean->getName()."','".$objGamaBean->getSeoName()."','".$objGamaBean->getKeyword()."','".$objGamaBean->getDescription()."','".$objGamaBean->getShortDescription()."','".$objGamaBean->getLongDescription()."','".$objGamaBean->getUpdateDate()."','".$objGamaBean->getGamaOrder()."','".$objGamaBean->getImgDriveName()."','".$objGamaBean->getVideoDriveName()."','".$objGamaBean->getYouTube()."','".$objGamaBean->getEventDate()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objGamaBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Gama SET ";
      $query.="ClubId='".$objGamaBean->getClubId()."',";
      $query.="GminaId='".$objGamaBean->getGminaId()."',";
      $query.="Name='".$objGamaBean->getName()."',";
      $query.="SeoName='".$objGamaBean->getSeoName()."',";
      $query.="Keyword='".$objGamaBean->getKeyword()."',";
      $query.="Description='".$objGamaBean->getDescription()."',";
      $query.="ShortDescription='".$objGamaBean->getShortDescription()."',";
      $query.="LongDescription='".$objGamaBean->getLongDescription()."',";
      $query.="UpdateDate='".$objGamaBean->getUpdateDate()."',";
      $query.="GamaOrder='".$objGamaBean->getGamaOrder()."',";
      $query.="ImgDriveName='".$objGamaBean->getImgDriveName()."',";
      $query.="VideoDriveName='".$objGamaBean->getVideoDriveName()."',";
      $query.="YouTube='".$objGamaBean->getYouTube()."',";
      $query.="EventDate='".$objGamaBean->getEventDate()."' ";
      $query.="WHERE GamaId=".$objGamaBean->getGamaId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT GamaId,ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,ImgDriveName,VideoDriveName,YouTube,EventDate FROM Gama";
      $query.=" WHERE GamaId=".$id;
      $DB->query($query);
      $objGamaBean= new GamaBean();
      $objGamaBean->setGamaId($DB->getField("GamaId"));
      $objGamaBean->setClubId($DB->getField("ClubId"));
      $objGamaBean->setGminaId($DB->getField("GminaId"));
      $objGamaBean->setName($DB->getField("Name"));
      $objGamaBean->setSeoName($DB->getField("SeoName"));
      $objGamaBean->setKeyword($DB->getField("Keyword"));
      $objGamaBean->setDescription($DB->getField("Description"));
      $objGamaBean->setShortDescription($DB->getField("ShortDescription"));
      $objGamaBean->setLongDescription($DB->getField("LongDescription"));
      $objGamaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objGamaBean->setGamaOrder($DB->getField("GamaOrder"));
      $objGamaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objGamaBean->setVideoDriveName($DB->getField("VideoDriveName"));
      $objGamaBean->setYouTube($DB->getField("YouTube"));
      $objGamaBean->setEventDate($DB->getField("EventDate"));
      
      return $objGamaBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT GamaId,ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,ImgDriveName,VideoDriveName,YouTube,EventDate  FROM Gama";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objGamaBean= new GamaBean();
      $objGamaBean->setGamaId($DB->getField("GamaId"));
      $objGamaBean->setClubId($DB->getField("ClubId"));
      $objGamaBean->setGminaId($DB->getField("GminaId"));
      $objGamaBean->setName($DB->getField("Name"));
      $objGamaBean->setSeoName($DB->getField("SeoName"));
      $objGamaBean->setKeyword($DB->getField("Keyword"));
      $objGamaBean->setDescription($DB->getField("Description"));
      $objGamaBean->setShortDescription($DB->getField("ShortDescription"));
      $objGamaBean->setLongDescription($DB->getField("LongDescription"));
      $objGamaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objGamaBean->setGamaOrder($DB->getField("GamaOrder"));
      $objGamaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objGamaBean->setVideoDriveName($DB->getField("VideoDriveName"));
      $objGamaBean->setYouTube($DB->getField("YouTube"));
      $objGamaBean->setEventDate($DB->getField("EventDate"));
      
      return $objGamaBean;
   }
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Gama ";
      $query.="WHERE GamaId=".$id;
      $DB->query($query);
   }
   
   public function deleteEmptyRecords(){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Gama ";
      $query.="WHERE UpdateDate='0000-00-00'";
      $DB->query($query);
   } 
}
?>