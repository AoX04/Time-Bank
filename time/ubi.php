<?php
	
	$ubi= $_GET['ubi'];
?>
<html>
	

	<head>
		<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=true"></script>
		
		
		
		<script type="text/javascript">
			 var map; 
			 function initialize() 
			 {
				var latlng = new google.maps.LatLng(<?php echo  $ubi; ?>);
				var myOptions = {
				  zoom: 14,
				  center: latlng,
				  mapTypeId: google.maps.MapTypeId.ROADMAP
				};
				map = new google.maps.Map(document.getElementById("map_canvas"), myOptions);
				
				var marker = new google.maps.Marker({
				  position: latlng, 
				  map: map, 
				  title:"Posicion del establecimiento"
			  }); 
			  
			}
			 
			  
			 
		</script>
		
		
	</head>
	
	<body onload="initialize()">
	
	
	  <div id="map_canvas" style=" width:100%; height:100%"></div>
	  
	  
	
</html>
 
 