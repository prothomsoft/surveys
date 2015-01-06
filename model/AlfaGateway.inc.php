<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/AlfaBean.inc.php"); 

/**
 * AlfaGateway
 * 
 * database access class - gateway methods for table Alfa
 */
class AlfaGateway {

   function __construct(){
   }
   
   public function getMaxAlfaOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(AlfaOrder)as MaxAlfaOrder FROM Alfa";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxAlfaOrder = $DB->getField("MaxAlfaOrder");
      		}
      }
      
      return $maxAlfaOrder;
   }
   
   public function findLatest(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube FROM Alfa";
      $query .= " ORDER BY AlfaOrder DESC";
      $query .= " LIMIT 0,4";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objAlfaBean= new AlfaBean();
			    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
			    $objAlfaBean->setClubId($DB->getField("ClubId"));
			    $objAlfaBean->setBetaId($DB->getField("BetaId"));
			    $objAlfaBean->setName($DB->getField("Name"));
			    $objAlfaBean->setSeoName($DB->getField("SeoName"));
			    $objAlfaBean->setKeyword($DB->getField("Keyword"));
			    $objAlfaBean->setDescription($DB->getField("Description"));
			    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
			    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
			    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
			    $objAlfaBean->setStatus($DB->getField("Status"));
			    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
			    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $objAlfaBean->setYouTube($DB->getField("YouTube"));      
			    $arr[] = $objAlfaBean;
      		}
      }
      return $arr;
   }
   
   public function findInCurrentMonth($month, $year){
   	
   		if($month<10) {
	   		$month = "0".$month;
   		}
   	
   	  // get Current Date
   	  $day = date("d");
   	  
   	  // total Days in current month
   	  $totalMonthDays = 31;
	  while (!checkdate($month, $totalMonthDays, $year)) $totalMonthDays--;
	  
	  // search range
	  $searchStartDate = $year."-".$month."-01";
	  $searchEndDate = $year."-".$month."-".$totalMonthDays;
	
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,EventCalendar,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa";
      $query .= " WHERE Status = 0";
      $query .= " AND EventCalendar >= '$searchStartDate'";
      $query .= " AND EventCalendar <= '$searchEndDate'  ";
      $query .= " ORDER BY AlfaOrder ASC";            
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objAlfaBean= new AlfaBean();
      			$objAlfaBean->setAlfaId($DB->getField("AlfaId"));
			    $objAlfaBean->setClubId($DB->getField("ClubId"));
			    $objAlfaBean->setBetaId($DB->getField("BetaId"));
			    $objAlfaBean->setName($DB->getField("Name"));
			    $objAlfaBean->setSeoName($DB->getField("SeoName"));
			    $objAlfaBean->setKeyword($DB->getField("Keyword"));
			    $objAlfaBean->setDescription($DB->getField("Description"));
			    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
			    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
			    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
			    $objAlfaBean->setStatus($DB->getField("Status"));
			    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
			    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $objAlfaBean->setYouTube($DB->getField("YouTube"));
			    $arr[] = $objAlfaBean;
      		}
      }
      return $arr;
   }
     
   public function findAktualnosciAll($clubId,$isArchived){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa";
      $query .= " WHERE 1 = 1";
      if( $clubId != 0 ){
      	$query .= " AND ClubId = '".$clubId."'";
      }
      if( $isArchived == 0 ){
      	$query .= " AND UpdateDate > '".date("Y")."-01-01'";
      }
      if( $isArchived == 1 ){
		$query .= " AND UpdateDate < '".date("Y")."-01-01'";
      }
      $query .= " ORDER BY AlfaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objAlfaBean= new AlfaBean();
			    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
			    $objAlfaBean->setClubId($DB->getField("ClubId"));
			    $objAlfaBean->setBetaId($DB->getField("BetaId"));
			    $objAlfaBean->setName($DB->getField("Name"));
			    $objAlfaBean->setSeoName($DB->getField("SeoName"));
			    $objAlfaBean->setKeyword($DB->getField("Keyword"));
			    $objAlfaBean->setDescription($DB->getField("Description"));
			    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
			    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
			    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
			    $objAlfaBean->setStatus($DB->getField("Status"));
			    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
			    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $objAlfaBean->setYouTube($DB->getField("YouTube"));
			    $arr[] = $objAlfaBean;
      		}
      }
      return $arr;
   }
   
   public function findAktualnosciAllLimited($clubId,$isArchived, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa ";
      	$query .= " WHERE 1 = 1";
      	if( $clubId != 0 ){
	      	$query .= " AND ClubId = '".$clubId."'";
	    }
	    if( $isArchived == 0 ){
	      	$query .= " AND UpdateDate > '".date("Y")."-01-01'";
	    }
	    if( $isArchived == 1 ){
			$query .= " AND UpdateDate < '".date("Y")."-01-01'";
	    }
	    $query .= " ORDER BY AlfaOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objAlfaBean= new AlfaBean();
				    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
				    $objAlfaBean->setClubId($DB->getField("ClubId"));
				    $objAlfaBean->setBetaId($DB->getField("BetaId"));
				    $objAlfaBean->setName($DB->getField("Name"));
				    $objAlfaBean->setSeoName($DB->getField("SeoName"));
				    $objAlfaBean->setKeyword($DB->getField("Keyword"));
				    $objAlfaBean->setDescription($DB->getField("Description"));
				    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
				    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
				    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
				    $objAlfaBean->setStatus($DB->getField("Status"));
				    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
				    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    	$objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    	$objAlfaBean->setYouTube($DB->getField("YouTube"));
				    $arr[] = $objAlfaBean;
	      		}
	      }
		  return $arr;      
   }      
   
   public function findWydarzeniaAll($categoryId){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa";
      $query .= " WHERE 1 = 1";
      $query .= " AND ClubId IN (2,4,5)";
      
      if( $categoryId != 0 ){
      	$query .= " AND ClubId = '".$categoryId."'";
      }
      
      $query .= " ORDER BY AlfaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objAlfaBean= new AlfaBean();
			    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
			    $objAlfaBean->setClubId($DB->getField("ClubId"));
			    $objAlfaBean->setBetaId($DB->getField("BetaId"));
			    $objAlfaBean->setName($DB->getField("Name"));
			    $objAlfaBean->setSeoName($DB->getField("SeoName"));
			    $objAlfaBean->setKeyword($DB->getField("Keyword"));
			    $objAlfaBean->setDescription($DB->getField("Description"));
			    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
			    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
			    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
			    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
			    $objAlfaBean->setStatus($DB->getField("Status"));
			    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
			    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $objAlfaBean->setYouTube($DB->getField("YouTube"));
			    $arr[] = $objAlfaBean;
      		}
      }
      return $arr;
   }
   
   public function findWydarzeniaAllLimited($categoryId, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa ";
      	$query .= " WHERE 1 = 1";
      	$query .= " AND ClubId IN (2,4,5)";
      	if( $categoryId != 0 ){
	      	$query .= " AND ClubId = '".$categoryId."'";
	      }
	      
	    $query .= " ORDER BY AlfaOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objAlfaBean= new AlfaBean();
				    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
				    $objAlfaBean->setClubId($DB->getField("ClubId"));
				    $objAlfaBean->setBetaId($DB->getField("BetaId"));
				    $objAlfaBean->setName($DB->getField("Name"));
				    $objAlfaBean->setSeoName($DB->getField("SeoName"));
				    $objAlfaBean->setKeyword($DB->getField("Keyword"));
				    $objAlfaBean->setDescription($DB->getField("Description"));
				    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
				    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
				    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
				    $objAlfaBean->setStatus($DB->getField("Status"));
				    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
				    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    $objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    $objAlfaBean->setYouTube($DB->getField("YouTube"));
				    $arr[] = $objAlfaBean;
	      		}
	      }
		  return $arr;      
   }
   
   public function findKeywordAll($search_keyword){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa ";
      $query .= " WHERE Name like '%".$search_keyword."%'";
      $query .= " OR ShortDescription like '%".$search_keyword."%'";
      $query .= " OR LongDescription like '%".$search_keyword."%'";
      $query .= " ORDER BY AlfaOrder DESC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			    $objAlfaBean= new AlfaBean();
				    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
				    $objAlfaBean->setClubId($DB->getField("ClubId"));
				    $objAlfaBean->setBetaId($DB->getField("BetaId"));
				    $objAlfaBean->setName($DB->getField("Name"));
				    $objAlfaBean->setSeoName($DB->getField("SeoName"));
				    $objAlfaBean->setKeyword($DB->getField("Keyword"));
				    $objAlfaBean->setDescription($DB->getField("Description"));
				    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
				    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
				    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
				    $objAlfaBean->setStatus($DB->getField("Status"));
				    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
				    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    	$objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    	$objAlfaBean->setYouTube($DB->getField("YouTube"));
				    $arr[] = $objAlfaBean;
      		}
      }
      return $arr;
   }
   
    public function findKeywordAllLimited($search_keyword,$currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT AlfaId,ClubId,BetaId,Name,SeoName,Keyword,Description,ShortDescription,VeryShortDescription,LongDescription,UpdateDate,AlfaOrder,Status,ImgDriveName,ImgDriveNameHeader,EventDate,EventCalendar,YouTube  FROM Alfa ";
	    $query .= " WHERE Name like '%".$search_keyword."%'";
      	$query .= " OR ShortDescription like '%".$search_keyword."%'";
      	$query .= " OR LongDescription like '%".$search_keyword."%'";
      	$query .= " ORDER BY AlfaOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objAlfaBean= new AlfaBean();
				    $objAlfaBean->setAlfaId($DB->getField("AlfaId"));
				    $objAlfaBean->setClubId($DB->getField("ClubId"));
				    $objAlfaBean->setBetaId($DB->getField("BetaId"));
				    $objAlfaBean->setName($DB->getField("Name"));
				    $objAlfaBean->setSeoName($DB->getField("SeoName"));
				    $objAlfaBean->setKeyword($DB->getField("Keyword"));
				    $objAlfaBean->setDescription($DB->getField("Description"));
				    $objAlfaBean->setShortDescription($DB->getField("ShortDescription"));
				    $objAlfaBean->setVeryShortDescription($DB->getField("VeryShortDescription"));
				    $objAlfaBean->setLongDescription($DB->getField("LongDescription"));
				    $objAlfaBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objAlfaBean->setAlfaOrder($DB->getField("AlfaOrder"));
				    $objAlfaBean->setStatus($DB->getField("Status"));
				    $objAlfaBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objAlfaBean->setImgDriveNameHeader($DB->getField("ImgDriveNameHeader"));
				    $objAlfaBean->setEventDate($DB->getField("EventDate"));
			    	$objAlfaBean->setEventCalendar($DB->getField("EventCalendar"));
			    	$objAlfaBean->setYouTube($DB->getField("YouTube"));
				    $arr[] = $objAlfaBean;
	      		}
	      }
	      return $arr;
   }
}
?>