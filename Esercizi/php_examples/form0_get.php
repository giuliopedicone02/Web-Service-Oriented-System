NB:
    la prima volta che il browser apre questa pagina è in risposta a un
    <code>GET <?php echo $_SERVER["PHP_SELF"]; ?> </code> <u>senza
    parametri</u>, da cui il <b>Warning</b>
<hr>

Scrivi una stringa nel form sotto e premi invio:
<form method="GET" action="<?= $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="una_stringa">
</form>

<?php echo "<BR>nella richiesta precedente avevi scritto \"{$_REQUEST['una_stringa']}\" nel form sopra"; ?>