<?php
// if(!$_GET["nombre"]||!$_GET["sexo"]||!$_GET["comentarios"]) header("Location: index.php") ;

if($_SERVER["REQUEST_METHOD"] == "GET"){
  // echo "Nombre: ",$_GET["nombre"]," Sexo: ",$_GET["sexo"]," Comentarios: ",$_GET["comentarios"];
  extract($_GET);
  if($nombre == ""||$comentarios==""||!isset($sexo))
    echo "<p>Campo Vacio</p>";
  else{
    echo "<p>$nombre</p>";
    echo "<p>$sexo</p>";
    echo "<p>$comentarios</p>";
  }
}