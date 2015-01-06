<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/BetaPictureBean.inc.php");

class BetaPictureGateway {
	
	public function getMainPictureImgDriveName($BetaId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Beta";
		if($BetaId != "") {
			$query .= " WHERE BetaId = '".$BetaId."'";	
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

	public function getByBetaId($BetaId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName";
		$query .= " FROM BetaPicture";
		if($BetaId != "") {
			$query .= " WHERE BetaId = '".$BetaId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"BetaPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"BetaPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"BetaPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"BetaPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByBetaObjAndId($BetaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName,IW,IH";
		$query .= " FROM BetaPicture";
		$query .= " WHERE BetaId = '".$BetaId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objBetaPicture = new BetaPictureBean();
				    $objBetaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objBetaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objBetaPicture->setIW($DB->getField("IW"));
				    $objBetaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objBetaPicture;
	      		}
	      }
	      return $arr;
	}
	
	public function getByBetaObjAndIdLimited($BetaId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName,IW,IH";
		$query .= " FROM BetaPicture";
		$query .= " WHERE BetaId = '".$BetaId."'";	
		$query .= " LIMIT 0,3";
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objBetaPicture = new BetaPictureBean();
				    $objBetaPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objBetaPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objBetaPicture->setIW($DB->getField("IW"));
				    $objBetaPicture->setIH($DB->getField("IH"));
				    $arr[] = $objBetaPicture;
	      		}
	      }
	      return $arr;
	}
	
	
}
?>