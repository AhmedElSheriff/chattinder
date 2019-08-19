<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class Connect{
    
    
    private static $instance = null;

    private function __construct() {    }
    
    
    public static function getInstance(){
        $username = "chat_admin";
        $password = "12345678";
        $database = "chatinder";
        $hostname = "localhost";
        if(self::$instance == null){
            try {
                self::$instance = new PDO("mysql:host=$hostname;dbname=$database", $username, $password);
                self::$instance->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
                //print 'Connected!';
            } catch (PDOException $ex) {
                echo $ex->getMessage();
            }
            
        }
        return self::$instance;
    }
    
}


