<!DOCTYPE html>
<html lang="it">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UEFA</title>
</head>

<body>

    <h1>
        <center>Modifica Torneo </center>
    </h1>

    <?php

    if ($_SERVER['REQUEST_METHOD'] == 'GET') {

        require_once("db_connection.php");

        $query = "SELECT * FROM tournaments WHERE id = " . $_GET['id'];

        $result = $db_connection->query($query);

        $row = $result->fetch_assoc();

        $id = $row['id'];
        $name = $row['name'];
        $logo = $row['logo'];
        $year = $row['year'];
        $champion = $row['champion'];
    ?>
        <form action="/update.php" method="post">
            <input type="hidden" name="id" value="<?= $id ?>">
            <span>Nome: </span>
            <input type="text" name="nome" value="<?= $name ?>"> <br>
            <span>Logo: </span>
            <input type="text" name="logo" value="<?= $logo ?>"> <br>
            <span>Anno: </span>
            <input type="number" name="anno" value="<?= $year ?>"> <br>
            <span>Champion: </span>
            <input type="text" name="champion" value="<?= $champion ?>"> <br>
            <input type="submit" value="Modifica">
        </form>

        <a href="/read.php">Torna alla Home</a>
    <?php
    } else {

        require_once("db_connection.php");

        $id = $_POST['id'];
        $name = $_POST['nome'];
        $logo = $_POST['logo'];
        $year = $_POST['anno'];
        $champion = $_POST['champion'];

        $query = "UPDATE tournaments SET name='$name', logo='$logo', year='$year', champion='$champion' WHERE id = '$id'";

        $db_connection->query($query);

        header("location: read.php");
    }

    ?>
</body>

</html>