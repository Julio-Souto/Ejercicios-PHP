<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <style>
    form{
      padding: 1em;
    }
    .field, button{
      margin-top: 1em;
    }
  </style>
</head>
<body>
  <form action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
    <div class="field">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre" value=<?php if(isset($_GET["nombre"])) echo $_GET["nombre"] ?>>
    </div>
    <div class="field">
      <label>
        Mujer <input <?php if(isset($_GET["sexo"]) && $_GET["sexo"]=="mujer") echo "checked" ?> type="radio" name="sexo" value="mujer">
      </label>
      <label>
        Hombre <input <?php if(isset($_GET["sexo"]) && $_GET["sexo"]=="hombre") echo "checked" ?> type="radio" name="sexo" value="hombre">
      </label>
    </div>
    <div class="field">
      <label>
        Comentarios <textarea name="comentarios"><?php if(isset($_GET["comentarios"])) echo $_GET["comentarios"] ?></textarea>
      </label>
    </div>
    <?php 
    $provincias = [
      "C" => "A Coruña",
      "L" => "Lugo",
      "O" => "Ourense",
      "P" => "Pontevedra"
    ]
    ?>
    <select name="provincia" id="provincia">
      <?php 
        extract($_GET);
        foreach($provincias as $value => $text){
          $selected = (isset($provincia) && $value==$provincia) ? "selected" : "";  
          echo "<option $selected value=$value>$text</option>";
        }
      ?>
    </select>
    <button name="enviar">Enviar</button>
  </form>
</body>
</html>