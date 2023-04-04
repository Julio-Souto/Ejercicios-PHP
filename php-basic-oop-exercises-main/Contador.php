<?php
  class Contador{
    private int $contador;

    function __construct(int $value)
    {
      $this->contador = $value;
    }

    function increment(){
      $this->contador++;
    }

    function decrement(){
      $this->contador--;
    }

    function getContador():int{
      return $this->contador;
    }
  }
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Contador</title>
</head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <fieldset>
      <button id="incrementar" name="incrementar">Incrementar</button>
      <button id="decrementar" name="decrementar">Decrementar</button>
      <?php
      extract($_POST);
      if(!isset($contador1))
        $contador = new Contador(0);
      else{
        $value = (int) $contador1;
        $contador = new Contador($value);
      }
      if(isset($incrementar))
        $contador->increment();
      if(isset($decrementar))
        $contador->decrement();
      ?>
      <input type="number" name="contador1" id="contador1" value="<?php if(isset($contador1)) echo ((int)$contador->getContador()); else echo 0;?>">
    </fieldset>
  </form>
</body>
</html>