<?php
require_once("connection.php");

$id = $_GET['id'];

$query = "DELETE FROM Calciatori WHERE id=" . $id;

$result = $connection->query($query);

header("location: /");
