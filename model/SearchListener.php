<?php
require_once("components/session.inc.php");

require_once("SearchBean.inc.php");
require_once("SearchDao.inc.php");


class model_SearchListener extends MachII_framework_Listener
{
    function configure() {}
	
    function addKeyword(&$event) {
		
		$searchKeyword = $event->getArg("searchKeyword");
		
		$objSearchBean = new SearchBean();
		$objSearchBean->setKeyword($searchKeyword);
		
		$date = date('Y-m-d');
		$objSearchBean->setCreateDate($date);
		
		$objSearchDao = new SearchDao();
		$objSearchDao->create($objSearchBean);
	}
	
}
?>