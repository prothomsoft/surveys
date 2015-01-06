<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/RightsBean.inc.php");

class RightsDao{

   function __construct(){
   }
   public function create($objRightsBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Rights` (Label,Level) ";
      $query.= "VALUES('".$objRightsBean->getLabel()."','".$objRightsBean->getLevel()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objRightsBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Rights` SET ";
      $query.="Label='".$objRightsBean->getLabel()."', ";
      $query.="Level='".$objRightsBean->getLevel()."' ";
      $query.="WHERE RightsId=".$objRightsBean->getRightsId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT RightsId,Label,Level FROM `Rights`";
      $query.=" WHERE RightsId=".$id;
      $DB->query($query);
      $objRightsBean= new RightsBean();
      $objRightsBean->setRightsId($DB->getField("RightsId"));
      $objRightsBean->setLabel($DB->getField("Label"));
      $objRightsBean->setLevel($DB->getField("Level"));

      return $objRightsBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Rights` ";
      $query.="WHERE RightsId=".$id;
      $DB->query($query);
   }
}
?>