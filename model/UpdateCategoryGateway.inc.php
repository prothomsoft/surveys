<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
  require_once(dirname(__FILE__)."/UpdateCategoryBean.inc.php");

class UpdateCategoryGateway{

   function __construct(){
   }

   public function findByFatherId($id){
   	  $DB = new DB();
      $DB->connect();
   	  $query ="SELECT C.UpdateCategoryId,C.FatherId,C.Name,C.SeoName,C.ListOrder,C.NumberOfItems ";
      $query.="FROM UpdateCategory C ";
      $query.="WHERE C.FatherId = '".$id."' ";
      $query.="ORDER BY C.ListOrder ASC ";
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objUpdateCategoryBean= new UpdateCategoryBean();
		      $objUpdateCategoryBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
		      $objUpdateCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objUpdateCategoryBean->setName($DB->getField("Name"));
		      $objUpdateCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objUpdateCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objUpdateCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objUpdateCategoryBean;
			}
			return $arr;
		}
		
   }
   
   public function findAllOrderedByListOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query ="SELECT C.UpdateCategoryId,C.FatherId,C.Name,C.SeoName,C.ListOrder,C.NumberOfItems ";
      $query.="FROM UpdateCategory C ";
      $query.="ORDER BY C.ListOrder ASC ";
      
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objUpdateCategoryBean= new UpdateCategoryBean();
		      $objUpdateCategoryBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
		      $objUpdateCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objUpdateCategoryBean->setName($DB->getField("Name"));
		      $objUpdateCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objUpdateCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objUpdateCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objUpdateCategoryBean;
			}
			return $arr;
		}     
   }
}
?>