<?php

require_once("connection.php");

$descrizione = $_POST['Descrizione'];
$prezzo = $_POST['Prezzo'];
$validita = $_POST['Validita'];
$acquistato = $_POST['Acquistato'];

$query = "INSERT INTO offers(Description,Price,Validity,Purchased) VALUES ('$descrizione','$prezzo','$validita','$acquistato')";

$result = $connection->query($query);
header("location: /");
