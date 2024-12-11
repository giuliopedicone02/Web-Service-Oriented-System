<?php
require_once("connection.php");

$nome = $_GET['id'];

$query = "DELETE FROM Citta WHERE id=" . $id;

$result = $connection->query($query);

header("location: /");
