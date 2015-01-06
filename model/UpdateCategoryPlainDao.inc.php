<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/UpdateCategoryPlainBean.inc.php");

/**
 * UpdateCategoryPlainDAO
 * 
 * database access class - CRUD methods for table UpdateCategory
 */
class UpdateCategoryPlainDao{

   function __construct(){
   }
   public function create($objUpdateCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO UpdateCategoryPlain(CategoryId,CategoryName,CategorySeoName) ";
      $query.= "VALUES('".$objUpdateCategoryPlainBean->getCategoryId()."','".$objUpdateCategoryPlainBean->getCategoryName()."','".$objUpdateCategoryPlainBean->getCategorySeoName()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objUpdateCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE UpdateCategoryPlain SET ";
      $query.="CategoryId='".$objCategoryPlainBean->getCategoryId()."',";
      $query.="CategoryName='".$objCategoryPlainBean->getCategoryName()."',";
      $query.="CategorySeoName='".$objCategoryPlainBean->getCategorySeoName()."'";
      $query.="WHERE UpdateCategoryPlainId=".$objCategoryPlainBean->getCategoryPlainId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM UpdateCategoryPlain";
      $query.=" WHERE UpdateCategoryPlainId=".$id;
      $DB->query($query);
      $objUpdateCategoryPlainBean= new UpdateCategoryPlainBean();
      $objUpdateCategoryPlainBean->setUpdateCategoryPlainId($DB->getField("UpdateCategoryPlainId"));
      $objUpdateCategoryPlainBean->setCategoryId($DB->getField("CategoryId"));
      $objUpdateCategoryPlainBean->setCategoryName($DB->getField("CategoryName"));
      $objUpdateCategoryPlainBean->setCategorySeoName($DB->getField("CategorySeoName"));

      return $objUpdateCategoryPlainBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from UpdateCategoryPlain ";
      $query.="WHERE UpdateCategoryPlainId=".$id;
      $DB->query($query);
   }
}
?>