<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/UpdateCategoryPlainBean.inc.php");

/**
 * UpdateCategoryPlainGateway
 * 
 * database access class - gateway methods for table UpdateCategoryPlain
 */
class UpdateCategoryPlainGateway{

   function __construct(){
   }
   public function findAll(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT UpdateCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM UpdateCategoryPlain";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objUpdateCategoryPlainBean= new UpdateCategoryPlainBean();
		      $objUpdateCategoryPlainBean->setUpdateCategoryPlainId($this->DB->getField("UpdateCategoryPlainId"));
		      $objUpdateCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
		      $objUpdateCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
			  $arr[] = $objUpdateCategoryPlainBean;
      		}
      }
      return $arr;
   }
   
   public function findEmpty(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT UpdateCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM UpdateCategoryPlain";      
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
      		   if (!$this->isCategoryEmpty($this->DB->getField("CategoryId"))) {
			      $objUpdateCategoryPlainBean= new UpdateCategoryPlainBean();
			      $objUpdateCategoryPlainBean->setUpdateCategoryPlainId($this->DB->getField("UpdateCategoryPlainId"));
			      $objUpdateCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objUpdateCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
			      $objUpdateCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
				  $arr[] = $objUpdateCategoryPlainBean;
      		   }
      		  
      		}
      }
      return $arr;
   }
   
    public function findEmptyEdit($UpdateCategoryId){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT UpdateCategoryPlainId,CategoryId,CategoryName FROM UpdateCategoryPlain";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
      		   if ($this->DB->getField("CategoryId") == $UpdateCategoryId)
      		   {
      		   	  $objUpdateCategoryPlainBean= new UpdateCategoryPlainBean();
			      $objUpdateCategoryPlainBean->setUpdateCategoryPlainId($this->DB->getField("UpdateCategoryPlainId"));
			      $objUpdateCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objUpdateCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
				  $arr[] = $objUpdateCategoryPlainBean;
      		   }
      		   
      		   if (!$this->isCategoryEmpty($this->DB->getField("CategoryId"))) {
			      $objUpdateCategoryPlainBean= new UpdateCategoryPlainBean();
			      $objUpdateCategoryPlainBean->setUpdateCategoryPlainId($this->DB->getField("UpdateCategoryPlainId"));
			      $objUpdateCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objUpdateCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
				  $arr[] = $objUpdateCategoryPlainBean;
      		   }
      		  
      		}
      }
      return $arr;
   }
   
   
   public function isCategoryEmpty($categoryId){
   		$this->DB1 = new DB();
      	$this->DB1->connect();
      	$query  = "SELECT 1 FROM UpdateFile ";
      	$query .="WHERE UpdateCategoryId=".$categoryId."";
      	$this->DB1->query($query);
      	if ($this->DB1->numRows()>0)	{ 
      		return 1;
      	} else {
      		return 0;
      	}
   }
      
   public function removeAll(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="DELETE FROM UpdateCategoryPlain";
      $this->DB->query($query);
   }
}
?>