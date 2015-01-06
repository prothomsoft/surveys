<?php
require_once("../../model/ClubPictureDao.inc.php");
require_once("../../model/ClubPictureBean.inc.php");
require_once("../../model/ClubDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$ClubId = $_POST['ClubId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 150, 150, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objClubPictureDao = new ClubPictureDao();
        $objClubPictureBean = new ClubPictureBean();
        $objClubPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objClubPictureBean->setClubId($ClubId);
        if($arr) {
        	$objClubPictureBean->setIW($arr[0]);
	        $objClubPictureBean->setIH($arr[1]);
        }
        $objClubPictureDao->create($objClubPictureBean);
        
        // sets first uploaded pictures as default
        $objClubDao = new ClubDao();
        $objClubBean = $objClubDao->read($ClubId);
        if($objClubBean->getImgDriveName() == "") {
        	$objClubBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objClubDao->update($objClubBean);        
	}
}
?>