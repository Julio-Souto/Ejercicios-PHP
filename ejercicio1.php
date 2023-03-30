<?php
  $num1 = 20;
  $num2 = 3;

  echo "Resta: ".$num1-$num2;

  for($i = 1 ; $i <= 10 ; $i++){
    echo "<br>$i";
  }

  const PI = 3.1416;

  function areaCirculo(float $radio):float{
    return PI*$radio*$radio;
  }

  echo "<br>".areaCirculo(3);

  $rgb = ["Rojo", "Verde", "Azul"];

  echo "<br>".$rgb[2];

  $paises = ["España"=>"Madrid","Francia"=>"Paris","Inglaterra"=>"Londres","Italia"=>"Roma","Portugal"=>"Lisboa","Alemania"=>"Berlin"];

  foreach($paises as $pais => $capital){
    if($pais=="Francia"){
      echo "<br>$pais $capital";
    }
  }
  echo "<br>".key($paises)." ".$paises["Francia"];