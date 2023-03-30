<?php
//Crea un arreglo asociativo donde se guarde la información de un perro donde constará su nombre, su raza, y su edad

$perro = ["Nombre" => "aaaaaa", "Raza" => "bbbbbb", "edad" => 10];

//cambia a posteriori el nombre del perro y muéstralo por pantalla 

$perro["Nombre"] = "perro";

foreach($perro as $prop => $value){
  echo "<p>$prop: $value</p>";
}