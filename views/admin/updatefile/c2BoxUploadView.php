<?php
	require_once("../model/UpdateFileBean.inc.php");
	require_once("../model/UpdateFileDao.inc.php");
	require_once("../model/UpdateFileGateway.inc.php");
	
	$objUpdateFileGateway = new UpdateFileGateway();
	$maxIndex = $objUpdateFileGateway->findMaxIndex();
	$sequence = $maxIndex + 1;
	
	if ($sequence == 1) {
		$objUpdateFileGateway->findSetIndex();
    }
	
   // Edit upload location here
   $destination_path = getcwd().DIRECTORY_SEPARATOR;
   
    $server = $_SERVER['DOCUMENT_ROOT'];
	$rel_path = str_replace('admin/index.php', '', $_SERVER['PHP_SELF']);
	$destination_path = $server.$rel_path."/dokumenty/";
	//$destination_path = $server.$rel_path."dokumenty/";
	
   $result = 0;
   
   $target_path = $destination_path.basename($_FILES['myfile']['name']);
   
   $target_path_length = strlen($target_path);
   
   $destination = substr($target_path, 0, $target_path_length-4);
   $extension = substr($target_path, $target_path_length-4, 4);
   
   $newTargetPath = $destination."_".$sequence.$extension;
    echo $extension;
    echo "<br/>";
    echo $newTargetPath;
    echo "<br/>";

   if(@move_uploaded_file($_FILES['myfile']['tmp_name'], $newTargetPath)) {
   		
    	$objUpdateFileBean = new UpdateFileBean();
    	
    	// UpdateCategoryId
    	$updateCategoryId = $event->getArg('categoryId');
		$objUpdateFileBean->setUpdateCategoryId($updateCategoryId);
		
		// DriveName
		$fileName = basename($_FILES['myfile']['name']);
		$fileNameLength = strlen($fileName);
		$base = substr($fileName, 0, $fileNameLength-4);
   		$extension = substr($fileName, $fileNameLength-4, 4);
		$driveName = $base."_".$sequence.$extension;
		$objUpdateFileBean->setDriveName($driveName);
				
		// FileName
		$fileName = $event->getArg('FileName');
		$objUpdateFileBean->setFileName($fileName);
		
		// FileDescription
		$fileDescription = $event->getArg('FileDescription');
		$objUpdateFileBean->setFileDescription($fileDescription);
		
		// FileType
		$fileType = substr($extension, 1, strlen($extension)-1);
		$objUpdateFileBean->setFileType($fileType);
		
		// ShortContent
		$shortContent = $event->getArg('ShortContent');
		$objUpdateFileBean->setShortContent($shortContent);
		
		// LongContent
		$longContent = $event->getArg('LongContent');
		$objUpdateFileBean->setLongContent($longContent);
		
		// CreateDate
		$createDate = date('Y-m-d');
    	$objUpdateFileBean->setCreateDate($createDate);
		
		// UpdateDate
		$updateDate = date('Y-m-d');
		$objUpdateFileBean->setUpdateDate($updateDate);
				    	
		$objUpdateFileDao = new UpdateFileDao();
		$objUpdateFileDao->create($objUpdateFileBean);
   		 
      	$result = 1;
   }
   
   sleep(1);
   header("Location: index.php?event=showUpdateCategoryList&categoryId=".$event->getArg('categoryId')."&categoryName=".$event->getArg('categoryName')."");
?>
