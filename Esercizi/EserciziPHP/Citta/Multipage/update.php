<?php

require_once("connection.php");

if ($_SERVER["REQUEST_METHOD"] == "GET") {

    $id = $_GET['id'];

    $query = "SELECT * FROM Citta WHERE id=" . $id;

    $result = $connection->query($query);

    $row = $result->fetch_assoc();
    $id = $row['id'];
    $nome = $row['nome'];
    $prezzo = $row['prezzo'];
    $foto = $row['foto'];

?>

    <h3>Modifica una destinazione</h3>

    <form action="update.php" method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <span>Modifica città: </span>
        <input type="text" name="nome" value=<?= $nome ?>>
        <span>Modifica prezzo: </span>
        <input type="number" name="prezzo" value=<?= $prezzo ?>>
        <span>Modifica foto: </span>
        <input type="url" name="foto" value=<?= $foto ?>>
        <input type="submit" value="Invia">
    </form>
<?php
}

if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $prezzo = $_POST['prezzo'];
    $foto = $_POST['foto'];

    $query = "UPDATE Citta SET nome='$nome', prezzo='$prezzo', foto='$foto' WHERE id='$id'";

    $result = $connection->query($query);

    header("location: /");
}
?>