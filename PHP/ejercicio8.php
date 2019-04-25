<?php

/*
Función que dada una fecha
-Si está en formato EEUU que nos la
transforme en formato europeo.
- Si está en formato europeo que nos la
transforme en formato EEUU.
- Podremos añadir un parámetro de formato de
fecha
Formato europeo: dd/mm/AAAA
Formato EEUU: mm/dd/AAAA 
utilizar funcion para transformar una fecha a un array 
$fecha=explode('-',$fecha); convierte una cadena en array y lo separa por el carácter que le indiquemos.
checkdate($fecha[1],$fecha[0],$fecha[2]) es una función de php que comprueba si el formato de fecha de eeuu es correcto.mm/dd/aaaa*/


function tranformaFecha($fecha,$pais){
    $fecha=explode('-',$fecha);
    if(count($fecha)==3 && $pais="EUR" && checkdate($fecha[1],$fecha[0],$fecha[2])){
        $newdate = $fecha[1].'-'.$fecha[0].'-'.$fecha[2];
            
        
    }else if(count($fecha)==3 && $pais="EEUU" && checkdate($fecha[0],$fecha[1],$fecha[2])){
        $newdate = $fecha[1].'-'.$fecha[0].'-'.$fecha[2];
        
    }else{
        $newdate="El formato de fecha no es correcto";
        
    }
    return $newdate;
}
$fecha="22-12-2018";
$pais="EUR";

$result=tranformaFecha($fecha,$pais);
print_r($result);
?>