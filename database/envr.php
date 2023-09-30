<?php

$dbHostname = 'localhost';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'yummy_food';

$add = mysqli_connect($dbHostname,$dbUsername,$dbPassword,$dbName);

// if($add){
//     echo "connected";
// }