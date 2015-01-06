<?php
require_once("../../model/SigmaPictureDao.inc.php");
require_once("../../model/SigmaPictureBean.inc.php");
require_once("../../model/SigmaDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$SigmaId = $_POST['SigmaId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 500, 800, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 200, 200, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objSigmaPictureDao = new SigmaPictureDao();
        $objSigmaPictureBean = new SigmaPictureBean();
        $objSigmaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objSigmaPictureBean->setSigmaId($SigmaId);
        if($arr) {
        	$objSigmaPictureBean->setIW($arr[0]);
	        $objSigmaPictureBean->setIH($arr[1]);
        }
        $objSigmaPictureDao->create($objSigmaPictureBean);
        
        // sets first uploaded pictures as default
        $objSigmaDao = new SigmaDao();
        $objSigmaBean = $objSigmaDao->read($SigmaId);
        if($objSigmaBean->getImgDriveName() == "") {
        	$objSigmaBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objSigmaDao->update($objSigmaBean);        
	}
}
?>