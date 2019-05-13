<?php
session_start();
/* Inicio de sesión para poder trabajar con variables de sesión
si se pulsa logout se destruye la sesión y las cookies
y reirige a la pagina de inicio*/

if(isset($_REQUEST["logout"])){
  session_destroy(); 
  setcookie("password",0,1);
  setcookie("nomusuari",0,1);
  header('Location:index.php'); 
}

/* Comprueba si se han creado variables de sesión o de
cookies, comprueba que sean correctas.
Por último, crea una variable con el nombre del 
usuario tanto si accedes variables de sesión o de
cookie. sino se han creados variables de sesión o de cookies
se redirige a la página de login */

if(((isset($_SESSION["pass"]) 
  && $_SESSION["pass"]=='700c8b805a3e2a265b01c77614cd8b21'
  && isset($_SESSION["nom"]) 
  && $_SESSION["nom"]=='nando')) ||

  ((isset($_COOKIE["password"]) 
    && isset($_COOKIE["nomusuari"]) 
    && $_COOKIE["password"]=='700c8b805a3e2a265b01c77614cd8b21' 
    && $_COOKIE["nomusuari"]=='nando'))){

 /*Para cargar la nueva publicación y mantener los datos
 comprueba si se accede mediante variables de sesión
 o de cookies */      
  if(isset($_SESSION["nom"])){
    $_nombre=$_SESSION["nom"];
    $_titulo=$_SESSION['titulo'];
    $_imagen=$_SESSION['imag'];
    $_descripcion=$_SESSION['descripcion'];
  } else{
    $_nombre=$_COOKIE["nomusuari"];
    $_titulo=$_COOKIE['titulo'];
    $_imagen=$_COOKIE['imag'];
    $_descripcion=$_COOKIE['descripcion'];
  }   

?>
<!--Estructura mediante Bootstrap -->
  <!DOCTYPE html>
  <html lang="en">
  <head>
    <title>Area privada</title>
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
      <li><a href="publicaciones.php">Publicaciones</a></li>
      <li><a href="nueva_publicacion.php">Nueva publicación</a></li>
      
      
    </ul>

    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php  print_r($_nombre)?></a></li>
      <li><a href="nueva_publicacion.php?logout">Logout</a></li>
      
      
    </ul>
  </li>
</ul>
</div>
</nav>
</div>
<div class="container"> 
  <div class="panel panel-primary">
    <div class="panel-heading">
      <h3 class="panel-title"><?php print_r($_titulo)?></h3>
    </div>
    <div class="panel-body">
      <div class="media">
        <div class="media-left">
          <img class="media-object" src="<?php print_r($_imagen);?>"  alt="imagen perfil">
        </div>
        <div class="media-body">
      
          <h4 class="media-heading"><?php echo "Chiruca"?></h4>
          <p>
          <?php print_r($_descripcion)?>
         </p>
        </div>
        <div class="panel-footer">
        <div class="form-group">
        <label class="control-label" class="has-success">Comentarios:</label> 
        <input class="form-control" type="text" name="email" value="">
        </div>
      </div>
      <div class="form-group">
        <button class="btn btn-primary" type="button">
        Like <span class="badge">4</span>
        </button>
        <button class="btn btn-warning" type="button">Añadir comentario 
        </button>
        </div>
    </div>
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
<?php
}else{
  header('Location:index.php');
}

?>