<?php
require_once("BetaPictureDao.inc.php");
require_once("BetaPictureGateway.inc.php");
require_once("BetaPictureBean.inc.php");
require_once("BetaDao.inc.php");

class model_BetaPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByBetaId(&$event) {
		$BetaId = $event->getArg('BetaId');
		$objBetaPictureGateway = new BetaPictureGateway();
		$MainPictureImgDriveName  = $objBetaPictureGateway->getMainPictureImgDriveName($BetaId);
		$responseJSON = $objBetaPictureGateway->getByBetaId($BetaId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByBetaObjAndId(&$event) {
		$objBeta = $event->getArg("objBeta");
		$BetaId = $objBeta->getBetaId();
		$objBetaPictureGateway = new BetaPictureGateway();
		$arrBetaPictures = $objBetaPictureGateway->getByBetaObjAndId($BetaId);
		$event->setArg("arrBetaPictures", $arrBetaPictures);		
	}
	
	function executeRemove(&$event) {
		$BetaId = $event->getArg('BetaId');
		$pictureId = $event->getArg('pictureId');
		$objBetaPictureDao = new BetaPictureDao();
		$objBetaPictureDao->deleteByPictureAndBetaId($BetaId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$BetaId = $event->getArg('BetaId');
		$pictureId = $event->getArg('pictureId');
		
		$objBetaDao = new BetaDao();
		$objBetaBean = $objBetaDao->read($BetaId);
		$objBetaBean->setImgDriveName($pictureId);
		$objBetaDao->update($objBetaBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objBetaPictureDao = new BetaPictureDao();
		$objBetaPictureBean = $objBetaPictureDao->readByImgDriveName($imgDriveName);
		if($objBetaPictureBean ->getBetaPictureId() != "") {
			$objBetaPictureBean->setImgAltName($ImgAltName);
			$objBetaPictureDao->update($objBetaPictureBean);
		}	
	}
	   
}?>
