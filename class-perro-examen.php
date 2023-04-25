<?php
class Perro{
  private int $idPerro;
  private string $nombre;
  private string $microchip;
  //"F" para hembras y "M" para machos
  private string $sexo = "F";
  private DateTime $fechaNacimiento;
  private ?Perro $padre;
  private ?Perro $madre;

  function __construct(int $id = 0, string $nombre = "", string $microchip = "", string $sexo = "F", DateTime $fechaNacimiento = new DateTime(), Perro $padre = null, Perro $madre = null)
  {
    $this->idPerro = $id;
    $this->nombre = $nombre;
    $this->microchip = $microchip;
    if(!($sexo=="F" || $sexo == "M"))
      $sexo = "F";
    $this->sexo = $sexo;
    $this->fechaNacimiento = $fechaNacimiento;
    $this->padre = $padre??null;
    $this->madre = $madre??null;
  }

  function setNombre(string $nombre){
    $this->nombre=$nombre;
  }

  function getNombre():string{
    return $this->nombre;
  }

  function setMicrochip(string $microchip){
    $this->microchip = $microchip;
  }

  function getMicrochip():string{
    return $this->microchip;
  }

  function setSexo(string $sexo){
    if(!($sexo=="F" || $sexo == "M"))
      $sexo = "F";
    $this->sexo = $sexo;
  }

  function getSexo():string{
    if($this->sexo=="F")
      return "Hembra";
    else
      return "Macho";
  }

  function setPadre (Perro $padre){
    $this->padre = $padre;
  }

  function getPadre ():Perro{
    return $this->padre;
  }

  function setMadre (Perro $madre){
    $this->madre = $madre;
  }

  function getMadre ():Perro{
    return $this->madre;
  }

  function __toString():string
  {
    $padre="";
    $madre="";

    $padre= ($this->padre)?"<br>Padre: ".$this->padre:"<br>Padre: Desconocido";
    $madre= ($this->madre)?"<br>Madre: ".$this->madre:"<br>Madre: Desconocida";
    return "<br>ID: ".$this->idPerro."<br>Nombre: ".$this->nombre."<br>Microchip: ".$this->microchip."<br>Sexo: ".$this->getSexo()."<br>Fecha nacimiento: ".$this->fechaNacimiento?->format("d-m-Y").$padre.$madre;
  }
}

class Propietario{
  private int $idPropietario;
  private string $nif;
  private string $nombre;
  private string $apellidos;
  private string $cp;
  private array $perros;

  function __construct(int $id = 0,string $nif = "",string $nombre = "",string $apellidos = "",string $cp ="", Perro ...$perros)
  {
    $this->idPropietario = $id;
    $this->nif = $nif;
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->cp = $cp;
    $this->perros = $perros;
  }

  function setNif(string $nif){
    $this->nif = $nif;
  }

  function getNif():string{
    return $this->nif;
  }

  function setNombre(string $nombre){
    $this->nombre=$nombre;
  }

  function getNombre():string{
    return $this->nombre;
  }

  function setApellidos(string $apellidos){
    $this->apellidos=$apellidos;
  }

  function getApellidos():string{
    return $this->apellidos;
  }

  function setPerros (Perro ...$perros){
    $this->perros=$perros;
  }

  function getPerros():array{
    return $this->perros;
  }

  function __toString():string
  {
    return "<br>Propietario<br>ID: ".$this->idPropietario."<br>NIF: ".$this->nif."<br>Nombre: ".$this->nombre."<br>Apellidos: ".$this->apellidos."<br>CP: ".$this->cp."<br>Perros: ".join("<br>",$this->perros);
  }

}

$padre = new Perro(1,"aaaaaaaaa","13456asdwa","M");

// echo $padre;

$madre = new Perro(2, "bbbbbbbbb","564816asdwaa","adwaasd");

// echo $madre;

$perro = new Perro(3, "cccccccccccc","684512312asd","F",new DateTime(),$padre,$madre);

// echo $perro;

echo $perro->getPadre();

$padre1 = new Perro(4,"dddddddddd","90541sadwa","M");

$perro->setPadre($padre1);

echo $perro->getPadre();

$propietario = new Propietario(123,"46849asd","ffffffffff","gggggggggg","1568",$padre,$madre,$perro);

echo $propietario;