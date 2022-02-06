<?php
$sevName="localhost";
$dBusername="root";
$dBpwd="";
$dBName="absproject";

$conn = mysqli_connect($sevName,$dBusername,$dBpwd,$dBName);

if(!$conn){
    die("connection failed..".mysqli_connect_error());
}