<?php
//ZB_Mysql

class ZB_Db_Mysql
{
	private static $instance;
	public static $sessionid;
	
	function __construct()
	{
	
	}
	
    protected $db;
    protected $dbhost      = SQL_DB_HOST;
    protected $dbname      = SQL_DB_NAME;
    protected $dbuser      = SQL_DB_USER;
    protected $dbpass      = SQL_DB_PASSWORD;
    
    protected $link_id     = 0;           //result of mysql_connect()
    protected $query_id    = 0;           //result of most recent mysql_query()
    protected $record      = array();     //current mysql_fetch_array result
    protected $row;                       //current row number
    protected $login_error = "";
    var $affected_rows = 0; 
    protected $errno       = 0;           //error state of query
    protected $error       = "";

  	public function connect($new_link=false){
    	
     	$this->link_id=@mysql_connect($this->dbhost, $this->dbuser, $this->dbpass,$new_link);
    	
    	if (!$this->link_id) {//open failed 
    		$this->error("Could not connect to server: <b>$this->server</b>."); 
    	}
    	//if(!$this->link_id)
      	//	$this->error("connection failed");
    	if(!mysql_query(sprintf("use %s", $this->dbname), $this->link_id))
    		$this->error("cannot use database");
    		
    	// unset the data so it can't be dumped 
    	    $this->dbhost=''; 
    	    $this->dbuser=''; 
    	    $this->dbpass=''; 
    	    $this->dbname=''; 
  	} //end command
  	
  	public function close() { 
  	    if(!@mysql_close($this->link_id)){ 
  	        $this->oops("Connection close failed."); 
  	    } 
  	}
  	
  	function escape($string) { 
  	    if(get_magic_quotes_runtime()) $string = stripslashes($string); 
  	    return @mysql_real_escape_string($string,$this->link_id); 
  	}
  
  	function query($sql) { 
  	    // do query 
  	    $this->connect();
  	    $this->query_id = @mysql_query($sql, $this->link_id); 
  	
  	    if (!$this->query_id) { 
  	        $this->error("<b>MySQL Query fail:</b> $sql"); 
  	        return 0; 
  	    } 
  	     
  	    $this->affected_rows = @mysql_affected_rows($this->link_id); 
  		$this->close();
  	    return $this->query_id; 
  	}

  	public function error($msg){
  		$_SESSION['errors'][] = "DB error: ". $msg. "<br />";
  		$_SESSION['errors'][] = "MySQL error: ". $this->errno. $this->error. "<br />";
  	} //end error
  
	public function fetch_array($query_id=-1) { 
		// retrieve row 
	    if ($query_id!=-1) { 
	         $this->query_id=$query_id; 
	    } 
	 
	    if (isset($this->query_id)) { 
	        $record = @mysql_fetch_assoc($this->query_id); 
	    }else{ 
	        $this->error("Invalid query_id: <b>$this->query_id</b>. Records could not be fetched."); 
	   	} 
	 
	    return $record; 
	}
	
	public function fetch_all_array($sql) { 
	    $query_id = $this->query($sql); 
	    $out = array(); 
	
	    while ($row = $this->fetch_array($query_id, $sql)){ 
	        $out[] = $row; 
	    } 
	
	    $this->free_result($query_id); 
	    return $out; 
	}
	
	public function query_update($table, $data, $where='1') { 
	    $q="UPDATE `".$this->pre.$table."` SET "; 
	
	    foreach($data as $key=>$val) { 
	        if(strtolower($val)=='null') $q.= "`$key` = NULL, "; 
	        elseif(strtolower($val)=='now()') $q.= "`$key` = NOW(), "; 
	        else $q.= "`$key`='".$this->escape($val)."', "; 
	    } 
	
	    $q = rtrim($q, ', ') . ' WHERE '.$where.';'; 
	
	    return $this->query($q); 
	}
	
	public function query_insert($table, $data) { 
	    $q="INSERT INTO `".$this->pre.$table."` "; 
	    $v=''; $n=''; 
	
	    foreach($data as $key=>$val) { 
	        $n.="`$key`, "; 
	        if(strtolower($val)=='null') $v.="NULL, "; 
	        elseif(strtolower($val)=='now()') $v.="NOW(), "; 
	        else $v.= "'".$this->escape($val)."', "; 
	    } 
	
	    $q .= "(". rtrim($n, ', ') .") VALUES (". rtrim($v, ', ') .");"; 
	
	    if($this->query($q)){ 
	        //$this->free_result(); 
	        return mysql_insert_id($this->link_id); 
	    } 
	    else return false; 
	
	}
	
	public function free_result($query_id=-1) { 
	    if ($query_id!=-1) { 
	        $this->query_id=$query_id; 
	    } 
	    if($this->query_id!=0 && !@mysql_free_result($this->query_id)) { 
	        $this->error("Result ID: <b>$this->query_id</b> could not be freed."); 
	    } 
	}
	
  	public function nextRecord(){
    	@ $this->record = mysql_fetch_array($this->query_id);
    	$this->row += 1;
    	$this->errno = mysql_errno();
    	$this->error = mysql_error();
    	$stat = is_array($this->record);
    	if(!$stat){
      		@mysql_free_result($this->query_id);
      		$this->query_id = 0;
    	}
    	return $stat;
 	} //end nextRecord
  
  	public function singleRecord(){
    	$this->record = mysql_fetch_array($this->query_id);
   	 	$stat = is_array($this->record);
    	return $this->record;
 	} //end singleRecord
  
  	public function numRows(){
 		return mysql_num_rows($this->query_id);
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