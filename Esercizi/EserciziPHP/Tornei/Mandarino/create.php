<?php
require_once("db_connection.php");

$name = $_POST['nome'];
$logo = $_POST['logo'];
$year = $_POST['anno'];
$champion = $_POST['champion'];

$query = "INSERT INTO tournaments (name, logo, champion, year) VALUES ('$name', '$logo', '$champion', '$year')";

$result = $db_connection->query($query);

header("location: read.php");
