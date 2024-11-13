<!DOCTYPE html>
<html>

<body>
   <form action="upload_text.php" method="post" enctype="multipart/form-data">
        Clic per scegliere il file testo da caricare:<BR><BR>
        <input type="file" name="fileDaCaricare"><BR><BR>
        <!-- L'elemento "file" qui sopra è un "file chooser" (explorer del S.O.)
             una volta scelto il file, l'upload si attiva col bottone "submit" sotto -->
             
        <!-- Possono esserci anche file chooser multipli; in tal caso, i "name" come p.es. 
             "fileDaCaricare" o "filedaCaricare1" saranno gli indici di $_FILES per il server -->
          <input type="file" name="fileDaCaricare1"><BR><BR>
        <!-- con un solo POST non si possono inviare più di max_file_uploads (def. in php.ini) -->

        <input type="submit" value="Premi per upload">
        <BR><BR>(Il server ricever&agrave; informazioni sul (o sui) file da caricare nell'array
        <tt>$_FILES</tt>)<BR>
     </form>
    <BR><BR><HR>

    <?php define('MY_MAX_SIZE',4000000) ?> 
    <!-- Costante usata sotto come 'value' del campo nascosto MAX_FILE_SIZE (bytes) -->

    <form action="upload_img.php" method="post" enctype="multipart/form-data">
        <input type="hidden" name="MAX_FILE_SIZE" value=" <?= MY_MAX_SIZE ?> ">
        Clic per scegliere il file immagine da caricare (max <?= MY_MAX_SIZE/1000000 ?> MB):
        <input type="file" name="fileDaCaricare"><BR><BR>
        <!-- L'elemento "file" qui sopra è un "file chooser" (explorer del S.O.)
             una volta scelto il file, l'upload si attiva col bottone sotto -->

        <input type="submit" value="Premi per upload" name="invia">
        <!-- la presenza di name="invia" e value="Premi per upload" fa sì che il
             POST porti con sè un parametro con chiave "invia" e valore "Premi per upload"
             NB: inoltre, 'value' è anche il testo visualizzato nel bottone -->
    </form>
</body>

</html>