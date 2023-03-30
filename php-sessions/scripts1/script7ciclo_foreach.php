<?php
//crea un arreglo que guarde la información de los meses del año (Enero, Febrero, Marzo...) y los muestre posteriormente en una lista ordenada de html

$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio");
echo "<ol>";
foreach($meses as $mes){
  echo "<li>$mes</li>";
}
echo "</ol>";