<?php

	function permisos($required)
	{
		
		//echo $_SESSION['usr']['permisos'];
		if(($required%$_SESSION['usr']['permisos'])!=0)
		{
?>

			<html>
			
				<head>
					<meta http-equiv="refresh" content="3;url=index.php">
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