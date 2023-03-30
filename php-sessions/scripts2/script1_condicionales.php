<?php
# if (condicion){
# 	// Instrucciones
# }
# 
# Operadores de comparacion:
# 
# == Igualdad
# < Menor que
# > Mayor que
# <= Menor o igual que
# >= Mayor o igual que
# != Diferente
# ! Negacion
# 
# */


# Operadores de logicos:

# && - Evalua que se cumpla una de las dos condiciones
# ||, OR - Evalua que se cumpla al menos una condicion


//Crea la estructura de una web en el que se ha de guardar en una variable llamada edad un valor. Si el usuario es mayor de edad se mostrará el mensaje "Bienvenido a esta web", en caso contrario un mensaje conforme a que es menor de edad y no puede visitar el sitio. La edad se ha de cargar mediante un formulario
// $_REQUEST, $_POST, $_GET para capturar el envío del formulario
// isset() — Determina si una variable está definida y no es null


# if else
# $verdadero = true;
# $mes = 'Enero';
# 
# if ($verdadero) {
# 	echo "Verdadero";
# } else {
# 	echo "Falso";
# }
# 
# if ($mes == 'Diciembre') {
# 	echo "Feliz Navidad";
# } else if($mes == 'Enero'){
# 	echo "Feliz Año Nuevo";
# } else if ($mes == 'Julio'){
# 	echo "Feliz Julio";
# } else {
# 	echo "El mes que pusiste no tiene celebracion";
# }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <form>
    <label for="edad">Edad</label>
    <input type="number" name="edad" id="edad" value="<?= isset($_GET["edad"]) ? $_GET["edad"] : "" ?>">
    <button name="enviar">Enviar</button>
  </form>
  <?php
  $edad = 0;
  if(isset($_GET["edad"])){
    $edad = $_GET["edad"];
    if($edad >= 18){
      echo "<p>Bienvenido a la pagina</p>";
    }
    else{
      echo "<p>No puedes acceder a la pagina</p>";
    }
  }
  ?>
</body>
</html>