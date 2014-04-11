<?php

class ConnectMongoDB {
    private static $instance = null;
    
    private function __construct() 
    {

    }
    
    public static function getInstance()
    { 
        if( NULL == self::$instance){
            self::$instance = new Mongo();
        }
        
        return self::$instance; 
    }        
    
}
