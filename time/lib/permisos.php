<?php

	function permisos()
	{
		if($_SESSION['usr']['permisos']!=2)break;
		
		if($_SESSION['usr']['permisos']%$required!=0)
		{
?>

	<html>
	
		<head>
			<meta http-equiv="refresh" content="5;url=index.php">
		</head>
		
		<body>
			No tiene suficientes privilegios para acceder a esta pagina, consulte con su administrador para mas informacion.
		</body>
		
	</html>

<?php
			exit(401);
		}
		
	}
?>