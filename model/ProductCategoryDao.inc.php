<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductCategoryBean.inc.php");

class ProductCategoryDao{

   function __construct(){
   }
   public function create($objProductCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO ProductCategory(FatherId,Name,Descr,SeoName,ListOrder,Img,NumberOfItems) ";
      $query.= "VALUES('".$objProductCategoryBean->getFatherId()."','".$objProductCategoryBean->getName()."','".$objProductCategoryBean->getDescr()."','".$objProductCategoryBean->getSeoName()."','".$objProductCategoryBean->getListOrder()."','".$objProductCategoryBean->getImg()."','".$objProductCategoryBean->getNumberOfItems()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objProductCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE ProductCategory SET ";
      $query.="FatherId='".$objProductCategoryBean->getFatherId()."',";
      $query.="Name='".$objProductCategoryBean->getName()."',";
      $query.="Descr='".$objProductCategoryBean->getDescr()."',";
      $query.="SeoName='".$objProductCategoryBean->getSeoName()."',";
      $query.="ListOrder='".$objProductCategoryBean->getListOrder()."',";
      $query.="Img='".$objProductCategoryBean->getImg()."',";
      $query.="NumberOfItems='".$objProductCategoryBean->getNumberOfItems()."' ";
      $query.="WHERE ProductCategoryId=".$objProductCategoryBean->getProductCategoryId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductCategoryId,FatherId,Name,Descr,SeoName,ListOrder,Img,NumberOfItems FROM ProductCategory";
      $query.=" WHERE ProductCategoryId=".$id;
      $DB->query($query);
      $objProductCategoryBean= new ProductCategoryBean();
      $objProductCategoryBean->setProductCategoryId($DB->getField("ProductCategoryId"));
      $objProductCategoryBean->setFatherId($DB->getField("FatherId"));
      $objProductCategoryBean->setName($DB->getField("Name"));
      $objProductCategoryBean->setDescr($DB->getField("Descr"));
      $objProductCategoryBean->setSeoName($DB->getField("SeoName"));
      $objProductCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objProductCategoryBean->setImg($DB->getField("Img"));
      $objProductCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objProductCategoryBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from ProductCategory ";
      $query.="WHERE ProductCategoryId=".$id;
      $DB->query($query);
   }
   
   public function readBySeoName($seoName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductCategoryId,FatherId,Name,Descr,SeoName,ListOrder,Img,NumberOfItems FROM ProductCategory";
      $query.=" WHERE SeoName='".$seoName."'";
      $DB->query($query);
      $objProductCategoryBean= new ProductCategoryBean();
      $objProductCategoryBean->setProductCategoryId($DB->getField("ProductCategoryId"));
      $objProductCategoryBean->setFatherId($DB->getField("FatherId"));
      $objProductCategoryBean->setName($DB->getField("Name"));
      $objProductCategoryBean->setDescr($DB->getField("Descr"));
      $objProductCategoryBean->setSeoName($DB->getField("SeoName"));
      $objProductCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objProductCategoryBean->setImg($DB->getField("Img"));
      $objProductCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objProductCategoryBean;
   }
}
?>