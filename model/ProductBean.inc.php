<?php
require_once(dirname(__FILE__)."/UserDao.inc.php");
require_once(dirname(__FILE__)."/ProductCategoryDao.inc.php");

class ProductBean{
   private $ProductId;
   private $BetaId;
   private $ProductCategoryId;
   private $ProductCategory;   // additional property for foreign key object
   private $ProductCategoryLevelOneName;
   private $ProductCategoryLevelOneSeoName;
   private $ProductCategoryLevelTwoName;
   private $ProductCategoryLevelTwoSeoName;
   private $UserId;
   private $User;   // additional property for foreign key object
   private $Name;
   private $SeoName;
   private $ExtName;
   private $Code;
   private $ShortDescription;
   private $PreviewDescription;
   private $LongDescription;
   private $ContactDescription;
   private $HDescription;
   private $CreationDate;
   private $UpdateDate;
   private $ProductOrder;
   private $HomeProductOrder;
   private $Status;
   private $IsBestProduct;
   private $IsHomeProduct;
   private $IsAvailable;
   private $IsVisible;
   private $ImgDriveName;
   private $ImgFileName;
   private $ImgAlt;
   private $Price;
   private $PriceOld;
   private $Weight;
   private $ProductType;
   private $ProducerName;
   private $ProductIdLink1;
   private $ProductIdLink2;
   private $ProductIdLink3;
   private $ProductIdLink4;
   private $ProductIdLink5;
   private $InStock;
   private $Delivery;
   private $Points;
   private $PointsMinus;

   public function setProductId($val){
      $this->ProductId=$val;
   }

   public function getProductId(){
      return $this->ProductId;
   }
   
   public function setBetaId($val){
      $this->BetaId=$val;
   }

   public function getBetaId(){
      return $this->BetaId;
   }
   
   public function setProductCategoryId($val){
      $this->ProductCategoryId=$val;
   }

   public function getProductCategoryId(){
      return $this->ProductCategoryId;
   }
   
   public function getProductCategory(){   // additional getter for foreign key object
      if(!is_object($this->ProductCategory)){
         $objProductCategoryDao = new ProductCategoryDao();
         $objProductCategoryBean = $objProductCategoryDao->read($this->getProductCategoryId());
         $this->ProductCategory = $objProductCategoryBean;
      }
      return $this->ProductCategory;
   }
   
   public function setProductCategoryLevelOneName($val){
      $this->ProductCategoryLevelOneName=$val;
   }

   public function getProductCategoryLevelOneName(){
      return $this->ProductCategoryLevelOneName;
   }
   
   public function setProductCategoryLevelOneSeoName($val){
      $this->ProductCategoryLevelOneSeoName=$val;
   }

   public function getProductCategoryLevelOneSeoName(){
      return $this->ProductCategoryLevelOneSeoName;
   }
   
   public function setProductCategoryLevelTwoName($val){
      $this->ProductCategoryLevelTwoName=$val;
   }

   public function getProductCategoryLevelTwoName(){
      return $this->ProductCategoryLevelTwoName;
   }
   
   public function setProductCategoryLevelTwoSeoName($val){
      $this->ProductCategoryLevelTwoSeoName=$val;
   }

   public function getProductCategoryLevelTwoSeoName(){
      return $this->ProductCategoryLevelTwoSeoName;
   }
               
   public function setUserId($val){
      $this->UserId=$val;
   }

   public function getUserId(){
      return $this->UserId;
   }

   public function getUser(){   // additional getter for foreign key object
      if(!is_object($this->User)){
         $objUserDao = new UserDao();
         $objUserBean = $objUserDao->read($this->getUserId());
         $this->User = $objUserBean;
      }
      return $this->User;
   }
  
   public function setName($val){
      $this->Name=$val;
   }

   public function getName(){
      return $this->Name;
   }
   
   public function setSeoName($val){
      $this->SeoName=$val;
   }

   public function getSeoName(){
      return $this->SeoName;
   }
   
   public function setExtName($val){
      $this->ExtName=$val;
   }

   public function getExtName(){
      return $this->ExtName;
   }


   public function setCode($val){
      $this->Code=$val;
   }

   public function getCode(){
      return $this->Code;
   }

   public function setShortDescription($val){
      $this->ShortDescription=$val;
   }

   public function getShortDescription(){
      return $this->ShortDescription;
   }
   
