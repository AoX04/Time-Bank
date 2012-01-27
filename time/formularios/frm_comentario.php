
<html>
	<head>
		<title>Formulario de comentario</title>
		<script type='text/javascript' src='../javascript/jquery.js'></script>
		<script type='text/javascript' src='../javascript/jquery.alphanumeric.pack.js'></script>
	</head>
	<body>
	<center>
	<form method='post' action=''>
		<table>
			
			<tr>
				<td>
					id
				</td>
				<td>
					<input type='text' name='txtid' id='txtid' class='id'/>
				</td>
			</tr>
			
			<tr>
				<td>
					texto
				</td>
				<td>
					<input type='text' name='txttexto' id='txttexto' class='texto'/>
				</td>
			</tr>
			
			<tr>
				<td>
					autor_id
				</td>
				<td>
					<input type='text' name='txtautor_id' id='txtautor_id' class='autor_id'/>
				</td>
			</tr>
			
			<tr>
				<td>
					estadistica_id
				</td>
				<td>
					<input type='text' name='txtestadistica_id' id='txtestadistica_id' class='estadistica_id'/>
				</td>
			</tr>
			
			<tr>
				<td>
					titulo
				</td>
				<td>
					<input type='text' name='txttitulo' id='txttitulo' class='titulo'/>
				</td>
			</tr>
			
			<tr>
				<td colspan='2'>
					<button type='submit'>Guardar</button>
				</td>
			</tr>
		</table>
		
	</form>
	</center>
	<script type='text/javascript'>
			
		$('.texto').alphanumeric(); 
$('.autor_id').alphanumeric(); 
$('.estadistica_id').alphanumeric(); 
$('.titulo').alphanumeric();		
		
	</script>
	</body>
</html>
