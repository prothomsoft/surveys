<?php
require_once("components/session.inc.php");

require_once("UpdateCategoryDao.inc.php");
require_once("UpdateCategoryGateway.inc.php");
require_once("UpdateCategoryBean.inc.php");

require_once("UpdateCategoryPlainGateway.inc.php");
require_once("UpdateCategoryPlainDao.inc.php");
require_once("UpdateCategoryPlainBean.inc.php");

require_once("components/clear_url.inc.php");

class model_UpdateCategoryListener extends MachII_framework_Listener
{
	private $category_name_hash;
	private $parent_id_hash;
    private $children_hash;
    	
    function configure() {}
        
    function findAll(&$event)
    {
    	$objUpdateCategoryPlainGateway = new UpdateCategoryPlainGateway();
    	$arrUpdateCategoryPlain = $objUpdateCategoryPlainGateway->findAll();
    	$event->setArg('arrUpdateCategoryPlain',$arrUpdateCategoryPlain);
    }
    
    function findEmpty(&$event)
    {
    	$objUpdateCategoryPlainGateway = new UpdateCategoryPlainGateway();
    	$arrUpdateCategoryPlain = $objUpdateCategoryPlainGateway->findEmpty();
    	$event->setArg('arrUpdateCategoryPlain',$arrUpdateCategoryPlain);
    }
    
    function findEmptyEdit(&$event)
    {
    	$objUpdateFileDao = new UpdateFileDao();
    	$UpdateFileId = $event->getArg('UpdateFileId');
    	$UpdateCategoryId = $objUpdateFileDao->read($UpdateFileId)->getUpdateCategoryId();
    	
    	$objUpdateCategoryPlainGateway = new UpdateCategoryPlainGateway();
    	$arrUpdateCategoryPlain = $objUpdateCategoryPlainGateway->findEmptyEdit($UpdateCategoryId);
    	$event->setArg('arrUpdateCategoryPlain',$arrUpdateCategoryPlain);
    }
    
    function setSessionNavigation(&$event) {

    	
    	
    	// starting point for CatSeo
    	if (!$event->isArgDefined('CatSeo')) {
    		$CatSeo = "component";
    		$event->setArg('CatSeo',$CatSeo);
    	}
    	
    	// starting point for ItemSeo
    	if (!$event->isArgDefined('ItemSeo')) {
    		$ItemSeo = "home";
    		$event->setArg('ItemSeo',$ItemSeo);
    	} 
    	
    	
    	   	
    	// start session
    	$objAppSession=new AppSession();
    	$SN = $objAppSession->getSession('SN');
    	
    	// set currency
    	if($event->isArgDefined('currency')) {
    		$currency = $event->getArg('currency'); 
    		$objAppSession->setSession("currency",$currency); 
    	}
    		
    	$componentCatSeo = $event->getArg('CatSeo');
		$componentItemSeo = $event->getArg('ItemSeo');
				
		// HOME PAGE COMPONENT //
		if ($componentCatSeo == "component" and $componentItemSeo == "home") {
			$objAppSession->setSession("sessionCatSeo","component");
			$objAppSession->setSession("sessionItemSeo","home");
		}
		
		// LOGIN COMPONENT 
		if ($componentCatSeo == "component" and $componentItemSeo == "login") {
			$objAppSession->setSession("sessionCatSeo","component");
			$objAppSession->setSession("sessionItemSeo","login");
		 	header("Location: ".$SN."login");
		 	
		}
		
		// CONTACT COMPONENT 
		if ($componentCatSeo == "contact-us" and $componentItemSeo == "contact-us") {
			$objAppSession->setSession("sessionCatSeo","contact-us");
			$objAppSession->setSession("sessionItemSeo","contact-us");
		 	header("Location: ".$SN."contact.html");
		}
		
		// FINISHING COMPONENT 
		if ($componentCatSeo == "services" and $componentItemSeo == "finishing-service") {
			$objAppSession->setSession("sessionCatSeo","services");
			$objAppSession->setSession("sessionItemSeo","finishing-service");
		 	header("Location: ".$SN."finishing.html");
		}
		
		// FURNISHING COMPONENT 
		if ($componentCatSeo == "services" and $componentItemSeo == "furnishing-service") {
			$objAppSession->setSession("sessionCatSeo","services");
			$objAppSession->setSession("sessionItemSeo","furnishing-service");
		 	header("Location: ".$SN."furnishing.html");
		}
				
		// do not change session when we are inside of event - the table covers all component events
		$componentsEvents = array(
			
			// homepage component
	     	home,
				     	
	     	// login
	     	login,
	     	
	     	// contact
	     	contact,
	     	
	     	// finishing
	     	finishing,
	     	
	     	// furnishing
	     	furnishing
	     );
		
		$eventCurrent = $event->getArg('event'); 
		
		if (!in_array($eventCurrent,$componentsEvents)) {
			$objAppSession->setSession("sessionCatSeo",$componentCatSeo);	
			$objAppSession->setSession("sessionItemSeo",$componentItemSeo);
		}
    }
    
