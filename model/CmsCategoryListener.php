<?php
require_once("components/session.inc.php");

require_once("CmsCategoryDao.inc.php");
require_once("CmsCategoryGateway.inc.php");
require_once("CmsCategoryBean.inc.php");

require_once("CmsCategoryPlainGateway.inc.php");
require_once("CmsCategoryPlainDao.inc.php");
require_once("CmsCategoryPlainBean.inc.php");

require_once("CmsContentDao.inc.php");
require_once("CmsContentBean.inc.php");

require_once("components/clear_url.inc.php");

class model_CmsCategoryListener extends MachII_framework_Listener
{
	private $category_name_hash;
	private $parent_id_hash;
    private $children_hash;
    	
    function configure() {}
    
    /* CMS CATEGORIES IN ADMIN PANEL START */ /* CMS CATEGORIES IN ADMIN PANEL START */ /* CMS CATEGORIES IN ADMIN PANEL START */
    function getAdminCategoriesPath(&$event) {
    	$objCmsCategory = new CmsCategoryDAO();
		if($event->isArgDefined('categoryId') && $event->getArg('categoryId') > 0) {
			$father = $event->getArg('categoryId');
			$counter = 0;
			do {
				$category = $objCmsCategory->read($father);
	 			$grandfather = $category->getFatherId();
	 					 				
	 			if($counter == 0) {
	 				$adminCategoriesPath = "<a href=\"#\" class=\"isActive\">".stripslashes($category->getName())."</a>";
	 			}
	 			else {
	 				if($event->getArg('categoryId') != $father)	{
	 					$adminCategoriesPath = "<a href=\"index.php?event=".$event->getArg('event')."&categoryId=".$category->getCmsCategoryId()."&categoryName=".stripslashes($category->getName())."\">".stripslashes($category->getName())."</a> > ".$adminCategoriesPath."";
					}
	 			}
	 			$counter++;
	 				
	 			$father = $grandfather;
	 		}
	 		while($father > 0);
	 	}
	 	$event->setArg('adminCategoriesPath', $adminCategoriesPath);
	}
    
    function findByFatherId(&$event) {
    	$categoryId = $event->getArg('categoryId');
    	$objCmsCategoryGateway = new CmsCategoryGateway();
    	$arrCmsCategoriesObjs = $objCmsCategoryGateway->findByFatherId($categoryId);
    	$event->setArg('arrCmsCategoriesObjs',$arrCmsCategoriesObjs);
    }
    
