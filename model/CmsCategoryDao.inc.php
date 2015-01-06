<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsCategoryBean.inc.php");

class CmsCategoryDao{

   function __construct(){
   }
   public function create($objCmsCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO CmsCategory(FatherId,Name,SeoName,TransEN, TransDE, TransRU, ListOrder,Url,IsModule,NumberOfItems) ";
      $query.= "VALUES('".$objCmsCategoryBean->getFatherId()."','".$objCmsCategoryBean->getName()."','".$objCmsCategoryBean->getSeoName()."','".$objCmsCategoryBean->getTransEN()."','".$objCmsCategoryBean->getTransDE()."','".$objCmsCategoryBean->getTransRU()."','".$objCmsCategoryBean->getListOrder()."','".$objCmsCategoryBean->getUrl()."','".$objCmsCategoryBean->getIsModule()."','".$objCmsCategoryBean->getNumberOfItems()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objCmsCategoryBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE CmsCategory SET ";
      $query.="FatherId='".$objCmsCategoryBean->getFatherId()."',";
      $query.="Name='".$objCmsCategoryBean->getName()."',";
      $query.="SeoName='".$objCmsCategoryBean->getSeoName()."',";
      $query.="TransEN='".$objCmsCategoryBean->getTransEN()."',";
      $query.="TransDE='".$objCmsCategoryBean->getTransDE()."',";
      $query.="TransRU='".$objCmsCategoryBean->getTransRU()."',";
      $query.="ListOrder='".$objCmsCategoryBean->getListOrder()."',";
      $query.="Url='".$objCmsCategoryBean->getUrl()."',";
      $query.="IsModule='".$objCmsCategoryBean->getIsModule()."',";
      $query.="NumberOfItems='".$objCmsCategoryBean->getNumberOfItems()."' ";
      $query.="WHERE CmsCategoryId=".$objCmsCategoryBean->getCmsCategoryId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsCategoryId,FatherId,Name,SeoName,TransEN,TransDE,TransRU,ListOrder,Url,IsModule,NumberOfItems FROM CmsCategory";
      $query.=" WHERE CmsCategoryId=".$id;
      $DB->query($query);
      $objCmsCategoryBean= new CmsCategoryBean();
      $objCmsCategoryBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
      $objCmsCategoryBean->setFatherId($DB->getField("FatherId"));
      $objCmsCategoryBean->setName($DB->getField("Name"));
      $objCmsCategoryBean->setSeoName($DB->getField("SeoName"));
      $objCmsCategoryBean->setTransEN($DB->getField("TransEN"));
      $objCmsCategoryBean->setTransDE($DB->getField("TransDE"));
      $objCmsCategoryBean->setTransRU($DB->getField("TransRU"));
      $objCmsCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objCmsCategoryBean->setUrl($DB->getField("Url"));
      $objCmsCategoryBean->setIsModule($DB->getField("IsModule"));
      $objCmsCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objCmsCategoryBean;
   }
   
   public function readByCatSeo($CatName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT CmsCategoryId,FatherId,Name,SeoName,TransEN,TransDE,TransRU,ListOrder,Url,IsModule,NumberOfItems FROM CmsCategory";
      $query.=" WHERE SeoName='".$CatName."'";
      $DB->query($query);
      $objCmsCategoryBean= new CmsCategoryBean();
      $objCmsCategoryBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
      $objCmsCategoryBean->setFatherId($DB->getField("FatherId"));
      $objCmsCategoryBean->setName($DB->getField("Name"));
      $objCmsCategoryBean->setSeoName($DB->getField("SeoName"));
      $objCmsCategoryBean->setTransEN($DB->getField("TransEN"));
      $objCmsCategoryBean->setTransDE($DB->getField("TransDE"));
      $objCmsCategoryBean->setTransRU($DB->getField("TransRU"));
      $objCmsCategoryBean->setListOrder($DB->getField("ListOrder"));
      $objCmsCategoryBean->setUrl($DB->getField("Url"));
      $objCmsCategoryBean->setIsModule($DB->getField("IsModule"));
      $objCmsCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));

      return $objCmsCategoryBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from CmsCategory ";
      $query.="WHERE CmsCategoryId=".$id;
      $DB->query($query);
   }
}
?>