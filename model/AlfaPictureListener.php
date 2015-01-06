<?php
require_once("AlfaPictureDao.inc.php");
require_once("AlfaPictureGateway.inc.php");
require_once("AlfaPictureBean.inc.php");
require_once("AlfaDao.inc.php");

class model_AlfaPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByAlfaId(&$event) {
		$AlfaId = $event->getArg('AlfaId');
		$objAlfaPictureGateway = new AlfaPictureGateway();
		$MainPictureImgDriveName  = $objAlfaPictureGateway->getMainPictureImgDriveName($AlfaId);
		$HeaderPictureImgDriveName  = $objAlfaPictureGateway->getHeaderPictureImgDriveName($AlfaId);
		$responseJSON = $objAlfaPictureGateway->getByAlfaId($AlfaId, $MainPictureImgDriveName, $HeaderPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByAlfaObjAndId(&$event) {
		$objAlfa = $event->getArg("objAlfa");
		$AlfaId = $objAlfa->getAlfaId();
		$objAlfaPictureGateway = new AlfaPictureGateway();
		$arrAlfaPictures = $objAlfaPictureGateway->getByAlfaObjAndId($AlfaId);
		$event->setArg("arrAlfaPictures", $arrAlfaPictures);		
	}
	
	function executeRemove(&$event) {
		$AlfaId = $event->getArg('AlfaId');
		$pictureId = $event->getArg('pictureId');
		$objAlfaPictureDao = new AlfaPictureDao();
		$objAlfaPictureDao->deleteByPictureAndAlfaId($AlfaId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$AlfaId = $event->getArg('AlfaId');
		$pictureId = $event->getArg('pictureId');
		
		$objAlfaDao = new AlfaDao();
		$objAlfaBean = $objAlfaDao->read($AlfaId);
		$objAlfaBean->setImgDriveName($pictureId);
		$objAlfaDao->update($objAlfaBean);		
	}
	
	function executeSetHeader(&$event) {
		$AlfaId = $event->getArg('AlfaId');
		$pictureId = $event->getArg('pictureId');
		
		$objAlfaDao = new AlfaDao();
		$objAlfaBean = $objAlfaDao->read($AlfaId);
		$objAlfaBean->setImgDriveNameHeader($pictureId);
		$objAlfaDao->update($objAlfaBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objAlfaPictureDao = new AlfaPictureDao();
		$objAlfaPictureBean = $objAlfaPictureDao->readByImgDriveName($imgDriveName);
		if($objAlfaPictureBean ->getAlfaPictureId() != "") {
			$objAlfaPictureBean->setImgAltName($ImgAltName);
			$objAlfaPictureDao->update($objAlfaPictureBean);
		}	
	}
	   
}?>
