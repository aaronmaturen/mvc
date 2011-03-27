<?php

class welcome extends ZB_Auth_No
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __default()
	{
		
	}
      
	public function welcome()
	{
      	if($_SESSION['username']!=NULL){
      		$redirect = SITE_URL."index.php?module=home&class=main";
      		header('Location: '.$redirect);
      		//exit();
      	}
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

?>
