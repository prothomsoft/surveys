<?php
require_once("../../model/PollPictureDao.inc.php");
require_once("../../model/PollPictureBean.inc.php");
require_once("../../model/PollDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$PollId = $_POST['PollId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 1920, 1920, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 150, 150, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');		
		$objPollPictureDao = new PollPictureDao();
        $objPollPictureBean = new PollPictureBean();
        $objPollPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objPollPictureBean->setPollId($PollId);
        if($arr) {
        	$objPollPictureBean->setIW($arr[0]);
	        $objPollPictureBean->setIH($arr[1]);
        }
        $objPollPictureDao->create($objPollPictureBean);
        
        // sets first uploaded pictures as default
        $objPollDao = new PollDao();
        $objPollBean = $objPollDao->read($PollId);
        if($objPollBean->getImgDriveName() == "") {
        	$objPollBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objPollDao->update($objPollBean);        
	}
}
?>