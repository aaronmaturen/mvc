<?php

// ZB_Presenter_debug

class ZB_Presenter_debug extends ZB_Presenter_Common
{
     
    public function __construct(ZB_module $module)
    {
    	parent::__construct($module);
    }
      
    public function display()
    {
        //$vars = array('_POST','_GET','_COOKIE','_SESSION','_SERVER');
        foreach ($vars as $var) {
            $array = $$var;
            if (is_array($array) && count($array)) {
                  echo '<h2>$'.$var.'</h2>'."\n";
                  echo '<pre>';
                  var_dump($array);
                  echo '</pre>';
            }
        }
    }
      
    public function __destruct()
    {
        parent::__destruct();
    }
}

?>