    function findLevel0(&$event) {
    	$objUpdateCategoryGateway = new UpdateCategoryGateway();
    	$arrUpdateCategoryLevel0 = $objUpdateCategoryGateway->findByFatherId(0);
    	$event->setArg('arrUpdateCategoryLevel0',$arrUpdateCategoryLevel0);
    }
    
    function findSide(&$event)
    {
    	$objAppSession=new AppSession();
    	
    	$CatSeo = $objAppSession->getSession("sessionCatSeo");
    	
    	// protection in case when session expires
    	if( $CatSeo == "") {
    		$CatSeo = $event->getArg('sessionCatSeo');
    	}
    	    	    	
    	$objUpdateCategoryDao = new UpdateCategoryDao();
    	$objUpdateCategoryTop = $objUpdateCategoryDao->readByCatSeo($CatSeo);
    	$event->setArg('objUpdateCategoryTop',$objUpdateCategoryTop);
    	$objUpdateCategoryGateway = new UpdateCategoryGateway();
    	$arrUpdateCategorySide = $objUpdateCategoryGateway->findByFatherId($categoryId);
    	$event->setArg('arrUpdateCategorySide',$arrUpdateCategorySide);
    }
    
    /* CMS CATEGORIES IN ADMIN PANEL START */ /* CMS CATEGORIES IN ADMIN PANEL START */ /* CMS CATEGORIES IN ADMIN PANEL START */
    
