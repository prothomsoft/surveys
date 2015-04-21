<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/TopicBean.inc.php"); 

/**
 * TopicGateway
 * 
 * database access class - gateway methods for table Topic
 */
class TopicGateway {

   function __construct(){
   }
   
   public function getMaxTopicOrder() {
   	  $DB = new DB();
      $DB->connect();
      $query  = "SELECT MAX(TopicOrder)as MaxTopicOrder FROM Topic";
      
      $DB->query($query);      
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$maxTopicOrder = $DB->getField("MaxTopicOrder");
      		}
      }
      
      return $maxTopicOrder;
   }
     
   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT TopicId,Question,OpenQuestion,CreateDate,Status,TopicOrder FROM Topic";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY TopicOrder DESC";
	  $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objTopicBean= new TopicBean();
			    $objTopicBean->setTopicId($DB->getField("TopicId"));
			    $objTopicBean->setQuestion($DB->getField("Question"));
			    $objTopicBean->setOpenQuestion($DB->getField("OpenQuestion"));
			    $objTopicBean->setCreateDate($DB->getField("CreateDate"));
			    $objTopicBean->setStatus($DB->getField("Status"));
			    $objTopicBean->setTopicOrder($DB->getField("TopicOrder"));			    
			    $arr[] = $objTopicBean;
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
      	$query  = "SELECT TopicId,Question,OpenQuestion,CreateDate,Status,TopicOrder FROM Topic ";
      	$query .= " WHERE 1 = 1";
      	$query .= " ORDER BY TopicOrder ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objTopicBean= new TopicBean();
				    $objTopicBean->setTopicId($DB->getField("TopicId"));
				    $objTopicBean->setQuestion($DB->getField("Question"));
				    $objTopicBean->setOpenQuestion($DB->getField("OpenQuestion"));
				    $objTopicBean->setCreateDate($DB->getField("CreateDate"));
				    $objTopicBean->setStatus($DB->getField("Status"));
				    $objTopicBean->setTopicOrder($DB->getField("TopicOrder"));				    
				    $arr[] = $objTopicBean;
	      		}
	      }
		  return $arr;      
   }

   public function findActive(){   
   	$DB = new DB();
   	$DB->connect();
   	$query  = "SELECT TopicId,Question,OpenQuestion,CreateDate,Status,TopicOrder FROM Topic";
   	$query .= " WHERE Status = 1";
   	$query .= " ORDER BY TopicOrder ASC";
   	$DB->query($query);
   	$arr = "";
   	if ($DB->numRows()>0)
   	{
   		while($DB->move_next())
   		{
   			$objTopicBean= new TopicBean();
   			$objTopicBean->setTopicId($DB->getField("TopicId"));
   			$objTopicBean->setQuestion($DB->getField("Question"));
   			$objTopicBean->setOpenQuestion($DB->getField("OpenQuestion"));
   			$objTopicBean->setCreateDate($DB->getField("CreateDate"));
   			$objTopicBean->setStatus($DB->getField("Status"));
   			$objTopicBean->setTopicOrder($DB->getField("TopicOrder"));
   			$arr[] = $objTopicBean;
   		}
   	}
   	return $arr;
   }
}
?>