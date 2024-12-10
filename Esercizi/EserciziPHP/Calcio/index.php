<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Calciatori</title>
</head>

<body>
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "Calcio";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        print("<h1> <center> Calciatori DB in PHP </center> </h1>");

        print("<h3> Lista Calciatori </h3>");

        print("<table border=1px>");

        print("<tr>");
        print("<th> Modifica </th>");
        print("<th> Elimina </th>");
        print("<th> Nome </th>");
        print("<th> Cognome </th>");
        print("<th> Squadra </th>");
        print("<th> Ruolo </th>");
        print("</tr>");

        $query = "SELECT * FROM Calciatori";

        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            print("<tr>");
            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<td>" . "<input type='submit' name='action' value='Modifica'>" . "</td>");
            print("<td>" . "<input type='submit' name='action' value='Elimina'>" . "</td>");
            print("<td>" . $row['nome'] . "</td>");
            print("<td>" . $row['cognome'] . "</td>");
            print("<td>" . $row['squadra'] . "</td>");
            print("<td>" . $row['ruolo'] . "</td>");
            print("</form>");
            print("</tr>");
        }

        print("</table>");

        print("<h3> Inserisci un nuovo calciatore </h3>");

        print("<form action='/' method='post'>");
        print("<span> Inserisci nome: </span>");
        print("<input type='text' name='nome'> <br>");

        print("<span> Inserisci cognome: </span>");
        print("<input type='text' name='cognome'> <br>");

        print("<span> Inserisci squadra: </span>");
        print("<input type='text' name='squadra'> <br>");

        print("<span> Inserisci ruolo: </span>");
        print("<input type='text' name='ruolo'> <br>");

        print("<input type='submit' name='action' value='Aggiungi'>");

        print("</form>");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $action = $_POST['action'];

        if ($action == "Aggiungi") {
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $squadra = $_POST['squadra'];
            $ruolo = $_POST['ruolo'];

            $query = "INSERT INTO Calciatori(nome,cognome,squadra,ruolo) VALUES ('$nome','$cognome','$squadra','$ruolo')";

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM Calciatori WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }


        if ($action == "Modifica") {
            $id = $_POST['id'];

            $query = "SELECT * FROM Calciatori WHERE id=" . $id;

            $result = $connection->query($query);

            $row = $result->fetch_assoc();

            $id = $row['id'];
            $nome = $row['nome'];
            $cognome = $row['cognome'];
            $squadra = $row['squadra'];
            $ruolo = $row['ruolo'];


            print("<h3> Modifica un nuovo calciatore </h3>");

            print("<form action='/' method='post'>");

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

        if ($action == "Update") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $cognome = $_POST['cognome'];
            $squadra = $_POST['squadra'];
            $ruolo = $_POST['ruolo'];

            $query = "UPDATE Calciatori SET nome='$nome',cognome='$cognome',squadra='$squadra',ruolo='$ruolo' WHERE id='$id'";

            $result = $connection->query($query);

            header("location: /");
        }
    }
    ?>
</body>

</html>