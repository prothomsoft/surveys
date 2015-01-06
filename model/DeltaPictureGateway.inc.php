<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/DeltaPictureBean.inc.php");

class DeltaPictureGateway {
	
	public function getMainPictureImgDriveName($DeltaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Delta";
		if($DeltaId != "") {
			$query .= " WHERE DeltaId = '".$DeltaId."'";	
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

	public function getByDeltaId($DeltaId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName";
		$query .= " FROM DeltaPicture";
		if($DeltaId != "") {
			$query .= " WHERE DeltaId = '".$DeltaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"DeltaPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"DeltaPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"DeltaPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"DeltaPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByDeltaObjAndId($DeltaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM DeltaPicture";
		$query .= " WHERE DeltaId = '".$DeltaId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objDeltaPicture = new DeltaPictureBean();
				    $objDeltaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objDeltaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objDeltaPicture->setIW($DB->getField("IW"));
      				$objDeltaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objDeltaPicture;
	      		}
	      }
	      return $arr;
	}		
}
?>