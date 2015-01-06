<?php
/**
 * OrdersProductBEAN
 * 
 * accessors' class for data retrieved from OrdersProduct
 */
class OrdersProductBean{
   private $OrdersProductId;
   private $OrderId;
   private $ProductId;
   private $PurchasePrice;
   private $Quantity;
   private $IsFilled;
   private $ProductCategoryLevelOneName;
   private $ProductCategoryLevelTwoName;
   private $ImgDriveName;
   private $Name;
   private $Points;
   private $PurchaseWeight;
   
   public function setOrdersProductId($val){
      $this->OrdersProductId=$val;
   }

   public function getOrdersProductId(){
      return $this->OrdersProductId;
   }
   
   public function setOrderId($val){
      $this->OrderId=$val;
   }

   public function getOrderId(){
      return $this->OrderId;
   }
   
   public function setProductId($val){
      $this->ProductId=$val;
   }

   public function getProductId(){
      return $this->ProductId;
   }
   
   public function setPurchasePrice($val){
      $this->PurchasePrice=$val;
   }

   public function getPurchasePrice(){
      return $this->PurchasePrice;
   }
   
   public function setQuantity($val){
      $this->Quantity=$val;
   }

   public function getQuantity(){
      return $this->Quantity;
   }
   
   public function setIsFilled($val){
      $this->IsFilled=$val;
   }

   public function getIsFilled(){
      return $this->IsFilled;
   }
   
   public function setProductCategoryLevelOneName($val){
      $this->ProductCategoryLevelOneName=$val;
   }

   public function getProductCategoryLevelOneName(){
      return $this->ProductCategoryLevelOneName;
   }
   
   public function setProductCategoryLevelTwoName($val){
      $this->ProductCategoryLevelTwoName=$val;
   }

   public function getProductCategoryLevelTwoName(){
      return $this->ProductCategoryLevelTwoName;
   }
   
   public function setImgDriveName($val){
      $this->ImgDriveName=$val;
   }

   public function getImgDriveName(){
      return $this->ImgDriveName;
   }
   
   public function setName($val){
      $this->Name=$val;
   }

   public function getName(){
      return $this->Name;
   }
   
   public function setPoints($val){
      $this->Points=$val;
   }

   public function getPoints(){
      return $this->Points;
   }
   
   public function setPurchaseWeight($val){
      $this->PurchaseWeight=$val;
   }

   public function getPurchaseWeight(){
      return $this->PurchaseWeight;
   }
      
}
?>