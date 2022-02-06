<?php
if(isset($_POST["submit"])){
    $name = $_POST["name"];
    $email = $_POST["email"];
    $username = $_POST["uid"];
    $pwd = $_POST["pw"];
    
    require_once 'dbh_inc.php';
    require_once 'functions_inc.php';

    if(noinputsignup($name,$email,$username,$pwd)!==false){
      
        echo("emptyinput");
        
        exit(); 
    }
    if(invalidUid($username)!==false){
       
        echo("invalidUid");
        exit();
         
    }
    /*if(invalidEmail($email)!==false){
        $error="invalidemail";
        echo $error;
        exit(); 
    }*/
    if(uidExists($conn,$username,$email)!==false){
      echo("giveanotherusername");
        exit(); 
    }
    createUser($conn,$name,$email,$username,$pwd);
    echo "success";
}
else{
    header("location: signup.html");
    exit(); 
}