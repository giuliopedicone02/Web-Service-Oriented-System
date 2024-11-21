<?php
if ($_SERVER["REQUEST_METHOD"] == "GET")
{
    $id = $_GET["id"] ?? -1;

    if ($id > -1)
    {
        require_once "db_connection.php";

        //elimino il libro
        $query = "DELETE FROM books WHERE id = $id;";
        $result = mysqli_query($db_connection, $query);

        //redirect alla pagina dei libri
    }

    header("Location: books.php");
        
    
}
