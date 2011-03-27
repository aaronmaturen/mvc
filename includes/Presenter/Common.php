<?php

//ZB_Presenter_Common
abstract class ZB_Presenter_Common extends ZB_Object_Web
{
    protected $module;
    public function __construct(ZB_module $module)
    {
        parent::__construct();
        $this->module = $module;
    }

    abstract public function display();

    public function __destruct()
    {
    	parent::__destruct();
    }
}

?>