<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gestione Viaggi</title>
</head>

<body>
    <h1>
        <center>Gestione Viaggi in PHP</center>
    </h1>

    <h3>Lista Viaggi</h3>
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "SistemaPrenotazioni";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        $query = "SELECT * FROM Prenotazioni_Viaggi";
        $result = $connection->query($query);

        print("<table border=1px>");
        print("<tr>");
        print("<th> Nome </th>");
        print("<th> Destinazione </th>");
        print("<th> Partenza </th>");
        print("<th> Ritorno </th>");
        print("<th> Costo </th>");
        print("<th> Azione </th>");

        print("</tr>");

        while ($row = $result->fetch_assoc()) {
            print("<tr>");
            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='" . $row['ID_Prenotazione'] . "'>");

            print("<td>" . $row["Nome_Utente"] . "</td>");
            print("<td>" . $row["Destinazione"] . "</td>");
            print("<td>" . $row["Data_Partenza"] . "</td>");
            print("<td>" . $row["Data_Ritorno"] . "</td>");
            print("<td>" . $row["Costo_Totale"] . "</td>");
            print("<td>" . "<input type='submit' name='action' value='Elimina'>" .  " <br> <input type='submit' name='action' value='Modifica'> </td>");
            print("</form>");

            print("</tr>");
        }

        print("</table>");

        print("<form action='/' method='post'>");
        print("<h3> Inserisci un nuovo viaggio </h3>");
        print("<span> <b> Nome: </b> </span>");
        print("<input type='text' name='nome' required>");
        print("<span> <b> Destinazione: </b> </span>");
        print("<input type='text' name='destinazione' required>");
        print("<span> <b> Partenza: </b> </span>");
        print("<input type='date' name='partenza' required>");
        print("<span> <b> Ritorno: </b> </span>");
        print("<input type='date' name='ritorno' required>");
        print("<span> <b> Prezzo: </b> </span>");
        print("<input type='number' name='prezzo' required>");
        print("<input type='submit' name='action' value='Invia'>");
        print("</form>");
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $action = $_POST["action"];
        if ($action == 'Invia') {

            $nome = $_POST['nome'];
            $destinazione = $_POST['destinazione'];
            $partenza = $_POST['partenza'];
            $ritorno = $_POST['ritorno'];
            $prezzo = $_POST['prezzo'];

            $query = "INSERT INTO Prenotazioni_Viaggi (Nome_Utente,Destinazione,Data_Partenza,Data_Ritorno,Costo_Totale) VALUES ('$nome' , '$destinazione' , '$partenza' , '$ritorno' , '$prezzo' )";
            $result = $connection->query($query);
            header("location:/");
        }

        if ($action == 'Elimina') {

            $id = $_POST['id'];

            $query = "DELETE FROM Prenotazioni_Viaggi WHERE ID_Prenotazione=" . $id;
            $result = $connection->query($query);
            header("location:/");
        }

        if ($action == 'Modifica') {

            $id = $_POST['id'];

            $query = "SELECT * FROM Prenotazioni_Viaggi WHERE ID_Prenotazione=" . $id;
            $result = $connection->query($query);
            $row = $result->fetch_assoc();

            $id = $row['ID_Prenotazione'];
            $name = $row['Nome_Utente'];
            $destinazione = $row['Destinazione'];
            $partenza = $row['Data_Partenza'];
            $arrivo = $row['Data_Ritorno'];
            $costo = $row['Costo_Totale'];


            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='" . $id . "'>");
            print("<h3> Modifica un viaggio </h3>");
            print("<span> <b> Nome: </b> </span>");
            print("<input type='text' name='nome' value='" . $name . "'>");
            print("<span> <b> Destinazione: </b> </span>");
            print("<input type='text' name='destinazione' value='" . $destinazione . "'>");
            print("<span> <b> Partenza: </b> </span>");
            print("<input type='date' name='partenza' value='" . $partenza . "'>");
            print("<span> <b> Ritorno: </b> </span>");
            print("<input type='date' name='ritorno' value='" . $arrivo . "'>");
            print("<span> <b> Prezzo: </b> </span>");
            print("<input type='number' name='prezzo' value='" . $costo . "'>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $destinazione = $_POST['destinazione'];
            $partenza = $_POST['partenza'];
            $ritorno = $_POST['ritorno'];
            $prezzo = $_POST['prezzo'];

            $query = "UPDATE Prenotazioni_Viaggi SET Nome_Utente='$nome', Destinazione='$destinazione', Data_Partenza='$partenza', Data_Ritorno='$ritorno', Costo_Totale='$prezzo' WHERE ID_Prenotazione='$id'";
            $result = $connection->query($query);
            header("location:/");
        }
    }

    ?>
</body>

</html>