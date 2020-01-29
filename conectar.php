<?php
$host = "localhost";
$user = "root";
$passwd = "";
$dbname = "login";

$conn = new mysqli($host, $user, $passwd, $dbname);

if($conn != true){
    echo "Error !";
}