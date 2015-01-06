<?php
require_once(dirname(__FILE__)."/components/db.inc.php");
require_once(dirname(__FILE__)."/ProducerBean.inc.php");

class ProducerGateway {

   function __construct(){
   }
   
   public function findAll(){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT ProducerId,Name FROM Producer";
      $query .= " ORDER BY Name ASC";
      $DB->query($query);
      $arr = "";
      if ($DB->numRows()>0)
      {
      		while($DB->move_next())
      		{
      			  $objProducerBean= new ProducerBean();
			      $objProducerBean->setProducerId($DB->getField("ProducerId"));
			      $objProducerBean->setName($DB->getField("Name"));
			      $arr[] = $objProducerBean;
      		}
      }
      return $arr;
   }
   
   public function findByName($name, $maxRows){
      $DB = new DB();
      $DB->connect();
      $query  = "SELECT Name";
      $query .= " FROM Producer";
      if($name != "") {
      	$query .= " WHERE Name like '%".$name."%'";	
      }     
      $query .= " LIMIT 0, ".$maxRows."";
      $DB->query($query);
      $i = 0;
      $value = "";
      if ($DB->numRows() > 0) {
      		while($DB->move_next()) {
      			$value{"Producer"}{$i}{"Name"}= $DB->getField("Name");
				$i++;
      		}
      }
      return json_encode($value);
   }
}
?>