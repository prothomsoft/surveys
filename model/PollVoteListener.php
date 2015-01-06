<?php
require_once("PollVoteDao.inc.php");
require_once("PollVoteGateway.inc.php");
require_once("PollVoteBean.inc.php");
require_once("PollDao.inc.php");

class model_PollVoteListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getByPollId(&$event) {
		$PollId = $event->getArg('PollId');
		$objPollVoteGateway = new PollVoteGateway();
		$responseJSON = $objPollVoteGateway->getByPollId($PollId);
		$event->setArg("responseJSON", $responseJSON);
	}	   
}?>
