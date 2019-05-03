<?php
session_start();

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
    
    if($_REQUEST['user'] == 'user' && $_REQUEST['pass'] == 'password'){
        $_SESSION["login"]=true;
        $_SESSION["usuario"]=$_REQUEST["user"];
        header("location:acceso1.php");
        
        
    }else{          
        $mensaje='usuario incorrecto';
        
            
    
    }
}        
  
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

<?=$mensaje?>

<form a method="REQUEST">
Usuario<input type="text" name="user" id="user">
Contraseña<input type="password" name="pass" id="pass">
<br>
<input type="submit" name="submit" value="validar">

</body>
</html>










