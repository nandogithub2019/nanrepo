<?php
session_start();


if(isset($_REQUEST["logout"])){
  session_destroy(); 
  setcookie("password",0,1);
  setcookie("nomusuari",0,1);
  header('Location:login.php'); 
}


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
    $titulo = $descripcion = $imagen = "";
    $errtitulo = $errdescripcion = $errimagen = "";
    if (isset($_REQUEST['submit'])){
        if (empty($_REQUEST["titulo"])) {
            $errtitulo = "Es obligatorio informar el título.";
        }else{
            $titulo = test_input($_REQUEST["titulo"]);
            $_SESSION['titulo']=$_REQUEST["titulo"];
        }
        if (empty($_REQUEST["descripcion"])) {
            $errdescripcion = "Es obligatorio rellenar el campo descripcion.";
        }else{
            $descripcion = test_input($_REQUEST["descripcion"]); 
            $_SESSION['descripcion']=$_REQUEST["descripcion"];
        } 
         


        if (empty($errtitulo) && empty($errdescripcion)){
            $errtitulo = valida_titulo($titulo);
            $errdescripcion = valida_descripcion($descripcion);
        }
                
        if(!$errtitulo){

            if(!is_uploaded_file($_FILES['fichero']['tmp_name'])){
                $errimagen = "selecciona imagen";
            }
            $dir_subida = 'imgs/';
            $fichero_subido = $dir_subida . time()."_".basename($_FILES['fichero']['name']);
            if (move_uploaded_file($_FILES['fichero']['tmp_name'], $fichero_subido)) {
                echo "El fichero es válido y se subió con éxito.\n";
                echo "<a href=\"$fichero_subido\">imagen</a>";
                echo "<img src=\"$fichero_subido\">";
            }
        }    
            if ( !$errimagen && !$errtitulo && !$errdescripcion){

                header('Location:nueva_publicacion.php');
            }
          
    }

    
            //$errtitulo=valida_nombre($titulo);
            //$errdescripcion=valida_descripcion($descripcion);

            //$errimagen = validar_imagen($imagen);
            /*
            if ( !$errimagen && !$errtitulo && !$errdescripcion){

                header('Location:nueva_publicacion.php');
            }*/


    



    ?>

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
      <li><a href="menu_privado.php">Publicaciones</a></li>
      <li><a href="publicacion.php">Nueva publicación</a></li>
      <li><a href="#">Eliminar publicación</a></li>
      
    </ul>

    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="#"><?php  print_r($_nombre)?></a></li>
      <li><a href="publicacion.php?logout">Logout</a></li>
      

    </ul>
  </li>
</ul>
</div>
</nav>
</div>

    <div class="container">
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
             <input class="form-control" class="btn bttn-primary" type="submit" name="submit" value="aceptar">
         </div>

     </form>
 </div>    
 
</body>
</html>

<?php
}else{
  header('Location:login.php');
}

?>