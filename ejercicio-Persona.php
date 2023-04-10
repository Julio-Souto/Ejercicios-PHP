<?php

abstract class Persona{
  private string $nombre = "";
  private string $apellidos = "";
  private DateTime $fechaNacimiento;

  public function __construct(string $nombre, string $apellidos, DateTime $fecha)
  {
    $this->nombre = $nombre;
    $this->apellidos = $apellidos;
    $this->fechaNacimiento = DateTime::createFromFormat("d-m-Y",$fecha->format("d-m-Y"))??new DateTime();
  }

  public function getNombre():string{
    return $this->nombre;
  }

  public function getApellidos():string{
    return $this->apellidos;
  }

  public function getFecha():DateTime{
    return $this->fechaNacimiento;
  }

  public function setNombre(string $nombre){
    $this->nombre = $nombre;
  }

  public function setApellidos(string $apellidos){
    $this->apellidos = $apellidos;
  }

  public function setFecha(DateTime $fecha){
    $this->fechaNacimiento = $fecha;
  }

  public function getNombreCompleto():string{
    return $this->nombre." ".$this->apellidos;
  }

  public function mayorEdad():string{
    $mayor = new DateTime();
    $mayor = date_create($mayor->format("d-m-"."2005"));
    $mayor->setTime(0,0,0,0);
    $years = DateTime::createFromFormat("d-m-Y",$this->fechaNacimiento->format("d-m-Y"))->setTime(0,0,0,0)
    ->diff(DateTime::createFromFormat("d-m-Y",(new DateTime())->format("d-m-Y"))->setTime(0,0,0,0))->y;
    if($this->fechaNacimiento->setTime(0,0,0,0)->getTimestamp()<=$mayor->getTimestamp()){
      return "verdadero ".$years;
    }
    else
      return "falso ".$years;
  }

}
class Alumno extends Persona{

}

$alumno = new Alumno("Antonio","Alcantara",new DateTime());
$alumno2 = new Alumno("alumno2","alumno2",new DateTime("10-04-2005"));
$alumno3 = new Alumno("alumno3","alumno3",new DateTime("01-01-2000"));
$alumno4 = new Alumno("alumno4","alumno4",new DateTime("11-04-2005"));

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
  <table>
    <thead>
      <tr>
        <td>Nombre</td>
        <td>Apellidos</td>
        <td>Fecha Nacimiento</td>
        <td>Mayor de Edad</td>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td><?=$alumno->getNombre();?></td>
        <td><?=$alumno->getApellidos();?></td>
        <td><?=$alumno->getFecha()->format("d-m-Y");?></td>
        <td><?=$alumno->mayorEdad();?></td>
      </tr>
      <tr>
        <td><?=$alumno2->getNombre();?></td>
        <td><?=$alumno2->getApellidos();?></td>
        <td><?=$alumno2->getFecha()->format("d-m-Y");?></td>
        <td><?=$alumno2->mayorEdad();?></td>
      </tr>
      <tr>
        <td><?=$alumno3->getNombre();?></td>
        <td><?=$alumno3->getApellidos();?></td>
        <td><?=$alumno3->getFecha()->format("d-m-Y");?></td>
        <td><?=$alumno3->mayorEdad();?></td>
      </tr>
      <tr>
        <td><?=$alumno4->getNombre();?></td>
        <td><?=$alumno4->getApellidos();?></td>
        <td><?=$alumno4->getFecha()->format("d-m-Y");?></td>
        <td><?=$alumno4->mayorEdad();?></td>
      </tr>
    </tbody>
  </table>
  <p><?="Nombre: ".$alumno->getNombreCompleto()." Fecha: ".$alumno->getFecha()->format("d-m-Y")." Es mayor: ".$alumno->mayorEdad();?></p>
  <p><?="Nombre: ".$alumno2->getNombreCompleto()." Fecha: ".$alumno2->getFecha()->format("d-m-Y")." Es mayor: ".$alumno2->mayorEdad();?></p>
  <p><?="Nombre: ".$alumno3->getNombreCompleto()." Fecha: ".$alumno3->getFecha()->format("d-m-Y")." Es mayor: ".$alumno3->mayorEdad();?></p>
  <p><?="Nombre: ".$alumno4->getNombreCompleto()." Fecha: ".$alumno4->getFecha()->format("d-m-Y")." Es mayor: ".$alumno4->mayorEdad();?></p>
</body>
</html>