<?php
session_start();
?>
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
LOGIN
-Mediante un campo de texto y uno de password, comprobaremos
las credenciales de un usuario
- El usuario deberá ser “USER” y la password “PASSWORD”.
- Si se introducen correctamente devuelve un mensaje de OK en
verde.
- Si se introducen incorrectamente devuelve un mensaje de ERROR
en rojo.
*/
//$correcto=true;
$mensaje='';
if(isset($_REQUEST['submit'])){
    
    $user = $_REQUEST['user'];
    $pass = $_REQUEST['pass'];
    $_SESSION['user'] = $user;
    $_SESSION['pass'] = $pass;
    
    if($_SESSION['user'] == 'user' && $_SESSION['pass'] == 'password'){
        header("location:acceso.php");
        
        //$correcto=false;
    }else{          
        $mensaje='usuario incorrecto';
        
        echo $mensaje;        
    
    }
}        
  
             
    
  
?>


<br>

<form a method="REQUEST">
Usuario<input type="text" name="user" id="user">
Contraseña<input type="password" name="pass" id="pass">
<br>
<input type="submit" name="submit" value="validar">

</body>
</html>










