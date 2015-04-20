<?php
require_once("TopicMessageDao.inc.php");
require_once("TopicMessageGateway.inc.php");
require_once("TopicMessageBean.inc.php");
require_once("TopicDao.inc.php");

class model_TopicMessageListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function findByTopicId(&$event) {
		$TopicId = $event->getArg('TopicId');
		$objTopicMessageGateway = new TopicMessageGateway();
		$arrTopicMessage = $objTopicMessageGateway->findByTopicId($TopicId);
		$event->setArg("arrTopicMessage", $arrTopicMessage);
	}	   
}?>
