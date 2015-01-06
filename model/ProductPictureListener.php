<?php
require_once("ProductPictureDao.inc.php");
require_once("ProductPictureGateway.inc.php");
require_once("ProductPictureBean.inc.php");
require_once("ProductDao.inc.php");

class model_ProductPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByProductId(&$event) {
		$productId = $event->getArg('productId');
		$objProductPictureGateway = new ProductPictureGateway();
		$responseJSON = $objProductPictureGateway->getByProductId($productId);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function executeRemove(&$event) {
		$productId = $event->getArg('productId');
		$pictureId = $event->getArg('pictureId');
		$objProductPictureDao = new ProductPictureDao();
		$objProductPictureDao->deleteByPictureAndProductId($productId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$productId = $event->getArg('productId');
		$pictureId = $event->getArg('pictureId');
		
		$objProductDao = new ProductDao();
		$objProductBean = $objProductDao->read($productId);
		$objProductBean->setImgDriveName($pictureId);
		$objProductDao->update($objProductBean);		
	}
	   
}?>
