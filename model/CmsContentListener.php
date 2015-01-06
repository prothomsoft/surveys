<?php
require_once("components/session.inc.php");
require_once("components/images.inc.php");
require_once("components/clear_url.inc.php");

require_once("CmsContentGateway.inc.php");
require_once("CmsContentDao.inc.php");
require_once("CmsContentBean.inc.php");

require_once("CmsContentPictureGateway.inc.php");
require_once("CmsContentPictureDao.inc.php");
require_once("CmsContentPictureBean.inc.php");

class model_CmsContentListener extends MachII_framework_Listener
{
    function configure() {}
    
	function getAdminTableData(&$event) {
    	
    	$objAppSession=new AppSession();
		$SN = $objAppSession->getSession('SN');
		
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('CmsContentId', 'Name', 'UpdateDate');
		$sIndexColumn = "CmsContentId";
		
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
		$sWhere = "";
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   CmsContent
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
			FROM   CmsContent
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
				
				$CmsContentId = $aRow[0];
				$Name = $aRow[1];
				$UpdateDate = $aRow[2];
				
				if ($aColumns[$i] == "UpdateDate"){
					$responseJSON .= '"'.substr($UpdateDate, 0, 10).'",'; 
				} else {
					/* General output */
					$responseJSON .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
				}
			}
			$responseJSON .= '"<a class=\"anchor_link\" href=\"index.php?event=showCmsContentStep1&CmsContentId='.$CmsContentId.'\">Edit</a>",';
			
