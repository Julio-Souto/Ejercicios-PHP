<?php
  extract($_POST);
  $solucion1="";
  $solucion2="";
  $solucion3="";
  $solucion4="";
  $solucion5="";
  $acierto1=false;
  $acierto2=false;
  $acierto3=false;
  $acierto4=false;
  $acierto5=false;
  $count=0;

  if(isset($enviar)){
    if($ejercicio1 == "resp11"){
      $solucion1="Respuesta correcta";
      $acierto1=true;
      $count++;
    }
    else{
      $solucion1="Respuesta incorrecta";
    }
    if($ejercicio2 == "resp24"){
      $solucion2="Respuesta correcta";
      $acierto2=true;
      $count++;
    }
    else{
      $solucion2="Respuesta incorrecta";
    }
    if($ejercicio3 == "resp33"){
      $solucion3="Respuesta correcta";
      $acierto3=true;
      $count++;
    }
    else{
      $solucion3="Respuesta incorrecta";
    }
    if($ejercicio4 == "resp44"){
      $solucion4="Respuesta correcta";
      $acierto4=true;
      $count++;
    }
    else{
      $solucion4="Respuesta incorrecta";
    }
    if($ejercicio5 == "resp53"){
      $solucion5="Respuesta correcta";
      $acierto5=true;
      $count++;
    }
    else{
      $solucion5="Respuesta incorrecta";
    }
  }
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
    h3{
      text-align: center;
    }
    .error{
      color: red;
    }
    .acierto{
      color: green;
    }
  </style>
