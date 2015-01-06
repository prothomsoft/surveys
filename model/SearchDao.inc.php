<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/SearchBean.inc.php");

class SearchDao{

   function __construct(){
   }
   public function create($objSearchBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Search` (Keyword,CreateDate) ";
      $query.= "VALUES('".$objSearchBean->getKeyword()."','".$objSearchBean->getCreateDate()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objSearchBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Search` SET ";
      $query.="Keyword='".$objSearchBean->getKeyword()."', ";
      $query.="CreateDate='".$objSearchBean->getCreateDate()."' ";
      $query.="WHERE SearchId=".$objSearchBean->getSearchId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT SearchId,Keyword,CreateDate FROM `Search`";
      $query.=" WHERE SearchId=".$id;
      $DB->query($query);
      $objSearchBean= new SearchBean();
      $objSearchBean->setSearchId($DB->getField("SearchId"));
      $objSearchBean->setKeyword($DB->getField("Keyword"));
      $objSearchBean->setCreateDate($DB->getField("CreateDate"));

      return $objSearchBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Search` ";
      $query.="WHERE SearchId=".$id;
      $DB->query($query);
   }
}
?>