<?php
require_once("PollAnswerDao.inc.php");
require_once("PollAnswerGateway.inc.php");
require_once("PollAnswerBean.inc.php");
require_once("PollDao.inc.php");

class model_PollAnswerListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByPollId(&$event) {
		$PollId = $event->getArg('PollId');
		$objPollAnswerGateway = new PollAnswerGateway();
		$responseJSON = $objPollAnswerGateway->getByPollId($PollId);
		$event->setArg("responseJSON", $responseJSON);
	}	   
}?>
