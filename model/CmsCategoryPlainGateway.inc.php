<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsCategoryPlainBean.inc.php");

class CmsCategoryPlainGateway{

   function __construct(){
   }
   public function findAll(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT CmsCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM CmsCategoryPlain";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
		      $objCmsCategoryPlainBean->setCmsCategoryPlainId($this->DB->getField("CmsCategoryPlainId"));
		      $objCmsCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
		      $objCmsCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
		      $objCmsCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
			  $arr[] = $objCmsCategoryPlainBean;
      		}
      }
      return $arr;
   }
   
   public function findAllAsc(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT CmsCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM CmsCategoryPlain ORDER BY CmsCategoryPlainId ASC";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
		      $objCmsCategoryPlainBean->setCmsCategoryPlainId($this->DB->getField("CmsCategoryPlainId"));
		      $objCmsCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
		      $objCmsCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
		      $objCmsCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
			  $arr[] = $objCmsCategoryPlainBean;
      		}
      }
      return $arr;
   }
   
   public function findEmpty(){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT CmsCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM CmsCategoryPlain";      
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
      		   if (!$this->isCategoryEmpty($this->DB->getField("CategoryId"))) {
			      $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
			      $objCmsCategoryPlainBean->setCmsCategoryPlainId($this->DB->getField("CmsCategoryPlainId"));
			      $objCmsCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objCmsCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
			      $objCmsCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
				  $arr[] = $objCmsCategoryPlainBean;
      		   }
      		  
      		}
      }
      return $arr;
   }
   
   public function findEmptyEdit($CmsCategoryId){
      $this->DB = new DB();
      $this->DB->connect();
      $query="SELECT CmsCategoryPlainId,CategoryId,CategoryName,CategorySeoName FROM CmsCategoryPlain";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
      		   if ($this->DB->getField("CategoryId") == $CmsCategoryId)
      		   {
      		   	  $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
			      $objCmsCategoryPlainBean->setCmsCategoryPlainId($this->DB->getField("CmsCategoryPlainId"));
			      $objCmsCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objCmsCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
			      $objCmsCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
				  $arr[] = $objCmsCategoryPlainBean;
      		   }
      		   
      		   if (!$this->isCategoryEmpty($this->DB->getField("CategoryId"))) {
			      $objCmsCategoryPlainBean= new CmsCategoryPlainBean();
			      $objCmsCategoryPlainBean->setCmsCategoryPlainId($this->DB->getField("CmsCategoryPlainId"));
			      $objCmsCategoryPlainBean->setCategoryId($this->DB->getField("CategoryId"));
			      $objCmsCategoryPlainBean->setCategoryName($this->DB->getField("CategoryName"));
			      $objCmsCategoryPlainBean->setCategorySeoName($this->DB->getField("CategorySeoName"));
				  $arr[] = $objCmsCategoryPlainBean;
      		   }
      		  
      		}
      }
      return $arr;
   }
   
   public function isCategoryEmpty($categoryId){
   		$this->DB1 = new DB();
      	$this->DB1->connect();
      	$query  = "SELECT 1 FROM CmsContent ";
      	$query .="WHERE CmsCategoryId=".$categoryId."";
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
      $query="DELETE FROM CmsCategoryPlain";
      $this->DB->query($query);
   }
}
?>