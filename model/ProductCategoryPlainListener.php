<?php
require_once("ProductCategoryPlainGateway.inc.php");
require_once("ProductCategoryPlainDao.inc.php");
require_once("ProductCategoryPlainBean.inc.php");

class model_ProductCategoryPlainListener extends MachII_framework_Listener {
	function configure() {}
	
	function findAll(&$event) {
		$objProductCategoryPlainGateway = new ProductCategoryPlainGateway();
		$arrProductCategoryPlain = $objProductCategoryPlainGateway->findAll();
		$event->setArg("arrProductCategoryPlain", $arrProductCategoryPlain);
	}
	
	function findAllAsc(&$event) {
		$objProductCategoryPlainGateway = new ProductCategoryPlainGateway();
		$arrProductCategoryPlain = $objProductCategoryPlainGateway->findAllAsc();
		$event->setArg("arrProductCategoryPlain", $arrProductCategoryPlain);
	}
}
?>