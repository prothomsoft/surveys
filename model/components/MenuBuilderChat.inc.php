<?php
require_once(dirname(__FILE__)."/config.inc.php");
require_once(dirname(__FILE__)."/session.inc.php");
require_once("model/components/MenuBuilderPL.inc.php");
require_once("model/TopicDao.inc.php");
require_once("model/TopicBean.inc.php");

$objAppSession=new AppSession();
$SN = $objAppSession->getSession('SN');

/**
 * Generate HTML for multi-dimensional menu from MySQL database
 * with ONE QUERY and WITHOUT RECURSION 
 * @author J. Bruni
 */
class MenuBuilderChat
{
	/**
	 * MySQL connection
	 */
	var $conn;
	
	/**
	 * Menu items
	 */
	var $items = array();
	
	/**
	 * HTML contents
	 */
	var $html  = array();
	
	/**
	 * Create MySQL connection
	 */
	function MenuBuilderChat()
	{
		$this->conn = mysql_connect( $GLOBALS['host'], $GLOBALS['usr'], $GLOBALS['pass'] );
		@mysql_query("set names 'latin2'",$this->conn);
		mysql_select_db( $GLOBALS['dsn'], $this->conn );
	}
	
	/**
	 * Perform MySQL query and return all results
	 */
	function fetch_assoc_all( $sql )
	{
		$result = mysql_query( $sql, $this->conn );
		
		if ( !$result )
			return false;
		
		$assoc_all = array();
		
		while( $fetch = mysql_fetch_assoc( $result ) )
			$assoc_all[] = $fetch;
		
		mysql_free_result( $result );
		
		return $assoc_all;
	}
	
	/**
	 * Get all menu items from database
	 */
	function get_menu_items()
	{
		// Change the field names and the table name in the query below to match tour needs
		$sql = 'SELECT UC.UpdateCategoryId, UC.FatherId, UC.Name, UC.IsModule, UC.ListOrder FROM UpdateCategory UC WHERE 1=1 ORDER BY UC.FatherId, UC.ListOrder;';
        return $this->fetch_assoc_all( $sql );
	}
	
	/**
	 * Build the HTML for the menu 
	 */
	function get_menu_html( $root_id = 0, $id1)
	{
		$this->html  = array();
		$this->items = $this->get_menu_items();
		
		foreach ( $this->items as $item )
			$children[$item['FatherId']][] = $item;
		
		// loop will be false if the root has no children (i.e., an empty menu!)
		$loop = !empty( $children[$root_id] );
		
		// initializing $parent as the root
		$parent = $root_id;
		$parent_stack = array();
		
		// HTML wrapper for the menu (open)
		$this->html[] = '<ul id="menu100">';
		
		while ( $loop && ( ( $option = each( $children[$parent] ) ) || ( $parent > $root_id ) ) )
		{
			if ( $option === false )
			{
				$parent = array_pop( $parent_stack );
				
				// HTML for menu item containing childrens (close)
				$this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 ) . '</ul>';
				$this->html[] = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ) . '</li>';
			}
			elseif ( !empty( $children[$option['value']['UpdateCategoryId']] ) )
			{
				$tab = str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 );
				// HTML for menu item containing childrens (open)
				$this->html[] = sprintf(
					'%1$s<li class="active"><a href="%2$s">%3$s <span class="glyphicon arrow"></span></a>',
					$tab,   // %1$s = tabulation
					$option['value']['Url'],   // %2$s = link (URL)
					htmlspecialchars_decode($option['value']['Name'])   // %3$s = title
				); 
				$this->html[] = $tab . "\t" . '<ul>';
				array_push( $parent_stack, $option['value']['FatherId'] );
				$parent = $option['value']['UpdateCategoryId'];
			}
			else {
				// HTML for menu item with no children (aka "leaf")
				
				$objTopicDao = new TopicDao();
                $uploadCategoryId = $option['value']['UpdateCategoryId'];
                $objTopicBean = $objTopicDao->readByUploadCategoryId($uploadCategoryId);
                $topicId = $objTopicBean->getTopicId();
                
                if($id1 != "") {
                    $url = $topicId.".html";    
                } else {
                    $url = "lesConsultationsEnCoursChat/".$topicId.".html";
                }
                
                
                $this->html[] = sprintf(
					'%1$s<li><a style="color: black" href="%2$s">%3$s</a></li>',
					str_repeat( "\t", ( count( $parent_stack ) + 1 ) * 2 - 1 ),   // %1$s = tabulation
					$url,   // %2$s = link (URL)
					htmlspecialchars_decode($option['value']['Name'])   // %3$s = title
				);
			}
		}
		
		// HTML wrapper for the menu (close)
		$this->html[] = '</ul>';
		
		return implode( "\r\n", $this->html );
	}
}?>