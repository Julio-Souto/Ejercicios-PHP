<?php
require("./gestion.php")
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
  extract($_GET);
  if($nombre == "")
    echo "Nombre vacio";
  ?>
  <a href="index.php">Volver</a>
</body>
</html>