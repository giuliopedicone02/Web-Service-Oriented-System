<?php

require_once("connection.php");


if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET['id'];

    $query = "SELECT * FROM offers WHERE id=" . $id;
    $result = $connection->query($query);

    $row = $result->fetch_assoc();
    $descrizione = $row['description'];
    $price = $row['price'];
    $validity = $row['validity'];
    $purchased = $row['purchased'];

?>

    <h3>Inserimento Offerte</h3>

    <form action="/update.php" method="post">
        <input type="hidden" name="id" value=<?= $id ?>>
        <span><b>Descrizione: </b></span>
        <input type="text" name="Descrizione" value="<?= $descrizione ?>"><br>
        <span><b>Prezzo: </b></span>
        <input type="number" name="Prezzo" value=<?= $price ?>><br>
        <span><b>Validità: </b></span>
        <input type="number" name="Validita" value=<?= $validity ?>><br>
        <span><b>Acquistato: </b></span>
        <input type="number" name="Acquistato" value=<?= $purchased ?>><br>
        <input type="submit" value="Invia">
    </form>
<?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {

    $id = $_POST['id'];
    $descrizione = $_POST['Descrizione'];
    $prezzo = $_POST['Prezzo'];
    $validita = $_POST['Validita'];
    $acquistato = $_POST['Acquistato'];

    $query = "UPDATE offers SET description='$descrizione', price='$prezzo', validity='$validita', purchased='$acquistato' WHERE id='$id'";
    $result = $connection->query($query);
    header("location: /");
}

?>