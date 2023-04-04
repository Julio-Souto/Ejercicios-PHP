<?php
  class Password{
    private int $longitud;
    private string $contraseña;

    public function __construct(int $longitud = 8)
    {
      $this->longitud = $longitud;
    }

    public function esFuerte():bool{
      $mayus = 0;
      $minus = 0;
      $nums = 0;
      for($i = 0; $i < strlen($this->contraseña); $i++){
        if(ctype_upper($this->contraseña[$i]))
          $mayus++;
        else if(ctype_lower($this->contraseña[$i]))
          $minus++;
        else if(ctype_digit($this->contraseña[$i]))
          $nums++;
      }
      if($mayus>2&&$minus>1&&$nums>5)
        return true;
      else
        return false;
    }

    public function generarContraseña(){
      $charset = "0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz";
      $this->contraseña = substr(str_shuffle(str_repeat($charset,5)),0,$this->longitud);
    }

    public function getContraseña():string{
      return $this->contraseña;
    }

    public function getLongitud():int{
      return $this->longitud;
    }

    public function setLongitud(int $longitud){
      $this->longitud = $longitud;
    }
  }

  $password = new Password(30);
  $password->generarContraseña();
  $fuerte = "";
  if($password->esFuerte())
    $fuerte = "La contraseña es fuerte";
  else
    $fuerte = "La contraseña no es fuerte";
  $contraseña1 = $password->getContraseña()." L: ".$password->getLongitud()." - ".$fuerte;
  $password->setLongitud(20);
  $password->generarContraseña();
  if($password->esFuerte())
    $fuerte = "La contraseña es fuerte";
  else
    $fuerte = "La contraseña no es fuerte";
  $contraseña2 = $password->getContraseña()." L: ".$password->getLongitud()." - ".$fuerte;
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Password</title>
</head>
<body>
  <p><?= $contraseña1 ?></p>
  <p><?= $contraseña2 ?></p>
</body>
</html>