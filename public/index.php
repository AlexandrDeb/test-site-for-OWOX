<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));
define('VIEWS_PATH', ROOT.DS.'views');

//подключаем автозагрузку классов
require_once(ROOT . DS . 'lib' . DS . 'Init.php');
require_once(ROOT . DS . 'config' . DS . 'config.php');

//$router = new Router($_SERVER['REQUEST_URI']);


App::run($_SERVER['REQUEST_URI']);

ini_set('display_errors', 1);
