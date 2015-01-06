<?php
require_once("DeltaPictureDao.inc.php");
require_once("DeltaPictureGateway.inc.php");
require_once("DeltaPictureBean.inc.php");
require_once("DeltaDao.inc.php");

class model_DeltaPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByDeltaId(&$event) {
		$DeltaId = $event->getArg('DeltaId');
		$objDeltaPictureGateway = new DeltaPictureGateway();
		$MainPictureImgDriveName  = $objDeltaPictureGateway->getMainPictureImgDriveName($DeltaId);
		$responseJSON = $objDeltaPictureGateway->getByDeltaId($DeltaId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByDeltaObjAndId(&$event) {
		$objDelta = $event->getArg("objDelta");
		$DeltaId = $objDelta->getDeltaId();
		$objDeltaPictureGateway = new DeltaPictureGateway();
		$arrDeltaPictures = $objDeltaPictureGateway->getByDeltaObjAndId($DeltaId);
		$event->setArg("arrDeltaPictures", $arrDeltaPictures);		
	}
	
	function executeRemove(&$event) {
		$DeltaId = $event->getArg('DeltaId');
		$pictureId = $event->getArg('pictureId');
		$objDeltaPictureDao = new DeltaPictureDao();
		$objDeltaPictureDao->deleteByPictureAndDeltaId($DeltaId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$DeltaId = $event->getArg('DeltaId');
		$pictureId = $event->getArg('pictureId');
		
		$objDeltaDao = new DeltaDao();
		$objDeltaBean = $objDeltaDao->read($DeltaId);
		$objDeltaBean->setImgDriveName($pictureId);
		$objDeltaDao->update($objDeltaBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objDeltaPictureDao = new DeltaPictureDao();
		$objDeltaPictureBean = $objDeltaPictureDao->readByImgDriveName($imgDriveName);
		if($objDeltaPictureBean ->getDeltaPictureId() != "") {
			$objDeltaPictureBean->setImgAltName($ImgAltName);
			$objDeltaPictureDao->update($objDeltaPictureBean);
		}	
	}
	   
}?>
