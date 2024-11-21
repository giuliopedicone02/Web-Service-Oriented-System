<!DOCTYPE html>
<html>
    <head>
        <title>Create</title>
    </head>
    <body>
        <h1>Create region</h1>
        <?php
        require_once("connection.php");
        $regionId = (int)filter_input(INPUT_GET, "id", FILTER_SANITIZE_NUMBER_INT);
        try{    
            $statement = $GLOBALS["connection"]->prepare("select * from regions where id=?");
            $statement->bind_param("i", $regionId);
            $statement->execute();
        }catch(Exception $e){
            echo "Error executing select query: " . $e->getMessage();
        }

        $name = "";
        $statement->bind_result($regionId, $name);
        while($statement->fetch()){
        ?>    
            <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
                <input type="hidden" value="<?php echo $regionId?>" name="id">
                Name: <input type="text" name="name" value=<?php echo $name;?>>
                <button type="submit">Confirm</button>
            </form>

        <?php
        }
        ?>
        <br><br>
        <form action="delete.php" method="POST">
            <input type="hidden" value="<?php echo $regionId?>" name="id">
            <button type="submit">Delete</button>
        </form>
    </body>
    <a href="../index.html">Home</a>
    <a href="list.php">Back</a>
</html>
<?php
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = (int)filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    $name = htmlspecialchars($_POST["name"]);
    try{
        $statement = $GLOBALS["connection"]->prepare("update regions set name=? where id=?");
        $statement->bind_param("si", $name, $id);
        $statement->execute();
    }catch(Exception $e){
        echo "Error executing update query: " . $e->getMessage();
    }
    header("Location: list.php");
}
?>