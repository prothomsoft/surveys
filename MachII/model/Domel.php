<?php

class model_Domel extends MachII_framework_Listener
{
    function configure() {}
    
    function getContact()
    {
    	$contact = array();
		$contact[0] = "Tomek";
		$contact[1] = "Janek";
		$contact[2] = "Karol";
		$contact[3] = "Stefan";
		        
        return $contact;
    }
}

?>
