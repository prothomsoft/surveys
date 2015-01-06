<?php
require_once("components/session.inc.php");
require_once("components/emails.inc.php");
require_once("components/Rmail.php");
require_once("components/db.inc.php");
 
require_once("ProducerDao.inc.php");
require_once("ProducerGateway.inc.php");
require_once("ProducerBean.inc.php");

class model_ProducerListener extends MachII_framework_Listener {
	
	function configure() {}
	
	function getProducersTableData(&$event) {
   	
		$DB = new DB();
		$DB->connect();
		
		// columns in the table
		$aColumns = array('ProducerId', 'Name');
		$sIndexColumn = "ProducerId";
		
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
		
		// filtering
		$sSearch = $event->getArg("sSearch");
		$sWhere = "";
		if ($sSearch != "")	{
			$sWhere = "WHERE ";
			for ($i=0;$i<count($aColumns);$i++)	{
				$sWhere .= $aColumns[$i]." LIKE '%".mysql_real_escape_string($sSearch)."%' OR ";
			}
			$sWhere = substr_replace($sWhere, "", -3);
		}
		
		// get data to display
		$sQuery = "
			SELECT SQL_CALC_FOUND_ROWS ".implode(", ", $aColumns)."
			FROM   Producer
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
			FROM   Producer
		";
		$rResultTotal = $DB->query($sQuery);
		$aResultTotal = mysql_fetch_array($rResultTotal);
		$iTotal = $aResultTotal[0];
		
		// output
		$sEcho = $event->getArg("sEcho");
		$sOutput = '{';
		$sOutput .= '"sEcho": '.intval($sEcho).', ';
		$sOutput .= '"iTotalRecords": '.$iTotal.', ';
		$sOutput .= '"iTotalDisplayRecords": '.$iFilteredTotal.', ';
		$sOutput .= '"aaData": [ ';
		while ($aRow = mysql_fetch_array($rResult))	{
			$sOutput .= "[";
			for ($i=0; $i<count($aColumns); $i++) {
				/* General output */
				$sOutput .= '"'.str_replace('"', '\"', $aRow[ $aColumns[$i] ]).'",';
			}
			$sOutput .= '"<a class=\"anchor_link\" href=\"index.php?event=showEditProducerForm&producerId='.$aRow[0].'\">Edycja</a>';
			$sOutput .= ' | <a class=\"anchor_link\" href=\"index.php?event=executeRemoveProducersAction&producerId='.$aRow[0].'\" onclick=\"return confirm(\'Czy na pewno chcesz usunąć ten rekord?\')\">Usuń</a>",';
					
			$sOutput = substr_replace( $sOutput, "", -1 );
			$sOutput .= "],";
		}
		$sOutput = substr_replace( $sOutput, "", -1 );
		$sOutput .= '] }';
		
		$event->setArg('responseJSON', $sOutput);
	}
	
	function createProducer(&$event) {
		$objProducerBean = new ProducerBean();
		$name = htmlspecialchars(trim($event->getArg('name')), ENT_QUOTES,'UTF-8',true);
		$objProducerBean->setName($name);
		$objProducer = new ProducerDao();
		$producerId = $objProducer->create($objProducerBean);
		$event->setArg('producerId',$producerId);
	}
	
	function updateRecord(&$event) {
    	$producerId = $event->getArg('producerId');
    	
		$objProducerDao = new ProducerDao();
		$objProducerBean = new ProducerBean();
		$objProducerBean = $objProducerDao->read($producerId);
    	
    	$name = htmlspecialchars(trim($event->getArg('name')), ENT_QUOTES,'UTF-8',true);
    	$objProducerBean->setName($name);
    	
    	$objProducerDao->update($objProducerBean);    	    
    }
	
	function setFieldsForUpdate(&$event){
    	$objProducerDao = new ProducerDao();
    	$objProducer = $objProducerDao->read($event->getArg('producerId'));

		if (!$event->isArgDefined('name')) {
    		$name = $objProducer->getName();
    		$event->setArg('name',$name);
    	}    	
    }	
    
    function removeRecord(&$event) {
    	$producerId = $event->getArg('producerId');
    	
		$objProducerDao = new ProducerDao();
		$objProducerBean = new ProducerBean();
		$objProducerBean = $objProducerDao->delete($producerId);    	    	    
    }
    
    function findAll(&$event) {
		$objProducerGateway = new ProducerGateway();
		$arrProducers = $objProducerGateway->findAll();
		$event->setArg("arrProducers", $arrProducers);
	}
	
	function findByName(&$event) {
		$name = $event->getArg('name');
		$maxRows = $event->getArg('maxRows');
		$objProducerGateway = new ProducerGateway();
		$responseJSON = $objProducerGateway->findByName($name, $maxRows);
		$event->setArg("responseJSON", $responseJSON);
	}
}
?>
