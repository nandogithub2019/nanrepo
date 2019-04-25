
<?php

/*Función que dada una fecha:
- Se nos devuelva por escrito el día y mes
como si fuese una carta formal:
P.E. de 19/03/2014 pasamos a
“Miercoles, 19 de Marzo del 2014”
-Podemos dar por hecho que se recibirá
esta fecha en formato europeo.
setlocale(LC_TIME, 'spanish');para que haga servir el idioma que le
 indicamos y no el del sistema
 Formatea una fecha/hora local según la configuración local. Los nombres del mes y del día de la semana y otras cadenas dependientes del lenguaje respetan el localismo establecido con setlocale().
 strtotime
 Esta función espera que se proporcione una cadena que contenga un formato de fecha en Inglés US e intentará convertir ese formato a una fecha Unix (el número de segundos desde el 1 de Enero del 1970 00:00:00 UTC), relativa a la marca de tiempo dada en now, o la marca de tiempo actual si now no se proporciona.*/

function fechaFormal($fecha){
    setlocale(LC_TIME, 'spanish');
    $fecha=strtotime($fecha);

    $fecha=strftime("%A,%d %B del %Y",$fecha);
    $fecha=ucfirst($fecha);
    $fecha=UTF8_encode($fecha);
    return $fecha;
}

$fecha="19-03-2014";
$fechaFormal=fechaFormal($fecha);
echo $fechaFormal;




?>