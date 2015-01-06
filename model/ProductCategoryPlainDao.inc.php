<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductCategoryPlainBean.inc.php");

class ProductCategoryPlainDao{

   function __construct(){
   }
   public function create($objProductCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO ProductCategoryPlain(ProductCategoryId,ProductCategoryName,ProductCategorySeoName) ";
      $query.= "VALUES('".$objProductCategoryPlainBean->getProductCategoryId()."','".$objProductCategoryPlainBean->getProductCategoryName()."','".$objProductCategoryPlainBean->getProductCategorySeoName()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objProductCategoryPlainBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE ProductCategoryPlain SET ";
      $query.="ProductCategoryId='".$objProductCategoryPlainBean->getProductCategoryId()."',";
      $query.="ProductCategoryName='".$objProductCategoryPlainBean->getProductCategoryName()."',";
      $query.="ProductCategorySeoName='".$objProductCategoryPlainBean->getProductCategorySeoName()."' ";
      $query.="WHERE ProductCategoryPlainId=".$objProductCategoryPlainBean->getProductCategoryPlainId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductCategoryPlainId,ProductCategoryId,ProductCategoryName,ProductCategorySeoName FROM ProductCategoryPlain";
      $query.=" WHERE ProductCategoryPlainId=".$id;
      $DB->query($query);
      $objProductCategoryPlainBean= new ProductCategoryPlainBean();
      $objProductCategoryPlainBean->setProductCategoryPlainId($DB->getField("ProductCategoryPlainId"));
      $objProductCategoryPlainBean->setProductCategoryId($DB->getField("ProductCategoryId"));
      $objProductCategoryPlainBean->setProductCategoryName($DB->getField("ProductCategoryName"));
      $objProductCategoryPlainBean->setProductCategorySeoName($DB->getField("ProductCategorySeoName"));

      return $objProductCategoryPlainBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ProductCategoryPlain ";
      $query.="WHERE ProductCategoryPlainId=".$id;
      $DB->query($query);
   }
}
?>