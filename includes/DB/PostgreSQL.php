<?php
//ZB_Mysql

class ZB_Db_PostgreSQL
{
	private static $instance;
	public static $sessionID;
	
    protected $db;
    protected $dbhost      = SQL_DB_HOST;
    protected $dbname      = SQL_DB_NAME;
    protected $dbuser      = SQL_DB_USER;
    protected $dbpass      = SQL_DB_PASSWORD;
    
    protected $link_ID     = 0;           //result of mysql_connect()
    protected $query_ID    = 0;           //result of most recent mysql_query()
    protected $record      = array();     //current mysql_fetch_array result
    protected $row;                       //current row number
    protected $login_error = "";
      
    protected $errno       = 0;           //error state of query
    protected $error       = "";
	
	function __construct()
	{
	
	}

  	public function connect(){
    	if($this->link_ID==0);
    		$connectString = "host=".$this->dbhost." port=5432 dbname=".$this->dbname." user=".$this->dbuser." pass=".$this->dbpass ;
     		$this->link_ID=pg_connect($connectString);
    	if(!$this->link_ID)
      		$this->halt("connection failed");
    	//if(!mysql_query(sprintf("use %s", $this->dbname), $this->link_ID))
    	//	$this->halt("cannot use database");
  	} //end command
  
  	public function query($query_string){
    	$this->connect();
    	$this->query_ID = mysql_query($query_string,$this->link_ID);
    	$this->errno = mysql_errno();
    	$this->error = mysql_error();
    	if( !$this->query_ID )
      		$this->halt("ivalid SQL: ".$query_string);
    	return $this->query_ID;
  	} //end query

  	public function halt($msg){
    	printf("DB error: ". $msg. "<br />");
    	printf("MySQL error: ". $this->errno. $this->error. "<br />");
    	die("session halted");
  	} //end hald
  
  	public function nextRecord(){
    	@ $this->record = mysql_fetch_array($this->query_ID);
    	$this->row += 1;
    	$this->errno = mysql_errno();
    	$this->error = mysql_error();
    	$stat = is_array($this->record);
    	if(!$stat){
      		@mysql_free_result($this->query_ID);
      		$this->query_ID = 0;
    	}
    	return $stat;
 	} //end nextRecord
  
  	public function singleRecord(){
    	$this->record = mysql_fetch_array($this->query_ID);
   	 	$stat = is_array($this->record);
    	return $this->record;
 	} //end singleRecord
  
  	public function numRows(){
 		return mysql_num_rows($this->query_ID);
	} //end numRows
	
	
	
    function __destruct()
    {
        //close db connection
    }

	
	//returns the requested session variable
	public function __get($var)
	{
		return $_SESSION[$var];
	}
	
	//sets session variables
	public function __set($var,$val)
	{
		return ($_SESSION[$var] = $val);
	}

}

?>