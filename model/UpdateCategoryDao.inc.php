<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/UpdateCategoryBean.inc.php");

/**
 * UpdateCategoryDAO
 * 
 * database access class - CRUD methods for table UpdateCategory
 */
class UpdateCategoryDao{

   function __construct(){
   }
   public function create($objUpdateCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO UpdateCategory(FatherId,Name,SeoName,ListOrder,ContentType,NumberOfItems) ";
      $query.= "VALUES('".$objUpdateCategoryBean->getFatherId()."','".$objUpdateCategoryBean->getName()."','".$objUpdateCategoryBean->getSeoName()."','".$objUpdateCategoryBean->getListOrder()."','".$objUpdateCategoryBean->getContentType()."','".$objUpdateCategoryBean->getNumberOfItems()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objUpdateCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE UpdateCategory SET ";
      $query.="FatherId='".$objUpdateCategoryBean->getFatherId()."',";
      $query.="Name='".$objUpdateCategoryBean->getName()."',";
      $query.="SeoName='".$objUpdateCategoryBean->getSeoName()."',";
      $query.="ListOrder='".$objUpdateCategoryBean->getListOrder()."',";
      $query.="ContentType='".$objUpdateCategoryBean->getContentType()."',";
      $query.="NumberOfItems='".$objUpdateCategoryBean->getNumberOfItems()."' ";
      $query.="WHERE UpdateCategoryId=".$objUpdateCategoryBean->getUpdateCategoryId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateCategoryId,FatherId,Name,SeoName,ListOrder,ContentType,NumberOfItems FROM UpdateCategory";
      $query.=" WHERE UpdateCategoryId=".$id;
      $DB->query($query);
      $objUpdateCategoryBean= new UpdateCategoryBean();
      $objUpdateCategoryBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
      $objUpdateCategoryBean->setFatherId($DB->getField("FatherId"));
      $objUpdateCategoryBean->setName($DB->getField("Name"));
      $objUpdateCategoryBean->setSeoName($DB->getField("SeoName"));
      $objUpdateCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objUpdateCategoryBean->setContentType($DB->getField("ContentType"));
      $objUpdateCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objUpdateCategoryBean;
   }
   
   public function readByCatSeo($CatName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateCategoryId,FatherId,Name,SeoName,ListOrder,ContentType,NumberOfItems FROM UpdateCategory";
      $query.=" WHERE SeoName='".$CatName."'";
      $DB->query($query);
      $objUpdateCategoryBean= new UpdateCategoryBean();
      $objUpdateCategoryBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
      $objUpdateCategoryBean->setFatherId($DB->getField("FatherId"));
      $objUpdateCategoryBean->setName($DB->getField("Name"));
      $objUpdateCategoryBean->setSeoName($DB->getField("SeoName"));
      $objUpdateCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objUpdateCategoryBean->setContentType($DB->getField("ContentType"));
      $objUpdateCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objUpdateCategoryBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from UpdateCategory ";
      $query.="WHERE UpdateCategoryId=".$id;
      $DB->query($query);
   }
}
?>