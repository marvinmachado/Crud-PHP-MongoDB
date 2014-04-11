<?php

class Autoloader {
    
    private function __construct() 
    {
        
    }
    
    public static function loader($classe)
    {
        if(class_exists($classe)){
            return;
        }
        if(interface_exists($classe)){
            return;
        }
        include_once "class/{$classe}.php";
    }
    
    public static function register()
    {
        spl_autoload_register('Autoloader::loader');
    }    
}
