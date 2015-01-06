<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/SigmaBean.inc.php"); 

/**
 * SigmaGateway
 * 
 * database access class - gateway methods for table Sigma
 */
class SigmaGateway {

   function __construct(){
   }
   
   public function getMaxSigmaOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(SigmaOrder)as MaxSigmaOrder FROM Sigma";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxSigmaOrder = $DB->getField("MaxSigmaOrder");
      		}
      }
      
      return $maxSigmaOrder;
   }
   
   public function findHomePage(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Sigma";
      $query .= " WHERE Description = 1";
      $query .= " ORDER BY SigmaOrder DESC";      
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setKeyword($DB->getField("Keyword"));
			    $objSigmaBean->setDescription($DB->getField("Description"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
			    $objSigmaBean->setStatus($DB->getField("Status"));
			    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));      
			    $arr[] = $objSigmaBean;
      		}
      }
      return $arr;
   }
   
   public function findLatest(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Sigma";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY SigmaOrder DESC";
      $query .= " LIMIT 0,8";      
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setKeyword($DB->getField("Keyword"));
			    $objSigmaBean->setDescription($DB->getField("Description"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
			    $objSigmaBean->setStatus($DB->getField("Status"));
			    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));      
			    $arr[] = $objSigmaBean;
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
      $query  = "SELECT SigmaId,DeltaId,Name,SeoName,EventCalendar,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Sigma";
      $query .= " WHERE Status = 0";
      $query .= " AND EventCalendar >= '$searchStartDate'";
      $query .= " AND EventCalendar <= '$searchEndDate'  ";
      $query .= " ORDER BY SigmaOrder ASC";            
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
      			$objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setKeyword($DB->getField("Keyword"));
			    $objSigmaBean->setDescription($DB->getField("Description"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
			    $objSigmaBean->setStatus($DB->getField("Status"));
			    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $arr[] = $objSigmaBean;
      		}
      }
      return $arr;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Sigma";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY SigmaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setKeyword($DB->getField("Keyword"));
			    $objSigmaBean->setDescription($DB->getField("Description"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
			    $objSigmaBean->setStatus($DB->getField("Status"));
			    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $arr[] = $objSigmaBean;
      		}
      }
      return $arr;
   }
   
   public function findAllLimited($DeltaId, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar  FROM Sigma ";
      	$query .= " WHERE 1 = 1";
      	if( $DeltaId != 0 ){
	      	$query .= " AND DeltaId = '".$DeltaId."'";
	    }
	    
	    $query .= " ORDER BY SigmaOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objSigmaBean= new SigmaBean();
				    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
				    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
				    $objSigmaBean->setName($DB->getField("Name"));
				    $objSigmaBean->setSeoName($DB->getField("SeoName"));
				    $objSigmaBean->setKeyword($DB->getField("Keyword"));
				    $objSigmaBean->setDescription($DB->getField("Description"));
				    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
				    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
				    $objSigmaBean->setStatus($DB->getField("Status"));
				    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));
				    $arr[] = $objSigmaBean;
	      		}
	      }
		  return $arr;      
   }
   
   public function findByCategoryId($categoryId){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT SigmaId,DeltaId,Name,SeoName,Keyword,Description,ShortDescription,LongDescription,UpdateDate,SigmaOrder,Status,ImgDriveName,EventDate,EventCalendar FROM Sigma";
      $query .= " WHERE 1 = 1";
      if( $categoryId != 0 ){
      	$query .= " AND DeltaId = ".$categoryId."";
      }$query .= " ORDER BY SigmaOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setDeltaId($DB->getField("DeltaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setKeyword($DB->getField("Keyword"));
			    $objSigmaBean->setDescription($DB->getField("Description"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objSigmaBean->setSigmaOrder($DB->getField("SigmaOrder"));
			    $objSigmaBean->setStatus($DB->getField("Status"));
			    $objSigmaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objSigmaBean->setEventDate($DB->getField("EventDate"));
			    $objSigmaBean->setEventCalendar($DB->getField("EventCalendar"));      
			    $arr[] = $objSigmaBean;
      		}
      }
      return $arr;
   }
   
   public function findSearchAll($searchKey){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT SigmaId,Name,ShortDescription,LongDescription FROM Sigma";
      $query .= " WHERE 1 = 1";
      $query .= " AND ShortDescription like '%".$searchKey."%' ";
      $query .= " OR LongDescription like '%".$searchKey."%' ";
      $query .= " OR Name like '%".$searchKey."%' ";
      $query .= " ORDER BY SigmaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setEventDate("news");
			    $arr[] = $objSigmaBean;
      		}
      }
      
      
      $query  = "SELECT BetaId,Name,ShortDescription,LongDescription FROM Beta";
      $query .= " WHERE 1 = 1";
      $query .= " AND ShortDescription like '%".$searchKey."%' ";
      $query .= " OR LongDescription like '%".$searchKey."%' ";
      $query .= " OR Name like '%".$searchKey."%' ";
      $query .= " ORDER BY BetaOrder DESC";
      $DB->query($query);
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("BetaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setEventDate("article");
			    $arr[] = $objSigmaBean;
      		}
      }
      
      $query  = "SELECT CmsContentId,Name,SeoName,LongDescription FROM CmsContent";
      $query .= " WHERE 1 = 1";
      $query .= " AND LongDescription like '%".$searchKey."%' ";
      $query .= " OR Name like '%".$searchKey."%' ";
      $query .= " ORDER BY UpdateDate DESC";
      $DB->query($query);
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("CmsContentId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setShortDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setEventDate("cms");
			    $arr[] = $objSigmaBean;
      		}
      }
      
      return $arr;
   }
   
   public function findSearchAllLimited($searchKey, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT SigmaId,Name,ShortDescription,LongDescription FROM Sigma ";
      	$query .= " WHERE 1 = 1";
      	$query .= " AND ShortDescription like '%".$searchKey."%' ";
      	$query .= " OR LongDescription like '%".$searchKey."%' ";
      	$query .= " OR Name like '%".$searchKey."%' ";
      	$query .= " ORDER BY SigmaOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objSigmaBean= new SigmaBean();
				    $objSigmaBean->setSigmaId($DB->getField("SigmaId"));
				    $objSigmaBean->setName($DB->getField("Name"));
				    $objSigmaBean->setLongDescription($DB->getField("LongDescription"));
				    $objSigmaBean->setEventDate("news");
				    $arr[] = $objSigmaBean;
	      		}
	      }
	      
	      
	  $query  = "SELECT BetaId,Name,ShortDescription,LongDescription FROM Beta";
      $query .= " WHERE 1 = 1";
      $query .= " AND ShortDescription like '%".$searchKey."%' ";
      $query .= " OR LongDescription like '%".$searchKey."%' ";
      $query .= " OR Name like '%".$searchKey."%' ";
      $query .= " ORDER BY BetaOrder DESC";
      $query .= " LIMIT ".$start.",".$limit;
      $DB->query($query);
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("BetaId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objSigmaBean->setEventDate("article");
			    $arr[] = $objSigmaBean;
      		}
      }
      
      $query  = "SELECT CmsContentId,Name,SeoName,LongDescription FROM CmsContent";
      $query .= " WHERE 1 = 1";
      $query .= " AND LongDescription like '%".$searchKey."%' ";
      $query .= " OR Name like '%".$searchKey."%' ";
      $query .= " ORDER BY UpdateDate DESC";
      $query .= " LIMIT ".$start.",".$limit;
      $DB->query($query);
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objSigmaBean= new SigmaBean();
			    $objSigmaBean->setSigmaId($DB->getField("CmsContentId"));
			    $objSigmaBean->setName($DB->getField("Name"));
			    $objSigmaBean->setSeoName($DB->getField("SeoName"));
			    $objSigmaBean->setShortDescription($DB->getField("LongDescription"));
			    $objSigmaBean->setEventDate("cms");
			    $arr[] = $objSigmaBean;
      		}
      }
	      
	      
		  return $arr;      
   }
   
           
}
?>