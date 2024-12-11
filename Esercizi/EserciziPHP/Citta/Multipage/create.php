<?php
require_once("connection.php");

$nome = $_POST['nome'];
$prezzo = $_POST['prezzo'];
$foto = $_POST['foto'];

$query = "INSERT INTO Citta(nome,prezzo,foto) VALUES ('$nome','$prezzo','$foto')";

$result = $connection->query($query);

header("location: /");
