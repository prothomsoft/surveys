<?php
require_once("../../model/CmsContentPictureDao.inc.php");
require_once("../../model/CmsContentPictureBean.inc.php");
require_once("../../model/CmsContentDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$CmsContentId = $_POST['CmsContentId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 140, 140, '../../upload');
		$arr = $objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 0, 0, '../../upload');	
		$objCmsContentPictureDao = new CmsContentPictureDao();
        $objCmsContentPictureBean = new CmsContentPictureBean();
        $objCmsContentPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objCmsContentPictureBean->setCmsContentId($CmsContentId);
        if($arr) {
        	$objCmsContentPictureBean->setIW($arr[0]);
	        $objCmsContentPictureBean->setIH($arr[1]);
        }
        $objCmsContentPictureDao->create($objCmsContentPictureBean);
        
        // sets first uploaded pictures as default
        $objCmsContentDao = new CmsContentDao();
        $objCmsContentBean = $objCmsContentDao->read($CmsContentId);
        if($objCmsContentBean->getImgDriveName() == "") {
        	$objCmsContentBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objCmsContentDao->update($objCmsContentBean);        
	}
}
?>