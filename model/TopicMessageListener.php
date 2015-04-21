<?php
require_once("TopicMessageDao.inc.php");
require_once("TopicMessageGateway.inc.php");
require_once("TopicMessageBean.inc.php");
require_once("TopicDao.inc.php");

class model_TopicMessageListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function findByTopicId(&$event) {
		$TopicId = $event->getArg('id1');
		$objTopicMessageGateway = new TopicMessageGateway();
		$arrTopicMessage = $objTopicMessageGateway->findByTopicId($TopicId);
		$event->setArg("arrTopicMessage", $arrTopicMessage);
	}
    
    function findTopicMessagesByTopicId(&$event) {
        $TopicId = $event->getArg("id1");
        $objAppSession = new AppSession();
        $objUser = $objAppSession->getSession("User");
        $UserId = $objUser->getUserId();
        $objTopicMessageGateway = new TopicMessageGateway();
        $responseJSON = $objTopicMessageGateway->findTopicMessagesByTopicId($TopicId);
        $event->setArg("responseJSON", $responseJSON);
    }	   
    
    function saveTopicMessage(&$event) {
        $TopicId = $event->getArg("TopicId");
        $UserId = $event->getArg("UserId");
        $Message = $event->getArg("Message");
        
        $objTopicMessageBean = new TopicMessageBean();
        $objTopicMessageBean->setTopicId($TopicId);
        $objTopicMessageBean->setUserId($UserId);
        $objTopicMessageBean->setMessage($Message);
        
        $objTopicMessageDao = new TopicMessageDao();
        $objTopicMessageDao->create($objTopicMessageBean);
    }
    
    function validationResultTrue() {
        $arrResult = array(validationResult => true);
        echo json_encode($arrResult);
    }
    
    function removeRecord(&$event) {
        $TopicMessageId = $event->getArg('TopicMessageId');
        $objTopicMessageDao = new TopicMessageDao();
        $objTopicMessageBean = new TopicMessageBean();
        $objTopicMessageBean = $objTopicMessageDao->delete($TopicMessageId);
        $TopicId = $event->getArg('TopicId');
        header("Location: ".$SN."index.php?event=showTopicHistory&id1=".$TopicId."");                 
    }
}?>