   public function setPreviewDescription($val){
      $this->PreviewDescription=$val;
   }

   public function getPreviewDescription(){
      return $this->PreviewDescription;
   }

   public function setLongDescription($val){
      $this->LongDescription=$val;
   }

   public function getLongDescription(){
      return $this->LongDescription;
   }
   
   public function setContactDescription($val){
      $this->ContactDescription=$val;
   }

   public function getContactDescription(){
      return $this->ContactDescription;
   }
   
   public function setHDescription($val){
      $this->HDescription=$val;
   }

   public function getHDescription(){
      return $this->HDescription;
   }

   public function setCreationDate($val){
      $this->CreationDate=$val;
   }

   public function getCreationDate(){
      return $this->CreationDate;
   }

   public function setUpdateDate($val){
      $this->UpdateDate=$val;
   }

   public function getUpdateDate(){
      return $this->UpdateDate;
   }

   public function setProductOrder($val){
      $this->ProductOrder=$val;
   }

   public function getProductOrder(){
      return $this->ProductOrder;
   }
   
   public function setHomeProductOrder($val){
      $this->HomeProductOrder=$val;
   }

   public function getHomeProductOrder(){
      return $this->HomeProductOrder;
   }

   public function setStatus($val){
      $this->Status=$val;
   }

   public function getStatus(){
      return $this->Status;
   }

   public function setIsBestProduct($val){
      $this->IsBestProduct=$val;
   }

   public function getIsBestProduct(){
      return $this->IsBestProduct;
   }
   
   public function setIsHomeProduct($val){
      $this->IsHomeProduct=$val;
   }

   public function getIsHomeProduct(){
      return $this->IsHomeProduct;
   }
   
   public function setIsAvailable($val){
      $this->IsAvailable=$val;
   }

   public function getIsAvailable(){
      return $this->IsAvailable;
   }
   
   public function setIsVisible($val){
      $this->IsVisible=$val;
   }

   public function getIsVisible(){
      return $this->IsVisible;
   }

   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }

   public function setImgFileName($val){
      $this->ImgFileName=$val;
   }

   public function getImgFileName(){
      return $this->ImgFileName;
   }

   public function setImgAlt($val){
      $this->ImgAlt=$val;
   }

   public function getImgAlt(){
      return $this->ImgAlt;
   }
   
   public function setPrice($val){
      $this->Price=$val;
   }

   public function getPrice(){
      return $this->Price;
   }

   public function setPriceOld($val){
      $this->PriceOld=$val;
   }

   public function getPriceOld(){
      return $this->PriceOld;
   }
   
   public function setWeight($val){
      $this->Weight=$val;
   }

   public function getWeight(){
      return $this->Weight;
   }
   
   public function setProductType($val){
      $this->ProductType=$val;
   }

   public function getProductType(){
      return $this->ProductType;
   }
   
   public function setProducerName($val){
      $this->ProducerName=$val;
   }

   public function getProducerName(){
      return $this->ProducerName;
   }
   
   public function setProductIdLink1($val){
      $this->ProductIdLink1=$val;
   }

   public function getProductIdLink1(){
      return $this->ProductIdLink1;
   }
   
   public function setProductIdLink2($val){
      $this->ProductIdLink2=$val;
   }

   public function getProductIdLink2(){
      return $this->ProductIdLink2;
   }
   
   public function setProductIdLink3($val){
      $this->ProductIdLink3=$val;
   }

   public function getProductIdLink3(){
      return $this->ProductIdLink3;
   }
   
   public function setProductIdLink4($val){
      $this->ProductIdLink4=$val;
   }

   public function getProductIdLink4(){
      return $this->ProductIdLink4;
   }
   
   public function setProductIdLink5($val){
      $this->ProductIdLink5=$val;
   }

   public function getProductIdLink5(){
      return $this->ProductIdLink5;
   }
   
   public function setInStock($val){
      $this->InStock=$val;
   }

   public function getInStock(){
      return $this->InStock;
   }
   
   public function setDelivery($val){
      $this->Delivery=$val;
   }

   public function getDelivery(){
      return $this->Delivery;
   }
   
   public function setPoints($val){
      $this->Points=$val;
   }

   public function getPoints(){
      return $this->Points;
   }
   
   public function setPointsMinus($val){
      $this->PointsMinus=$val;
   }

   public function getPointsMinus(){
      return $this->PointsMinus;
   }
   
}
?>