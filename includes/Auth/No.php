<?php
  //FR_Auth_No
  abstract class ZB_Auth_No extends ZB_Auth
  {
      function __construct()
      {
          parent::__construct();
      }

      function authenticate()
      {
          return true;
      }

      function __destruct()
      {
          parent::__destruct();
      }
  }

?>