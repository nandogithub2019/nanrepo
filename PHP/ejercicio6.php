<?php
/*
Función que dado un string:
-Devuelve la letra que más aparece
- Devuelve la letra que menos aparece
sin usar la funcion :array_count_values( array)
Calcula la frecuencia de cada uno de los elementos de un array

str_split($cadena);
devuelve un array con los elementos de la cadena
Calcula la frecuencia de cada uno de los elementos de un array
array_count_values( array)
Calcula la frecuencia de cada uno de los elementos de un array
*/
function _max($array){
    
    $lletra=array_key_first($array);
    $max=$array[$lletra];

    foreach($array as $key=>$value){
        if($value>$max){
            $max=$value;
           
        }
    }
    foreach($array as $key=>$value){
        if($value==$max){
            $resposta[]=array($key=>$value);
        }
    }
    

    return $resposta;
}

function _min($array){

    $min=count($array);

    foreach($array as $key=>$value){
        if($value<$min){
            $min=$value;
           
        }
    }
    foreach($array as $key=>$value){
        if($value==$min){
            $resposta[]=array($key=>$value);
        }
    }
    

    return $resposta;
}




    
        
        
$cadena="casacesareerr";

$arrayletras=str_split($cadena);
print_r($arrayletras);
echo "<br>";
$frecuencialetras=array_count_values($arrayletras);
print_r($frecuencialetras);
echo "<br>";

$maxletras=_max($frecuencialetras);
print_r($maxletras);
echo "<br>";
$minletras=_min($frecuencialetras);
print_r($minletras);
echo "<br>";



?>