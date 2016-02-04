<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/TopicBean.inc.php");

/**
 * TopicDAO
 * 
 * database access class - CRUD methods for table Topic
 */
class TopicDao{

   function __construct(){
   }
   public function create($objTopicBean){
      $DB = new DB();
      $DB->connect();
      $query = "INSERT INTO Topic(UpdateCategoryId, Question,OpenQuestion,CreateDate,Status,TopicOrder) ";
      $query.= "VALUES('".$objTopicBean->getUpdateCategoryId()."', '".$objTopicBean->getQuestion()."','".$objTopicBean->getOpenQuestion()."','".$objTopicBean->getCreateDate()."','".$objTopicBean->getStatus()."','".$objTopicBean->getTopicOrder()."') ";
      $DB->query($query);
      return $DB->getLast();
   }
   public function update($objTopicBean){
      $DB = new DB();
      $DB->connect();
      $query = "UPDATE Topic SET ";
      $query.="UpdateCategoryId='".$objTopicBean->getUpdateCategoryId()."',";
      $query.="Question='".$objTopicBean->getQuestion()."',";
      $query.="OpenQuestion='".$objTopicBean->getOpenQuestion()."',";
      $query.="CreateDate='".$objTopicBean->getCreateDate()."',";
      $query.="Status='".$objTopicBean->getStatus()."',";
      $query.="TopicOrder='".$objTopicBean->getTopicOrder()."' ";
      $query.="WHERE TopicId=".$objTopicBean->getTopicId()."";
      $DB->query($query);
   }
   public function read($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT TopicId,UpdateCategoryId,Question,OpenQuestion,CreateDate,Status,TopicOrder FROM Topic";
      $query.=" WHERE TopicId=".$id;
      $DB->query($query);
      $objTopicBean= new TopicBean();
      $objTopicBean->setTopicId($DB->getField("TopicId"));
      $objTopicBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
      $objTopicBean->setQuestion($DB->getField("Question"));
      $objTopicBean->setOpenQuestion($DB->getField("OpenQuestion"));
      $objTopicBean->setCreateDate($DB->getField("CreateDate"));
      $objTopicBean->setStatus($DB->getField("Status"));
      $objTopicBean->setTopicOrder($DB->getField("TopicOrder"));
      
      return $objTopicBean;
   }
   
   public function readByUploadCategoryId($id){
      $DB = new DB();
      $DB->connect();
      $query="SELECT TopicId,UpdateCategoryId,Question,OpenQuestion,CreateDate,Status,TopicOrder FROM Topic";
      $query.=" WHERE UpdateCategoryId=".$id;
      $DB->query($query);
      $objTopicBean= new TopicBean();
      $objTopicBean->setTopicId($DB->getField("TopicId"));
      $objTopicBean->setUpdateCategoryId($DB->getField("UpdateCategoryId"));
      $objTopicBean->setQuestion($DB->getField("Question"));
      $objTopicBean->setOpenQuestion($DB->getField("OpenQuestion"));
      $objTopicBean->setCreateDate($DB->getField("CreateDate"));
      $objTopicBean->setStatus($DB->getField("Status"));
      $objTopicBean->setTopicOrder($DB->getField("TopicOrder"));
      
      return $objTopicBean;
   }
   
   public function delete($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Topic ";
      $query.="WHERE TopicId=".$id;
      $DB->query($query);
   }
   
    public function deleteByUploadCategoryId($id){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Topic ";
      $query.="WHERE UpdateCategoryId=".$id;
      $DB->query($query);
   }
   
   public function deleteEmptyRecords(){
      $DB = new DB();
      $DB->connect();
      $query="DELETE from Topic ";
      $query.="WHERE CreateDate='0000-00-00'";
      $DB->query($query);
   } 
}
?>