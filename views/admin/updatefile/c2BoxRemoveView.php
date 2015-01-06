<?php
	require_once("../model/UpdateFileBean.inc.php");
	require_once("../model/UpdateFileDao.inc.php");
	require_once("../model/UpdateFileGateway.inc.php");
	
	$objUpdateFileGateway = new UpdateFileGateway();
	$maxIndex = $objUpdateFileGateway->findMaxIndex();
	$sequence = $maxIndex + 1;
	
	$updateFileId = $event->getArg('UpdateFileId');
	
	$updateFileDaoObj = new UpdateFileDao();
	$updateFileBean = $updateFileDaoObj->read($updateFileId);
	$fileName = $updateFileBean->getDriveName();
	
	
   // Edit upload location here
   $destination_path = getcwd().DIRECTORY_SEPARATOR;
   $delFilePath = $destination_path . $fileName;
   
   if (file_exists($delFilePath)) { unlink ($delFilePath); }
   
   // also remove it from database
   $updateFileDaoObj->delete($updateFileId);
   
   sleep(1);
   header("Location: index.php?event=showUpdateCategoryList&categoryId=".$event->getArg('categoryId')."&categoryName=".$event->getArg('categoryName')."");
?>
