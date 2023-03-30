<?php
//crea un arreglo multidemensional que guarde la información de un listado de amigos y sus teléfonos

$amigos = [["amigo1",123456],["amigo2",1245687],["amigo3",987564213]];

foreach($amigos as $amigo){
  echo "<p>";
  for($j = 0; $j < count($amigo); $j++){
    echo $amigo[$j]." ";
  }
  echo "</p>";
}


//muestra con count() el número de amigos que tiene tu listado
echo count($amigos);