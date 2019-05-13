<?php
# Inicio de sesión para poder trabajar con variables de sesión

session_start();
/*si se pulsa logout se destruye la sesión y las cookies
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

  if(isset($_SESSION["nom"])){
    $_nombre=$_SESSION["nom"];
  } else{
    $_nombre=$_COOKIE["nomusuari"];
  }   
?>
<!--Extructura HTML usando Bootstrap -->
<!DOCTYPE html>
<html>
<head>

  <title>Alta de usuarios</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="lib/css/bootstrap.min.css">
  <script src="lib/js/jquery-3.3.1.min.js"></script>
  <script src="lib/js/bootstrap.min.js"></script>
<?php
  require("funcions.php");
?>
</head>
<body>

<?php
/*Se realizan las comprobaciones del formulario, 
campos que no esten vacios, se crean variables 
de sesión y de cookie para poder mostrar correctamente la nueva
publicación */ 
  $titulo = $descripcion = $imagen = "";
  $errtitulo = $errdescripcion = $errimagen = "";
  if (isset($_REQUEST['submit'])){
    if (empty($_REQUEST["titulo"])) {
      $errtitulo = "Es obligatorio informar el título.";
    }else{
      $titulo = test_input($_REQUEST["titulo"]);
      $_SESSION['titulo']=$titulo;
      setcookie("titulo",$titulo,time()+365*24*60*60);
    }
    if (empty($_REQUEST["descripcion"])) {
      $errdescripcion = "Es obligatorio rellenar el campo descripcion.";
    }else{
      $descripcion = test_input($_REQUEST["descripcion"]); 
      $_SESSION['descripcion']=$descripcion;
      setcookie("descripcion",$descripcion,time()+365*24*60*60); 
    } 
/*Sino hay errores valida titulo y descripción
mediante funciones, si es correcto comprueba el fichero
 a subir mediante funciones propias de php y el array $_FILES.
 si todo esta correcto, redirige a la página de la 
 nueva publicación*/          
    if (empty($errtitulo) && empty($errdescripcion)){
      $errtitulo = valida_titulo($titulo);
      $errdescripcion = valida_descripcion($descripcion);
    }
      if(!$errtitulo && !$errdescripcion){
        if(!is_uploaded_file($_FILES['fichero']['tmp_name'])){
            $errimagen = "selecciona imagen";
        }
        $dir_subida = 'imgs/';
        $fichero_subido = $dir_subida . time()."_".basename($_FILES['fichero']['name']);
        if (move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_subido)) {
          $_SESSION['imag']=$fichero_subido;
          setcookie("imag",$fichero_subido,time()+365*24*60*60); 
          
        }
      }    
      if ( !$errimagen && !$errtitulo && !$errdescripcion){
          header('Location:ultima_publicacion.php');
      }
          
  }
?>
<!--Extructura HTML usando Bootstrap -->
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
      </div>
    </nav>
  </div>

  <div class="container">
    <div class="row">
      <div class="col-sm-2"></div>
      <div class="col-sm-8">
      <div class="panel panel-info">
        <div class="panel panel-heading">
          <h3 class="panel-title">Nueva Publicación</h3>
        </div>
        <div class="panel panel-body">    
          <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>" enctype="multipart/form-data">
            <div class="form-group">
              <label class="control-label" class="has-success">Título:</label> 
              <input class="form-control" type="text" name="titulo" value="<?=$titulo?>">
              <span class="error"> <?=$errtitulo?></span>
            </div>

            <div class="form-group">
              <label class="control-label" class="has-success">Descripción:</label> 
              <input class="form-control" type="text" name="descripcion" value="<?=$descripcion?>">
              <span class="error"> <?=$errdescripcion?></span>
            </div>

            <div class="form-group">
              <label class="control-label" class="has-success">Imagen:</label>
              <input class="form-control" type="file" name="fichero" value="<?=$imagen?>">
              <span class="error"> <?=$errimagen?></span>
            </div>

            <div class="form-group">
              <input class="btn btn-info" type="submit" name="submit" value="enviar">
            </div>
          </form>
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