<?php
session_start();
  abstract class Producto{
    private string $id;
    protected string $nombreProducto;
    protected float $precio;

    public function __construct(string $nombreProducto, float $precio)
    {
      $this->id = uniqid();
      $this->nombreProducto = $nombreProducto;
      $this->precio = $precio;
    }

    public static function aplicarDescuento25(float $precio){
      return $precio*0.75;
    }

    public function getNombre():string{
      return $this->nombreProducto;
    }

    public function getPrecio():float{
      return $this->precio;
    }

    public abstract function dimeTipo():string; 
  }

  class Alimento extends Producto{
    private bool $tieneCaducidad;
    private ? DateTime $fechaCaducidad;
    private string $mensaje="";

    public function __construct(string $nombreProducto, float $precio, bool $caducidad, ?DateTime $fechaCaducidad = null)
    {
      parent::__construct($nombreProducto,$precio);
      $this->tieneCaducidad = $caducidad;
      if($fechaCaducidad)
        $this->fechaCaducidad = DateTime::createFromFormat("d-m-Y",$fechaCaducidad->format("d-m-Y"));
    }

    public function dimeTipo():string{
      if($this->tieneCaducidad){
        $this->mensaje="Tiene caducidad - Faltan ".
        DateTime::createFromFormat("d-m-Y",(new DateTime())->format("d-m-Y"))->setTime(0,0,0,0)->diff($this->fechaCaducidad)->format("%r%a")." dias para que caduque";
      }
      else{
        $this->mensaje="No tiene caducidad";
      }
      return "<br>Alimento - ".$this->getNombre()." - ".$this->mensaje;
    }

    public function getFecha():string{
      return $this->fechaCaducidad->format("d-m-Y");
    }
  }

  class Utensilio extends Producto{
    public function dimeTipo(): string
    {
      return "<br>Utensilio - ".$this->nombreProducto;
    }
  }

  class Compra{
    private array $alimentos = [];
    private array $utensilios = [];
    
    public function __construct(array $alimentos, array $utensilios)
    {
      $this->alimentos = $alimentos;
      $this->utensilios = $utensilios;
    }

    public function getTicket():string{
      $precioTotal = 0;
      $mensaje = "";
      foreach($this->alimentos as $alimento){
        $precioTotal += $alimento->getPrecio();
        $mensaje .= $alimento->dimeTipo()." - ".$alimento->getPrecio()."€";
      }
      foreach($this->utensilios as $utensilio){
        $precioTotal += $utensilio->getPrecio();
        $mensaje .= $utensilio->dimeTipo()." - ".$utensilio->getPrecio()."€";
      }
      return $mensaje."<br>Precio Total: ".$precioTotal."€";
    }
  }

  $alimento1 = new Alimento("alimento1",12.80,true,new DateTime("02-03-2024"));
  $alimento2 = new Alimento("alimento2",10.20,true,new DateTime("02-06-2022"));
  $alimento3 = new Alimento("alimento3",22.80,false);

  echo $alimento1->dimeTipo();
  echo $alimento2->dimeTipo();
  echo $alimento3->dimeTipo();

  $utensilio1 = new Utensilio("utensilio1",30.10);
  $utensilio2 = new Utensilio("utensilio2",10.10);

  echo $utensilio1->dimeTipo();
  echo $utensilio2->dimeTipo();

  $alimentos = [$alimento1,$alimento2,$alimento3];
  $utensilios = [$utensilio1,$utensilio2];
  $compra = new Compra($alimentos,$utensilios);
  echo $compra->getTicket();
  $alimentosCesta = $_SESSION["acesta"]??[];
  $utensiliosCesta = $_SESSION["ucesta"]??[];
  $mensaje = "";
  extract($_POST);
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
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
    <fieldset>
      <label for="nombre">Nombre Producto</label>
      <input type="text" id="nombre" name="nombre">
      <label for="precio">Precio</label>
      <input type="number" name="precio" id="precio" step=".01">
      <label for="tipo">Tipo</label>
      <select name="tipo" id="tipo">
        <option value="alimento">Alimento</option>
        <option value="utensilio">Utensilio</option>
      </select>
      <div>
        <input type="checkbox" name="caduca" id="caduca"?>
        <label for="caduca">Es caduco?</label>
      </div>
      <label for="fecha">Fecha de caducidad</label>
      <input type="date" name="fecha" id="fecha">
      <input type="checkbox" name="descuento" id="descuento">
      <label for="descuento">Tiene descuento?</label>
      <div>
        <button name="añadir">Añadir a la cesta</button>
        <button name="comprar">Comprar</button>
      </div>
      <?php
        if(isset($añadir)&&$nombre!=""&&$precio!=""){
          if(isset($tipo)&&$tipo=="alimento"){
            $nuevo = new Alimento($nombre,(isset($descuento))?Producto::aplicarDescuento25($precio):$precio,isset($caduca) ? true : false,($fecha=="")?null : new DateTime($fecha));
            $alimentosCesta[] = $nuevo;
            $_SESSION["acesta"]=$alimentosCesta;
            $mensaje = $nuevo->dimeTipo()." - ".$nuevo->getPrecio()."€";
          }
          else{
            $nuevo = new Utensilio($nombre,(isset($descuento))?Producto::aplicarDescuento25($precio):$precio);
            $utensiliosCesta[] = $nuevo;
            $_SESSION["ucesta"]=$utensiliosCesta;
            $mensaje = $nuevo->dimeTipo()." - ".$nuevo->getPrecio()."€";
          }
        }
        if(isset($comprar)){
          $compra = new Compra($alimentosCesta,$utensiliosCesta);
          $mensaje = $compra->getTicket();
          session_destroy();
        }
      ?>
    </fieldset>
    <p><?=$mensaje?></p>
  </form>
</body>
</html>