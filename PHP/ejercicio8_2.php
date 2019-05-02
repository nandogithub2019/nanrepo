<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" type="text/css" href="css/estilos.css" media="screen" />
    <title>Document</title>
</head>
<body>
<?php
/*
Dado un formulario con los campos:
Nombre *: text
Apellidos : text
Edad: number
Email *: text
Comentarios: textarea
Comprobar que los datos con asterisco son introducidos sino
mostrar un error junto al campo.
- Si se ha introducido la edad (recordemos que es opcional ), debe
ser mayor o igual de 18, sino mostrar un error junto al campo. Sino
se ha introducido se debe saltar esta comprobación.
- Cuando se devuelve el formulario con o sin errores debe estar
rellenado para evitar que el usuario olvide que ha introducido.
*/

// define variables and set to empty values
/*Para asegurarnos que hacemos correctamente la validación del formulario
  los imputs los ponemos tipo text en lugar de tipo email o number, 
  porque si ponemos primero tipo number, nos hace el filtro 
  desde html y no vemos si la validación php funciona. una vez
  comprobado se vuelve a poner el tipo input number o email etc  */ 
$nombre = $apellidos = $edad = $email = $comentarios 
= $nombreErr = $apellidosErr = $edadErr = $emailErr = 
$comentariosErr = "";

if(isset($_REQUEST['submit'])){
    if (empty($_REQUEST["nombre"])) {
      $nombreErr = "Nombre obligatorio";
    }else{
      $nombre = test_input($_REQUEST["nombre"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$nombre)) {
        $nombreErr = "Solo se permiten letras y espacios en blanco"; 
      }
    }
    
    if (empty($_REQUEST["apellidos"])) {
        $apellidos = "";
      } else {
        $apellidos = test_input($_REQUEST["apellidos"]);
        // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$apellidos)) {
        $apellidosErr = "Solo se permiten letras y espacios en blanco"; 
       }
      } 
      if (empty($_REQUEST["edad"])) {
        $edad = "";
      }else{
        $edad = test_input($_REQUEST["edad"]);
        if(($edad < 18)){
            $edadErr = "Ha de ser mayor o igual a 18 años";
        }
      }
    if (empty($_REQUEST["email"])) {
      $emailErr = "Email obligatorio";
    } else {
      $email = test_input($_REQUEST["email"]);
      // check if e-mail address is well-formed
      if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $emailErr = "Formato email no valido"; 
      }
    }

    if (empty($_REQUEST["comentarios"])) {
      $comentarios = "";
    } else {
      $comentarios = test_input($_REQUEST["comentarios"]);
    }

} 
  


function test_input($data) {
  $data = trim($data); //quita espacios
  $data = stripslashes($data);//quita contrabarras
  $data = htmlspecialchars($data);//sustituye <> por menor que y mayor que
  return $data;
}
?>

<form method="REQUEST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <!--htmlspecialchars para que 
no introduzcan un script malicioso, sustituye carácteres como <> por otros valores -->
Nombre: <span>*</span><input type="text" name="nombre" value="<?php echo $nombre;?>"><span class="error"><?php echo $nombreErr;?></span>
<br><br><!--<?php echo $nombre;?> es igual a <?=$nombre?> -->
Apellidos: <input type="text" name="apellidos" value="<?php echo $apellidos;?>"><span class="error"><?php echo $apellidosErr;?></span>
<br><br>
Edad: <input type="number" name="edad" value="<?php echo $edad;?>"><span class="error"><?php echo $edadErr;?></span>
<br><br>
E-mail: <span>*</span><input type="text" name="email" value="<?php echo $email;?>"><span class="error"><?php echo $emailErr;?></span>
<br><br>
Comentarios: <textarea name="comentarios" rows="5" cols="40"><?php echo $comentarios;?></textarea>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>



</body>
</html>

