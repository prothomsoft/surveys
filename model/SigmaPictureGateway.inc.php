<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/SigmaPictureBean.inc.php");

class SigmaPictureGateway {
	
	public function getMainPictureImgDriveName($SigmaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Sigma";
		if($SigmaId != "") {
			$query .= " WHERE SigmaId = '".$SigmaId."'";	
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

	public function getBySigmaId($SigmaId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName";
		$query .= " FROM SigmaPicture";
		if($SigmaId != "") {
			$query .= " WHERE SigmaId = '".$SigmaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"SigmaPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"SigmaPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"SigmaPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"SigmaPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getBySigmaObjAndId($SigmaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM SigmaPicture";
		$query .= " WHERE SigmaId = '".$SigmaId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objSigmaPicture = new SigmaPictureBean();
				    $objSigmaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objSigmaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objSigmaPicture->setIW($DB->getField("IW"));
      				$objSigmaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objSigmaPicture;
	      		}
	      }
	      return $arr;
	}	
	
	public function getBySigmaObjAndIdLimited($SigmaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM SigmaPicture";
		$query .= " WHERE SigmaId = '".$SigmaId."'";
		$query .= " LIMIT 0,3";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objSigmaPicture = new SigmaPictureBean();
				    $objSigmaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objSigmaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objSigmaPicture->setIW($DB->getField("IW"));
      				$objSigmaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objSigmaPicture;
	      		}
	      }
	      return $arr;
	}	
}
?>