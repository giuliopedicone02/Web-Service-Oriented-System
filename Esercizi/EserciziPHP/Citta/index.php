<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Citta</title>
</head>

<body>
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "DatabaseCitta";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
        print("<h1> <center> Database Citta </center> </h1>");

        print("<h3> Lista Citta </h3>");

        print("<table border=1px>");
        print("<tr>");
        print("<th> Modifica </th>");
        print("<th> Elimina </th>");
        print("<th> Nome </th>");
        print("<th> Prezzo </th>");
        print("<th> Foto </th>");
        print("</tr>");

        $query = "SELECT * FROM Citta";
        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            print("<tr>");
            $id = $row['id'];
            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<td>" . "<input type='submit' name='action' value='Modifica'>" . "</td>");
            print("<td>" . "<input type='submit' name='action' value='Elimina'>" . "</td>");
            print("<td>" . $row['nome'] . "</td>");
            print("<td>" . $row['prezzo'] . "</td>");
            print("<td> <img width=100px height=100px src='" . $row['foto'] . "'></td>");
            print("</form>");
            print("</tr>");
        }
        print("</table>");

        print("<h3> Inserisci una nuova meta </h3>");

        print("<form action='/' method='post'>");
        print("<span> Inserisci nome: </span>");
        print("<input type='text' name='nome'><br>");
        print("<span> Inserisci prezzo: </span>");
        print("<input type='number' name='prezzo'><br>");
        print("<span> Inserisci foto: </span>");
        print("<input type='url' name='url'><br>");
        print("<input type='submit' name='action' value='Aggiungi'>");
        print("</form>");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $action = $_POST['action'];

        if ($action == "Aggiungi") {
            $nome = $_POST['nome'];
            $prezzo = $_POST['prezzo'];
            $foto = $_POST['url'];

            $query = "INSERT INTO Citta(nome,prezzo,foto) VALUES ('$nome','$prezzo','$foto')";

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM Citta WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }


        if ($action == "Modifica") {
            $id = $_POST['id'];

            $query = "SELECT * FROM Citta WHERE id=" . $id;

            $result = $connection->query($query);
            print("<input type='hidden' name='id' value='$id'>");

            $row = $result->fetch_assoc();

            $nome = $row['nome'];
            $prezzo = $row['prezzo'];
            $foto = $row['foto'];

            print("<h3> Modifica una Citta </h3>");

            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<span> Inserisci nome: </span>");
            print("<input type='text' name='nome' value='$nome'><br>");
            print("<span> Inserisci prezzo: </span>");
            print("<input type='number' name='prezzo' value='$prezzo'><br>");
            print("<span> Inserisci foto: </span>");
            print("<input type='url' name='url' value='$foto'>");
            print("<input type='submit' name='action' value='Update'><br>");
            print("</form>");
        }


        if ($action == "Update") {
            $id = $_POST['id'];
            $nome = $_POST['nome'];
            $prezzo = $_POST['prezzo'];
            $foto = $_POST['url'];

            $query = "UPDATE Citta SET nome='$nome', prezzo='$prezzo',foto='$foto' WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }
    }
    ?>
</body>

</html>