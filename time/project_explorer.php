<?php

	include("log.php");
	if(isset($_GET['comun']))$tipo=0;
	else $tipo=1;
	
	$data = listar_proyectos($tipo);
?>


<html>

	<head>
		<?php include('header.php'); ?>
		
		<style>
		
		
			#main{
				position:relative;
				top:50px;
				width:98%;
				margin-left:auto;
				margin-right:auto;
				text-align:center;
			}
			
		
		</style>
	
	</head>
	
	<body>
		<div id="container">
			<?php include('head.php'); ?>
			
			<div id="main">
			<?php
			foreach ($data as $val)echo formatear_proyecto($val).'<br/>';
			?>
			</div>
		</div>
		
		
		<?php include "footer.php"?>
	</body>
	
</html>