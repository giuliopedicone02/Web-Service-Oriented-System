<!-- escape_if_2.php -->

<!-- https://www.php.net/manual/en/language.basic-syntax.phpmode.php -->

HTML qui, ora PHP<BR>
<?php
$x = 10;
if ($x == 0): ?>
   <B>x vale <?php echo $x; ?> (then)</B>
<?php else: ?>
   <B>x vale <?php echo $x; ?> (else)</B>
<?php endif; ?>
<BR>fine PHP, ora HTML