<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
  require_once(dirname(__FILE__)."/CmsCategoryBean.inc.php");

class CmsCategoryGateway{

   function __construct(){
   }

   public function findByFatherId($id){
   	  $DB = new DB();
      $DB->connect();
   	  $query ="SELECT C.CmsCategoryId,C.FatherId,C.Name,C.SeoName,C.TransEN,C.TransDE,C.TransRU,C.ListOrder,C.Url,C.IsModule,C.NumberOfItems ";
      $query.="FROM CmsCategory C ";
      $query.="WHERE C.FatherId = '".$id."' ";
      $query.="ORDER BY C.ListOrder ASC ";
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objCmsCategoryBean= new CmsCategoryBean();
		      $objCmsCategoryBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
		      $objCmsCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objCmsCategoryBean->setName($DB->getField("Name"));
		      $objCmsCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objCmsCategoryBean->setTransEN($DB->getField("TransEN"));
		      $objCmsCategoryBean->setTransDE($DB->getField("TransDE"));
		      $objCmsCategoryBean->setTransRU($DB->getField("TransRU"));
		      $objCmsCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objCmsCategoryBean->setUrl($DB->getField("Url"));
		      $objCmsCategoryBean->setIsModule($DB->getField("IsModule"));
		      $objCmsCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objCmsCategoryBean;
			}
			return $arr;
		}
		
   }
   
   public function findAllOrderedByListOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query ="SELECT C.CmsCategoryId,C.FatherId,C.Name,C.SeoName,C.TransEN,C.TransDE,C.TransRU,C.ListOrder,C.Url,C.IsModule,C.NumberOfItems ";
      $query.="FROM CmsCategory C ";
      $query.="ORDER BY C.ListOrder ASC ";
      
      $DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
			while($DB->move_next())
			{
	    	  $objCmsCategoryBean= new CmsCategoryBean();
		      $objCmsCategoryBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
		      $objCmsCategoryBean->setFatherId($DB->getField("FatherId"));
		      $objCmsCategoryBean->setName($DB->getField("Name"));
		      $objCmsCategoryBean->setSeoName($DB->getField("SeoName"));
		      $objCmsCategoryBean->setTransEN($DB->getField("TransEN"));
		      $objCmsCategoryBean->setTransDE($DB->getField("TransDE"));
		      $objCmsCategoryBean->setTransRU($DB->getField("TransRU"));
		      $objCmsCategoryBean->setListOrder($DB->getField("ListOrder"));
		      $objCmsCategoryBean->setUrl($DB->getField("Url"));
		      $objCmsCategoryBean->setIsModule($DB->getField("IsModule"));
		      $objCmsCategoryBean->setNumberOfItems($DB->getField("NumberOfItems"));
	      	  $arr[] = $objCmsCategoryBean;
			}
			return $arr;
		}     
   }
}
?>