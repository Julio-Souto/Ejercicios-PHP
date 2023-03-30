<?php
# Para depurar y ver el contenido de nuestra variables tenemos la funciones var_dump() y print_r

// Crea un variable booleana con false y mira el resultado de utilziar ambas funciones para determinar sus diferencias

$bolean = false;
echo "<p>".var_dump($bolean)."</p>";
echo "<p>".print_r($bolean)."</p>";
// Coge el array de meses creado en el ejercicio anterior y mira las diferencias de cómo se muestra con ambas funciones
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio");
echo "<p>".var_dump($meses)."</p>";
echo "<p>".print_r($meses)."</p>";