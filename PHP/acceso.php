<?php
session_start();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    
    if($_SESSION["user"] == 'user' && $_SESSION["pass"] == 'password'){
        
    echo "usuario correcto";
    
    }else{
        header("location:ejercicio5_bis.php");
    }
    ?>

    
   
</body>
</html>