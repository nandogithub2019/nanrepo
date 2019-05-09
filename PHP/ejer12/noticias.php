<?php
session_start();
if(isset($_REQUEST["logout"])){
    session_destroy(); 
    setcookie("password",0,1);
    setcookie("nomusuari",0,1);
    header('Location:login.php');           
}
if(isset($_SESSION["login"]) && $_SESSION["login"]==true){
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Bootstrap Example</title>
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
    <a class="navbar-brand" href="#">Logotipo</a>
  </div>

  <!-- Agrupar los enlaces de navegación, los formularios y cualquier
       otro elemento que se pueda ocultar al minimizar la barra -->
  <div class="collapse navbar-collapse navbar-ex1-collapse">
    <ul class="nav navbar-nav">
      <li><a href="noticias.php">Noticias</a></li>
      <li><a href="#">Editar Noticia</a></li>
      <li><a href="#">Eliminar Noticia</a></li>
      
    </ul>

    
    <ul class="nav navbar-nav navbar-right">
      <li><a href="menu_privado.php?logout">Logout</a></li>
      
        
        </ul>
      </li>
    </ul>
  </div>
</nav>
<section>
<?php
        $usuario = $data = $contrasena = $contrasena1 = $contrasena2 = "";
        $errUsu = $errCont1 = $errCont2 = $errors = "";
        if (isset($_REQUEST['submit'])){
            if (empty($_REQUEST["usuario"])) {
                $errUsu = "Es obligatorio informar el usuario.";
            }else{
                $usuario = test_input($_REQUEST["usuario"]);
            }            
            if (empty($_REQUEST["contrasena1"])) {
                $errCont1 = "Es obligatorio informar la contraseña.";
            }else{
                $contrasena1 = test_input($_REQUEST["contrasena1"]);
            }
            if (empty($_REQUEST["contrasena2"])) {
                $errCont2 = "Es obligatorio informar la contraseña.";
            }else{
                $contrasena2 = test_input($_REQUEST["contrasena2"]);
            }
            if (empty($errCont1) && empty($errCont2) && empty($errUsu)){
                if($contrasena1 != $contrasena2){
                    $errors=("<li>Las contraseñas no coinciden.</li>");
                }else{
                    $errors=valida_contrasena($contrasena1,$errors);
                    if (empty($errors)){
                        
                        header('Location:login.php');
                    }
                }
            } 
        }
        valida_contrasena($contrasena,$errors);
        test_input($data);
        
    ?>
        <div class="container">
            <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                <div class="form-group">
                   <label class="control-label" class="has-success">Usuario:</label> 
                   <input class="form-control" type="text" name="usuario" value="<?=$usuario?>">
                   <span class="error">* <?=$errUsu?></span>
                </div>
                <div class="form-group">
                <label class="control-label" class="has-success">Contraseña:</label> 
                <input class="form-control" type="password" name="contrasena1" value="<?=$contrasena1?>" placeholder="Nand1!">
                <span class="error">* <?=$errCont1?></span>
                </div>
                
                <div class="form-group">  
                <label class="control-label" class="has-success">Repite contraseña:</label> 
                <input class="form-control" type="password" name="contrasena2" value="<?=$contrasena2?>" placeholder="Nand1!">
                <span class="error">* <?=$errCont2?></span>
                </div>
                  
                <input class="form-control" class="btn bttn-primary" type="submit" name="submit" value="aceptar">
            </form>
        </div>    
            <?php
            if ($errors != ""){
                print ("<p>Error en la contraseña:</p>");
                print ("<ul>");
                print ($errors);
                print ("</ul>");
            }
            ?>
</section>
</body>
<footer  class="footer">Pie de paginas</footer>
</html>


<?php
}else{
    header('Location:login.php');           
}
?>




