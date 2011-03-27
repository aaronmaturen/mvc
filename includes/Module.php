<?php

abstract class ZB_Module extends ZB_Object_Web
{
	//$presenter used to determine which presentation class should be used for the module
	public $presenter = 'default';
	
	//Data set by module to pass to view
	protected $data = array();
	
	//name of module or class
	public $name;
	
	//name of template file
	public $tplFile;
	
	//name of requested module
	public $moduleName = null;
	
	//name of outer module template
	public $moduleTemplateFile = null;
	
	public function __construct()
	{
		parent::__construct();
		
	}
	
	//this function is ran by the controller if an event isnt specified
	abstract public function __default();
	
	protected function set($var,$val){
		$this->data[$var] = $val;
	}
	
	//returns module data
	public function getData(){
		return $this->data;
	}
	
	public static function isValid($module)
	{
		return (is_object($module) &&
				$module instanceof ZB_module &&
				$module instanceof ZB_Auth);
	}
	
	public function __destruct()
	{
		parent::__destruct();
	}
}

?>