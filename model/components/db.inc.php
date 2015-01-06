<?php
require_once(dirname(__FILE__)."/config.inc.php");
class DB
{
	private $QUERY_ID = 0;
	private $RECORD   = array();
	private $ERRNO	  = 0;
	private $ERROR	  = "";

	function __construct()
	{
		$this->HOST=$GLOBALS['host'];
		$this->DSN=$GLOBALS['dsn'];
		$this->USR=$GLOBALS['usr'];
		$this->PASS=$GLOBALS['pass'];
	}
	function connect()
	{
		if (0==$this->LINK_ID)
		{
			$this->LINK_ID=mysql_connect($this->HOST,$this->USR,$this->PASS);
			mysql_select_db($this->DSN,$this->LINK_ID);
			mysql_query("SET NAMES latin2");
		}
		if(!$this->LINK_ID)
		{
			$this->halt("database connection failed");
		} 
	}

	function connect_utf8()
	{
		if (0==$this->LINK_ID)
		{
			$this->LINK_ID=mysql_connect($this->HOST,$this->USR,$this->PASS);
			mysql_select_db($this->DSN,$this->LINK_ID);
			mysql_query("SET NAMES utf8");
		}
		if(!$this->LINK_ID)
		{
			$this->halt("database connection failed");
		} 
	}

	public function query($sQuery)
	{
		$this->connect();
		$this->QUERY_ID = mysql_query($sQuery,$this->LINK_ID);
		$this->ERROR = mysql_error($this->LINK_ID);
		$this->ERRNO = mysql_errno($this->LINK_ID);
		if(!$this->QUERY_ID)
		{
			$this->halt("Invalid query");
		}
		return $this->QUERY_ID;
	}

	public function numRows()
	{
		return mysql_num_rows($this->QUERY_ID);
	}
	
	private function halt($sMsg)
	{
		printf("<B>Database error:</b> %s<br>\n",$sMsg);
		printf("%s (%s)<br>\n",$this->ERRNO,$this->ERROR);
		die("Session halted.");
	}

	private function move()
	{
		//$this->ROW += $pntr;
		$this->connect();
		$this->RECORD = mysql_fetch_array($this->QUERY_ID);
		if (!$this->RECORD)
		{
			return FALSE;
		}
		else
		{
			return TRUE;	
		}
	}

	public function move_next()
	{
		return $this->move();
	}

	public function getField($sFieldName)
	{
		$this->connect();
		if (!$this->RECORD){
		$this->RECORD = mysql_fetch_array($this->QUERY_ID);}
		if (!$this->RECORD)
		{
			return "";
		}
		if (is_string($sFieldName))
		{
			return $this->RECORD["$sFieldName"];
		}
		elseif (is_int($sFieldName))
		{
			return (string)$this->RECORD[$sFieldName];
		}
		else
		{
			echo("Illegal field identiefer<br>");
			return FALSE;
		}
	}

        public function getLast()
        {
           return mysql_insert_id($this->LINK_ID);
        }
	
        public function close()
	{
		mysql_close($this->LINK_ID);
	}
}
?>
