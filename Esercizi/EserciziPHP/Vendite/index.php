<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vinted</title>
</head>

<body>
    <h1>
        <center>Vinted in PHP</center>
    </h1>

    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "VenditeProdottiUsati";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {

    ?>
        <h3>Visualizzazione articoli</h3>

        <table border=1px>
            <tr>
                <th>Modifica</th>
                <th>Elimina</th>
                <th>Prodotto</th>
                <th>Prezzo</th>
                <th>Data</th>
            </tr>

            <?php

            $query = "SELECT * FROM Vendite";

            $result = $connection->query($query);

            while ($row = $result->fetch_assoc()) {
                print("<tr>");
                $id = $row['id'];
                print("<form action='/' method='post'>");
                print("<input type='hidden' name='id' value='$id'>");
                print("<td>" . "<input type='submit' name='action' value='Modifica'>" . "</td>");
                print("<td>" . "<input type='submit' name='action' value='Elimina'>" . "</td>");
                print("<td>" . $row['prodotto'] . "</td>");
                print("<td>" . $row['prezzo'] . "</td>");
                print("<td>" . $row['data_vendita'] . "</td>");
                print("</form>");
                print("</tr>");
            }
            ?>
        </table>

        <h3>Inserisci un nuovo articolo</h3>

        <form action="/" method="post">
            <span>Inserisci nome prodotto: </span>
            <input type="text" name="prodotto">
            <span>Inserisci prezzo: </span>
            <input type="number" name="prezzo">
            <span>Inserisci data vendita: </span>
            <input type="date" name="date">
            <input type="submit" name='action' value="Invia">
        </form>

    <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $action = $_POST['action'];

        if ($action == "Invia") {
            $prodotto = $_POST['prodotto'];
            $prezzo = $_POST['prezzo'];
            $date = $_POST['date'];

            $query = "INSERT INTO Vendite(prodotto,prezzo,data_vendita) VALUES ('$prodotto', '$prezzo', '$date')";

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM Vendite WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Modifica") {
            $id = $_POST['id'];

            $query = "SELECT * FROM Vendite WHERE id=" . $id;

            $result = $connection->query($query);

            $row = $result->fetch_assoc();

            $id = $row['id'];
            $prodotto = $row['prodotto'];
            $prezzo = $row['prezzo'];
            $date = $row['data_vendita'];

            print("<h3> Modifica prodotto </h3>");

            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<span> Modifica nome prodotto: </span>");
            print("<input type='text' name='prodotto' value='$prodotto'>");
            print("<span> Modifica prezzo prodotto: </span>");
            print("<input type='number' name='prezzo' value='$prezzo'>");
            print("<span> Modifica data vendita: </span>");
            print("<input type='date' name='date' value='$date'>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['id'];
            $prodotto = $_POST['prodotto'];
            $prezzo = $_POST['prezzo'];
            $date = $_POST['date'];

            $query = "UPDATE Vendite SET prodotto='$prodotto', prezzo='$prezzo', data_vendita='$date' WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }
    }
    ?>
</body>

</html>