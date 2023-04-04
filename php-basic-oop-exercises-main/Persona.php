<?php
class Persona{
  private string $nombre = "";
  public int $edad = 0;
  public string $pais = "";

  public function __construct(string $nombre, int $edad, ?string $pais)
  {
    $this->nombre = $nombre;
    $this->edad = $edad;
    $this->pais = $pais??"";
  }

  public function getNombre():string{
    return $this->nombre;
  }

  public function getPersona():string{
    return $this->nombre." ".$this->edad." ".$this->pais;
  }

}

class Profesor extends Persona{
  
}
$persona = new Persona("asdwa",123,"pkjasfd");
echo $persona->getPersona();