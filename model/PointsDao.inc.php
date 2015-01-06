<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PointsBean.inc.php");

/**
 * PointsDAO
 * 
 * database access class - CRUD methods for table Points
 */
class PointsDao{

   function __construct(){
   }
   public function create($objPointsBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Points(PointId,UserId,OrderId,CreateDate,AuthorizeDate,AuthorizeStatus,CustomerInformation,Comments,Amount,IsSend,IsReceived) ";
      $query.= "VALUES('".$objPointsBean->getPointId()."','".$objPointsBean->getUserId()."','".$objPointsBean->getOrderId()."','".$objPointsBean->getCreateDate()."','".$objPointsBean->getAuthorizeDate()."','".$objPointsBean->getAuthorizeStatus()."','".$objPointsBean->getCustomerInformation()."','".$objPointsBean->getComments()."','".$objPointsBean->getAmount()."','".$objPointsBean->getIsSend()."','".$objPointsBean->getIsReceived()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objPointsBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Points SET ";
      $query.="PointId='".$objPointsBean->getPointId()."',";
      $query.="UserId='".$objPointsBean->getUserId()."',";
      $query.="OrderId='".$objPointsBean->getOrderId()."',";
      $query.="CreateDate='".$objPointsBean->getCreateDate()."',";
      $query.="AuthorizeDate='".$objPointsBean->getAuthorizeDate()."',";
      $query.="AuthorizeStatus='".$objPointsBean->getAuthorizeStatus()."',";
      $query.="CustomerInformation='".$objPointsBean->getCustomerInformation()."',";
      $query.="Comments='".$objPointsBean->getComments()."',";
      $query.="Amount='".$objPointsBean->getAmount()."',";
      $query.="IsSend='".$objPointsBean->getIsSend()."',";
      $query.="IsReceived='".$objPointsBean->getIsReceived()."' ";
      $query.="WHERE PointId=".$objPointsBean->getPointId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT PointId,UserId,OrderId,CreateDate,AuthorizeDate,AuthorizeStatus,CustomerInformation,Comments,Amount,IsSend,IsReceived FROM Points";
      $query.=" WHERE PointId=".$id;
      $DB->query($query);
      $objPointsBean= new PointsBean();
      $objPointsBean->setPointId($DB->getField("PointId"));
      $objPointsBean->setUserId($DB->getField("UserId"));
      $objPointsBean->setOrderId($DB->getField("OrderId"));
      $objPointsBean->setCreateDate($DB->getField("CreateDate"));
      $objPointsBean->setAuthorizeDate($DB->getField("AuthorizeDate"));
      $objPointsBean->setAuthorizeStatus($DB->getField("AuthorizeStatus"));
      $objPointsBean->setCustomerInformation($DB->getField("CustomerInformation"));
      $objPointsBean->setComments($DB->getField("Comments"));
      $objPointsBean->setAmount($DB->getField("Amount"));
      $objPointsBean->setIsSend($DB->getField("IsSend"));
      $objPointsBean->setIsReceived($DB->getField("IsReceived"));

      return $objPointsBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Points ";
      $query.="WHERE PointId=".$id;
      $DB->query($query);
   }
   
   public function removeRecordsList($list){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Points ";
      $query.="WHERE PointId IN ($list)";
      $DB->query($query);
   }   
}
?>