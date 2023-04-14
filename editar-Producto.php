<?php
  require_once("./abstract-Products.php");
  $producto = $_SESSION["products"][$_GET["key"]];
  $tipoS = trim(explode("-",$producto->dimeTipo())[0]);
  extract($_POST);
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
  <h1>Editar</h1>
  <form action="#" method="post">
    <fieldset>
      <label for="nombre">Nombre Producto</label>
      <input type="text" id="nombre" name="nombre" value="<?=$producto->getNombre();?>">
      <label for="precio">Precio</label>
      <input type="number" name="precio" id="precio" step=".01" value="<?=$producto->getPrecio();?>">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo">
        <option value="alimento" <?php if($tipoS=="Alimento") echo "selected";?>>Alimento</option>
        <option value="utensilio" <?php if($tipoS=="Utensilio") echo "selected";?>>Utensilio</option>
      </select>
      <div>
        <input type="checkbox" name="caduca" id="caduca" <?php if($tipoS=="Alimento"){
          if($producto->getCaduco())
            echo "checked";
        }?>>
        <label for="caduca">Es caduco?</label>
      </div>
      <label for="fecha">Fecha de caducidad</label>
      <input type="date" name="fecha" id="fecha" value="<?php 
        if($tipoS=="Alimento"){
          if($producto->getCaduco())
            echo date("Y-m-d",strtotime($producto->getFecha()));
        }
      ?>">
      <input type="checkbox" name="descuento" id="descuento">
      <label for="descuento">Tiene descuento?</label>
      <div>
        <button name="editar">Editar</button>
      </div>
      <?php
        if(isset($editar)&&$nombre!=""&&$precio!=""){
          if(isset($tipo)&&$tipo=="alimento"){
            $nuevo = new Alimento($nombre,(isset($descuento))?Producto::aplicarDescuento25($precio):$precio,isset($caduca) ? true : false,($fecha=="")?null : new DateTime($fecha));
            $_SESSION["products"][$_GET["key"]]=$nuevo;
            header("Location: ./abstract-Products.php");
          }
          else{
            $nuevo = new Utensilio($nombre,(isset($descuento))?Producto::aplicarDescuento25($precio):$precio);
            $_SESSION["products"][$_GET["key"]]=$nuevo;
            header("Location: ./abstract-Products.php");
          }
        }
      ?>
    </fieldset>
</body>
</html>