<?php

	include("log.php");
	if(isset($_GET['comun']))$tipo=0;
	else $tipo=1;
?>


<html>

	<head>
		<?php include('header.php'); ?>
		
		<style>
		
			#main{
				position:relative;
				top:50px;
				width:90%;
				margin-left:auto;
				margin-right:auto;
				text-align:center;
			}
			
			.b{
				display:none;
				width:300px; 
				height:250px; 
				background-color:#E2EEFF;
				position:relative;
				margin-left:auto;
				margin-right:auto;
			}
		</style>
		
	
	</head>
	
	<body>
		<div id="container">
			<?php include('head.php'); ?>
			
			<div id="main">
				<a href="project_explorer.php"><button id="boton1" class="button blue glossy chrome morph l"> 
					<span class="custom">
					Explorar proyectos privados activos.
					</span>
					</button>
				</a>
				<div id="b1" class="b">
					<p>
						Solicitudes en linea acerca del intercambio de horas como moneda virtual.
					</p>
				</div>
				<br/>
				<a href="frm_proyectos.php"><button id="boton2" class="button green glossy chrome morph l"> 
					<span class="custom">
					Proponer nuevo proyecto privado.
					</span>
				</button></a>
				
				<div id="b2" class="b">
					<p>
						Crear nueva solicitud en linea acerca del intercambio de horas como moneda virtual.
					</p>
				</div>
				
			</div>
		
		</div>
		<?php include "footer.php"?>
	</body>
	
	<script>
		$("#boton1").hover(
			function () {
				$('#b1').fadeIn('slow');
			}, 
			function () {
				$('#b1').fadeOut('slow');
			}
		);
		
		$("#boton2").hover(
			function () {
				
					
				
					$('#b2').fadeIn('slow');
				
			}, 
			function () {
				//$('#b1').fadeout('fast',function(){
				//alert('done');
					$('#b2').fadeOut('slow');
				
						
				
				//})
			}
		);
			
		
	</script>
	
</html>