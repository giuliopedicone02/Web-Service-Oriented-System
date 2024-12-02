<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Offerte</title>
</head>

<body>

    <h1>
        <center>Offerte in PHP</center>
    </h1>

    <table border=1px>
        <tr>
            <th>Modifica</th>
            <th>Elimina</th>
            <th>Descrizione</th>
            <th>Prezzo</th>
            <th>Validità</th>
            <th>Acquistato</th>
        </tr>

        <h3>Lista offerte Disponibili</h3>

        <?php
        require_once("connection.php");

        $query = "SELECT * FROM offers";

        $result = $connection->query($query);

        $sum = 0;
        while ($row = $result->fetch_assoc()) {

            if ($row['validity'] == 0 || $row['validity'] == 1) {
                print("<tr style='background-color: yellow'>");
            } else if ($row['validity'] < 0) {
                print("<tr style='background-color: red; color: white'>");
            } else {
                print("<tr>");
            }

            print("<td><a href='update.php?id=" . $row['id'] . "'> Modifica </a></td>");
            print("<td><a href='delete.php?id=" . $row['id'] . "'> Elimina </a></td>");
            print("<td>" . $row['description'] . "</td>");
            print("<td>" . $row['price'] . "</td>");
            print("<td>" . $row['validity'] . "</td>");
            print("<td>" . ($row['purchased'] == 1 ? "Si" : "No") . "</td>");
            print("</tr>");

            if ($row['purchased'] == 1) {
                $sum += $row['price'];
            }
        }
        ?>
    </table>

    <p> <b>Somma prodotti acquistati: </b> <?= $sum ?>€</p>

    <form action="allYouCanBuy.php" method="post">
        <input type="submit" value="All You Can Buy">
    </form>

    <h3>Inserimento Offerte</h3>

    <form action="/create.php" method="post">
        <span><b>Descrizione: </b></span>
        <input type="text" name="Descrizione" placeholder="Descrizione articolo"><br>
        <span><b>Prezzo: </b></span>
        <input type="number" name="Prezzo" placeholder="Importo"><br>
        <span><b>Validità: </b></span>
        <input type="number" name="Validita" placeholder="Numero giorni"><br>
        <span><b>Acquistato: </b></span>
        <input type="number" name="Acquistato" min=0 max=1 value=0><br>
        <input type="submit" value="Invia">
    </form>
</body>

</html>