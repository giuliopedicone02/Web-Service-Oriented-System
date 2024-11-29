<?php

require_once("connection.php");

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'];

    $query = "SELECT * FROM products WHERE id = " . $id;

    $result = $connection->query($query);
    $row = $result->fetch_assoc();

    $nome = $row['name'];
    $price = $row['price'];
    $quantity = $row['quantity'];
}
?>
<h3>Modifica un prodotto</h3>

<form action="update.php" method="post">
    <span>Modifica nome: </span>
    <input type="hidden" name="id" value="<?= $id ?>">
    <input type="text" name="name" value="<?= $nome ?>">
    <span>Modifica quantità: </span>
    <input type=" number" name="quantity" value="<?= $quantity ?>">
    <span>Modifica prezzo: </span>
    <input type="number" name="price" value="<?= $price ?>">
    <input type="submit" value="Invia">
</form>

<?php

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $quantity = $_POST['quantity'];
    $price = $_POST['price'];

    $query = "UPDATE products SET name='$name', quantity='$quantity', price='$price' WHERE id = '$id'";

    print($query);

    $result = $connection->query($query);

    header("location: /");
}
?>