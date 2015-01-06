<?
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/BookBean.inc.php");

/**
 * BookGateway
 * 
 * database access class - gateway methods for table Book
 */
class BookGateway{

   function __construct(){
   }


   public function findAll(){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT BookId,SigmaId,Email,FirstName,LastName,CompanyName,City,CreateDate  FROM Book";
      $query .= " WHERE 1 = 1";
      $query .= " ORDER BY BookId ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objBookBean= new BookBean();
			    $objBookBean->setBookId($DB->getField("BookId"));
			    $objBookBean->setSigmaId($DB->getField("SigmaId"));
			    $objBookBean->setEmail($DB->getField("Email"));
			    $objBookBean->setFirstName($DB->getField("FirstName"));
			    $objBookBean->setLastName($DB->getField("LastName"));
			    $objBookBean->setCompanyName($DB->getField("CompanyName"));
			    $objBookBean->setCity($DB->getField("City"));
			    $objBookBean->setCreateDate($DB->getField("CreateDate"));
			    $arr[] = $objBookBean;
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
      	$query  = "SELECT BookId,SigmaId,Email,FirstName,LastName,CompanyName,City,CreateDate  FROM Book";
      	$query .= " WHERE 1 = 1";
      	$query .= " ORDER BY BookId ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objBookBean= new BookBean();
				    $objBookBean->setBookId($DB->getField("BookId"));
				    $objBookBean->setSigmaId($DB->getField("SigmaId"));
				    $objBookBean->setEmail($DB->getField("Email"));
				    $objBookBean->setFirstName($DB->getField("FirstName"));
				    $objBookBean->setLastName($DB->getField("LastName"));
				    $objBookBean->setCompanyName($DB->getField("CompanyName"));
				    $objBookBean->setCity($DB->getField("City"));
				    $objBookBean->setCreateDate($DB->getField("CreateDate"));
				    $arr[] = $objBookBean;
	      		}
	      }
		  return $arr;      
   }
   
   public function findAllAuthorized($blogId){
      
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT BookId,SigmaId,Email,FirstName,LastName,CompanyName,City,CreateDate  FROM Book";
      $query .= " WHERE 1 = 1";
      $query .= " AND City = 1";
      $query .= " AND SigmaId = ".$blogId."";
      $query .= " ORDER BY BookId ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			$objBookBean= new BookBean();
			    $objBookBean->setBookId($DB->getField("BookId"));
			    $objBookBean->setSigmaId($DB->getField("SigmaId"));
			    $objBookBean->setEmail($DB->getField("Email"));
			    $objBookBean->setFirstName($DB->getField("FirstName"));
			    $objBookBean->setLastName($DB->getField("LastName"));
			    $objBookBean->setCompanyName($DB->getField("CompanyName"));
			    $objBookBean->setCity($DB->getField("City"));
			    $objBookBean->setCreateDate($DB->getField("CreateDate"));
			    $arr[] = $objBookBean;
      		}
      }
      return $arr;
   }
   
   public function findAllAuthorizedLimited($blogId, $currentPage,$itemsPerPage){
   	  
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
      	$query  = "SELECT BookId,SigmaId,Email,FirstName,LastName,CompanyName,City,CreateDate  FROM Book";
      	$query .= " WHERE 1 = 1";
      	$query .= " AND City = 1";
      	$query .= " AND SigmaId = ".$blogId."";
      	$query .= " ORDER BY BookId ASC";
      	$query .= " LIMIT ".$start.",".$limit;
      	$DB->query($query);
	    $arr = "";
	    if ($DB->numRows()>0)
	    {
	    	while($DB->move_next())
	      		{
	      			$objBookBean= new BookBean();
				    $objBookBean->setBookId($DB->getField("BookId"));
				    $objBookBean->setSigmaId($DB->getField("SigmaId"));
				    $objBookBean->setEmail($DB->getField("Email"));
				    $objBookBean->setFirstName($DB->getField("FirstName"));
				    $objBookBean->setLastName($DB->getField("LastName"));
				    $objBookBean->setCompanyName($DB->getField("CompanyName"));
				    $objBookBean->setCity($DB->getField("City"));
				    $objBookBean->setCreateDate($DB->getField("CreateDate"));
				    $arr[] = $objBookBean;
	      		}
	      }
		  return $arr;      
   }
   
}
?>