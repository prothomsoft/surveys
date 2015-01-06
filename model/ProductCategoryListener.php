<?php
require_once("ProductCategoryDao.inc.php");
require_once("ProductCategoryGateway.inc.php");
require_once("ProductCategoryBean.inc.php");

require_once("ProductCategoryPlainGateway.inc.php");
require_once("ProductCategoryPlainDao.inc.php");
require_once("ProductCategoryPlainBean.inc.php");

require_once("components/clear_url.inc.php");

class model_ProductCategoryListener extends MachII_framework_Listener
{
	private $category_name_hash;
	private $parent_id_hash;
    private $children_hash;
    	
    function configure() {}
    
    /* PRODUCT CATEGORIES IN ADMIN PANEL START */ /* PRODUCT CATEGORIES IN ADMIN PANEL START */ /* PRODUCT CATEGORIES IN ADMIN PANEL START */
    function getAdminCategoriesPath(&$event) {
    	$objProductCategory = new ProductCategoryDAO();
		if($event->isArgDefined('categoryId') && $event->getArg('categoryId') > 0) {
			$father = $event->getArg('categoryId');
			$counter = 0;
			do {
				$category = $objProductCategory->read($father);
	 			$grandfather = $category->getFatherId();
	 					 				
	 			if($counter == 0) {
	 				$adminCategoriesPath = "<a href=\"#\" class=\"isActive\">".stripslashes($category->getName())."</a>";
	 			}
	 			else {
	 				if($event->getArg('categoryId') != $father)	{
	 					$adminCategoriesPath = "<a href=\"index.php?event=".$event->getArg('event')."&categoryId=".$category->getProductCategoryId()."&categoryName=".stripslashes($category->getName())."\">".stripslashes($category->getName())."</a> > ".$adminCategoriesPath."";
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
    	$objProductCategoryGateway = new ProductCategoryGateway();
    	$arrProductCategoriesObjs = $objProductCategoryGateway->findByFatherId($categoryId);
    	$event->setArg('arrProductCategoriesObjs',$arrProductCategoriesObjs);
    }
    
    function updateCategories(&$event) {
       // parse the categories array to update -------------------------------->
       $categories_id = $event->getArg('categories_id');
       $categories = $event->getArg('categories');
       $old_categories = $event->getArg('old_categories');
       $old_description = $event->getArg('old_description');
       $old_descr = $event->getArg('old_descr');
       $description = $event->getArg('description');
       $descr = $event->getArg('descr');
       $categoryId = $event->getArg('categoryId');
                     
	   $i = 0;
	   while($i < count($categories)) {
	   		if($categories[$i] != $old_categories[$i] || $old_description[$i] != $description[$i]  || $old_descr[$i] != $descr[$i]) {
				
				// get numberOfItems first - if not we update the number with null -------------------------------->
				$objProductCategory = new ProductCategoryDAO();
       			$category = $objProductCategory->read($categories_id[$i]);
       			$numberOfItems = $category->getNumberOfItems();
       							
				$objProductCategoryBean = new ProductCategoryBean();
				$objProductCategoryBean->setProductCategoryId($categories_id[$i]);
				
				$categoryName = addslashes($categories[$i]); 
     			$objProductCategoryBean->setName($categoryName);
     			
     			$descr1 = addslashes($descr[$i]); 
     			$objProductCategoryBean->setDescr($descr1);
     			
     			$objClearUrl = new ClearUrl($categoryName);
				$objProductCategoryBean->setSeoName($objClearUrl->clear());
     			
			    $objProductCategoryBean->setListOrder($description[$i]);
			    $objProductCategoryBean->setFatherId($categoryId);
			    $objProductCategoryBean->setNumberOfItems($numberOfItems);
			    			    
			    $objProductCategory = new ProductCategoryDAO();
				$objProductCategory->update($objProductCategoryBean);
			}
			$i++;
	   }
		
	   // parse the categories array to delete -------------------------------->
	   $delete = $event->getArg('delete');
	   $i = 0;
	   while($i < count($delete)) {
	      	if($delete[$i]) {
	      		$objProductCategory = new ProductCategoryDAO();
				$objProductCategory->delete($delete[$i]);				
		   	}
			$i++;
	   }
	   
	   // add new category (if present) --------------------------------------->
	   $new_category = $event->getArg('new_category');
	   $cat_description = $event->getArg('cat_description');
	   $new_descr = $event->getArg('new_descr');
	   
	   if($new_category) {
	   	  	if(!$event->isArgDefined('categoryId')) {
	   	  		$categoryId = 0;
	   	  		$event->setArg('categoryId', $categoryId);
	   	  	}
	   	  	
	   	  	$objProductCategoryBean = new ProductCategoryBean();
			$objProductCategoryBean->setFatherId($categoryId);
			
			$categoryName = addslashes($new_category);
     		$objProductCategoryBean->setName($categoryName);
     		
     		$new_descr = addslashes($new_descr);
     		$objProductCategoryBean->setDescr($new_descr);
     		
     		$objClearUrl = new ClearUrl($new_category);
			$objProductCategoryBean->setSeoName($objClearUrl->clear());
     		
		    $objProductCategoryBean->setListOrder($cat_description);
			   	  	
	   	  	$objProductCategory = new ProductCategoryDAO();
			$ProductCategoryId = $objProductCategory->create($objProductCategoryBean);
	   }
    }
    
    function createPlainCategories(&$event) {
    	$this->category_name_hash = "";
    	$this->parent_id_hash = "";
    	$this->children_hash = "";
    	
    	// get categories ordered by ListOrder ASC ---------------------------------->
    	$objProductCategoryGateway = new ProductCategoryGateway();
    	$arrProductCategoriesObjs = $objProductCategoryGateway->findAllOrderedByListOrder();
    	
    	for( $i = 0; $i < count($arrProductCategoriesObjs); $i++) {
    		$category_id = $arrProductCategoriesObjs[$i]->getProductCategoryId();
    		$this->category_name_hash[$category_id] = $arrProductCategoriesObjs[$i]->getName();
    		$this->parent_id_hash[$category_id] = $arrProductCategoriesObjs[$i]->getFatherId();
    		@$this->children_hash[$this->parent_id_hash[$category_id]]++;
    	}
    	   	
    	// clear categories plain content ---------------------------------->
    	$objProductCategoryPlainGateway = new ProductCategoryPlainGateway();
    	$objProductCategoryPlainGateway->removeAll();
    	
    	// runs dump children procedure recursive function ----------------->
    	if (count($arrProductCategoriesObjs) != 0) {
			$this->dump_children(0);
    	}
    }
    
    function dump_children($id) {
    	static $indent;
		reset($this->parent_id_hash);
		while (list($key, $val) = each($this->parent_id_hash)) {
			if ($val == $id) {
				$sval = ''.$indent.$this->category_name_hash[$key];
				
				$objProductCategoryPlainBean = new ProductCategoryPlainBean();
				$objProductCategoryPlainBean->setProductCategoryId($key);
     			$objProductCategoryPlainBean->setProductCategoryName($sval);
     			
     			$objClearUrl = new ClearUrl($sval);
				$objProductCategoryPlainBean->setProductCategorySeoName($objClearUrl->clear());
     			
     			$objProductCategoryPlain = new ProductCategoryPlainDao();
				$objProductCategoryPlain->create($objProductCategoryPlainBean);
										   	 					
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
    /* PRODUCT CATEGORIES IN ADMIN PANEL END */ /* PRODUCT CATEGORIES IN ADMIN PANEL END */ /* PRODUCT CATEGORIES IN ADMIN PANEL END */
}
?>