<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsCategoryPlainBean.inc.php");

class CmsCategoryPlainDao{

   function __construct(){
   }
   public function create($objCmsCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO CmsCategoryPlain(CategoryId,CategoryName,CategorySeoName) ";
      $query.= "VALUES('".$objCmsCategoryPlainBean->getCategoryId()."','".$objCmsCategoryPlainBean->getCategoryName()."','".$objCmsCategoryPlainBean->getCategorySeoName()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objCmsCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE CmsCategoryPlain SET ";
      $query.="CategoryId='".$objCategoryPlainBean->getCategoryId()."',";
      $query.="CategoryName='".$objCategoryPlainBean->getCategoryName()."',";
      $query.="CategorySeoName='".$objCategoryPlainBean->getCategorySeoName()."'";
      $query.="WHERE CmsCategoryPlainId=".$objCategoryPlainBean->getCategoryPlainId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM CmsCategoryPlain";
      $query.=" WHERE CmsCategoryPlainId=".$id;
      $DB->query($query);
      $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
      $objCmsCategoryPlainBean->setCmsCategoryPlainId($DB->getField("CmsCategoryPlainId"));
      $objCmsCategoryPlainBean->setCategoryId($DB->getField("CategoryId"));
      $objCmsCategoryPlainBean->setCategoryName($DB->getField("CategoryName"));
      $objCmsCategoryPlainBean->setCategorySeoName($DB->getField("CategorySeoName"));

      return $objCmsCategoryPlainBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsCategoryPlain ";
      $query.="WHERE CmsCategoryPlainId=".$id;
      $DB->query($query);
   }
}
?>