<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/GamaBean.inc.php"); 

/**
 * GamaGateway
 * 
 * database access class - gateway methods for table Gama
 */
class GamaGateway {

   function __construct(){
   }
   
   public function getMaxGamaOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(GamaOrder)as MaxGamaOrder FROM Gama";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxGamaOrder = $DB->getField("MaxGamaOrder");
      		}
      }
      
      return $maxGamaOrder;
   }
   
    public function findLatest(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT GamaId,ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,Status,ImgDriveName,VideoDriveName,YouTube,EventDate FROM Gama";
      $query .= " ORDER BY GamaOrder DESC";
      $query .= " LIMIT 0,2";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objGamaBean= new GamaBean();
			    $objGamaBean->setGamaId($DB->getField("GamaId"));
			    $objGamaBean->setClubId($DB->getField("ClubId"));
			    $objGamaBean->setGminaId($DB->getField("GminaId"));
			    $objGamaBean->setName($DB->getField("Name"));
			    $objGamaBean->setSeoName($DB->getField("SeoName"));
			    $objGamaBean->setKeyword($DB->getField("Keyword"));
			    $objGamaBean->setDescription($DB->getField("Description"));
			    $objGamaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objGamaBean->setLongDescription($DB->getField("LongDescription"));
			    $objGamaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objGamaBean->setGamaOrder($DB->getField("GamaOrder"));
			    $objGamaBean->setStatus($DB->getField("Status"));
			    $objGamaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objGamaBean->setVideoDriveName($DB->getField("VideoDriveName"));
			    $objGamaBean->setYouTube($DB->getField("YouTube"));
			    $objGamaBean->setEventDate($DB->getField("EventDate"));
			    $arr[] = $objGamaBean;
      		}
      }
      return $arr;
   }
     
   public function findAll($categoryId){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT GamaId,ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,ImgDriveName,VideoDriveName,YouTube,EventDate FROM Gama";
      $query .= " WHERE 1 = 1";
      if( $categoryId != 0 ){
	     	$query .= " AND ClubId = '".$categoryId."'";
	   }
      $query .= " ORDER BY GamaOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objGamaBean= new GamaBean();
			    $objGamaBean->setGamaId($DB->getField("GamaId"));
			    $objGamaBean->setClubId($DB->getField("ClubId"));
			    $objGamaBean->setGminaId($DB->getField("GminaId"));
			    $objGamaBean->setName($DB->getField("Name"));
			    $objGamaBean->setSeoName($DB->getField("SeoName"));
			    $objGamaBean->setKeyword($DB->getField("Keyword"));
			    $objGamaBean->setDescription($DB->getField("Description"));
			    $objGamaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objGamaBean->setLongDescription($DB->getField("LongDescription"));
			    $objGamaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objGamaBean->setGamaOrder($DB->getField("GamaOrder"));
			    $objGamaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objGamaBean->setVideoDriveName($DB->getField("VideoDriveName"));
			    $objGamaBean->setYouTube($DB->getField("YouTube"));
			    $objGamaBean->setEventDate($DB->getField("EventDate"));
			    $arr[] = $objGamaBean;
      		}
      }
      return $arr;
   }
   
   public function findAllLimited($categoryId, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT GamaId,ClubId,GminaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,GamaOrder,ImgDriveName,VideoDriveName,YouTube,EventDate FROM Gama ";
      	$query .= " WHERE 1 = 1";
	    if( $categoryId != 0 ){
			$query .= " AND ClubId = '".$categoryId."'";
		}
		$query .= " ORDER BY GamaOrder ASC";
      	$query .= " LIMIT ".$start.",".$limit;      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objGamaBean= new GamaBean();
				    $objGamaBean->setGamaId($DB->getField("GamaId"));
				    $objGamaBean->setClubId($DB->getField("ClubId"));
				    $objGamaBean->setGminaId($DB->getField("GminaId"));
				    $objGamaBean->setName($DB->getField("Name"));
				    $objGamaBean->setSeoName($DB->getField("SeoName"));
				    $objGamaBean->setKeyword($DB->getField("Keyword"));
				    $objGamaBean->setDescription($DB->getField("Description"));
				    $objGamaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objGamaBean->setLongDescription($DB->getField("LongDescription"));
				    $objGamaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objGamaBean->setGamaOrder($DB->getField("GamaOrder"));
				    $objGamaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objGamaBean->setVideoDriveName($DB->getField("VideoDriveName"));
				    $objGamaBean->setYouTube($DB->getField("YouTube"));
				    $objGamaBean->setEventDate($DB->getField("EventDate"));
				    $arr[] = $objGamaBean;
	      		}
	      }
		  return $arr;      
   }        
}
?>