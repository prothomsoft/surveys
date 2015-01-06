<?php
require_once("../../model/AlfaPictureDao.inc.php");
require_once("../../model/AlfaPictureBean.inc.php");
require_once("../../model/AlfaDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$AlfaId = $_POST['AlfaId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 150, 150, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'header', 640, 300, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objAlfaPictureDao = new AlfaPictureDao();
        $objAlfaPictureBean = new AlfaPictureBean();
        $objAlfaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objAlfaPictureBean->setAlfaId($AlfaId);
        if($arr) {
        	$objAlfaPictureBean->setIW($arr[0]);
	        $objAlfaPictureBean->setIH($arr[1]);
        }
        $objAlfaPictureDao->create($objAlfaPictureBean);
        
        // sets first uploaded pictures as default
        $objAlfaDao = new AlfaDao();
        $objAlfaBean = $objAlfaDao->read($AlfaId);
        if($objAlfaBean->getImgDriveName() == "") {
        	$objAlfaBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objAlfaDao->update($objAlfaBean);        
	}
}
?>