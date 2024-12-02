<?php
require_once("connection.php");
$query = "UPDATE offers SET price=price/2, purchased=1 WHERE validity>=0 AND purchased=0";

$result = $connection->query($query);
header("location: /");
