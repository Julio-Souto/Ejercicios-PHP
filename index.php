<?php
require_once("./ejercicio1.php")
// require("./ejercicio1.php")
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
  <?php
    $variable = "nombre";
    $entero = 0;
    $decimal = 3.1416;
    $array = [1, "2", 3];
    $colores = array("Verde", "Rojo", "Azul");
    // const PI = 3.1416;
    if(true){
      define("PI2",3.1416);
    }
    echo "Hola php ".$variable;

    print("<br>Tengo ".count($colores)." colores favoritos");

    echo "<ul>";
    for($i=0 ; $i<count($colores); $i++)
      echo "<li>".$colores[$i]."</li>";
    echo "</ul>";

    foreach($array as $index => $num){
      echo "Numero $num indice $index";
    }

    $nota = [ "Alumno 1" => "Mal", "Alumno 2" => "Fatal"];

    foreach($nota as $alumno => $nota){
      echo "<br> $alumno $nota";
    }

    function saludar (string $nombre):string {
      return "<h1>Hola $nombre</h1>";
    }
    echo saludar("nombre");
  ?>
  <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>" method="post">
    <input type="number" name="num1" id="num1" value="<?=isset($_POST["num1"]) ? $_POST["num1"] : "" ?>" required>
    <input type="number" name="num2" id="num2" value="<?=isset($_POST["num2"]) ? $_POST["num2"] : "" ?>" required>
    <button name="envio" value="enviado">Resta</button>
    <output name="resta" for="num1 num2" value="<?=isset($_POST["resta"]) ? $_POST["resta"] : "" ?>"></output>
  </form>
  <?php 
  // if(count($_REQUEST)>0 && $_POST["envio"] == "enviado"){
  if(isset($_POST["envio"])){
    echo $_REQUEST["num1"]-$_POST["num2"];
  }
  ?>
  <a href="ejercicio1.php">Ejercicio 1</a>
</body>
</html>