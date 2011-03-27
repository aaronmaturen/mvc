<?php

class ZB_Presenter_default extends ZB_Presenter_Common
{
	private $template = null;
	private $path = null;
	//public $errors = array();
	
	public function __construct(ZB_module $module)
	{
		parent::__construct($module);
		$this->path = ZB_BASE_PATH.'/tpl';
		$this->template_dir = $this->path.'/'.'templates';
	}
	
	public function display()
	{
		$path = ZB_BASE_PATH.'/module/'.$this->module->moduleName.'/tpl';
		$tplFile = $this->module->className.'.tpl';
		$tplName = "Barna";
		
		$tplPath = $path.'/'.$tplFile;
		$tplPathLeft = 'file:/User/atmaturen/Sites/mvc/module/welcome/tpl/welcome.tpl';
		$defaultTemplate = ZB_BASE_PATH.'/tpl/templates/'.$tplName.'/'.$tplName.'.php';
		$defaultCSS = 'file:'.ZB_BASE_PATH.'/tpl/templates/'.$tplName.'/'.$tplName.'.css';
		
		if(file_exists($defaultTemplate)){	
			include($defaultTemplate);
		}
	}
	
	public function __destruct()
	{
		parent::__destruct();
	}
}

?>
