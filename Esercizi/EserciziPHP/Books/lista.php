<?php

require_once("connection.php");

$query = "SELECT * FROM books";

$result = $connection->query($query);

print("<h1> <center> Lista Libri </center> </h1>");

while ($row = $result->fetch_assoc()) {
    print("<span> <b> ISBN </b>" . $row['isbn'] . " </span> <br>");
    print("<span> <b> Titolo </b> " . $row['title'] . "</span>  <br>");
    print("<span> <b> Autore </b> " . $row['author'] . "</span> <br>");
    print("<span> <b> Publisher </b>" . $row['publisher'] . " </span> <br>");
    print("<span> <b> Ranking </b> " . $row['ranking'] . "</span> <br>");
    print("<span> <b> Anno </b>" . $row['year'] . " </span> <br>");
    print("<span> <b> Prezzo </b> " . $row['price'] . "</span> <br><br>");
}

print("<a href='/'> Torna alla Home </a>");
