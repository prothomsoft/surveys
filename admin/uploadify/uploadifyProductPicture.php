<?php
require_once("../../model/ProductPictureDao.inc.php");
require_once("../../model/ProductPictureBean.inc.php");
require_once("../../model/ProductDao.inc.php");
require_once("../../model/components/images.inc.php");

if (!empty($_FILES)) {
	$productId = $_POST['productId'];
	$objImages = new Images();
	$pictureRandomId = $objImages->generatePictureId();

	$tempFile = $_FILES['Filedata']['tmp_name'];
	$targetFile =  '../../upload/'.$pictureRandomId.'.jpg';?>
	<?if(move_uploaded_file($tempFile,$targetFile)) {
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'proper', 800, 600, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'thumb', 480, 360, '../../upload');
		$objImages->ratioResizeImg($pictureRandomId.'.jpg', 'micro', 140, 105, '../../upload');
		$objProductPictureDao = new ProductPictureDao();
        $objProductPictureBean = new ProductPictureBean();
        $objProductPictureBean->setImgDriveName($pictureRandomId.'.jpg');
        $objProductPictureBean->setProductId($productId);
        $objProductPictureDao->create($objProductPictureBean);
        
        // sets first uploaded pictures as default
        $objProductDao = new ProductDao();
        $objProductBean = $objProductDao->read($productId);
        if($objProductBean->getImgDriveName() == "") {
        	$objProductBean->setImgDriveName($pictureRandomId.'.jpg');
        }
        $objProductDao->update($objProductBean);        
	}
}
?>