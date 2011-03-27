<?php

class login extends ZB_Auth_Strict
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __default()
    {
        
        if (count($_POST)) {
			$this->DB->query("SELECT * FROM user WHERE email = '".$_POST['email']."' AND password = '".md5($_POST['password'])."'");
    
			if($this->DB->numRows()==1){
				$results = $this->DB->singleRecord();
				
				foreach ($results as $field => $data){
					if(!is_numeric($field)){
						$_SESSION[$field] = $data;
						//echo $field.": ".$data."<br />";
					}
				}
				
				header("Location: ".SITE_URL);
				exit();

			} else {
				$_SESSION['errors'][] = 'invalid email or password.';
			}//end if
   		 }
   	}

    public function __destruct()
    {
        parent::__destruct();
    }
}


?>
