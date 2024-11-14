<?php
$servername = "localhost";
$username = "root";
$password = "Giulio2002!";
$dbName = "MyDB";

$conn = new mysqli($servername, $username, $password, $dbName);

if ($_SERVER['REQUEST_METHOD'] === 'GET') {
    $sql = "SELECT * FROM FLIST";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $result->data_seek(rand(0, $result->num_rows - 1));
        $row = $result->fetch_assoc();
        $titolo_preso_a_caso = $row["titolo"];
        $registra_preso_a_caso = $row["regista"];
        print("<h2> Film consigliato: ");
        print("$titolo_preso_a_caso" . ($registra_preso_a_caso ? "($regista_preso_a_caso)" : ""));
    }
}
?>

<br><br>
<hr>
<form action="<?= $_SERVER["PHP_SELF"] ?>" method="post">
    <input type="submit" name="wlist" value="Visualizza la wishlist">
    <input type="text" name="titolo" placeholder="Titolo del film">
    <input type="text" name="regista" placeholder="Regista">
    <input type="submit" value="Trova">
</form>