<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ClubPictureBean.inc.php");

class ClubPictureGateway {
	
	public function getMainPictureImgDriveName($ClubId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM Club";
		if($ClubId != "") {
			$query .= " WHERE ClubId = '".$ClubId."'";	
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

	public function getByClubId($ClubId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName";
		$query .= " FROM ClubPicture";
		if($ClubId != "") {
			$query .= " WHERE ClubId = '".$ClubId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"ClubPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"ClubPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"ClubPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"ClubPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByClubObjAndId($ClubId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName,IW,IH";
		$query .= " FROM ClubPicture";
		$query .= " WHERE ClubId = '".$ClubId."'";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objClubPicture = new ClubPictureBean();
				    $objClubPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objClubPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objClubPicture->setIW($DB->getField("IW"));
				    $objClubPicture->setIH($DB->getField("IH"));
				    $arr[] = $objClubPicture;
	      		}
	      }
	      return $arr;
	}
	
	
}
?>