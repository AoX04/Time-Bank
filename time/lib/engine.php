<?php
	 
require_once("config.php");
require_once("conexion.php");
//session_start();


function get_proyecto($id){
	$sql="SELECT * FROM  `proyectos` WHERE `id` = '$id' ";
	$result= mysql_query($sql);
	return get_arr($result);
}

function listar_proyectos($tipo){

	if(!$tipo)$oper = "= '0'" ;
	else $oper = "!= '0'"; 
	$sql="SELECT * FROM `proyectos` WHERE `autor_id` $oper";
	$result= mysql_query($sql);
	return get_arr($result);
}

function formatear_proyecto($proyecto)
{
	$id=$proyecto['id'];
	$src='fotosProyecto/'.$proyecto['id'];
	$center=$proyecto['lat'].','.$proyecto['lon'];
	$map='http://maps.google.com/maps/api/staticmap?center='.$center.'&zoom=9&size=140x140&sensor=false&markers='.$center;
	$titulo=$proyecto['titulo'];
	$data= <<< HTML
	
		<a href="proyecto.php?id=$id"><div style="padding:8px; width:500px; height:150px; margin-left:auto; margin-right:auto; position:relative;" class="shadow">
			<img height='140px' style=" width:140px; position:relative; left:-30px;" src="$src">
			<img style="position:absolute; left:5px;" src="$map">
			<p style="position:absolute; top:-5px;right:15px;">$titulo</p>
		</div></a>
	
HTML;

	return $data;
	
}

function get_user($id)
{
	$sql="SELECT * FROM usuarios WHERE `id`='$id' ";
	$result= mysql_query($sql);
	return $user = get_arr($result);
}

function Del($id,$table)	
{
	$sql = "DELETE FROM `$table` WHERE `ID` = '$id'";
	return mysql_query($sql);
}

function get_arr($result)
{
	$table_result=array();
	$r=0;
	while($row = mysql_fetch_assoc($result)){
		$arr_row=array();
		$c=0;
		while ($c < mysql_num_fields($result)) {        
			$col = mysql_fetch_field($result, $c);    
			$arr_row[$col -> name] = $row[$col -> name];            
			$c++;
		}    
		$table_result[$r] = $arr_row;
		$r++;
	}    
	return $table_result;
}

function loged_in($usr)
{
	
}

function log_out()
{
	
}

function make_safe($sql) 
{
    $sql = mysql_real_escape_string(trim($sql));
    return $sql;
}

function test()
{
	
}

function magikarp($table, $arr)
{
	$data=array();
	$campos="";
	$val="";
	$fields=array();
	for($c=0,$i=0;$c<count($arr);++$c)
	{
		$var=make_safe(current($arr));
		if($var!="")
		{
			//$campos=$campos.make_safe(key($arr).',');
			$fields[$i]=key($arr);
			$data[key($arr)]=$var;
			$val=$val.$var.',';
			$i++;
		}
		next($arr);
	}
	

	
	for($c=0;$c<count($data);++$c)
	{
		$campos=$campos.$fields[$c].',';
	}
	
	
	
	$campos[ strlen($campos)-1]='';
	
	$val[ strlen($val)-1]='';
	
	$sql = make_safe("INSERT INTO " .$table ." (".$campos.")VALUES (".$val.");"); 
	
	$sql1 = "INSERT INTO clientes (cedula,nombre)VALUES ('test','test');";
	
	if(!strcmp($sql,$sql1))echo true;
	else echo false;
	
	echo $sql."<br/>";
	
	//$sql = "INSERT INTO clientes (cedula,nombre)VALUES ('cedula','nombre')";
	//echo $sql."<br/>";
	
	//$result="ooooooooo";
	//$sql = "INSERT INTO clientes (cedula,nombre,apellido) VALUES ( \'lnx\',\'Aronis\',\'Mariano\')";
	
	
	//$sql= "SELECT * FROM clientes";
	
	
	
	$result = mysql_query($sql);
	if (!$result) {
		die(mysql_error());
	}
	//echo mysql_error($result);
	//$arr = get_arr($result);
	//echo $arr[0]['cedula'];
	return $data;
	
}

function updater ($tabla, $campo, $valor, $id){
if(empty($tabla) || empty($campo) || empty($valor))
return FALSE;
$sql= "update $tabla set $campo = $valor where id = $id";
echo $sql;
exit();
$result = mysql_query($sql);
}

function entrar($idProyecto, $idUsuario){
$sql= "select * from proyectos where id=".$idProyecto;
$result = mysql_query($sql);
if($fila = mysql_fetch_array($result)){
$suscrito=$fila['suscritos'];
if(strpos($suscrito,$idUsuario.'')===FALSE){
$suscrito.=','.$idUsuario;
updater('proyectos','suscrito',$suscrito,$idProyecto);
return true;
}else{
return false;
}
};
return false;
}

?>