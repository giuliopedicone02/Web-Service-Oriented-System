<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazzon in PHP</title>
</head>

<body>

    <h1>
        <center>Magazzon in PHP</center>
    </h1>

    <table border=1px>
        <tr>
            <th>Nome</th>
            <th>Quantita</th>
            <th>Prezzo</th>
            <th>Modifica</th>
            <th>Elimina</th>
        </tr>

        <?php
        require_once("connection.php");

        $query = "SELECT * FROM products";

        $result = $connection->query($query);

        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                print("<tr>");
                print("<td>" . $row['name'] . "</td>");
                print("<td>" . $row['quantity'] . "</td>");
                print("<td>" . $row['price'] . "</td>");

                print("<td> <a href=update.php?id=" . $row['id'] . "  > Modifica </a> </td>");
                print("<td> <a href=delete.php?id=" . $row['id'] . " > Elimina </a> </td>");
                print("</tr>");
            }

            print("</table>");
        }
        ?>

        <h3>Inserisci un nuovo prodotto</h3>

        <form action="create.php" method="post">
            <span>Inserisci nome: </span>
            <input type="text" name="name">
            <span>Inserisci quantità: </span>
            <input type="number" name="quantity">
            <span>Inserisci prezzo: </span>
            <input type="number" name="price">
            <input type="submit" value="Invia">
        </form>
</body>

</html>