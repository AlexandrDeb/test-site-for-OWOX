<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');



require_once(ROOT . DS . 'lib' . DS . 'Init.php');
require_once(ROOT . DS . 'config' . DS . 'config.php');

session_start();
App::run($_SERVER['REQUEST_URI']);

//ini_set('display_errors', 1);






