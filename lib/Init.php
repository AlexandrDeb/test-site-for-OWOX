<?php


function myAutoload($className){
    $libPath = ROOT.DS.'lib'.DS.ucfirst($className).'Class.php';
    $controllersPath = ROOT.DS.'controllers'.DS.str_replace('controller', '', ucfirst($className)).'Controller.php';
    $modelPath = ROOT.DS.'models'.DS.ucfirst($className).'.php';

    if ( file_exists($libPath) ){
        require_once($libPath);
    } elseif ( file_exists($controllersPath) ){
        require_once($controllersPath);
    } elseif ( file_exists($modelPath) ){
        require_once($modelPath);
    } else {
        throw new Exception('Failed to include class: '.$className);
    }
}

spl_autoload_register('myAutoload');