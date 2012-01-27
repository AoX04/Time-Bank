
<html>
	<head>
		<title>Formulario de estadisticas</title>
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
					nombre
				</td>
				<td>
					<input type='text' name='txtnombre' id='txtnombre' class='nombre'/>
				</td>
			</tr>
			
			<tr>
				<td>
					data
				</td>
				<td>
					<input type='text' name='txtdata' id='txtdata' class='data'/>
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
			
		$('.nombre').alphanumeric(); 
$('.data').alphanumeric();		
		
	</script>
	</body>
</html>
