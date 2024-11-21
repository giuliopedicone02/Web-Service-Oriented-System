<!DOCTYPE html>
<html>
    <head>
        <title>Create</title>
    </head>
    <body>
        <h1>Create region</h1>
        <form action="<?php echo $_SERVER["PHP_SELF"];?>" method="POST">
            Name: <input type="text" name="name">
            <button type="submit">Confirm</button>
        </form>
    </body>
    <a href="../index.html">Home</a>
    <a href="list.php">Back</a>
</html>
<?php
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $name = htmlspecialchars($_POST["name"]);
    try{
        $statement = $GLOBALS["connection"]->prepare("insert into regions(name) values(?)");
        $statement->bind_param("s", $name);
        $statement->execute();
    }catch(Exception $e){
        echo "Error executing insert query: " . $e->getMessage();
    }
    header("Location: list.php");
}
?>