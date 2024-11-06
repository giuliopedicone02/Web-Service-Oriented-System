Scrivi una stringa nel form e premi invio:
<form method="POST" action="<?= $_SERVER["PHP_SELF"] ?>">
    <input type="text" name="una_stringa">
</form>

<hr>
<?php echo "<BR>nella richiesta precedente avevi scritto \"{$_POST['una_stringa']}\" nel form sopra"; ?>

<hr>
NB:
Quando il browser carica questa pagina dalla propria barra degli indirizzi, invia una richiesta
<code>GET <?php echo $_SERVER["PHP_SELF"]; ?> </code> senza il
parametro <code>una_stringa</code>, da cui il <b>Warning</b>
<BR><BR>
Quando invece si preme invio dentro il form testo sopra, il browser invia
<code>POST <?php echo $_SERVER["PHP_SELF"]; ?> </code> e invia
(vedi codice) il parametro <code>una_stringa</code>