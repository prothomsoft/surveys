<?require_once(dirname(__FILE__)."/php-export-data.class.php");

$topicExport = "topic_".$event->getArg("id1")."_export_".date("Y-m-d").".xls";  

$exporter = new ExportDataExcel('browser', $topicExport);

$exporter->initialize(); // starts streaming data to web browser

// pass addRow() an array and it converts it to Excel XML format and sends 
// it to the browser

$arrTopicMessage = $event->getArg("arrTopicMessage");
if($arrTopicMessage) {
    foreach ($arrTopicMessage as $objTopicMessage) {
        
        
        $UserId = $objTopicMessage->getUserId();
        $UserDao = new UserDao();
        $objUserBean = $UserDao->read($UserId);
        $UserEmail = $objUserBean->getEmail();
        $TopicMessageId = $objTopicMessage->getTopicMessageId();
                
        $TopicId = $objTopicMessage->getTopicId();
        $Message = $objTopicMessage->getMessage();
        
        $Message = str_replace('\'', '\\\'', $Message);
        $CreateDateTime = $objTopicMessage->getCreateDateTime();
        
        $date = date("Y-m-d ", strtotime($CreateDateTime));
        
        $frenchHour = date("H", strtotime($CreateDateTime));
        $frenchMinutes = date("H", strtotime($CreateDateTime));
        
        $time = $frenchHour."h".$frenchMinutes;
        $exporter->addRow(array($date, $time, $UserEmail, $Message)); 
    }
}

$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done
?>