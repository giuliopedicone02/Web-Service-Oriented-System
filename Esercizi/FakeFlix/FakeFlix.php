<?php
// Create connection
$servername = "localhost";
$username = "username";
$password = "password";
$dbname = "myDB";

$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error)
{
    die("Connection failed: " . $conn->connect_error);
}

if($_SERVER['REQUEST_METHOD']==='GET')
{   //GET 
    // (presenta all'utente il form iniziale, quando il browser si collega)
    $sql="SELECT * FROM flist";
    $result=$conn->query($sql);
    if($result->num_rows > 0)
    {
        // seleziono un record a caso
        $result->data_seek(rand(0, $result->num_rows-1));
        $row=$result->fetch_assoc();
        $titolo_preso_a_caso = $row['titolo'];
        $regista_titolo_preso_a_caso = $row['regista'];
        print "<h2>Film consigliato:</h2>";
        print "$titolo_preso_a_caso" . ($regista_titolo_preso_a_caso ? " ($regista_titolo_preso_a_caso)" : "");
    }
    ?>
    <br><br><hr>
    <form action="<?php print $_SERVER['PHP_SELF'] ?>" method="POST">
        <input type="submit" name="wlist" value="visualizza la wishlist"><br><hr><br>
        <input type="text" name="titolo" placeholder="titolo del film">
        <input type="text" name="regista" placeholder="regista">
        <input type="submit" name="trova" value="trova"> (il titolo e/o il regista)
    </form>
    <?php
}
else //POST
{
    if(isset($_POST['trova']))
    {
        //cerco il record
        $titolo = $_POST['titolo'];
        $regista = $_POST['regista'];
        if($titolo == "" && $regista == "")
        {
            print "<h1>Inserire almeno un criterio di ricerca</h1><br>";
            print '<br><a href="' . $_SERVER['PHP_SELF'] . '">torna indietro</a>';
        }
        else
        {
            $sql = "SELECT * from flist WHERE ";
            $and = false;
            if($titolo != "")
            {
                $sql .= "titolo = '$titolo' ";
                $and = true;
            }
            if($regista != "")
                $sql .= ($and ? "AND " : "") . "regista = '$regista'";

            //print $sql;
            //exit;
            $result = $conn->query($sql);
            if ($result->num_rows > 0)
            {
                print "<h1>Film richiest";
                print $result->num_rows == 1 ? "o" : "i";
                print ":</h1><br>";
                while($row = $result->fetch_assoc())
                    print $row['titolo'] . " " . ($row['regista'] ? "(" . $row['regista'] . ")" : "") . "<br>";
                
                print '<br><a href="' . $_SERVER['PHP_SELF'] . '">torna indietro</a>';
            }
            else
            {
                print "<h2>Ci dispiace, ". ($titolo != "" ? "<i>$titolo</i>" : "<i>$regista</i>") ." non disponibile</h2>";

                // se non trovo il record nella tabella flist, lo cerco nella wishlist (wlist)
                $sql = "SELECT * from wlist WHERE ";
                $and = false;
                if ($titolo != "")
                {
                    $sql .= "titolo = '$titolo' ";
                    $and = true;
                }
                if ($regista != "")
                {
                    $sql .= ($and ? "AND " : "") . "regista = '$regista'";
                }
                $result = $conn->query($sql);
                if ($result->num_rows > 0)
                {
                    // il film è presente nella wishlist (wlist)
                    print "<h2>". ($titolo != "" ? "film" : "regista") . " gi&agrave; in wishlist</h2>";
                    print '<br><a href="' . $_SERVER['PHP_SELF'] .'">torna indietro</a>';
                }
                else
                {
                    // l'oggetto della ricerca non è presente in wishlist
                    print "<h2>". ($titolo != "" ? "film" : "regista") . " non in wishlist</h2>";
                    ?>
                    <!-- presento form per chiedere se lo si vuole aggiungere alla wishlist -->
                    <br>Si desidera inserirlo nella wishlist?
                    <form action="<?php print $_SERVER['PHP_SELF']?> " method="POST">
                        <input type="hidden" name="titolo" value="<?php print $titolo;?>">
                        <input type="hidden" name="regista" value="<?php print $regista;?>">
                        <br><input type="submit" name="si" value="si">
                        <input type="submit" name="no" value="no">
                    </form>
                    <?php
                 }
            }   
        }
    }

    elseif (isset($_POST['si']))
    {
        //aggiungo il film alla wish list
        $titolo = substr($_POST['titolo'], 0, 30); // Accorcio il titolo a 30 caratteri, se necessario
        $regista = substr($_POST['regista'], 0, 30); // Accorcio il regista a 30 caratteri, se necessario


        $sql="INSERT INTO wlist (titolo, regista) VALUES ('$titolo', '$regista')";
        $conn->query($sql);
        header("location: " . $_SERVER['PHP_SELF']);
    }

    elseif (isset($_POST['no']))
    {
        //torno indietro
        header("location: " . $_SERVER['PHP_SELF']);
    }

    elseif (isset($_POST['wlist']))
    {
        //visualizzo la wish list
        $sql="SELECT * from wlist";
        $result=$conn->query($sql);
        if($result->num_rows>0)
        {
            print "<h2>La wishlist &egrave;:</h2>";
            print "<table><th>Titolo</th><th>Regista</th>";
            while($row = $result->fetch_assoc())
            {   print "<tr>";
                print "<td>" . $row['titolo'] . "</td>\n<td>";
                print $row['regista'] ? "(" . $row['regista'] . ")" : "";
                print "</td>\n</tr>\n";
            }
            print "</table>"
            ?>
            <form action="<?php print $_SERVER['PHP_SELF']?> " method="POST">
                <br><input type="submit" name="svuota" value="svuota">
            </form>
            <?php
        }
        else
        {
            print "<h1>La whish list e' vuota!</h1>";
        }
        print '<br><a href="'. $_SERVER['PHP_SELF'] .'">torna indietro</a>';
    }

    elseif (isset($_POST['svuota']))
    {
        ?>
        <h2>Svuotare la wishlist definitivamente?</h2>
        <form action="<?php print $_SERVER['PHP_SELF']?> " method="POST">
        <br><input type="submit" name="svuotasi" value="si">
        <input type="submit" name="svuotano" value="no">
        </form>
        <?php
    }

    elseif (isset($_POST['svuotasi']))
    {
        //svuoto la wish list
        $sql = "DELETE from wlist";
        $result = $conn->query($sql);
        header("location: " . $_SERVER['PHP_SELF']);
    }

    elseif (isset($_POST['svuotano']))
    {
        header("location: " . $_SERVER['PHP_SELF']);
    }
}
