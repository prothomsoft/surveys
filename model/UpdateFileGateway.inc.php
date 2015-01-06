<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/UpdateFileBean.inc.php");

/**
 * UpdateFileGateway
 * 
 * database access class - gateway methods for table UpdateFile
 */
class UpdateFileGateway{

   function __construct(){
   }
   
   public function findContent($CatFile, $ItemFile){
	   	$DB = new DB();
		$DB->connect();
		$query  = "SELECT UpdateFileId,UpdateCategoryId,DriveName,FileName,FileDescription,FileType,ShortContent,LongContent,CreateDate,UpdateDate ";
      	$query .= "FROM UpdateFile ";
      	$query .= "WHERE FileName = '".$ItemFile."' ";
      	$query .= "ORDER BY UpdateDate ASC ";
      	
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	  $objUpdateFileBean= new UpdateFileBean();
			      $objUpdateFileBean->setUpdateFileId($DB->getField("UpdateFileId"));
			      $objUpdateFileBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
			      $objUpdateFileBean->setDriveName($DB->getField("DriveName"));
			      $objUpdateFileBean->setFileName($DB->getField("FileName"));
			      $objUpdateFileBean->setFileType($DB->getField("FileType"));
			      $objUpdateFileBean->setFileDescription($DB->getField("FileDescription"));
			      $objUpdateFileBean->setShortContent($DB->getField("ShortContent"));
			      $objUpdateFileBean->setLongContent($DB->getField("LongContent"));
			      $objUpdateFileBean->setCreateDate($DB->getField("CreateDate"));
			      $objUpdateFileBean->setUpdateDate($DB->getField("UpdateDate"));
			      $arr[] = $objUpdateFileBean;
				}
		}
		return $arr;
   }
  
   public function findByUpdateCategoryId($UpdateCategoryId){
	   	$DB = new DB();
		$DB->connect();
		$query  = "SELECT UpdateFileId,UpdateCategoryId,DriveName,FileName,FileDescription,FileType,ShortContent,LongContent,CreateDate,UpdateDate ";
      	$query .= "FROM UpdateFile ";
      	$query .= "WHERE UpdateCategoryId = '".$UpdateCategoryId."' ";
      	$query .= "ORDER BY UpdateDate ASC ";      	
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	  $objUpdateFileBean= new UpdateFileBean();
			      $objUpdateFileBean->setUpdateFileId($DB->getField("UpdateFileId"));
			      $objUpdateFileBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
			      $objUpdateFileBean->setDriveName($DB->getField("DriveName"));
			      $objUpdateFileBean->setFileName($DB->getField("FileName"));
			      $objUpdateFileBean->setFileDescription($DB->getField("FileDescription"));
			      $objUpdateFileBean->setFileType($DB->getField("FileType"));
			      $objUpdateFileBean->setShortContent($DB->getField("ShortContent"));
			      $objUpdateFileBean->setLongContent($DB->getField("LongContent"));
			      $objUpdateFileBean->setCreateDate($DB->getField("CreateDate"));
			      $objUpdateFileBean->setUpdateDate($DB->getField("UpdateDate"));
		      	  $arr[] = $objUpdateFileBean;
				}
		}
		return $arr;
   }
   
   public function findByUpdateCategoryIdLimited($UpdateCategoryId, $currentPage, $itemsPerPage){
   	
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
		$query  = "SELECT UpdateFileId,UpdateCategoryId,DriveName,FileName,FileDescription,FileType,ShortContent,LongContent,CreateDate,UpdateDate ";
      	$query .= "FROM UpdateFile ";
      	$query .= "WHERE UpdateCategoryId = '".$UpdateCategoryId."' ";
      	$query .= "ORDER BY UpdateDate ASC ";
      	$query .= "LIMIT ".$start.",".$limit;
		$DB->query($query);
		$arr = "";
		if ($DB->numRows()>0)
		{
				while($DB->move_next())
				{
		    	  $objUpdateFileBean= new UpdateFileBean();
			      $objUpdateFileBean->setUpdateFileId($DB->getField("UpdateFileId"));
			      $objUpdateFileBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
			      $objUpdateFileBean->setDriveName($DB->getField("DriveName"));
			      $objUpdateFileBean->setFileName($DB->getField("FileName"));
			      $objUpdateFileBean->setFileDescription($DB->getField("FileDescription"));
			      $objUpdateFileBean->setFileType($DB->getField("FileType"));
			      $objUpdateFileBean->setShortContent($DB->getField("ShortContent"));
			      $objUpdateFileBean->setLongContent($DB->getField("LongContent"));
			      $objUpdateFileBean->setCreateDate($DB->getField("CreateDate"));
			      $objUpdateFileBean->setUpdateDate($DB->getField("UpdateDate"));
		      	  $arr[] = $objUpdateFileBean;
				}
		}
		return $arr;
   }
      
   public function removeRecordsList($list){
		$DB = new DB();
		$DB->connect();
		$query="DELETE FROM UpdateFile ";
		$query.="WHERE UpdateFileId IN ($list)";
		$DB->query($query);
   }
   
   public function findMaxIndex(){
		$DB = new DB();
		$DB->connect();
		$query="SELECT MAX(UpdateFileId) as MaxIndex FROM `UpdateFile` WHERE 1";
		$DB->query($query);
		return $DB->getField("MaxIndex");
		
   }
      
   public function findSetIndex(){
		$DB = new DB();
		$DB->connect();
		$query="ALTER TABLE `UpdateFile` AUTO_INCREMENT = 1";
		$DB->query($query);
		   }
}
?>