<?php

//ZB_Presenter_smarty

require_once(SMARTY_DIR.'Smarty.class.php');

class ZB_Presenter_smarty extends ZB_Presenter_Common
{
	private $template = null;
	private $path = null;
	
	public function __construct(ZB_module $module)
	{
		parent::__construct($module);
		$this->path = ZB_BASE_PATH.'/tpl';
		$this->template = new Smarty();
		$this->template->compile_check = false;
		$this->template->debugging = false;
		$this->template->caching = SMARTY_CACHE_moduleS;
		$this->template->template_dir = $this->path.'/'.'templates';
		$this->template->compile_dir = $this->path.'/'.'templates_c';
		$this->template->cache_dir = $this->path.'/'.'cache';
		$this->template->config_dir = $this->path.'/'.'config';
	}
	
	public function display()
	{
		$path = ZB_BASE_PATH.'/module/'.$this->module->moduleName.'/tpl';
		$tplFile = $this->module->className.'.tpl';
		$tplName = "Default";
		
		$tplPath = $path.'/'.$tplFile;
		$tplPathLeft = 'file:/User/atmaturen/Sites/mvc/module/welcome/tpl/welcome.tpl';
		$defaultTemplate = 'file:'.ZB_BASE_PATH.'/tpl/templates/'.$tplName.'/'.$tplName.'.tpl';
		$defaultCSS = 'file:'.ZB_BASE_PATH.'/tpl/templates/'.$tplName.'/'.$tplName.'.css';

		$this->template->assign('modulePath',$path);
		$this->template->assign('tplPathRight',$tplPath);
		$this->template->assign('tplPathLeft',$tplPathLeft);
		$this->template->assign('defaultTemplate',$defaultTemplate);
		$this->template->assign('defaultCSS',$defaultCSS);
		$this->template->assign('columns',2);
		//$this->user->username = 123;
		
		$this->template->assign('user',$this->user);
		$this->template->assign('username',$_SESSION['username']);
		//$this->template->assign('content'.$tplPath);
			
		foreach ($this->module->getData() as $var => $val) {
			if (!in_array($var, array('path','tplfile'))) {
				$this->template->assign($var,$val);
			}
		}
		
		if ($this->module->moduleTemplateFile == null){
			$moduleTemplateFile = "module.tpl";
		} else {
			$moduleTemplateFile = $this->module->moduleTemplateFile;
		}
		
		
		//echo $tplPath.'<br />'.$defaultTemplate.'<br />';
		
		$this->template->display($defaultTemplate);
	}
	
	public function __destruct()
	{
		parent::__destruct();
	}
}

?>