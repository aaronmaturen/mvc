<?php
//FR_Auth_Strict
//Forces User to not be logged in

abstract class ZB_Auth_Strict extends ZB_Auth
{
	function __construct()
	{
		parent::__construct();
	}

	function authenticate()
	{
		if($_SESSION['username']!=NULL){
			$redirect = SITE_URL."index.php?module=home&class=main";
			header('Location: '.$redirect);
		}
	
		return true;
	}

 	function __destruct()
	{
		parent::__destruct();
	}
}

?>