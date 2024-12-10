<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>

    <h1>
        <center>Calciatori in PHP Multipage</center>
    </h1>

    <h3>Lista dei giocatori</h3>

    <table border=1px>
        <tr>
            <th>Modifica</th>
            <th>Elimina</th>
            <th>Nome</th>
            <th>Cognome</th>
            <th>Squadra</th>
            <th>Ruolo</th>
        </tr>

        <?php
        require_once("connection.php");

        $query = "SELECT * FROM Calciatori";
        $result = $connection->query($query);

        while ($row = $result->fetch_assoc()) {
            $id = $row['id'];
            print("<tr>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<td>" . "<a href='update.php?id=" . $id . "'> Modifica </a>" . "</td>");
            print("<td>" . "<a href='delete.php?id=" . $id . "'> Elimina </a>" . "</td>");
            print("<td>" . $row['nome'] . "</td>");
            print("<td>" . $row['cognome'] . "</td>");
            print("<td>" . $row['squadra'] . "</td>");
            print("<td>" . $row['ruolo'] . "</td>");
            print("</tr>");
        }
        ?>
    </table>

    <h3>Inserisci un nuovo giocatore</h3>

    <form action="create.php" method="post">
        <span>Inserisci nome:</span>
        <input type="text" name="nome"><br>
        <span>Inserisci cognome:</span>
        <input type="text" name="cognome"><br>
        <span>Inserisci squadra:</span>
        <input type="text" name="squadra"><br>
        <span>Inserisci ruolo:</span>
        <input type="text" name="ruolo"><br>
        <input type="submit" value="Aggiungi">
    </form>
</body>

</html>