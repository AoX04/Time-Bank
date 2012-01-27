<?php

	include("log.php");
	$nombre= $_GET['nombre'];
	$circ = isset($_GET['c']);
	$src= 'php?tabla='.$nombre;
	if($circ) $src="circular.".$src;
	else  $src="barras.".$src;
	$w= $_GET['w'];
?>


<html>

	<head>
		<?php include('header.php'); ?>
		
		<style>
			
			iframe{
				position:relative;
				top:35px;
			}
			
			#texto{
				top:0px;
				right:15px;
				position:absolute;
				width:65%;
			}
		</style>
	
	</head>
	
	<body>
		<div id="container">
			<?php include('head.php'); ?>
			<div id="main">
				<iframe src="<?php echo $src; ?>" type="image/svg+xml" width="<?php echo $w; ?>" height="200"></iframe>
				<div id="texto">
					<h2>Analfabetismo</h2>
					<p>Uno de los grandes problemas que apremia la sociedad dominicana, puesto que la lectura es la llave de la de los candados de una mente.
					</p>
				</div>
			</div>
		</div>
		
		
		<?php include "footer.php"?>
	</body>
	
</html>