<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/RightsUserBean.inc.php");

class RightsUserDao{

   function __construct(){
   }
   public function create($objRightsUserBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO RightsUser ";
      $query.= "VALUES (";
      $query.="".$objRightsUserBean->getRightsId().", ";
      $query.="".$objRightsUserBean->getUserId().")";
      $DB->query($query);
      return $DB->getLast();
   }
   
   public function update($objRightsUserBean){
      $DB = new DB();
      $DB->connect();
      echo $objRightsUserBean->getRightsId();
      $query = "UPDATE RightsUser SET ";
      $query.="WHERE RightsId=".$objRightsUserBean->getRightsId()."";
      $query.="AND UserId=".$objRightsUserBean->getUserId()."";
      echo $query;
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT RightsId,UserId FROM RightsUser";
      $query.=" WHERE RightsId=".$id;
      $DB->query($query);
      $objRightsUserBean= new RightsUserBean();
      $objRightsUserBean->setRightsId($DB->getField("RightsId"));
      $objRightsUserBean->setUserId($DB->getField("UserId"));

      return $objRightsUserBean;
   }

   public function readByUser($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT RightsId,UserId FROM RightsUser";
      $query.=" WHERE UserId=".$id;
      $DB->query($query);
      $objRightsUserBean= new RightsUserBean();
      $objRightsUserBean->setRightsId($DB->getField("RightsId"));
      $objRightsUserBean->setUserId($DB->getField("UserId"));

      return $objRightsUserBean;
   }   
   
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from RightsUser ";
      $query.="WHERE RightsId=".$id;
      $DB->query($query);
   }
   
   public function deleteByUser($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from RightsUser ";
      $query.="WHERE UserId=".$id;
      $DB->query($query);
   }
}
?>