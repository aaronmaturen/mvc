<?php

//whoami
class whoami extends ZB_Auth_User
{
    public function __construct()
    {
        parent::__construct();
    }

    public function __default()
    {
        $this->set('user',$this->user);
        if ($_GET['output'] == 'rest') {
            $this->presenter = 'rest';
        }         
    }

    public function __destruct()
    {
        parent::__destruct();
    }
}

?>
