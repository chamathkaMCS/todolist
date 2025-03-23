<?php
$serverName ="localhost";
$dbUsername = "chamathkaTest";
$dbPassword = "oST*/]*__mia*]Ij";
$dbName = "todolist";

$conn = mysqli_connect($serverName,$dbUsername,$dbPassword,$dbName);

if(!$conn){
    die("connection failed: ".mysqli_connect_error());
}