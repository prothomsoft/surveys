<?php
require_once("../../model/DeltaPictureDao.inc.php");
require_once("../../model/DeltaPictureBean.inc.php");
require_once("../../model/DeltaDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$DeltaId = $_POST['DeltaId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 1920, 1920, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 150, 150, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objDeltaPictureDao = new DeltaPictureDao();
        $objDeltaPictureBean = new DeltaPictureBean();
        $objDeltaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objDeltaPictureBean->setDeltaId($DeltaId);
        if($arr) {
        	$objDeltaPictureBean->setIW($arr[0]);
	        $objDeltaPictureBean->setIH($arr[1]);
        }
        $objDeltaPictureDao->create($objDeltaPictureBean);
        
        // sets first uploaded pictures as default
        $objDeltaDao = new DeltaDao();
        $objDeltaBean = $objDeltaDao->read($DeltaId);
        if($objDeltaBean->getImgDriveName() == "") {
        	$objDeltaBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objDeltaDao->update($objDeltaBean);        
	}
}
?>