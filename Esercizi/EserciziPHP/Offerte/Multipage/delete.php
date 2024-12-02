<?php
$id = $_GET['id'];
require_once("connection.php");

$query = "DELETE FROM offers WHERE id = " . $id;
$result = $connection->query($query);

header("location: /");
