<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PointsBean.inc.php"); 


class PointsGateway {

   function __construct(){
   }

   public function findByUserId($userId){
   		$DB = new DB();
      	$DB->connect();
   	  	$query  = "SELECT PointId,UserId,OrderId,CreateDate,AuthorizeDate,AuthorizeStatus,CustomerInformation,Comments,Amount,IsSend,IsReceived ";
      	$query .= "FROM Points ";
      	$query .= "WHERE UserId = '".$userId."' ";
      	$query .= "ORDER BY AuthorizeDate DESC ";
      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    		while($DB->move_next()) {
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
			      	$arr[] = $objPointsBean;
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
		$query  = "SELECT PointId,UserId,OrderId,CreateDate,AuthorizeDate,AuthorizeStatus,CustomerInformation,Comments,Amount,IsSend,IsReceived ";
		$query .= "FROM Points ";
		$query .= "WHERE UserId='".$userId."' ";
		$query .= "ORDER BY AuthorizeDate DESC ";
		$query .= "LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
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
		      	  $arr[] = $objPointsBean;
				}
		}
		return $arr;
   }
     
   public function findByCategory($categoryId){
   	
   		$DB = new DB();
    	$DB->connect();
   	  	$query ="SELECT P.ProductId,P.UserId,P.OrderId,P.ProductProducerId,P.Name,P.Code,P.ShortDescription,P.LongDescription,P.CreationDate,P.UpdateDate,P.QtyInStock,P.Status,P.IsBestProduct,P.ImgDriveName,P.ImgFileName,P.ImgAlt,P.PriceNew,P.PriceOld ";
      	$query.="FROM Product P, Category C, ProductCategory PC ";
	    $query.="WHERE P.ProductId=PC.ProductId ";
      	$query.="AND C.CategoryId=PC.CategoryId ";
      	$query.="AND (C.CategoryId='".$categoryId."' OR C.FatherId='".$categoryId."')";
      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    		while($DB->move_next()) {
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
			      	$arr[] = $objPointsBean;
	   			}
      }
      return $arr;   	
   }
}
?>