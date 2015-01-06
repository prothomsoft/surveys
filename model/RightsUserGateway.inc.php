<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/RightsUserBean.inc.php");
require_once(dirname(__FILE__)."/UserBean.inc.php");

class RightsUserGateway {

   function __construct(){
   }
   
   public function findUserbyRightLevel($level){
      $this->DB = new DB();
      $this->DB->connect();
      $query  = "SELECT U.UserId, U.NameFirst, U.NameLast, U.Email ";
      $query .= "FROM User U, Rights R, RightsUser RU ";
      $query .= "WHERE U.UserId=RU.UserId ";
      $query .= "AND R.RightsId=RU.RightsId ";
      $query .= "AND R.Level='".$level."'";
      $this->DB->query($query);
      $arr = "";
      if ($this->DB->numRows()>0)
      {
      		while($this->DB->move_next())
      		{
		      $objUserBean= new UserBean();
		      $objUserBean->setUserId($this->DB->getField("UserId"));
		      $objUserBean->setNameFirst($this->DB->getField("NameFirst"));
		      $objUserBean->setNameLast($this->DB->getField("NameLast"));
		      $objUserBean->setEmail($this->DB->getField("Email"));
		      $arr[] = $objUserBean;
      		}
      }
      return $arr;
   }
   
   public function updateByUserId($userId, $rightsNewId, $rightsOldId) {
   	  $DB = new DB();
      $DB->connect();
      $query = "UPDATE RightsUser SET ";
      $query.="RightsId='".$rightsNewId."' ";
      $query.="WHERE RightsId=".$rightsOldId." ";
      $query.="AND UserId=".$userId." ";
      $DB->query($query);
   }
   
}
?>