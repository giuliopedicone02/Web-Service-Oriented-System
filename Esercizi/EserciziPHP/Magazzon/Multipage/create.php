<?php

require_once("connection.php");

$name = $_POST['name'];
$quantity = $_POST['quantity'];
$price = $_POST['price'];

$query = "INSERT INTO products(name,price,quantity) VALUES ('$name','$price','$quantity')";

print($query);

$result = $connection->query($query);

header("location: /");
