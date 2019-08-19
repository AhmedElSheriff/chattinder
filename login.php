<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

include 'connect.php';
include 'db.php';

$data = file_get_contents("php://input");
$obj = json_decode($data);

$db = new DB();

if(!isset($obj->{'username'}) || $obj->{'username'} == ""){
       print "{\"status\":0,\"message\":\"Username is Missing!\"}";
   } elseif (!isset ($obj->{'password'}) || $obj->{'password'} == "") {
       print "{\"status\":0,\"message\":\"Password is Missing!\"}";
} else {
    
    $username = $obj->{'username'};
    $password = $obj->{'password'};
           
    $db->loginIn(Connect::getInstance(),$username,$password);
       
}
