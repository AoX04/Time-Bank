<?php
	
	require("lib/engine.php");
	require("permisos.php");
	
	session_start();
	//session_name("user_login");
	//session_destroy();
	
	//echo $_SESSION['usr'];
	//echo $f;
	if(!isset($_SESSION['usr']) )
	{
	
?>
	<html>
	
		<head>
			<meta http-equiv="refresh" content="5;url=login.php">
		</head>
		
		<body>
			Inicie sesion para acceder a este contenido.
		</body>
		
	</html>
	
<?php
		exit(401);
	}
	
	else {
		$_SESSION['usr']['img']="images/user.png";
		
		$f="images/user/".$_SESSION['usr']['id'].".png";
		if( file_exists ($f) && $_SESSION['usr']['pic']==1 )$_SESSION['usr']['img']=$f;
	}
?>