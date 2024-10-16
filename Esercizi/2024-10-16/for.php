<?php
$colors = array("red", "green", "blue", "yellow");

echo "<h3> Primo metodo (foreach) </h3>";

foreach ($colors as $x) {
    echo "$x <br>";
}

echo "<h3> Secondo metodo (for tradizionale) </h3>";

for ($i = 0; $i < sizeof($colors); $i++) {
    echo $colors[$i] . "<br>";
}
