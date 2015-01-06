<?php
 require_once(dirname(__FILE__)."/components/db.inc.php");
 require_once(dirname(__FILE__)."/ProductPictureBean.inc.php");

class ProductPictureGateway {

	public function getByProductId($productId){
		$DB = new DB();
		$DB->connect();
		$query  = "SELECT ImgDriveName";
		$query .= " FROM ProductPicture";
		if($productId != "") {
			$query .= " WHERE ProductId = '".$productId."'";	
		}
		$DB->query($query);
		$i = 0;
		$value = "";
		if ($DB->numRows() > 0) {
			while($DB->move_next()) {
				$value{"ProductPicture"}{$i}{"ImgDriveName"}= $DB->getField("ImgDriveName");
				$i++;
			}
		}
		return json_encode($value);
	}
}
?>