<?php
/*
Función que dado dos fechas:
-Nos diga cual es la mayor de las dos
*/


function fechamayor($fecha1,$fecha2){

    $fecha1=strtotime("$fecha1");
    $fecha2=strtotime("$fecha2");

    if($fecha1>$fecha2){
        $fechamayor=date("D/M/Y",$fecha1);
        
    }elseif($fecha1<$fecha2){
        $fechamayor=date("D/M/Y",$fecha2);
        
    }else{
        $fechamayor="Las 2 fechas son iguales";
    }
    return $fechamayor;

}    
        
        
$fecha1="22-12-2012";
$fecha2="11-22-2010";
$fechamayor=fechamayor($fecha1,$fecha2);
print_r($fechamayor);








?>