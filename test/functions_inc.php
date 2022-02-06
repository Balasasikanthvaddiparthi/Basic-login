<?php
function noinputsignup($name,$email,$username,$pwd){
    $ans=false;
    if(empty($name)||empty($email)||empty($username)||empty($pwd)){
        $ans=true;
    }
    else{
        $ans=false;
    }
    return  $ans ;
}
function invalidUid($username){
    $ans=false;
    if(!preg_match("/^[a-zA-Z0-9]*$/", $username)){
        $ans=true;
    }
    else{
        $ans=false;
    }
    return $ans;
}
/*function invalidEmail($email){
    $ans=false;
    if(filter_var($email,FILTER_VALIDATE_EMAIL)){
        $ans=true;
    }
    else{
        $ans=false;
    }
    return $ans;
}*/
function uidExists($conn,$username,$email){
    $sql="SELECT * FROM users WHERE usersUid=? OR usersEmail =?;";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "giveanotherusername";
       exit();
    }
    mysqli_stmt_bind_param($stmt,"ss",$username,$email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;
    }
    else{
        $ans=false;
        return $ans;
    }
    mysqli_stmt_close($stmt);
}
function createUser($conn,$name,$email,$username,$pwd){
    $sql="INSERT INTO users (usersName,usersEmail,usersUid,userspwd) VALUES (?,?,?,?);";
    $stmt=mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt,$sql)){
        echo "giveanotherusername";  
       exit();
    }
    $hashedPwd=password_hash($pwd,PASSWORD_DEFAULT);
    
    mysqli_stmt_bind_param($stmt,"ssss",$name,$email,$username,$hashedPwd);
    mysqli_stmt_execute($stmt);
   
    mysqli_stmt_close($stmt);
    $error="none";
    echo $error;
    exit();
}
function noinputlogin($username,$pwd){
    $ans=false;
    if(empty($username)||empty($pwd)){
        $ans=true;
    }
    else{
        $ans=false;
    }
    return  $ans ;
}
function loginUser($conn,$username,$pwd){
    $uidExists =  uidExists($conn,$username,$username);
    if( $uidExists===false){
        $error="wronglogin";
        echo $error;
        exit();
    }
    $pwdHashed=$uidExists["userspwd"];
    $checkPwd = password_verify($pwd,$pwdHashed);
    if($checkPwd===false){
      $error="wronglogin";
      echo $error;
        exit();
    }
    else if($checkPwd===true){
        session_start();
        $_SESSION["userid"]=$uidExists["usersId"];
        $_SESSION["useruid"]=$uidExists["usersUid"];
        echo("loginsuccess");
        
        exit();
    }    

}