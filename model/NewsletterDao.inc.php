<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/NewsletterBean.inc.php");

class NewsletterDao{

   function __construct(){
   }
   public function create($objNewsletterBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Newsletter` (Email,CreateDate) ";
      $query.= "VALUES ('".$objNewsletterBean->getEmail()."','".$objNewsletterBean->getCreateDate()."') ";
      
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objNewsletterBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Newsletter` SET ";
      $query.="Email='".$objNewsletterBean->getEmail()."', ";
      $query.="CreateDate='".$objNewsletterBean->getCreateDate()."' ";
      $query.="WHERE NewsletterId=".$objNewsletterBean->getNewsletterId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT NewsletterId,Email,CreateDate FROM `Newsletter`";
      $query.=" WHERE NewsletterId=".$id;
      $DB->query($query);
      $objNewsletterBean= new NewsletterBean();
      $objNewsletterBean->setNewsletterId($DB->getField("NewsletterId"));
      $objNewsletterBean->setEmail($DB->getField("Email"));
      $objNewsletterBean->setCreateDate($DB->getField("CreateDate"));

      return $objNewsletterBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Newsletter` ";
      $query.="WHERE NewsletterId=".$id;
      $DB->query($query);
   }
}
?>