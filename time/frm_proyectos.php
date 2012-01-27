<?php	include("log.php");	if(isset($_GET['comun']))$tipo=0;	else $tipo=1;		//echo $_SESSION['usr']['id'];	//exit();?>
<html>
	<head>		<?php include('header.php'); ?>
		<title>Formulario de proyectos</title>
		<script type='text/javascript' src='../js/jquery.js'></script>
		<script type='text/javascript' src='../js/jquery.alphanumeric.pack.js'></script>		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>		<script type="text/javascript">						var map;			var marker=0;			function initialize() {								var latlng = new google.maps.LatLng(18.42130754825155, -69.89520745849609);				var myOptions = {					zoom : 8,					center : latlng,					mapTypeId : google.maps.MapTypeId.ROADMAP				};				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);				google.maps.event.addListener(map, 'click', function(event) {					if(marker!=0)marker.setVisible(false);					setTimeout(function(){placeMarker(event.latLng)}, 15);									});				//alert("hello");			}			function placeMarker(location){				//var clickedLocation = new google.maps.LatLng(location);				 								marker = new google.maps.Marker({					position : location,					map : map				});								prev=marker;				document.getElementById("lat").value = location.lat();				document.getElementById("lon").value = location.lng();			}		</script>				<style>			#form{				position:relative;				top:50px;				left:-150px;			}						#map_canvas{				position:absolute;				right:4%;				top:105px;				width:50%;				height:63%;				z-index:3;			}		</style>
	</head>
	<body onload="initialize()">	<div id="container">				<?php include('head.php'); ?>	
			<div id="map_canvas">			</div>	<center>
	<form method='post' enctype="multipart/form-data" action='inserter.php'  id="form">	<input type='hidden' name='tabla' value='proyectos' />	<input type='hidden' name='retorno' value='true' />
		<table>			
			<tr>
				<td>
					Titulo
				</td>
				<td>
					<input type='text' name='campos[titulo]' id='txttitulo' />
				</td>
			</tr>
			
			<tr>
				<td>
					Descripcion
				</td>
				<td>
					<textarea type='text' rows="15" cols="23" name='campos[descripcion]' id='txtdescripcion' >
					</textarea>
				</td>
			</tr>
			
			<tr>
				<td>
					Recompensa
				</td>
				<td>
					<input type='text' name='campos[recompensa]' id='txtrecompensa' />
				</td>
			</tr>
								
			<tr>
				<td>
					Fecha Inicio
				</td>
				<td>
					<input type='text' name='campos[fecha_inicio]' id='txtfecha_inicio' />					<input type='hidden' name='campos[lat]' id='lat' />					<input type='hidden' name='campos[lon]' id='lon' />
				</td>
			</tr>			<tr>
				<td>
					Foto
				</td>
				<td>
					<input type='file' name='foto' id='foto' />
				</td>
			</tr>
			
			<tr>
				<td colspan='2'>
					<input type='hidden' name='campos[autor_id]' value="<?php if($tipo) echo $_SESSION['usr']['id']; else echo '0'; ?>" />
				</td>
			</tr>
		</table>
		<button id="boton" class="button blue glossy chrome morph xs"> 							<span class="custom">								Guardar <br/>							</span>					</button>
	</form>
	</center>	</div>	<?php include "footer.php"?>
	<script type='text/javascript'>
			
		
$('.titulo').alphanumeric(); 
$('.descripcion').alphanumeric(); 
$('.recompensa').alphanumeric(); 
$('.fecha_inicio').alphanumeric();		
		
	</script>
	</body>
</html>
