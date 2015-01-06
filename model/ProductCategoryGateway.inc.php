<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductCategoryBean.inc.php");

class ProductCategoryGateway {

   function __construct(){
   }

   public function findByFatherId($id){
   	  $DB = new DB();
      $DB->connect();
   	  $query ="SELECT C.ProductCategoryId,C.FatherId,C.Name,C.Descr,C.SeoName,C.ListOrder,C.Img,C.NumberOfItems ";
      $query.="FROM ProductCategory C ";
      $query.="WHERE C.FatherId = '".$id."' ";
      $query.="ORDER BY C.ListOrder ASC ";
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objProductCategoryBean= new ProductCategoryBean();
		      $objProductCategoryBean->setProductCategoryId($DB->getField("ProductCategoryId"));
		      $objProductCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objProductCategoryBean->setName($DB->getField("Name"));
		      $objProductCategoryBean->setDescr($DB->getField("Descr"));
		      $objProductCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objProductCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objProductCategoryBean->setImg($DB->getField("Img"));
		      $objProductCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objProductCategoryBean;
			}
			return $arr;
		}
		
   }
   
   public function findAllOrderedByListOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query ="SELECT C.ProductCategoryId,C.FatherId,C.Name,C.Descr,C.SeoName,C.ListOrder,C.Img,C.NumberOfItems ";
      $query.="FROM ProductCategory C ";
      $query.="ORDER BY C.ListOrder ASC ";
      
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objProductCategoryBean= new ProductCategoryBean();
		      $objProductCategoryBean->setProductCategoryId($DB->getField("ProductCategoryId"));
		      $objProductCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objProductCategoryBean->setName($DB->getField("Name"));
		      $objProductCategoryBean->setDescr($DB->getField("Descr"));
		      $objProductCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objProductCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objProductCategoryBean->setImg($DB->getField("Img"));
		      $objProductCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objProductCategoryBean;
			}
			return $arr;
		}     
   }
}
?>