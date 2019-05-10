<?php
# Funciones para validar formulario de alta

function valida_contrasena($contrasena,$errors){
    if(strlen($contrasena) < 6 || strlen($contrasena) > 8){
        $errors = $errors . "<li>La contraseña debe tener entre 6 y 8 caracteres</li>";
    }
    if (!preg_match('/[a-z]/',$contrasena)){
        $errors = $errors . "<li>La contraseña debe tener al menos una letra minúscula</li>";
    }
    if (!preg_match('/[A-Z]/',$contrasena)){
        $errors = $errors . "<li>La contraseña debe tener al menos una letra mayúscula</li>";
    }
    if (!preg_match('/[0-9]/',$contrasena)){
        $errors = $errors . "<li>La contraseña debe tener al menos un caracter numérico</li>";
    }
    if (!preg_match('/[#~$%!]/',$contrasena)){
        $errors = $errors . "<li>La contraseña debe tener al menos un caracter de estos '#~$%!'</li>";
    }
return $errors;
}

function valida_nombre($usuario){
    $errors ="";
    if (preg_match('/[0-9#~$%!]/',$usuario)){
        $errors = "<li>El campo nombre debe contener texto</li>";
    }
return $errors;
}

function valida_apellido($apellido){
    $errors ="";
    if (preg_match('/[0-9#~$%!]/',$apellido)){
        $errors = "<li>El campo apellido debe contener texto</li>";
    }
return $errors;
}

function valida_correo($email){
    $errors = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "<li>Esta dirección de correo no es válida.</li>";
    }
return $errors;
}

function validar_fecha($fechaNacimiento){ //todo: $valores[2]-fecha actual>18
    $hoy = getdate();
    $añoActual = $hoy['year'];
    $valores = explode('/', $fechaNacimiento);
    if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
        $errfechaNacimiento = "";
        if(!($añoActual-$valores[2] >= 18)){
            $errfechaNacimiento = "Has de ser mayor de edad";
        }else{
            $errfechaNacimiento = "";
        }
    }else{
    $errfechaNacimiento = "La fecha no es correcta";
    }
    
    return $errfechaNacimiento;
}

# Final funciones formulario de alta

function valida_titulo($titulo){
    $errors ="";
    if (preg_match('/[0-9#~$%]/',$titulo) ||
     (strlen($titulo) < 10 )){
        $errors = "El campo título debe contener texto y un mínimo de 10 carácteres";
    }
return $errors;
}

function valida_descripcion($descripcion){
    $errors ="";
    if (preg_match('/[0-9#~$%]/',$descripcion) ||
     (strlen($descripcion) > 500 )){
        $errors = "El campo desripción debe contener texto y un máximo de 500 carácteres\r";
    }
return $errors;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
/*
function logout($logout){
    if(isset($logout)){
    session_destroy(); 
    setcookie("password",0,1);
    setcookie("nomusuari",0,1);
    header('Location:login.php'); 
    }
}
*/

?>        