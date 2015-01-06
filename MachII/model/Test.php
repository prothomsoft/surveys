<?php

class model_Test extends MachII_framework_Listener
{
    function configure() {}
    
    function getVersion()
    {
        $versionNo = MachII::version();
        
        return $versionNo;
    }
}

?>
