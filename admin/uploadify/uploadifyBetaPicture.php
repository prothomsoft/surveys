<?php
require_once("../../model/BetaPictureDao.inc.php");
require_once("../../model/BetaPictureBean.inc.php");
require_once("../../model/BetaDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$BetaId = $_POST['BetaId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 480, 360, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 140, 105, '../../upload');
		$objBetaPictureDao = new BetaPictureDao();
        $objBetaPictureBean = new BetaPictureBean();
        $objBetaPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objBetaPictureBean->setBetaId($BetaId);
        $objBetaPictureDao->create($objBetaPictureBean);
        
        // sets first uploaded pictures as default
        $objBetaDao = new BetaDao();
        $objBetaBean = $objBetaDao->read($BetaId);
        if($objBetaBean->getImgDriveName() == "") {
        	$objBetaBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objBetaDao->update($objBetaBean);        
	}
}
?>