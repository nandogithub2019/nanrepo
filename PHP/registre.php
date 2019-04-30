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
Dado un formulario de acceso con los campos:
Usuario, contraseña y repatir contraseña
Mirar:
    - las dos contraseñas son iguales
    - Longitud de contraseñas entre 6 y 8
    - Contiene como mínimo un carácter en mayúscula
    - Contiene como mínimo un carácter en minúscula
    - Contiene como mínimo un carácter numérico
    - Contiene como mínimo un carácter especial(@ # $ etc)
*/

// define variables and set to empty values
/*Para asegurarnos que hacemos correctamente la validación del formulario
  los imputs los ponemos tipo text en lugar de tipo email o number, 
  porque si ponemos primero tipo number, nos hace el filtro 
  desde html y no vemos si la validación php funciona. una vez
  comprobado se vuelve a poner el tipo input number o email etc  */ 
$usuario = $pass = $reppass = $usuarioErr = $passErr 
= $reppassErr = "";

if(isset($_REQUEST['submit'])){
    if (empty($_REQUEST["usuario"])) {
      $usuarioErr = "usuario obligatorio";
    }else{
      $usuario = test_input($_REQUEST["usuario"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$usuario)) {
        $usuarioErr = "Solo se permiten letras y espacios en blanco"; 
      }
    }
    
    if (empty($_REQUEST["pass"])) {
        $passErr = "Contraseña obligatoria";
      } else {//debería mirar si los 2 campos son iguales primero, he de cambiarlo...
        $pass = test_input($_REQUEST["pass"]);
        if (strlen($pass)>8 || strlen($pass)<6) {
            $passErr = "ha de contener entre 6 y 8 carácteres";
            }
        if(preg_match("/[A-Z]/",$pass)==0) {
            $passErr = "ha de contener como mínimo una mayuscula";
        }   
        }
    if (empty($_REQUEST["reppass"])) {
        $reppassErr = " Verificar Contraseña obligatorio";
      }else{
        $reppass = test_input($_REQUEST["reppass"]);
      }
      
    

   

} 
  


function test_input($data) {
  $data = trim($data); //quita espacios
  $data = stripslashes($data);//quita contrabarras
  $data = htmlspecialchars($data);//sustituye <> por menor que y mayor que
  return $data;
}
?>
<h2>Acceso</h2>
<form method="REQUEST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">  <!--htmlspecialchars para que 
no introduzcan un script malicioso, sustituye carácteres como <> por otros valores -->

<label>Usuario:</label> <span>*</span><input type="text" name="usuario" value="<?php echo $usuario;?>"><span class="error"><?php echo $usuarioErr;?></span>
<br><br><!--<?php echo $usuario;?> es igual a <?=$usuario?> -->
<label>Contraseña:</label><span>*</span> <input type="text" name="pass" value="<?php echo $pass;?>"><span class="error"><?php echo $passErr;?></span>
<br><br>
<label>Rep Contraseña:</label><span>*</span> <input type="text" name="reppass" value="<?php echo $reppass;?>"><span class="error"><?php echo $reppassErr;?></span>
<br><br>
<input type="submit" name="submit" value="Submit">
</form>



</body>
</html>

