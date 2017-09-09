<?php

class DB
{

    public static function getConnection()
    {
        // Устанавливаем соединение
        $dsn = 'mysql:host='.Config::get('host').';dbname='.Config::get('dbname');
        $db = new PDO($dsn, Config::get('user'), Config::get('password'));

        // Задаем кодировку
        $db->exec("set names utf8");

        return $db;

    }
    
    
    
    
    

}