    function updateCategories(&$event) {
       // parse the categories array to update -------------------------------->
       $categoryId = $event->getArg('categoryId');
       
       $categories_id = $event->getArg('categories_id');
       $old_categories = $event->getArg('old_categories');
       $categories = $event->getArg('categories');
       $old_transENs = $event->getArg('old_transENs');
       $transENs = $event->getArg('transENs');
       $old_transDEs = $event->getArg('old_transDEs');
       $transDEs = $event->getArg('transDEs');
       $old_transRUs = $event->getArg('old_transRUs');
       $transRUs = $event->getArg('transRUs');
       $old_isModules = $event->getArg('old_isModules');
       $isModules = $event->getArg('isModules');
       $old_urls = $event->getArg('old_urls');
       $urls = $event->getArg('urls');
       $old_orders = $event->getArg('old_orders');
       $orders = $event->getArg('orders');
       
                     
	   $i = 0;
	   while($i < count($categories)) {
	   		if($categories[$i] != $old_categories[$i] || $old_orders[$i] != $orders[$i] || $old_urls[$i] != $urls[$i] || $old_isModules[$i] != $isModules[$i] || $old_transENs[$i] != $transENs[$i] || $old_transDEs[$i] != $transDEs[$i] || $old_transRUs[$i] != $transRUs[$i]) {
				
				// get numberOfItems first - if not we update the number with null -------------------------------->
				$objCmsCategory = new CmsCategoryDAO();
       			$category = $objCmsCategory->read($categories_id[$i]);
       			$numberOfItems = $category->getNumberOfItems();
       							
				$objCmsCategoryBean = new CmsCategoryBean();
				$objCmsCategoryBean->setCmsCategoryId($categories_id[$i]);
				$objCmsCategoryBean->setFatherId($categoryId);
				
				$categoryName = htmlspecialchars(trim($categories[$i]), ENT_QUOTES,'UTF-8',true); 
     			$objCmsCategoryBean->setName($categoryName);
     			$objCmsCategoryBean->setNumberOfItems($numberOfItems);
     			
     			
     			$objClearUrl = new ClearUrl($categories[$i]);
				$objCmsCategoryBean->setSeoName($objClearUrl->clear());
				
     			
     			$objCmsCategoryBean->setTransEN($transENs[$i]);
     			$objCmsCategoryBean->setTransDE($transDEs[$i]);
     			$objCmsCategoryBean->setTransRU($transRUs[$i]);
			    $objCmsCategoryBean->setListOrder($orders[$i]);
			    $objCmsCategoryBean->setUrl($urls[$i]);
			    $objCmsCategoryBean->setIsModule($isModules[$i]);
			    			    
			    $objCmsCategory = new CmsCategoryDAO();
				$objCmsCategory->update($objCmsCategoryBean);
				
				
				
				// also we need to update record to CMSContent only when this is not a module
				if($isModules[$i] == 0) {
					$objCmsContentDao = new CmsContentDao();
					$objCmsContentBean = $objCmsContentDao->readByCmsCategoryId($categories_id[$i]);
					if ($objCmsContentBean->getCmsContentId() != "") {
						$updateDate = date('Y-m-d');
						$objCmsContentBean->setUpdateDate($updateDate);
						$objCmsContentBean->setName($categoryName);
						$objCmsContentBean->setNameTransEN($transENs[$i]);
						$objCmsContentBean->setNameTransDE($transDEs[$i]);
						$objCmsContentBean->setNameTransRU($transRUs[$i]);
						$objClearUrl = new ClearUrl($categories[$i]);
						$objCmsContentBean->setSeoName($objClearUrl->clear());
						$objCmsContentDao->update($objCmsContentBean);
					}
				}
			}
			$i++;
	   }
		
	   // parse the categories array to delete -------------------------------->
	   $delete = $event->getArg('delete');
	   $i = 0;
	   while($i < count($delete)) {
	      	if($delete[$i]) {
	      		$objCmsCategory = new CmsCategoryDAO();
				$objCmsCategory->delete($delete[$i]);
				
				// also we need to delete record to CMSContent
				$objCmsContentDao = new CmsContentDao();
				$objCmsContentDao->deleteByCmsCategoryId($delete[$i]);					
		   	}
			$i++;
	   }
	   
	   // add new category (if present) --------------------------------------->
	   $new_category = $event->getArg('new_category');
	   $new_transEN = $event->getArg('new_transEN');
	   $new_transDE = $event->getArg('new_transDE');
	   $new_transRU = $event->getArg('new_transRU');
	   $new_isModule = $event->getArg('new_isModule');
	   $new_url = $event->getArg('new_url');
	   $new_order = $event->getArg('new_order');
	   
	   if($new_category) {
	   	  	if(!$event->isArgDefined('categoryId')) {
	   	  		$categoryId = 0;
	   	  		$event->setArg('categoryId', $categoryId);
	   	  	}
	   	  	
	   	  	$objCmsCategoryBean = new CmsCategoryBean();
			$objCmsCategoryBean->setFatherId($categoryId);
			
			$categoryName = htmlspecialchars(trim($new_category), ENT_QUOTES,'UTF-8',true);
			$objCmsCategoryBean->setName($categoryName);
     		
     		$objClearUrl = new ClearUrl($new_category);
			$objCmsCategoryBean->setSeoName($objClearUrl->clear());
     		
     		$objCmsCategoryBean->setTransEN($new_transEN);
     		$objCmsCategoryBean->setTransDE($new_transDE);
     		$objCmsCategoryBean->setTransRU($new_transRU);
		    $objCmsCategoryBean->setListOrder($new_order);
		    $objCmsCategoryBean->setUrl($new_url);
		    $objCmsCategoryBean->setIsModule($new_isModule);
			   	  	
	   	  	$objCmsCategory = new CmsCategoryDAO();
			$cmsCategoryId = $objCmsCategory->create($objCmsCategoryBean);
			
			// also we need to add new record to CMSContent
			if($new_isModule == 0) {
				$createDate = date('Y-m-d');
	    		$updateDate = date('Y-m-d');
	    	
		    	$objCmsContentBean = new CmsContentBean();
				$objCmsContentBean->setCmsCategoryId($cmsCategoryId);
				$objCmsContentBean->setName($categoryName);
				$objCmsContentBean->setNameTransEN($new_transEN);
				$objCmsContentBean->setNameTransDE($new_transDE);
				$objCmsContentBean->setNameTransRU($new_transRU);
				
				$objClearUrl = new ClearUrl($new_category);
				$objCmsContentBean->setSeoName($objClearUrl->clear());
				$objCmsContentBean->setKeyword($categoryName);
				$objCmsContentBean->setDescription($categoryName);
				$objCmsContentBean->setLongDescription("");
				$objCmsContentBean->setUpdateDate($updateDate);
						    	
				$objCmsContentDao = new CmsContentDao();
				
				$objCmsContentDao->create($objCmsContentBean);
			}
	   }
    }
    
