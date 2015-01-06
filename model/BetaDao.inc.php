<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/BetaBean.inc.php");

/**
 * BetaDAO
 * 
 * database access class - CRUD methods for table Beta
 */
class BetaDao{

   function __construct(){
   }
   public function create($objBetaBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Beta(ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate) ";
      $query.= "VALUES('".$objBetaBean->getClubId()."','".$objBetaBean->getGamaId()."','".$objBetaBean->getName()."','".$objBetaBean->getSeoName()."','".$objBetaBean->getKeyword()."','".$objBetaBean->getDescription()."','".$objBetaBean->getShortDescription()."','".$objBetaBean->getLongDescription()."','".$objBetaBean->getUpdateDate()."','".$objBetaBean->getBetaOrder()."','".$objBetaBean->getStatus()."','".$objBetaBean->getImgDriveName()."','".$objBetaBean->getEventDate()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objBetaBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Beta SET ";
      $query.="ClubId='".$objBetaBean->getClubId()."',";
      $query.="GamaId='".$objBetaBean->getGamaId()."',";
      $query.="Name='".$objBetaBean->getName()."',";
      $query.="SeoName='".$objBetaBean->getSeoName()."',";
      $query.="Keyword='".$objBetaBean->getKeyword()."',";
      $query.="Description='".$objBetaBean->getDescription()."',";
      $query.="ShortDescription='".$objBetaBean->getShortDescription()."',";
      $query.="LongDescription='".$objBetaBean->getLongDescription()."',";
      $query.="UpdateDate='".$objBetaBean->getUpdateDate()."',";
      $query.="BetaOrder='".$objBetaBean->getBetaOrder()."',";
      $query.="Status='".$objBetaBean->getStatus()."',";
      $query.="ImgDriveName='".$objBetaBean->getImgDriveName()."',";
      $query.="EventDate='".$objBetaBean->getEventDate()."' ";
      $query.="WHERE BetaId=".$objBetaBean->getBetaId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT BetaId,ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta";
      $query.=" WHERE BetaId=".$id;
      $DB->query($query);
      $objBetaBean= new BetaBean();
      $objBetaBean->setBetaId($DB->getField("BetaId"));
      $objBetaBean->setClubId($DB->getField("ClubId"));
      $objBetaBean->setGamaId($DB->getField("GamaId"));
      $objBetaBean->setName($DB->getField("Name"));
      $objBetaBean->setSeoName($DB->getField("SeoName"));
      $objBetaBean->setKeyword($DB->getField("Keyword"));
      $objBetaBean->setDescription($DB->getField("Description"));
      $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
      $objBetaBean->setLongDescription($DB->getField("LongDescription"));
      $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
      $objBetaBean->setStatus($DB->getField("Status"));
      $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objBetaBean->setEventDate($DB->getField("EventDate"));
      
      return $objBetaBean;
   }
   public function readByItemSeo($itemSeo){
      $DB = new DB();
      $DB->connect();
      $query="SELECT BetaId,ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta";
      $query.=" WHERE SeoName='".$itemSeo."'";
      $DB->query($query);
      $objBetaBean= new BetaBean();
      $objBetaBean->setBetaId($DB->getField("BetaId"));
      $objBetaBean->setClubId($DB->getField("ClubId"));
      $objBetaBean->setGamaId($DB->getField("GamaId"));
      $objBetaBean->setName($DB->getField("Name"));
      $objBetaBean->setSeoName($DB->getField("SeoName"));
      $objBetaBean->setKeyword($DB->getField("Keyword"));
      $objBetaBean->setDescription($DB->getField("Description"));
      $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
      $objBetaBean->setLongDescription($DB->getField("LongDescription"));
      $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
      $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
      $objBetaBean->setStatus($DB->getField("Status"));
      $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objBetaBean->setEventDate($DB->getField("EventDate"));
      
      return $objBetaBean;
   }
   
  
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Beta ";
      $query.="WHERE BetaId=".$id;
      $DB->query($query);
   }
}
?>