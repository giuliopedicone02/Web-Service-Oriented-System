Scrivi una stringa nel form sotto e premi invio:
<form method="get" action="<?= $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="una_stringa">
</form>

<?php echo "<br> Nella richiesta precedente avevi scritto: \"{$_REQUEST['una_stringa']}\" nel form sopra";
?>