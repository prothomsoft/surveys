<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/OrdersBean.inc.php");

/**
 * OrdersDAO
 * 
 * database access class - CRUD methods for table Orders
 */
class OrdersDao{

   function __construct(){
   }
   public function create($objOrdersBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Orders(OrderId,UserId,CreateDate,AuthorizeDate,AuthorizeStatus,AuthorizeMail,CustomerInformation,Comments,Amount,IsSend,IsPointed,PointComment,ShipName,PaymentName,ShipPrice,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Country,Organization,OrganizationEmail) ";
      $query.= "VALUES('".$objOrdersBean->getOrderId()."','".$objOrdersBean->getUserId()."','".$objOrdersBean->getCreateDate()."','".$objOrdersBean->getAuthorizeDate()."','".$objOrdersBean->getAuthorizeStatus()."','".$objOrdersBean->getAuthorizeMail()."','".$objOrdersBean->getCustomerInformation()."','".$objOrdersBean->getComments()."','".$objOrdersBean->getAmount()."','".$objOrdersBean->getIsSend()."','".$objOrdersBean->getIsPointed()."','".$objOrdersBean->getPointComment()."','".$objOrdersBean->getShipName()."','".$objOrdersBean->getPaymentName()."','".$objOrdersBean->getShipPrice()."','".$objOrdersBean->getNameFirst()."','".$objOrdersBean->getNameLast()."','".$objOrdersBean->getStreet()."','".$objOrdersBean->getNumber()."','".$objOrdersBean->getZip()."','".$objOrdersBean->getCity()."','".$objOrdersBean->getPhone1()."','".$objOrdersBean->getCountry()."','".$objOrdersBean->getOrganization()."','".$objOrdersBean->getOrganizationEmail()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objOrdersBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Orders SET ";
      $query.="OrderId='".$objOrdersBean->getOrderId()."',";
      $query.="UserId='".$objOrdersBean->getUserId()."',";
      $query.="CreateDate='".$objOrdersBean->getCreateDate()."',";
      $query.="AuthorizeDate='".$objOrdersBean->getAuthorizeDate()."',";
      $query.="AuthorizeStatus='".$objOrdersBean->getAuthorizeStatus()."',";
      $query.="AuthorizeMail='".$objOrdersBean->getAuthorizeMail()."',";
      $query.="CustomerInformation='".$objOrdersBean->getCustomerInformation()."',";
      $query.="Comments='".$objOrdersBean->getComments()."',";
      $query.="Amount='".$objOrdersBean->getAmount()."',";
      $query.="IsSend='".$objOrdersBean->getIsSend()."',";
      $query.="IsPointed='".$objOrdersBean->getIsPointed()."',";
      $query.="PointComment='".$objOrdersBean->getPointComment()."',";
      $query.="ShipName='".$objOrdersBean->getShipName()."',";
      $query.="PaymentName='".$objOrdersBean->getPaymentName()."',";
      $query.="ShipPrice='".$objOrdersBean->getShipPrice()."',";
      $query.="NameFirst='".$objOrdersBean->getNameFirst()."',";
      $query.="NameLast='".$objOrdersBean->getNameLast()."',";
      $query.="Street='".$objOrdersBean->getStreet()."',";
      $query.="Number='".$objOrdersBean->getNumber()."',";
      $query.="Zip='".$objOrdersBean->getZip()."',";
      $query.="City='".$objOrdersBean->getCity()."',";
      $query.="Phone1='".$objOrdersBean->getPhone1()."',";
      $query.="Country='".$objOrdersBean->getCountry()."',";
      $query.="Organization='".$objOrdersBean->getOrganization()."',";
      $query.="OrganizationEmail='".$objOrdersBean->getOrganizationEmail()."' ";
      
      $query.="WHERE OrderId=".$objOrdersBean->getOrderId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT OrderId,UserId,CreateDate,AuthorizeDate,AuthorizeStatus,AuthorizeMail,CustomerInformation,Comments,Amount,IsSend,IsPointed,PointComment,ShipName,PaymentName,ShipPrice,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Country,Organization,OrganizationEmail FROM Orders";
      $query.=" WHERE OrderId=".$id;
      $DB->query($query);
      $objOrdersBean= new OrdersBean();
      $objOrdersBean->setOrderId($DB->getField("OrderId"));
      $objOrdersBean->setUserId($DB->getField("UserId"));
      $objOrdersBean->setCreateDate($DB->getField("CreateDate"));
      $objOrdersBean->setAuthorizeDate($DB->getField("AuthorizeDate"));
      $objOrdersBean->setAuthorizeStatus($DB->getField("AuthorizeStatus"));
      $objOrdersBean->setAuthorizeMail($DB->getField("AuthorizeMail"));
      $objOrdersBean->setCustomerInformation($DB->getField("CustomerInformation"));
      $objOrdersBean->setComments($DB->getField("Comments"));
      $objOrdersBean->setAmount($DB->getField("Amount"));
      $objOrdersBean->setIsSend($DB->getField("IsSend"));
      $objOrdersBean->setIsPointed($DB->getField("IsPointed"));
      $objOrdersBean->setPointComment($DB->getField("PointComment"));
      $objOrdersBean->setShipName($DB->getField("ShipName"));
      $objOrdersBean->setPaymentName($DB->getField("PaymentName"));
      $objOrdersBean->setShipPrice($DB->getField("ShipPrice"));
      $objOrdersBean->setNameFirst($DB->getField("NameFirst"));
      $objOrdersBean->setNameLast($DB->getField("NameLast"));
      $objOrdersBean->setStreet($DB->getField("Street"));
      $objOrdersBean->setNumber($DB->getField("Number"));
      $objOrdersBean->setZip($DB->getField("Zip"));
      $objOrdersBean->setCity($DB->getField("City"));
      $objOrdersBean->setPhone1($DB->getField("Phone1"));
      $objOrdersBean->setCountry($DB->getField("Country"));
      $objOrdersBean->setOrganization($DB->getField("Organization"));
      $objOrdersBean->setOrganizationEmail($DB->getField("OrganizationEmail"));

      return $objOrdersBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Orders ";
      $query.="WHERE OrderId=".$id;
      $DB->query($query);
   }
   
   public function removeRecordsList($list){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Orders ";
      $query.="WHERE OrderId IN ($list)";
      $DB->query($query);
   }   
}
?>