    function createPlainCategories(&$event) {
    	$this->category_name_hash = "";
    	$this->parent_id_hash = "";
    	$this->children_hash = "";
    	
    	// get categories ordered by ListOrder ASC ---------------------------------->
    	$objCmsCategoryGateway = new CmsCategoryGateway();
    	$arrCmsCategoriesObjs = $objCmsCategoryGateway->findAllOrderedByListOrder();
    	for( $i = 0; $i < count($arrCmsCategoriesObjs); $i++) {
    		$category_id = $arrCmsCategoriesObjs[$i]->getCmsCategoryId();
    		$this->category_name_hash[$category_id] = $arrCmsCategoriesObjs[$i]->getName();
    		$this->parent_id_hash[$category_id] = $arrCmsCategoriesObjs[$i]->getFatherId();
    		@$this->children_hash[$this->parent_id_hash[$category_id]]++;
    	}
    	   	
    	// clear categories plain content ---------------------------------->
    	$objCmsCategoryPlainGateway = new CmsCategoryPlainGateway();
    	$objCmsCategoryPlainGateway->removeAll();
    	
    	// runs dump children procedure recursive function ----------------->
    	if (count($arrCmsCategoriesObjs) != 0) {
			$this->dump_children(0);
    	}
    }
    
    function dump_children($id) {
    	static $indent;
		reset($this->parent_id_hash);
		while (list($key, $val) = each($this->parent_id_hash)) {
			if ($val == $id) {
				$sval = ''.$indent.$this->category_name_hash[$key];
				
				$objCmsCategoryPlainBean = new CmsCategoryPlainBean();
				$objCmsCategoryPlainBean->setCategoryId($key);
     			$objCmsCategoryPlainBean->setCategoryName($sval);
     			
     			$objClearUrl = new ClearUrl(htmlspecialchars_decode($sval, ENT_QUOTES));
				$objCmsCategoryPlainBean->setCategorySeoName($objClearUrl->clear());
     			
     			$objCmsCategoryPlain = new CmsCategoryPlainDao();
				$objCmsCategoryPlain->create($objCmsCategoryPlainBean);
										   	 					
				$indent .= '&nbsp; &nbsp;';
				if (@$this->children_hash[$key]) {
					$this->dump_children($key);
					reset($this->parent_id_hash);
					while ( key($this->parent_id_hash) != $key ) {
						next($this->parent_id_hash);
					}
					next($this->parent_id_hash);
				}
				$indent = substr($indent,0,-13);
			}
		}
    }
    /* CMS CATEGORIES IN ADMIN PANEL END */ /* CMS CATEGORIES IN ADMIN PANEL END */ /* CMS CATEGORIES IN ADMIN PANEL END */
}
?>