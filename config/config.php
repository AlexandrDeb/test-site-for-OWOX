<?php

$config = parse_ini_file(ROOT . DS . 'config' . DS . 'initial.ini');

Config::set('siteName', $config['siteName']);



Config::set('defaultRoute', $config['defaultRoute']);
Config::set('defaultController', $config['defaultController']);
Config::set('defaultAction', $config['defaultAction']);


Config::set('id', $config['id']);
Config::set('secret', $config['secret']);
Config::set('url', $config['url']);


Config::set('host', $config['host']);
Config::set('dbname', $config['dbname']);
Config::set('user', $config['user']);
Config::set('password', $config['password']);

Config::set('salt', $config['salt']);

