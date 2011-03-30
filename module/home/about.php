<?php

class about extends ZB_Auth_No
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __default()
	{
	
		$this->DB->query("SELECT `content` FROM `site` WHERE `class` = 'about'");
		
		if($this->DB->numRows()==1){
			$results = $this->DB->singleRecord();
			$GLOBALS['content'] = $results['content'];
		} else {
			$GLOBALS['content'] = "cannot connect to database.";
		}
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

?>
