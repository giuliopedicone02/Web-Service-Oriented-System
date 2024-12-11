<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Database Citta</title>
</head>

<body>
    <h1>
        <center>Database di Citta Multipage</center>
    </h1>

    <table border=1px>
        <th>Modifica</th>
        <th>Elimina</th>
        <th>Nome</th>
        <th>Prezzo</th>
        <th>Foto</th>

        <?php
        require_once("connection.php");

        $query = "SELECT * FROM Citta";

        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            print("<tr>");
            $id = $row['id'];
            print("<td>" . "<a href=update.php?id=$id> Modifica </a> " . " </td>");
            print("<td> " . "<a href=delete.php?id=$id> Elimina </a>" . " </td>");
            print("<td>" . $row['nome'] . "</td>");
            print("<td>" . $row['prezzo'] . "</td>");
            print("<td> <img width=100px height=100px src='" . $row['foto'] . "'></td>");
            print("</tr>");
        }
        ?>
    </table>

    <h3>Inserisci una nuova destinazione</h3>

    <form action="create.php" method="post">
        <span>Inserisci città: </span>
        <input type="text" name="nome">
        <span>Inserisci prezzo: </span>
        <input type="number" name="prezzo">
        <span>Inserisci foto: </span>
        <input type="url" name="foto">
        <input type="submit" value="Invia">
    </form>

</body>

</html>