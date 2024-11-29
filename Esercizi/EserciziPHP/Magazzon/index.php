<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Magazzon PHP</title>
</head>

<body>
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $dbName = "magazzon";

    $connection = new mysqli($servername, $username, $password, $dbName);

    if ($_SERVER['REQUEST_METHOD'] == "GET") {

        print("<h1> <center> Magazzon in PHP </center> </h1>");

        $query = "SELECT * FROM products";

        $result = $connection->query($query);

        if ($result->num_rows > 0) {

            print("<h3> Lista prodotti </h3>");
    ?>

            <table border=1px>
                <tr>
                    <th>Modifica</th>
                    <th>Elimina</th>
                    <th>Nome</th>
                    <th>Quantità</th>
                    <th>Prezzo</th>
                </tr>

            <?php
            while ($row = $result->fetch_assoc()) {
                print("<tr>");

                print("<form action='/' method='post'>");
                print("<input type='hidden' name='id' value='" . $row['id'] . "'>");

                print("<td> " . "<input type='submit' name='action' value='Modifica'>" . " </td>");
                print("<td> " . "<input type='submit' name='action' value='Elimina'>" . " </td>");
                print("<td> " . $row['name'] . " </td>");
                print("<td> " . $row['quantity'] . " </td>");
                print("<td> " . $row['price'] . " </td>");
                print("</form>");

                print("</tr>");
            }

            print("</table>");
        }

            ?>

            <h3>Inserisci un nuovo prodotto</h3>

            <form action="/" method="post">
                <span>Inserisci nome: </span>
                <input type="text" name="name">
                <span>Inserisci quantità: </span>
                <input type="number" name="quantity">
                <span>Inserisci prezzo: </span>
                <input type="number" name="price">
                <input type="submit" name="action" value="Invia">
            </form>
        <?php
    }
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $action = $_POST['action'];

        // CREATE
        if ($action == "Invia") {
            $nome = $_POST['name'];
            $quantita = $_POST['quantity'];
            $prezzo = $_POST['price'];

            $query = "INSERT INTO products(name,quantity,price) VALUES ('$nome','$quantita','$prezzo')";

            $result = $connection->query($query);

            header("location: /");
        }

        // DELETE
        if ($action == "Elimina") {
            $id = $_POST['id'];

            $query = "DELETE FROM products WHERE id=" . $id;

            $result = $connection->query($query);

            header("location: /");
        }

        // UPDATE
        if ($action == "Modifica") {

            $id = $_POST['id'];

            $query = "SELECT * FROM products WHERE id=" . $id;


            $result = $connection->query($query);

            $row = $result->fetch_assoc();

            $nome = $row['name'];
            $quantita = $row['quantity'];
            $prezzo = $row['price'];

            print("<h1><center> Modifica Articolo </center></h1>");

            print("<form action='/' method='post'>");
            print("<input type='hidden' name='id' value='" . $id . "'>");
            print("<span> Modifica nome: </span>");
            print("<input type='text' name='name' value='" . $nome . "'>");
            print("<span> Modifica prezzo: </span>");
            print("<input type='number' name='prezzo' value='" . $prezzo . "'>");
            print("<span> Modifica quantità: </span>");
            print("<input type='number' name='quantita' value='" . $quantita . "'>");
            print("<input type='submit' name='action' value='Update'>");

            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['id'];
            $nome = $_POST['name'];
            $quantita = $_POST['quantita'];
            $prezzo = $_POST['prezzo'];

            $query = "UPDATE products SET name='$nome', quantity='$quantita', price='$prezzo' WHERE id='$id'";
            $result = $connection->query($query);

            header("location: /");
        }
    }
        ?>

</body>

</html>