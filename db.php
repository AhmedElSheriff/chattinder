<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class DB{
    
    public function insertNewUser($pdo,$email,$displayname,$username,$password){
        
        $findQuery = "SELECT count(*) FROM users where email = '$email' OR username = '$username'";
        $stmt = $pdo->prepare($findQuery);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if($count == 0){
            
            try {
                $query = "INSERT INTO users (email, displayname, username, password) VALUES ('$email', '$displayname', '$username', '$password')";
                $stmt = $pdo->prepare($query);
                $stmt->execute();
                print "{\"status\":1,\"message\":\"Account Created Successfully!\"}";
            } catch (PDOException $ex) {
                $ex->getMessage();
            }
        
        } else {
            print "{\"status\":2,\"message\":\"Account Already Exists, Please Login!\"}";
        }
        
        
    }
    
    public function loginIn($pdo, $username, $password){
        $findQuery = "SELECT count(*) FROM users where username = '$username' AND password = '$password'";
        $stmt = $pdo->prepare($findQuery);
        $stmt->execute();
        $count = $stmt->fetchColumn();
        
        if($count > 0){
            print "{\"status\":1,\"message\":\"Welcome!\"}";
        } else {
            print "{\"status\":0,\"message\":\"Wrong Username or Password!\"}";
        }
    }
}