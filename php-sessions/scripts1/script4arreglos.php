<?php
//Crea un arreglo que me cargue los meses de un año y los visualicemos a posteriori en una lista ordenada de HTML
$meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio");
echo "<ul>";
foreach($meses as $mes){
  echo "<li>$mes</li>";
}
echo "</ul>";