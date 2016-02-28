<?php

if (file_exists("../model/UserBean.inc.php")) {
	require_once("../model/UserBean.inc.php");
} else {
	require_once("model/UserBean.inc.php");
}

if (file_exists("../model/components/eventsAllowedForLevel.inc.php")) {
	require_once("../model/components/eventsAllowedForLevel.inc.php");
} else {
	require_once("model/components/eventsAllowedForLevel.inc.php");
}

if (file_exists("../model/components/eventsAllowedForEveryone.inc.php")) {
	require_once("../model/components/eventsAllowedForEveryone.inc.php");
} else {
	require_once("model/components/eventsAllowedForEveryone.inc.php");
}

class plugins_SecurityPlugin extends MachII_framework_Plugin
{

    function configure()
    {
    }
    
    function preEvent(&$event)
    {
      $appSession = new AppSession();
      
      $SN = "http://".$_SERVER['SERVER_NAME']."/young_life/";
      $appSession->setSession("SN",$SN);
      
       if ($appSession->getSession("sLang") == "") {
      	$appSession->setSession("sLang",'PL');
      } 
      
      if ($appSession->getSession("User") == "") {
      		// get currentEventName
            $currentEventName = $event->getCurrentEvent()->_name;
            
            // get list of events allowed for everyone from (component - eventsAllowedForEveryone.inc.php)
      		$objEventsAllowedForEveryone = new EventsAllowedForEveryone();
      		$arrEventsAllowedForEveryone = $objEventsAllowedForEveryone->eventsAllowedForEveryone;
      		
      		if (!in_array($currentEventName, $arrEventsAllowedForEveryone)) {
      			header("Location: ".$SN."start.html");
      		}
      		
      } else {
      		// get userRightLevel and userRightLabel
      		$UserId = $appSession->getSession("User")->getUserId();
      		$objRightsUserDao = new RightsUserDao();
            $objRightsUserBean = $objRightsUserDao->readByUser($UserId);
            $userRightLabel = $objRightsUserBean->getRight()->getLabel();
            $userRightLevel = $objRightsUserBean->getRight()->getLevel();
                                    
            // get currentEventName
            $currentEventName = $event->getCurrentEvent()->_name;
                       
            // get list of events allowed for levels (0,1,2) from (component - eventsAllowedForLevel.inc.php)
            $objEventsAllowedForLevel = new EventsAllowedForLevel();
            
            // get list of events allowed for everyone from (component - eventsAllowedForEveryone.inc.php)
            $objEventsAllowedForEveryone = new EventsAllowedForEveryone();
                                   
            // if the current event is not on the list of allowed events for this level redirect to login page
			if ($userRightLevel == 0) {
				$arrEventsAllowedForLevel_0 = $objEventsAllowedForLevel->eventsAllowedForLevel_0;
				$arrEventsAllowedForEveryone = $objEventsAllowedForEveryone->eventsAllowedForEveryone;
				$arrEventsAllowed = array_merge($arrEventsAllowedForLevel_0, $arrEventsAllowedForEveryone); 
				
				if (!in_array($currentEventName, $arrEventsAllowed)) {
					$appSession->unsetSession('User');
					header("Location: ".$SN."start.html");
				}
			}
						
			if ($userRightLevel == 1) {
				$arrEventsAllowedForLevel_1 = $objEventsAllowedForLevel->eventsAllowedForLevel_1;
				$arrEventsAllowedForEveryone = $objEventsAllowedForEveryone->eventsAllowedForEveryone;
				$arrEventsAllowed = array_merge($arrEventsAllowedForLevel_1, $arrEventsAllowedForEveryone); 
				if (!in_array($currentEventName, $arrEventsAllowed)) {
					$appSession->unsetSession('User');
					header("Location: ".$SN."start.html");
				}
			}
			
			if ($userRightLevel == 2) {
				$arrEventsAllowedForLevel_2 = $objEventsAllowedForLevel->eventsAllowedForLevel_2;
				$arrEventsAllowedForEveryone = $objEventsAllowedForEveryone->eventsAllowedForEveryone;
				$arrEventsAllowed = array_merge($arrEventsAllowedForLevel_2, $arrEventsAllowedForEveryone); 
				if (!in_array($currentEventName, $arrEventsAllowed)) {
					$appSession->unsetSession('User');
					header("Location: ".$SN."start.html");
				}
			}
      }

}
}
?>