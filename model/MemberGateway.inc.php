<?
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/components/gateway.inc.php");
require_once(dirname(__FILE__)."/MemberBean.inc.php");

/**
 * MemberGateway
 * 
 * database access class - gateway methods for table Member
 */
class MemberGateway extends gateway{

   function __construct(){
   }
     
   public function findRemovedRecordsList($list){
      $DB = new DB();
      $DB->connect();
      $query="SELECT MemberId,Name,Email,Status FROM `Member`";
      $query.=" WHERE MemberId IN ($list)";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      		   	  $objMemberBean= new MemberBean();
      		   	  $objMemberBean->setName($DB->getField("Name"));
			      $objMemberBean->setEmail($DB->getField("Email"));
			      $objMemberBean->setStatus($DB->getField("Status"));
			      $arr[] = $objMemberBean;
      		}
      }
      return $arr;
   }
         
   public function removeRecordsList($list){
		$DB = new DB();
		$DB->connect();
		$query="DELETE FROM Member ";
		$query.="WHERE MemberId IN ($list)";
		$DB->query($query);
   }
   
   public function findMembersList(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT MemberId,Name,Email,Status";
      $query .= " FROM Member";
      $query .= " ORDER BY Name ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objMemberBean= new MemberBean();
			      $objMemberBean->setMemberId($DB->getField("MemberId"));
			      $objMemberBean->setName($DB->getField("Name"));
			      $objMemberBean->setEmail($DB->getField("Email"));
			      $objMemberBean->setStatus($DB->getField("Status"));			      
			      $arr[] = $objMemberBean;
      		}
      }
      return $arr;
   }
         
   public function findMembersListLimited($currentPage, $itemsPerPage){
   	
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
		$query  = "SELECT MemberId,Name,Email,Status";
		$query .= " FROM Member";
		$query .= " ORDER BY Name ASC";
		$query .= " LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	  $objMemberBean= new MemberBean();
		 		  $objMemberBean->setMemberId($DB->getField("MemberId"));
		 		  $objMemberBean->setName($DB->getField("Name"));
			      $objMemberBean->setEmail($DB->getField("Email"));
			      $objMemberBean->setStatus($DB->getField("Status"));
			      $arr[] = $objMemberBean;
				}
		}
		return $arr;
   }
   
   public function checkMemberExists($MemberName,$MemberEmail){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT MemberId,Name,Email,Status";
      $query .= " FROM Member";
      $query .= " WHERE Name = '".$MemberName."'";
      $query .= " AND Email = '".$MemberEmail."'";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objMemberBean= new MemberBean();
			      $objMemberBean->setMemberId($DB->getField("MemberId"));
			      $objMemberBean->setName($DB->getField("Name"));
			      $objMemberBean->setEmail($DB->getField("Email"));
			      $objMemberBean->setStatus($DB->getField("Status"));			      
			      $arr[] = $objMemberBean;
      		}
      }
      return $arr;
   }
}
?>