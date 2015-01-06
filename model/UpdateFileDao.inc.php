<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/UpdateFileBean.inc.php");

/**
 * UpdateFileDAO
 * 
 * database access class - CRUD methods for table UpdateFile
 */
class UpdateFileDao{

   function __construct(){
   }
   public function create($objUpdateFileBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO UpdateFile(UpdateFileId,UpdateCategoryId, DriveName, FileName, FileDescription, FileType, ShortContent, LongContent, CreateDate, UpdateDate) ";
      $query.= "VALUES('".$objUpdateFileBean->getUpdateFileId()."','".$objUpdateFileBean->getUpdateCategoryId()."','".$objUpdateFileBean->getDriveName()."','".$objUpdateFileBean->getFileName()."','".$objUpdateFileBean->getFileDescription()."','".$objUpdateFileBean->getFileType()."','".$objUpdateFileBean->getShortContent()."','".$objUpdateFileBean->getLongContent()."','".$objUpdateFileBean->getCreateDate()."','".$objUpdateFileBean->getUpdateDate()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objUpdateFileBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE UpdateFile SET ";
      $query.="UpdateFileId='".$objUpdateFileBean->getUpdateFileId()."',";
      $query.="UpdateCategoryId='".$objUpdateFileBean->getUpdateCategoryId()."',";
      $query.="DriveName='".$objUpdateFileBean->getDriveName()."',";
      $query.="FileName='".$objUpdateFileBean->getFileName()."',";
      $query.="FileDescription='".$objUpdateFileBean->getFileDescription()."',";
      $query.="FileType='".$objUpdateFileBean->getFileType()."',";
      $query.="ShortContent='".$objUpdateFileBean->getShortContent()."',";
      $query.="LongContent='".$objUpdateFileBean->getLongContent()."',";
      $query.="CreateDate='".$objUpdateFileBean->getCreateDate()."',";
      $query.="UpdateDate='".$objUpdateFileBean->getUpdateDate()."' ";
      $query.="WHERE UpdateFileId=".$objUpdateFileBean->getUpdateFileId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateFileId,UpdateCategoryId, DriveName, FileName, FileDescription, FileType, ShortContent, LongContent, CreateDate, UpdateDate FROM UpdateFile";
      $query.=" WHERE UpdateFileId=".$id;
      $DB->query($query);
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
      
      return $objUpdateFileBean;
   }
   
   public function readByItemFile($ItemFile){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateFileId,UpdateCategoryId, DriveName, FileName, FileDescription, FileType, ShortContent, LongContent, CreateDate, UpdateDate FROM UpdateFile";
      $query.=" WHERE FileName='".$ItemFile."'";
      $DB->query($query);
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
      
      return $objUpdateFileBean;
   }
   
   public function readByCategoryId($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT UpdateFileId,UpdateCategoryId, DriveName, FileName, FileDescription, FileType, ShortContent, LongContent, CreateDate, UpdateDate FROM UpdateFile";
      $query.=" WHERE UpdateCategoryId=".$id;
      $DB->query($query);
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
      
      return $objUpdateFileBean;
   }
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from UpdateFile ";
      $query.="WHERE UpdateFileId=".$id;
      $DB->query($query);
   }
}
?>