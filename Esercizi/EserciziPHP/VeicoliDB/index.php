<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vehicle DB</title>
</head>

<body>
    <?php

    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $database = "VehicleDB";

    $connection = new mysqli($servername, $username, $password, $database);

    if ($connection->connect_errno) {
        die("Errore durante la connessione al Database");
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

    ?>

        <h1>
            <center>Vehicle DB in PHP</center>
        </h1>

        <h3>Veicoli disponibili</h3>

        <table border=1px>
            <tr>
                <th>Modifica</th>
                <th>Elimina</th>
                <th>Marca</th>
                <th>Modello</th>
                <th>Anno</th>
                <th>Cilindrata</th>
                <th>Alimentazione</th>
                <th>Prezzo</th>
            </tr>

            <?php

            $sql = "SELECT * FROM Auto";

            $result = $connection->query($sql);

            while ($row = $result->fetch_assoc()) {
                print("<tr>");
                print("<form action='/' method='post'>");
                print("<td>" . "<input type='submit' name='action' value='Modifica'>" . "</td>");
                print("<td>" . "<input type='submit' name='action' value='Elimina'>" . "</td>");
                print("<td>" . $row['Marca'] . "</td>");
                print("<td>" . $row['Modello'] . "</td>");
                print("<td>" . $row['Anno'] . "</td>");
                print("<td>" . $row['Cilindrata'] . "</td>");
                print("<td>" . $row['Alimentazione'] . "</td>");
                print("<td>" . $row['Prezzo'] . "</td>");
                print("</form>");
                print("</tr>");
            }
            ?>
        </table>

        <h3>Inserisci una nuova auto</h3>

        <form action="/" method="post">
            <span><b>Inserisci Marca:</b></span>
            <input type="text" name="Marca"><br>
            <span><b>Inserisci Modello:</b></span>
            <input type="text" name="Modello"><br>
            <span><b>Inserisci Anno:</b></span>
            <input type="number" name="Anno"><br>
            <span><b>Inserisci Cilindrata:</b></span>
            <input type="number" name="Cilindrata"><br>
            <span><b>Inserisci Alimentazione:</b></span>
            <select name="Alimentazione">
                <option value="Benzina" selected>Benzina</option>
                <option value="Diesel">Diesel</option>
                <option value="Elettrico">Elettrico</option>
                <option value="Ibrido">Ibrido</option>
                <option value="GPL">GPL</option>
                <option value="Metano">Metano</option>
            </select><br>
            <span><b>Inserisci Prezzo:</b></span>
            <input type="number" name="Prezzo"><br>
            <input type="submit" name='action' value="Invia">
        </form>

    <?php
    }
    if ($_SERVER["REQUEST_METHOD"] == "POST") {

        $action = $_POST['action'];

        if ($action == "Invia") {
            $marca = $_POST['Marca'];
            $modello = $_POST['Modello'];
            $anno = $_POST['Anno'];
            $cilindrata = $_POST['Cilindrata'];
            $alimentazione = $_POST['Alimentazione'];
            $prezzo = $_POST['Prezzo'];

            $query = "INSERT INTO Auto(Marca,Modello,Anno,Cilindrata,Alimentazione,Prezzo) VALUES ('$marca','$modello','$anno','$cilindrata','$alimentazione','$prezzo')";

            $result = $connection->query($query);

            header("location:index.php");
        }
    }
    ?>
</body>

</html>
<?php
