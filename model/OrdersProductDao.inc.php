<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/OrdersProductBean.inc.php");

/**
 * OrdersProductDAO
 * 
 * database access class - CRUD methods for table OrdersProduct
 */
class OrdersProductDao{

   function __construct(){
   }
   public function create($objOrdersProductBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO OrdersProduct(OrdersProductId,OrderId,ProductId,PurchasePrice,Quantity,IsFilled,ProductCategoryLevelOneName,ProductCategoryLevelTwoName,ImgDriveName,Name,Points,PurchaseWeight) ";
      $query.= "VALUES ('".$objOrdersProductBean->getOrdersProductId()."','".$objOrdersProductBean->getOrderId()."','".$objOrdersProductBean->getProductId()."','".$objOrdersProductBean->getPurchasePrice()."','".$objOrdersProductBean->getQuantity()."','".$objOrdersProductBean->getIsFilled()."','".$objOrdersProductBean->getProductCategoryLevelOneName()."','".$objOrdersProductBean->getProductCategoryLevelTwoName()."','".$objOrdersProductBean->getImgDriveName()."','".$objOrdersProductBean->getName()."','".$objOrdersProductBean->getPoints()."','".$objOrdersProductBean->getPurchaseWeight()."')";
      $DB->query($query);
      return $DB->getLast();
   }
   
   public function update($objOrdersProductBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE OrdersProduct SET ";
      $query.="OrderId='".$objOrdersProductBean->getOrderId()."',";
      $query.="ProductId='".$objOrdersProductBean->getProductId()."',";
      $query.="PurchasePrice='".$objOrdersProductBean->getPurchasePrice()."',";
      $query.="Quantity='".$objOrdersProductBean->getQuantity()."',";
      $query.="IsFilled='".$objOrdersProductBean->getIsFilled()."',";
      $query.="ProductCategoryLevelOneName='".$objOrdersProductBean->getProductCategoryLevelOneName()."',";
      $query.="ProductCategoryLevelTwoName='".$objOrdersProductBean->getProductCategoryLevelTwoName()."',";
      $query.="ImgDriveName='".$objOrdersProductBean->getImgDriveName()."',";
      $query.="Name='".$objOrdersProductBean->getName()."',";
      $query.="Points='".$objOrdersProductBean->getPoints()."',";
      $query.="PurchaseWeight='".$objOrdersProductBean->getPurchaseWeight()."' ";
      $query.="WHERE OrdersProductId=".$objOrdersProductBean->getOrdersProductId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT OrdersProductId,OrderId,ProductId,PurchasePrice,Quantity,IsFilled,ProductCategoryLevelOneName,ProductCategoryLevelTwoName,ImgDriveName,Name,Points,PurchaseWeight FROM OrdersProduct";
      $query.=" WHERE OrdersProductId=".$id;
      $DB->query($query);
      $objOrdersProductBean= new OrdersProductBean();
      $objOrdersProductBean->setOrdersProductId($DB->getField("OrdersProductId"));
      $objOrdersProductBean->setOrderId($DB->getField("OrderId"));
      $objOrdersProductBean->setProductId($DB->getField("ProductId"));
      $objOrdersProductBean->setPurchasePrice($DB->getField("PurchasePrice"));
      $objOrdersProductBean->setQuantity($DB->getField("Quantity"));
      $objOrdersProductBean->setIsFilled($DB->getField("IsFilled"));
      $objOrdersProductBean->setProductCategoryLevelOneName($DB->getField("ProductCategoryLevelOneName"));
      $objOrdersProductBean->setProductCategoryLevelTwoName($DB->getField("ProductCategoryLevelTwoName"));
      $objOrdersProductBean->setImgDriveName($DB->getField("ImgDriveName"));
      $objOrdersProductBean->setName($DB->getField("Name"));
      $objOrdersProductBean->setPoints($DB->getField("Points"));
      $objOrdersProductBean->setPurchaseWeight($DB->getField("PurchaseWeight"));
      return $objOrdersProductBean;
   }
   
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from OrdersProduct ";
      $query.="WHERE OrdersProductId=".$id;
      $DB->query($query);
   }
}
?>