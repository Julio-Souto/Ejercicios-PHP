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
  <form action="enviado.php">
    <div class="field">
      <label for="nombre">Nombre</label>
      <input type="text" name="nombre" id="nombre">
    </div>
    <div class="field">
      <label>
        Mujer <input type="radio" name="sexo" value="mujer">
      </label>
      <label>
        Hombre <input type="radio" name="sexo" value="hombre">
      </label>
    </div>
    <div class="field">
      <label>
        Comentarios <textarea name="comentarios"></textarea>
      </label>
    </div>
    <button name="enviar">Enviar</button>
  </form>
</body>
</html>