<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libri</title>
</head>

<body>

    <?php

    require_once("connection.php");

    if ($_SERVER["REQUEST_METHOD"] == 'GET') {
        print("<h1> <center> DB Books PHP </center> </h1> ");

        print("<h3> Inserimento libri </h3>");

        print("<form action='/' method='post'>");
        print("<span> <b> Inserisci ISBN </b> </span>");
        print("<input type='text' name='isbn' placeholder='Inserisci ISBN' required> <br/>");
        print("<span> <b> Inserisci Titolo </b> </span>");
        print("<input type='text' name='titolo' placeholder='Inserisci Titolo' required> <br/>");
        print("<span> <b> Inserisci Autore </b> </span>");
        print("<input type='text' name='autore' placeholder='Inserisci Autore' required> <br/>");
        print("<span> <b> Inserisci Publisher </b> </span>");
        print("<input type='text' name='publisher' placeholder='Inserisci Publisher' required> <br/>");
        print("<span> <b> Inserisci Ranking </b> </span>");
        print("<input type='number' name='ranking' placeholder='Inserisci Ranking' min=1 max=5 required> <br/>");
        print("<span> <b> Inserisci Anno </b> </span>");
        print("<input type='number' name='anno' placeholder='Inserisci Anno' required> <br/>");
        print("<span> <b> Inserisci Prezzo </b> </span>");
        print("<input type='number' name='prezzo' placeholder='Inserisci Prezzo' required> <br/>");
        print("<input type='submit' name='action' value='Invia'>");
        print("</form>");

        print("<h3> Lista Libri </h3>");

        print("<form action='/lista.php' method='post'>");
        print("<input type='submit' name='visualizza' value='Visualizza Libri'</input>");
        print("</form>");
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $isbn = $_POST['isbn'];
        $titolo = $_POST['titolo'];
        $autore = $_POST['autore'];
        $publisher = $_POST['publisher'];
        $ranking = $_POST['ranking'];
        $anno = $_POST['anno'];
        $prezzo = $_POST['prezzo'];



        $query = "INSERT INTO books(isbn, title, author, publisher, ranking, year, price) VALUES ('$isbn','$titolo','$autore','$publisher','$ranking','$anno','$prezzo')";

        print($query);

        $result = $connection->query($query);

        print("Inserimento riuscito con successo. Righe aggiunte: " . $result);

        print("<br> <a href='/'> Torna alla Home </a>");
    }
    ?>

</body>

</html>