<?php

//logout
class logout extends ZB_Auth_No
{
    function __construct()
    {
        parent::__construct();
    }

    function __default()
    {	
        session_destroy();
        if (isset($_GET['pg'])) {
            $go = urldecode($_GET['pg']);
        } else {
            $go = SITE_URL;         
        }

        header("Location: $go");
        exit();
        
    }

    function __destruct()
    {
        parent::__destruct();
    }
}

?>
