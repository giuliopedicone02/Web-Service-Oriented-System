<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tornei</title>
</head>

<body>

    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "Tornei";

    $conn = new mysqli($servername, $username, $password, $dbName);

    if ($conn->connect_error) {
        die("Errore di connessione. Errore: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "GET") {

        print("<h1> <center> Tornei in PHP </center> </h1>");

        print("<h3> Visualizza Tornei </h3>");

        $query = "SELECT * FROM tournaments";

        $result = $conn->query($query);

        while ($row = $result->fetch_assoc()) {
            print("<form action='/' method='post'>");
            print("<input type='hidden' name='Id' value='" . $row['id'] . "'> <br>");

            print("<span> <b> Nome: </b> " . $row['name'] . "</span> <br>");
            print("<span> <b> Champion: </b> " . $row['champion'] . "</span> <br>");
            print("<span> <b> Anno: </b> " . $row['year'] . "</span> <br>");
            print("<img width='200px' height='200px' src='" . $row['logo'] . "'></img> <br>");
            print("<input type='submit' name='action' value='Modifica'>");
            print("<input type='submit' name='action' value='Elimina'>");
            print("</form>");
        }

        print("<h3> Inserisci un nuovo torneo </h3>");

        print("<form action='/' method='post'>");
        print("<span> Inserisci nome squadra: </span>");
        print("<input type='text' name='name' placeholder='Inserisci nome squadra' required> <br>");
        print("<span> Inserisci Champion: </span>");
        print("<input type='text' name='champion' placeholder='Inserisci champion' required> <br>");
        print("<span> Inserisci anno: </span>");
        print("<input type='number' name='anno' placeholder='Inserisci anno' required>  <br>");
        print("<span> Inserisci URL logo: </span>");
        print("<input type='text' name='logo' placeholder='Inserisci logo' required> <br>");
        print("<input type='submit' name='action' value='Invia'>");
        print("</form>");
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
        $action = $_POST['action'];

        // CREATE
        if ($action == "Invia") {
            $nome = $_POST['name'];
            $champion = $_POST['champion'];
            $anno = $_POST['anno'];
            $logo = $_POST['logo'];

            $query = "INSERT INTO tournaments (name, logo, champion, year) VALUES ('$nome', '$logo', '$champion', '$anno') ";

            $result = $conn->query($query);

            print("Torneo aggiunto con successo! Righe aggiunte: $result");

            print("<br> <a href='/'> Torna alla Home </a>");
        }

        // DELETE
        if ($action == 'Elimina') {
            $id = $_POST['Id'];

            $query = "DELETE FROM tournaments WHERE id = '$id'";

            $result = $conn->query($query);

            print("Torneo rimosso con successo! Righe aggiunte: $result");

            print("<br> <a href='/'> Torna alla Home </a>");
        }

        // UPDATE
        if ($action == 'Modifica') {
            $id = $_POST['Id'];

            $query = "SELECT * FROM tournaments WHERE id = '$id'";

            $result = $conn->query($query);

            $row = $result->fetch_assoc();

            print("<h3> Modifica un torneo </h3>");

            print("<form action='/' method='post'>");
            print("<span> Modifica nome squadra: </span>");
            print("<input type='hidden' name='Id' value='" . $row['id'] . "'> <br>");
            print("<input type='text' name='name' value='" . $row['name'] . "'> <br>");
            print("<span> Inserisci Champion: </span>");
            print("<input type='text' name='champion' value='" . $row['champion'] . "'> <br>");
            print("<span> Inserisci anno: </span>");
            print("<input type='number' name='anno' value='" . $row['year'] . "'> <br>");
            print("<span> Inserisci URL logo: </span>");
            print("<input type='text' name='logo' value='" . $row['logo'] . "'> <br>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['Id'];
            $nome = $_POST['name'];
            $champion = $_POST['champion'];
            $anno = $_POST['anno'];
            $logo = $_POST['logo'];


            $query = "UPDATE tournaments SET name='$nome', champion='$champion', year='$anno', logo='$logo' WHERE id = '$id'";

            $result = $conn->query($query);

            print("Torneo modificato con successo! Righe modificate: $result");

            print("<br> <a href='/'> Torna alla Home </a>");
        }
    }
    ?>

</body>

</html>