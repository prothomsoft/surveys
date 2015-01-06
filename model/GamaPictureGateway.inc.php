<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/GamaPictureBean.inc.php");

class GamaPictureGateway {
	
	public function getMainPictureImgDriveName($GamaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Gama";
		if($GamaId != "") {
			$query .= " WHERE GamaId = '".$GamaId."'";	
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

	public function getByGamaId($GamaId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName";
		$query .= " FROM GamaPicture";
		if($GamaId != "") {
			$query .= " WHERE GamaId = '".$GamaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"GamaPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"GamaPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"GamaPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"GamaPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByGamaObjAndId($GamaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM GamaPicture";
		$query .= " WHERE GamaId = '".$GamaId."'";
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objGamaPicture = new GamaPictureBean();
				    $objGamaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objGamaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objGamaPicture->setIW($DB->getField("IW"));
				    $objGamaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objGamaPicture;
	      		}
	      }
	      return $arr;
	}
	
	public function getByGamaObjAndIdLimited($GamaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, IW, IH";
		$query .= " FROM GamaPicture";
		$query .= " WHERE GamaId = '".$GamaId."'";
		$query .= " LIMIT 0,1"; 
		$DB->query($query);		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objGamaPicture = new GamaPictureBean();
				    $objGamaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objGamaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objGamaPicture->setIW($DB->getField("IW"));
				    $objGamaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objGamaPicture;
	      		}
	      }
	      return $arr;
	}
	
}
?>