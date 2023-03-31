<?php 

# trim()  limpiamos los espacios en blanco por la izquierda y la derecha
# strlen() longitud de un string
# substr() extraemos texto
# strtoupper() pasamos a mayúsculas
# strtolower() pasamos a minúsculas
# strpos() posición / índice de una parte de la cadena

$nombreProfe = "                Xurxo            ";
//con las funciones trim() y strlen() indícame el número de caracteres que tiene tu profesor
echo strlen(trim($nombreProfe))." ";

$nombreCompleto	=" Xurxo González Tenreiro";
$nombreCompleto = trim($nombreCompleto);
$nombre = substr($nombreCompleto, 0, strpos($nombreCompleto," "));
$apellidos = substr($nombreCompleto, strpos($nombreCompleto," "));
//crea dos variables y extraeme los valores del nombre por un lado y los apellidos por otro:
//funciones útiles: strlen, strpos, substr, trim
echo $nombre." ".$apellidos;