<?php

//ZB_Auth_User

abstract class ZB_Auth_User extends ZB_Auth
{
	function __construct()
	{
		parent::__construct();
	}
	
	function authenticate()
	{
		return (isset($_SESSION['username']));
	}
	
	function __destruct()
	{
		parent::__destruct();
	}
}

?>