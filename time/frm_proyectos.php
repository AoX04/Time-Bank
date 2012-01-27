<?php
<html>
	<head>
		<title>Formulario de proyectos</title>
		<script type='text/javascript' src='../js/jquery.js'></script>
		<script type='text/javascript' src='../js/jquery.alphanumeric.pack.js'></script>
	</head>
	<body onload="initialize()">
			<div id="map_canvas">
	<form method='post' enctype="multipart/form-data" action='inserter.php'  id="form">
		<table>			
			<tr>
				<td>
					Titulo
				</td>
				<td>
					<input type='text' name='campos[titulo]' id='txttitulo' />
				</td>
			</tr>
			
			<tr>
				<td>
					Descripcion
				</td>
				<td>
					<textarea type='text' rows="15" cols="23" name='campos[descripcion]' id='txtdescripcion' >
					</textarea>
				</td>
			</tr>
			
			<tr>
				<td>
					Recompensa
				</td>
				<td>
					<input type='text' name='campos[recompensa]' id='txtrecompensa' />
				</td>
			</tr>
								
			<tr>
				<td>
					Fecha Inicio
				</td>
				<td>
					<input type='text' name='campos[fecha_inicio]' id='txtfecha_inicio' />
				</td>
			</tr>
				<td>
					Foto
				</td>
				<td>
					<input type='file' name='foto' id='foto' />
				</td>
			</tr>
			
			<tr>
				<td colspan='2'>
					<input type='hidden' name='campos[autor_id]' value="<?php if($tipo) echo $_SESSION['usr']['id']; else echo '0'; ?>" />
				</td>
			</tr>
		</table>
		<button id="boton" class="button blue glossy chrome morph xs"> 
	</form>
	</center>
	<script type='text/javascript'>
			
		
$('.titulo').alphanumeric(); 
$('.descripcion').alphanumeric(); 
$('.recompensa').alphanumeric(); 
$('.fecha_inicio').alphanumeric();		
		
	</script>
	</body>
</html>