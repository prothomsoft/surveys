<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ClubBean.inc.php"); 

/**
 * ClubGateway
 * 
 * database access class - gateway methods for table Club
 */
class ClubGateway {

   function __construct(){
   }
   
   public function getMaxClubOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(ClubOrder)as MaxClubOrder FROM Club";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxClubOrder = $DB->getField("MaxClubOrder");
      		}
      }
      
      return $maxClubOrder;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ClubId,Name,SeoName,Keyword,Description,Address,ShortDescription,LongDescription,UpdateDate,ClubOrder,Status,ImgDriveName,Manager,Phone,Email,Route,Lat,Lng,IsClub FROM Club";
      $query .= " WHERE ClubId > 0";
      $query .= " ORDER BY ClubOrder ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objClubBean= new ClubBean();
			    $objClubBean->setClubId($DB->getField("ClubId"));
			    $objClubBean->setName($DB->getField("Name"));
			    $objClubBean->setSeoName($DB->getField("SeoName"));
			    $objClubBean->setKeyword($DB->getField("Keyword"));
			    $objClubBean->setDescription($DB->getField("Description"));
			    $objClubBean->setAddress($DB->getField("Address"));
			    $objClubBean->setShortDescription($DB->getField("ShortDescription"));
			    $objClubBean->setLongDescription($DB->getField("LongDescription"));
			    $objClubBean->setUpdateDate($DB->getField("UpdateDate"));
			    $objClubBean->setClubOrder($DB->getField("ClubOrder"));
			    $objClubBean->setStatus($DB->getField("Status"));
			    $objClubBean->setImgDriveName($DB->getField("ImgDriveName"));
			    $objClubBean->setManager($DB->getField("Manager"));
			    $objClubBean->setPhone($DB->getField("Phone"));
			    $objClubBean->setEmail($DB->getField("Email"));
			    $objClubBean->setRoute($DB->getField("Route"));
			    $objClubBean->setLat($DB->getField("Lat"));
			    $objClubBean->setLng($DB->getField("Lng"));
			    $objClubBean->setIsClub($DB->getField("IsClub"));
			    $arr[] = $objClubBean;
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
      	$query  = "SELECT ClubId,Name,SeoName,Keyword,Description,Address,ShortDescription,LongDescription,UpdateDate,ClubOrder,Status,ImgDriveName,Manager,Phone,Email,Route,Lat,Lng,IsClub FROM Club ";
      	$query .= " WHERE ClubId > 0";
	    $query .= " ORDER BY ClubOrder DESC";
      	$query .= " LIMIT ".$start.",".$limit;      	
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objClubBean= new ClubBean();
				    $objClubBean->setClubId($DB->getField("ClubId"));
				    $objClubBean->setName($DB->getField("Name"));
				    $objClubBean->setSeoName($DB->getField("SeoName"));
				    $objClubBean->setKeyword($DB->getField("Keyword"));
				    $objClubBean->setDescription($DB->getField("Description"));
				    $objClubBean->setAddress($DB->getField("Address"));
				    $objClubBean->setShortDescription($DB->getField("ShortDescription"));
				    $objClubBean->setLongDescription($DB->getField("LongDescription"));
				    $objClubBean->setUpdateDate($DB->getField("UpdateDate"));
				    $objClubBean->setClubOrder($DB->getField("ClubOrder"));
				    $objClubBean->setStatus($DB->getField("Status"));
				    $objClubBean->setImgDriveName($DB->getField("ImgDriveName"));
				    $objClubBean->setManager($DB->getField("Manager"));
				    $objClubBean->setPhone($DB->getField("Phone"));
				    $objClubBean->setEmail($DB->getField("Email"));
				    $objClubBean->setRoute($DB->getField("Route"));
				    $objClubBean->setLat($DB->getField("Lat"));
				    $objClubBean->setLng($DB->getField("Lng"));
				    $objClubBean->setIsClub($DB->getField("IsClub"));
				    $arr[] = $objClubBean;
	      		}
	      }
		  return $arr;      
   }        
}
?>