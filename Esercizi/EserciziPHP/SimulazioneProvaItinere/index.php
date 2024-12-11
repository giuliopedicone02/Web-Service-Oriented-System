<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Libri in PHP</title>
</head>

<body>

    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "exam";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {
    ?>

        <h1>
            <center>Books in PHP</center>
        </h1>

        <h3>Lista dei libri</h3>

        <table border=1px>
            <tr>
                <th>Modifica</th>
                <th>Elimina</th>
                <th>ISBN</th>
                <th>Titolo</th>
                <th>Autore</th>
                <th>Publisher</th>
                <th>Ranking</th>
                <th>Anno</th>
                <th>Prezzo</th>
            </tr>

            <?php
            $query = "SELECT * FROM books";

            $result = $connection->query($query);

            while ($row = $result->fetch_assoc()) {
                print("<form action='/' method='post'>");
                print("<tr>");
                $id = $row['id'];
                print("<input type='hidden' name='id' value='$id'>");
                print("<td>" . "<input type='submit' name='action' value='Modifica'>" . "</td>");
                print("<td>" . "<input type='submit' name='action' value='Elimina'>" . "</td>");
                print("<td>" . $row['isbn'] . "</td>");
                print("<td>" . $row['title'] . "</td>");
                print("<td>" . $row['author'] . "</td>");
                print("<td>" . $row['publisher'] . "</td>");
                print("<td>" . $row['ranking'] . "</td>");
                print("<td>" . $row['year'] . "</td>");
                print("<td>" . $row['price'] . "</td>");
                print("</tr>");
                print("</form>");
            }
            ?>
        </table>

        <h3>Inserisci un nuovo libro</h3>

        <form action="/" method="post">
            <span>Inserisci ISBN</span>
            <input type="text" name="isbn"><br>

            <span>Inserisci Titolo</span>
            <input type="text" name="title"><br>

            <span>Inserisci Autore</span>
            <input type="text" name="autore"><br>

            <span>Inserisci Publisher</span>
            <input type="text" name="publisher"><br>

            <span>Inserisci Ranking</span>
            <input type="number" name="ranking"><br>

            <span>Inserisci Anno</span>
            <input type="number" name="anno"><br>

            <span>Inserisci Prezzo</span>
            <input type="number" name="prezzo"><br>

            <input type="submit" name="action" value="Invia">
        </form>
    <?php
    }

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $action = $_POST['action'];

        if ($action == "Invia") {
            $isbn = $_POST['isbn'];
            $titolo = $_POST['title'];
            $autore = $_POST['autore'];
            $publisher = $_POST['publisher'];
            $ranking = $_POST['ranking'];
            $anno = $_POST['anno'];
            $prezzo = $_POST['prezzo'];

            $query = "INSERT INTO books(isbn,title,author,publisher,ranking,year,price) VALUES ('$isbn','$titolo','$autore','$publisher','$ranking','$anno','$prezzo')";

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM books WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }

        if ($action == "Modifica") {
            $id = $_POST['id'];

            $query = "SELECT * FROM books WHERE id=" . $id;

            $result = $connection->query($query);
            $row = $result->fetch_assoc();

            $id = $row['id'];
            $isbn = $row['isbn'];
            $titolo = $row['title'];
            $autore = $row['author'];
            $publisher = $row['publisher'];
            $ranking = $row['ranking'];
            $anno = $row['year'];
            $prezzo = $row['price'];

            print("<h1> <center> Modifica libro </center> </h1>");

            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='$id'>");
            print("<span> Modifica ISBN </span>");
            print("<input type='text' name='isbn' value='$isbn'><br>");
            print("<span> Modifica titolo </span>");
            print("<input type='text' name='titolo' value='$titolo'><br>");
            print("<span> Modifica autore </span>");
            print("<input type='text' name='autore' value='$autore'><br>");
            print("<span> Modifica publisher </span>");
            print("<input type='text' name='publisher' value='$publisher'><br>");
            print("<span> Modifica ranking </span>");
            print("<input type='number' name='ranking' value='$ranking'><br>");
            print("<span> Modifica anno </span>");
            print("<input type='number' name='anno' value='$anno'><br>");
            print("<span> Modifica prezzo </span>");
            print("<input type='number' name='prezzo' value='$prezzo'><br>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['id'];
            $isbn = $_POST['isbn'];
            $titolo = $_POST['titolo'];
            $autore = $_POST['autore'];
            $publisher = $_POST['publisher'];
            $ranking = $_POST['ranking'];
            $anno = $_POST['anno'];
            $prezzo = $_POST['prezzo'];

            $query = "UPDATE books SET isbn='$isbn',title='$titolo',author='$autore',publisher='$publisher',ranking='$ranking',year='$anno', price='$prezzo' WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }
    }
    ?>
</body>

</html>