<?php

//ZB_Presenter_rest
  
require_once('XML/Serializer.php');

  //displays module's data in valid XML rather than HTML

class FR_Presenter_rest extends FR_Presenter_Common
{

    public function __construct(FR_module $module)
    {
        parent::__construct($module);
    }
    
      //Output data array using the PEAR package XML_Serializer. This may
    public function display()
    {
        $xml = new XML_Serializer();
        $xml->serialize($this->module->getData());

        header("Content-Type: text/xml");
        echo '<?xml version="1.0" encoding="UTF-8" ?>'."\n";
        echo $xml->getSerializedData()
    }
    
    public function __destruct()
    {
        parent::__destruct();
    }
 
}

?>
