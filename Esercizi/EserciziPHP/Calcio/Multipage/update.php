<?php

require_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $query = "SELECT * FROM Calciatori WHERE id=" . $id;

    $result = $connection->query($query);

    $row = $result->fetch_assoc();

    $id = $row['id'];
    $nome = $row['nome'];
    $cognome = $row['cognome'];
    $squadra = $row['squadra'];
    $ruolo = $row['ruolo'];

    print("<h3> Modifica un nuovo calciatore </h3>");
    print("<form action='update.php' method='post'>");
    print("<input type='hidden' name='id' value='$id'>");
    print("<span> Modifica nome: </span>");
    print("<input type='text' name='nome' value='$nome'> <br>");
    print("<span> Modifica cognome: </span>");
    print("<input type='text' name='cognome' value='$cognome'> <br>");
    print("<span> Modifica squadra: </span>");
    print("<input type='text' name='squadra' value='$squadra'> <br>");
    print("<span> Modifica ruolo: </span>");
    print("<input type='text' name='ruolo' value='$ruolo'> <br>");
    print("<input type='submit' name='action' value='Update'>");
    print("</form>");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    print("Entra?");
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $cognome = $_POST['cognome'];
    $squadra = $_POST['squadra'];
    $ruolo = $_POST['ruolo'];

    $query = "UPDATE Calciatori SET nome='$nome',cognome='$cognome',squadra='$squadra',ruolo='$ruolo' WHERE id='$id'";

    $result = $connection->query($query);

    header("location: /");
}
