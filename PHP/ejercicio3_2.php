<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    
</body>
</html>

<?php

/*
Calculadora2:
- Aprovecharemos que tenemos funciones definidas para hacer una
calculadora que haga las diferentes operaciones de dos valores
- Formulario con dos campos de texto.
- Radio buttons con la operación a seleccionar
- 1 botón de envío de datos
*/
?>
<form action="" method="post">
Número 1<input type="text" name="num1" id="num1">
Número 2<input type="text" name="num2" id="num2">
<br>
<br>
Elige una operación 
<br>
Suma<input type="radio" name="calc" id="suma">
Resta<input type="radio" name="calc" id="resta">
Multiplicación<input type="radio" name="calc" id="multiplicación">
División<input type="radio" name="calc" id="división">
<br>
<br>
<input type="button" value="calcular">
</form>
