<?php
require_once('SVGGraph/SVGGraph.php');
include "lib/engine.php";

	$sql = "select * from estadisticas where nombre = '".$_GET['tabla']."'";
	$result = mysql_query($sql);
	$fila = mysql_fetch_array($result);
	$data = explode("\n", $fila['data']);
	$values=array(array());
	foreach ($data as $key => $linea) {
		$parsed = str_getcsv(
		    $linea, # Input line
		    ',',   # Delimiter
		    '"',   # Enclosure
		    '\\'   # Escape char
		);
		$values[0][$parsed[0]]=$parsed[1]+0;
		//$values[1][$parsed[0]]=$parsed[1]+0;
	}
 
$settings = array(
  'back_colour' => '#eee',  'stroke_colour' => '#000',
  'back_stroke_width' => 0, 'back_stroke_colour' => '#eee',
 // 'back_image' => 'images/svgbg.png',
  'axis_colour' => '#333',  'axis_overlap' => 2,
  'axis_font' => 'Georgia', 'axis_font_size' => 12,
  'grid_colour' => '#666',  'label_colour' => '#000',
  'pad_right' => 40,        'pad_left' => 0,
  'link_base' => '/',       'link_target' => '_top',
  'project_angle' => 45,    'minimum_grid_spacing' => 20
  //,'show_label_h'=>false
  ,'minimum_grid_spacing_h'=>50
);
 
//$values = array(
// array('Dough' => 30, 'Ray' => 50, 'Me' => 40, 'So' => 25, 'Far' => 45, 'Lard' => 35),
// array('Dough' => 20, 'Ray' => 30, 'Me' => 20, 'So' => 15, 'Far' => 25, 'Lard' => 35)
//);
 
$colours = array(array('red','yellow'), array('blue','white'));

 
$graph = new SVGGraph(400, 200, $settings);
$graph->colours = $colours;
 
$graph->Values($values);
//$graph->Links($links);
$graph->Render('HorizontalBarGraph');
