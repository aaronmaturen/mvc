<?php
require_once('config.php');

session_start();
$_SESSION['errors'] = array();
$_SESSION['alerts'] = array();

function __autoload($class){
	$temp = substr($class,2);
	
	if ($temp != "" && $temp){
		$file = str_replace('_','/',$temp).'.php';
	  require_once(ZB_BASE_PATH.'/includes'.$file);
	}
}

if (isset($_GET['module'])) {
	$module = $_GET['module'];
	if (isset($_GET['event'])){
		$event = $_GET['event'];
	} else {
		$event = '__default';
	}
	
	if (isset($_GET['class'])) {
		$class = $_GET['class'];
	} else {
		$class = $module;
	}
}else {
	//defaults to welcome module
	$module = 'home';
	$class = $event = 'welcome';
}

$classFile = ZB_BASE_PATH.'/module/'.$module.'/'.$class.'.php';


if(file_exists($classFile)) {
	require_once($classFile);
	
	if(class_exists($class)) {
		$instance = new $class();
		if (!ZB_module::isValid($instance)) {
			die ("Requested module is not a valid framework module!");
		}
	
		$instance->moduleName = $module;
		$instance->className = $class;
		if ($instance->authenticate()) {

			$instance->$event();
			
			$presenter = ZB_Presenter::factory($instance->presenter,$instance);
			//echo is_array($_SESSION['errors'])?"Y":"N";
			$presenter->display();
		
		} else {
			die("You do not have access to the requested module!");
		}
	}else {
		die("A valid module for your request was not found");
	}
} else {
	die("Could not find: $classFile");
}

	
?>