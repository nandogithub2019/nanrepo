<!DOCTYPE html>
<html>
<head>
    <meta charset='utf-8'>
    <meta http-equiv='X-UA-Compatible' content='IE=edge'>
    <title>Page Title</title>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='stylesheet' type='text/css' media='screen' href='main.css'>
    <script src='main.js'></script>
</head>
<body>
<?php
if(isset($_POST['submit'])){
    $edad= $_POST['edad'];
    echo "$edad";
    }else{
?>
    <form action="formulari.php" method="POST">
        <label>edad:<input type="text" name="edad"></label>
        <label><input type="submit" name="submit" value="Aceptar"></label>
    </form>
<?php
}
?> 
</body>
</html>
