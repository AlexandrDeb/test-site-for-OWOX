<?php

define('DS', DIRECTORY_SEPARATOR);
define('ROOT', dirname(dirname(__FILE__)));

//подключаем автозагрузку классов
require_once(ROOT . DS . 'lib' . DS . 'Init.php');
require_once(ROOT . DS . 'config' . DS . 'config.php');

$router = new Router($_SERVER['REQUEST_URI']);
echo "<pre>";
print_r("Route :" . $router->getRoute() . PHP_EOL);
print_r("Controller :" . $router->getController() . PHP_EOL);
print_r("Action :" . $router->getAction() . PHP_EOL);
print_r($router->getParams());




