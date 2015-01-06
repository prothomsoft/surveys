<?php
require_once("ClubPictureDao.inc.php");
require_once("ClubPictureGateway.inc.php");
require_once("ClubPictureBean.inc.php");
require_once("ClubDao.inc.php");

class model_ClubPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByClubId(&$event) {
		$ClubId = $event->getArg('ClubId');
		$objClubPictureGateway = new ClubPictureGateway();
		$MainPictureImgDriveName  = $objClubPictureGateway->getMainPictureImgDriveName($ClubId);
		$responseJSON = $objClubPictureGateway->getByClubId($ClubId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByClubObjAndId(&$event) {
		$objClub = $event->getArg("objClub");
		$ClubId = $objClub->getClubId();
		$objClubPictureGateway = new ClubPictureGateway();
		$arrClubPictures = $objClubPictureGateway->getByClubObjAndId($ClubId);
		$event->setArg("arrClubPictures", $arrClubPictures);		
	}
	
	function executeRemove(&$event) {
		$ClubId = $event->getArg('ClubId');
		$pictureId = $event->getArg('pictureId');
		$objClubPictureDao = new ClubPictureDao();
		$objClubPictureDao->deleteByPictureAndClubId($ClubId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$ClubId = $event->getArg('ClubId');
		$pictureId = $event->getArg('pictureId');
		
		$objClubDao = new ClubDao();
		$objClubBean = $objClubDao->read($ClubId);
		$objClubBean->setImgDriveName($pictureId);
		$objClubDao->update($objClubBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		
		$objClubPictureDao = new ClubPictureDao();
		$objClubPictureBean = $objClubPictureDao->readByImgDriveName($imgDriveName);
		if($objClubPictureBean ->getClubPictureId() != "") {
			$objClubPictureBean->setImgAltName($ImgAltName);
			$objClubPictureDao->update($objClubPictureBean);
		}	
	}
	   
}?>
