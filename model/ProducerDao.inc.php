<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/ProducerBean.inc.php");

class ProducerDao{

   function __construct(){
   }
   public function create($objProducerBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Producer`(Name) ";
      $query.= "VALUES('".$objProducerBean->getName()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objProducerBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Producer` SET ";
      $query.="Name='".$objProducerBean->getName()."' ";
      $query.="WHERE ProducerId=".$objProducerBean->getProducerId()."";
      
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProducerId,Name FROM `Producer`";
      $query.=" WHERE ProducerId=".$id;
      $DB->query($query);
      $objProducerBean= new ProducerBean();
      $objProducerBean->setProducerId($DB->getField("ProducerId"));
      $objProducerBean->setName($DB->getField("Name"));
      
      return $objProducerBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Producer` ";
      $query.="WHERE ProducerId=".$id;
      $DB->query($query);
   }
}
?>