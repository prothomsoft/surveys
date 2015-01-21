<?php
require_once("PollVoteDao.inc.php");
require_once("PollVoteGateway.inc.php");
require_once("PollVoteBean.inc.php");
require_once("PollDao.inc.php");

class model_PollVoteListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function findByPollId(&$event) {
		$PollId = $event->getArg('PollId');
		$objPollVoteGateway = new PollVoteGateway();
		$arrPollVote = $objPollVoteGateway->findAllByPollId($PollId);
		$event->setArg("arrPollVote", $arrPollVote);
	}	   
}?>
