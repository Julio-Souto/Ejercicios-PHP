<?php
 # round() Redondeo de un número

 # rand() Obtención de un número aleatorio
 
 # ceil() Redondeo siempre de un número hacia arriba. Fundamental para realzar paginación

 

//obtener un número aleatorio con rand() entre 1 y 100 y decir si es par o no
$random = rand(1,100);
echo "$random<br>";
if($random%2==0)
  echo "Par<br>";
else
  echo "Impar<br>";

$numero = 3.4;

//a partir de la variable de arriba redondéalo hacia arriba y luego hacia abajo (round y ceil)
echo round($numero)."<br>";
echo ceil($numero);