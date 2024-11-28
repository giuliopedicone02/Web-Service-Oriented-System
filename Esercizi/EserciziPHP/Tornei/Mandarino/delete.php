<?php

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    require_once("db_connection.php");

    $query = "DELETE FROM tournaments WHERE id = " . $_GET['id'];

    $db_connection->query($query);

    header("location: read.php");
}
