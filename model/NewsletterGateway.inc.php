<?
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/components/gateway.inc.php");
require_once(dirname(__FILE__)."/NewsletterBean.inc.php");

/**
 * NewsletterGateway
 * 
 * database access class - gateway methods for table Newsletter
 */
class NewsletterGateway extends gateway{

   function __construct(){
   }
     
   public function findRemovedRecordsList($list){
      $DB = new DB();
      $DB->connect();
      $query="SELECT NewsletterId,Name,Email,Status FROM `Newsletter`";
      $query.=" WHERE NewsletterId IN ($list)";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      		   	  $objNewsletterBean= new NewsletterBean();
      		   	  $objNewsletterBean->setName($DB->getField("Name"));
			      $objNewsletterBean->setEmail($DB->getField("Email"));
			      $objNewsletterBean->setStatus($DB->getField("Status"));
			      $arr[] = $objNewsletterBean;
      		}
      }
      return $arr;
   }
         
   public function removeRecordsList($list){
		$DB = new DB();
		$DB->connect();
		$query="DELETE FROM Newsletter ";
		$query.="WHERE NewsletterId IN ($list)";
		$DB->query($query);
   }
   
   public function findNewslettersList(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT NewsletterId,Name,Email,Status";
      $query .= " FROM Newsletter";
      $query .= " ORDER BY Name ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objNewsletterBean= new NewsletterBean();
			      $objNewsletterBean->setNewsletterId($DB->getField("NewsletterId"));
			      $objNewsletterBean->setName($DB->getField("Name"));
			      $objNewsletterBean->setEmail($DB->getField("Email"));
			      $objNewsletterBean->setStatus($DB->getField("Status"));			      
			      $arr[] = $objNewsletterBean;
      		}
      }
      return $arr;
   }
         
   public function findNewslettersListLimited($currentPage, $itemsPerPage){
   	
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
		$query  = "SELECT NewsletterId,Name,Email,Status";
		$query .= " FROM Newsletter";
		$query .= " ORDER BY Name ASC";
		$query .= " LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	  $objNewsletterBean= new NewsletterBean();
		 		  $objNewsletterBean->setNewsletterId($DB->getField("NewsletterId"));
		 		  $objNewsletterBean->setName($DB->getField("Name"));
			      $objNewsletterBean->setEmail($DB->getField("Email"));
			      $objNewsletterBean->setStatus($DB->getField("Status"));
			      $arr[] = $objNewsletterBean;
				}
		}
		return $arr;
   }
   
   public function checkNewsletterExists($NewsletterName,$NewsletterEmail){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT NewsletterId,Name,Email,Status";
      $query .= " FROM Newsletter";
      $query .= " WHERE Name = '".$NewsletterName."'";
      $query .= " AND Email = '".$NewsletterEmail."'";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objNewsletterBean= new NewsletterBean();
			      $objNewsletterBean->setNewsletterId($DB->getField("NewsletterId"));
			      $objNewsletterBean->setName($DB->getField("Name"));
			      $objNewsletterBean->setEmail($DB->getField("Email"));
			      $objNewsletterBean->setStatus($DB->getField("Status"));			      
			      $arr[] = $objNewsletterBean;
      		}
      }
      return $arr;
   }
}
?>