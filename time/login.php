<?php
	
	
	$red="";
	$error="";
	if($_POST)
	{
	
		include("lib/engine.php");
		$user= make_safe( $_POST['user'] );
		$password= md5(make_safe($_POST['password']) );
		
		$sql= "SELECT * FROM `usuarios` where `user_name`='$user' ";
		//$sql = "INSERT INTO clientes (cedula,nombre,apellido,rnc) VALUES ( \'cedula\',\'nombre\',\'apellido\',\'RNC\')";
		$result = mysql_query($sql);
		$arr = get_arr($result);
		
		$log_in=false;
		
		
		if(count($arr)>0 and $arr[0]['password']==$password)
		{
			$log_in=true;
			
			$red="<meta http-equiv=\"refresh\" content=\"0;url=home.php\">";
//			session_name("user_login");
			session_start();
			$_SESSION['usr']=$arr[0];
			
		}
		else{
		
			$error= " Nombre de usuario o clave de acceso incorrectos!";
			
		}
		
	}
	
	
?>

<html>
	
	<head>
		
		<?php
			echo $red;
			include('header.php');
		?>
		
		<style>
			#login{
				position:relative; 
				//left:22%;
				margin-left:auto;
				margin-right:auto;
				top:150px;
				width:50%;
			}
			
		</style>
		
	</head>

	<body>
		
		<div>
			<p class="error" id="login_error"><?php echo $error;?></p>	
			<div id="container">
				
				<?php include('head.php'); ?>
				
			
				<form method="post" action="login.php" id="login">
					<table>
						<tr>
						
						<td>Nombre de Usuario:</td> <td><input type="text"  name="user"/> </td>
						</tr>
						<tr>
							<td>Clave:</td><td><input type="password" name="password" /></td>
						
						</tr>
						
						<tr>
							<td><button id="boton" class="button blue glossy chrome morph xs"> 
							<span class="custom">
								Iniciar Sesion
							</span>
							</button></td>
							<td><a href="register.php" id="boton" class="button green glossy chrome morph xs"> 
							<span class="custom">
								Registrar &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br/>
							</span>
							</a></td>
						</tr>
					</table>
				</form>
				
			</div>
<?php include "footer.php"?>
		</div>
		
	</body>


</html>


