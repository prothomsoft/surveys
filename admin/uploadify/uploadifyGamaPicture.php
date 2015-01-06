<?php
require_once("../../model/GamaPictureDao.inc.php");
require_once("../../model/GamaPictureBean.inc.php");
require_once("../../model/GamaDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$GamaId = $_POST['GamaId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 150, 150, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objGamaPictureDao = new GamaPictureDao();
        $objGamaPictureBean = new GamaPictureBean();
        $objGamaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objGamaPictureBean->setGamaId($GamaId);
        if($arr) {
        	$objGamaPictureBean->setIW($arr[0]);
	        $objGamaPictureBean->setIH($arr[1]);
        }
        $objGamaPictureDao->create($objGamaPictureBean);
        
        // sets first uploaded pictures as default
        $objGamaDao = new GamaDao();
        $objGamaBean = $objGamaDao->read($GamaId);
        if($objGamaBean->getImgDriveName() == "") {
        	$objGamaBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objGamaDao->update($objGamaBean);        
	}
}
?>