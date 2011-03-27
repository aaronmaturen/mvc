<?php

class about extends ZB_Auth_No
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __default()
	{
	
		$this->DB->query("SELECT about FROM site WHERE SITE_NAME = '".SITE_NAME."'");
		
		if($this->DB->numRows()==1){
			$results = $this->DB->singleRecord();
			$GLOBALS['about'] = $results['about'];
		} else {
			$GLOBALS['about'] = "cannot connect to database.";
		}
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

?>