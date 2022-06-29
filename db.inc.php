<?php
$host = "127.0.0.1";
$dbUsername = "root";
$dbPassword = "";
$dbName = "task3";

$connect = mysqli_connect($host, $dbUsername, null, $dbName, 3306);
if (!$connect){
    die("Connection error").mysqli_connect_error();
}
