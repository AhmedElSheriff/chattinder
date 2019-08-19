
<?php
    include 'connect.php';
    include 'db.php';
    $db = new DB();
    $data = file_get_contents("php://input");
    $obj = json_decode($data);
    
    
  
    
    
   if(!isset($obj->{'email'}) || $obj->{'email'} == ""){
       print "{\"status\":0,\"message\":\"Email is Missing!\"}";
   } elseif (!isset ($obj->{'displayname'}) || $obj->{'displayname'} == "") {
       print "{\"status\":0,\"message\":\"Display Name is Missing!\"}";
} elseif (!isset ($obj->{'username'}) || $obj->{'username'} == "") {
       print "{\"status\":0,\"message\":\"Username is Missing!\"}";
} elseif (!isset ($obj->{'password'}) || $obj->{'password'} == "") {
       print "{\"status\":0,\"message\":\"Password is Missing!\"}";
} else {
    
    
    $email = $obj->{'email'};
    $displayname = $obj->{'displayname'};
    $username = $obj->{'username'};
    $password = $obj->{'password'};
           
    $db->insertNewUser(Connect::getInstance(),$email,$displayname,$username,$password);
       
}
