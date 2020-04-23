<?php

//DB params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', 'root');
define('DB_NAME', 'davemvc');

/*
 * App Root
 * __FILE__ gets the path to this file
 * dirname gets the Directory
 * a second dirname is going up a level
 * whatever gets us to the app root
 * then create a constant
 */

define('APPROOT', dirname(dirname(__FILE__)));

//URL Root
define('URLROOT', 'http://localhost:8888/Dave-MVC');

//Site Name
define('SITENAME', 'Dave MVC');
