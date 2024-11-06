Scrivi una stringa e premi invio:
<form method="GET" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
   <input type="text" name="una_stringa">
</form>

<?php echo "<BR>nella richiesta precedente avevi scritto \"{$_GET['una_stringa']}\" nel form sopra"; ?>