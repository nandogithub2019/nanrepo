<?php
# Funciones para validar formulario de alta

function valida_contrasena($contrasena,$errors){
    if(strlen($contrasena) < 6 || strlen($contrasena) > 8){
        $errors = $errors . "La contraseña debe tener entre 6 y 8 caracteres";
    }
    if (!preg_match('/[a-z]/',$contrasena)){
        $errors = $errors . "La contraseña debe tener al menos una letra minúscula";
    }
    if (!preg_match('/[A-Z]/',$contrasena)){
        $errors = $errors . "La contraseña debe tener al menos una letra mayúscula";
    }
    if (!preg_match('/[0-9]/',$contrasena)){
        $errors = $errors . "La contraseña debe tener al menos un caracter numérico";
    }
    if (!preg_match('/[#~$%!]/',$contrasena)){
        $errors = $errors . "La contraseña debe tener al menos un caracter de estos '#~$%!'";
    }
return $errors;
}

function valida_nombre($usuario){
    $errors ="";
    if (preg_match('/[0-9#~$%!]/',$usuario)){
        $errors = "El campo nombre debe contener texto";
    }
return $errors;
}

function valida_apellido($apellido){
    $errors ="";
    if (preg_match('/[0-9#~$%!]/',$apellido)){
        $errors = "El campo apellido debe contener texto";
    }
return $errors;
}

function valida_correo($email){
    $errors = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "Esta dirección de correo no es válida.";
    }
return $errors;
}

function validar_fecha($fechaNacimiento){ 
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

/* Función valida_titulo, comprueba que el usuario introduzca solo texto y un mínimo de 10 carácteres, devuelve un string vacio si no hay error y con texto si existe error.*/
function valida_titulo($titulo){
    $errors ="";
    if (preg_match('/[0-9#~$%]/',$titulo) ||
     (strlen($titulo) < 10 )){
        $errors = "El campo título debe contener texto y un mínimo de 10 carácteres";
    }
return $errors;
}
/* Función valida_descripcion, comprueba que el usuario introduzca solo texto y un máximo de 500 carácteres, devuelve un string vacio si no hay error y con texto si existe error.*/
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


?>        