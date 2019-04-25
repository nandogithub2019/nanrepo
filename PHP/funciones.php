<!DOCTYPE html>
<html>
<head>

    <META charset="UTF-8">  
    <META HTTP-EQUIV="Expires" CONTENT="no-cache">
</head>
<body>
    <?php
    
   // $fechamayor=fechamayor($fecha1,$fecha2);
 
    function fechaFormal($fecha){
        setlocale(LC_TIME, 'spanish');
        $fecha=strtotime($fecha);
    
        $fecha=strftime("%A,%d %B del %Y",$fecha);
        $fecha=ucfirst($fecha);
        return $fecha;
    }
    
    $fecha="19-03-2014";
    $fechaFormal=fechaFormal($fecha);
    echo $fechaFormal;
    echo"miércoles"
    
    
    
    ?>
</body>
</html>