<!DOCTYPE html>
<html>
<head>
	<title>Combinando php y html</title>
</head>
<body>
	<h1>cabecera con html</h1>
		<?PHP
		print("<h1>cabecera con php</h1>");
		?>
	<p>Párrafo con html</p>
		<?PHP
		print("<p>Párrafo con php</p>");
		?>
	<pre>
	prueba con     pre
			a ver que pasa html
	</pre>
		<?PHP
		print("<pre>
		prueba con     pre
			a ver que pasa php
		</pre>");
		?>
	<?PHP
	$var="<p>Párrafo 1 con php</p>";
	$var1="<p>Párrafo 2 con php</p>";
	print $var.$var1;
	?>

</body>
</html>