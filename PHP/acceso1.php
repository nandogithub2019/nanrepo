<?php
session_start();

if(isset($_SESSION["login"])){
?>
    
     
    
    <a href="logout.php">[logout]</a>
<?php    
    }else{
        header('Location:ejercicio5_bis.php');           
    }
?>