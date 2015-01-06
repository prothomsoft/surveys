<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/DeltaBean.inc.php"); 

/**
 * DeltaGateway
 * 
 * database access class - gateway methods for table Delta
 */
class DeltaGateway {

   function __construct(){
   }
   
   public function getMaxDeltaOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(DeltaOrder)as MaxDeltaOrder FROM Delta";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxDeltaOrder = $DB->getField("MaxDeltaOrder");
      		}
      }
      
      return $maxDeltaOrder;
   }
   
   public function findLatest(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Delta";
      $query .= " WHERE Status = 0";
      $query .= " ORDER BY DeltaOrder DESC";
      $query .= " LIMIT 0,4";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objDeltaBean= new DeltaBean();
			    $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
			    $objDeltaBean->setClubId($DB->getField("ClubId"));
			    $objDeltaBean->setBetaId($DB->getField("BetaId"));
			    $objDeltaBean->setName($DB->getField("Name"));
			    $objDeltaBean->setSeoName($DB->getField("SeoName"));
			    $objDeltaBean->setKeyword($DB->getField("Keyword"));
			    $objDeltaBean->setDescription($DB->getField("Description"));
			    $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
			    $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
			    $objDeltaBean->setStatus($DB->getField("Status"));
			    $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objDeltaBean->setEventDate($DB->getField("EventDate"));
			    $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));      
			    $arr[] = $objDeltaBean;
      		}
      }
      return $arr;
   }
   
   public function findInCurrentMonth(){
   	
   	  // get Current Date
   	  $day = date("d");
   	  $month = date("n");
   	  $year = date("Y");
   	  
   	  // total Days in current month
   	  $totalMonthDays = 31;
	  while (!checkdate($month, $totalMonthDays, $year)) $totalMonthDays--;
	  
	  // search range
	  $searchStartDate = $year."-".$month."-01";
	  $searchEndDate = $year."-".$month."-".$totalMonthDays;
	
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT DeltaId,ClubId,BetaId,Name,SeoName,EventCalendar,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Delta";
      $query .= " WHERE Status = 0";
      $query .= " AND EventCalendar >= '$searchStartDate'";
      $query .= " AND EventCalendar <= '$searchEndDate'  ";
      $query .= " ORDER BY DeltaOrder ASC";            
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objDeltaBean= new DeltaBean();
      			$objDeltaBean->setDeltaId($DB->getField("DeltaId"));
			    $objDeltaBean->setClubId($DB->getField("ClubId"));
			    $objDeltaBean->setBetaId($DB->getField("BetaId"));
			    $objDeltaBean->setName($DB->getField("Name"));
			    $objDeltaBean->setSeoName($DB->getField("SeoName"));
			    $objDeltaBean->setKeyword($DB->getField("Keyword"));
			    $objDeltaBean->setDescription($DB->getField("Description"));
			    $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
			    $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
			    $objDeltaBean->setStatus($DB->getField("Status"));
			    $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objDeltaBean->setEventDate($DB->getField("EventDate"));
			    $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $arr[] = $objDeltaBean;
      		}
      }
      return $arr;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Delta";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY DeltaOrder ASC";
	  $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objDeltaBean= new DeltaBean();
			    $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
			    $objDeltaBean->setClubId($DB->getField("ClubId"));
			    $objDeltaBean->setBetaId($DB->getField("BetaId"));
			    $objDeltaBean->setName($DB->getField("Name"));
			    $objDeltaBean->setSeoName($DB->getField("SeoName"));
			    $objDeltaBean->setKeyword($DB->getField("Keyword"));
			    $objDeltaBean->setDescription($DB->getField("Description"));
			    $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
			    $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
			    $objDeltaBean->setStatus($DB->getField("Status"));
			    $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objDeltaBean->setEventDate($DB->getField("EventDate"));
			    $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $arr[] = $objDeltaBean;
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
      	$query  = "SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Delta ";
      	$query .= " WHERE 1 = 1";
      	$query .= " ORDER BY DeltaOrder ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objDeltaBean= new DeltaBean();
				    $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
				    $objDeltaBean->setClubId($DB->getField("ClubId"));
				    $objDeltaBean->setBetaId($DB->getField("BetaId"));
				    $objDeltaBean->setName($DB->getField("Name"));
				    $objDeltaBean->setSeoName($DB->getField("SeoName"));
				    $objDeltaBean->setKeyword($DB->getField("Keyword"));
				    $objDeltaBean->setDescription($DB->getField("Description"));
				    $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
				    $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
				    $objDeltaBean->setStatus($DB->getField("Status"));
				    $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objDeltaBean->setEventDate($DB->getField("EventDate"));
			    $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));
				    $arr[] = $objDeltaBean;
	      		}
	      }
		  return $arr;      
   }
   
   public function findByCategoryId($categoryId){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT DeltaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,DeltaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Delta";
      $query .= " WHERE 1 = 1";
      if( $categoryId != 0 ){
      	$query .= " AND ClubId = ".$categoryId."";
      }$query .= " ORDER BY DeltaOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objDeltaBean= new DeltaBean();
			    $objDeltaBean->setDeltaId($DB->getField("DeltaId"));
			    $objDeltaBean->setClubId($DB->getField("ClubId"));
			    $objDeltaBean->setBetaId($DB->getField("BetaId"));
			    $objDeltaBean->setName($DB->getField("Name"));
			    $objDeltaBean->setSeoName($DB->getField("SeoName"));
			    $objDeltaBean->setKeyword($DB->getField("Keyword"));
			    $objDeltaBean->setDescription($DB->getField("Description"));
			    $objDeltaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objDeltaBean->setLongDescription($DB->getField("LongDescription"));
			    $objDeltaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objDeltaBean->setDeltaOrder($DB->getField("DeltaOrder"));
			    $objDeltaBean->setStatus($DB->getField("Status"));
			    $objDeltaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objDeltaBean->setEventDate($DB->getField("EventDate"));
			    $objDeltaBean->setEventCalendar($DB->getField("EventCalendar"));      
			    $arr[] = $objDeltaBean;
      		}
      }
      return $arr;
   }        
}
?>