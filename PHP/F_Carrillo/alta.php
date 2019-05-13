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
    /*Realiza los filtros para los campos del formulario*/ 
        $usuario = $apellido = $fechaNacimiento = $email = $data = $contrasena = $contrasena1 = $contrasena2 = "";
        $errUsu = $errapellido = $errfechaNacimiento = $erremail = $errCont1 = $errCont2 = $errors = "";
        if (isset($_REQUEST['submit'])){
            if (empty($_REQUEST["usuario"])) {
                $errUsu = "Es obligatorio informar el usuario.";
            }else{
                $usuario = test_input($_REQUEST["usuario"]);
            }
            if (empty($_REQUEST["apellido"])) {
                $errapellido = "Es obligatorio informar el apellido.";
            }else{
                $apellido = test_input($_REQUEST["apellido"]); 
            } 
            if (empty($_REQUEST["fechanacimiento"])) {
                $errfechaNacimiento = "Es obligatorio informar la fecha de nacimiento.";
            }else{
                $fechaNacimiento = test_input($_REQUEST["fechanacimiento"]); 
            }  
            if (empty($_REQUEST["email"])) {
                $erremail = "Es obligatorio informar el correo.";
            }else{
                $email = test_input($_REQUEST["email"]); 
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

            if (empty($errusuario) && empty($errapellido) && empty($errfechaNacimiento) 
            && empty($erremail) && empty($errCont1) && empty($errCont2) && empty($errUsu)){
                if($contrasena1 != $contrasena2){
                    $errors=("Las contraseñas no coinciden.");
                }else{
                    $errors=valida_contrasena($contrasena1,$errors);
                    $errUsu=valida_nombre($usuario);
                    $errapellido=valida_apellido($apellido);
                    $erremail=valida_correo($email);
                    $errfechaNacimiento = validar_fecha($fechaNacimiento);
                   
                if (empty($errors) && !$erremail && !$errfechaNacimiento && !$errUsu){
                              
                        header('Location:index.php');
                    }
                }
                
            } 
        }
    ?>
    <div class="container">
        <br><br>
        <div class="row">
            <div class="col-sm-2"></div>
            <div class="col-sm-8">
                <div class="panel panel-success">
                <div class="panel panel-heading">
                  <h3 class="panel-title">Formulario de Alta</h3>
                </div>
                <div class="panel panel-body"> 
                    <form method="post" action="<?=htmlspecialchars($_SERVER["PHP_SELF"])?>">
                        <div class="form-group">
                        <label class="control-label" class="has-success">Nombre:</label> 
                        <input class="form-control" type="text" name="usuario" value="<?=$usuario?>">
                        <span class="error"> <?=$errUsu?></span>
                        </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label" class="has-success">Apellido:</label> 
                        <input class="form-control" type="text" name="apellido" value="<?=$apellido?>">
                        <span class="error"> <?=$errapellido?></span>
                        </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label" class="has-success">Fecha de nacimiento:</label> 
                        <input class="form-control" type="text" name="fechanacimiento" value="<?=$fechaNacimiento?>" placeholder="24/02/1990">
                        <span class="error"> <?=$errfechaNacimiento?></span>
                        </div>
                        
                        
                        <div class="form-group">
                        <label class="control-label" class="has-success">Email:</label> 
                        <input class="form-control" type="text" name="email" value="<?=$email?>">
                        <span class="error"> <?=$erremail?></span>
                        </div>
                        

                        <div class="form-group">
                        <label>Contraseña:</label> 
                        <input class="form-control" type="password" name="contrasena1" value="<?=$contrasena1?>" placeholder="Nand1!">
                        <span class="error"> <?=$errCont1?></span>
                        </div>
                        
                        
                        <div class="form-group">   
                        <label>Repite contraseña:</label> 
                        <input class="form-control" type="password" name="contrasena2" value="<?=$contrasena2?>" placeholder="Nand1!">
                        <span class="error"> <?=$errCont2?></span>
                        </div>
                        

                        <div class="form-group"> 
                        <input type="submit" name="submit" value="enviar">
                        </div>
                        <?php
                        echo "$errors";
                        ?>
                    </form>
                </div>
                </div>
            </div>
        </div>
    </div>    
            
</body>
</html>