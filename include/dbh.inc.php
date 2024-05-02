<?php

$serverName = "Localhost";
$dbUserName = "sasindu_n";
$dbPassword = "Allrights@1";
$dbName = "easyPham";

$conn = mysqli_connect($serverName,$dbUserName,$dbPassword,$dbName);

if(!$conn){
    die("Connection faild:".mysqli_connect_error());
}