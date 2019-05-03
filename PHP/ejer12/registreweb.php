<?php
/*
Dado un formulario de acceso con los campos:
Usuario, contraseña y repetir contraseña
Mirar:
    - las dos contraseñas son iguales
    - Longitud de contraseñas entre 6 y 8
    - Contiene como mínimo un carácter en mayúscula
    - Contiene como mínimo un carácter en minúscula
    - Contiene como mínimo un carácter numérico
    - Contiene como mínimo un carácter especial(@ # $ etc)


define variables and set to empty values
Para asegurarnos que hacemos correctamente la validación del formulario
  los imputs los ponemos tipo text en lugar de tipo email o number, 
  porque si ponemos primero tipo number, nos hace el filtro 
  desde html y no vemos si la validación php funciona. una vez
  comprobado se vuelve a poner el tipo input number o email etc  */ 
$usuario = $pass = $reppass = $usuarioErr = $passErr 
= $reppassErr = $reppassErr1 = $passErr1 = $passErr2 = $passErr3
= $passErr4 = $passErr5 = $imgperfil = $imgperfilErr = "";

if(isset($_REQUEST['submit'])){
    if (empty($_REQUEST["usuario"])) {
      $usuarioErr = "usuario obligatorio";
    }else{
      $usuario = test_input($_REQUEST["usuario"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$usuario)) {
        $usuarioErr1 = "Solo se permiten letras y espacios en blanco"; 
      }
    }
    
    if (empty($_REQUEST["pass"])) {
        $passErr = "Contraseña obligatoria";
      } else {//debería mirar si los 2 campos son iguales primero, he de cambiarlo...
        $pass = test_input($_REQUEST["pass"]);
        
      }

    if (empty($_REQUEST["reppass"])) {
        $reppassErr = "Contraseña obligatoria";
      } else {
        $reppass = test_input($_REQUEST["reppass"]);
        
      }
    if($pass != $reppass){
      $reppassErr1 = "La contraseña no coincide ";
    } 
    if(strlen($pass)>8 || strlen($pass)<6) {
      $passErr1 = "ha de contener entre 6 y 8 carácteres";
      }
    if(preg_match("/[A-Z]/",$pass)==0) {
        $passErr2 = "ha de contener como mínimo una mayúscula";
    }  
    if(preg_match("/[a-z]/",$pass)==0) {
      $passErr3 = "ha de contener como mínimo una minúscula";
    }
    if(preg_match("/[0-9]/",$pass)==0) {
      $passErr4 = "ha de contener como mínimo un caracter numérico";
    }
    if(preg_match("/[*?¿&%#@|]/",$pass)==0) {
      $passErr5 = "ha de contener como mínimo un caracter especial";
    }
    
    if(!is_uploaded_file($_FILES['fichero']['tmp_name'])){
            echo "otro error";
    }
    $dir_subida = 'imgs/';
    $fichero_subido = $dir_subida . time()."_".basename($_FILES['fichero']['name']);
    if (move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_subido)) {
            echo "El fichero es válido y se subió con éxito.\n";
            echo "<a href=\"$fichero_subido\">imagen</a>";
            echo "<img src=\"$fichero_subido\">";
    }else{
            echo "¡error!\n";
            echo "Error code:".$_FILES['fichero']['error'];
    }
    
        
    
       
      
  function test_input($data) {
  $data = trim($data); //quita espacios
  $data = stripslashes($data);//quita contrabarras
  $data = htmlspecialchars($data);//sustituye <> por menor que y mayor que
  return $data;
  }
}else{
      
  ?>

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

<h2>Acceso</h2>
<form method="REQUEST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">  <!--htmlspecialchars para que 
no introduzcan un script malicioso, sustituye carácteres como <> por otros valores -->

<label>Usuario:</label> <span>*</span><input type="text" name="usuario" value="<?php echo $usuario;?>"><span class="error"><?php //echo $usuarioErr;?></span>
<br><br><!--<?php echo $usuario;?> es igual a <?=$usuario?> -->
<label>Contraseña:</label><span>*</span> <input type="password" name="pass" value="<?php echo $pass;?>"><span class="error"><?php //echo $passErr;?></span>
<br><br>
<label>Rep Contraseña:</label><span>*</span> <input type="password" name="reppass" value="<?php echo $reppass;?>"><span class="error"><?php //echo $reppassErr;?>
<br><br>
Imagen de perfil<input type="file" name="fichero"> 
<br><br>
<input type="submit" name="submit" value="Submit">
</form>
<br><br>
<?php
    echo $reppassErr ."<br>".$reppassErr1;
    echo $passErr1."<br>".$passErr2."<br>".$passErr3."<br>".$passErr4."<br>".$passErr5; 
?>
</body>
</html>

<?php
}
?>