</head>
<body>

  <h3>Examen del Curso PHP</h3>
  <h3>Primera semana</h3>
  <h3>Fundamentos del lenguaje de programación PHP</h3>

  <form method="post">
    <p>1. ¿Cómo se abre y cierra un bloque de código PHP?</p>
    <div class="radios">
      <div><input type="radio" name="ejercicio1" id="resp11" value="resp11" required
      <?php if(isset($ejercicio1) && $ejercicio1 == "resp11") echo "checked"; ?>>
      <label for="resp11"><?php echo htmlspecialchars("<?php ?>"); ?></label></div>
      <div><input type="radio" name="ejercicio1" id="resp12" value="resp12"
      <?php if(isset($ejercicio1) && $ejercicio1 == "resp12") echo "checked"; ?>>
      <label for="resp12"><?php echo htmlspecialchars("/**/"); ?></label></div>
      <div><input type="radio" name="ejercicio1" id="resp13" value="resp13"
      <?php if(isset($ejercicio1) && $ejercicio1 == "resp13") echo "checked"; ?>>
      <label for="resp13"><?php echo htmlspecialchars("<script></script>"); ?></label></div>
      <div><input type="radio" name="ejercicio1" id="resp14" value="resp14"
      <?php if(isset($ejercicio1) && $ejercicio1 == "resp14") echo "checked"; ?>>
      <label for="resp14"><?php echo htmlspecialchars("<body></body>"); ?></label></div>
    </div>
    <p <?php echo (($acierto1) ? 'class="acierto"' : 'class="error"'); ?>><?=$solucion1;?></p>
    <p>2. ¿Con qué símbolo se debe empezar el nombre de una variable en PHP?</p>
    <div class="radios">
      <div><input type="radio" name="ejercicio2" id="resp21" value="resp21" required
      <?php if(isset($ejercicio2) && $ejercicio2 == "resp21") echo "checked"; ?>>
      <label for="resp21"><?php echo htmlspecialchars("="); ?></label></div>
      <div><input type="radio" name="ejercicio2" id="resp22" value="resp22"
      <?php if(isset($ejercicio2) && $ejercicio2 == "resp22") echo "checked"; ?>>
      <label for="resp22"><?php echo htmlspecialchars("=="); ?></label></div>
      <div><input type="radio" name="ejercicio2" id="resp23" value="resp23"
      <?php if(isset($ejercicio2) && $ejercicio2 == "resp23") echo "checked"; ?>>
      <label for="resp23"><?php echo htmlspecialchars("//"); ?></label></div>
      <div><input type="radio" name="ejercicio2" id="resp24" value="resp24"
      <?php if(isset($ejercicio2) && $ejercicio2 == "resp24") echo "checked"; ?>>
      <label for="resp24"><?php echo htmlspecialchars("$"); ?></label></div>
    </div>
    <p <?php echo (($acierto2) ? 'class="acierto"' : 'class="error"'); ?>><?=$solucion2;?></p>
    <p>3. ¿Con qué símbolo se debe envolver un valor numérico en una variable?</p>
    <div class="radios">
      <div><input type="radio" name="ejercicio3" id="resp31" value="resp31" required
      <?php if(isset($ejercicio3) && $ejercicio3 == "resp31") echo "checked"; ?>>
      <label for="resp31"><?php echo htmlspecialchars("\\\\"); ?></label></div>
      <div><input type="radio" name="ejercicio3" id="resp32" value="resp32"
      <?php if(isset($ejercicio3) && $ejercicio3 == "resp32") echo "checked"; ?>>
      <label for="resp32"><?php echo htmlspecialchars("/**/"); ?></label></div>
      <div><input type="radio" name="ejercicio3" id="resp33" value="resp33"
      <?php if(isset($ejercicio3) && $ejercicio3 == "resp33") echo "checked"; ?>>
      <label for="resp33"><?php echo htmlspecialchars("Ninguno, sólo se escribe el número"); ?></label></div>
      <div><input type="radio" name="ejercicio3" id="resp34" value="resp34"
      <?php if(isset($ejercicio3) && $ejercicio3 == "resp34") echo "checked"; ?>>
      <label for="resp34"><?php echo htmlspecialchars("="); ?></label></div>
    </div>
    <p <?php echo (($acierto3) ? 'class="acierto"' : 'class="error"'); ?>><?=$solucion3;?></p>
    <p>4. ¿Cuál de las siguientes variables está declarada de forma correcta?</p>
    <div class="radios">
      <div><input type="radio" name="ejercicio4" id="resp41" value="resp41" required
      <?php if(isset($ejercicio4) && $ejercicio4 == "resp41") echo "checked"; ?>>
      <label for="resp41"><?php echo htmlspecialchars("edad = 25;"); ?></label></div>
      <div><input type="radio" name="ejercicio4" id="resp42" value="resp42"
      <?php if(isset($ejercicio4) && $ejercicio4 == "resp42") echo "checked"; ?>>
      <label for="resp42"><?php echo htmlspecialchars("edad = “25”;"); ?></label></div>
      <div><input type="radio" name="ejercicio4" id="resp43" value="resp43"
      <?php if(isset($ejercicio4) && $ejercicio4 == "resp43") echo "checked"; ?>>
      <label for="resp43"><?php echo htmlspecialchars("\$edad == 25;"); ?></label></div>
      <div><input type="radio" name="ejercicio4" id="resp44" value="resp44"
      <?php if(isset($ejercicio4) && $ejercicio4 == "resp44") echo "checked"; ?>>
      <label for="resp44"><?php echo htmlspecialchars("\$edad = 25;"); ?></label></div>
    </div>
    <p <?php echo (($acierto4) ? 'class="acierto"' : 'class="error"'); ?>><?=$solucion4;?></p>
    <p>5. ¿Cuáles son los operadores relacionales?</p>
    <div class="radios">
      <div><input type="radio" name="ejercicio5" id="resp51" value="resp51" required 
      <?php if(isset($ejercicio5) && $ejercicio5 == "resp51") echo "checked"; ?>>
      <label for="resp51"><?php echo htmlspecialchars("+, -, *, /, %, ++, —"); ?></label></div>
      <div><input type="radio" name="ejercicio5" id="resp52" value="resp52" 
      <?php if(isset($ejercicio5) &&$ejercicio5 == "resp52") echo "checked"; ?>>
      <label for="resp52"><?php echo htmlspecialchars("<, >, <=, >=, ==, !="); ?></label></div>
      <div><input type="radio" name="ejercicio5" id="resp53" value="resp53" 
      <?php if(isset($ejercicio5) &&$ejercicio5 == "resp53") echo "checked"; ?>>
      <label for="resp53"><?php echo htmlspecialchars("&&, ||, and, or, !"); ?></label></div>
      <div><input type="radio" name="ejercicio5" id="resp54" value="resp54" 
      <?php if(isset($ejercicio5) &&$ejercicio5 == "resp54") echo "checked"; ?>>
      <label for="resp54"><?php echo htmlspecialchars("$, &, //, /* */, { }"); ?></label></div>
    </div>
    <p <?php echo (($acierto5) ? 'class="acierto"' : 'class="error"'); ?>><?=$solucion5;?></p>
    <br>
    <button name="enviar">Enviar</button>
    <p><?php echo (isset($enviar)?"Total de aciertos: ".$count."/5":"");?></p>
  </form>
</body>
</html>