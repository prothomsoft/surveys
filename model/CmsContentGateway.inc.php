<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsContentBean.inc.php"); 

/**
 * CmsContentGateway
 * 
 * database access class - gateway methods for table CmsContent
 */
class CmsContentGateway {

   function __construct(){
   }
   
   public function getMaxCmsContentOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(CmsContentOrder)as MaxCmsContentOrder FROM CmsContent";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxCmsContentOrder = $DB->getField("MaxCmsContentOrder");
      		}
      }
      
      return $maxCmsContentOrder;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT CmsContentId,CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18 FROM CmsContent";
      $query .= " WHERE CmsContentId > 0";
      $query .= " ORDER BY CmsContentOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objCmsContentBean= new CmsContentBean();
			    $objCmsContentBean->setCmsContentId($DB->getField("CmsContentId"));
			    $objCmsContentBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
			    $objCmsContentBean->setName($DB->getField("Name"));
			    $objCmsContentBean->setNameTransEN($DB->getField("NameTransEN"));
       			$objCmsContentBean->setNameTransDE($DB->getField("NameTransDE"));
      			$objCmsContentBean->setNameTransRU($DB->getField("NameTransRU"));
			    $objCmsContentBean->setSeoName($DB->getField("SeoName"));
			    $objCmsContentBean->setKeyword($DB->getField("Keyword"));
			    $objCmsContentBean->setDescription($DB->getField("Description"));
			    $objCmsContentBean->setShortDescription($DB->getField("ShortDescription"));
			    $objCmsContentBean->setShortDescriptionTransEN($DB->getField("ShortDescriptionTransEN"));
      			$objCmsContentBean->setShortDescriptionTransDE($DB->getField("ShortDescriptionTransDE"));
      			$objCmsContentBean->setShortDescriptionTransRU($DB->getField("ShortDescriptionTransRU"));
			    $objCmsContentBean->setLongDescription($DB->getField("LongDescription"));
			    $objCmsContentBean->setLongDescriptionTransEN($DB->getField("LongDescriptionTransEN"));
			    $objCmsContentBean->setLongDescriptionTransDE($DB->getField("LongDescriptionTransDE"));
			    $objCmsContentBean->setLongDescriptionTransRU($DB->getField("LongDescriptionTransRU"));
			    $objCmsContentBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objCmsContentBean->setCmsContentOrder($DB->getField("CmsContentOrder"));
			    $objCmsContentBean->setStatus($DB->getField("Status"));
			    $objCmsContentBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objCmsContentBean->setOm1($DB->getField("Om1"));
		        $objCmsContentBean->setOm2($DB->getField("Om2"));
		        $objCmsContentBean->setOm3($DB->getField("Om3"));
		        $objCmsContentBean->setOm4($DB->getField("Om4"));
		        $objCmsContentBean->setOm5($DB->getField("Om5"));
		        $objCmsContentBean->setOm6($DB->getField("Om6"));
		        $objCmsContentBean->setOm7($DB->getField("Om7"));
		        $objCmsContentBean->setOm8($DB->getField("Om8"));
		        $objCmsContentBean->setOm9($DB->getField("Om9"));
		        $objCmsContentBean->setOm10($DB->getField("Om10"));
			      $objCmsContentBean->setOm11($DB->getField("Om11"));
			      $objCmsContentBean->setOm12($DB->getField("Om12"));
			      $objCmsContentBean->setOm13($DB->getField("Om13"));
			      $objCmsContentBean->setOm14($DB->getField("Om14"));
			      $objCmsContentBean->setOm15($DB->getField("Om15"));
			      $objCmsContentBean->setOm16($DB->getField("Om16"));
			      $objCmsContentBean->setOm17($DB->getField("Om17"));
			      $objCmsContentBean->setOm18($DB->getField("Om18"));

			    $arr[] = $objCmsContentBean;
      		}
      }
      return $arr;
   }
   
   public function findAllLimited($currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT CmsContentId,CmsCategoryId,Name,NameTransEN,NameTransDE,NameTransRU,SeoName,Keyword,Description,ShortDescription,ShortDescriptionTransEN,ShortDescriptionTransDE,ShortDescriptionTransRU,LongDescription,LongDescriptionTransEN,LongDescriptionTransDE,LongDescriptionTransRU,UpdateDate,CmsContentOrder,Status,ImgDriveName,Om1,Om2,Om3,Om4,Om5,Om6,Om7,Om8,Om9,Om10,Om11,Om12,Om13,Om14,Om15,Om16,Om17,Om18 FROM CmsContent ";
      	$query .= " WHERE CmsContentId > 0";
	    $query .= " ORDER BY CmsContentOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objCmsContentBean= new CmsContentBean();
				    $objCmsContentBean->setCmsContentId($DB->getField("CmsContentId"));
				    $objCmsContentBean->setCmsCategoryId($DB->getField("CmsCategoryId"));
				    $objCmsContentBean->setName($DB->getField("Name"));
				    $objCmsContentBean->setNameTransEN($DB->getField("NameTransEN"));
      				$objCmsContentBean->setNameTransDE($DB->getField("NameTransDE"));
      				$objCmsContentBean->setNameTransRU($DB->getField("NameTransRU"));
				    $objCmsContentBean->setSeoName($DB->getField("SeoName"));
				    $objCmsContentBean->setKeyword($DB->getField("Keyword"));
				    $objCmsContentBean->setDescription($DB->getField("Description"));
				    $objCmsContentBean->setShortDescription($DB->getField("ShortDescription"));
				    $objCmsContentBean->setShortDescriptionTransEN($DB->getField("ShortDescriptionTransEN"));
      				$objCmsContentBean->setShortDescriptionTransDE($DB->getField("ShortDescriptionTransDE"));
      				$objCmsContentBean->setShortDescriptionTransRU($DB->getField("ShortDescriptionTransRU"));
				    $objCmsContentBean->setLongDescription($DB->getField("LongDescription"));
				    $objCmsContentBean->setLongDescriptionTransEN($DB->getField("LongDescriptionTransEN"));
				    $objCmsContentBean->setLongDescriptionTransDE($DB->getField("LongDescriptionTransDE"));
				    $objCmsContentBean->setLongDescriptionTransRU($DB->getField("LongDescriptionTransRU"));
				    $objCmsContentBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objCmsContentBean->setCmsContentOrder($DB->getField("CmsContentOrder"));
				    $objCmsContentBean->setStatus($DB->getField("Status"));
				    $objCmsContentBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objCmsContentBean->setOm1($DB->getField("Om1"));
				    $objCmsContentBean->setOm2($DB->getField("Om2"));
				    $objCmsContentBean->setOm3($DB->getField("Om3"));
				    $objCmsContentBean->setOm4($DB->getField("Om4"));
				    $objCmsContentBean->setOm5($DB->getField("Om5"));
				    $objCmsContentBean->setOm6($DB->getField("Om6"));
				    $objCmsContentBean->setOm7($DB->getField("Om7"));
				    $objCmsContentBean->setOm8($DB->getField("Om8"));
				    $objCmsContentBean->setOm9($DB->getField("Om9"));
				    $objCmsContentBean->setOm10($DB->getField("Om10"));
				      $objCmsContentBean->setOm11($DB->getField("Om11"));
				      $objCmsContentBean->setOm12($DB->getField("Om12"));
				      $objCmsContentBean->setOm13($DB->getField("Om13"));
				      $objCmsContentBean->setOm14($DB->getField("Om14"));
				      $objCmsContentBean->setOm15($DB->getField("Om15"));
				      $objCmsContentBean->setOm16($DB->getField("Om16"));
				      $objCmsContentBean->setOm17($DB->getField("Om17"));
				      $objCmsContentBean->setOm18($DB->getField("Om18"));

				    $arr[] = $objCmsContentBean;
	      		}
	      }
		  return $arr;      
   }        
}
?>