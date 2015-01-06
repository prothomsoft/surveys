<?php
require_once("SigmaPictureDao.inc.php");
require_once("SigmaPictureGateway.inc.php");
require_once("SigmaPictureBean.inc.php");
require_once("SigmaDao.inc.php");

class model_SigmaPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getBySigmaId(&$event) {
		$SigmaId = $event->getArg('SigmaId');
		$objSigmaPictureGateway = new SigmaPictureGateway();
		$MainPictureImgDriveName  = $objSigmaPictureGateway->getMainPictureImgDriveName($SigmaId);
		$responseJSON = $objSigmaPictureGateway->getBySigmaId($SigmaId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getBySigmaObjAndId(&$event) {
		$objSigma = $event->getArg("objSigma");
		$SigmaId = $objSigma->getSigmaId();
		$objSigmaPictureGateway = new SigmaPictureGateway();
		$arrSigmaPictures = $objSigmaPictureGateway->getBySigmaObjAndId($SigmaId);
		$event->setArg("arrSigmaPictures", $arrSigmaPictures);		
	}
	
	function executeRemove(&$event) {
		$SigmaId = $event->getArg('SigmaId');
		$pictureId = $event->getArg('pictureId');
		$objSigmaPictureDao = new SigmaPictureDao();
		$objSigmaPictureDao->deleteByPictureAndSigmaId($SigmaId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$SigmaId = $event->getArg('SigmaId');
		$pictureId = $event->getArg('pictureId');
		
		$objSigmaDao = new SigmaDao();
		$objSigmaBean = $objSigmaDao->read($SigmaId);
		$objSigmaBean->setImgDriveName($pictureId);
		$objSigmaDao->update($objSigmaBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objSigmaPictureDao = new SigmaPictureDao();
		$objSigmaPictureBean = $objSigmaPictureDao->readByImgDriveName($imgDriveName);
		if($objSigmaPictureBean ->getSigmaPictureId() != "") {
			$objSigmaPictureBean->setImgAltName($ImgAltName);
			$objSigmaPictureDao->update($objSigmaPictureBean);
		}	
	}
	   
}?>
