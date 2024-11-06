<?php

error_reporting(E_ERROR);     # mostra solo errori gravi, quindi sopprime WARNING in risposta
# al GET (dovuto all'assenza di un parametro con chiave "una_stringa")

//error_reporting(E_ALL);     # mostra ogni tipo di errore, WARNING compresi; e` il default, in sviluppo
?>

Livello di error reporting: <code>
    <?php printf("%04X\n", error_reporting()) ?>
</code>
<BR><BR>

Scrivi una stringa e premi invio:
<form method="POST" action=" <?php echo $_SERVER["PHP_SELF"]; ?>">
    <input type="text" name="una_stringa">
</form>

<?php
echo "nella richiesta precedente hai scritto \"{$_POST['una_stringa']}\" nel form qui sopra\n"; ?>
<BR>
<hr>
NB: Quando il browser carica questa pagina dalla propria barra degli indirizzi, invia una richiesta
<pre>GET <?php echo $_SERVER["PHP_SELF"]; ?> </pre> senza il
parametro <code>una_stringa</code>, cui il codice di questo script fa riferimento con <code>$_POST['una_stringa']</code>.
<BR>
Ebbene:
<ul style="margin-top:0pt; margin-left:0pt">
    <li>si ha <b>Warning</b> se il livello di error_reporting &egrave; <code>>0001</code></li>
    <li>non si ha invece <b>Warning</b> se il livello &egrave; <code>>0001</code> (<code>E_ERROR</code>)</li>
    <li>in questo script inizialmente <code>error_reporting</code> &egrave; <code>0001</code> e non
        si dovrebbe avere <b>Warning</b></li>
    <li>provare per&ograve; ad attivare l'<code>error_reporting</code> commentato sopra</li>
</ul>
<hr>
<h3>Alcuni codici di errore</h3>

<?php
printf(
    "<pre>\n    E_ALL = %04X\n E_STRICT = %04X\nE_WARNING = %04X\n  E_ERROR = %04X\n</pre>\n",
    E_ALL,
    E_STRICT,
    E_WARNING,
    E_ERROR
);
?>
<p>
    Notare che i bit <code>1</code> corrispondono a un maggior livello di error reporting (<code>E_ERROR</code>,
    cioè <code>0001</code>, riporta solo gli errori non recoverable).
</p>
<p>
    Per info sui codici di errore: <a href="https://www.php.net/manual/en/errorfunc.constants.php">https://www.php.net/manual/en/errorfunc.constants.php</a>
</p>
<p>
    Possono essere definiti in <code>php.ini</code> o con la funzione <code>error_reporting()</code>,
    p.es. in questo file compare l'istruzione: <code>error_reporting(E_ERROR);</code>
</p>
<p>
    Per un server di sviluppo, <code>php.ini</code> pone <code>error_reporting</code> al valore <code>E_ALL</code>
</p>