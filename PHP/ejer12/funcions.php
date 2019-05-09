<?php

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

function valida_correo($email){
    $errors = "";
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $errors = "<li>Esta dirección de correo no es válida.</li>";
    }
return $errors;
}

function validar_fecha($fechaNacimiento){ //todo: $valores[2]-fecha actual>18
    $valores = explode('/', $fechaNacimiento);
    if(count($valores) == 3 && checkdate($valores[1], $valores[0], $valores[2])){
        $errfechaNacimiento = "";
    }else{
    $errfechaNacimiento = "La fecha no es correcta";
    }
    return $errfechaNacimiento;
}

function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}


?>        