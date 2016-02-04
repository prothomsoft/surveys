<?require_once(dirname(__FILE__)."/php-export-data.class.php");

$topicExport = "users_export_".date("Y-m-d").".xls";  

$exporter = new ExportDataExcel('browser', $topicExport);

$exporter->initialize(); // starts streaming data to web browser

// pass addRow() an array and it converts it to Excel XML format and sends 
// it to the browser

$arrAllUsers = $event->getArg("arrAllUsers");
if($arrAllUsers) {
    foreach ($arrAllUsers as $objUser) {
        
        
        $UserId = $objUser->getUserId();
        $CreateDate = $objUser->getCreateDate();
        $date = date("Y-m-d ", strtotime($CreateDate));
        $UserEmail = $objUser->getEmail();
        $Phone1 = $objUser->getPhone1();
        $Website1 = $objUser->getWebsite1();
        $Phone2 = $objUser->getPhone2();
        
        $exporter->addRow(array($date, $UserEmail, $Phone1, $Website1, $Phone2)); 
    }
}

$exporter->finalize(); // writes the footer, flushes remaining data to browser.

exit(); // all done
?>