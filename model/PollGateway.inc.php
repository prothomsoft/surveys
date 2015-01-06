<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/PollBean.inc.php"); 

/**
 * PollGateway
 * 
 * database access class - gateway methods for table Poll
 */
class PollGateway {

   function __construct(){
   }
   
   public function getMaxPollOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(PollOrder)as MaxPollOrder FROM Poll";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxPollOrder = $DB->getField("MaxPollOrder");
      		}
      }
      
      return $maxPollOrder;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT PollId,Question,CreateDate,Status,PollOrder FROM Poll";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY PollOrder ASC";
	  $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objPollBean= new PollBean();
			    $objPollBean->setPollId($DB->getField("PollId"));
			    $objPollBean->setQuestion($DB->getField("Question"));
			    $objPollBean->setCreateDate($DB->getField("CreateDate"));
			    $objPollBean->setStatus($DB->getField("Status"));
			    $objPollBean->setPollOrder($DB->getField("PollOrder"));			    
			    $arr[] = $objPollBean;
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
      	$query  = "SELECT PollId,QuestionName,CreateDate,Status,PollOrder FROM Poll ";
      	$query .= " WHERE 1 = 1";
      	$query .= " ORDER BY PollOrder ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objPollBean= new PollBean();
				    $objPollBean->setPollId($DB->getField("PollId"));
				    $objPollBean->setQuestion($DB->getField("Question"));
				    $objPollBean->setCreateDate($DB->getField("CreateDate"));
				    $objPollBean->setStatus($DB->getField("Status"));
				    $objPollBean->setPollOrder($DB->getField("PollOrder"));				    
				    $arr[] = $objPollBean;
	      		}
	      }
		  return $arr;      
   }            
}
?>