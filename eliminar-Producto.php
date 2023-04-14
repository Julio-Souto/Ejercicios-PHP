<?php
  require_once("./abstract-Products.php");

  $array = $_SESSION['products'];
  unset($array[$_GET["key"]]);
  $_SESSION['products']=array_values($array);

  header("Location: ./abstract-Products.php");
?>