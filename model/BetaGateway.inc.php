<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/BetaBean.inc.php"); 

/**
 * BetaGateway
 * 
 * database access class - gateway methods for table Beta
 */
class BetaGateway {

   function __construct(){
   }
   
   public function getMaxBetaOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(BetaOrder)as MaxBetaOrder FROM Beta";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxBetaOrder = $DB->getField("MaxBetaOrder");
      		}
      }
      
      return $maxBetaOrder;
   }
   
   public function findLatest(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT BetaId,ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta";
      $query .= " WHERE Description = 1";
      $query .= " ORDER BY BetaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objBetaBean= new BetaBean();
			    $objBetaBean->setBetaId($DB->getField("BetaId"));
			    $objBetaBean->setClubId($DB->getField("ClubId"));
			    $objBetaBean->setGamaId($DB->getField("GamaId"));
			    $objBetaBean->setName($DB->getField("Name"));
			    $objBetaBean->setSeoName($DB->getField("SeoName"));
			    $objBetaBean->setKeyword($DB->getField("Keyword"));
			    $objBetaBean->setDescription($DB->getField("Description"));
			    $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objBetaBean->setLongDescription($DB->getField("LongDescription"));
			    $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
			    $objBetaBean->setStatus($DB->getField("Status"));
			    $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objBetaBean->setEventDate($DB->getField("EventDate"));
			    $arr[] = $objBetaBean;
      		}
      }
      return $arr;
   }
   
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT BetaId,ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta";
      $query .= " ORDER BY BetaOrder ASC";	  	  
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objBetaBean= new BetaBean();
			    $objBetaBean->setBetaId($DB->getField("BetaId"));
			    $objBetaBean->setClubId($DB->getField("ClubId"));
			    $objBetaBean->setGamaId($DB->getField("GamaId"));
			    $objBetaBean->setName($DB->getField("Name"));
			    $objBetaBean->setSeoName($DB->getField("SeoName"));
			    $objBetaBean->setKeyword($DB->getField("Keyword"));
			    $objBetaBean->setDescription($DB->getField("Description"));
			    $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objBetaBean->setLongDescription($DB->getField("LongDescription"));
			    $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
			    $objBetaBean->setStatus($DB->getField("Status"));
			    $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objBetaBean->setEventDate($DB->getField("EventDate"));
			    $arr[] = $objBetaBean;
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
      	$query  = "SELECT BetaId,ClubId,GamaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta ";
      	$query .= " WHERE 1 = 1";
      	$query .= " ORDER BY BetaOrder ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objBetaBean= new BetaBean();
				    $objBetaBean->setBetaId($DB->getField("BetaId"));
				    $objBetaBean->setClubId($DB->getField("ClubId"));
				    $objBetaBean->setGamaId($DB->getField("GamaId"));
				    $objBetaBean->setName($DB->getField("Name"));
				    $objBetaBean->setSeoName($DB->getField("SeoName"));
				    $objBetaBean->setKeyword($DB->getField("Keyword"));
				    $objBetaBean->setDescription($DB->getField("Description"));
				    $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objBetaBean->setLongDescription($DB->getField("LongDescription"));
				    $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
				    $objBetaBean->setStatus($DB->getField("Status"));
				    $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objBetaBean->setEventDate($DB->getField("EventDate"));
			        $arr[] = $objBetaBean;
	      		}
	      }
		  return $arr;      
   }
   
   public function findByCategoryId($categoryId){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT BetaId,ClubId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,BetaOrder,Status,ImgDriveName,EventDate FROM Beta";
      $query .= " WHERE 1 = 1";
      if( $categoryId != 0 ){
      	$query .= " AND ClubId = ".$categoryId."";
      }$query .= " ORDER BY BetaOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objBetaBean= new BetaBean();
			    $objBetaBean->setBetaId($DB->getField("BetaId"));
			    $objBetaBean->setClubId($DB->getField("ClubId"));
			    $objBetaBean->setName($DB->getField("Name"));
			    $objBetaBean->setSeoName($DB->getField("SeoName"));
			    $objBetaBean->setKeyword($DB->getField("Keyword"));
			    $objBetaBean->setDescription($DB->getField("Description"));
			    $objBetaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objBetaBean->setLongDescription($DB->getField("LongDescription"));
			    $objBetaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objBetaBean->setBetaOrder($DB->getField("BetaOrder"));
			    $objBetaBean->setStatus($DB->getField("Status"));
			    $objBetaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objBetaBean->setEventDate($DB->getField("EventDate"));			          
			    $arr[] = $objBetaBean;
      		}
      }
      return $arr;
   }   
               
}
?>