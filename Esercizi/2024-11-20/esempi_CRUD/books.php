<?php

$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "exam";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error)
{
    die("connessione non effettuata: " . $conn->connect_error);
}
else
{
    print "connessione effettuata<br>";
}


$sql = "SELECT * FROM books";

$result = $conn->query($sql);
if($result->num_rows > 0)
{
    while($row = $result->fetch_assoc())
        print $row['isbn'] . " " . $row['title'] . " " . $row['author'];
}
else
    print "tabella vuota???";

?>