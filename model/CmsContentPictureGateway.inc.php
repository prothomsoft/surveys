<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/CmsContentPictureBean.inc.php");

class CmsContentPictureGateway {
	
	public function getMainPictureImgDriveName($CmsContentId){
		
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM CmsContent";
		if($CmsContentId != "") {
			$query .= " WHERE CmsContentId = '".$CmsContentId."'";	
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

	public function getByCmsContentId($CmsContentId, $MainPictureImgDriveName){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName,ImgOrder";
		$query .= " FROM CmsContentPicture";
		if($CmsContentId != "") {
			$query .= " WHERE CmsContentId = '".$CmsContentId."'";	
		}
		$query .= " ORDER BY ImgOrder DESC";
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"CmsContentPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$value{"CmsContentPicture"}{$i}{"ImgAltName"}= $DB->getField("ImgAltName");
				$value{"CmsContentPicture"}{$i}{"ImgOrder"}= $DB->getField("ImgOrder");
				if($MainPictureImgDriveName == $DB->getField("ImgDriveName")) {
					$value{"CmsContentPicture"}{$i}{"MainPicture"}= "1";					
				} else {
					$value{"CmsContentPicture"}{$i}{"MainPicture"}= "0";
				}
				$i++;
			}
		}
		return json_encode($value);
	}
	
	public function getByCmsContentObjAndId($CmsContentId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName, ImgAltName, ImgOrder, IW, IH";
		$query .= " FROM CmsContentPicture";
		$query .= " WHERE CmsContentId = '".$CmsContentId."'";
		$query .= " ORDER BY ImgOrder DESC";	
		$DB->query($query);
		
	      $arr = "";
	      if ($DB->numRows()>0)
	      {
	      		while($DB->move_next())
	      		{
	      			$objCmsContentPicture = new CmsContentPictureBean();
				    $objCmsContentPicture->setImgDriveName($DB->getField("ImgDriveName"));
				    $objCmsContentPicture->setImgAltName($DB->getField("ImgAltName"));
				    $objCmsContentPicture->setImgOrder($DB->getField("ImgOrder"));
				    $objCmsContentPicture->setIW($DB->getField("IW"));
				    $objCmsContentPicture->setIH($DB->getField("IH"));
				    $arr[] = $objCmsContentPicture;
	      		}
	      }
	      return $arr;
	}
	
	
}
?>