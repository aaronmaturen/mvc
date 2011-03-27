<?php
//ZB_Session

class ZB_Session
{
	private static $instance;
	public static $sessionID;
	
	private function __construct()
	{
		session_start();
		self::$sessionID = session_id();
	}
	
	public static function singleton()
	{
		if (!isset(self::$instance)) {
			$className = __CLASS__;
			self::$instance = new $className;
		}
		
		return self::$instance;
	}
	
	public function destroy()
	{
		/*foreach ($_SESSION as $var => $val){
			$_SESSION[$var] = null;
		}*/
		session_destroy();
	}
	
	//disable PHP5's cloning feature
	public function __clone()
	{
		//echo('Clone is not allowed for '.__CLASS__,E_USER_ERROR);
	}
	
	//returns the requested session variable
	public function __get($var)
	{
		return $_SESSION[$var];
	}
	
	//sets session variables
	public function __set($var,$val)
	{
		return ($_SESSION[$var] = $val);
	}
	
	public function __destruct()
	{
		session_write_close();
	}

}

?>