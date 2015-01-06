<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/BookBean.inc.php");

class BookDao{

   function __construct(){
   }
   
   private $SigmaId;
   private $Email;
   private $CreateDate;
   private $FirstName;
   private $LastName;
   private $CompanyName;
   private $City;
   private $Code;
   private $Street;
   private $Number;
   private $Phone;
   
   public function create($objBookBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO `Book` (SigmaId,Email,CreateDate,FirstName,LastName,CompanyName,City,Code,Street,Number,Phone) ";
      $query.= "VALUES('".$objBookBean->getSigmaId()."','".$objBookBean->getEmail()."','".$objBookBean->getCreateDate()."','".$objBookBean->getFirstName()."','".$objBookBean->getLastName()."','".$objBookBean->getCompanyName()."','".$objBookBean->getCity()."','".$objBookBean->getCode()."','".$objBookBean->getStreet()."','".$objBookBean->getNumber()."','".$objBookBean->getPhone()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objBookBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE `Book` SET ";
      $query.="SigmaId='".$objBookBean->getSigmaId()."', ";
      $query.="Email='".$objBookBean->getEmail()."', ";
      $query.="CreateDate='".$objBookBean->getCreateDate()."',";
      $query.="FirstName='".$objBookBean->getFirstName()."',";
      $query.="LastName='".$objBookBean->getLastName()."',";
      $query.="CompanyName='".$objBookBean->getCompanyName()."',";
      $query.="City='".$objBookBean->getCity()."',";
      $query.="Code='".$objBookBean->getCode()."',";
      $query.="Street='".$objBookBean->getStreet()."',";
      $query.="Number='".$objBookBean->getNumber()."',";
      $query.="Phone='".$objBookBean->getPhone()."' ";
      $query.="WHERE BookId=".$objBookBean->getBookId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT BookId,SigmaId,Email,CreateDate,FirstName,LastName,CompanyName,City,Code,Street,Number,Phone FROM `Book`";
      $query.=" WHERE BookId=".$id;
      $DB->query($query);
      $objBookBean= new BookBean();
      $objBookBean->setBookId($DB->getField("BookId"));
      $objBookBean->setSigmaId($DB->getField("SigmaId"));
      $objBookBean->setEmail($DB->getField("Email"));
      $objBookBean->setCreateDate($DB->getField("CreateDate"));
      $objBookBean->setFirstName($DB->getField("FirstName"));
      $objBookBean->setLastName($DB->getField("LastName"));
      $objBookBean->setCompanyName($DB->getField("CompanyName"));
      $objBookBean->setCity($DB->getField("City"));
      $objBookBean->setCode($DB->getField("Code"));
      $objBookBean->setStreet($DB->getField("Street"));
      $objBookBean->setNumber($DB->getField("Number"));
      $objBookBean->setPhone($DB->getField("Phone"));

      return $objBookBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from `Book` ";
      $query.="WHERE BookId=".$id;
      $DB->query($query);
   }
}
?>