<?php
require_once(dirname(__FILE__)."/session.inc.php");

/** 
 * Pagination Class 
 *
 * Encapsulates pagination parameters for calculation. It 
 * stores user preference (length of the list) into session. Class
 * can be configurated once at implementation time for whole appi 
 * or instantiated with specific configuration for any part of it.
 * @author       michal amerek <amer@tlen.pl>
 * @package      meHowCom
 * @version      0.15
 * @modifiedby   $LastChangedBy: ameros $
 * @lastmodified $Date: 2006-04-21 3:08 $ 
 */
class pagination
{

	/**
	 * @var constant - configurable number of items per page
	 */
   const nItemsPerPage = 15;
   /**
	 * @var constant - configurable limit of items per page for list extension
	 */
   const nItemsLimitPerPage = 50;
   /**
	 * @var constant - configurable step to extend the list of items per page
	 */
   const nStep4ItemsPerPage =20;
   /**
	 * @var constant - configurable number of items to construct the list
	 */
   const nItemsTotal =1;
   
	 private $nItemsTotal;
	 private $nItemsPerPage;
	 private $nItemsLimitPerPage;
	 private $nStep4ItemsPerPage;
	
   /**
    * constructor
	 * @param integer $nItemsPerPage - number of items per page
	 * @param integer $nItemsLimitPerPage - limit of items per page
	 * @param integer $nStep4ItemsPerPage - step to extend the list of items per page
	 * @param integer $nItemsTotal - number of items to construct the list
	 */
   function __construct($nItemsTotal=self::nItemsTotal,$nItemsPerPage=self::nItemsPerPage,$nItemsLimitPerPage=self::nItemsLimitPerPage,$nStep4ItemsPerPage=self::nStep4ItemsPerPage)
   {
      $this->nItemsTotal = $nItemsTotal;
      $this->nItemsPerPage = $nItemsPerPage;
      $this->nItemsLimitPerPage = $nItemsLimitPerPage;
      $this->nStep4ItemsPerPage = $nStep4ItemsPerPage;

      $this->objSession = new AppSession();
   }
   
   /**
    * paginatation concrete method
	 * @param string $sPageName - name of list to be stored in session as user preference
	 * @param integer $nPageNumber - requested page number to calculate pagination parameters
	 * @param boolean $bMore - to extend the list
	 * @param boolean $bLess - to reduce the list
	 * @return array $arrReturnedValues
	 * - nItemsPerPage - integer quantity of items per page
	 * - nNumberOfPages - integer quantity of pages
	 * - nCurrentPage - integer number of current page
	 * - nPreviousPage - integer number of previous page
	 * - nNextPage - integer number of next page
	 * - more - bool to enable/disable extension
	 * - less - bool to enable/disable reduction
	 */       
   public function paginate($sPageName,$nPageNumber,$bMore=0,$bLess=0)
   {
      // number of items per page as user preference get from session
      $nItemsPerPage = $this->nItemsPerPage;
      
      // correction of items limit
      if($this->nItemsTotal<$this->nItemsLimitPerPage)
         $nItemsLimitPerPage = $this->nItemsTotal;
      else  
         $nItemsLimitPerPage = $this->nItemsLimitPerPage;
            
      // items list extension
      if($bMore && $nItemsPerPage+$this->nStep4ItemsPerPage<=$nItemsLimitPerPage)
         $this->objSession->setSession($PageSession['nItemsPerPage'],$nItemsPerPage+$this->nStep4ItemsPerPage); 
         
      // items list reduction
      if($bLess && $nItemsPerPage-$this->nStep4ItemsPerPage>0)
         $this->objSession->setSession($PageSession['nItemsPerPage'],$nItemsPerPage-$this->nStep4ItemsPerPage);
      
      // number of items per page
      $nItemsPerPage = $this->nItemsPerPage;

      // total number of pages
      $nPages = ceil($this->nItemsTotal/$nItemsPerPage); 

      // requested current page
      if($nPageNumber<1) $nPageNumber = 1;
      if($nPageNumber>$nPages) $nPageNumber = $nPages;

      // enable/disable "less" option
      if($nPageNumber==1){
         if($nItemsPerPage-$this->nStep4ItemsPerPage>0) $less = 1;
      }else $less = 0;      

      // enable/disable "more" option
      if($nPageNumber==1){
         if($nItemsPerPage+$this->nStep4ItemsPerPage<=$nItemsLimitPerPage) $more = 1;
      }else $more = 0;
     
      // previous page
      if($nPageNumber>1) $nPreviousPage = $nPageNumber-1;
      else $nPreviousPage = 0; // false
      
      // next page
      if($nPageNumber<$nPages) $nNextPage = $nPageNumber+1;
      else $nNextPage = 0; // false
      
      // returned array of values
      $arrReturnedValues['nItemsPerPage'] = $nItemsPerPage;
      $arrReturnedValues['nNumberOfPages'] = $nPages;
      $arrReturnedValues['nCurrentPage'] = $nPageNumber;
      $arrReturnedValues['nPreviousPage'] = $nPreviousPage;
      $arrReturnedValues['nNextPage'] = $nNextPage;
      $arrReturnedValues['more'] = $more;
      $arrReturnedValues['less'] = $less;
      return $arrReturnedValues;
   }
    
}
?>