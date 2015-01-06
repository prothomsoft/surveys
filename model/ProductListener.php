<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");
require_once("components/pagination.inc.php");

require_once("ProductGateway.inc.php");
require_once("ProductDao.inc.php");
require_once("ProductBean.inc.php");

require_once("BetaDao.inc.php");
require_once("BetaBean.inc.php");

require_once("ProductCategoryDao.inc.php");
require_once("ProductCategoryGateway.inc.php");

require_once("ProductPictureGateway.inc.php");
require_once("ProductPictureDao.inc.php");
require_once("ProductPictureBean.inc.php");

class model_ProductListener extends MachII_framework_Listener
{
    function configure() {}
    
    function getTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('ProductId', 'ImgDriveName' , 'Name', 'SeoName', 'ProductCategoryLevelOneName', 'ProductCategoryLevelOneSeoName', 'ProductCategoryLevelTwoName', 'ProductCategoryLevelTwoSeoName', 'Price', 'PriceOld' , 'UpdateDate', 'ProductOrder','IsAvailable', 'IsVisible', 'ProducerName','ShortDescription','ProductType');
		$sIndexColumn = "ProductId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// ordering
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sOrder = "";
		if (isset($iSortCol_0)) {
			$sOrder = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sOrder .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sOrder = substr_replace($sOrder, "", -2);
		}
		
		// filtering by category
		$productCategorySeoName = $event->getArg("productCategorySeoName");
		$sWhere = "";
		
		if ($productCategorySeoName != "\'all\'")	{
		// before upload if ($productCategorySeoName != "\'all\'")	{ 
			$sWhere = "WHERE ";
			$sWhere .= "(ProductCategoryLevelTwoSeoName IN (".stripslashes($productCategorySeoName).") ";
			$sWhere .= " OR ProductCategoryLevelOneSeoName IN (".stripslashes($productCategorySeoName).")) ";
			$sWhere .= " AND IsVisible = 1 ";
		} else {
			$sWhere = "WHERE IsVisible = 1 ";
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Product
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = $DB->query($sQuery);
		
		// data set length after filtering
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $DB->query($sQuery);
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
				
		// total data set length
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   Product
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];

		$sEcho = $event->getArg("sEcho");
		$responseJSON = '{';
		$responseJSON .= '"sEcho": '.intval($sEcho).', ';
		$responseJSON .= '"iTotalRecords": '.$iTotal.', ';
		$responseJSON .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$responseJSON .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$responseJSON .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				$ProductId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$ProductCategoryLevelOneName = $aRow[4];
				$ProductCategoryLevelOneSeoName = $aRow[5];
				$ProductCategoryLevelTwoName = $aRow[6];
				$ProductCategoryLevelTwoSeoName = $aRow[7];
				$Price = $aRow[8];
				$PriceOld = $aRow[9];
				$UpdateDate = $aRow[10];
				$ProductOrder = $aRow[11];
				$isAvailable = $aRow[12];
				$isVisible = $aRow[13];
				$ProducerName = $aRow[14];
				$ShortDescription = $aRow[15];
				$ProductType = $aRow[16];
				
				$urlExtension = "";
				if($ProductCategoryLevelTwoSeoName != "") {
					$urlExtension = "".$ProductCategoryLevelOneSeoName."/".$ProductCategoryLevelTwoSeoName;
					$productCategoryName = $ProductCategoryLevelTwoName; 
				} else {
					$urlExtension = "".$ProductCategoryLevelOneSeoName;
					$productCategoryName = $ProductCategoryLevelOneName;
				}
				
