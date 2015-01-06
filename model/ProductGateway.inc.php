<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductBean.inc.php"); 

class ProductGateway {

   function __construct(){
   }
   
   public function findByListId($listId){
      $DB = new DB();
      $DB->connect();
      $query ="SELECT P.ProductId,P.UserId,P.BetaId,P.ProductCategoryId,P.ProductCategoryLevelOneName,P.ProductCategoryLevelOneSeoName,P.ProductCategoryLevelTwoName,P.ProductCategoryLevelTwoSeoName,P.Name,P.SeoName,P.ExtName,P.Code,P.ShortDescription,P.PreviewDescription,P.LongDescription,P.ContactDescription,P.HDescription,P.CreationDate,P.UpdateDate,P.ProductOrder,P.HomeProductOrder,P.Status,P.IsBestProduct,P.IsHomeProduct,P.IsAvailable,P.IsVisible,P.ImgDriveName,P.ImgFileName,P.ImgAlt,P.Price,P.PriceOld,P.Weight,P.ProductType,P.InStock,P.Delivery,P.Points,P.PointsMinus ";
      $query .="FROM Product P ";
	  $query .= "WHERE P.IsVisible=1 ";
      $query .="AND P.ProductId IN (".$listId.")";
      
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProductBean= new ProductBean();
			      $objProductBean->setProductId($DB->getField("ProductId"));
			      $objProductBean->setBetaId($DB->getField("BetaId"));
			      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
			      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
			      $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
			      $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
			      $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
			      $objProductBean->setUserId($DB->getField("UserId"));
			      $objProductBean->setName($DB->getField("Name"));
			      $objProductBean->setSeoName($DB->getField("SeoName"));
			      $objProductBean->setExtName($DB->getField("ExtName"));
			      $objProductBean->setCode($DB->getField("Code"));
			      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
			      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
			      $objProductBean->setLongDescription($DB->getField("LongDescription"));
			      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
			      $objProductBean->setHDescription($DB->getField("HDescription"));
			      $objProductBean->setCreationDate($DB->getField("CreationDate"));
			      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
			      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
			      $objProductBean->setStatus($DB->getField("Status"));
			      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
			      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
			      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
			      $objProductBean->setIsVisible($DB->getField("IsVisible"));
			      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
			      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
			      $objProductBean->setPrice($DB->getField("Price"));
			      $objProductBean->setPriceOld($DB->getField("PriceOld"));
			      $objProductBean->setWeight($DB->getField("Weight"));
			      $objProductBean->setProductType($DB->getField("ProductType"));
			      $objProductBean->setInStock($DB->getField("InStock"));
			      $objProductBean->setDelivery($DB->getField("Delivery"));
			      $objProductBean->setPoints($DB->getField("Points"));
			      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
			      $arr[] = $objProductBean;
      		}
      }
      return $arr;
   }
   
   public function findByName($name, $maxRows){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT Name";
      $query .= " FROM Product";
      if($name != "") {
      	$query .= " WHERE Name like '%".$name."%'";	
      }     
      $query .= " LIMIT 0, ".$maxRows."";
      $DB->query($query);
      $i = 0;
      $value = "";
      if ($DB->numRows() > 0) {
      		while($DB->move_next()) {
      			$value{"Product"}{$i}{"Name"}= $DB->getField("Name");
				$i++;
      		}
      }
      return json_encode($value);
   }
   
   public function findAll(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product";
      $query .= " WHERE IsVisible = 1";
      $query .= " ORDER BY ProductOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProductBean= new ProductBean();
			      $objProductBean->setProductId($DB->getField("ProductId"));
				  $objProductBean->setBetaId($DB->getField("BetaId"));
			      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
			      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
      			  $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
      			  $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
      			  $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
			      $objProductBean->setUserId($DB->getField("UserId"));
			      $objProductBean->setName($DB->getField("Name"));
			      $objProductBean->setSeoName($DB->getField("SeoName"));
			      $objProductBean->setExtName($DB->getField("ExtName"));
			      $objProductBean->setCode($DB->getField("Code"));
			      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
			      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
			      $objProductBean->setLongDescription($DB->getField("LongDescription"));
			      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
			      $objProductBean->setHDescription($DB->getField("HDescription"));
			      $objProductBean->setCreationDate($DB->getField("CreationDate"));
			      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
			      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
			      $objProductBean->setStatus($DB->getField("Status"));
			      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
			      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
			      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
			      $objProductBean->setIsVisible($DB->getField("IsVisible"));
			      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
			      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
			      $objProductBean->setPrice($DB->getField("Price"));
			      $objProductBean->setPriceOld($DB->getField("PriceOld"));
			      $objProductBean->setWeight($DB->getField("Weight"));
			      $objProductBean->setProductType($DB->getField("ProductType"));
			      $objProductBean->setProducerName($DB->getField("ProducerName"));
			      $objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
			      $objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
			      $objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
			      $objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
			      $objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
			      $objProductBean->setInStock($DB->getField("InStock"));
			      $objProductBean->setDelivery($DB->getField("Delivery"));
			      $objProductBean->setPoints($DB->getField("Points"));
			      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
			      $arr[] = $objProductBean;
      		}
      }
      return $arr;
   }
   
   public function findAllHomePage(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product";
      $query .= " WHERE IsHomeProduct = 1";
      $query .= " ORDER BY HomeProductOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProductBean= new ProductBean();
			      $objProductBean->setProductId($DB->getField("ProductId"));
				  $objProductBean->setBetaId($DB->getField("BetaId"));
			      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
			      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
      			  $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
      			  $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
      			  $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
			      $objProductBean->setUserId($DB->getField("UserId"));
			      $objProductBean->setName($DB->getField("Name"));
			      $objProductBean->setSeoName($DB->getField("SeoName"));
			      $objProductBean->setExtName($DB->getField("ExtName"));
			      $objProductBean->setCode($DB->getField("Code"));
			      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
			      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
			      $objProductBean->setLongDescription($DB->getField("LongDescription"));
			      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
			      $objProductBean->setHDescription($DB->getField("HDescription"));
			      $objProductBean->setCreationDate($DB->getField("CreationDate"));
			      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
			      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
			      $objProductBean->setStatus($DB->getField("Status"));
			      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
			      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
			      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
			      $objProductBean->setIsVisible($DB->getField("IsVisible"));
			      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
			      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
			      $objProductBean->setPrice($DB->getField("Price"));
			      $objProductBean->setPriceOld($DB->getField("PriceOld"));
			      $objProductBean->setWeight($DB->getField("Weight"));
			      $objProductBean->setProductType($DB->getField("ProductType"));
			      $objProductBean->setProducerName($DB->getField("ProducerName"));
			      $objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
			      $objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
			      $objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
			      $objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
			      $objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
			      $objProductBean->setInStock($DB->getField("InStock"));
			      $objProductBean->setDelivery($DB->getField("Delivery"));
			      $objProductBean->setPoints($DB->getField("Points"));
			      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
			      $arr[] = $objProductBean;
      		}
      }
      return $arr;
   }
   
   
   public function findProductAll($productCategoryId){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product ";
      $query .= "WHERE IsVisible = 1 ";
	  $query .= "AND BetaId = '".$productCategoryId."' ";
      $query .= "ORDER BY ProductOrder ASC";
	  
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProductBean= new ProductBean();
			      $objProductBean->setProductId($DB->getField("ProductId"));
				  $objProductBean->setBetaId($DB->getField("BetaId"));
			      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
			      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
      			  $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
      			  $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
      			  $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
			      $objProductBean->setUserId($DB->getField("UserId"));
			      $objProductBean->setName($DB->getField("Name"));
			      $objProductBean->setSeoName($DB->getField("SeoName"));
			      $objProductBean->setExtName($DB->getField("ExtName"));
			      $objProductBean->setCode($DB->getField("Code"));
			      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
			      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
			      $objProductBean->setLongDescription($DB->getField("LongDescription"));
			      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
			      $objProductBean->setHDescription($DB->getField("HDescription"));
			      $objProductBean->setCreationDate($DB->getField("CreationDate"));
			      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
			      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
			      $objProductBean->setStatus($DB->getField("Status"));
			      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
			      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
			      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
			      $objProductBean->setIsVisible($DB->getField("IsVisible"));
			      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
			      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
			      $objProductBean->setPrice($DB->getField("Price"));
			      $objProductBean->setPriceOld($DB->getField("PriceOld"));
			      $objProductBean->setWeight($DB->getField("Weight"));
			      $objProductBean->setProductType($DB->getField("ProductType"));
			      $objProductBean->setProducerName($DB->getField("ProducerName"));
			      $objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
			      $objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
			      $objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
			      $objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
			      $objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
			      $objProductBean->setInStock($DB->getField("InStock"));
			      $objProductBean->setDelivery($DB->getField("Delivery"));
			      $objProductBean->setPoints($DB->getField("Points"));
			      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
			      $arr[] = $objProductBean;
      		}
      }
      return $arr;
   }
   
   public function findProductAllLimited($productCategoryId, $currentPage,$itemsPerPage){
   	  
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
	    $query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product ";
	    $query .= "WHERE IsVisible = 1 ";
		$query .= "AND BetaId = '".$productCategoryId."' ";
		$query .= "ORDER BY ProductOrder ASC ";
      	$query .= "LIMIT ".$start.",".$limit;
      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0) {
	    		while($DB->move_next())
	      		{
	      			  $objProductBean= new ProductBean();
				      $objProductBean->setProductId($DB->getField("ProductId"));
					  $objProductBean->setBetaId($DB->getField("BetaId"));
				      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
				      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
	      			  $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
	      			  $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
	      			  $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
				      $objProductBean->setUserId($DB->getField("UserId"));
				      $objProductBean->setName($DB->getField("Name"));
				      $objProductBean->setSeoName($DB->getField("SeoName"));
				      $objProductBean->setExtName($DB->getField("ExtName"));
				      $objProductBean->setCode($DB->getField("Code"));
				      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
				      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
				      $objProductBean->setLongDescription($DB->getField("LongDescription"));
				      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
				      $objProductBean->setHDescription($DB->getField("HDescription"));
				      $objProductBean->setCreationDate($DB->getField("CreationDate"));
				      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
				      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
				      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
				      $objProductBean->setStatus($DB->getField("Status"));
				      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
				      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
				      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
				      $objProductBean->setIsVisible($DB->getField("IsVisible"));
				      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
				      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
				      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
				      $objProductBean->setPrice($DB->getField("Price"));
				      $objProductBean->setPriceOld($DB->getField("PriceOld"));
				      $objProductBean->setWeight($DB->getField("Weight"));
				      $objProductBean->setProductType($DB->getField("ProductType"));
				      $objProductBean->setProducerName($DB->getField("ProducerName"));
				      $objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
				      $objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
				      $objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
				      $objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
				      $objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
				      $objProductBean->setInStock($DB->getField("InStock"));
				      $objProductBean->setDelivery($DB->getField("Delivery"));
				      $objProductBean->setPoints($DB->getField("Points"));
				      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
				      $arr[] = $objProductBean;
	      		}
	      }
	      return $arr;    
	}
   
   
    public function getMaxProductOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(ProductOrder)as MaxProductOrder FROM Product";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxProductOrder = $DB->getField("MaxProductOrder");
      		}
      }
      
      return $maxProductOrder;
   }
   
    public function findAllByCategoryId($categoryId){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product";
      $query .= " WHERE IsVisible = 1";
      $query .= " AND ProductCategoryId IN (".$categoryId.")";
      $query .= " ORDER BY ProductOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProductBean= new ProductBean();
			      $objProductBean->setProductId($DB->getField("ProductId"));
				  $objProductBean->setBetaId($DB->getField("BetaId"));
			      $objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
			      $objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
      			  $objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
      			  $objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
      			  $objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
			      $objProductBean->setUserId($DB->getField("UserId"));
			      $objProductBean->setName($DB->getField("Name"));
			      $objProductBean->setSeoName($DB->getField("SeoName"));
			      $objProductBean->setExtName($DB->getField("ExtName"));
			      $objProductBean->setCode($DB->getField("Code"));
			      $objProductBean->setShortDescription($DB->getField("ShortDescription"));
			      $objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
			      $objProductBean->setLongDescription($DB->getField("LongDescription"));
			      $objProductBean->setContactDescription($DB->getField("ContactDescription"));
			      $objProductBean->setHDescription($DB->getField("HDescription"));
			      $objProductBean->setCreationDate($DB->getField("CreationDate"));
			      $objProductBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objProductBean->setProductOrder($DB->getField("ProductOrder"));
			      $objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
			      $objProductBean->setStatus($DB->getField("Status"));
			      $objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
			      $objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
			      $objProductBean->setIsAvailable($DB->getField("IsAvailable"));
			      $objProductBean->setIsVisible($DB->getField("IsVisible"));
			      $objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objProductBean->setImgFileName($DB->getField("ImgFileName"));
			      $objProductBean->setImgAlt($DB->getField("ImgAlt"));
			      $objProductBean->setPrice($DB->getField("Price"));
			      $objProductBean->setPriceOld($DB->getField("PriceOld"));
			      $objProductBean->setWeight($DB->getField("Weight"));
			      $objProductBean->setProductType($DB->getField("ProductType"));
			      $objProductBean->setProducerName($DB->getField("ProducerName"));
			      $objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
			      $objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
			      $objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
			      $objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
			      $objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
			      $objProductBean->setInStock($DB->getField("InStock"));
			      $objProductBean->setDelivery($DB->getField("Delivery"));
			      $objProductBean->setPoints($DB->getField("Points"));
			      $objProductBean->setPointsMinus($DB->getField("PointsMinus"));
			      $arr[] = $objProductBean;
      		}
      }
      return $arr;
   }

   public function findSearchAll($keyword){
   	$DB = new DB();
   	$DB->connect();
   	$query  = "SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product";
   	$query .= " WHERE IsVisible = 1";
   	$query .= " AND Name like '%".$keyword."%'";
   	$query .= " OR LongDescription like '%".$keyword."%'";
   	$query .= " ORDER BY ProductOrder DESC";
   	$DB->query($query);
   	$arr = "";
   	if ($DB->numRows()>0)
   	{
   		while($DB->move_next())
   		{
   			$objProductBean= new ProductBean();
   			$objProductBean->setProductId($DB->getField("ProductId"));
   			$objProductBean->setBetaId($DB->getField("BetaId"));
   			$objProductBean->setProductCategoryId($DB->getField("ProductCategoryId"));
   			$objProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
   			$objProductBean->setProductCategoryLevelOneSeoName($DB->getField("ProductCategoryLevelOneSeoName"));
   			$objProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
   			$objProductBean->setProductCategoryLevelTwoSeoName($DB->getField("ProductCategoryLevelTwoSeoName"));
   			$objProductBean->setUserId($DB->getField("UserId"));
   			$objProductBean->setName($DB->getField("Name"));
   			$objProductBean->setSeoName($DB->getField("SeoName"));
   			$objProductBean->setExtName($DB->getField("ExtName"));
   			$objProductBean->setCode($DB->getField("Code"));
   			$objProductBean->setShortDescription($DB->getField("ShortDescription"));
   			$objProductBean->setPreviewDescription($DB->getField("PreviewDescription"));
   			$objProductBean->setLongDescription($DB->getField("LongDescription"));
   			$objProductBean->setContactDescription($DB->getField("ContactDescription"));
   			$objProductBean->setHDescription($DB->getField("HDescription"));
   			$objProductBean->setCreationDate($DB->getField("CreationDate"));
   			$objProductBean->setUpdateDate($DB->getField("UpdateDate"));
   			$objProductBean->setProductOrder($DB->getField("ProductOrder"));
   			$objProductBean->setHomeProductOrder($DB->getField("HomeProductOrder"));
   			$objProductBean->setStatus($DB->getField("Status"));
   			$objProductBean->setIsBestProduct($DB->getField("IsBestProduct"));
   			$objProductBean->setIsHomeProduct($DB->getField("IsHomeProduct"));
   			$objProductBean->setIsAvailable($DB->getField("IsAvailable"));
   			$objProductBean->setIsVisible($DB->getField("IsVisible"));
   			$objProductBean->setImgDriveName($DB->getField("ImgDriveName"));
   			$objProductBean->setImgFileName($DB->getField("ImgFileName"));
   			$objProductBean->setImgAlt($DB->getField("ImgAlt"));
   			$objProductBean->setPrice($DB->getField("Price"));
   			$objProductBean->setPriceOld($DB->getField("PriceOld"));
   			$objProductBean->setWeight($DB->getField("Weight"));
   			$objProductBean->setProductType($DB->getField("ProductType"));
   			$objProductBean->setProducerName($DB->getField("ProducerName"));
   			$objProductBean->setProductIdLink1($DB->getField("ProductIdLink1"));
   			$objProductBean->setProductIdLink2($DB->getField("ProductIdLink2"));
   			$objProductBean->setProductIdLink3($DB->getField("ProductIdLink3"));
   			$objProductBean->setProductIdLink4($DB->getField("ProductIdLink4"));
   			$objProductBean->setProductIdLink5($DB->getField("ProductIdLink5"));
   			$objProductBean->setInStock($DB->getField("InStock"));
   			$objProductBean->setDelivery($DB->getField("Delivery"));
   			$objProductBean->setPoints($DB->getField("Points"));
   			$objProductBean->setPointsMinus($DB->getField("PointsMinus"));
   			$arr[] = $objProductBean;
   		}
   	}
   	return $arr;
   }
}
?>