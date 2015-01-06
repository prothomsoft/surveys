<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/MemberBean.inc.php");

class MemberDao{

   function __construct(){
   }
   
   
   
   public function create($objMemberBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Member` (Name, Adresse, Postnummer, Sted, Telefon, Kommentar, YourOption, PaymentStatus, MembershipStatus, Email,CreateDate) ";
      $query.= "VALUES('".$objMemberBean->getName()."', '".$objMemberBean->getAdresse()."', '".$objMemberBean->getPostnummer()."','".$objMemberBean->getSted()."', '".$objMemberBean->getTelefon()."', '".$objMemberBean->getKommentar()."', '".$objMemberBean->getYourOption()."', '".$objMemberBean->getPaymentStatus()."','".$objMemberBean->getMembershipStatus()."','".$objMemberBean->getEmail()."','".$objMemberBean->getCreateDate()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objMemberBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Member` SET ";
      $query.="Name='".$objMemberBean->getName()."', ";
      $query.="Adresse='".$objMemberBean->getAdresse()."', ";
      $query.="Postnummer='".$objMemberBean->getPostnummer()."', ";
      $query.="Sted='".$objMemberBean->getSted()."', ";
      $query.="Telefon='".$objMemberBean->getTelefon()."', ";
      $query.="Kommentar='".$objMemberBean->getKommentar()."', ";
      $query.="YourOption='".$objMemberBean->getYourOption()."', ";
      $query.="PaymentStatus='".$objMemberBean->getPaymentStatus()."', ";
      $query.="MembershipStatus='".$objMemberBean->getMembershipStatus()."', ";
      $query.="Email='".$objMemberBean->getEmail()."', ";
      $query.="CreateDate='".$objMemberBean->getCreateDate()."' ";
      $query.="WHERE MemberId=".$objMemberBean->getMemberId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT MemberId, Name, Adresse, Postnummer, Sted, Telefon, Kommentar, YourOption, PaymentStatus, MembershipStatus, Email,CreateDate FROM `Member`";
      $query.=" WHERE MemberId=".$id;
      $DB->query($query);
      $objMemberBean= new MemberBean();
      $objMemberBean->setMemberId($DB->getField("MemberId"));
      $objMemberBean->setName($DB->getField("Name"));
      $objMemberBean->setAdresse($DB->getField("Adresse"));
      $objMemberBean->setPostnummer($DB->getField("Postnummer"));
      $objMemberBean->setSted($DB->getField("Sted"));
      $objMemberBean->setTelefon($DB->getField("Telefon"));
      $objMemberBean->setKommentar($DB->getField("Kommentar"));
      $objMemberBean->setYourOption($DB->getField("YourOption"));
      $objMemberBean->setPaymentStatus($DB->getField("PaymentStatus"));
      $objMemberBean->setMembershipStatus($DB->getField("MembershipStatus"));
      $objMemberBean->setEmail($DB->getField("Email"));
      $objMemberBean->setCreateDate($DB->getField("CreateDate"));

      return $objMemberBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Member` ";
      $query.="WHERE MemberId=".$id;
      $DB->query($query);
   }
}
?>