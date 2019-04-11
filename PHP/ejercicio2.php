<!DOCTYPE html>
<html>
<head>
	<title>ejercicio 2</title>
	<meta charset="utf-8">
</head>
<body>
	<?PHP
$mensaje_es="Hola";
$mensaje_en="Hello";
$idioma= "es"; //variable que decide el idioma de la pagina
$idioma1= "en";
$mensaje= "mensaje_" . $idioma;
$mensaje1= "mensaje_" . $idioma1;
print $$mensaje; //lo equivalente a print $mensaje_es
print"<br>";
print $$mensaje1;
?>
</body>
</html>