<?php

abstract class ZB_Object
{
    protected $me;

    public function __construct()
    {
        //$this->log = Log::factory('file',FR_LOG_FILE);
        $this->me = new ReflectionClass($this);
    }

    public function setFrom($data)
    {
        if (is_array($data) && count($data)) {
            $valid = get_class_vars(get_class($this));
            foreach ($valid as $var => $val) {
                if (isset($data[$var])) {
                    $this->$var = $data[$var];
                }
            }
        }
    }

    public function toArray()
    {
        $defaults = $this->me->getDefaultProperties();
        $return = array();
        foreach ($defaults as $var => $val) {
            if ($this->$var instanceof ZB_Object) {
                $return[$var] = $this->$var->toArray();
            } else {
                $return[$var] = $this->$var;
            }
        }
  
        return $return;
    }

    public function __destruct()
    {
       // if ($this->log instanceof Log) {
       //     $this->log->close();
       // }
    }
}

?>
