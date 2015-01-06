<?php
require_once("components/session.inc.php");
require_once("components/pagination.inc.php");
require_once("components/clear_url.inc.php");

require_once("UpdateFileGateway.inc.php");
require_once("UpdateFileDao.inc.php");
require_once("UpdateFileBean.inc.php");

class model_UpdateFileListener extends MachII_framework_Listener
{
    function configure() {}
   	
	/* NAVIGATION START */ /* NAVIGATION START */ /* NAVIGATION START */
    
    // get all records from the dataset
    function getQueue(&$event) {
		$objAppSession = new AppSession();
    	$objUpdateFileGateway = new UpdateFileGateway();
    	
    	$arrUpdateFile = $objUpdateFileGateway->findAll();
		$i=1;
		if ($arrUpdateFile['0']) {
			foreach ($arrUpdateFile as $objUpdateFile) {
	       		$arrIds[$i] = $objUpdateFile->getUpdateFileId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	// sets pagination parameters for the dataset
	function getListNavigation(&$event) {
		if (!$event->isArgDefined('page')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('page');
	 	}
      
    	if (!$event->isArgDefined('more')) $more = 0;
    	else $more = 1;
      
     	if (!$event->isArgDefined('less')) $less = 0;
     	else $less = 1;
        
     	$arrQueue = $event->getArg('arrQueue');
		$nProducers = count($arrQueue); 
     	$objPagination = new pagination($nProducers); 
    	$arrPagination = $objPagination->paginate("UpdateFileList",$page,$more,$less);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
    // returns proper dataset limited by pagination parameters
	function getList(&$event){
		$objAppSession = new AppSession();
		$objUpdateFileGateway = new UpdateFileGateway();
    	$arrPagination = $event->getArg('arrPagination');
   	   	$arrUpdateFile = $objUpdateFileGateway->findAll($arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrUpdateFile',$arrUpdateFile);	
	}
	/* NAVIGATION END */ /* NAVIGATION END */ /* NAVIGATION END */
		
	function setUpdateFileUserInSession(&$event)
	{
		$objAppSession = new AppSession();
		if ($event->isArgDefined('userId')) {
			$userId = $event->getArg('userId');
		} else { 
			$userId = $objAppSession->getSession("User")->getUserId();
		}
		
		$objAppSession->setSession("UpdateFileUser",$userId);
	}
	
	function findAll(&$event)
	{
		$objProductProducers = new ProductProducerGateway();
		$arrProductProducerObjs = $objProductProducers->findAll();
		$event->setArg('arrProductProducerObjs',$arrProductProducerObjs);
	}
    
	function findByUpdateCategoryId(&$event)
	{
		$categoryId = $event->getArg('categoryId');
		$objUpdateFileGateway = new UpdateFileGateway();
		$arrUpdateFile = $objUpdateFileGateway->findByCmsCategoryId($categoryId);
      	$event->setArg('arrUpdateFile',$arrUpdateFile);
	}
	
	function findContent(&$event)
	{
		$CatFile = $event->getArg('id1');
		$ItemFile = $event->getArg('id2');
		$objUpdateFileGateway = new UpdateFileGateway();
		$arrUpdateFile = $objUpdateFileGateway->findContent($CatFile,$ItemFile);
      	$event->setArg('arrUpdateFile',$arrUpdateFile);
      	$arrUpdateFilePL = $objUpdateFileGateway->findContentPL($CatFile,$ItemFile);
      	$event->setArg('arrUpdateFilePL',$arrUpdateFilePL);
	}
	
	function findByUpdateFileFreeId(&$event)
	{
		$pageId = $event->getArg('pageId');
		$objUpdateFileGateway = new UpdateFileGateway();
		$arrUpdateFile = $objUpdateFileGateway->findByUpdateFileFreeId($pageId);
      	$event->setArg('arrUpdateFile',$arrUpdateFile);
	}
	
	function findByItemFile(&$event)
	{
		$ItemFile = $event->getArg('ItemFile');
		$objUpdateFileDao = new UpdateFileDao();
		$objUpdateFile = $objUpdateFileDao->readByItemFile($ItemFile);
      	$event->setArg('objUpdateFile',$objUpdateFile);
	}	
}
?>