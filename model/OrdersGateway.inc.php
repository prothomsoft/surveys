<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/OrdersBean.inc.php"); 


class OrdersGateway {

   function __construct(){
   }

   public function findByUserId($userId){
   		$DB = new DB();
      	$DB->connect();
   	  	$query  = "SELECT OrderId,UserId,CreateDate,AuthorizeDate,AuthorizeStatus,AuthorizeMail,CustomerInformation,Comments,Amount,IsSend,IsPointed,PointComment,ShipName,PaymentName,ShipPrice,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Country,Organization,OrganizationEmail ";
      	$query .= "FROM Orders ";
      	$query .= "WHERE UserId = '".$userId."' ";
      	$query .= "ORDER BY AuthorizeDate DESC ";
      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    		while($DB->move_next()) {
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
			      	$arr[] = $objOrdersBean;
	   			}
      }
      return $arr;
   }
   
    public function findByUserIdLimited($userId, $currentPage, $itemsPerPage){
   	
	   	if ($currentPage != '') {
	   		$page=$currentPage;
	   	} else {
	   		$page=1;
	   	}
	   	
	   	if ($itemsPerPage != '') {
	   		$limit=$itemsPerPage;
	   	} else {
	   		$limit=0;
	   	}
	   	
	   	if ($page<=0) $page = 1;
	   	$start = ($page-1)*$limit;
   	
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT OrderId,UserId,CreateDate,AuthorizeDate,AuthorizeStatus,AuthorizeMail,CustomerInformation,Comments,Amount,IsSend,IsPointed,PointComment,ShipName,PaymentNam,ShipPrice,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Country,Organization,OrganizationEmail ";
		$query .= "FROM Orders ";
		$query .= "WHERE UserId='".$userId."' ";
		$query .= "ORDER BY AuthorizeDate DESC ";
		$query .= "LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
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
		      	  $arr[] = $objOrdersBean;
				}
		}
		return $arr;
   }   
}
?>