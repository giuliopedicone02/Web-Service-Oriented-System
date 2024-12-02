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
                print("<input type='hidden' name='id' value='" . $row['ID_Auto'] . "'>");

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

        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM Auto WHERE ID_Auto = " . $id;

            $result = $connection->query($query);

            header("location:index.php");
        }


        if ($action == "Modifica") {
            $id = $_POST['id'];

            $query = "SELECT * FROM Auto WHERE ID_Auto = " . $id;

            $result = $connection->query($query);

            $row = $result->fetch_assoc();

            print("<h1> <center> Modifica Auto </center> </h1>");
            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='" . $row['ID_Auto'] . "'> <br>");
            print("<span> <b> Modifica Marca: </b></span> ");
            print("<input type='text' name='marca' value='" . $row['Marca'] . "'> <br>");
            print("<span> <b> Modifica Modello: </b></span> ");
            print("<input type='text' name='modello' value='" . $row['Modello'] . "'> <br>");
            print("<span> <b> Modifica Anno: </b></span> ");
            print("<input type='number' name='anno' value='" . $row['Anno'] . "'> <br>");
            print("<span> <b> Modifica Cilindrata: </b></span> ");
            print("<input type='text' name='cilindrata' value='" . $row['Cilindrata'] . "'> <br>");
            print("<span> <b> Modifica Alimentazione: </b></span> ");
            print("<input type='text' name='alimentazione' value='" . $row['Alimentazione'] . "'> <br>");
            print("<span> <b> Modifica Prezzo: </b></span> ");
            print("<input type='number' name='prezzo' value='" . $row['Prezzo'] . "'> <br>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['id'];
            $marca = $_POST['marca'];
            $modello = $_POST['modello'];
            $anno = $_POST['anno'];
            $cilindrata = $_POST['cilindrata'];
            $alimentazione = $_POST['alimentazione'];
            $prezzo = $_POST['prezzo'];

            $query = "UPDATE Auto SET Marca='$marca', Modello='$modello', Anno='$anno', Cilindrata='$cilindrata', Alimentazione='$alimentazione', Prezzo='$prezzo' WHERE ID_Auto = '$id'";

            $result = $connection->query($query);

            header("location:index.php");
        }
    }
    ?>
</body>

</html>
<?php
