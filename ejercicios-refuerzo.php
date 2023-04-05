<?php
  class Cancion{
    private string $titulo;
    private string $autor;

    function __construct($titulo,$autor)
    {
      $this->titulo = $titulo;
      $this->autor = $autor;
    }

    public function dameTitulo():string{
      return $this->titulo;
    }

    public function dameAutor():string{
      return $this->autor;
    }

    public function ponTitulo(string $titulo){
      $this->titulo = $titulo;
    }

    public function ponAutor(string $autor){
      $this->autor = $autor;
    }
  }

  class CD{
    private array $canciones;
    private int $contador;
    
    public function __construct()
    {
      $this->canciones = [];
      $this->contador = 0;
    }

    public function numeroCanciones():int{
      return $this->contador;
    }

    public function dameCancion(int $i):Cancion{
      return $this->canciones[$i];
    }

    public function grabaCancion(int $i, Cancion $cancion){
      $this->canciones[$i] = $cancion;
    }

    public function agrega(Cancion $cancion){
      $this->canciones[$this->contador] = $cancion;
      $this->contador++;
    }

    public function elimina(int $i){
      unset($this->canciones[$i]);
      $this->contador--;
    }
  }

  $cancion1 = new Cancion("cancion1","autor1");
  $cancion2 = new Cancion("cancion2","autor2");
  $cancion3 = new Cancion("cancion3","autor3");
  $cancion4 = new Cancion("cancion4","autor4");

  $cd = new CD();
  $cd->agrega($cancion1);
  $cd->agrega($cancion2);
  $cd->agrega($cancion3);
  $cd->agrega($cancion4);
  $cd->elimina(3);
  $cd->grabaCancion(2,$cancion4);
  $output= "Numero de canciones: ".$cd->numeroCanciones();
  for($i = 0; $i < $cd->numeroCanciones(); $i++){
    $output .= "<br>Cancion ".($i+1).": ".$cd->dameCancion($i)->dameTitulo()." - ".
    $cd->dameCancion($i)->dameAutor();
  }
  
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/water.css@2/out/water.css">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <p><?=$output?></p>
</body>
</html>