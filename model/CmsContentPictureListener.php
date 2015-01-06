<?php
require_once("CmsContentPictureDao.inc.php");
require_once("CmsContentPictureGateway.inc.php");
require_once("CmsContentPictureBean.inc.php");
require_once("CmsContentDao.inc.php");

class model_CmsContentPictureListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByCmsContentId(&$event) {
		$CmsContentId = $event->getArg('CmsContentId');
		$objCmsContentPictureGateway = new CmsContentPictureGateway();
		$MainPictureImgDriveName  = $objCmsContentPictureGateway->getMainPictureImgDriveName($CmsContentId);
		$responseJSON = $objCmsContentPictureGateway->getByCmsContentId($CmsContentId, $MainPictureImgDriveName);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function getByCmsContentObjAndId(&$event) {
		$objCmsContent = $event->getArg("objCmsContent");
		$CmsContentId = $objCmsContent->getCmsContentId();
		$objCmsContentPictureGateway = new CmsContentPictureGateway();
		$arrCmsContentPictures = $objCmsContentPictureGateway->getByCmsContentObjAndId($CmsContentId);
		$event->setArg("arrCmsContentPictures", $arrCmsContentPictures);		
	}
	
	function executeRemove(&$event) {
		$CmsContentId = $event->getArg('CmsContentId');
		$pictureId = $event->getArg('pictureId');
		$objCmsContentPictureDao = new CmsContentPictureDao();
		$objCmsContentPictureDao->deleteByPictureAndCmsContentId($CmsContentId, $pictureId);		
	}
	
	function executeSetMain(&$event) {
		$CmsContentId = $event->getArg('CmsContentId');
		$pictureId = $event->getArg('pictureId');
		
		$objCmsContentDao = new CmsContentDao();
		$objCmsContentBean = $objCmsContentDao->read($CmsContentId);
		$objCmsContentBean->setImgDriveName($pictureId);
		$objCmsContentDao->update($objCmsContentBean);		
	}
	
	function executeSavePictureDescription(&$event) {
		$imgDriveName = $event->getArg('imgDriveName');
		$ImgAltName = $event->getArg('imgAltName');
		$ImgOrder = $event->getArg('imgOrder');
		
		$objCmsContentPictureDao = new CmsContentPictureDao();
		$objCmsContentPictureBean = $objCmsContentPictureDao->readByImgDriveName($imgDriveName);
		if($objCmsContentPictureBean ->getCmsContentPictureId() != "") {
			if($ImgAltName != "") {
				$objCmsContentPictureBean->setImgAltName($ImgAltName);	
			}
			if($ImgOrder != "") {
				$objCmsContentPictureBean->setImgOrder($ImgOrder);
			}
			$objCmsContentPictureDao->update($objCmsContentPictureBean);
		}	
	}
	   
}?>
