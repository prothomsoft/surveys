<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductCategoryPlainBean.inc.php");

class ProductCategoryPlainGateway{

   function __construct(){
   }
   public function findAll(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT ProductCategoryPlainId,ProductCategoryId,ProductCategoryLevelOneName,ProductCategoryLevelOneSeoName FROM ProductCategoryPlain ORDER BY ProductCategoryPlainId DESC";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objProductCategoryPlainBean= new ProductCategoryPlainBean();
		      $objProductCategoryPlainBean->setProductCategoryPlainId($this->DB->getField("ProductCategoryPlainId"));
		      $objProductCategoryPlainBean->setProductCategoryId($this->DB->getField("ProductCategoryId"));
		      $objProductCategoryPlainBean->setProductCategoryName($this->DB->getField("ProductCategoryName"));
		      $objProductCategoryPlainBean->setProductCategorySeoName($this->DB->getField("ProductCategorySeoName"));
			  $arr[] = $objProductCategoryPlainBean;
      		}
      }
      return $arr;
   }
   
   public function findAllAsc(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT ProductCategoryPlainId,ProductCategoryId,ProductCategoryName,ProductCategorySeoName FROM ProductCategoryPlain ORDER BY ProductCategoryPlainId ASC";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objProductCategoryPlainBean= new ProductCategoryPlainBean();
		      $objProductCategoryPlainBean->setProductCategoryPlainId($this->DB->getField("ProductCategoryPlainId"));
		      $objProductCategoryPlainBean->setProductCategoryId($this->DB->getField("ProductCategoryId"));
		      $objProductCategoryPlainBean->setProductCategoryName($this->DB->getField("ProductCategoryName"));
		      $objProductCategoryPlainBean->setProductCategorySeoName($this->DB->getField("ProductCategorySeoName"));
			  $arr[] = $objProductCategoryPlainBean;
      		}
      }
      return $arr;
   }
   
   public function removeAll(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="DELETE FROM ProductCategoryPlain";
      $this->DB->query($query);
   }
}
?>