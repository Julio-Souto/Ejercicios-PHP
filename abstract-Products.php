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
      return "Alimento - ".$this->getNombre()." - ".$this->mensaje;
    }

    public function getCaduco():bool {
      return $this->tieneCaducidad;
    }

    public function getFecha():string{
      return $this->fechaCaducidad->format("d-m-Y");
    }
  }

  class Utensilio extends Producto{
    public function dimeTipo(): string
    {
      return "Utensilio - ".$this->nombreProducto;
    }
  }

  class Compra{
    private array $productos = [];
    private float $precioTotal = 0;
    
    public function __construct(Alimento|Utensilio ...$productos)
    {
      $this->productos = $productos;
    }

    public function getProducts():array{
      return $this->productos;
    }

    public function getTicket():string{
      $this->precioTotal = 0;
      $mensaje = "";
      foreach($this->productos as $producto){
        $this->precioTotal += $producto->getPrecio();
        $mensaje .= "<br>".$producto->dimeTipo()." - ".$producto->getPrecio()."€";
      }
      return $mensaje."<br>Precio Total: ".$this->precioTotal."€";
    }

    public function getPrecioTotal():float{
      return $this->precioTotal;
    }
  }

  $alimento1 = new Alimento("alimento1",12.80,true,new DateTime("02-03-2024"));
  $alimento2 = new Alimento("alimento2",10.20,true,new DateTime("02-06-2022"));
  $alimento3 = new Alimento("alimento3",22.80,false);

  // echo "<br>".$alimento1->dimeTipo();
  // echo "<br>".$alimento2->dimeTipo();
  // echo "<br>".$alimento3->dimeTipo();

  $utensilio1 = new Utensilio("utensilio1",30.10);
  $utensilio2 = new Utensilio("utensilio2",10.10);

  // echo "<br>".$utensilio1->dimeTipo();
  // echo "<br>".$utensilio2->dimeTipo();

  $alimentos = [$alimento1,$alimento2,$alimento3];
  $utensilios = [$utensilio1,$utensilio2];
  $compra = new Compra(...$alimentos,...$utensilios);
  // echo $compra->getTicket();
  $productos = $_SESSION["products"]??[];
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
  <style>
    td{
      text-align: center;
      vertical-align: middle;
    }
  </style>
</head>
<body>
  <h1>Productos</h1>
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
        <input type="checkbox" name="caduca" id="caduca">
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
            $productos[] = $nuevo;
            $_SESSION["products"]=$productos;
          }
          else{
            $nuevo = new Utensilio($nombre,(isset($descuento))?Producto::aplicarDescuento25($precio):$precio);
            $productos[] = $nuevo;
            $_SESSION["products"]=$productos;
          }
        }
        if(isset($comprar)){
          session_destroy();
        }
        $compra = new Compra(...$productos);
        $mensaje = $compra->getTicket();
      ?>
    </fieldset>
    <table>
      <thead>
        <td>Producto</td>
        <td>Tipo/Caducidad</td>
        <td>Precio</td>
      </thead>
      <tbody>
        <?php
        foreach($compra->getProducts() as $key => $product):
        ?>
          <tr>
            <td><?=$product->getNombre()?><a href="./eliminar-Producto.php?key=<?=$key?>"><img width="24" src="./trash.svg" alt="Eliminar"></a><a href="./editar-Producto.php?key=<?=$key?>"><img width="24" src="./edit.svg" alt="Eliminar"></a></td>
            <td><?=$product->dimeTipo();?></td>
            <td><?=$product->getPrecio()."€";?></td>
          </tr>
        <?php
        endforeach;
        ?>
      </tbody>
      <tfoot>
        <td colspan="3"><?="Precio Total: ".$compra->getPrecioTotal()."€"?></td>
      </tfoot>
    </table>
  </form>
</body>
</html>