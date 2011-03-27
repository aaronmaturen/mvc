<?php

class ZB_Presenter
{

	static public function factory($type,ZB_Module $module)
	{
		
		$file = 'Presenter/'.$type.'.php';
		include($file);
		
		$class = 'ZB_Presenter_'.$type;

		if (class_exists($class)) {
			
			$presenter = new $class($module);
			if ($presenter instanceof ZB_Presenter_Common) {
				return $presenter;
			}
			
		} else {
			die("invalid template system.");
		}
	}
}

?>