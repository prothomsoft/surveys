<?php
require_once("RightsUserDao.inc.php");
require_once("RightsUserBean.inc.php");
require_once("RightsUserGateway.inc.php");

class model_RightsListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getAllowedEventsList(&$event) {
    	
    	$appSession = new AppSession();
    	
    	if($appSession->getSession("User")) {
			$UserId = $appSession->getSession("User")->getUserId();
    	} else {
    		$UserId = "";
    	}
    	
    	if($UserId != 3) {
    		$event->setArg("userId", $UserId);
    	}
    	
		if($UserId != "") {
	  		$objRightsUserDao = new RightsUserDao();
	        $objRightsUserBean = $objRightsUserDao->readByUser($UserId);
	        $userRightLevel = $objRightsUserBean->getRight()->getLevel();
	                           
	        // get list of events allowd for levels (0,1,2) from (component - eventsAllowedForLevel.inc.php)
	        $objEventsAllowedForLevel = new EventsAllowedForLevel();
	                               
	        // if the current event is not on the list of allowed events for this level redirect to login page
			if ($userRightLevel == 0) {
				$arrEventsAllowedForLevel_0 = $objEventsAllowedForLevel->eventsAllowedForLevel_0;
				$event->setArg('arrEventsAllowedForLevel', $arrEventsAllowedForLevel_0);
			}
						
			if ($userRightLevel == 1) {
				$arrEventsAllowedForLevel_1 = $objEventsAllowedForLevel->eventsAllowedForLevel_1;
				$event->setArg('arrEventsAllowedForLevel', $arrEventsAllowedForLevel_1);
			}
			
			if ($userRightLevel == 2) {
				$arrEventsAllowedForLevel_2 = $objEventsAllowedForLevel->eventsAllowedForLevel_2;
				$event->setArg('arrEventsAllowedForLevel', $arrEventsAllowedForLevel_2);
			}
		}
    }
    
    public function findAllWriters(&$event){
    	$userRightLevel = 1; // right level from rights table
    	$objRightsUserGateway = new RightsUserGateway();
    	$arrRightsLevelUsers = $objRightsUserGateway->findUserbyRightLevel($userRightLevel);
    	$event->setArg('arrWriter', $arrRightsLevelUsers);
    }
}
?>