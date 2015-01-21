<?php
require_once("PollAnswerDao.inc.php");
require_once("PollAnswerGateway.inc.php");
require_once("PollAnswerBean.inc.php");
require_once("PollDao.inc.php");

class model_PollAnswerListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function findByPollId(&$event) {
		$PollId = $event->getArg('PollId');
		$objPollAnswerGateway = new PollAnswerGateway();
		$arrPollAnswers = $objPollAnswerGateway->getByPollId($PollId);
		$event->setArg("arrPollAnswers", $arrPollAnswers);
	}	   
}?>
