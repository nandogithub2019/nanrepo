<?php
session_start();



if(isset($_REQUEST["logout"])){
    session_destroy(); 
    header('location:ejercicio5_bis.php');           
}
        
if(isset($_SESSION["login"])){
?>
    Bienvenido......<?=$_SESSION["usuario"]?>
    
    <a href="acceso.php?logout">[logout]</a><!--'?logout' pasa por GET
    logout que es recogido con $_REQUEST["logout"].Normalmente
    $_REQUEST recoge el valor del atributo name de los inputs 
    pero esta es otra manera -->
<?php    
    }else{
        header('Location:ejercicio5_bis.php');           
    }
?>
   