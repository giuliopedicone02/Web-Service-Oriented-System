<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA</title>
</head>

<body>

    <h1>
        <center>Tornei in PHP Multipage </center>
    </h1>

    <table border=1>
        <th>Nome</th>
        <th>Logo</th>
        <th>Link Logo</th>
        <th>Campione</th>
        <th>Anno</th>
        <th>Modifica</th>
        <th>Elimina</th>


        <?php

        require_once("db_connection.php");

        $query = "SELECT * FROM tournaments";

        $result = $db_connection->query($query);

        while ($row = $result->fetch_assoc()) {
            print("<tr>");

            print("<td> " . $row['name'] . "</td>");
            print("<td> <img width=200px height=200px src='" . $row['logo'] . "'></td>");
            print("<td> <a href='" . $row['logo'] . "'> Link al logo </a> </td>");
            print("<td> " . $row['champion'] . "</td>");
            print("<td> " . $row['year'] . "</td>");
            if ($row['year'] == date('Y')) {
                print("<td> <a href='update.php?id=" . $row['id'] . "'> Modifica </a> </td>");
                print("<td> <a href='delete.php?id=" . $row['id'] . "'> Elimina </a> </td>");
            } else {
                print("<td></td><td></td>");
            }
            print("</tr>");
        }
        ?>
    </table>

    <h3>Inserisci un nuovo torneo: </h3>

    <form action="/create.php" method="post">
        <span>Nome: </span>
        <input type="text" name="nome"> <br>
        <span>Logo: </span>
        <input type="text" name="logo"> <br>
        <span>Anno: </span>
        <input type="number" name="anno"> <br>
        <span>Champion: </span>
        <input type="text" name="champion"> <br>
        <input type="submit" value="Invia">
    </form>

</body>

</html>