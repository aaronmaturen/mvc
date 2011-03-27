<?php

class registration extends ZB_Auth_Strict
{
	public function __construct()
	{
		parent::__construct();
	}

	public function __default()
	{

    	if (count($_POST)) {
    	
			$this->DB->query("INSERT INTO `".SQL_DB_NAME."`.`user` (`username`, `firstname`, `lastname`, `birthyear`, `email`, `password`, `usertype`) VALUES ('".$_POST['username']."', '".$_POST['firstname']."', '".$_POST['lastname']."', '".$_POST['birthyear']."', '".$_POST['email']."', '".md5($_POST['password'])."', 'user')");
    
    		$_SESSION['username'] = $_POST['username'];
    		$_SESSION['firstname'] = $_POST['firstname'];
    		$_SESSION['lastname'] = $_POST['lastname'];
    		$_SESSION['birthyear'] = $_POST['birthyear'];
    		$_SESSION['email'] = $_POST['email'];
    		$_SESSION['password'] = md5($_POST['password']);
    		
    			header("Location: ".SITE_URL);
    			exit();
   			
		} else {
			//$_SESSION['errors'][] = 'invalid email or password.';
			//exit();
		}//end if
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}


?>
