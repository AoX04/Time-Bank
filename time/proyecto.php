<?php

	include("log.php");
	if(isset($_GET['id'])) $obj = get_proyecto($_GET['id']);
	else exit();
	
	$proyecto= $obj[0];
	
	$id=$proyecto['id'];
	$src='fotosProyecto/'.$proyecto['id'];
	$center=$proyecto['lat'].','.$proyecto['lon'];
	$map='http://maps.google.com/maps/api/staticmap?center='.$center.'&zoom=9&size=140x140&sensor=false&markers='.$center;
	$titulo=$proyecto['titulo'];
	$descripcion= $proyecto['descripcion'];
	$restricciones ='ninguna, abierto para todos los miembros.';
	if ($proyecto['restricciones']) $restricciones ='Los participantes seran aceptados luego de su registro.';
	$fecha = $proyecto['fecha_inicio'];
	$tags = $proyecto['tags'];
	$horas = $proyecto['recompensa'];
?>


<html>

	<head>
		<?php include('header.php'); ?>
		
		<style>
			#texto{
				width:45%;
				position:absolute;
				top:-22px;
				right:5px;
			}
			
			
			#boton{
				width:125px;
				height:60px;
				font-size: 9px !important;
				position:relative;
				top:40px;
				left:87px;
			}
		</style>
		<script>
			function entrar(){
				var url='entrar_evento.php?id_proyecto=<?php echo $id; ?>&user_id=<?php echo $_SESSION['usr']['id'];?>';
				
				
				//alert('aqui');
				$.get(url, function(data) {
				  if(data)
				  alert('Su solicitud se ha completado con exito.');
				  else alert('No se ha podido agregar. Probablemente usted ya se habia registrado previamente')
				});
			}
		</script>
	
	</head>
	
	<body>
		<div id="container">
			<?php include('head.php'); ?>
			
			<div id="main">
				<img width="50%" src="<?php echo $src; ?>"/>
				<div id="texto">
					<h1><?php echo $titulo; ?></h1>
					<p><?php echo $descripcion; ?></p>
				</div>
				
				<br/>
				<br/>
				<h3>Horas:</h3><p><?php echo $horas; ?></p>
				<h3>Fecha de inicio:</h3><p><?php echo $fecha; ?></p>
				<h3>Restricciones:</h3><p><?php echo $restricciones; ?></p>
				
				<h3>Ubicacion del evento:</h3>
				<iframe width="95%" height="95%" src="ubi.php?ubi=<?php echo $center; ?>">
				</iframe>
				<h3>
					Actividad planteada para resolver los siguientes problemas:
				</h3>
				
				<p> <?php echo $tags; ?> </p>
			</div>
			
			<a>
			<button id="boton" class="button green glossy chrome morph s" onclick="entrar()"> 
			<span class="custom">
				Registrarse para el evento! &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
			</span>
			</button>
			</a>
		</div>
		
		
		<?php include "footer.php"?>
	</body>
	
</html>