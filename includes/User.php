<?php

//ZB_User


class ZB_User extends ZB_Object_DB
{
	public $username;
	public $firstname;
	public $lastname;
	public $birthyear;
	public $email;
	public $password;
	public $type;
	public $disabled;
	
	public function __construct()
	{
		echo "User";	
		parent::__construct();
		if($username == null) {
			
			if (!is_numeric($session->username)) {
				$username = 0;
			} else {
				$username = $session->username;
				$sql = "SELECT * FROM user WHERE username=".$username;
							  
				$result = $this->DB->query($sql);
				$this->setFrom($result);
			}
		}
	}

	public function __destruct()
	{
		parent::__destruct();
	}
}

?>