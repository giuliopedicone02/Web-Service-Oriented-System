<?php
$host = "localhost";
$username = "username";
$password = "password";
$dbname = "exam";

$connection = new mysqli($host, $username, $password, $dbname);

if($connection->connect_errno){
    die("Error connecting to database: " . $connection->connect_error);
}