    function getAdminCategoriesPath(&$event) {
    	$objUpdateCategory = new UpdateCategoryDAO();
		if($event->isArgDefined('categoryId') && $event->getArg('categoryId') > 0) {
			$father = $event->getArg('categoryId');
			$counter = 0;
			do {
				$category = $objUpdateCategory->read($father);
	 			$grandfather = $category->getFatherId();
	 					 				
	 			if($counter == 0) {
	 				$adminCategoriesPath = "<a href=\"#\" class=\"isActive\">".stripslashes($category->getName())."</a>";
	 			}
	 			else {
	 				if($event->getArg('categoryId') != $father)	{
	 					$adminCategoriesPath = "&raquo;<a href=\"index.php?event=".$event->getArg('event')."&categoryId=".$category->getUpdateCategoryId()."&categoryName=".stripslashes($category->getName())."\">".stripslashes($category->getName())."</a> ".$adminCategoriesPath."";
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
    	$objUpdateCategoryGateway = new UpdateCategoryGateway();
    	$arrUpdateCategoriesObjs = $objUpdateCategoryGateway->findByFatherId($categoryId);
    	$event->setArg('arrUpdateCategoriesObjs',$arrUpdateCategoriesObjs);
    }
    
    function updateCategories(&$event) {
       // parse the categories array to update -------------------------------->
       $categories_id = $event->getArg('categories_id');
       $categories = $event->getArg('categories');
       $old_categories = $event->getArg('old_categories');
       $old_description = $event->getArg('old_description');
       $description = $event->getArg('description');
       $categoryId = $event->getArg('categoryId');
                     
	   $i = 0;
	   while($i < count($categories)) {
	   		if($categories[$i] != $old_categories[$i] || $old_description[$i] != $description[$i]) {
				
				// get numberOfItems first - if not we update the number with null -------------------------------->
				$objUpdateCategory = new UpdateCategoryDAO();
       			$category = $objUpdateCategory->read($categories_id[$i]);
       			$numberOfItems = $category->getNumberOfItems();
       							
				$objUpdateCategoryBean = new UpdateCategoryBean();
				$objUpdateCategoryBean->setUpdateCategoryId($categories_id[$i]);
				
				$categoryName = addslashes($categories[$i]); 
     			$objUpdateCategoryBean->setName($categoryName);
     			
     			$objClearUrl = new ClearUrl($categories[$i]);
				$objUpdateCategoryBean->setSeoName($objClearUrl->clear());
     			
			    $objUpdateCategoryBean->setListOrder($description[$i]);
			    $objUpdateCategoryBean->setFatherId($categoryId);
			    $objUpdateCategoryBean->setNumberOfItems($numberOfItems);
			    			    
			    $objUpdateCategory = new UpdateCategoryDAO();
				$objUpdateCategory->update($objUpdateCategoryBean);	
	   		}
			$i++;
	   }
		
	   // parse the categories array to delete -------------------------------->
	   $delete = $event->getArg('delete');
	   $i = 0;
	   while($i < count($delete)) {
	      	if($delete[$i]) {
	      		$objUpdateCategory = new UpdateCategoryDAO();
				$objUpdateCategory->delete($delete[$i]);	
		   	}
			$i++;
	   }
	   
	   // add new category (if present) --------------------------------------->
	   $new_category = $event->getArg('new_category');
	   $cat_description = $event->getArg('cat_description');
	   
	   if($new_category) {
	   	  	if(!$event->isArgDefined('categoryId')) {
	   	  		$categoryId = 0;
	   	  		$event->setArg('categoryId', $categoryId);
	   	  	}
	   	  	
	   	  	$objUpdateCategoryBean = new UpdateCategoryBean();
			$objUpdateCategoryBean->setFatherId($categoryId);
			
			$categoryName = addslashes($new_category);
     		$objUpdateCategoryBean->setName($categoryName);
     		
     		$objClearUrl = new ClearUrl($new_category);
			$objUpdateCategoryBean->setSeoName($objClearUrl->clear());
     		
		    $objUpdateCategoryBean->setListOrder($cat_description);
			   	  	
	   	  	$objUpdateCategory = new UpdateCategoryDAO();
			$objUpdateCategory->create($objUpdateCategoryBean);	
	   }
    }
    
    function createPlainCategories(&$event) {
    	$this->category_name_hash = "";
    	$this->parent_id_hash = "";
    	$this->children_hash = "";
    	
    	// get categories ordered by ListOrder ASC ---------------------------------->
    	$objUpdateCategoryGateway = new UpdateCategoryGateway();
    	$arrUpdateCategoriesObjs = $objUpdateCategoryGateway->findAllOrderedByListOrder();
    	
    	for( $i = 0; $i < count($arrUpdateCategoriesObjs); $i++) {
    		$category_id = $arrUpdateCategoriesObjs[$i]->getUpdateCategoryId();
    		$this->category_name_hash[$category_id] = $arrUpdateCategoriesObjs[$i]->getName();
    		$this->parent_id_hash[$category_id] = $arrUpdateCategoriesObjs[$i]->getFatherId();
    		@$this->children_hash[$this->parent_id_hash[$category_id]]++;
    	}
    	   	
    	// clear categories plain content ---------------------------------->
    	$objUpdateCategoryPlainGateway = new UpdateCategoryPlainGateway();
    	$objUpdateCategoryPlainGateway->removeAll();
    	
    	// runs dump children procedure recursive function ----------------->
    	if (count($arrUpdateCategoriesObjs) != 0) {
			$this->dump_children(0);
    	}
    }
    
    function dump_children($id) {
    	static $indent;
		reset($this->parent_id_hash);
		while (list($key, $val) = each($this->parent_id_hash)) {
			if ($val == $id) {
				$sval = ''.$indent.$this->category_name_hash[$key];
				
				$objUpdateCategoryPlainBean = new UpdateCategoryPlainBean();
				$objUpdateCategoryPlainBean->setCategoryId($key);
     			$objUpdateCategoryPlainBean->setCategoryName($sval);
     			
     			$objClearUrl = new ClearUrl($sval);
				$objUpdateCategoryPlainBean->setCategorySeoName($objClearUrl->clear());
     			
     			$objUpdateCategoryPlain = new UpdateCategoryPlainDao();
				$objUpdateCategoryPlain->create($objUpdateCategoryPlainBean);
										   	 					
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