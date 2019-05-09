<?php

session_start();
$error="";
/*
if(isset($_COOKIE["password"])){
    if($_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21'){
        $_SESSION["nom"]=$_COOKIE["nomusuari"];*/
/*if(isset($_COOKIE["password"]) && isset($_COOKIE["nomusuari"])) {*/
if(isset($_COOKIE["password"])){    
    if($_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21' 
    && $_COOKIE["nomusuari"]=='nando'){
                  
        header('Location:menu_privado.php');  
    }else{
        $error="credenciales incorrectas";
    }
}         

if(isset($_REQUEST["submit"])){
        $_SESSION["nom"]=$_REQUEST["username"];
        $_SESSION["pass"]=md5(sha1($_REQUEST["password"]));
        if($_SESSION["pass"]=='700c8b805a3e2a265b01c77614cd8b21'
        && $_SESSION["nom"]=='nando'){
           
            
            if(isset($_REQUEST["recordar"])&& $_REQUEST["recordar"]==1){
               /* setcookie("password",$_REQUEST["password"],time()+365*24*60*60);
                setcookie("nomusuari",$_REQUEST["username"],time()+365*24*60*60);*/
                setcookie("password",$_SESSION["pass"],time()+365*24*60*60);
                setcookie("nomusuari",$_SESSION["nom"],time()+365*24*60*60); 
                
            }

            header('Location:menu_privado.php');           
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
<title>Login</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="lib/css/bootstrap.min.css">
  <script src="lib/js/jquery-3.3.1.min.js"></script>
  <script src="lib/js/bootstrap.min.js"></script>
</head>
<body>

    <?=$error?>
<div class="container">
<nav class="navbar navbar-primary" role="navigation">
  <!-- El logotipo y el icono que despliega el menú se agrupan
       para mostrarlos mejor en los dispositivos móviles -->
  <div class="navbar-header">
    <button type="button" class="navbar-toggle" data-toggle="collapse"
            data-target=".navbar-ex1-collapse">
      <span class="sr-only">Desplegar navegación</span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>
    <a class="navbar-brand" href="#">FakeBook</a>
  </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="noticias.php">Publicaciones</a></li>
      <li><a href="#">Nueva publicación</a></li>
      <li><a href="#">Eliminar publicación</a></li>
      
    </ul>

    
    <!--<ul class="nav navbar-nav navbar-right">
      <li><a href="menu_privado.php?logout">Logout</a></li>
      
        
        </ul>-->
      </li>
    </ul>
  </div>
</nav>
</div>

    <form  method="post">
    User:<input type="text" name="username" id=""><br>
    Pass:<input type="password" name="password" id=""><br>
    Recordar: <input type="checkbox" name="recordar" value="1"><br>
    <input type="submit" name="submit" value="Enviar">
    <input type="submit" name="alta" value="Alta">


    
    
    </form>
</body>
</html>
