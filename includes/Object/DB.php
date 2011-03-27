<?php

//include db file?
abstract class ZB_Object_DB extends ZB_Object
{
    
    public function __construct()
    {
        parent::__construct();
        $dbInstance = "ZB_DB_".SQL_DB_TYPE;
        $this->DB = new $dbInstance;
        //connect to db
	}
	
	public function __destruct()
    {
        parent::__destruct();
        //close db connection
    }
}

?>
