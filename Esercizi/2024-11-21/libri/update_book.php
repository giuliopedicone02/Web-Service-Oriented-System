<?php
require_once("db_connection.php");

//se la richiesta è POST sto aggiornando
if($_SERVER["REQUEST_METHOD"] == "POST")
{
    $id = $_POST["id"];
    $isbn = $_POST["isbn"];
    $title = $_POST["title"];
    $author = $_POST["author"];
    $publisher = $_POST["publisher"];
    $price = floatval($_POST["price"]);

    $query = "UPDATE books SET isbn='$isbn', title='$title', author='$author', publisher='$publisher', prezzo=$price WHERE id=$id;";
    $result = mysqli_query($db_connection, $query);

    header("Location: books.php");
    
}
else
{
    //se la richiesta è GET mostro le informazioni del libro all'utente
    if(isset($_GET["id"]))
    {
        //$id = mysqli_real_escape_string($db_connection, $_GET["id"]);
        $id =  $_GET["id"];

        $query = "SELECT * FROM books WHERE id = $id;";
        $result = mysqli_query($db_connection, $query);
        $row = mysqli_fetch_assoc($result);
        if (!$row)
        {
            header("Location: books.php");
            exit;
        }
        //da qui prosegue sotto all'HTML
    }
    else 
    {
        header("Location: books.php");
        exit;
    }
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>Books</title>
    </head>
    <body>
        <div>
            <h2>Aggiorna Libro</h2>
            <form action="<?= $_SERVER['PHP_SELF'] ?>" method="POST">
                <label>ISBN</label>
                <input type="text" name="isbn" placeholder="Inserisci ISBN" value="<?=  $row['isbn']; ?>" />
                <br>

                <label>Titolo</label>
                <input type="text" name="title" placeholder="Inserisci Titolo" value="<?php echo $row['title']; ?>" />
                <br>

                <label>Autore</label>
                <input type="text" name="author" placeholder="Inserisci Autore" value="<?php echo $row['author']; ?>" />
                <br/>

                <label>Publisher</label>
                <input type="text" name="publisher" placeholder="Inserisci Publisher" value="<?php echo $row['publisher']; ?>" />
                <br>

                <label>Prezzo</label>
                <input type="text" name="price" placeholder="Inserisci Prezzo" value="<?php echo $row['prezzo']; ?>" />
                <br>
                <br>
                <input type="hidden" name="id" value="<?php echo $row['id']; ?>" />

                <button>Aggiorna Libro</button>
            </form>
            
        </div>
        <a href="books.php">
                <button type="button">Annulla</button>
        </a>
    </body>
</html> 