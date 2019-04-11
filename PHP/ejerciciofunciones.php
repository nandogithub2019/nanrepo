<?php
/*Fes un programa amb:

4 funcions:
Una funció que rep un número, i torna un array de números aleatoris de longitud el número que rep la funció
Una funció que rep un array i torna el valor mínim
Una funció que rep un array i torna el valor màxim.
Una funció que rep un array i torna la suma dels seus elements.
El programa genera un array de 10 posicions i indica els valors màxims, mínims i la suma d'aquest array fent servir les funcions que heu creat*/

function generaarray($longitud){
    $numero=array(); /*defino $numeros tipo array aunque no seria necesario es una buena práctica
                        porque en otrso lenguajes daría error*/    
    for ($i=0; $i < $longitud; $i++) { 
        $numeros[]=rand(0,10);
    }
    return $numeros;
}


/*$numeros=generaarray(4);
echo "<br>";
print_r($numeros);*/



echo "<br>";
echo "<br>";


function _max($array){
    
    $max=$array[0];
        for ($i=0; $i < count($array); $i++) { 
             if ($max<$array[$i]) {
            $max=$array[$i];
            }
        
    }
    return $max;
}
/*$max=_max($numeros);  //la variable que devuelve la función la guardo en una variable global
print_r(_max($numeros));/*otra manera de utilizar el valor devuelto por la función, 
                 imprimirlo directamente mediante la llamada a la función*/
echo"<br>";
//echo $max; //imprimiendo la variable que devuelve la función una vez guardada en una variable     
echo "<br>";
echo "<br>";

function _min($array){
    
    $min=$array[0];
        for ($i=0; $i < count($array); $i++) { 
             if ($min>$array[$i]) {
            $min=$array[$i];
            }
        
    }
    return $min;
}
/*$min=_min($numeros);
echo $min;*/

function sumaarray($array){
    $suma=0;
    for ($i=0; $i < count($array); $i++) { 
        $suma+=$array[$i];
       }
       return $suma;
}
/*$suma=sumaarray($numeros);
echo "<br>";
echo $suma;*/


$numeros=generaarray(10);
$max=_max($numeros);
$min=_min($numeros);
$suma=sumaarray($numeros);
echo"el array es:<br>";

print_r($numeros);
echo "<br>el máximo".$max."el mínimo".$min."la suma".$suma;

?>