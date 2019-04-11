<?php
$numeros=array();
for ($i=0; $i < 10; $i++) { 
    
    $numeros[]=rand(0,100);
   // $numeros[]=10;
}
echo "<br>Contenido del array:<br>";
print_r($numeros);
echo "<br>";
$suma=0;
$maximo=$numeros[0];
$minimo=$numeros[0];
for ($i=0; $i < 10; $i++) { 
  //la función count($numeros) le das un array y te 
  //devuelve la longitud, es como el length 
    $suma+=$numeros[$i];
    
    if($maximo<$numeros[$i]){
        $maximo=$numeros[$i];
        
    }
    if($minimo>$numeros[$i]){
        $minimo=$numeros[$i];
        
    }
}
print("la suma es:".$suma."<br>El máximo es".$maximo.
"<br>El minimo es".$minimo);

//suma usando foreach


$sumas=0;
foreach($numeros as $valor){
            $sumas=$sumas+$valor;
}
echo "<br>La suma es:".$sumas;

//máximo
$max=$numeros[0];
foreach($numeros as $numero){
    if($numero>$maximo){

    }
}
?>