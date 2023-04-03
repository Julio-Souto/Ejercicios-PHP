<?php
  $errores = "";
  extract($_POST);
?>

<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulario</title>
</head>
<body>
  <div class="container">
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
      <fieldset>
        <h1>Enviar Mensaje</h1>
        <label for="nombre">Nombre Completo *</label>
        <input type="text" id="nombre" name="nombre" placeholder="Pepito de los palotes" value="<?php if(isset($nombre)) echo trim($nombre);?>">
        <label for="email">Email *</label>
        <input type="text" id="email" name="email" placeholder="pepito@palotes.com" value="<?php if(isset($email)) echo trim($email);?>">
        <label for="mensaje">Mensaje *</label>
        <textarea name="mensaje" id="mensaje" cols="40" rows="5" placeholder="Mi mensaje"><?php if(isset($mensaje)) echo trim($mensaje);?></textarea>
        <input type="checkbox" name="privacidad" id="privacidad" value="privacidad" 
        <?php if(isset($privacidad)) echo "checked";?>>
        <label for="privacidad" class="privacidad">Acepto la política de privacidad *</label>
        <button id="enviar" name="enviar" value="enviado">Enviar</button>
        <?php
          if($_SERVER["REQUEST_METHOD"] == "POST" && isset($enviar)){
            if($nombre=="")
            $errores .= "El campo <mark>Nombre Completo</mark> no puede estar vacío<br>";
            if(preg_match("/^[\w\.-]+@[a-z0-9\.]+\.[a-z]{2,3}$/i",$email)==0)
            $errores .= "El email <mark>".$email."</mark> no es  válido<br>";
            if($mensaje=="")
            $errores .= "El campo <mark>Mensaje</mark> no puede estar vacío<br>";
            if(!isset($privacidad))
            $errores .= "Debes aceptar la <mark>Política de Privacidad</mark><br>";
            if($errores == ""){
              $success = @mail($email,"Ticket: ".$nombre,$mensaje);
              if($success)
              $errores .= "<mark>Mensaje enviado con éxito</mark>";
              else
              $errores .= "<mark>No se pudo enviar el mensaje</mark><br>Email: ".$email."<br>Asunto: Ticket - ".$nombre."<br>Mensaje: ".$mensaje."<br>Error: ".error_get_last()['message'];
            }
          }
          ?>
        <p id="errores"><?=$errores?></p>
      </fieldset>
    </form>
  </div>
</body>
</html>