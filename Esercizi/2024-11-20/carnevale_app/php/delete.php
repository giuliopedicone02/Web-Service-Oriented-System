<?php
require_once("connection.php");
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id = (int)filter_input(INPUT_POST, "id", FILTER_SANITIZE_NUMBER_INT);
    try{
        $statement = $GLOBALS["connection"]->prepare("delete from regions where id=?");
        $statement->bind_param("i", $id);
        $statement->execute();
    }catch(Exception $e){
        echo "Error executing update query: " . $e->getMessage();
    }
    header("Location: list.php");
}