<?php
	abstract class ZB_Auth extends ZB_Module
	{

		function __construct()
		{
			parent::__construct();
		}
		
		abstract function authenticate();

		function __destruct()
		{
			parent::__destruct();
		}
	}
?>