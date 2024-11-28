<?php
$servername = "localhost:3306";
$username = "root";
$password = "Giulio2002!";
$database = "DB_Books";

$connection = new mysqli($servername, $username, $password, $database);

if ($connection->connect_error) {
    die("Errore nella connessione al database " . $connection->connect_error);
}
