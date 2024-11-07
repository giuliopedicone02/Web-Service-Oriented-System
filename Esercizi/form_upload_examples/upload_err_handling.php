<?php

echo "Massima dim. POST accettato dal server ";
echo "(<code>post_max_size</code> in <code>php.ini</code>): ";
echo ini_get("post_max_size") . "<BR>";

echo "Massima dim. file accettato dal server ";
echo "(<code>upload_max_filesize</code> in <code>php.ini</code>): ";
echo ini_get("upload_max_filesize") . "<BR>";

define('MAX_SIZE_FOR_SCRIPT',10000);
echo "Massima dim. file accettato da questo script: ";
echo MAX_SIZE_FOR_SCRIPT/1000 . "K<BR>";

echo "Massima dim. file accettato da form di upload in <code>";
echo basename($_SERVER['HTTP_REFERER']) . "</code>: ";
echo $_POST['MAX_FILE_SIZE'] / 1000000 . "M ";

echo "(ci si aspetterebbe &lt;" . MAX_SIZE_FOR_SCRIPT/1000;
echo "K, ma, per testare pi&ugrave; casi, provare ";
echo "invece p.es. " . 2*MAX_SIZE_FOR_SCRIPT/1000 . "K o ";
echo 2 * (int) ini_get("upload_max_filesize")  . "M)<hr>";


$upload_err_msg = [
    "no error",
    "errore: upload troppo grande per server",
    "errore: upload troppo grande per form sul browser"
];
