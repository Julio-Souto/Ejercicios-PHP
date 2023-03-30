<?php
//1. Crear una estructura html y mostrar en el título <title> el saludo "Hola tu nombre". El nombre debe aparecer mediante una variable
echo "<html>";
$nombre = "Julio";
echo "<head><title>Hola $nombre</title></head>";
echo "<body>";
echo "<p>Hola $nombre</p>";
echo "</body>";
echo "</html>";