				if ( $aColumns[$i] == "ImgDriveName" ) {
					$responseJSON .= '"<p style=\"height:200px;\"><a title=\"'.$ProductType.'\" href=\"'.$SN.'produkt/'.$SeoName.'/'.$ProductId.'.html\"><img src=\"'.$SN.'/upload/thumb/'.$ImgDriveName.'\" alt=\"'.$Name.'\"></a></p>",';
				} else if ($aColumns[$i] == "Name"){
					$responseJSON .= '"<strong>'.str_replace('"', '\"',$Name).'</strong> <br/><br/> '.str_replace('"', '\"', $productCategoryName).'<br/>'.str_replace('"', '\"',$ProducerName).'<br/><br/><span style=\"font-size:10px;\">'.str_replace('"', '\"',$ShortDescription).'</span>",';
				} else if ($aColumns[$i] == "Price"){
					if ($PriceOld != 0) {
						$responseJSON .= '"<strong><font color=\"#C8447C\"><strike>'.$PriceOld.' PLN </strike></font></strong><br/><strong><font color=\"#66B000\">'.$Price.' PLN </font></strong><br/><br/>';
					} else {
						$responseJSON .= '"<strong><font color=\"#C8447C\">'.$Price.' PLN </font></strong><br/><br/>';
					}
					
					
				
					if($isAvailable == 1) {
						$responseJSON .= '<a title=\"Do koszyka\" href=\"'.$SN.'executeAddShoppingCartAction/'.$urlExtension.'/'.$ProductId.'.html\"><img src=\"'.$SN.'images/button_bg_green_70.png\" /></a><br/><br/>';
					} else {
						$responseJSON .= '<img src=\"'.$SN.'images/button_bg_green_70_grey.png\" /><br/><br/>';
					}
					
					$responseJSON .= '<a title=\"'.$ProductType.'\" href=\"'.$SN.'produkt/'.$SeoName.'/'.$ProductId.'.html\"><img src=\"'.$SN.'images/button_bg_pink_70.png\" /></a><br/><br/>",';
					
					
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showProductStep1&productId='.$aRow[0].'\">Edit</a>';
			$responseJSON .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveProductAction&productId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getSearchTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('ProductId', 'ImgDriveName' , 'Name', 'SeoName', 'ProductCategoryLevelOneName', 'ProductCategoryLevelOneSeoName', 'ProductCategoryLevelTwoName', 'ProductCategoryLevelTwoSeoName', 'Price', 'PriceOld' , 'UpdateDate', 'ProductOrder','IsAvailable', 'IsVisible', 'ProducerName');
		$sIndexColumn = "ProductId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// ordering
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sOrder = "";
		if (isset($iSortCol_0)) {
			$sOrder = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sOrder .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sOrder = substr_replace($sOrder, "", -2);
		}
		
		// filtering by searchType and searchKeyword
		$searchType = $event->getArg("searchType");
		$searchKeyword = $event->getArg("searchKeyword");
		$sWhere = "";
		
		if ($searchType == "product" && $searchKeyword != "")	{
			$sWhere = "WHERE ";
			$sWhere .= "Name like '%".stripslashes($searchKeyword)."%' ";
			$sWhere .= " AND IsVisible = 1";
		} else if ($searchType == "producer" && $searchKeyword != "")	{
			$sWhere = "WHERE ";
			$sWhere .= "ProducerName like '%".stripslashes($searchKeyword)."%' ";
			$sWhere .= " AND IsVisible = 1";
		} else {
			$sWhere = "WHERE IsVisible = 1";
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Product
			$sWhere
			$sOrder
			$sLimit
		";
		$rResult = $DB->query($sQuery);
		
		// data set length after filtering
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $DB->query($sQuery);
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
				
		// total data set length
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   Product
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];

		$sEcho = $event->getArg("sEcho");
		$responseJSON = '{';
		$responseJSON .= '"sEcho": '.intval($sEcho).', ';
		$responseJSON .= '"iTotalRecords": '.$iTotal.', ';
		$responseJSON .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$responseJSON .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$responseJSON .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				$ProductId = $aRow[0];
				$ImgDriveName = $aRow[1];
				$Name = $aRow[2];
				$SeoName = $aRow[3];
				$ProductCategoryLevelOneName = $aRow[4];
				$ProductCategoryLevelOneSeoName = $aRow[5];
				$ProductCategoryLevelTwoName = $aRow[6];
				$ProductCategoryLevelTwoSeoName = $aRow[7];
				$Price = $aRow[8];
				$PriceOld = $aRow[9];
				$UpdateDate = $aRow[10];
				$ProductOrder = $aRow[11];
				$isAvailable = $aRow[12];
				$isVisible = $aRow[13];
				$ProducerName = $aRow[14];
				
				$urlExtension = "";
				if($ProductCategoryLevelTwoSeoName != "") {
					$urlExtension = "".$ProductCategoryLevelOneSeoName."/".$ProductCategoryLevelTwoSeoName;
					$productCategoryName = $ProductCategoryLevelTwoName;
				} else {
					$urlExtension = "".$ProductCategoryLevelOneSeoName;
					$productCategoryName = $ProductCategoryLevelOneName;
				}
				
				if ( $aColumns[$i] == "ImgDriveName" ) {
					$responseJSON .= '"<p style=\"height:200px;\"><a href=\"'.$SN.'produkt/'.$SeoName.'/'.$ProductId.'.html\"><img src=\"'.$SN.'/upload/thumb/'.$ImgDriveName.'\"></a></p>",';
				} else if ($aColumns[$i] == "Name"){
					$responseJSON .= '"<strong>'.str_replace('"', '\"',$Name).'</strong> <br/><br/> '.str_replace('"', '\"', $productCategoryName).'<br/><br/>'.str_replace('"', '\"',$ProducerName).'",';
				} else if ($aColumns[$i] == "Price"){
					if ($PriceOld != 0) {
						$responseJSON .= '"<strong><font color=\"#C8447C\"><strike>'.$PriceOld.' PLN </strike></font></strong>&nbsp;&nbsp;&nbsp;<strong><font color=\"#66B000\">'.$Price.' PLN </font></strong><br/><br/>';
					} else {
						$responseJSON .= '"<strong><font color=\"#C8447C\">'.$Price.' PLN </font></strong><br/><br/>';
					}
					$responseJSON .= '<a href=\"'.$SN.'produkt/'.$SeoName.'/'.$ProductId.'.html\"><img src=\"'.$SN.'images/button_bg_pink_70.png\" /></a>&nbsp;';
					if($isAvailable == 1) {
						$responseJSON .= '<a href=\"'.$SN.'executeAddShoppingCartAction/'.$urlExtension.'/'.$ProductId.'.html\"><img src=\"'.$SN.'images/button_bg_green_70.png\" /></a>&nbsp;",';
					} else {
						$responseJSON .= '<img src=\"'.$SN.'images/button_bg_green_70_grey.png\" />&nbsp;",';
					}
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showProductStep1&productId='.$aRow[0].'\">Edit</a>';
			$responseJSON .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveProductAction&productId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
			
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
	
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('ProductId', 'ImgDriveName' , 'Name', 'BetaId', 'Price', 'UpdateDate', 'ProductOrder');
		$sIndexColumn = "ProductId";
		
		// paging
		$iDisplayStart = $event->getArg("iDisplayStart");
		$iDisplayLength = $event->getArg("iDisplayLength");
		$sLimit = "";
		if (isset($iDisplayStart) && $iDisplayLength != '-1') {
			$sLimit = "LIMIT ".mysql_real_escape_string($iDisplayStart).", ".mysql_real_escape_string($iDisplayLength);			
		}
		
		// ordering
		$iSortCol_0 = $event->getArg("iSortCol_0");
		$iSortingCols = $event->getArg("iSortingCols");
		$sOrder = "";
		if (isset($iSortCol_0)) {
			$sOrder = "ORDER BY ";
			for ($i=0; $i<intval($iSortingCols); $i++) {
				$sOrder .= $aColumns[intval($event->getArg("iSortCol_".$i))]." ".mysql_real_escape_string($event->getArg("sSortDir_".$i)) .", ";
			}
			$sOrder = substr_replace($sOrder, "", -2);
		}
		
		// filtering by category
		$productCategorySeoName = $event->getArg("productCategorySeoName");
		$sWhere = "";
		
		
		
		//if($SN == "127.0.0.1/musikkgaver/") {
//			$all = stripslashes("\'all\'");
		//} else {
			//$all = "\'all\'";
		//}
		
		//if ($productCategorySeoName != $all)	{
		// if ($productCategorySeoName != "\'all\'")	{
			
		//}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Product
			$sWhere
			$sOrder
			$sLimit
		";
		
		$rResult = $DB->query($sQuery);
		
		// data set length after filtering
		$sQuery = "
			SELECT FOUND_ROWS()
		";
		$rResultFilterTotal = $DB->query($sQuery);
		$aResultFilterTotal = mysql_fetch_array($rResultFilterTotal);
		$iFilteredTotal = $aResultFilterTotal[0];
				
		// total data set length
		$sQuery = "
			SELECT COUNT(".$sIndexColumn.")
			FROM   Product
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];

		$sEcho = $event->getArg("sEcho");
		$responseJSON = '{';
		$responseJSON .= '"sEcho": '.intval($sEcho).', ';
		$responseJSON .= '"iTotalRecords": '.$iTotal.', ';
		$responseJSON .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$responseJSON .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$responseJSON .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				
				if ( $aColumns[$i] == "ImgDriveName" ) {
					
					$responseJSON .= '"<img src=\"'.$SN.'/upload/micro/'.$aRow[$aColumns[$i]].'\">",';
				} else if ($aColumns[$i] == "Price"){
					$responseJSON .= '"'.$aRow[ $aColumns[$i] ].' PLN",';
				} else if ($aColumns[$i] == "BetaId"){
					$betaId = $aRow[ $aColumns[$i] ];
					$objBetaDao = new BetaDao();
					$objBetaBean = $objBetaDao->read($betaId);
					$responseJSON .= '"'.$objBetaBean->getName().'",';
					
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showProductStep1&productId='.$aRow[0].'\">Edit</a>';
			$responseJSON .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveProductAction&productId='.$aRow[0].'\" onclick=\"return confirm(\'Are you sure you want to remove this record?\')\">Remove</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$productId = $event->getArg('productId');
   		$objProductBean = new ProductBean();
		$objProductDao = new ProductDao();
		
		if ($productId == "") {
			// we need to create empty ProductId
			$productId = $objProductDao->create($objProductBean);
			$event->setArg('productId', $productId);	
		}
		
		$objProductBean = $objProductDao->read($productId);
		
		$today = date("Y-m-d");
      	$objProductBean->setUpdateDate($today);
      	
      	if($objProductBean->getCreationDate() == "0000-00-00") {
      		$objProductBean->setCreationDate($today);
      	}
		
		// WIZARD STEP 1 ---------->
		// ProductCategoryId ---------->
		if($event->isArgDefined('ProductCategoryId') && $event->getArg('ProductCategoryId') != "") {
			$productCategoryId = $event->getArg('ProductCategoryId');
			$objProductBean->setProductCategoryId($productCategoryId);
			$objProductCategoryDao = new ProductCategoryDao();
			$objProductCategory = $objProductCategoryDao->read($productCategoryId);
			$productCategoryFatherId = $objProductCategory->getFatherId();
			if($productCategoryFatherId == 0) { // means that it is father category
				$productCategoryLevelOneName = $objProductCategory->getName();
				$objProductBean->setProductCategoryLevelOneName($productCategoryLevelOneName);
				$objClearUrl = new ClearUrl($productCategoryLevelOneName);
				$objProductBean->setProductCategoryLevelOneSeoName($objClearUrl->clear());
			} else {
				// get father categoryName
				$objProductFatherCategory = $objProductCategoryDao->read($productCategoryFatherId);
				$productCategoryLevelOneName = $objProductFatherCategory->getName();
				$objProductBean->setProductCategoryLevelOneName($productCategoryLevelOneName);
				$objClearUrl = new ClearUrl($productCategoryLevelOneName);
				$objProductBean->setProductCategoryLevelOneSeoName($objClearUrl->clear());
				// get child categoryName
				$objProductCategory = $objProductCategoryDao->read($productCategoryId);
				$productCategoryLevelTwoName = $objProductCategory->getName();
				$objProductBean->setProductCategoryLevelTwoName($productCategoryLevelTwoName);
				$objClearUrl = new ClearUrl($productCategoryLevelTwoName);
				$objProductBean->setProductCategoryLevelTwoSeoName($objClearUrl->clear());
			}
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductCategoryId') && $event->getArg('ProductCategoryId') == "") {
			$productCategoryId = "";
			$objProductBean->setProductCategoryId($productCategoryId);
			$productCategoryLevelOneName = "";
			$objProductBean->setProductCategoryLevelOneName($productCategoryLevelOneName);
			$objProductBean->setProductCategoryLevelOneSeoName($productCategoryLevelOneName);
			$productCategoryLevelTwoName = "";
			$objProductBean->setProductCategoryLevelTwoName($productCategoryLevelTwoName);
			$objProductBean->setProductCategoryLevelTwoSeoName($productCategoryLevelTwoName);			
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductCategoryId() != "") {
			$productCategoryId = $objProductBean->getProductCategoryId(); 
			$event->setArg('ProductCategoryId', $productCategoryId);
		}
		
		
		// WIZARD STEP 2 ---------->
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objProductBean->setSeoName($objClearUrl->clear());
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objProductBean->setName($name);
			$objProductBean->setSeoName($name);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getName() != "") {
			$name = $objProductBean->getName();
			$event->setArg('Name', $name);
		}
		
		// ExtName ---------->
		if($event->isArgDefined('ExtName') && $event->getArg('ExtName') != "") {
			$extName = htmlspecialchars(trim($event->getArg('ExtName')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setExtName($extName);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ExtName') && $event->getArg('ExtName') == "") {
			$extName = "";
			$objProductBean->setExtName($extName);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getExtName() != "") {
			$extName = $objProductBean->getExtName();
			$event->setArg('ExtName', $extName);
		}
		
		// BetaId ---------->
		if($event->isArgDefined('BetaId') && $event->getArg('BetaId') != "") {
			$betaId = htmlspecialchars(trim($event->getArg('BetaId')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setBetaId($betaId);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('BetaId') && $event->getArg('BetaId') == "") {
			$betaId = "";
			$objProductBean->setBetaId($betaId);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getBetaId() != "") {
			$betaId = $objProductBean->getBetaId();
			$event->setArg('BetaId', $betaId);
		}
		
		// Code ---------->
		if($event->isArgDefined('Code') && $event->getArg('Code') != "") {
			$code = htmlspecialchars(trim($event->getArg('Code')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setCode($code);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Code') && $event->getArg('Code') == "") {
			$code = "";
			$objProductBean->setCode($code);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getCode() != "") {
			$code = $objProductBean->getCode();
			$event->setArg('Code', $code);
		}
		
		// ProducerName ---------->
		if($event->isArgDefined('ProducerName') && $event->getArg('ProducerName') != "") {
			$producerName = htmlspecialchars(trim($event->getArg('ProducerName')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setProducerName($producerName);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProducerName') && $event->getArg('ProducerName') == "") {
			$producer = "";
			$objProductBean->setProducerName($producerName);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProducerName() != "") {
			$producerName = $objProductBean->getProducerName();
			$event->setArg('ProducerName', $producerName);
		}
		
		// Price ---------->
		if($event->isArgDefined('Price') && $event->getArg('Price') != "") {
			$Price = $event->getArg('Price');
			$objProductBean->setPrice($Price);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Price') && $event->getArg('Price') == "") {
			$Price = "";
			$objProductBean->setPrice($Price);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getPrice() != "") {
			$Price = $objProductBean->getPrice(); 
			$event->setArg('Price', $Price);
		}
		
		// PriceOld ---------->
		if($event->isArgDefined('PriceOld') && $event->getArg('PriceOld') != "") {
			$PriceOld = $event->getArg('PriceOld');
			$objProductBean->setPriceOld($PriceOld);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('PriceOld') && $event->getArg('PriceOld') == "") {
			$PriceOld = "";
			$objProductBean->setPriceOld($PriceOld);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getPriceOld() != "") {
			$PriceOld = $objProductBean->getPriceOld(); 
			$event->setArg('PriceOld', $PriceOld);
		}
		
		// Weight ---------->
		if($event->isArgDefined('Weight') && $event->getArg('Weight') != "") {
			$Weight = $event->getArg('Weight');
			$objProductBean->setWeight($Weight);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Weight') && $event->getArg('Weight') == "") {
			$Weight = "";
			$objProductBean->setWeight($Weight);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getWeight() != "") {
			$Weight = $objProductBean->getWeight(); 
			$event->setArg('Weight', $Weight);
		}
		
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$shortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setShortDescription($shortDescription);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objProductBean->setShortDescription($ShortDescription);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getShortDescription() != "") {
			$ShortDescription = $objProductBean->getShortDescription(); 
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setLongDescription($longDescription);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objProductBean->setLongDescription($LongDescription);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getLongDescription() != "") {
			$LongDescription = $objProductBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// HDescription ---------->
		if($event->isArgDefined('HDescription') && $event->getArg('HDescription') != "") {
			$hDescription = htmlspecialchars(trim($event->getArg('HDescription')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setHDescription($hDescription);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('HDescription') && $event->getArg('HDescription') == "") {
			$HDescription = "";
			$objProductBean->setHDescription($HDescription);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getHDescription() != "") {
			$HDescription = $objProductBean->getHDescription(); 
			$event->setArg('HDescription', $HDescription);
		}
		
		// ContactDescription ---------->
		if($event->isArgDefined('ContactDescription') && $event->getArg('ContactDescription') != "") {
			$contactDescription = htmlspecialchars(trim($event->getArg('ContactDescription')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setContactDescription($contactDescription);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ContactDescription') && $event->getArg('ContactDescription') == "") {
			$ContactDescription = "";
			$objProductBean->setContactDescription($ContactDescription);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getContactDescription() != "") {
			$ContactDescription = $objProductBean->getContactDescription(); 
			$event->setArg('ContactDescription', $ContactDescription);
		}
		
		// PreviewDescription ---------->
		if($event->isArgDefined('PreviewDescription') && $event->getArg('PreviewDescription') != "") {
			$previewDescription = htmlspecialchars(trim($event->getArg('PreviewDescription')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setPreviewDescription($previewDescription);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('PreviewDescription') && $event->getArg('PreviewDescription') == "") {
			$PreviewDescription = "";
			$objProductBean->setPreviewDescription($PreviewDescription);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getPreviewDescription() != "") {
			$PreviewDescription = $objProductBean->getPreviewDescription(); 
			$event->setArg('PreviewDescription', $PreviewDescription);
		}
		
		// ProductOrder ---------->
		if($event->isArgDefined('ProductOrder') && $event->getArg('ProductOrder') != "") {
			$ProductOrder = $event->getArg('ProductOrder');
			$objProductBean->setProductOrder($ProductOrder);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductOrder') && $event->getArg('ProductOrder') == "") {
			$ProductOrder = "0";
			$objProductBean->setProductOrder($ProductOrder);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductOrder() != "") {
			$ProductOrder = $objProductBean->getProductOrder(); 
			$event->setArg('ProductOrder', $ProductOrder);
		}
		
		// HomeProductOrder ---------->
		if($event->isArgDefined('HomeProductOrder') && $event->getArg('HomeProductOrder') != "") {
			$HomeProductOrder = $event->getArg('HomeProductOrder');
			$objProductBean->setHomeProductOrder($HomeProductOrder);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('HomeProductOrder') && $event->getArg('HomeProductOrder') == "") {
			$HomeProductOrder = "0";
			$objProductBean->setHomeProductOrder($HomeProductOrder);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getHomeProductOrder() != "") {
			$HomeProductOrder = $objProductBean->getHomeProductOrder(); 
			$event->setArg('HomeProductOrder', $HomeProductOrder);
		}
		
		// IsHomeProduct ---------->
		if($event->isArgDefined('IsHomeProduct') && $event->getArg('IsHomeProduct') != "") {
			$IsHomeProduct = $event->getArg('IsHomeProduct');
			$objProductBean->setIsHomeProduct($IsHomeProduct);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('IsHomeProduct') && $event->getArg('IsHomeProduct') == "") {
			$IsHomeProduct = "0";
			$objProductBean->setIsHomeProduct($IsHomeProduct);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getIsHomeProduct() != "") {
			$IsHomeProduct = $objProductBean->getIsHomeProduct(); 
			$event->setArg('IsHomeProduct', $IsHomeProduct);
		}
		
		// IsBestProduct ---------->
		if($event->isArgDefined('IsBestProduct') && $event->getArg('IsBestProduct') != "") {
			$IsBestProduct = $event->getArg('IsBestProduct');
			$objProductBean->setIsBestProduct($IsBestProduct);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('IsBestProduct') && $event->getArg('IsBestProduct') == "") {
			$IsBestProduct = "0";
			$objProductBean->setIsBestProduct($IsBestProduct);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getIsBestProduct() != "") {
			$IsBestProduct = $objProductBean->getIsBestProduct(); 
			$event->setArg('IsBestProduct', $IsBestProduct);
		}
		
		// IsAvailable ---------->
		if($event->isArgDefined('IsAvailable') && $event->getArg('IsAvailable') != "") {
			$IsAvailable = $event->getArg('IsAvailable');
			$objProductBean->setIsAvailable($IsAvailable);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('IsAvailable') && $event->getArg('IsAvailable') == "") {
			$IsAvailable = "0";
			$objProductBean->setIsAvailable($IsAvailable);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getIsAvailable() != "") {
			$IsAvailable = $objProductBean->getIsAvailable(); 
			$event->setArg('IsAvailable', $IsAvailable);
		}
		
		// IsVisible ---------->
		if($event->isArgDefined('IsVisible') && $event->getArg('IsVisible') != "") {
			$IsVisible = $event->getArg('IsVisible');
			$objProductBean->setIsVisible($IsVisible);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('IsVisible') && $event->getArg('IsVisible') == "") {
			$IsVisible = "0";
			$objProductBean->setIsVisible($IsVisible);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getIsVisible() != "") {
			$IsVisible = $objProductBean->getIsVisible(); 
			$event->setArg('IsVisible', $IsVisible);
		}
		
		// ProductIdLink1 ---------->
		if($event->isArgDefined('ProductIdLink1') && $event->getArg('ProductIdLink1') != "") {
			$ProductIdLink1 = $event->getArg('ProductIdLink1');
			$objProductBean->setProductIdLink1($ProductIdLink1);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductIdLink1') && $event->getArg('ProductIdLink1') == "") {
			$ProductIdLink1 = "0";
			$objProductBean->setProductIdLink1($ProductIdLink1);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductIdLink1() != "") {
			$ProductIdLink1 = $objProductBean->getProductIdLink1(); 
			$event->setArg('ProductIdLink1', $ProductIdLink1);
		}
		
		// ProductIdLink2 ---------->
		if($event->isArgDefined('ProductIdLink2') && $event->getArg('ProductIdLink2') != "") {
			$ProductIdLink2 = $event->getArg('ProductIdLink2');
			$objProductBean->setProductIdLink2($ProductIdLink2);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductIdLink2') && $event->getArg('ProductIdLink2') == "") {
			$ProductIdLink2 = "0";
			$objProductBean->setProductIdLink2($ProductIdLink2);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductIdLink2() != "") {
			$ProductIdLink2 = $objProductBean->getProductIdLink2(); 
			$event->setArg('ProductIdLink2', $ProductIdLink2);
		}
		
		// ProductIdLink3 ---------->
		if($event->isArgDefined('ProductIdLink3') && $event->getArg('ProductIdLink3') != "") {
			$ProductIdLink3 = $event->getArg('ProductIdLink3');
			$objProductBean->setProductIdLink3($ProductIdLink3);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductIdLink3') && $event->getArg('ProductIdLink3') == "") {
			$ProductIdLink3 = "0";
			$objProductBean->setProductIdLink3($ProductIdLink3);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductIdLink3() != "") {
			$ProductIdLink3 = $objProductBean->getProductIdLink3(); 
			$event->setArg('ProductIdLink3', $ProductIdLink3);
		}
		
		// ProductIdLink4 ---------->
		if($event->isArgDefined('ProductIdLink4') && $event->getArg('ProductIdLink4') != "") {
			$ProductIdLink4 = $event->getArg('ProductIdLink4');
			$objProductBean->setProductIdLink4($ProductIdLink4);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductIdLink4') && $event->getArg('ProductIdLink4') == "") {
			$ProductIdLink4 = "0";
			$objProductBean->setProductIdLink4($ProductIdLink4);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductIdLink4() != "") {
			$ProductIdLink4 = $objProductBean->getProductIdLink4(); 
			$event->setArg('ProductIdLink4', $ProductIdLink4);
		}
		
		// ProductIdLink5 ---------->
		if($event->isArgDefined('ProductIdLink5') && $event->getArg('ProductIdLink5') != "") {
			$ProductIdLink5 = $event->getArg('ProductIdLink5');
			$objProductBean->setProductIdLink5($ProductIdLink5);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductIdLink5') && $event->getArg('ProductIdLink5') == "") {
			$ProductIdLink5 = "0";
			$objProductBean->setProductIdLink5($ProductIdLink5);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductIdLink5() != "") {
			$ProductIdLink5 = $objProductBean->getProductIdLink5(); 
			$event->setArg('ProductIdLink5', $ProductIdLink5);
		}
		
		// InStock ---------->
		if($event->isArgDefined('InStock') && $event->getArg('InStock') != "") {
			$InStock = htmlspecialchars(trim($event->getArg('InStock')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setInStock($InStock);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('InStock') && $event->getArg('InStock') == "") {
			$InStock = "0";
			$objProductBean->setInStock($InStock);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getInStock() != "") {
			$InStock = $objProductBean->getInStock(); 
			$event->setArg('InStock', $InStock);
		}
		
		// Delivery ---------->
		if($event->isArgDefined('Delivery') && $event->getArg('Delivery') != "") {
			$delivery = htmlspecialchars(trim($event->getArg('Delivery')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setDelivery($delivery);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Delivery') && $event->getArg('Delivery') == "") {
			$Delivery = "0";
			$objProductBean->setDelivery($Delivery);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getDelivery() != "") {
			$Delivery = $objProductBean->getDelivery(); 
			$event->setArg('Delivery', $Delivery);
		}
		
		// Points ---------->
		if($event->isArgDefined('Points') && $event->getArg('Points') != "") {
			$Points = htmlspecialchars(trim($event->getArg('Points')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setPoints($Points);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('Points') && $event->getArg('Points') == "") {
			$Points = "0";
			$objProductBean->setPoints($Points);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getPoints() != "") {
			$Points = $objProductBean->getPoints(); 
			$event->setArg('Points', $Points);
		}
		
		// PointsMinus ---------->
		if($event->isArgDefined('PointsMinus') && $event->getArg('PointsMinus') != "") {
			$PointsMinus = htmlspecialchars(trim($event->getArg('PointsMinus')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setPointsMinus($PointsMinus);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('PointsMinus') && $event->getArg('PointsMinus') == "") {
			$PointsMinus = "0";
			$objProductBean->setPointsMinus($PointsMinus);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getPointsMinus() != "") {
			$PointsMinus = $objProductBean->getPointsMinus(); 
			$event->setArg('PointsMinus', $PointsMinus);
		}
		// ProductType ---------->
		if($event->isArgDefined('ProductType') && $event->getArg('ProductType') != "") {
			$ProductType = htmlspecialchars(trim($event->getArg('ProductType')), ENT_QUOTES,'UTF-8',true);
			$objProductBean->setProductType($ProductType);
			$objProductDao->update($objProductBean);						
		}
		if($event->isArgDefined('ProductType') && $event->getArg('ProductType') == "") {
			$ProductType = "0";
			$objProductBean->setProductType($ProductType);
			$objProductDao->update($objProductBean);
		}
		if($objProductBean->getProductType() != "") {
			$ProductType = $objProductBean->getProductType(); 
			$event->setArg('ProductType', $ProductType);
		}		
   }
   
   function removeRecord(&$event) {
    	$productId = $event->getArg('productId');
    	
		$objProductDao = new ProductDao();
		$objProductBean = new ProductBean();
		$objProductBean = $objProductDao->delete($productId);    	    	    
    }
    
    function copyRecord(&$event) {
    	$productId = $event->getArg('productId');
    	
		$objProductDao = new ProductDao();
		$objProductBean = new ProductBean();
		$objProductBean = $objProductDao->read($productId);
		
		$maxProductOrder = $event->getArg("maxProductOrder");
		
		$objProductBean->setProductOrder($maxProductOrder + 1);
		$objProductBean->setImgDriveName("");
		
		$objProductDao->create($objProductBean);		    	    	    
    }
    
    function getMaxProductOrder(&$event) {
    	$objProductGateway = new ProductGateway();
    	$maxProductOrder = $objProductGateway->getMaxProductOrder();
    	$event->setArg('maxProductOrder',$maxProductOrder);
    }
    
    
    function findByName(&$event) {
		$name = $event->getArg('name');
		$maxRows = $event->getArg('maxRows');
		
		$objProductGateway = new ProductGateway();
		$responseJSON = $objProductGateway->findByName($name, $maxRows);
		$event->setArg("responseJSON", $responseJSON);
	}
	
	function findAll(&$event) {
		$objProductGateway = new ProductGateway();
		$arrProducts = $objProductGateway->findAll();
		$event->setArg("arrProducts", $arrProducts);
	}
	
	function findSearchAll(&$event) {
		$keyword = $event->getArg("keyword");
		$objProductGateway = new ProductGateway();
		$arrProducts = $objProductGateway->findSearchAll($keyword);
		$event->setArg("arrProducts", $arrProducts);
	}
	
	function findAllHomePage(&$event) {
		$objProductGateway = new ProductGateway();
		$arrProducts = $objProductGateway->findAllHomePage();
		$event->setArg("arrProducts", $arrProducts);
	}
	
	function findAllByCategorySeoName(&$event) {
	
		if($event->getArg("id1") != "" and $event->getArg("id2") != "") {
			$productCategorySeoName = "'".$event->getArg("id2")."'";
		} elseif ($event->getArg("id1") != "" and $event->getArg("id2") == "") {
			
			// get all subcategories for this father category
			$productCategorySeoName = $event->getArg("id1");
			$objProductCategoryDao = new ProductCategoryDao();
			$objProductCategory = $objProductCategoryDao->readBySeoName($productCategorySeoName);
			
			// father categoryId
			$productCategoryId = $objProductCategory->getProductCategoryId();
			$objProductCategoryGateway = new ProductCategoryGateway();
			$arrProductCategory = $objProductCategoryGateway->findByFatherId($productCategoryId);
			
			if($arrProductCategory) {
				$inClause = "";
				foreach($arrProductCategory as $objProductCategory) {
					$inClause .= "'".$objProductCategory->getSeoName()."',";
				}
			}
			$inClause = substr_replace($inClause, "", -1);
			
			if($inClause != "") {
				$productCategorySeoName = $inClause;
			} else {
				$productCategorySeoName = "'".$event->getArg("id1")."'";
			}
			
		} else {
			$productCategorySeoName = "'all'";
		}
		
		$objProductGateway = new ProductGateway();
		$arrProducts = $objProductGateway->findAllByCategorySeoName($productCategorySeoName);
		$event->setArg("arrProducts", $arrProducts);
		
	}
	
	function findByListId(&$event)
    {
    	$listId = $event->getArg('listId');
    	
    	if($listId != "") {
    		$objProductGateway = new ProductGateway();
    		$arrProduct = $objProductGateway->findByListId($listId);
    	}
    	
    	if($arrProduct != null) {
    		$event->setArg('arrProduct',$arrProduct);
    	}
    }
    
    function findById(&$event) {
    	$productId = $event->getArg("id2");
    	
    	if($productId != "") {
    		$objProductDao = new ProductDao();
    		$objProduct = $objProductDao->read($productId);
    	}
    	
    	$event->setArg('objProduct',$objProduct);
    }
    
    function findAllBySubCategory(&$event) {
    	
    	//id2 jest zawsze ID produktu
    	
    	
    	// first level category
    	$productId = $event->getArg("id2");
    	
    	$objProductDao = new ProductDao();
    	$objProduct = $objProductDao->read($productId);
    	$productCategoryId = $objProduct->getProductCategoryId();
    	
    	// get father category for this product
    	$objProductCategoryDao = new ProductCategoryDao();
    	$objProductCategory = $objProductCategoryDao->read($productCategoryId);
    	$fatherCategoryId = $objProductCategory->getFatherId();
    	
    	$objProductCategoryGateway = new ProductCategoryGateway();
    	$arrSubCategories = $objProductCategoryGateway->findByFatherId($fatherCategoryId);
    	
		$productCategoryIds = "";
		if (is_array($arrSubCategories)) {
			foreach ($arrSubCategories as $objProductCategory) {
				$productCategoryIds = $productCategoryIds.",".$objProductCategory->getProductCategoryId();
	    	}
		}
		$productCategoryIds = substr($productCategoryIds, 1);
		
    	$objProductGateway = new ProductGateway();
    	$arrProducts = $objProductGateway->findAllByCategoryId($productCategoryIds);
    	$event->setArg('arrSubProducts',$arrProducts);
    }
    
    function getProductQueue(&$event) {
		$objAppSession = new AppSession();
    	$objProductGateway = new ProductGateway();
    	
		$productCategoryId = $event->getArg("id1");
		$arrProduct = $objProductGateway->findProductAll($productCategoryId);
		$i=1;
		if ($arrProduct) {
			foreach ($arrProduct as $objProduct) {
	       		$arrIds[$i] = $objProduct->getProductId();
	       		$i++;
	    	}
	      	$event->setArg('arrQueue',$arrIds);
		}
	} 

	function getProductListNavigation(&$event) {
		/*if (!$event->isArgDefined('id1')) {
	 		$page = 1;
	 	} else { 
	 		$page = $event->getArg('id1');
	 	}*/
	 	
	 		$page = 1;
      
     	$arrQueue = $event->getArg('arrQueue');
		$nProduct = count($arrQueue);
		$objPagination = new pagination($nProduct,50); 
    	$arrPagination = $objPagination->paginate("ProductList",$page);
    	$event->setArg('arrPagination',$arrPagination);
   }  
   
	function getProductList(&$event){
		$objAppSession = new AppSession();
		$objProductGateway = new ProductGateway();
    	$arrPagination = $event->getArg('arrPagination');
    	
		$productCategoryId = $event->getArg("id1");
    	
    	
    	$arrProducts = $objProductGateway->findProductAllLimited($productCategoryId, $arrPagination['nCurrentPage'],$arrPagination['nItemsPerPage']);	
	 	$event->setArg('arrProducts',$arrProducts);	
	}
    
}
?>