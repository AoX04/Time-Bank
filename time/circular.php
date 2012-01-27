<?php
require_once('SVGGraph/SVGGraph.php');
include "lib/engine.php";

	$sql = "select * from estadisticas where nombre = '".$_GET['tabla']."'";
	$result = mysql_query($sql);
	$fila = mysql_fetch_array($result);
	$data = explode("\n", $fila['data']);
	$values=array();
	foreach ($data as $key => $linea) {
		$parsed = str_getcsv(
		    $linea, # Input line
		    ',',   # Delimiter
		    '"',   # Enclosure
		    '\\'   # Escape char
		);
		$values[$parsed[0]]=$parsed[1];
	}
	
$settings = array(
  'back_colour' => '#eee',  'stroke_colour' => '#000',
  'back_stroke_width' => 0, 'back_stroke_colour' => '#eee',
//  'back_image' => 'images/svgbg.png',
  'axis_colour' => '#333',  'axis_overlap' => 2,
  'axis_font' => 'Georgia', 'axis_font_size' => 10,
  'grid_colour' => '#666',  'label_colour' => '#000',
  'pad_right' => 40,        'pad_left' => 40,
  'link_base' => '/',       'link_target' => '_top',
  'show_labels' => true,    'show_label_amount' => true,
  'label_font' => 'Georgia','label_font_size' => '12',
  'sort' => false
);
 
 
$colours = array('#ccf','#699','#93c','#996','#f39','#0f3','#339');
 
$graph = new SVGGraph(200, 200, $settings);
$graph->colours = $colours;
 
$graph->Values($values);

$graph->Render('PieGraph');