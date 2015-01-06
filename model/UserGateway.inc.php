<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/UserBean.inc.php");

class UserGateway {

   function __construct(){
   }
   
   public function findByEmail($email, $maxRows){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT Email";
      $query .= " FROM User";
      if($email != "") {
      	$query .= " WHERE Email like '%".$email."%'";	
      }     
      $query .= " LIMIT 0, ".$maxRows."";
      $DB->query($query);
      $i = 0;
      $value = "";
      if ($DB->numRows() > 0) {
      		while($DB->move_next()) {
      			$value{"User"}{$i}{"Email"}= $DB->getField("Email");
				$i++;
      		}
      }
      return json_encode($value);
   }
   
   public function countAll(){
      $DB = new DB();
      $DB->connect();
      $query ="SELECT count(*) as n FROM Product";
      $DB->query($query);
      return $DB->getField("n");
   }
   
    public function findRemovedRecordsList($list){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate FROM `User`";
      $query.=" WHERE UserId IN ($list)";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      		   	  $objUserBean= new UserBean();
			      $objUserBean->setUserId($DB->getField("UserId"));
			      $objUserBean->setCountryId($DB->getField("CountryId"));
			      $objUserBean->setProvinceId($DB->getField("ProvinceId"));
			      $objUserBean->setEmail($DB->getField("Email"));
			      $objUserBean->setPassword($DB->getField("Password"));
			      $objUserBean->setCompanyName($DB->getField("CompanyName"));
			      $objUserBean->setNameFirst($DB->getField("NameFirst"));
			      $objUserBean->setNameLast($DB->getField("NameLast"));
			      $objUserBean->setStreet($DB->getField("Street"));
			      $objUserBean->setNumber($DB->getField("Number"));
			      $objUserBean->setZip($DB->getField("Zip"));
			      $objUserBean->setCity($DB->getField("City"));
			      $objUserBean->setPhone1($DB->getField("Phone1"));
			      $objUserBean->setPhone2($DB->getField("Phone2"));
			      $objUserBean->setFax1($DB->getField("Fax1"));
			      $objUserBean->setFax2($DB->getField("Fax2"));
			      $objUserBean->setWebsite1($DB->getField("Website1"));
			      $objUserBean->setWebsite2($DB->getField("Website2"));
			      $objUserBean->setNipPL($DB->getField("NipPL"));
			      $objUserBean->setNipUE($DB->getField("NipUE"));
			      $objUserBean->setRegon($DB->getField("Regon"));
			      $objUserBean->setCreateDate($DB->getField("CreateDate"));
			      $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objUserBean->setStatus($DB->getField("Status"));
			      $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objUserBean->setActivationToken($DB->getField("ActivationToken"));
			      $objUserBean->setInfo($DB->getField("Info"));
			      $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         		  $objUserBean->setTesterDate($DB->getField("TesterDate"));
		      	  $arr[] = $objUserBean;
      		}
      }
      return $arr;
   }
         
   public function removeRecordsList($list){
		$DB = new DB();
		$DB->connect();
		$query="DELETE FROM User ";
		$query.="WHERE UserId IN ($list)";
		$DB->query($query);
   }
   
   public function findUsersList($ApprovalStatus){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate";
      $query .= " FROM User";
      $query .= " WHERE Status=".$ApprovalStatus."";
      $query .= " AND UserId != 3";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objUserBean= new UserBean();
			      $objUserBean->setUserId($DB->getField("UserId"));
			      $objUserBean->setCountryId($DB->getField("CountryId"));
			      $objUserBean->setProvinceId($DB->getField("ProvinceId"));
			      $objUserBean->setEmail($DB->getField("Email"));
			      $objUserBean->setPassword($DB->getField("Password"));
			      $objUserBean->setCompanyName($DB->getField("CompanyName"));
			      $objUserBean->setNameFirst($DB->getField("NameFirst"));
			      $objUserBean->setNameLast($DB->getField("NameLast"));
			      $objUserBean->setStreet($DB->getField("Street"));
			      $objUserBean->setNumber($DB->getField("Number"));
			      $objUserBean->setZip($DB->getField("Zip"));
			      $objUserBean->setCity($DB->getField("City"));
			      $objUserBean->setPhone1($DB->getField("Phone1"));
			      $objUserBean->setPhone2($DB->getField("Phone2"));
			      $objUserBean->setFax1($DB->getField("Fax1"));
			      $objUserBean->setFax2($DB->getField("Fax2"));
			      $objUserBean->setWebsite1($DB->getField("Website1"));
			      $objUserBean->setWebsite2($DB->getField("Website2"));
			      $objUserBean->setNipPL($DB->getField("NipPL"));
			      $objUserBean->setNipUE($DB->getField("NipUE"));
			      $objUserBean->setRegon($DB->getField("Regon"));
			      $objUserBean->setCreateDate($DB->getField("CreateDate"));
			      $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objUserBean->setStatus($DB->getField("Status"));
			      $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objUserBean->setActivationToken($DB->getField("ActivationToken"));
			      $objUserBean->setInfo($DB->getField("Info"));
			      $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         		  $objUserBean->setTesterDate($DB->getField("TesterDate"));
		      	  $arr[] = $objUserBean;
      		}
      }
      return $arr;
   }
   
   public function findUsersListLimited($ApprovalStatus, $currentPage, $itemsPerPage){
   	
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
		$query	= "SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate";
		$query .= " FROM User";
		$query .= " WHERE Status=".$ApprovalStatus." ";
		$query .= " AND UserId != 3 ";
		$query .= " LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	 $objUserBean= new UserBean();
			      $objUserBean->setUserId($DB->getField("UserId"));
			      $objUserBean->setCountryId($DB->getField("CountryId"));
			      $objUserBean->setProvinceId($DB->getField("ProvinceId"));
			      $objUserBean->setEmail($DB->getField("Email"));
			      $objUserBean->setPassword($DB->getField("Password"));
			      $objUserBean->setCompanyName($DB->getField("CompanyName"));
			      $objUserBean->setNameFirst($DB->getField("NameFirst"));
			      $objUserBean->setNameLast($DB->getField("NameLast"));
			      $objUserBean->setStreet($DB->getField("Street"));
			      $objUserBean->setNumber($DB->getField("Number"));
			      $objUserBean->setZip($DB->getField("Zip"));
			      $objUserBean->setCity($DB->getField("City"));
			      $objUserBean->setPhone1($DB->getField("Phone1"));
			      $objUserBean->setPhone2($DB->getField("Phone2"));
			      $objUserBean->setFax1($DB->getField("Fax1"));
			      $objUserBean->setFax2($DB->getField("Fax2"));
			      $objUserBean->setWebsite1($DB->getField("Website1"));
			      $objUserBean->setWebsite2($DB->getField("Website2"));
			      $objUserBean->setNipPL($DB->getField("NipPL"));
			      $objUserBean->setNipUE($DB->getField("NipUE"));
			      $objUserBean->setRegon($DB->getField("Regon"));
			      $objUserBean->setCreateDate($DB->getField("CreateDate"));
			      $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objUserBean->setStatus($DB->getField("Status"));
			      $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objUserBean->setActivationToken($DB->getField("ActivationToken"));
			      $objUserBean->setInfo($DB->getField("Info"));
			      $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         		  $objUserBean->setTesterDate($DB->getField("TesterDate"));
		      	  $arr[] = $objUserBean;
				}
		}
		return $arr;
   }
   
   public function findAll(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT UserId,CountryId,ProvinceId,Email,Password,CompanyName,NameFirst,NameLast,Street,Number,Zip,City,Phone1,Phone2,Fax1,Fax2,Website1,Website2,NipPL,NipUE,Regon,CreateDate,Status,UpdateDate,ImgDriveName,ActivationToken,Info,TesterStatus,TesterDate";
      $query .= " FROM User";
      $query .= " WHERE UserId != 3";
      $query .= " ORDER BY Email ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objUserBean= new UserBean();
			      $objUserBean->setUserId($DB->getField("UserId"));
			      $objUserBean->setCountryId($DB->getField("CountryId"));
			      $objUserBean->setProvinceId($DB->getField("ProvinceId"));
			      $objUserBean->setEmail($DB->getField("Email"));
			      $objUserBean->setPassword($DB->getField("Password"));
			      $objUserBean->setCompanyName($DB->getField("CompanyName"));
			      $objUserBean->setNameFirst($DB->getField("NameFirst"));
			      $objUserBean->setNameLast($DB->getField("NameLast"));
			      $objUserBean->setStreet($DB->getField("Street"));
			      $objUserBean->setNumber($DB->getField("Number"));
			      $objUserBean->setZip($DB->getField("Zip"));
			      $objUserBean->setCity($DB->getField("City"));
			      $objUserBean->setPhone1($DB->getField("Phone1"));
			      $objUserBean->setPhone2($DB->getField("Phone2"));
			      $objUserBean->setFax1($DB->getField("Fax1"));
			      $objUserBean->setFax2($DB->getField("Fax2"));
			      $objUserBean->setWebsite1($DB->getField("Website1"));
			      $objUserBean->setWebsite2($DB->getField("Website2"));
			      $objUserBean->setNipPL($DB->getField("NipPL"));
			      $objUserBean->setNipUE($DB->getField("NipUE"));
			      $objUserBean->setRegon($DB->getField("Regon"));
			      $objUserBean->setCreateDate($DB->getField("CreateDate"));
			      $objUserBean->setUpdateDate($DB->getField("UpdateDate"));
			      $objUserBean->setStatus($DB->getField("Status"));
			      $objUserBean->setImgDriveName($DB->getField("ImgDriveName"));
			      $objUserBean->setActivationToken($DB->getField("ActivationToken"));
			      $objUserBean->setInfo($DB->getField("Info"));
			      $objUserBean->setTesterStatus($DB->getField("TesterStatus"));
         		  $objUserBean->setTesterDate($DB->getField("TesterDate"));
		      	  $arr[] = $objUserBean;
      		}
      }
      return $arr;
   }
   
   public function findAllDateName(){
      $DB = new DB();
      $DB->connect_utf8();
      $query  = "SELECT Data,Kogo";
      $query .= " FROM Imieniny";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
		    	  $objUserBean= new UserBean();
			      $objUserBean->setData($DB->getField("Data"));
			      $objUserBean->setKogo($DB->getField("Kogo"));
		      	  $arr[] = $objUserBean;
      		}
      }
      return $arr;
   }    
   
   
   
}
?>