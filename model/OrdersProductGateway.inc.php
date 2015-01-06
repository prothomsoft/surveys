<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/OrdersProductBean.inc.php");
 
class OrdersProductGateway {

   function __construct(){
   }
   
   public function findProductsbyOrderId($orderId){
      $this->DB = new DB();
      $this->DB->connect();
            
      $query  = "SELECT ProductId, OrderId, PurchasePrice, Quantity, IsFilled,  ProductCategoryLevelOneName, ProductCategoryLevelTwoName,ImgDriveName,Name,Points,PurchaseWeight ";
      $query .= "FROM OrdersProduct ";
      $query .= "WHERE OrderId='".$orderId."'";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objOrdersProductBean = new OrdersProductBean();
		      $objOrdersProductBean->setProductId($this->DB->getField("ProductId"));
		      $objOrdersProductBean->setOrderId($this->DB->getField("OrderId"));
		      $objOrdersProductBean->setPurchasePrice($this->DB->getField("PurchasePrice"));
		      $objOrdersProductBean->setQuantity($this->DB->getField("Quantity"));
		      $objOrdersProductBean->setIsFilled($this->DB->getField("IsFilled"));
		      $objOrdersProductBean->setProductCategoryLevelOneName($this->DB->getField("ProductCategoryLevelOneName"));
		      $objOrdersProductBean->setProductCategoryLevelTwoName($this->DB->getField("ProductCategoryLevelTwoName"));
			  $objOrdersProductBean->setImgDriveName($this->DB->getField("ImgDriveName"));
			  $objOrdersProductBean->setName($this->DB->getField("Name"));
			  $objOrdersProductBean->setPoints($this->DB->getField("Points"));
			  $objOrdersProductBean->setPurchaseWeight($this->DB->getField("PurchaseWeight"));
			  
		      $arr[] = $objOrdersProductBean;
      		}
      }
      return $arr;
   }
}
?>