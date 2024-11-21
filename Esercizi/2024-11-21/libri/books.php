<?php
    require_once "db_connection.php";
?>

<!DOCTYPE html>
<html>
    <head>
        <title>Books</title>
    </head>
    <body>
        <div>
            <h2>Lista Libri</h2>
            <table border="1">
                <tr>
                    <th>ID</th>
                    <th>ISBN</th>
                    <th>Title</th>
                    <th>Author</th>
                    <th>Publisher</th>
                    <th>Price</th>
                </tr>

                <?php
                //scandisco i libri dentro la tabella
                $query = "SELECT * FROM books";
                $result = mysqli_query($db_connection, $query);
    
                if (mysqli_num_rows($result) > 0)
                    while ($row = mysqli_fetch_assoc($result))
                    {
                ?>
                <tr>
                    <td><?php print $row["id"];?></td>
                    <td><?php print $row["isbn"];?></td>
                    <td><?php print $row["title"];?></td>
                    <td><?php print $row["author"];?></td>
                    <td><?php print $row["publisher"];?></td>
                    <td><?php print $row["prezzo"];?></td>
                    <td><a href="update_book.php?id=<?php print $row["id"];?>">Aggiorna Libro</a></td>
                    <td><a href="delete_book.php?id=<?php print $row["id"];?>">Elimina Libro</a></td>
                </tr>
                <?php
                    }
                ?>

            </table>
        </div>
        <a href="index.html">
            <button type="button">Torna alla Home</button>
        </a>
    </body>
</html>