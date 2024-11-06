<!-- escape_if_1.php -->

<!-- https://www.php.net/manual/en/language.basic-syntax.phpmode.php -->

HTML qui, ora PHP<BR>
<?php
$x = 10;
if ($x == 0): ?>
   <B>HTML qui: condizione vera</B>
<?php else: ?>
   <B>HTML qui: condizione falsa</B>
<?php endif; ?>
<BR>fine PHP, ora HTML
