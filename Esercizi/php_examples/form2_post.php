<html>

<body>
    <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">
        Name: <input type="text" name="nome_proprio">
        <input type="submit">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // collect value of input field
        $nomep = $_REQUEST['nome_proprio'];
        if (empty($nomep)) {
            echo "non hai scritto niente nel form";
        } else {
            echo "nella richiesta precedente avevi scritto \"$nomep\" nel form qui sopra\n<BR>";
            echo "(\"$nomep\" &egrave; il valore letto con <code>_REQUEST['nome_proprio']</code>, ";
            echo "si pu&ograve; anche leggere con <code>\$_POST['nome_proprio']</code>";
        }
    }
    ?>
</body>

</html>