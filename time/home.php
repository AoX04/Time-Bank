<?php

	include("log.php");
	$user=get_user($_SESSION['usr']['id']);

?>

<html>
	<head>
		<?php include('header.php'); ?>
		<style>
			#problemas{
				position:relative;
				left:25px;
				top:100px;
			}
			
			#user_info{
				width:35%;
				height:55%;
				right:15px;
				position:absolute;
				top:75px;
				text-align:center;
			}
		</style>
	</head>
	
	<body>
		
		<div id="container">
			<?php include('head.php'); ?>
			
			<div class="shadow" id="user_info">
				<br/>
				<img src="images/avatar.png"/>
				<h3>Nombre:</h3><h2><?php echo $user[0]['nombre']; ?> 
				<?php echo $user[0]['apellido']; ?> </h2>
				<h3>Horas disponibles:</h3><h2><?php echo $user[0]['horas']; ?> Horas.</h2>
				<h3>Notificaciones:<h3><h2>No disponible.</h2>
			</div>
			
			
			<table id="problemas">
				<tr>
				<td>
					<h3>Ultimos problemas discutidos por la comunidad:</h3>
				</td>
				</tr>
				<tr>
					<td>
						<a href="problemas.php?nombre=Nivel%20de%20analfabetismo&c=1&w=200"><h3>Analfabetismo.</h3></a>
						<iframe src="circular.php?tabla=Nivel%20de%20analfabetismo&w=400" type="image/svg+xml" width="200" height="200">
						</iframe>
					</td>
				</tr>
				<tr>
				</tr>
				<tr>
					
					<td>
						<a href="problemas.php?nombre=polucion basura&w=400"><h3>Eliminacion de residuos solidos.</h3></a>
						<a href="home.php"><iframe src="barras.php?tabla=polucion basura" type="image/svg+xml" width="400" height="200">
						</iframe>
					</td>
				</tr>
			</table>
		</div>
		<?php include "footer.php"?>
	</body>
	
</html>