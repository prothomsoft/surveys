<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductBean.inc.php");

class ProductDao{

   function __construct(){
   }
   public function create($objProductBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Product(BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus) ";
      $query.= "VALUES('".$objProductBean->getBetaId()."','".$objProductBean->getProductCategoryId()."','".$objProductBean->getProductCategoryLevelOneName()."','".$objProductBean->getProductCategoryLevelOneSeoName()."','".$objProductBean->getProductCategoryLevelTwoName()."','".$objProductBean->getProductCategoryLevelTwoSeoName()."','".$objProductBean->getUserId()."','".$objProductBean->getName()."','".$objProductBean->getSeoName()."','".$objProductBean->getExtName()."','".$objProductBean->getCode()."','".$objProductBean->getShortDescription()."','".$objProductBean->getPreviewDescription()."','".$objProductBean->getLongDescription()."','".$objProductBean->getContactDescription()."','".$objProductBean->getHDescription()."','".$objProductBean->getCreationDate()."','".$objProductBean->getUpdateDate()."','".$objProductBean->getProductOrder()."','".$objProductBean->getHomeProductOrder()."','".$objProductBean->getStatus()."','".$objProductBean->getIsBestProduct()."','".$objProductBean->getIsHomeProduct()."','".$objProductBean->getIsAvailable()."','".$objProductBean->getIsVisible()."','".$objProductBean->getImgDriveName()."','".$objProductBean->getImgFileName()."','".$objProductBean->getImgAlt()."','".$objProductBean->getPrice()."','".$objProductBean->getPriceOld()."','".$objProductBean->getWeight()."','".$objProductBean->getProductType()."','".$objProductBean->getProducerName()."','".$objProductBean->getProductIdLink1()."','".$objProductBean->getProductIdLink2()."','".$objProductBean->getProductIdLink3()."','".$objProductBean->getProductIdLink4()."','".$objProductBean->getProductIdLink5()."','".$objProductBean->getInStock()."','".$objProductBean->getDelivery()."','".$objProductBean->getPoints()."','".$objProductBean->getPointsMinus()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objProductBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Product SET ";
	  $query.="BetaId='".$objProductBean->getBetaId()."',";
      $query.="ProductCategoryId='".$objProductBean->getProductCategoryId()."',";
      $query.="ProductCategoryLevelOneName='".$objProductBean->getProductCategoryLevelOneName()."',";
      $query.="ProductCategoryLevelOneSeoName='".$objProductBean->getProductCategoryLevelOneSeoName()."',";
      $query.="ProductCategoryLevelTwoName='".$objProductBean->getProductCategoryLevelTwoName()."',";
      $query.="ProductCategoryLevelTwoSeoName='".$objProductBean->getProductCategoryLevelTwoSeoName()."',";
      $query.="UserId='".$objProductBean->getUserId()."',";
      $query.="Name='".$objProductBean->getName()."',";
      $query.="SeoName='".$objProductBean->getSeoName()."',";
      $query.="ExtName='".$objProductBean->getExtName()."',";
      $query.="Code='".$objProductBean->getCode()."',";
      $query.="ShortDescription='".$objProductBean->getShortDescription()."',";
      $query.="PreviewDescription='".$objProductBean->getPreviewDescription()."',";
      $query.="LongDescription='".$objProductBean->getLongDescription()."',";
      $query.="ContactDescription='".$objProductBean->getContactDescription()."',";
      $query.="HDescription='".$objProductBean->getHDescription()."',";
      $query.="CreationDate='".$objProductBean->getCreationDate()."',";
      $query.="UpdateDate='".$objProductBean->getUpdateDate()."',";
      $query.="ProductOrder='".$objProductBean->getProductOrder()."',";
      $query.="HomeProductOrder='".$objProductBean->getHomeProductOrder()."',";
      $query.="Status='".$objProductBean->getStatus()."',";
      $query.="IsBestProduct='".$objProductBean->getIsBestProduct()."',";
      $query.="IsHomeProduct='".$objProductBean->getIsHomeProduct()."',";
      $query.="IsAvailable='".$objProductBean->getIsAvailable()."',";
      $query.="IsVisible='".$objProductBean->getIsVisible()."',";
      $query.="ImgDriveName='".$objProductBean->getImgDriveName()."',";
      $query.="ImgFileName='".$objProductBean->getImgFileName()."',";
      $query.="ImgAlt='".$objProductBean->getImgAlt()."',";
      $query.="Price='".$objProductBean->getPrice()."',";
      $query.="PriceOld='".$objProductBean->getPriceOld()."',";
      $query.="Weight='".$objProductBean->getWeight()."',";
      $query.="ProductType='".$objProductBean->getProductType()."',";
      $query.="ProducerName='".$objProductBean->getProducerName()."',";
      $query.="ProductIdLink1='".$objProductBean->getProductIdLink1()."',";
      $query.="ProductIdLink2='".$objProductBean->getProductIdLink2()."',";
      $query.="ProductIdLink3='".$objProductBean->getProductIdLink3()."',";
      $query.="ProductIdLink4='".$objProductBean->getProductIdLink4()."',";
      $query.="ProductIdLink5='".$objProductBean->getProductIdLink5()."',";
      $query.="InStock='".$objProductBean->getInStock()."',";
      $query.="Delivery='".$objProductBean->getDelivery()."',";
      $query.="Points='".$objProductBean->getPoints()."',";
      $query.="PointsMinus='".$objProductBean->getPointsMinus()."' ";
      $query.="WHERE ProductId=".$objProductBean->getProductId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus FROM Product";
      $query.=" WHERE ProductId=".$id;
      $DB->query($query);
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

      return $objProductBean;
   }
   
   public function readBySeoName($SeoName){
      $DB = new DB();
      $DB->connect();
      $query="SELECT ProductId,BetaId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName,ProductCategoryLevelTwoName,ProductCategoryLevelTwoSeoName,UserId,Name,SeoName,ExtName,Code,ShortDescription,PreviewDescription,LongDescription,ContactDescription,HDescription,CreationDate,UpdateDate,ProductOrder,HomeProductOrder,Status,IsBestProduct,IsHomeProduct,IsAvailable,IsVisible,ImgDriveName,ImgFileName,ImgAlt,Price,PriceOld,Weight,ProductType,ProducerName,ProductIdLink1,ProductIdLink2,ProductIdLink3,ProductIdLink4,ProductIdLink5,InStock,Delivery,Points,PointsMinus  FROM Product";
      $query.=" WHERE SeoName='".$SeoName."'";
      $DB->query($query);
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

      return $objProductBean;
   }

   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Product ";
      $query.="WHERE ProductId=".$id;
      $DB->query($query);
   }       
}
?>