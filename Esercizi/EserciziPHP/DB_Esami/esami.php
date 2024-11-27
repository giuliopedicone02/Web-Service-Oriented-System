<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DB ESAMI</title>
</head>

<body>
    <?php
    $servername = "localhost:3306";
    $username = "root";
    $password = "Giulio2002!";
    $database = "L31_esami";

    $conn = new mysqli($servername, $username, $password, $database);

    if ($conn->connect_error) {
        die("Connection failed" . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == 'GET') {

        print("<h1>");
        print("<center>DB Esami PHP</center>");
        print("</h1>");

        print("<h3> Lista esami </h3>");

        $query = "SELECT * FROM esami";

        $result = $conn->query($query);

        if ($result->num_rows != 0) {
            while ($row = $result->fetch_assoc()) {
                print("<form action='/esami.php' method='POST'>");
                print("<input type='submit' name='action' value='Modifica'>");
                print("<input type='submit' name='action' value='Elimina'>");
                print("<input type='hidden' name='Id' value= '" . $row['id'] . "'>");

                print("<span> <b> Nome Esame: </b>" . $row['nome'] . "</span>");
                print("<span> <b> Voto Esame: </b>" . $row['voto'] . "</span> <br/>");
                print("</form>");
            }
        }

        print("<h3>Inserisci un nuovo esame</h3>");

        print("<form action='/esami.php' method='post'>");
        print("<span>Inserisci nome materia:</span>");
        print("<input type='text' name='Nome' placeholder='Inserisci nome materia'>");
        print("<span>Inserisci voto materia:</span>");
        print("<input type='number' name='Voto' placeholder='Inserisci voto materia'>");
        print("<input type='submit' name='action' value='Invia'>");
        print("</form>");
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $action = $_POST['action'];

        // CREATE
        if ($action == "Invia") {
            $nome = $_POST['Nome'];
            $voto = $_POST['Voto'];

            $query = "INSERT INTO esami(nome,voto) VALUES ('$nome', '$voto')";

            $result = $conn->query($query);

            print("Nuova materia aggiunta. Righe modificate $result <br>");

            print("<a href='/esami.php'>Torna alla Home </a>");
        }

        // DELETE
        if ($action == "Elimina") {
            $id = $_POST['Id'];

            $query = "DELETE FROM esami WHERE id = $id";

            $result = $conn->query($query);

            print("Esame eliminato! Righe eliminate $result <br>");

            print("<a href='/esami.php'>Torna alla Home </a>");
        }

        //UPDATE
        if ($action == "Modifica") {
            $id = $_POST['Id'];

            $query = "SELECT * FROM esami WHERE id = $id";

            $result = $conn->query($query);

            while ($row = $result->fetch_assoc()) {
                $nome = $row['nome'];
                $voto = $row['voto'];
            }


            print("<h3>Modifica un esame</h3>");

            print("<form action='/esami.php' method='post'>");
            print("<input type='hidden' name='Id' value= '" . $id . "'>");
            print("<span>Modifica nome materia:</span>");
            print("<input type='text' name='Nome' value='$nome'>");
            print("<span>Inserisci voto materia:</span>");
            print("<input type='number' name='Voto' value='$voto'>");
            print("<input type='submit' name='action' value='Update'>");
            print("</form>");
        }

        if ($action == "Update") {
            $id = $_POST['Id'];
            $nome = $_POST['Nome'];
            $voto = $_POST['Voto'];

            print("$nome $voto");


            $query = "UPDATE esami SET nome='$nome', voto='$voto' WHERE id = '$id'";

            $result = $conn->query($query);

            print("Esame modificato. Righe modificate $result <br>");

            print("<a href='/esami.php'>Torna alla Home </a>");
        }
    }
    ?>
</body>

</html>