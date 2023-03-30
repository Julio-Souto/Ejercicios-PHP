<?php
# Con las palabras reseservadas const y define podemos crear constantes

// Crea un array que sea constante donde almacenemos los días de la semana

const DIAS = ["Lunes","Martes","Miercoles","Jueves"];
echo var_dump(DIAS);
foreach(DIAS as $dia){
  echo "<p>$dia</p>";
}