<?php
/*Función que:
-Reciba un string
- Compare si el string dado es igual a la
contraseña almacenada
- Si lo es: mensaje en verde, todo correcto.
- Si no lo es: mensaje en rojo, contraseña
incorrecta.
*/

function comparaPass($pass){
    $valida=false;
    $clave=md5(sha1($pass));
}

$str ="clave";
if (comparaPass($str))



?>