<?php
echo "hai inviato i dati: <q>";
echo $_REQUEST['testo'];
# NB: superglobal non puo` figurare in stringa tra virgolette
echo "</q><BR>";
echo "e poi:<blockquote>";
echo $_REQUEST['dati'];
echo "</blockquote>";

echo $_REQUEST['REFERRER']

?>
<a href="http:/text2_post.html">Torna indietro</a>
