<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/AlfaPictureBean.inc.php");

class AlfaPictureGateway {
	
	public function getMainPictureImgDriveName($AlfaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Alfa";
		if($AlfaId != "") {
			$query .= " WHERE AlfaId = '".$AlfaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			return $DB->getField("ImgDriveName");
		} else {
			return "";
		}
	}
	
	public function getHeaderPictureImgDriveName($AlfaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveNameHeader";
		$query .= " FROM Alfa";
		if($AlfaId != "") {
			$query .= " WHERE AlfaId = '".$AlfaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			return $DB->getField("ImgDriveNameHeader");
		} else {
			return "";
		}
	}

	public function getByAlfaId($AlfaId, $MainPictureImgDriveName, $HeaderPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName,  ImgAltName";
		$query .= " FROM AlfaPicture";
		if($AlfaId != "") {
			$query .= " WHERE AlfaId = '".$AlfaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"AlfaPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"AlfaPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"AlfaPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"AlfaPicture"}{$i}{"MainPicture"}= "0";
				}
				if($HeaderPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"AlfaPicture"}{$i}{"HeaderPicture"}= "1";					
				} else {
					$value{"AlfaPicture"}{$i}{"HeaderPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByAlfaObjAndId($AlfaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM AlfaPicture";
		$query .= " WHERE AlfaId = '".$AlfaId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objAlfaPicture = new AlfaPictureBean();
				    $objAlfaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objAlfaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objAlfaPicture->setIW($DB->getField("IW"));
      				$objAlfaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objAlfaPicture;
	      		}
	      }
	      return $arr;
	}		
}
?>