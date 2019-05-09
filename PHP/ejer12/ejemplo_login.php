<?php

session_start();
$error="";
$contrasena1 = "";
if(isset($_SESSION["login"])){
    header('Location:ejemplo_privado.php');           
}
if(isset($_COOKIE["password"])){
    $_COOKIE["password"]=md5(sha1("password"));
    if($_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21'){
        $_SESSION["login"]=true;
        $_SESSION["nom"]=$_COOKIE["nomusuari"];
        header('Location:ejemplo_privado.php');  
    }else{
        $error="credenciales incorrectas";
    }
         
}
if(isset($_REQUEST["submit"])){
        $_COOKIE["password"]=md5(sha1($_REQUEST["password"]));
     
        if($_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21'&& $_REQUEST["username"]=='nando'){
            $_SESSION["login"]=true;
            $_SESSION["nom"]=$_REQUEST["username"];
            if(isset($_REQUEST["recordar"])&& $_REQUEST["recordar"]==1){
                setcookie("password",$_REQUEST["password"],time()+365*24*60*60);
                setcookie("nomusuari",$_REQUEST["username"],time()+365*24*60*60);
            }
            header('Location:ejemplo_privado.php');           
        }else{
            $error="Usuario o contraseña incorrecta.";
        }
}

if(isset($_REQUEST["alta"])){
    header('Location:alta.php');
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

    <?=$error?>


    <form  method="post">
    User:<input type="text" name="username" id=""><br>
    Pass:<input type="password" name="password" id=""><br>
    Recordar: <input type="checkbox" name="recordar" value="1"><br>
    <input type="submit" name="submit" value="Enviar">
    <input type="submit" name="alta" value="Alta">


    
    
    </form>
</body>
</html>
<!-- 
$str = "patata";
        if (validaPassword($str)){
            print ("<p class='correcto'>Todo correcto.</p>\n");
        }else{
            print ("<p class='error'>Contraseña incorrecta.</p>\n");
        }

        function validaPassword($valor){
      $valida=false;
      $contraseña = "11a5b35f9b1bb15fd3b431d7489ffbc8";
      if(md5(sha1($valor))==$contraseña){
         $valida=true;
       }
      return $valida;
   }
   -->