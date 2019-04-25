


<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
/*
EJERCICIO 1.5
• Con el ejercicio anterior:
- muestra la cadena que se envía (como antes).
- Nos dice si todas las palabras de la cadena están
encadenadas:
Bicicleta tambor oruga - > SI
Hola que tal -> NO
*/
if(isset($_POST['submit'])){
    $edad= $_POST['edad'];
    $palabras=explode(" ",$edad);//convierte la cadena en un array de palabras
    
    for ($i=0; $i <count($palabras) ; $i++) { 
        echo"$var=strlen($palabras[$i]-2)";
        print_r(substr($palabras[$i],strlen($palabras[$i]-2)));
    
    }
    

    }else{
?>
    <form action="ejercicio1_5.php" method="POST">
        <label>edad:<input type="text" name="edad"></label>
        <label><input type="submit" name="submit" value="Aceptar"></label>
    </form>
<?php
}
?> 
</body>
</html>
