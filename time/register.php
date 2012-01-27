
<html>
	<head>
		<?php include('header.php'); ?>
		<title>Formulario de usuarios</title>
		<script type='text/javascript' src='js/jquery.js'></script>
		<script type='text/javascript' src='js/jquery.alphanumeric.pack.js'></script>
		<style>
			#form{
				position:relative;
				width:350px;
				margin-left:auto;
				margin-right:auto;
				top:125px;
			}
			
			#boton{
				position:relative;
				left:100px;
			}
		</style>
	
	</head>
	<body>
	<div id="container">
		<?php include('head.php'); ?>
	<div id="form">
	<form method='post' action='inserter.php'>
	<input type='hidden' name='tabla' value='usuarios' />
	<input type='hidden' name='retorno' value='true' />
		<table>
						
			<tr>
				<td>
					user_name
				</td>
				<td>
					<input type='text' name='campos[user_name]' id='txtuser_name' class='user_name'/>
				</td>
			</tr>
			
			<tr>
				<td>
					password
				</td>
				<td>
					<input type='text' name='campos[password]' id='txtpassword' class='password'/>
				</td>
			</tr>
			
			<tr>
				<td>
					nombre
				</td>
				<td>
					<input type='text' name='campos[nombre]' id='txtnombre' class='nombre'/>
				</td>
			</tr>
			
			<tr>
				<td>
					apellido
				</td>
				<td>
					<input type='text' name='campos[apellido]' id='txtapellido' class='apellido'/>
				</td>
			</tr>
			
			<tr>
				<td>
					telefono
				</td>
				<td>
					<input type='text' name='campos[telefono]' id='txttelefono' class='telefono'/>
				</td>
			</tr>
			
			<tr>
				<td>
					mail
				</td>
				<td>
					<input type='text' name='campos[mail]' id='txtmail' class='mail'/>
				</td>
			</tr>
			<tr>
				<td colspan='2'>
				
					

				</td>
			</tr>
			
			
		</table>
		<button id="boton" class="button green glossy chrome morph xs"> 
							<span class="custom">
								Registrar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
							</span>
					</button>
	</form>
	</div>
	<script type='text/javascript'>
			
		$('.user_name').alphanumeric(); 
		$('.password').alphanumeric(); 
		$('.permisos').alphanumeric(); 
		$('.nombre').alphanumeric(); 
		$('.apellido').alphanumeric(); 
		$('.pic').alphanumeric(); 
		$('.telefono').numeric({allow:"-"}); 
		$('.mail').alphanumeric(); 
		$('.horas').alphanumeric(); 
		$('.lat').alphanumeric(); 
		$('.lon').alphanumeric();		
		
	</script>
	</div>
	<?php include "footer.php"?>
	</body>
</html>
