<?php 
    $db_connection = mysqli_connect("localhost:3306","username","password","myDB") or die("Errore di connessione MySQL");

    /*
    per creare la tabella books
   
    CREATE TABLE books
    (
        id INT UNSIGNED NOT NULL AUTO_INCREMENT,
        isbn VARCHAR(30) NOT NULL,
        title VARCHAR(30) NOT NULL,
        author VARCHAR(30) NOT NULL,
        publisher VARCHAR(30) NOT NULL,
        prezzo FLOAT NULL,
        PRIMARY KEY (id)
    );
    */
 ?>

 