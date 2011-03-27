<?php

class main extends ZB_Auth_User
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __default()
	{
		if (count($_POST)) {
			$this->DB->query("INSERT INTO  `".SQL_DB_NAME."`.`message` (`username` ,`usertype` ,`message` ,`sendTime` ,`messageID`)VALUES ('".$_SESSION['username']."',  '".$_SESSION['usertype']."',  '".TRIM($_POST['message'])."', CURRENT_TIMESTAMP , NULL)");
			header("Location: ".SITE_URL."index.php?module=home&class=main");
			exit();
		}
		
		//get list of messages from server
		$rows = $this->DB->query("SELECT * FROM  `brad`.`message`");
		
		while($results = $this->DB->fetch_array($rows)){
			$GLOBALS['messages'] = $GLOBALS['messages'] . $results['username'].' - '.$results['message'].'<br />';	
		}
		
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

?>