<?php
require_once("GamaPictureDao.inc.php");
require_once("GamaPictureGateway.inc.php");
require_once("GamaPictureBean.inc.php");
require_once("GamaDao.inc.php");

class model_GamaPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByGamaId(&$event) {
		$GamaId = $event->getArg('GamaId');
		$objGamaPictureGateway = new GamaPictureGateway();
		$MainPictureImgDriveName  = $objGamaPictureGateway->getMainPictureImgDriveName($GamaId);
		$responseJSON = $objGamaPictureGateway->getByGamaId($GamaId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByGamaObjAndId(&$event) {
		$objGama = $event->getArg("objGama");
		$GamaId = $objGama->getGamaId();
		$objGamaPictureGateway = new GamaPictureGateway();
		$arrGamaPictures = $objGamaPictureGateway->getByGamaObjAndId($GamaId);
		$event->setArg("arrGamaPictures", $arrGamaPictures);		
	}
	
	function executeRemove(&$event) {
		$GamaId = $event->getArg('GamaId');
		$pictureId = $event->getArg('pictureId');
		$objGamaPictureDao = new GamaPictureDao();
		$objGamaPictureDao->deleteByPictureAndGamaId($GamaId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$GamaId = $event->getArg('GamaId');
		$pictureId = $event->getArg('pictureId');
		
		$objGamaDao = new GamaDao();
		$objGamaBean = $objGamaDao->read($GamaId);
		$objGamaBean->setImgDriveName($pictureId);
		$objGamaDao->update($objGamaBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objGamaPictureDao = new GamaPictureDao();
		$objGamaPictureBean = $objGamaPictureDao->readByImgDriveName($imgDriveName);
		if($objGamaPictureBean ->getGamaPictureId() != "") {
			$objGamaPictureBean->setImgAltName($ImgAltName);
			$objGamaPictureDao->update($objGamaPictureBean);
		}	
	}
	   
}?>
