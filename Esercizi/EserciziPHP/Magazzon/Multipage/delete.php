<?php

require_once("connection.php");

$id = $_GET['id'];

$query = "DELETE FROM products WHERE id =" . $id;
$connection->query($query);

header("location: /");
