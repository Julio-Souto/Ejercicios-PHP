<?php
abstract class Anfibio{
  protected string $codigo;
  protected DateTime $fechaAlta;
  protected float $precio;
  protected string $nombreCientifico;
  protected string $nombreComun;
  protected string $habitat;

  function __construct(DateTime $fechaAlta, float $precio, string $nombreCientifico, string $nombreComun, string $habitat)
  {
    $this->codigo = uniqid();
    $this->fechaAlta = $fechaAlta;
    $this->precio = $precio;
    $this->nombreCientifico = $nombreCientifico;
    $this->nombreComun = $nombreComun;
    $this->habitat = $habitat;
  }

  function getFecha():DateTime{
    return $this->fechaAlta;
  }

  function getPrecio():float{
    return $this->precio;
  }

  function getNombreCientifico():string{
    return $this->nombreCientifico;
  }

  function getNombreComun():string{
    return $this->nombreComun;
  }

  function getHabitat():string{
    return $this->habitat;
  }

  function getData():string{
    return "<br>Anfibio de tipo ". static::class ." con codigo ".$this->codigo."<br>Nombre Cientifico: ".$this->nombreCientifico."<br>Nombre comun: ".$this->nombreComun."<br>Habitat: ".$this->habitat."<br>Fecha de alta: ".$this->fechaAlta->format("d-m-Y")."<br>Precio: ".$this->precio."€";
  }
}

class Anuro extends Anfibio{
  private float $precioFijo;
  private string $continente;

  function __construct(DateTime $fechaAlta, float $precio, string $nombreCientifico, string $nombreComun, string $habitat, string $continente)
  {
    switch($continente):
      case "Europa":
        $this->precioFijo=$precio;
        break;
      case "Africa":
      case "Asia":
        $this->precioFijo=$precio*1.15;
        break;
      case "America":
        $this->precioFijo=$precio*1.25;
        break;
      default:
        $this->precioFijo=$precio;
        break;
    endswitch;
    parent::__construct($fechaAlta,$this->precioFijo,$nombreCientifico,$nombreComun,$habitat);
    $this->continente=$continente;
  }

  function getContinente():string{
    return $this->continente;
  }

  function getData():string{
    return parent::getData()."<br>Continente: ".$this->continente;
  }
}

class Urodelo extends Anfibio{
  private string $tipo;
  function __construct(DateTime $fechaAlta, float $precio, string $nombreCientifico, string $nombreComun, string $habitat, string $tipo)
  {
    parent::__construct($fechaAlta,$precio*1.05,$nombreCientifico,$nombreComun,$habitat);
    $this->tipo=$tipo;
  }

  function getTipo():string{
    return $this->tipo;
  }

  function getData():string{
    return parent::getData()."<br>Tipo: ".$this->tipo;
  }
}

$urodelo = new Urodelo(new DateTime(),15.80,"aaaaaaaaaa","bbbbbbbbbbb","cccccccccc","terrestre");

echo $urodelo->getData();

$anuro = new Anuro(new DateTime(),80.30,"ddddddddddd","eeeeeeeeeeee","fffffffffff","Asia");

echo $anuro->getData();

$anuro = new Anuro(new DateTime(),80.30,"gggggggggggg","hhhhhhhhhhh","iiiiiiiiiiii","America");

echo $anuro->getData();

?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <title>Document</title>
</head>
<body>
  
</body>
</html>