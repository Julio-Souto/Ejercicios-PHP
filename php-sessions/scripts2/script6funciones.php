<?php

//crea una función que cada vez que la llamemos realice un salto de línea en html

function salto(){
	echo "<br>";
}

//crea una función que muestre por pantalla un mensaje personaliado como parámetro

function mensaje(string $mensaje){
	echo "<p>$mensaje</p>";
}

mensaje("Hola mundo");
salto();
mensaje("Adios mundo");
salto();
mensaje("a");




//Modifica la función que viene a continuación para que a partir de un parámetro númerico
//(entre 1 y 7) devuelva el día de la semana
function getDia(int $num){
	$array = ["lunes","martes","miércoles","jueves","viernes","sábado","domingo"];
	if($num>0&&$num<=7)
		echo $array[$num-1];
	else
		echo "$num no es numero de la semana";
}
salto();
getDia(1);
salto();
getDia(7);
salto();
getDia(5);
salto();
getDia(-3);