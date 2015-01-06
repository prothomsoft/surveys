<?php
/** 
 * Session Class
 *
 * session management handle by facade
 *
 * @author       michal amerek <amer@tlen.pl>
 * @package      meHowCom
 * @since        meHowCom v 2.0.1
 * @version      $Revision: 2 $
 * @modifiedby   $LastChangedBy: ameros $
 * @lastmodified $Date: 2006-04-22 12:50 $ 
 */
class appSession
{
	function __construct(){
	   if(!session_id()) {
			session_start();
			session_write_close();
		} else {
            session_regenerate_id(false);
		}
	}

	function setSession($var,$val){
		$_SESSION[$var] = &$val;
	}

	function getSession($var){
		return $_SESSION[$var];
	}

	/**
         * not to display warning while session files deletion try 
	 * when permissions for the folder do not allow to delete them. Still 
         * session variables are cleaned
	 */
	function destroySession(){
		//@session_destroy();
		//unset($_SESSION);
		$this->unsetSession('User');
	}

	function unsetSession($var){
		unset($_SESSION[$var]);
	}
}
?>
