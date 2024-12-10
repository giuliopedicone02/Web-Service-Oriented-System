<?php
require_once("connection.php");

$nome = $_POST['nome'];
$cognome = $_POST['cognome'];
$squadra = $_POST['squadra'];
$ruolo = $_POST['ruolo'];

$query = "INSERT INTO Calciatori(nome,cognome,squadra,ruolo) VALUES ('$nome','$cognome','$squadra','$ruolo')";

$result = $connection->query($query);

header("location: /");
