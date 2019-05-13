<?php

session_start();
$error="";
/* si existe la cookie del password comprueba 
que sean correctas para mantener la sesión 
aún cerrando el navegador*/
if(isset($_COOKIE["password"])){    
    if($_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21' 
    && $_COOKIE["nomusuari"]=='nando'){
                  
        header('Location:publicaciones.php');  
    }else{
        $error="credenciales incorrectas";
    }
}         
/*Al hacer submit crea variables de sesión cifrando el pass
comprueba que coincidan con el cifrado. De estas manera
las variables de sesión creadas se pueden utilizar en las
diferentes páginas mientras no se cierre sesión.
Si marcamos el check recordar, se crean variables de cookie
para mantener la sesión abierta */
if(isset($_REQUEST["submit"])){
        $_SESSION["nom"]=$_REQUEST["username"];
        $_SESSION["pass"]=md5(sha1($_REQUEST["password"]));
       
        if($_SESSION["pass"]=='700c8b805a3e2a265b01c77614cd8b21'
        && $_SESSION["nom"]=='nando'){
           
            if(isset($_REQUEST["recordar"])&& $_REQUEST["recordar"]==1){
               
                setcookie("password",$_SESSION["pass"],time()+365*24*60*60);
                setcookie("nomusuari",$_SESSION["nom"],time()+365*24*60*60); 
                
            }

            header('Location:publicaciones.php');           
        }else{
            $error="Usuario o contraseña incorrecta.";
        }
}
# Redirige al formulario de alta si se pulsa dicho boton
if(isset($_REQUEST["alta"])){
    header('Location:alta.php');
}
?>

<!--Estructura HTML usando Bootstrap -->

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
          
        </ul>
      </div>
    </nav>
  
  
  
    <div class="row">
      <div class="col-sm-4"></div>
        <div class="col-sm-4">
          <div class="panel panel-primary">
            <div class="panel panel-heading">
              <h3 class="panel-title">Login</h3>
            </div>
            <div class="panel panel-body"> 
              <form  method="post">
                <label>User:</label>
                <input type="text" name="username" class="form-control input-sm" id="">
                <label>Pass:</label>
                <input type="password" name="password" class="form-control input-sm" id="">
                <label>Recordar</label>
                <input type="checkbox" name="recordar" value="1"><br>
                <input type="submit" name="submit" value="Enviar" class="btn btn-info">
              <input type="submit" name="alta" value="Alta" class="btn btn-success">
              </form>
            </div>
          </div> 
          <div><?=$error?></div> 
        </div>  
    </div> 

  </div>
</body>

<footer>
  <div class="container">
    <div class="panel panel-primary">
      <div class="panel-footer">
        <label class="control-label" class="has-success">
        <p class="text-muted small">DesingWay @2019
        <br> 
        Todos los derechos reservados
        </p>
        </label> 
      </div>
    </div>
  </div>
</footer>  
</html>
