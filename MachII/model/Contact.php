<?php

class model_Contact extends MachII_framework_Listener
{
    function configure() {}
    
    function setFieldsForUpdate(&$event)
    {
    	// get data from database simulation
       	$contact = array();
    	$contact['sFirstName'] = "Tomek";
		$contact['sLastName'] = "Prokop";
		$contact['sStreet'] = "Zamkowa";
		$contact['sCity'] = "Dynow";
            	
    	if (!$event->isArgDefined('sFirstName')) {
    		$event->setArg('sFirstName',$contact['sFirstName']);
    	}
    	if (!$event->isArgDefined('sLastName')) {
    		$event->setArg('sLastName',$contact['sLastName']);
    	}
    	if (!$event->isArgDefined('sStreet')) {
    		$event->setArg('sStreet',$contact['sStreet']);
    	}
    	if (!$event->isArgDefined('sCity')) {
    		$event->setArg('sCity',$contact['sCity']);
    	}
    }
    
    function createRecord(&$event)
    {
    	echo 'we do create action to database here';
    }
    
    function updateRecord(&$event)
    {
    	echo 'we do update action to database here';
    }
}

?>
