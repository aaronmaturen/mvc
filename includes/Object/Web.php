<?php

// ZB_Object_Web

abstract class ZB_Object_Web extends ZB_Object_DB
{
    protected $user;
	//protected $session;
    
    public function __construct()
    {
        parent::__construct();
    }

    public function __destruct()
    {
        parent::__destruct();
    }
    
    
}

?>