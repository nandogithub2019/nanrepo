<!DOCTYPE html>
<html>
<head><!--Ejercicio 3:
programa que calcula una tabla de multiplicar.
- Usar “print” o “echo” para que PHP devuelva código HTML.
- Usar Tablas o Listas.(listas usar for y tablas con while)
- Usar Bucles for o while para facilitar la tarea.-->
	<title>ejercicio 3</title><!--tablas de multiplicar usando listas y for-->
	<meta charset="utf-8">
	<link rel="stylesheet" type="text/css" href="css\ejercicio3.css">
</head>
<body>

		<?PHP
		
		
		for ($tabla=0; $tabla <= 10; $tabla++) { 
			print("La tabla de multiplicar del $tabla ");
			print("<ul>\n");
			for($i=1; $i<=10; $i++){
				$resultado = $tabla*$i;
				print("<li>$tabla*$i =$resultado</li>\n");
			}
		print("</ul>\n");
		}
		?>
		<!--tablas de multiplicar usando tablas y while-->

		<?PHP
		$tabla = 0;
		print("<table>\n");
		while ($tabla <= 10) {
			print("<tr>\n");
			$i=0;
			while ( $i<=10) {
				$resultado = $tabla*$i;
				print("<td>$resultado = $tabla*$i</td>\n");
				$i++;	
				}
			print("</tr>\n");
		$tabla++;
		}
		print("</table>\n");
		
		?>

</body>
</html>