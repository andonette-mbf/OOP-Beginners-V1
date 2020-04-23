<?php
/*
* This will inlcude all our
* necessary files
*/
//Load Config
require_once 'config/config.php';
//Load Libraries
//require_once 'libs/Core.php';
//require_once 'libs/Controller.php';
//require_once 'libs/Database.php';

//Autoload core libraries
spl_autoload_register(function($className){
    require_once 'libs/' . $className . '.php';
    //echo $className;
});
