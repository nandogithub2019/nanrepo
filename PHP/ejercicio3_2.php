<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    


<?php

/*
Calculadora2:
- Aprovecharemos que tenemos funciones definidas para hacer una
calculadora que haga las diferentes operaciones de dos valores
- Formulario con dos campos de texto.
- Radio buttons con la operación a seleccionar
- 1 botón de envío de datos
*/
if(isset($_GET['submit'])){
    $numero1= $_GET['numero1'];
    
    $numero2= $_GET['numero2'];
    
    

    if (isset($_GET['operacion'])) {
        if($_GET['operacion']=='suma'){
            $resultado=$numero1+$numero2;
            echo $resultado;
        }
        if($_GET['operacion']=='resta'){
            $resultado=$numero1-$numero2;
            echo $resultado;
        }
        if($_GET['operacion']=='multiplicacion'){
            $resultado=$numero1*$numero2;
            echo $resultado;
        }
        if($_GET['operacion']=='division'){
            $resultado=$numero1/$numero2;
            echo $resultado;
        }                        
    }
}else{
?>
<form action="ejercicio3_2.php" method="GET">
Número 1<input type="text" name="numero1" id="numero1">
Número 2<input type="text" name="numero2" id="numero2">
<br>
<br>
Elige una operación 
<br>
Suma<input type="radio" name="operacion" value="suma">
Resta<input type="radio" name="operacion" value="resta">
Multiplicación<input type="radio" name="operacion" value="multiplicacion">
División<input type="radio" name="operacion" value="division">
<br>
<br>
<input type="submit" name="submit" value="calcular">

</form>
<?php
}
?>
</body>
</html>