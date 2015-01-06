<?php
require_once("CmsCategoryPlainGateway.inc.php");
require_once("CmsCategoryPlainDao.inc.php");
require_once("CmsCategoryPlainBean.inc.php");

class model_CmsCategoryPlainListener extends MachII_framework_Listener {
	function configure() {}
	
	function findAll(&$event) {
		$objCmsCategoryPlainGateway = new CmsCategoryPlainGateway();
		$arrCmsCategoryPlain = $objCmsCategoryPlainGateway->findAll();
		$event->setArg("arrCmsCategoryPlain", $arrCmsCategoryPlain);
	}
	
	function findAllAsc(&$event) {
		$objCmsCategoryPlainGateway = new CmsCategoryPlainGateway();
		$arrCmsCategoryPlain = $objCmsCategoryPlainGateway->findAllAsc();
		$event->setArg("arrCmsCategoryPlain", $arrCmsCategoryPlain);
	}
}
?>