			$responseJSON = substr_replace( $responseJSON, "", -1 );
			$responseJSON .= "],";
		}
		$responseJSON = substr_replace( $responseJSON, "", -1 );
		$responseJSON .= '] }';
		
		$event->setArg('responseJSON', $responseJSON);
	}
   
	function checkId(&$event){
   		$CmsContentId = $event->getArg('CmsContentId');
   		$objCmsContentBean = new CmsContentBean();
		$objCmsContentDao = new CmsContentDao();
		
		if ($CmsContentId == "") {
			// we need to create empty CmsContentId
			$CmsContentId = $objCmsContentDao->create($objCmsContentBean);
			$event->setArg('CmsContentId', $CmsContentId);	
		}
		
		$objCmsContentBean = $objCmsContentDao->read($CmsContentId);
		
		$today = date("Y-m-d");
      	$objCmsContentBean->setUpdateDate($today);
      	
		// WIZARD STEP 1 ---------->
		// Status ---------->
		if($event->isArgDefined('Status') && $event->getArg('Status') != "") {
			$Status = $event->getArg('Status');
			$objCmsContentBean->setStatus($Status);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Status') && $event->getArg('Status') == "") {
			$Status = "1";
			$objCmsContentBean->setStatus($Status);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getStatus() != "") {
			$Status = $objCmsContentBean->getStatus(); 
			$event->setArg('Status', $Status);
		}
		
		// Name ---------->
		if($event->isArgDefined('Name') && $event->getArg('Name') != "") {
			$name = htmlspecialchars(trim($event->getArg('Name')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setName($name);
			$objClearUrl = new ClearUrl($name);
			$objCmsContentBean->setSeoName($objClearUrl->clear());
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Name') && $event->getArg('Name') == "") {
			$name = "";
			$objCmsContentBean->setName($name);
			$objCmsContentBean->setSeoName($name);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getName() != "") {
			$name = $objCmsContentBean->getName();
			$event->setArg('Name', $name);
		}
		
		// NameTransEN ---------->
		if($event->isArgDefined('NameTransEN') && $event->getArg('NameTransEN') != "") {
			$NameTransEN = htmlspecialchars(trim($event->getArg('NameTransEN')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setNameTransEN($NameTransEN);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('NameTransEN') && $event->getArg('NameTransEN') == "") {
			$NameTransEN = "";
			$objCmsContentBean->setNameTransEN($NameTransEN);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getNameTransEN() != "") {
			$NameTransEN = $objCmsContentBean->getNameTransEN();
			$event->setArg('NameTransEN', $NameTransEN);
		}
		
		// NameTransDE ---------->
		if($event->isArgDefined('NameTransDE') && $event->getArg('NameTransDE') != "") {
			$NameTransDE = htmlspecialchars(trim($event->getArg('NameTransDE')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setNameTransDE($NameTransDE);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('NameTransDE') && $event->getArg('NameTransDE') == "") {
			$NameTransDE = "";
			$objCmsContentBean->setNameTransDE($NameTransDE);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getNameTransDE() != "") {
			$NameTransDE = $objCmsContentBean->getNameTransDE();
			$event->setArg('NameTransDE', $NameTransDE);
		}
		
		// NameTransRU ---------->
		if($event->isArgDefined('NameTransRU') && $event->getArg('NameTransRU') != "") {
			$NameTransRU = htmlspecialchars(trim($event->getArg('NameTransRU')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setNameTransRU($NameTransRU);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('NameTransRU') && $event->getArg('NameTransRU') == "") {
			$NameTransRU = "";
			$objCmsContentBean->setNameTransRU($NameTransRU);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getNameTransRU() != "") {
			$NameTransRU = $objCmsContentBean->getNameTransRU();
			$event->setArg('NameTransRU', $NameTransRU);
		}
		
		// Keyword ---------->
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') != "") {
			$Keyword = htmlspecialchars(trim($event->getArg('Keyword')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setKeyword($Keyword);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Keyword') && $event->getArg('Keyword') == "") {
			$Keyword = "";
			$objCmsContentBean->setKeyword($Keyword);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getKeyword() != "") {
			$Keyword = $objCmsContentBean->getKeyword();
			$event->setArg('Keyword', $Keyword);
		}
		
		// Description ---------->
		if($event->isArgDefined('Description') && $event->getArg('Description') != "") {
			$Description = htmlspecialchars(trim($event->getArg('Description')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setDescription($Description);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Description') && $event->getArg('Description') == "") {
			$Description = "";
			$objCmsContentBean->setDescription($Description);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getDescription() != "") {
			$Description = $objCmsContentBean->getDescription();
			$event->setArg('Description', $Description);
		}
				
		// ShortDescription ---------->
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') != "") {
			$ShortDescription = htmlspecialchars(trim($event->getArg('ShortDescription')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setShortDescription($ShortDescription);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('ShortDescription') && $event->getArg('ShortDescription') == "") {
			$ShortDescription = "";
			$objCmsContentBean->setShortDescription($ShortDescription);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getShortDescription() != "") {
			$ShortDescription = $objCmsContentBean->getShortDescription();
			$event->setArg('ShortDescription', $ShortDescription);
		}
		
		// ShortDescriptionTransEN ---------->
		if($event->isArgDefined('ShortDescriptionTransEN') && $event->getArg('ShortDescriptionTransEN') != "") {
			$ShortDescriptionTransEN = htmlspecialchars(trim($event->getArg('ShortDescriptionTransEN')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setShortDescriptionTransEN($ShortDescriptionTransEN);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('ShortDescriptionTransEN') && $event->getArg('ShortDescriptionTransEN') == "") {
			$ShortDescriptionTransEN = "";
			$objCmsContentBean->setShortDescriptionTransEN($ShortDescriptionTransEN);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getShortDescriptionTransEN() != "") {
			$ShortDescriptionTransEN = $objCmsContentBean->getShortDescriptionTransEN();
			$event->setArg('ShortDescriptionTransEN', $ShortDescriptionTransEN);
		}
		
		// ShortDescriptionTransDE ---------->
		if($event->isArgDefined('ShortDescriptionTransDE') && $event->getArg('ShortDescriptionTransDE') != "") {
			$ShortDescriptionTransDE = htmlspecialchars(trim($event->getArg('ShortDescriptionTransDE')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setShortDescriptionTransDE($ShortDescriptionTransDE);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('ShortDescriptionTransDE') && $event->getArg('ShortDescriptionTransDE') == "") {
			$ShortDescriptionTransDE = "";
			$objCmsContentBean->setShortDescriptionTransDE($ShortDescriptionTransDE);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getShortDescriptionTransDE() != "") {
			$ShortDescriptionTransDE = $objCmsContentBean->getShortDescriptionTransDE();
			$event->setArg('ShortDescriptionTransDE', $ShortDescriptionTransDE);
		}
		
		// ShortDescriptionTransRU ---------->
		if($event->isArgDefined('ShortDescriptionTransRU') && $event->getArg('ShortDescriptionTransRU') != "") {
			$ShortDescriptionTransRU = htmlspecialchars(trim($event->getArg('ShortDescriptionTransRU')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setShortDescriptionTransRU($ShortDescriptionTransRU);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('ShortDescriptionTransRU') && $event->getArg('ShortDescriptionTransRU') == "") {
			$ShortDescriptionTransRU = "";
			$objCmsContentBean->setShortDescriptionTransRU($ShortDescriptionTransRU);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getShortDescriptionTransRU() != "") {
			$ShortDescriptionTransRU = $objCmsContentBean->getShortDescriptionTransRU();
			$event->setArg('ShortDescriptionTransRU', $ShortDescriptionTransRU);
		}
		
		// LongDescription ---------->
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') != "") {
			$longDescription = htmlspecialchars(trim($event->getArg('LongDescription')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setLongDescription($longDescription);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('LongDescription') && $event->getArg('LongDescription') == "") {
			$LongDescription = "";
			$objCmsContentBean->setLongDescription($LongDescription);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getLongDescription() != "") {
			$LongDescription = $objCmsContentBean->getLongDescription(); 
			$event->setArg('LongDescription', $LongDescription);
		}
		
		// LongDescriptionTransEN ---------->
		if($event->isArgDefined('LongDescriptionTransEN') && $event->getArg('LongDescriptionTransEN') != "") {
			$LongDescriptionTransEN = htmlspecialchars(trim($event->getArg('LongDescriptionTransEN')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setLongDescriptionTransEN($LongDescriptionTransEN);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('LongDescriptionTransEN') && $event->getArg('LongDescriptionTransEN') == "") {
			$LongDescriptionTransEN = "";
			$objCmsContentBean->setLongDescriptionTransEN($LongDescriptionTransEN);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getLongDescriptionTransEN() != "") {
			$LongDescriptionTransEN = $objCmsContentBean->getLongDescriptionTransEN(); 
			$event->setArg('LongDescriptionTransEN', $LongDescriptionTransEN);
		}
		
		// LongDescriptionTransDE ---------->
		if($event->isArgDefined('LongDescriptionTransDE') && $event->getArg('LongDescriptionTransDE') != "") {
			$LongDescriptionTransDE = htmlspecialchars(trim($event->getArg('LongDescriptionTransDE')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setLongDescriptionTransDE($LongDescriptionTransDE);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('LongDescriptionTransDE') && $event->getArg('LongDescriptionTransDE') == "") {
			$LongDescriptionTransDE = "";
			$objCmsContentBean->setLongDescriptionTransDE($LongDescriptionTransDE);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getLongDescriptionTransDE() != "") {
			$LongDescriptionTransDE = $objCmsContentBean->getLongDescriptionTransDE(); 
			$event->setArg('LongDescriptionTransDE', $LongDescriptionTransDE);
		}
		
		// LongDescriptionTransRU ---------->
		if($event->isArgDefined('LongDescriptionTransRU') && $event->getArg('LongDescriptionTransRU') != "") {
			$LongDescriptionTransRU = htmlspecialchars(trim($event->getArg('LongDescriptionTransRU')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setLongDescriptionTransRU($LongDescriptionTransRU);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('LongDescriptionTransRU') && $event->getArg('LongDescriptionTransRU') == "") {
			$LongDescriptionTransRU = "";
			$objCmsContentBean->setLongDescriptionTransRU($LongDescriptionTransRU);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getLongDescriptionTransRU() != "") {
			$LongDescriptionTransRU = $objCmsContentBean->getLongDescriptionTransRU(); 
			$event->setArg('LongDescriptionTransRU', $LongDescriptionTransRU);
		}
		
		// 	 CmsContentOrder---------->
		if($event->isArgDefined('CmsContentOrder') && $event->getArg('CmsContentOrder') != "") {
			$CmsContentOrder = $event->getArg('CmsContentOrder');
			$objCmsContentBean->setCmsContentOrder($CmsContentOrder);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('CmsContentOrder') && $event->getArg('CmsContentOrder') == "") {
			$CmsContentOrder = "";
			$objCmsContentBean->setCmsContentOrder($CmsContentOrder);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getCmsContentOrder() != "") {
			$CmsContentOrder = $objCmsContentBean->getCmsContentOrder(); 
			$event->setArg('CmsContentOrder', $CmsContentOrder);
		}
		
		
		
		// Om1 ---------->
		if($event->isArgDefined('Om1') && $event->getArg('Om1') != "") {
			$Om1 = htmlspecialchars(trim($event->getArg('Om1')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm1($Om1);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om1') && $event->getArg('Om1') == "") {
			$Om1 = "";
			$objCmsContentBean->setOm1($Om1);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm1() != "") {
			$Om1 = $objCmsContentBean->getOm1();
			$event->setArg('Om1', $Om1);
		}
		
		// Om2 ---------->
		if($event->isArgDefined('Om2') && $event->getArg('Om2') != "") {
			$Om2 = htmlspecialchars(trim($event->getArg('Om2')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm2($Om2);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om2') && $event->getArg('Om2') == "") {
			$Om2 = "";
			$objCmsContentBean->setOm2($Om2);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm2() != "") {
			$Om2 = $objCmsContentBean->getOm2();
			$event->setArg('Om2', $Om2);
		}
		
		// Om3 ---------->
		if($event->isArgDefined('Om3') && $event->getArg('Om3') != "") {
			$Om3 = htmlspecialchars(trim($event->getArg('Om3')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm3($Om3);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om3') && $event->getArg('Om3') == "") {
			$Om3 = "";
			$objCmsContentBean->setOm3($Om3);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm3() != "") {
			$Om3 = $objCmsContentBean->getOm3();
			$event->setArg('Om3', $Om3);
		}
		
		// Om4 ---------->
		if($event->isArgDefined('Om4') && $event->getArg('Om4') != "") {
			$Om4 = htmlspecialchars(trim($event->getArg('Om4')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm4($Om4);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om4') && $event->getArg('Om4') == "") {
			$Om4 = "";
			$objCmsContentBean->setOm4($Om4);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm4() != "") {
			$Om4 = $objCmsContentBean->getOm4();
			$event->setArg('Om4', $Om4);
		}
		
		
		// Om5 ---------->
		if($event->isArgDefined('Om5') && $event->getArg('Om5') != "") {
			$Om5 = htmlspecialchars(trim($event->getArg('Om5')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm5($Om5);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om5') && $event->getArg('Om5') == "") {
			$Om5 = "";
			$objCmsContentBean->setOm5($Om5);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm5() != "") {
			$Om5 = $objCmsContentBean->getOm5();
			$event->setArg('Om5', $Om5);
		}
		
		// Om6 ---------->
		if($event->isArgDefined('Om6') && $event->getArg('Om6') != "") {
			$Om6 = htmlspecialchars(trim($event->getArg('Om6')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm6($Om6);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om6') && $event->getArg('Om6') == "") {
			$Om6 = "";
			$objCmsContentBean->setOm6($Om6);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm6() != "") {
			$Om6 = $objCmsContentBean->getOm6();
			$event->setArg('Om6', $Om6);
		}
		
		// Om7 ---------->
		if($event->isArgDefined('Om7') && $event->getArg('Om7') != "") {
			$Om7 = htmlspecialchars(trim($event->getArg('Om7')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm7($Om7);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om7') && $event->getArg('Om7') == "") {
			$Om7 = "";
			$objCmsContentBean->setOm7($Om7);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm7() != "") {
			$Om7 = $objCmsContentBean->getOm7();
			$event->setArg('Om7', $Om7);
		}
		
		// Om8 ---------->
		if($event->isArgDefined('Om8') && $event->getArg('Om8') != "") {
			$Om8 = htmlspecialchars(trim($event->getArg('Om8')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm8($Om8);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om8') && $event->getArg('Om8') == "") {
			$Om8 = "";
			$objCmsContentBean->setOm8($Om8);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm8() != "") {
			$Om8 = $objCmsContentBean->getOm8();
			$event->setArg('Om8', $Om8);
		}
		
		// Om9 ---------->
		if($event->isArgDefined('Om9') && $event->getArg('Om9') != "") {
			$Om9 = htmlspecialchars(trim($event->getArg('Om9')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm9($Om9);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om9') && $event->getArg('Om9') == "") {
			$Om9 = "";
			$objCmsContentBean->setOm9($Om9);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm9() != "") {
			$Om9 = $objCmsContentBean->getOm9();
			$event->setArg('Om9', $Om9);
		}
		
		// Om10 ---------->
		if($event->isArgDefined('Om10') && $event->getArg('Om10') != "") {
			$Om10 = htmlspecialchars(trim($event->getArg('Om10')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm10($Om10);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om10') && $event->getArg('Om10') == "") {
			$Om10 = "";
			$objCmsContentBean->setOm10($Om10);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm10() != "") {
			$Om10 = $objCmsContentBean->getOm10();
			$event->setArg('Om10', $Om10);
		}
		
		// Om11 ---------->
		if($event->isArgDefined('Om11') && $event->getArg('Om11') != "") {
			$Om11 = htmlspecialchars(trim($event->getArg('Om11')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm11($Om11);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om11') && $event->getArg('Om11') == "") {
			$Om11 = "";
			$objCmsContentBean->setOm11($Om11);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm11() != "") {
			$Om11 = $objCmsContentBean->getOm11();
			$event->setArg('Om11', $Om11);
		}
		
		// Om12 ---------->
		if($event->isArgDefined('Om12') && $event->getArg('Om12') != "") {
			$Om12 = htmlspecialchars(trim($event->getArg('Om12')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm12($Om12);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om12') && $event->getArg('Om12') == "") {
			$Om12 = "";
			$objCmsContentBean->setOm12($Om12);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm12() != "") {
			$Om12 = $objCmsContentBean->getOm12();
			$event->setArg('Om12', $Om12);
		}
		
		// Om13 ---------->
		if($event->isArgDefined('Om13') && $event->getArg('Om13') != "") {
			$Om13 = htmlspecialchars(trim($event->getArg('Om13')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm13($Om13);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om13') && $event->getArg('Om13') == "") {
			$Om13 = "";
			$objCmsContentBean->setOm13($Om13);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm13() != "") {
			$Om13 = $objCmsContentBean->getOm13();
			$event->setArg('Om13', $Om13);
		}
		
		// Om14 ---------->
		if($event->isArgDefined('Om14') && $event->getArg('Om14') != "") {
			$Om14 = htmlspecialchars(trim($event->getArg('Om14')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm14($Om14);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om14') && $event->getArg('Om14') == "") {
			$Om14 = "";
			$objCmsContentBean->setOm14($Om14);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm14() != "") {
			$Om14 = $objCmsContentBean->getOm14();
			$event->setArg('Om14', $Om14);
		}
		
		// Om15 ---------->
		if($event->isArgDefined('Om15') && $event->getArg('Om15') != "") {
			$Om15 = htmlspecialchars(trim($event->getArg('Om15')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm15($Om15);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om15') && $event->getArg('Om15') == "") {
			$Om15 = "";
			$objCmsContentBean->setOm15($Om15);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm15() != "") {
			$Om15 = $objCmsContentBean->getOm15();
			$event->setArg('Om15', $Om15);
		}
		
		// Om16 ---------->
		if($event->isArgDefined('Om16') && $event->getArg('Om16') != "") {
			$Om16 = htmlspecialchars(trim($event->getArg('Om16')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm16($Om16);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om16') && $event->getArg('Om16') == "") {
			$Om16 = "";
			$objCmsContentBean->setOm16($Om16);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm16() != "") {
			$Om16 = $objCmsContentBean->getOm16();
			$event->setArg('Om16', $Om16);
		}
		
		// Om17 ---------->
		if($event->isArgDefined('Om17') && $event->getArg('Om17') != "") {
			$Om17 = htmlspecialchars(trim($event->getArg('Om17')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm17($Om17);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om17') && $event->getArg('Om17') == "") {
			$Om17 = "";
			$objCmsContentBean->setOm17($Om17);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm17() != "") {
			$Om17 = $objCmsContentBean->getOm17();
			$event->setArg('Om17', $Om17);
		}
		
		// Om18 ---------->
		if($event->isArgDefined('Om18') && $event->getArg('Om18') != "") {
			$Om18 = htmlspecialchars(trim($event->getArg('Om18')), ENT_QUOTES,'UTF-8',true);
			$objCmsContentBean->setOm18($Om18);
			$objCmsContentDao->update($objCmsContentBean);						
		}
		if($event->isArgDefined('Om18') && $event->getArg('Om18') == "") {
			$Om18 = "";
			$objCmsContentBean->setOm18($Om18);
			$objCmsContentDao->update($objCmsContentBean);
		}
		if($objCmsContentBean->getOm18() != "") {
			$Om18 = $objCmsContentBean->getOm18();
			$event->setArg('Om18', $Om18);
		}
		
		
   }
   
   function removeRecord(&$event) {
    	$CmsContentId = $event->getArg('CmsContentId');
    	$objCmsContentDao = new CmsContentDao();
		$objCmsContentBean = new CmsContentBean();
		$objCmsContentBean = $objCmsContentDao->delete($CmsContentId);    	    	    
    }
    
	function findAll(&$event) {
		$objCmsContentGateway = new CmsContentGateway();
		$arrCmsContents = $objCmsContentGateway->findAll();
		$event->setArg("arrCmsContents", $arrCmsContents);
	}
	
	function getMaxCmsContentOrder(&$event) {
    	$objCmsContentGateway = new CmsContentGateway();
    	$maxCmsContentOrder = $objCmsContentGateway->getMaxCmsContentOrder();
    	$event->setArg('maxCmsContentOrder',$maxCmsContentOrder);
    }
    
    function findByItemSeo(&$event)	{
		$itemSeo = $event->getArg('id1');
		$objCmsContentDao = new CmsContentDao();
		$objCmsContent = $objCmsContentDao->readByItemSeo($itemSeo);
      	$event->setArg('objCmsContent',$objCmsContent);
	}
}
?>